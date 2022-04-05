@extends('layouts.app')

@section('content')
<br>
<table class="ordersTable">
    <th>Item</th>
    <th>Quantity</th>
    <th>Price</th>
    
    @foreach ($orderItems as $item)
    
    <tr>
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
@endsection