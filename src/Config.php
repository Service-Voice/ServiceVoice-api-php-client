<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 16:27
 */

namespace ServiceVoice\ApiSdk;

class Config {
	private static $baseUrl = '';
	private static $token = '';

	static function getBaseUrl() {
		return self::$baseUrl;
	}

	static function setBaseUrl( $url ) {
		self::$baseUrl = $url;
	}

	static function getApiToken() {
		return self::$token;
	}

	static function setApiToken( $token = '' ) {
		self::$token = $token;
	}

}
