<a href="{{ route('page.show', $page->id) }}" class="list-group-item" style="overflow: hidden; text-overflow: ellipsis;">
  <img class="img-circle" src="https://{{ parse_url($page->url, PHP_URL_HOST) }}/favicon.ico" width="16" /> {{ empty($page->title) ? $page->url : $page->title }}<span class="pull-right text-muted">{{ $page->created_at->diffForHumans() }}</span></a>
