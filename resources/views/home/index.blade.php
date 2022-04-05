@extends('layouts.app')

@section('title')
 Home
@endsection

@section('content')

<div class="homeImage">
  <img src=" {{ URL('images/protein.png') }}" class="homeImageSize" >
</div>

@endsection
