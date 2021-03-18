<?php
namespace Block\Core;
class Template {
	protected $template = null;
	protected $controller = null;
	protected $children = [];
	protected $adminMessage = null;
	protected $request = null;

	public function setTemplate($template) {
		$this->template = $template;
		return $this;
	}

	public function getTemplate() {
		return $this->template;
	}

	public function setController(Controller\Core\Admin $controller) {
		$this->controller = $controller;
		return $this;
	}

	public function getController() {
		return $this->controller;
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

	public function setRequest($request = null) {
		if (!$request) {
			$request = \Mage::getModel("Model\Core\Request");
		}
		$this->request = $request;
		return $this;
	}

	public function getRequest() {
		if (!$this->request) {
			$this->setRequest();
		}
		return $this->request;
	}

	public function toHtml() {
		ob_start();
		require_once $this->getTemplate();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function getUrl($actionName = null, $controllerName = null, $params = null, $resetParams = false) {
		$url = \Mage::getModel("Model\Core\Url");
		return $url->getUrl($actionName, $controllerName, $params, $resetParams);
	}

	public function createBlock($className) {
		return \Mage::getBlock($className);
	}

	public function setChildren(array $children = []) {
		$this->children = $children;
		return $this;
	}

	public function getChildren() {
		if (!$this->children) {
			$this->setChildren();
		}
		return $this->children;
	}

	public function addChild(Template $child, $key = null) {
		if (!$key) {
			$key = get_class($child);
		}
		$this->children[$key] = $child;
		return $this;
	}

	public function getChild($key) {
		if (!array_key_exists($key, $this->children)) {
			return null;
		}
		return $this->children[$key];
	}

	public function removeChild($key) {
		if (array_key_exists($key, $children)) {
			unset($this->children[$key]);
		}
		return $this;
	}

	public function redirect($controllerName = null, $actionName = null, $params = null, $resetParams = false) {
		header("Location:{$this->getUrl($controllerName, $actionName, $params, $resetParams)}");
		exit(0);
	}

	public function validateLogin() {
		if (!$this->getAdminMessage()->isActive()) {
			$this->redirect("form", "admin_login", null, true);
		}
	}

	public function baseUrl($subUrl = null) {
		$url = \Mage::getModel("Model\Core\Url");
		return $url->baseUrl($subUrl);
	}
}
?>