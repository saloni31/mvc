<?php
namespace Block\Admin\Product\Edit\Tabs;

class Media extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	protected $media = null;
	function __construct() {
		$this->setTemplate("./View/admin/product/edit/tabs/media.php");
	}

	public function setMedia($media = null) {
		if (!$media) {
			$media = \Mage::getModel("Model\Product\Media");
			$media = $media->fetchAllByData('productId', $this->getRequest()->getGet("productId"));
		}
		$this->media = $media;
	}

	public function getMedia() {
		if (!$this->media) {
			$this->setMedia();
		}
		return $this->media;
	}
}