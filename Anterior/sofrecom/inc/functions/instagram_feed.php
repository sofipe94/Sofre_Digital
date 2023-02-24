<?php

	function instagram_feed(){
		global $wpdb;

		$shortcode = do_shortcode('[instagram-feed]');

		if (isset($_GET['insta'])) {
			echo $shortcode;
		}

		if ( false === ( $feed = get_transient( 'valid_instagram_3' ) ) ) {

			$results = $wpdb->get_results("SELECT * FROM `wp_sbi_instagram_posts` ORDER BY `wp_sbi_instagram_posts`.`time_stamp` DESC");

			$feed = [];
			foreach ($results as $v) {
				$decoded = json_decode($v->json_data);
				$feed[] = array(
					'image' => $decoded->{'media_url'},
					'media_id' => $v->media_id,
					'url' => $decoded->{'permalink'},
					'caption' => $decoded->{'caption'},
				);
			}
			set_transient( 'valid_instagram_3', $feed, 6 * HOUR_IN_SECONDS);
		}

		return $feed;
	}