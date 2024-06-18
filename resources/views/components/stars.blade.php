@if ($rating)
    @for ($r = 0; $r <= 5; $r++)
        {{$r <= round($rating) ? '★' : '☆'}}
    @endfor
@else
    No Rating Yet!!...
@endif