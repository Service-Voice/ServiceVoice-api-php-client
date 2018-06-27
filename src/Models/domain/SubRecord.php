<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 26.06.2018
 * Time: 21:49
 */

namespace ServiceVoice\ApiSdk\Models\domain;


class SubRecord {

	private $content;
	private $disabled;


	function enable() {
		$this->disabled = false;
	}

	function disable() {
		$this->disabled = true;
	}

	function serialize() {
		return [
			'content'  => $this->getContent(),
			'disabled' => $this->getStatus(),
		];
	}

	function getContent() {
		return $this->content;
	}

	function setContent( $string ) {
		$this->content = $string;

		return $this;
	}

	function getStatus() {
		return $this->disabled;
	}

}