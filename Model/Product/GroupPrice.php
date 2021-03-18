<?php
namespace Model\Product;

class GroupPrice extends \Model\Core\Table {

	function __construct() {
		$this->setTableName("product_customer_group_price");
		$this->setPrimaryKey("entityId");
	}

	public function showData($id) {
		$query = "SELECT
					 cg.groupId,
					 cg.name,
					 cgp.entityId,
					 p.price,
					 cgp.groupPrice
				from `customergroup` cg
				left join `product_customer_group_price` cgp
				on cgp.groupId = cg.groupId
				and cgp.productId = {$id}
				LEFT join `product` p on p.productId = {$id}";
		return $this->fetchAll($query);
	}

	public function updatePrice($conditionArray) {
		$condition = [];
		foreach ($conditionArray as $key => $value) {
			$condition[] = "`" . $key . "` = '" . $value . "'";
		}
		$condition = implode(" and ", $condition);
		$query = "update `{$this->getTableName()}`
					set `groupPrice` = '{$this->groupPrice}'
					where {$condition}";
		if (!$this->getAdapter()->update($query)) {
			return false;
		}
		return $this;
	}

}