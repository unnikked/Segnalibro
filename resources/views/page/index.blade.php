@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      @component('components.form.base')
        @slot('route')
          {{ route('page.search') }}
        @endslot

        <div class="input-group">
          <input type="text" name="query" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </div>

      @endcomponent
    </div>
  </div>
  <br>
  @component('components.layout.base')
    @slot('title')
      Saved pages <span class="pull-right"><a href="{{ route('page.create') }}" class="btn btn-default btn-xs">New</a></span>
    @endslot
    <div class="list-group">
      @each('page.each', $pages, 'page', 'shared.empty')
    </div>

    @if (method_exists($pages, 'links'))
      {!! $pages->links() !!}
    @endif
  @endcomponent
@endsection
