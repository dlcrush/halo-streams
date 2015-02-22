function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}

$(function() {
	$.ajax({
		url: 'https://api.twitch.tv/kraken/channels/' + getURLParameter('channel'),
		method: 'GET',
		dataType: 'jsonp',
		data: {callback: 'foo'},
		success: function(data) {
			console.log('success');
			console.log(data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
});

function foo(data) {
	console.log(data);

	var streamName = $('.stream_name');
	var stream = $('.stream');
	var streamInfo = $('.stream_info');
	streamName.empty();
	streamName.html(data.status);
	stream.empty();
	stream.html('<object type="application/x-shockwave-flash"' +
        'height="343"' +  
        'width="550"' + 
        'id="live_embed_player_flash"' +
        'data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=' + data.name + '"' +
        'bgcolor="#000000">' +
  '<param  name="allowFullScreen" value="true" />' +
  '<param  name="allowScriptAccess" value="always" />' +
  '<param  name="allowNetworking" value="all" />' +
  '<param  name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />' +
  '<param  name="flashvars" value="hostname=www.twitch.tv&channel=' + data.name + '&auto_play=true&start_volume=50" />' +
'</object>');
	stream.append('<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=' + data.name + '&amp;popout_chat=true" height="343" width="350"></iframe>');
	streamInfo.empty();
	streamInfo.append('<div class="row"><div class="col-xs-12"><p><b>Broadcaster:</b> ' + data.display_name + '</p><p><b>Followers:</b> ' + data.followers + '</p></div></div>');
}