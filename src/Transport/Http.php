<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 17:13
 */

namespace ServiceVoice\ApiSdk\Transport;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\BadResponseException;
use ServiceVoice\ApiSdk\Config;
use ServiceVoice\ApiSdk\Exceptions\RequestException;
use ServiceVoice\ApiSdk\Exceptions\ResponseException;

class Http {
	private $http;
	private $metod;
	private $headers;
	private $path;
	private $body = null;

	function __construct() {
		$this->http = new Guzzle( [ 'base_uri' => Config::getBaseUrl() ] );
	}

	public function GetHttpClient() {
		return $this->http;
	}

	public function AddHeader( $key, $value ) {
		$this->headers[ $key ] = $value;
	}

	public function SetBody( $body ) {
		$this->body = $body;
	}

	public function GetBody() {
		return $this->body;
	}

	public function isBody() {
		if ( ! empty( $this->body ) ) {
			return true;
		} else {
			return false;
		}
	}

	public function SendRequest() {
		try {
			if ( ! $this->isBody() ) {
				$response = $this->http->request( $this->GetMetod(), $this->GetPath(), [
					'headers' => $this->GetHeaders()
				] );
			} else {
				$response = $this->http->request( $this->GetMetod(), $this->GetPath(), [
					'headers' => $this->GetHeaders(),
					'body'    => $this->GetBody(),
				] );

			}
		} catch ( BadResponseException $e ) {
			throw new RequestException( $e->getResponse() );
		}
		$data = json_decode( $response->getBody() );
		if ( isset( $data->status ) && $data->status === 'success' ) {
			return $data;
		} else {
			throw new ResponseException( $response );
		}
	}

	public function GetMetod() {
		return $this->metod;
	}

	public function SetMetod( $metod ) {
		$this->metod = mb_strtoupper( $metod );
	}

	public function GetPath() {
		return $this->path;
	}

	public function SetPath( $path ) {
		$this->path = $path;
	}

	public function GetHeaders() {
		return $this->headers;
	}

}