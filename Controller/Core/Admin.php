<?php
namespace Controller\Core;
class Admin extends Abstracts {
	protected $adminMessage = null;

	public function setLayout(Block\Core\Layout $layout = null) {
		if (!$layout) {
			$layout = \Mage::getBlock("Block\Core\Admin");
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

	public function setAdminMessage(Model\Admin\Message $adminMessage = null) {
		if (!$adminMessage) {
			$adminMessage = \Mage::getModel("Model\Admin\Message");
		}
		$this->adminMessage = $adminMessage;
		return $this;
	}

	public function getAdminMessage() {
		if (!$this->adminMessage) {
			$this->setAdminMessage();
		}
		return $this->adminMessage;
	}
}
?>