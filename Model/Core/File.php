<?php
namespace Model\Core;
class File {
	protected $file = [];
	protected $folder = null;
	protected $tempFolder = null;
	protected $path = null;

	function __construct() {

	}

	public function setFile($key) {
		if (!$_FILES) {
			return null;
		}
		$this->file = $_FILES[$key];
		return $this;
	}

	public function getFile() {
		return $this->file;
	}

	public function setPath($path) {
		$this->path = $path;
	}

	public function getPath() {
		return $this->path;
	}

	public function setFolder($folder = null) {
		if (!$folder) {
			if (is_array($this->getFile()['name'])) {
				if (sizeof($this->getFile()['name']) > 0) {
					foreach ($this->getFile()['name'] as $key => $file) {
						$fileName = time() . "_" . $file;
						$folder[] = $this->getPath() . $fileName;
					}
				}
			} else {
				$fileName = time() . "_" . $this->getFile()['name'];
				$folder = $this->getPath() . $fileName;
			}
		}
		$this->folder = $folder;
	}

	public function getFolder() {
		if (!$this->folder) {
			$this->setFolder();
		}
		return $this->folder;
	}

	public function setTempFolder($tempFolder = null) {
		if (!$tempFolder) {
			if (is_array($this->getFile()['tmp_name'])) {
				if (count($this->getFile()['tmp_name']) > 0) {
					foreach ($this->getFile()['tmp_name'] as $key => $tempName) {
						$tempFolder[] = $tempName;
					}
				}
			} else {
				$tempFolder = $this->getFile()['tmp_name'];
			}
		}
		$this->tempFolder = $tempFolder;
	}

	public function getTempFolder() {
		if (!$this->tempFolder) {
			$this->setTempFolder();
		}
		return $this->tempFolder;
	}

	public function moveFile() {
		$tempName = $this->getTempFolder();
		$folder = $this->getFolder();

		if (is_array($folder)) {
			for ($i = 0; $i < count($folder); $i++) {
				if (!move_uploaded_file($tempName[$i], $folder[$i])) {
					return false;
				}
			}
		} else {
			if (!move_uploaded_file($tempName, $folder)) {

				return false;
			}
		}

		return true;
	}

	public function removeFile($file) {
		unlink($file);
		return $this;
	}
}
?>