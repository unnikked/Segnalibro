@extends('layouts.app')

@push('custom-css')
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css" integrity="sha256-+2lyWXApzbDj+vHaoYRVsx253cXaQ11xVCzPg34SVC4=" crossorigin="anonymous" /> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap3.min.css" integrity="sha256-xaHB15TZbLhew82A2NzY8rvCCp/REcOA/kSpWWO7TlE=" crossorigin="anonymous" />
@endpush

@push('javascript-bottom')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js" integrity="sha256-HyBiZFJAMvxOhZoWOc5LWIWaN1gcFi8LjS75BZF4afg=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('#tags').selectize({
      delimiter: ',',
      persist: false,
      selectOnTab: true,
      create: function(input) {
          return {
              value: input,
              text: input
          }
      }
    });
  </script>
@endpush

@section('content')
  @component('components.layout.base')
    @slot('title')
      Manage Tags
    @endslot
    @component('components.form.base')
      @slot('route')
        {{ route('page.tag.store', $page->id) }}
      @endslot

      <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
          <label for="text" class="col-md-4 control-label">Tags:</label>

          <div class="col-md-6">
              <input id="tags" type="text" class="form-control" name="tags" value="{{ implode(',', $page->tags->pluck('name')->toArray()) }}" required autofocus>

              @if ($errors->has('tags'))
                  <span class="help-block">
                      <strong>{{ $errors->first('tags') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      @component('components.form.submit')
        Save
      @endcomponent

    @endcomponent
  @endcomponent
@endsection
