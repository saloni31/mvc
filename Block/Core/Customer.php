<?php
namespace Block\Core;

class Customer extends Layout {
	function __construct() {
		parent::__construct();
		$this->setTemplate("./View/core/layout/oneColumnLayout.php");
	}

	public function prepareChildren() {
		$header = \Mage::getBlock("Block\Core\Layout\Header");
		$this->addChild($header, 'header');

		$footer = \Mage::getBlock("Block\Core\Layout\Footer");
		$this->addChild($footer, 'footer');

		$content = \Mage::getBlock("Block\Core\Layout\Content");
		$this->addChild($content, 'content');
	}
}