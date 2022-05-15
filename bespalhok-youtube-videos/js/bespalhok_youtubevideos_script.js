function videosYoutube(){
	jQuery('.bespalhok_youtubevideos_container__video_container.preview-thumb').click(function(){
		
		let id = jQuery(this).data('id');

		jQuery(this).html(`
			<iframe class="fitvidsignore" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" width="640" height="360" src="https://www.youtube.com/embed/${id}?controls=1&rel=0&playsinline=0&modestbranding=0&autoplay=1&enablejsapi=1&mute=0"></iframe>
		`);

		console.log('clickou');
	});
}

/* Roda depois da página carregada */
jQuery(document).ready(function(){
	videosYoutube();
});
