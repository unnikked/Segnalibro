@extends('layouts.app')

@section('content')
  @component('components.layout.base')
    @slot('title')
      <img class="img-circle" src="https://{{ parse_url($page->url, PHP_URL_HOST) }}/favicon.ico" width="16" /> {{ empty($page->title) ? $page->url : $page->title }} <span class="pull-right">
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
      <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
          @if ($page->thumbnailUrl)
            <img src="{{ $page->thumbnailUrl }}" class="img-responsive" alt="" />
          @endif
        </div>
      </div>

      {{-- @if ($page->thumbnailWidth)
        <p><strong>thumbnailWidth: </strong> {{ $page->thumbnailWidth }}</p>
      @endif

      @if ($page->thumbnailHeight)
        <p><strong>thumbnailHeight: </strong> {{ $page->thumbnailHeight }}</p>
      @endif --}}

      {{-- @if ($page->width)
        <p><strong>width: </strong> {{ $page->width }}</p>
      @endif

      @if ($page->height)
        <p><strong>height: </strong> {{ $page->height }}</p>
      @endif --}}

      @if ($page->html)
        <div class="row">
          {{-- <div class="col-md-2">

          </div>
          <div class="col-md-8">
            {!! $page->html !!}
          </div>
          <div class="col-md-2">

          </div> --}}
          <div class="col-xs-12 text-center">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#preview">
              Show Preview
            </button>
          </div>
        </div>
      @endif
    @endcomponent

    <!-- Modal -->
    <div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Preview</h4>
          </div>
          <div class="modal-body">
            {!! $page->html !!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
          </div>
        </div>
      </div>
    </div>

    @component('components.layout.base')
      @slot('title')
        Tags <span class="pull-right"><a href="{{ route('page.tag.create', $page->id) }}" class="btn btn-default btn-xs">Add Tags</a></span>
      @endslot
      @each('page.tag.each', $page->tags, 'tag', 'shared.empty')
    @endcomponent

    @component('components.layout.base')
      @slot('title')
        Comments <span class="pull-right"><a href="{{ route('page.comment.create', $page->id)}}" class="btn btn-default btn-xs">New</a></span>
      @endslot
      @each('page.comment.each', $page->comments, 'comment', 'shared.empty')
    @endcomponent
  @endsection
