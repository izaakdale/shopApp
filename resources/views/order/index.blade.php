@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <table class="ordersTable">
            <th>Order No</th>
            <th>Date Placed</th>
            <th>Delivery Address</th>
            <th></th>

        @foreach ($orders as $order)
            <tr>
                <td>
                    {{$order->id}}
                </td>
                <td>
                    {{$order->created_at->format('d/m/Y')}}
                </td>
                <td>
                    {{$order->delivery_address}}
                </td>
                <td>
                    <a href="{{route('order.show', ['order' => $order->id])}}"> View Order </a>
                </td>
            </tr>
        @endforeach
        </table>
    </div>

@endsection