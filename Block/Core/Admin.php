<?php
namespace Block\Core;

class Admin extends Layout {
	function __construct() {
		parent::__construct();
		$this->setTemplate("./View/admin/layout/twoColumnWithLeftBar.php");
	}

	public function prepareChildren() {
		$sidebar = \Mage::getBlock("Block\Admin\Layout\Sidebar");
		$this->addChild($sidebar, 'sidebar');

		$header = \Mage::getBlock("Block\Admin\Layout\Header");
		$this->addChild($header, 'header');

		$footer = \Mage::getBlock("Block\Admin\Layout\Footer");
		$this->addChild($footer, 'footer');

		$content = \Mage::getBlock("Block\Core\Layout\Content");
		$this->addChild($content, 'content');
	}
}