<?php
namespace Model;

class Attribute extends \Model\Core\Table {

	function __construct() {
		$this->setTableName("attribute");
		$this->setPrimaryKey("attributeId");
	}

	public function getEntityType() {
		return [
			'Product' => 'Product',
			'Category' => 'Category',
		];
	}

	public function getInputType() {
		return [
			'text' => 'textbox',
			'select' => 'dropdown',
			'textarea' => 'textarea',
			'checkbox' => 'checkbox',
			'radio' => 'radio',
			'multiSelect' => 'multiSelect',
			'date' => 'date',
			'number' => 'number',
		];
	}

	public function getBackendType() {
		return [
			'INT' => 'number',
			'VARCHAR(255)' => 'string',
			'TEXT' => 'text',
			'DECIMAL' => 'decimal',
			'DATETIME' => 'date-time',
			'DATE' => 'date',
		];
	}

	public function getOptions() {
		if (!$this->attributeId) {
			return false;
		}
		$query = "SELECT *
				FROM `attribute_option`
				WHERE `attributeId` = '{$this->attributeId}'
				ORDER BY `sortOrder` ASC";
		return \Mage::getModel("Model\Attribute\Option")->fetchAll($query);
	}

	public function save() {
		if ($this->insert()) {
			$query = "ALTER TABLE `{$this->entityType}` ADD `{$this->code}` {$this->backendType} ";
			if (!$this->getAdapter()->alterTable($query)) {
				return false;
			}
		} else {
			return false;
		}
		return true;
	}

	public function removeAttribute($id) {
		$attribute = $this->load($id);
		if (!$attribute) {
			return false;
		}

		$query = "ALTER TABLE `{$attribute->entityType}` DROP COLUMN `{$attribute->code}`";
		if ($this->getAdapter()->alterTable($query)) {
			if (!$this->delete($id)) {
				return false;
			}
		}
		return true;
	}
}