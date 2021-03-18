<?php
namespace Block\Admin\Category;

class Grid extends \Block\Core\Template {
	protected $categories = null;

	public function __construct() {
		$this->setTemplate("./View/admin/category/grid.php");
	}

	public function setCategories($categories = null) {
		if (!$categories) {
			$categories = \Mage::getModel("Model\Category");
			$categories = $categories->fetchAll(null, 'path', 'ASC');
		}
		$this->categories = $categories;
		return $this;
	}

	public function getCategories() {
		if (!$this->categories) {
			$this->setCategories();
		}
		return $this->categories;
	}
}
?>