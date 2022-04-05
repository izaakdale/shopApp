@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
  <form action="{{ route('order.store') }}" method="post">
    @csrf
    @include('order.addressForm')
    <div>
      <input type="submit" class="btn btn-primary btn-block" value="Place">
    </div>
  </form>
@endsection
