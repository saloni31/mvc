<?php
namespace Block\Core\Edit;

class Tabs extends \Block\Core\Template {
	protected $tabs = [];
	protected $defaultTab = null;

	function __construct() {
		// parent::__construct();
		$this->setTemplate("./View/core/edit/tabs.php");
		$this->prepareTab();
	}

	public function prepareTab() {
		return $this;
	}

	public function setTabs(array $tabs) {
		$this->tabs = $tabs;
		return $this;
	}

	public function getTabs() {
		return $this->tabs;
	}

	public function addTab($key, $tab = []) {
		$this->tabs[$key] = $tab;
		return $this;
	}

	public function getTab($key) {
		return $this->tabs[$key];
	}

	public function unsetTab($key) {
		unset($this->tabs[$key]);
		return $this;
	}

	public function setDefaultTab($tab) {
		$this->defaultTab = $tab;
	}

	public function getDefaultTab() {
		return $this->defaultTab;
	}

}