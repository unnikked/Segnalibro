@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      @each('page.comment.each', $comments, 'comment', 'shared.empty')
      {!! $comments->links() !!}
    </div>
  </div>
@endsection
