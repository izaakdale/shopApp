@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<div class="my-auto">
    <div class="d-flex flex-column">
        @if ( count($orderItems) != 0  )
            <h3 class="cartTable">Cart Items</h3>
            <table class="cartTable">
                <tr class="row-cols-3 ">
                    <th>Item</th>
                    <th>Quantiy</th>
                    <th>Price</th>
                </tr>
                @foreach ($orderItems as $item)
                    @if($item['qty'] > 0 )
                        <tr>
                            <td>
                                {{ $item['product']->name }}
                            </td>
                            <td>
                                <a href=" {{ route('product.addToCart', ['id' => $item['product']->id ])}} "> + </a>
                                {{$item['qty']}}
                                <a href=" {{ route('product.removeFromCart', ['id' => $item['product']->id ])}} "> - </a>
                            </td>
                            <td>
                                ${{$item['qty'] * $item['product']->price }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
            <a class="cartTable" href="{{ route('cart.empty') }}">Empty Cart</a>
            <br>
            <a class="cartTable addToCartButton" href="{{ route('order.create') }}">Place Order</a>
        @else
            <p class="cartTable">Empty Cart</p>
        @endif
    </div>
</div>


@endsection