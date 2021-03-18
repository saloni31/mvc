<?php
namespace Block\Admin\Attribute\Edit\Tabs;

class Options extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	protected $attribute = null;

	function __construct() {
		$this->setTemplate("./View/admin/attribute/edit/tabs/options.php");
	}

	public function setAttribute($attribute = null) {
		if (!$attribute) {
			$attribute = \Mage::getModel("Model\Attribute");
			if ($attributeId = $this->getRequest()->getGet("attributeId")) {
				$attribute = $attribute->load($attributeId);
				if (!$attribute) {
					return null;
				}
			}
		}
		$this->attribute = $attribute;
	}

	public function getAttribute() {
		if (!$this->attribute) {
			$this->setAttribute();
		}
		return $this->attribute;
	}
}
