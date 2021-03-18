<?php
namespace Block\Admin\Customer\Edit\Tabs;
class Addresses extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	protected $billingAddress = null;
	protected $shippingAddress = null;

	function __construct() {
		$this->setTemplate("./View/admin/customer/edit/tabs/addresses.php");
	}

	public function setBillingAddress($billingAddress = null) {
		if (!$billingAddress) {
			$billingAddress = \Mage::getModel("model\Customer\Address");
			if ($customerId = $this->getRequest()->getGet("customerId")) {
				$billingAddress = $billingAddress->getBillingAddress($customerId);
				if (!$billingAddress) {
					return null;
				}
			}
		}
		$this->billingAddress = $billingAddress;
		return $this;
	}

	public function getBillingAddress() {
		if (!$this->billingAddress) {
			$this->setBillingAddress();
		}
		return $this->billingAddress;
	}

	public function setShippingAddress($shippingAddress = null) {
		if (!$shippingAddress) {
			$shippingAddress = \Mage::getModel("model\Customer\Address");
			if ($customerId = $this->getRequest()->getGet("customerId")) {
				$shippingAddress = $shippingAddress->getShippingAddress($customerId);
				if (!$shippingAddress) {
					return null;
				}
			}
		}
		$this->shippingAddress = $shippingAddress;
		return $this;
	}

	public function getShippingAddress() {
		if (!$this->shippingAddress) {
			$this->setShippingAddress();
		}
		return $this->shippingAddress;
	}
}