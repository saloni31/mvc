<?php
namespace Controller\Core;
class Abstracts {
	protected $request = null;
	protected $layout = null;
	protected $adminMessage = null;

	public function setRequest() {
		$this->request = \Mage::getModel("Model\Core\Request");
		return $this;
	}

	public function getRequest() {
		if (!$this->request) {
			$this->setRequest();
		}
		return $this->request;
	}

	public function setLayout(Block\Core\Layout $layout = null) {
		if (!$layout) {
			$layout = \Mage::getBlock("Block\Core\Layout");
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

	public function getContent() {
		return $this->getLayout()->getChild("content");
	}

	public function renderLayout() {
		echo $this->getLayout()->toHtml();
	}

	public function redirect($actionName = null, $controllerName = null, $params = null, $resetParams = false) {
		header("Location:{$this->getUrl($actionName, $controllerName, $params, $resetParams)}");
		exit(0);
	}

	public function getUrl($actionName = null, $controllerName = null, $params = null, $resetParams = false) {
		$url = \Mage::getModel("Model\Core\Url");
		return $url->getUrl($actionName, $controllerName, $params, $resetParams);
	}
}
?>