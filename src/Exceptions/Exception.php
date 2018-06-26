<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 16:14
 */

namespace ServiceVoice\ApiSdk\Exceptions;

use Psr\Http\Message\ResponseInterface;

class Exception extends \Exception {
	/**
	 * @var ResponseInterface
	 */
	protected $response;

	protected $data;
	/**
	 * Build a new exception
	 *
	 * @param ResponseInterface $response
	 */
	public function __construct( $response ) {
		$data = json_decode( $response->getBody()->getContents(), true );
		parent::__construct( $data['error']['message'], $response->getStatusCode() );
		$this->response = $response;
		$this->data     = $data;
	}

	/**
	 * @return ResponseInterface
	 */
	public function getResponse() {
		return $this->response;
	}

	public function getData() {
		return $this->data;
	}
}
