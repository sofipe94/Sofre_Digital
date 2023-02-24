<?php 

add_filter('embed_oembed_html', 'wrap_embed', 99, 4);

function wrap_embed($html, $url, $attr, $post_id) {
	return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}

function get_video_detail($field = ''){

	$player = $field;
	preg_match('/src="(.+?)"/', $player, $matches);
	$src = $matches[1];
	$src = parse_url($src);

	$video_type = '';
	$video_id = '';

	// Url is http://www.youtube.com/watch?v=xxxx 
	// or http://www.youtube.com/watch?feature=player_embedded&v=xxx
	// or http://www.youtube.com/embed/xxxx
	if (($src['host'] == 'youtube.com') || ( $src['host'] == 'www.youtube.com')){
		$video_type = 'youtube';
		$video_id = ltrim( $src['path'],'/' );

		parse_str( $src['query'] );
		
		if (!empty( $feature)){
			$video_id = end( explode( 'v=', $src['query'] ) );
		}
			
		if ( strpos( $src['path'], 'embed' ) == 1 ){
			$video_id = end( explode( '/', $src['path'] ) );
		}
	}

	// Url is http://www.vimeo.com
	if (($parse['host'] == 'vimeo.com') || ($parse['host'] == 'www.vimeo.com')){
		$video_type = 'vimeo';
		$video_id = ltrim( $parse['path'],'/' );
	}

	$video = array(
		'type' => $video_type,
		'id' => $video_id
	);

	return $video;
}