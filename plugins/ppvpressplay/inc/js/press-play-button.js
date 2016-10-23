jQuery(document).ready(function($) {
	$( ".press-play" ).click(function() {
		$( ".press-play" ).addClass( "hide-button" );

		var time = 0;

		var i = setInterval(function () {
			
			time = time + 10000;

			//ppvpp_begin_loading();

			ppvpp_get_posts( time );

		}, 10000);
		
	});
});

function ppvpp_get_posts( time ) {

	var times = time / 1000;

	var jsonurl = 'http://ppvpressplay.com/wp-json/ppvpp/v1/get-current-social/' + ppvdetails.ppv_id + '/' + times;

	console.log( jsonurl );

	/* var request = new XMLHttpRequest();
	request.onreadystatechange = (e) => {
		if (request.readyState !== 4) {
			return;
		}

		if (request.status === 200) {
			
			var jsontweets = request.responseText;

			tweets = JSON && JSON.parse(jsontweets) || jQuery.parseJSON(jsontweets);


		} else {
			console.warn('error');
		}
	};

	request.open('GET', jsonurl );
	request.send(); */

	jQuery.getJSON( jsonurl, function( data ) {
		var items = [];
		jQuery.each( data, function( key, tweet ) {

			if ( tweet.post_content ) {

				//console.log( "IN HERE?" );

				var oembedurl = 'https://api.twitter.com/1/statuses/oembed.json?url=' + encodeURI(tweet.post_content) + '&callback=?';

				//http://api.twitter.com/1/statuses/oembed.json?url=' + encodeURI(tweet.post_content);

				//console.log( oembedurl );

				jQuery.getJSON( oembedurl, function( twitterdata ) {

					var tweethtml = '<div class="tweet" id="tweet'+times+'">'+twitterdata.html+'</div>';
						jQuery( '#livestream' ).prepend( tweethtml );

				});


					//console.log( twitterdata );

				//var tweethtml = '<div class="tweet" id="tweet'+key+'">'+tweet.post_content+'</div>';
				//jQuery( '#livestream' ).prepend( tweethtml );
			}
		});

		//console.log(data);
	});
}