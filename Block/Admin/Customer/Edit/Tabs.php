<?php
namespace Block\Admin\Customer\Edit;
class Tabs extends \Block\Core\Edit\Tabs {

	public function prepareTab() {
		$this->addTab("information",
			["label" => "Customer Information",
				"block" => "Block\Admin\Customer\Edit\Tabs\Information",
				"url" => $this->getUrl('edit', 'admin_customer', ['tab' => 'information']),
			]);
		if ($this->getRequest()->getGet("customerId")) {
			$this->addTab("addresses",
				["label" => "Addresses",
					"block" => "Block\Admin\Customer\Edit\Tabs\Addresses",
					"url" => $this->getUrl('edit', 'admin_customer', ['tab' => 'addresses']),
				]);
		}

		$this->setDefaultTab("information");
		return $this;
	}
}