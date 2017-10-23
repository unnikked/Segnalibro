@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      Read the doc
    @endslot
    <ul class="list-group">
      @foreach ($files as $file)
        <a href="/doc/{{ basename($file, '.md') }}" class="list-group-item">{{ ucfirst(str_replace('-', ' ', basename($file, '.md'))) }}</a>
      @endforeach
    </ul>
  @endcomponent
@endsection
