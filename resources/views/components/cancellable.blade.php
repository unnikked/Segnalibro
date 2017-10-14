@php
  $id = str_random(8);
@endphp

<a href="{{ strval($route) }}" class="{{ isset($class) ? $class : '' }}"
    onclick="event.preventDefault();
             if(confirm('Are you sure?')) document.getElementById('{{ $id }}').submit();">
    {{ $slot }}
</a>

<form id="{{ $id }}" action="{{ strval($route) }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    {{ method_field('DELETE')}}
</form>
