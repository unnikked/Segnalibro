<div class="panel panel-warning">
  <div class="panel-body">
    <div class="row">
      <div class="col-xs-10">
        {{ $comment->text }}

        @if ($comment->page)
          {{ $comment->page->id }}
        @endif
      </div>
      <div class="col-xs-2">
        @component('components.cancellable', ['class' => 'btn btn-danger btn-xs pull-right'])
          @slot('route')
            {{ route('page.comment.destroy', [$comment->page->id, $comment->id])}}
          @endslot
          Delete
        @endcomponent
      </div>
    </div>
  </div>
</div>
