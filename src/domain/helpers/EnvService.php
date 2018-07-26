<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\helpers\UrlHelper;

class EnvService {
	
	public static function getStaticDomain() {
		$domain = env('servers.static.domain');
		$domain = trim($domain, SL);
		return $domain;
	}
	
	public static function getUrl($name, $uri = null) {
		$domain = env('url' . DOT . $name);
		return self::generateUrl($domain, $uri);
	}
	
	public static function getStaticUrl($path) {
		$path = trim($path, SL);
		if(!UrlHelper::isAbsolute($path)) {
			$path = self::getStaticDomain() . SL . $path;
		}
		return $path;
	}
	
	private static function generateUrl($domain, $uri) {
		$domain = rtrim($domain, SL);
		$uri = ltrim($uri, SL);
		if($uri) {
			$domain .= SL . $uri;
		}
		return $domain;
	}
}