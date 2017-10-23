@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      Read the doc - <a href="/doc">Back</a>
    @endslot
    {!! $doc !!}
  @endcomponent
@endsection
