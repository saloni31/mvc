<?php
namespace Block\Core;
use Block\Admin\Traits\TableRow;

class Edit extends \Block\Core\Template {
	use TableRow;
	protected $tab = null;
	protected $tabClass = null;

	public function getTrait() {
		return new TableRow();
	}

	function __construct() {
		$this->setTemplate("View/core/edit.php");
	}

	public function setTabClass($tabClass) {
		$this->tabClass = $tabClass;
		return $this;
	}

	public function getTabClass() {
		return $this->tabClass;
	}

	public function setTab($tab = null) {
		if (!$tab) {
			$tab = $this->getTabClass();
		}

		$this->setTableRow($this->getTableRow());
		$this->tab = $tab;
		return $this;
	}

	public function getTab() {
		if (!$this->tab) {
			$this->setTab();
		}

		return $this->tab;
	}

	public function getTabHtml() {
		return $this->getTab()->toHtml();
	}

	public function getTabContent() {
		$tabBlock = $this->getTab();
		$tabs = $tabBlock->getTabs();

		$tab = $this->getRequest()->getGet("tab", $tabBlock->getDefaultTab());
		if (!array_key_exists($tab, $tabs)) {
			return null;
		}

		$blockName = $tabs[$tab]['block'];
		$block = \Mage::getBlock($blockName);
		// var_dump($this->getTableRow());
		$block->setTableRow($this->getTableRow());
		return $block->toHtml();
	}

	public function getFormUrl() {
		return $this->getUrl('save', null, null);
	}
}