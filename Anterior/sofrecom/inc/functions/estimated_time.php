<?php

function get_estimate_time($post) {

	// load the content
	$thecontent = $post->post_content;
	// count the number of words
	$words = str_word_count( strip_tags( $thecontent ) );
	// rounding off and deviding per 200 words per minute
	$m = floor( $words / 200 );

	if ($m == 0) {
		$m = 1;
	}

	// calculate the amount of time needed to read
	$estimate = $m . ' min' . ( $m == 1 ? '' : 's' );

	// return the estimate
	return $estimate;

}