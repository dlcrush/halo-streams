<p>
  <i class="fa fa-twitch">{{ $stream->channel->display_name }}</i>
  <span class="pull-right"><i class="fa fa-eye"></i> {{ $stream->viewers }}</span>
</p>
<a href="{{ action('StreamController@show', ['id' => $stream->channel->name]) }}"><img class="img-responsive img-preview lazy" src="" data-src="{{ $stream->preview->large }}"></a>
<p><a href="{{ action('StreamController@show', ['id' => $stream->channel->name]) }}">{{ isset($stream->channel->status) ? $stream->channel->status : $stream->channel->display_name }}</a></p>

