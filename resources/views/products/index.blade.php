@extends('layouts.app')

@section('title', 'Products')

@section('content')

<body>
    <?php $numCols = 3; $rowCount = 0; ?>

    <div>
        @foreach($products as $product)
        <?php
        if($rowCount % $numCols == 0)
        {
            ?> <div class="row p-3"> <?php
        }
        $rowCount++;
        ?>
        <div class="col">
            @include('products.partials.product')
        </div>
        <?php if($rowCount % $numCols == 0) { ?> </div><br> <?php } ?>
        @endforeach
    </div>
</body>
@endsection