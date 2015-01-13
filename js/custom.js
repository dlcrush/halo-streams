$(function() {
	$.ajax({
		url: 'https://api.twitch.tv/kraken/streams',
		method: 'GET',
		dataType: 'jsonp',
		data: {game: 'Halo 5: Guardians', callback: 'foo', embeddable: 'true'},
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
	console.log('foo');
	console.log(data);
	var streamContainer = $('.stream');
	streamContainer.empty();
	streamContainer.html('<object type="application/x-shockwave-flash"' +
        'height="378"' +  
        'width="620"' + 
        'id="live_embed_player_flash"' +
        'data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=' + data.streams[1].channel.name + '"' +
        'bgcolor="#000000">' +
  '<param  name="allowFullScreen" value="true" />' +
  '<param  name="allowScriptAccess" value="always" />' +
  '<param  name="allowNetworking" value="all" />' +
  '<param  name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />' +
  '<param  name="flashvars" value="hostname=www.twitch.tv&channel=' + data.streams[1].channel.name + '&auto_play=true&start_volume=50" />' +
'</object>');
	//streamContainer.html('<iframe id="player" type="text/html" width="620" height="378" src="http://www.twitch.tv/' + data.streams[0].channel.name + '/hls" frameborder="0"></iframe>');
	// console.log(data.streams[0]._id);
	// $.ajax({
	// 	url: 'https://api.twitch.tv/kraken/videos/' + data.streams[0]._id,
	// 	method: 'GET',
	// 	dataType: 'jsonp',
	// 	data: {callback: 'bar'}
	// });
}

function bar(data) {
	console.log('bar');
	console.log(data);
}