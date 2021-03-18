<?php
namespace Controller\Admin;

class Index extends \Controller\Core\Admin {
	public function indexAction() {
		try {
			$index = \Mage::getBlock("Block\Admin\Index\Index");
			$content = $this->getContent()->addChild($index, "index");
			$this->renderLayout();
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}
}