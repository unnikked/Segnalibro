<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-10">
        {{ $comment->text }}


      </div>
      <div class="col-xs-2">
        @component('components.cancellable', ['class' => 'btn btn-default btn-xs pull-right'])
          @slot('route')
            {{ route('page.comment.destroy', [$comment->page->id, $comment->id])}}
          @endslot
          Delete
        @endcomponent
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <a href="{{ route('page.show', $comment->page->id)}}">
            @if (Route::currentRouteName() == 'page.show')
              Top
            @else
              {{ empty($comment->page->title) ? $comment->page->url : $comment->page->title }}
            @endif
        </a>
      </div>
    </div>
  </div>
</div>
