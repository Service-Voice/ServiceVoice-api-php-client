<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.06.2018
 * Time: 21:15
 */

namespace ServiceVoice\ApiSdk\Models\Domain;

class Record {
	/**
	 * @var string
	 */
	private $name;
	/**
	 * @var string
	 */
	private $type;
	/**
	 * @var int
	 */
	private $TTL;
	/**
	 * @var SubRecord[]
	 */
	private $records;

	function serialize() {
		$data = [
			'name'    => $this->getName(),
			'type'    => $this->getType(),
			'ttl'     => $this->getTTL(),
			'records' => ''
		];

		for ( $i = 0; $i < count( $this->records ); $i ++ ) {
			$data['records'][] = $this->records[ $i ]->serialize();
		}

		return $data;
	}

	function getName() {
		return $this->name;
	}

	function setName( $name ) {
		$this->name = $name;

		return $this;
	}

	function getType() {
		return $this->type;
	}

	function getTTL() {
		return $this->TTL;
	}

	function setTTL( $TTL ) {
		$this->TTL = $TTL;

		return $this;
	}

	function setSubRecords( $subRecords ) {
		$this->records = $subRecords;

		return $this;
	}

	function GetSubRecords() {
		return $this->records;
	}

	function AddSubRecords( SubRecord $subRecord ) {
		$this->records[] = $subRecord;

		return $this;
	}

	function A() {
		$this->type = 'A';

		return $this;
	}

	function AAAA() {
		$this->type = 'AAAA';

		return $this;
	}

	function CNAME() {
		$this->type = 'CNAME';

		return $this;
	}

	function MX() {
		$this->type = 'MX';

		return $this;
	}

	function SRV() {
		$this->type = 'SRV';

		return $this;
	}

	function PTR() {
		$this->type = 'PTR';

		return $this;
	}

	function TXT() {
		$this->type = 'TXT';

		return $this;
	}

	function NS() {
		$this->type = 'NS';

		return $this;
	}

}