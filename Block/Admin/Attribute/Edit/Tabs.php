<?php
namespace Block\Admin\Attribute\Edit;

class Tabs extends \Block\Core\Edit\Tabs {

	public function prepareTab() {
		$this->addTab("information", ["label" => "Attribute Information", "block" => "Block\Admin\Attribute\Edit\Tabs\Information", "url" => $this->getUrl('edit', 'admin_attribute', ['tab' => 'information'])]);
		if ($this->getRequest()->getGet("attributeId")) {
			$this->addTab("option", ["label" => "Attribute Options", "block" => "Block\Admin\Attribute\Edit\Tabs\Options", "url" => $this->getUrl('edit', 'admin_attribute', ['tab' => 'option'])]);
		}

		$this->setDefaultTab("information");
		return $this;
	}
}