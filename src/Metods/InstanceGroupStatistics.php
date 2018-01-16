<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 20:38
 */

namespace ServiceVoice\ApiSdk\Metods;

use ServiceVoice\ApiSdk\Config;
use ServiceVoice\ApiSdk\Transport\Http;

class InstanceGroupStatistics {
	private $group;
	private $http;

	function __construct( array $group ) {
		if ( ! empty( $group ) ) {
			$this->group = $group[0];
		}
		$this->http = new Http();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function RealTime() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'teamspeak/instance/group/' . $this->group . '/statistics/realtime' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function Day() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'teamspeak/instance/group/' . $this->group . '/statistics/day' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function Week() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'teamspeak/instance/group/' . $this->group . '/statistics/week' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function Month() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'teamspeak/instance/group/' . $this->group . '/statistics/month' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

	/**
	 * @return mixed
	 * @throws \ServiceVoice\ApiSdk\Exceptions\RequestException
	 * @throws \ServiceVoice\ApiSdk\Exceptions\ResponseException
	 */
	function Year() {
		$this->http->SetMetod( 'get' );
		$this->http->SetPath( 'teamspeak/instance/group/' . $this->group . '/statistics/year' );
		$this->http->AddHeader( 'X-token', Config::getApiToken() );

		return $this->http->SendRequest();
	}

}