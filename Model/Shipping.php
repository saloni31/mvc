<?php
namespace Model;
class Shipping extends \Model\Core\Table {
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	public function __construct() {
		parent::__construct();
		$this->setTableName("shippingmethod");
		$this->setPrimaryKey("shippingMethodId");
	}

	public function getStatusOptions() {
		return [
			self::STATUS_DISABLED => "Disable",
			self::STATUS_ENABLED => "Enable",
		];
	}
}
?>