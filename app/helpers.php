<?php

	use Illuminate\Support\Facades\Http;

	if (!function_exists('http')) {
		function http($method, $url, $body = null, $attach = null) {
			$token = env('TEYUTO_TOKEN');
			$client = Http::withToken($token);
			if ($attach) {
				$client->attach(...$attach);
			}
			$res = $client->$method($url, $body);
			return $res;
		}
	}
	if (!function_exists('formatString')) {
		function formatString($string) {
			$string = preg_replace('/\*(.*?)\*/', '<strong>$1</strong>', $string);
			$string = preg_replace('/\_(.*?)\_/', '<em>$1</em>', $string);
			return $string;
		}
	}
