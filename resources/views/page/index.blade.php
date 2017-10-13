@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      Saved pages <span class="pull-right"><a href="{{ route('page.create') }}" class="btn btn-default btn-xs">New</a></span>
    @endslot
    <div class="list-group">
      @each('page.each', $pages, 'page', 'shared.empty')
    </div>

    {!! $pages->links() !!}
  @endcomponent
@endsection
