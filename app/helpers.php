<?php
	if (!function_exists('formatString')) {
		function formatString($string) {
			$string = preg_replace('/\*(.*?)\*/', '<strong>$1</strong>', $string);
			$string = preg_replace('/\_(.*?)\_/', '<em>$1</em>', $string);
			return $string;
		}
	}
