<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL('css/style.css')}}">
    <script src="{{mix('js/app.js')}}"></script>
    <title>@yield('title')</title>
</head>
<style>A {text-decoration: none;} </style>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 border-bottom shadow-sm mb-3">
        <a href=" {{ route('home.index')}} " class="my-0 me-md-auto h4 font-weight-normal">VeGains</a>
        <nav class="my-2 my-md-0 me-md-3">
            <a href=" {{ route('products.index')}} " class="p-2 text-dark">Products</a>

            @guest
                @if (Route::has('register'))
                <a href="{{route('register')}}" class="p-2 text-dark">Register</a>
                @endif
                <a href="{{route('login')}}" class="p-2 text-dark">Login</a>
            @else
                <a href="{{route('order.index')}}" class="p-2 text-dark">My Orders</a>
                <a href="{{route('logout')}}" class="p-2 text-dark"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >Logout ({{ Auth::user()->name }})</a>

                <form id="logout-form" class="" action="{{route('logout')}}" method="post"
                style="display:none;">
                @csrf
                </form>
            @endguest

            <a href="{{ route('cart.index') }}">
                <img src="{{ URL('images/cart.png')}} " alt="Cart" class="cart">
                <span>
                    @if(Session::has('cart'))
                    {{ Session::get('cart')->cartSize }}
                    @else
                    0
                    @endif
                </span>
            </a>

        </nav>
    </div>
    <div class="container">
        <br>
        @yield('content')
    </div>
</body>
</html>