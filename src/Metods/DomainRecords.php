<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 20:17
 */

namespace ServiceVoice\ApiSdk\Metods;

use ServiceVoice\ApiSdk\Config;
use ServiceVoice\ApiSdk\Transport\Http;

/**
 * Class DomainRecords
 * @package ServiceVoice\ApiSdk
 */
class DomainRecords {
	private $domain;
	private $http;

	function __construct( array $domain ) {
		if ( ! empty( $domain ) ) {
			$this->domain = $domain[0];
		}
		$this->http = new Http();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function List() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'domain/' . $this->domain . '/record' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function ListFormated() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'domain/' . $this->domain . '/record/formated' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

}