<?php
namespace Model;
class Customer extends \Model\Core\Table {
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	public function __construct() {
		parent::__construct();
		$this->setTableName("customer");
		$this->setPrimaryKey("customerId");
		$this->setForeignKey("groupId");
	}

	public function getStatusOptions() {
		return [
			self::STATUS_DISABLED => "Disable",
			self::STATUS_ENABLED => "Enable",
		];
	}

	public function getCustomerGroup() {
		$customerGroup = \Mage::getModel("Model\CustomerGroup");
		$customerGroup = $customerGroup->fetchAll();
		return $customerGroup;
	}

	public function getGroupNameById($groupId) {
		if (!$groupId) {
			return null;
		}
		$customerGroup = \Mage::getModel("Model\CustomerGroup");
		$customerGroup = $customerGroup->load($groupId);
		return $customerGroup->getData()['name'];
	}

	public function fetchCustomers() {
		$customerGroup = \Mage::getModel("Model\CustomerGroup");
		$address = \Mage::getModel("Model\customer\Address");

		$query = "
		SELECT
			`{$this->getTableName()}`.`firstName`,
			`{$this->getTableName()}`.`lastName`,
			`{$this->getTableName()}`.`email`,
			`{$this->getTableName()}`.`mobile`,
			`{$this->getTableName()}`.`status`,
			`{$this->getTableName()}`.`customerId`,
			`{$customerGroup->getTableName()}`.`name`,
			`{$address->getTableName()}`.`address`,
			`{$address->getTableName()}`.`zipcode`,
			`{$address->getTableName()}`.`addressType`

		FROM
			`{$customerGroup->getTableName()}` JOIN `{$this->getTableName()}`
		ON
			`{$customerGroup->getTableName()}`.`{$customerGroup->getPrimaryKey()}` = `{$this->getTableName()}`.`{$this->getForeignKey()}`
		LEFT JOIN
			`{$address->getTableName()}`
		ON
			`{$this->getTableName()}`.`{$this->getPrimaryKey()}` = `{$address->getTableName()}`.`{$address->getForeignKey()}` and `{$address->getTableName()}`.`addressType` = 'billing'";

		$rows = $this->getAdapter()->fetchAll($query);
		if (!$rows) {
			return false;
		}
		foreach ($rows as $key => &$value) {
			$row = new $this;
			$value = $row->setData($value);
		}
		return $rows;
	}
}
?>