<?php
namespace Block\Admin\Attribute;

class Grid extends \Block\Core\Template {

	protected $attributes = null;

	function __construct() {
		$this->setTemplate("./View/admin/attribute/grid.php");
	}

	public function setAttributes($attributes = null) {
		if (!$attributes) {
			$attributes = \Mage::getModel("Model\Attribute");
			$attributes = $attributes->fetchAll();
		}
		$this->attributes = $attributes;
		return $this;
	}

	public function getAttributes() {
		if (!$this->attributes) {
			$this->setAttributes();
		}
		return $this->attributes;
	}
}