<?php
namespace Block\Core;

class Layout extends Template {
	function __construct() {
		$this->prepareChildren();
	}

	public function prepareChildren() {
		return $this;
	}
}
?>