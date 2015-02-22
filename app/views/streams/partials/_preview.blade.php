<p>{{ $stream->channel->status }}</p>
<img class="img-responsive" src="{{ $stream->preview->large }}">
<p>
  <i class="fa fa-twitch">{{ $stream->channel->display_name }}</i>
  <span class="pull-right"><i class="fa fa-eye"></i> {{ $stream->viewers }}</span>
</p>
