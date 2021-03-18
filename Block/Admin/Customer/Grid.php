<?php
namespace Block\Admin\Customer;

class Grid extends \Block\Core\Template {
	protected $customers = null;

	public function __construct() {
		$this->setTemplate("./View/admin/customer/grid.php");
	}

	public function setCustomers($customers = null) {
		if (!$customers) {
			$customers = \Mage::getModel("model\customer");
			$customers = $customers->fetchCustomers();
		}
		$this->customers = $customers;
		return $this;
	}

	public function getCustomers() {
		if (!$this->customers) {
			$this->setCustomers();
		}
		return $this->customers;
	}
}

?>