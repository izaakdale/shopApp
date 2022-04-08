@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
  <form action="{{ route('order.store') }}" method="post">
    @csrf
    @include('order.addressForm')
    <br>
    <div class="">
      <input type="submit" class="addToCartButton btn-block" value="Place">
    </div>
  </form>
@endsection
