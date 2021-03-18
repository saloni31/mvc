<?php
namespace Block\Admin\Product\Edit\Tabs;

class Product_Category extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	protected $categories = null;
	function __construct() {
		$this->setTemplate("View/admin/product/edit/tabs/product-category.php");
	}

	public function setCategories($categories = null) {
		if (!$categories) {
			$categories = \Mage::getModel("Model\product\category")->fetchData();
			if (!$categories) {
				return null;
			}
		}
		$this->categories = $categories;
	}

	public function getCategories() {
		if (!$this->categories) {
			$this->setCategories();
		}
		return $this->categories;
	}

	public function getCategoryModel() {
		return \Mage::getModel("Model\Category");
	}
}