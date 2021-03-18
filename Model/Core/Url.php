<?php
namespace Model\Core;
class Url {
	protected $request = null;

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

	public function getUrl($actionName = null, $controllerName = null, $params = null, $resetParams = false) {
		$final = $this->getRequest()->getGet();
		if ($resetParams) {
			$final = [];
		}
		if ($actionName == null) {
			$actionName = $this->getRequest()->getGet('a');
		}

		if ($controllerName == null) {
			$controllerName = $this->getRequest()->getGet('c');
		}

		if ($params == null) {
			$params = [];
		}

		$final['c'] = $controllerName;
		$final['a'] = $actionName;

		$final = array_merge($final, $params);
		$queryString = http_build_query($final);
		unset($final);
		return "http://localhost/cybercom/index.php?{$queryString}";
	}

	public function baseUrl($subUrl = null) {
		$url = "http://localhost/cybercom/";
		if ($subUrl) {
			$url .= $subUrl;
		}
		return $url;
	}
}