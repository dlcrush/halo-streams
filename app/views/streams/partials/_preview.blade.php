<p><a href="#">{{ $stream->channel->status }}</a></p>
<a href="#"><img class="img-responsive img-preview" src="{{ $stream->preview->large }}"></a>
<p>
  <i class="fa fa-twitch">{{ $stream->channel->display_name }}</i>
  <span class="pull-right"><i class="fa fa-eye"></i> {{ $stream->viewers }}</span>
</p>
