<?php
namespace Controller\Admin;
class File extends \Controller\Core\Admin {
	protected $file = null;

	public function setFile($file = null) {
		if (!$file) {
			$file = \Mage::getModel("Model\Core\File");
		}
		$this->file = $file;
		return $this;
	}

	public function getFile() {
		if (!$this->file) {
			$this->setFile();
		}
		return $this->file;
	}

	public function showAction() {
		$upload = \Mage::getBlock("Block\UploadFile");
		$this->getContent()->addChild($upload, 'upload');
		$this->renderLayout();
	}

	public function uploadAction() {
		$files = $this->getFile();
		$files->setFile("file");
		echo "<pre>";
		print_r($files->getFile());
		if ($files->moveFile()) {
			echo "success";
		} else {
			echo "Pro";
		}
	}
}
?>