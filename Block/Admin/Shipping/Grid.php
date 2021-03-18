<?php
namespace Block\Admin\Shipping;
class Grid extends \Block\Core\Template {
	protected $shippingMethods = null;

	public function __construct() {
		$this->setTemplate("./View/admin/shippingMethod/grid.php");
	}

	public function setShippingMethods($shippingMethods = null) {
		if (!$shippingMethods) {
			$shippingMethods = \Mage::getModel("model\shipping");
			$shippingMethods = $shippingMethods->fetchAll();
		}
		$this->shippingMethods = $shippingMethods;
		return $this;
	}

	public function getShippingMethods() {
		if (!$this->shippingMethods) {
			$this->setShippingMethods();
		}
		return $this->shippingMethods;
	}
}
?>