@extends('template/template')

@section('content')
  <h1>Featured Streams</h1>
  <div class="row" style="margin-bottom: 20px;">
      <div class="col-xs-12">
        <p><a href="#">{{ $streams[0]->channel->status }}</a></p>
      </div>
      <div class="clearfix"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="embed-container">
        @include('streams.partials._player', ['channel' => $streams[0]->channel->display_name, 'autoplay' => 'true', 'volume' => '5'])
      </div>
      <p>
        <i class="fa fa-twitch"></i> <a href="#">{{ $streams[0]->channel->name }}</a>
        <span class="pull-right"><i class="fa fa-eye"></i> {{ $streams[0]->viewers }}</span>
      </p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="embed-container">
        @include('streams.partials._chat', ['channel' => $streams[0]->channel->display_name])
      </div>
    </div>
  </div>
  <div class="row" style="margin-bottom: 20px">
    @foreach(array_splice($streams, 1) as $stream)
      <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom: 10px;">
        @include('streams.partials._preview', ['stream' => $stream])
      </div>
    @endforeach
  </div>
@endsection
