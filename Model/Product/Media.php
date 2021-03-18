<?php
namespace Model\Product;

class Media extends \Model\Core\Table {
	function __construct() {
		$this->setTableName("media");
		$this->setPrimaryKey("mediaId");
	}

	public function insertMultipleRecords() {

		if (is_array($this->image)) {
			$images = $this->image;
			foreach ($images as $key => $image) {
				$this->image = $image;
				$this->insert();
			}
		} else {
			$this->save();
		}

		return $this;
	}
}