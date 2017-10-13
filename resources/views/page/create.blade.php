@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      Save a new page
    @endslot
    @component('components.form.base')
      @slot('route')
        {{ route('page.store') }}
      @endslot

      @component('components.form.url')
        @slot('attribute')
          url
        @endslot
        Url to save:
      @endcomponent

      @component('components.form.submit')
        Save
      @endcomponent

    @endcomponent
  @endcomponent
@endsection
