@extends('layouts.app')

@section('content')
    <div class="container" height="6400px">
        <table class="ordersTable">
            <th>Order No</th>
            <th>Date Placed</th>
            <th>Delivery Address</th>
            <th></th>

        @foreach ($orders as $order)
            <tr class="row-cols-4" height="80px">
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

    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

@endsection