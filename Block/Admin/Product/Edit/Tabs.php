<?php
namespace Block\Admin\Product\Edit;

class Tabs extends \Block\Core\Edit\Tabs {

	public function prepareTab() {
		$this->addTab("information",
			["label" => "Product Information",
				"block" => "Block\Admin\Product\Edit\Tabs\Information",
				"url" => $this->getUrl('edit', 'admin_product', ['tab' => 'information'])]);

		if ($this->getRequest()->getGet("productId")) {
			$this->addTab("category",
				["label" => "Product Category",
					"block" => "Block\Admin\Product\Edit\Tabs\Product_Category",
					"url" => $this->getUrl('edit', 'admin_product', ['tab' => 'category'])]);

			$this->addTab("media",
				["label" => "Media",
					"block" => "Block\Admin\Product\Edit\Tabs\Media",
					"url" => $this->getUrl('edit', 'admin_product', ['tab' => 'media'])]);

			$this->addTab("groupPrice",
				["label" => "Group Price",
					"block" => "Block\Admin\Product\Edit\Tabs\GroupPrice",
					"url" => $this->getUrl('edit', 'admin_product', ['tab' => 'groupPrice'])]);

			$this->addTab("attribute",
				["label" => "Attributes",
					"block" => "Block\Admin\Product\Edit\Tabs\Attribute",
					"url" => $this->getUrl('edit', 'admin_product', ['tab' => 'attribute'])]);
		}

		$this->setDefaultTab("information");
		return $this;
	}
}
?>