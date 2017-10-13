<form class="form-horizontal" method="POST" action="{{ $route }}">
    {{ csrf_field() }}

    {{ $slot }}
</form>
