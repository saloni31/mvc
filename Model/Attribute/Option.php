<?php
namespace Model\Attribute;

class Option extends \Model\Core\Table {

	function __construct() {
		$this->setTableName("attribute_option");
		$this->setPrimaryKey("optionId");
	}

	public function fetchOptions($attributeId) {
		$query = "select `optionId` from `{$this->getTableName()}` where `attributeId` = '{$attributeId}'";
		return $this->fetchAll($query);
	}
}