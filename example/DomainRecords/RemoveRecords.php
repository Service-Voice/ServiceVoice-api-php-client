<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 27.06.2018
 * Time: 0:09
 */

include __DIR__ . '/../../vendor/autoload.php';

use ServiceVoice\ApiSdk\Client as ServiceVoiceAPI;
use ServiceVoice\ApiSdk\Models\Domain\Record;
use ServiceVoice\ApiSdk\Models\domain\SubRecord;

$ServiceVoiceAPI = new ServiceVoiceAPI( 'TOKEN' );

$record     = new Record();
$subRecords = new SubRecord();

$subRecords->setContent( '9987 0 0 ts01.service-voice.com.' )->enable();
$record->SRV()->setTTL( 60 )->setName( '_ts3._udp.vasek.service-voice.com.' )->AddSubRecords( $subRecords );

$result = $ServiceVoiceAPI->DomainRecords( 'service-voice.com' )->remove( $record );

print_r( $result );



