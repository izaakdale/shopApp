@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="d-flex justify-content-center row-cols-3 p-3 bg-white">
    <div class="my-0">
        <img src=" {{ asset($product->image_url) }} " class="productImage">
    </div>
    <div class="my-auto productIndex">
        <h1>{{$product->name}}</h1>
        <p class="text-muted">{{$product->description}}</p>
        <a href="{{ route('product.addToCart', ['id' => $product->id])}}" class="btn btn-primary">Add to Cart</a>
    </div>
    <div class="my-auto">
        <div class="d-flex flex-column">
            <p class="productTable">Nutritional Information</p>
            <table class="productTable">
                <tr>
                    <th>Protein (g)</th>
                    <th>Calories kCal</th>
                </tr>
                <tr>
                    <td>{{ $product->nutrition_info->protein }}</td>
                    <td>{{ $product->nutrition_info->calories }}</td>
                </tr>
                <tr>

                </tr>
            </table>
        </div>
    </div>
</div>

@endsection