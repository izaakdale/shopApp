<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate as FacadesGate;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'show', 'create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if($user->is_admin)
        {
            $orders = Order::all()->paginate(10);
        }
        else
        {
            $orders = Order::where('user_id', $user->id)->latest()->paginate(6);
        }

        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [Order::class]);
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        if( $request->session()->has('cart') )
        {
            $order = New Order();
            $formInfo = $request->validated();
            $order->delivery_address = 
                $formInfo['name'] . ", " . 
                $formInfo['address'] . ", " . 
                $formInfo['city'] . ", " . 
                $formInfo['country'];

            $order->user_id = auth()->user()->id;
            $order->save();

            $cart = $request->session()->get('cart');
            $ids = array_keys($cart->items);
            foreach($ids as $id)
            {
                $product = Product::findOrFail($id);
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $cart->items[$id]['qty'];

                $orderItem->save();
            }
            $request->session()->remove('cart');
            return redirect()->route('order.show', $order->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->authorize('view', [$order]);

        $orderItems = $order->orderItems()->get();
        $products = Product::findMany($orderItems->pluck('product_id'));

        return view('order.show', ['orderItems' => $orderItems, 'products' => $products]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateOrderRequest $request, Order $order)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
