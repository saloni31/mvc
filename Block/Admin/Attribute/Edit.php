<?php
namespace Block\Admin\Attribute;

class Edit extends \Block\Core\Edit {

	function __construct() {
		parent::__construct();
		$this->setTabClass(\Mage::getBlock("Block\Admin\Attribute\Edit\Tabs"));
	}
}