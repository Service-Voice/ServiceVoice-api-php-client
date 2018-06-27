<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 20:17
 */

namespace ServiceVoice\ApiSdk\Metods;

use ServiceVoice\ApiSdk\Config;
use ServiceVoice\ApiSdk\Models\Domain\Record;
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

	/**
	 * @param Record $record
	 *
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function add( Record $record ) {
		$this->http->SetMetod( 'post' );
		$this->http->SetPath( 'domain/' . $this->domain . '/record' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );
		$this->http->AddHeader( 'Content-Type', 'application/json' );
		$this->http->SetBody( json_encode( $record->serialize() ) );

		return $this->http->SendRequest();
	}

	/**
	 * @param Record $record
	 *
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function remove( Record $record ) {
		$this->http->SetMetod( 'delete' );
		$this->http->SetPath( 'domain/' . $this->domain . '/record' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );
		$this->http->AddHeader( 'Content-Type', 'application/json' );
		$this->http->SetBody( json_encode( $record->serialize() ) );

		return $this->http->SendRequest();
	}
}