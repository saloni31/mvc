<?php
namespace Block\Admin\Product;

class Grid extends \Block\Core\Template {

	protected $products = null;

	public function __construct() {
		$this->setTemplate("./View/admin/product/grid.php");
		$this->setProducts();
	}

	protected function setProducts($products = null) {
		if (!$products) {
			$product = \Mage::getModel("Model\product");
			$products = $product->fetchAll();
		}
		$this->products = $products;
		return $this;
	}

	protected function getProducts() {
		if (!$this->products) {
			$this->setProducts();
		}
		return $this->products;
	}
}
?>