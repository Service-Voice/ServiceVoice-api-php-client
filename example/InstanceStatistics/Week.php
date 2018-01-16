<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 21:15
 */
include __DIR__ . '/../../vendor/autoload.php';

use ServiceVoice\ApiSdk\Client as ServiceVoiceAPI;

$ServiceVoiceAPI = new ServiceVoiceAPI( 'ТОКЕН' );

$result = $ServiceVoiceAPI->InstanceStatistics( 5 )->Week();

print_r( $result );
