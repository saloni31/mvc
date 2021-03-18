<?php
namespace Block\Admin\Product\Edit\Tabs;

class GroupPrice extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	protected $groupPrice = null;

	function __construct() {
		$this->setTemplate("./View/admin/product/edit/tabs/group_price.php");
	}

	public function setGroupPrice($groupPrice = null) {
		if (!$groupPrice) {
			$groupPrice = \Mage::getModel("Model\Product\GroupPrice");
			$groupPrice = $groupPrice->showData($this->getRequest()->getGet('productId'));
		}

		$this->groupPrice = $groupPrice;
		return $this;
	}

	public function getGroupPrice() {
		if (!$this->groupPrice) {
			$this->setGroupPrice();
		}
		return $this->groupPrice;
	}
}