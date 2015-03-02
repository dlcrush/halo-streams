@extends('template/template')

@section('content')
  <h1>Featured Streams</h1>
  <div class="row" style="margin-bottom: 20px;">
      {{-- <div class="col-xs-12">
        <p><a href="{{ action('StreamController@show', ['id' => $streams[0]->channel->name]) }}">{{ $streams[0]->channel->status }}</a></p>
      </div> --}}
      <div class="clearfix"></div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
        <p><a href="{{ action('StreamController@show', ['id' => $streams[0]->channel->name]) }}">{{ (isset($streams[0]->channel->status)) ?  $streams[0]->channel->status : $streams[0]->channel->display_name }}</a></p>
        <div class="embed-container">
          @include('streams.partials._player', ['channel' => $streams[0]->channel->name, 'autoplay' => 'true', 'volume' => '50'])
        </div>
        <p>
          <i class="fa fa-twitch"></i> <a href="#">{{ $streams[0]->channel->display_name }}</a>
          <span class="pull-right"><i class="fa fa-eye"></i> {{ $streams[0]->viewers }}</span>
        </p>
      </div>
    </div>
  <div class="row" style="margin-bottom: 20px">
    <?php $i = 0 ?>
    @foreach(array_splice($streams, 1) as $stream)
      <?php $i ++; ?>

      <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom: 10px;">
        @include('streams.partials._preview', ['stream' => $stream])
      </div>

      @if ($i % 3 == 0)
        <div class="clearfix visible-md visible-lg"></div>
      @elseif ($i % 2 == 0)
        <div class="clearfix visible-xs visible-sm"></div>
      @endif
    @endforeach
  </div>

  <div class="row" style="margin-bottom: 20px">
    <div class="col-xs-12">
      <a href="{{ action('StreamController@index') }}" class="btn btn-block btn-lg"><i class="fa fa-list"></i> View All Streams</a>
    </div>
  </div>
@endsection
