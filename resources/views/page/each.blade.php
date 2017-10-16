<a href="{{ route('page.show', $page->id) }}" class="list-group-item" >
  <div class="row">
    <div class="container-fluid ">
      <div class="col-xs-1">
        <img class="img-circle" src="https://{{ parse_url($page->url, PHP_URL_HOST) }}/favicon.ico" width="16"/>
      </div>
      <div class="col-xs-8">
        <p style="overflow: hidden;text-overflow: ellipsis;">
          {{ empty($page->title) ? $page->url : $page->title }}
        </p>
      </div>
      <div class="col-xs-2">
        <span class="text-muted">{{ $page->created_at->diffForHumans() }}</span>
      </div>
    </div>
  </div>
</a>
