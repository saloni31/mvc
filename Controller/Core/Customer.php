<?php
namespace Controller\Core;
class Customer extends Abstracts {
	protected $customerMessage = null;

	public function setLayout(Block\Core\Layout $layout = null) {
		if (!$layout) {
			$layout = \Mage::getBlock("Block\Core\Customer");
		}
		$this->layout = $layout;
		return $this;
	}

	public function getLayout() {
		if (!$this->layout) {
			$this->setLayout();
		}
		return $this->layout;
	}

	public function setCustomerMessage(Model\Customer\Message $customerMessage = null) {
		if (!$customerMessage) {
			$customerMessage = \Mage::getModel("Model\Customer\Message");
		}
		$this->customerMessage = $customerMessage;
		return $this;
	}

	public function getCustomerMessage() {
		if (!$this->customerMessage) {
			$this->setAdminMessage();
		}
		return $this->adminMessage;
	}
}
?>