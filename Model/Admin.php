<?php
namespace Model;
class Admin extends \Model\Core\Table {
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	function __construct() {
		parent::__construct();
		$this->setTableName("admin");
		$this->setPrimaryKey("adminId");
	}

	public function getStatusOptions() {
		return [
			self::STATUS_DISABLED => 'Disable',
			self::STATUS_ENABLED => 'Enable',
		];
	}
}