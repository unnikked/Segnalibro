@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      Create a new comment
    @endslot
    @component('components.form.base')
      @slot('route')
        {{ route('page.comment.store', $page->id) }}
      @endslot
      @component('components.form.text')
        @slot('attribute')
          text
        @endslot
        Text
      @endcomponent
      @component('components.form.submit')
        Save
      @endcomponent
    @endcomponent
  @endcomponent
@endsection
