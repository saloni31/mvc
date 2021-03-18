<?php
namespace Block\Admin\Product\Edit\Tabs;

class Attribute extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	protected $attributes = null;
	protected $options = null;
	function __construct() {
		$this->setTemplate("./View/core/edit/tabs/attribute.php");
	}

	public function setAttributes($attributes = null) {
		if (!$attributes) {
			$attributes = \Mage::getModel("Model\attribute");
			$attributes = $attributes->fetchAllByData("entityType", "product", "sortOrder", "ASC");
			if (!$attributes) {
				return null;
			}
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

	public function setOptions($options = null) {
		if (!$options) {
			$options = \Mage::getModel("Model\Attribute\Option");
		}
		$this->options = $options;
		return $this;
	}

	public function getOptions() {
		if (!$this->options) {
			$this->setOptions();
		}
		return $this->options;
	}
}