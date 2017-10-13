@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      {{ empty($page->title) ? $page->url : $page->title }} <span class="pull-right">
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="{{ $page->url }}" target="_blank">Visit Website</a></li>
            <li><a href="#">Refresh</a></li>
            <li role="separator" class="divider"></li>
            <li>@component('components.cancellable')
              @slot('route')
                {{ route('page.destroy', $page->id) }}
              @endslot
              Delete
            @endcomponent</li>
          </ul>
        </div></span>
      @endslot

      @if ($page->title)
        <p><strong>Title: </strong> {{ $page->title }}</p>
      @endif

      @if ($page->description)
        <p><strong>Description: </strong> {{ $page->description }}</p>
      @endif

      <p><strong>Url: </strong> <a href="{{ $page->url }}">{{ $page->url }}</a></p>

      @if ($page->type)
        <p><strong>Type: </strong> {{ $page->type }}</p>
      @endif

      @if ($page->version)
        <p><strong>Version: </strong> {{ $page->version }}</p>
      @endif

      @if ($page->authorName)
        <p><strong>Author: </strong> {{ $page->authorName }}</p>
      @endif

      @if ($page->authorUrl)
        <p><strong>Author URL: </strong> {{ $page->authorUrl }}</p>
      @endif

      @if ($page->providerName)
        <p><strong>Provider: </strong> {{ $page->providerName }}</p>
      @endif

      @if ($page->providerUrl)
        <p><strong>Provider URL: </strong> {{ $page->providerUrl }}</p>
      @endif

      @if ($page->cacheAge)
        <p><strong>Cache Age: </strong> {{ \Carbon\Carbon::createFromTimestamp($page->cacheAge)->diffForHumans() }}</p>
      @endif

      @if ($page->thumbnailUrl)
        <img src="{{ $page->thumbnailUrl }}" class="img-responsive" alt="" />
      @endif

      @if ($page->thumbnailWidth)
        <p><strong>thumbnailWidth: </strong> {{ $page->thumbnailWidth }}</p>
      @endif

      @if ($page->thumbnailHeight)
        <p><strong>thumbnailHeight: </strong> {{ $page->thumbnailHeight }}</p>
      @endif

      @if ($page->width)
        <p><strong>width: </strong> {{ $page->width }}</p>
      @endif

      @if ($page->height)
        <p><strong>height: </strong> {{ $page->height }}</p>
      @endif

      @if ($page->html)
        <div class="row">
          <div class="col-xs-2">

          </div>
          <div class="col-xs-8">
            {!! $page->html !!}
          </div>
          <div class="col-xs-2">

          </div>
        </div>
      @endif
    @endcomponent
  @endsection
