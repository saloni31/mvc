<?php
namespace Model\Customer;
class Address extends \Model\Core\Table {

	function __construct() {
		parent::__construct();
		$this->setTableName("address");
		$this->setPrimaryKey("addressId");
		$this->setForeignKey("customerId");
	}

	public function saveAddress($address) {
		$query = "select `addressId` from `address` where `customerId` = '{$address->customerId}' and `addressType` = '{$address->addressType}'";
		$data = $this->fetchRow($query);
		if (empty($data)) {
			$address->addressId = null;
			if (!$address->insert()) {
				return false;
			}
		} else {
			if (!$address->save()) {
				return false;
			}
		}
		return false;
	}

	public function getBillingAddress($customerId) {
		$query = "select * from address where customerId = '{$customerId}' and addressType = 'billing'";
		return $this->fetchRow($query);
	}

	public function getShippingAddress($customerId) {
		$query = "select * from address where customerId = '{$customerId}' and addressType = 'shipping'";
		return $this->fetchRow($query);
	}

}