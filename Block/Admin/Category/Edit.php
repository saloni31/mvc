<?php
namespace Block\Admin\Category;

class Edit extends \Block\Core\Edit {

	public function __construct() {
		parent::__construct();
		$this->setTabClass(\Mage::getBlock("Block\Admin\Category\Edit\Tabs"));
	}

}
?>