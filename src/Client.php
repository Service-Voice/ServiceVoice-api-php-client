<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 16:48
 */

namespace ServiceVoice\ApiSdk;

/**
 * Class Client
 * @package ServiceVoice\ApiSdk
 * @method \ServiceVoice\ApiSdk\Metods\Domain Domain()
 * @method \ServiceVoice\ApiSdk\Metods\DomainRecords DomainRecords( $domain );
 * @method \ServiceVoice\ApiSdk\Metods\InstanceGroupStatistics InstanceGroupStatistics( $group );
 * @method \ServiceVoice\ApiSdk\Metods\InstanceStatistics InstanceStatistics( $instanceID );
 */
class Client {

	protected $token;
	protected $baseUrl;

	function __construct( $token, $baseUrl = 'http://api.service-voice.com/v1/' ) {
		Config::setApiToken( $token );
		Config::setBaseUrl( $baseUrl );
	}

	public function __call( $name, $arguments ) {
		$name = 'ServiceVoice\ApiSdk\Metods\\' . ucfirst( $name );

		if ( empty( $arguments ) ) {
			return new $name();
		}

		return new $name( $arguments );
	}

}