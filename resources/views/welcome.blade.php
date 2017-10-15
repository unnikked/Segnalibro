@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="jumbotron">
        <h1>Segnalibro</h1>
        <p class="lead">Save and comment your favorite links from the web. It's just a bookmarking application.</p>
        <p><a class="btn btn-lg btn-success" href="/register" role="button">Register</a></p>
      </div>
    </div>
    {{-- <div class="row">
      <div class="col-lg-4">
        <h2>Safari bug warning!</h2>
        <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
      </div>
      <div class="col-lg-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
      </div>
      <div class="col-lg-4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
        <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
      </div>
    </div> --}}
  </div>
@endsection

@push('custom-css')
<style media="screen">
/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  background-color: transparent;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}
</style>
@endpush
