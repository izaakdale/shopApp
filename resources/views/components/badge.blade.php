@if( !@isset($show) || $show)
    <h1 class="orderSuccessBadge">    
        {{$slot}}
    </h1>
@endif