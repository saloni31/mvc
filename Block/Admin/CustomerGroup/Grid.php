<?php
namespace Block\Admin\CustomerGroup;
class Grid extends \Block\Core\Template {
	protected $customerGroup = null;
	function __construct() {
		$this->setTemplate("./View/admin/customerGroup/grid.php");
	}

	public function setCustomerGroup($customerGroup = null) {
		if (!$customerGroup) {
			$customerGroup = \Mage::getModel("Model\CustomerGroup");
			$customerGroup = $customerGroup->fetchAll();
		}
		$this->customerGroup = $customerGroup;
		return $this;
	}

	public function getCustomerGroup() {
		if (!$this->customerGroup) {
			$this->setCustomerGroup();
		}
		return $this->customerGroup;
	}
}