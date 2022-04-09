@extends('layouts.app')

@section('content')

<div class="container">

    @badge( ['show' => now()->diffInMinutes($order->created_at) < 60] )
        New Order Created...
    @endbadge

    <table class="ordersTable">
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        
        @foreach ($orderItems as $item)
        
        <tr class="row-cols-3">
            <td>
                {{ $products->find($item->product_id)->name }} 
            </td>
            <td>
                {{$item->quantity}}
            </td>
            <td>
                ${{ $products->find($item->product_id)->price * $item->quantity }} 
            </td>
        </tr>
        
        @endforeach
        
    </table>
</div>
@endsection