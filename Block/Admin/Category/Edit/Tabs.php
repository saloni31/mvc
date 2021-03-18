<?php
namespace Block\Admin\Category\Edit;

class Tabs extends \Block\Core\Edit\Tabs {

	public function prepareTab() {
		$this->addTab("information",
			["label" => "Category Information",
				"block" => "Block\Admin\Category\Edit\Tabs\Information",
				"url" => $this->getUrl("edit", null, ['tab' => 'information']),
			]);

		if ($this->getRequest()->getGet("categoryId")) {
			$this->addTab("attribute",
				["label" => "Attributes",
					"block" => "Block\Admin\Category\Edit\Tabs\Attribute",
					"url" => $this->getUrl("edit", null, ['tab' => 'attribute']),
				]);
		}
		$this->setDefaultTab("information");
		return $this;
	}
}