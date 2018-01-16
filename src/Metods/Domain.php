<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 16:24
 */

namespace ServiceVoice\ApiSdk\Metods;

use ServiceVoice\ApiSdk\Config;
use ServiceVoice\ApiSdk\Transport\Http;

/**
 * Class Domain
 * @package ServiceVoice\ApiSdk
 */
class Domain {
	private $http;

	function __construct() {
		$this->http = new Http();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function List() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'domain' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

}