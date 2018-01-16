<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 21:12
 */

include __DIR__ . '/../../vendor/autoload.php';

use ServiceVoice\ApiSdk\Client as ServiceVoiceAPI;

$ServiceVoiceAPI = new ServiceVoiceAPI( 'ТОКЕН' );

$result = $ServiceVoiceAPI->InstanceGroupStatistics( 'athp' )->RealTime();

print_r( $result );