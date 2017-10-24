@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      Read the doc - <a href="/doc">Back</a>
    @endslot
    {!! $doc !!}
  @endcomponent
@endsection

@push('javascript')
  <script type="text/javascript">
    window.onload = function () {
      document.querySelectorAll('img').forEach((img) => img.className = 'img-responsive');
    }
  </script>
@endpush
