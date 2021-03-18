<?php
namespace Block\Admin\CmsPage;

class Grid extends \Block\Core\Template {
	protected $pages = null;
	function __construct() {
		$this->setTemplate("./View/admin/cms_page/grid.php");
	}

	public function setPages($pages = null) {
		if (is_null($pages)) {
			$pages = \Mage::getModel("Model\CmsPage");
			$pages = $pages->fetchAll();
		}
		$this->pages = $pages;
		return $this;
	}

	public function getPages() {
		if (!$this->pages) {
			$this->setPages();
		}
		return $this->pages;
	}
}