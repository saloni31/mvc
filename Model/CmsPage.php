<?php
namespace Model;

class CmsPage extends \Model\Core\Table {
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	function __construct() {
		$this->setTableName("cms_page");
		$this->setPrimaryKey("pageId");
	}

	public function getStatusOptions() {
		return [
			self::STATUS_DISABLED => 'Disable',
			self::STATUS_ENABLED => 'Enable',
		];
	}
}