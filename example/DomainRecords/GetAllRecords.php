<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 16.01.2018
 * Time: 16:41
 */

include __DIR__ . '/../../vendor/autoload.php';

use ServiceVoice\ApiSdk\Client as ServiceVoiceAPI;

$ServiceVoiceAPI = new ServiceVoiceAPI( 'TOKEN' );
$result          = $ServiceVoiceAPI->DomainRecords( 'service-voice.com' )->List();

print_r( $result );
