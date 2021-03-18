<?php
namespace Block\Admin\Payment;
class Grid extends \Block\core\Template {
	protected $payments = null;

	public function __construct() {
		$this->setTemplate("./View/admin/paymentMethod/grid.php");
	}

	public function setPayments($payments = null) {
		if (!$payments) {
			$payments = \Mage::getModel("model\payment");
			$payments = $payments->fetchAll();
		}
		$this->payments = $payments;
		return $this;
	}

	public function getPayments() {
		if (!$this->payments) {
			$this->setPayments();
		}
		return $this->payments;
	}
}
