<?php
namespace Model;
class CustomerGroup extends \Model\Core\Table {
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	function __construct() {
		Parent::__construct();
		$this->setTableName("customergroup");
		$this->setPrimaryKey("groupId");
	}

	public function getDefaultOptions() {
		return [
			self::STATUS_ENABLED => 'Enabled',
			self::STATUS_DISABLED => 'Disable',
		];
	}
}