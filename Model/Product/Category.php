<?php
namespace Model\Product;

class Category extends \Model\Core\Table {

	function __construct() {
		$this->setTableName("Product_category");
		$this->setPrimaryKey("product_category_id");
	}

	public function fetchData() {
		$query = "SELECT c.categoryName,c.path,c.description,c.categoryId,pc.product_category_id
				FROM category c
				Left JOIN product_category pc
				ON c.categoryId = pc.categoryId
				ORDER BY c.path ASC";
		return $this->fetchAll($query);
	}

	public function fethProducts($productId) {
		$query = "select * from `{$this->getTableName()}` where `productId` = {$this->productId}";
		echo $query;
	}

	public function save() {
		$categories = $this->categoryId;
		$categoryProducts = $this->fetchAllByData('productId', $this->productId);
		echo "category";
		print_r($categories);
		echo "products";
		print_r($categoryProducts);
		// foreach ($categories as $key => $id) {

		// }
	}
}