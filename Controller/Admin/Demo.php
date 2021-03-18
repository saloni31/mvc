<?php
namespace Controller\Admin;

/**
 *
 */
class Demo extends \Controller\Core\Admin {

	public function testAction() {
		echo "<pre>";
		$layout = \Mage::getBlock("Block\Core\Layout", true);
		print_r(\Mage::getRegistery("Block\Core\Layout"));
	}
}