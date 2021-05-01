function videosYoutube(){
	
    jQuery('.youtube_video').each(function(i, e){

		let video = jQuery(e);
		let id = video.attr('id');
		let videoId = video.data('video-id');
		let img = 'https://img.youtube.com/vi/'+videoId+'/sddefault.jpg';
		let alturaProp = (parseInt(parseFloat(video.outerWidth()) / 1.7777) + 1);

		video.attr('style', `
			background: url(${img}) center center #ddd;
			background-size: cover;
			width: 100%;
			height: ${alturaProp}px;
		`);

		jQuery( window ).resize(function() {
			jQuery('#'+id).css('height',  (parseInt(parseFloat(jQuery('#'+id).outerWidth()) / 1.7777) + 1));
		});

		video.addClass('mouse_hover_cursor');		
		jQuery('#'+id).click(function(){
			let player = new YT.Player(id, {
				videoId: videoId,
				events : {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				}
			});
		});
		function onPlayerReady(event) {event.target.playVideo(); }
		function onPlayerStateChange(event) { if (event.data == YT.PlayerState.ENDED) { player.stopVideo(); }}
	});

}

/* Roda depois da página carregada */
jQuery(document).ready(function(){
	// videosYoutube();
});
