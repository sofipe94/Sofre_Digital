<?php

	function my_acf_init() {
		acf_update_setting('google_api_key', 'AIzaSyBBgZV2xbJn9QhQQWVaIY3f9OViloTVUXE');
	}

	add_action('acf/init', 'my_acf_init');