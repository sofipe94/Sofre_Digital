<?php

	function globalLang(){

		if (function_exists('pll_current_language')) {
			$lang = pll_current_language('slug');
		}

		if ($lang == 'en'):
			$lang == 'en';
		else:
			$lang == 'es';
		endif;

		return $lang;
	}

	$lang = globalLang();
	global $lang;