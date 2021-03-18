<?php
namespace Model;

class Category extends \Model\Core\Table {
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	public function __construct() {
		parent::__construct();
		$this->setTableName("category");
		$this->setPrimaryKey("categoryId");
	}

	public function getStatusOptions() {
		return [
			self::STATUS_DISABLED => "Disable",
			self::STATUS_ENABLED => "Enable",
		];
	}

	public function getFeaturedOptions() {
		return [
			0 => 'No',
			1 => 'Yes',
		];
	}

	public function fetchCategories($categoryId = null) {
		$categories = $this->fetchAll(null, 'path', 'ASC');
		if (!$categories) {
			return null;
		}
		if ($categoryId) {
			foreach ($categories as $key => $value) {
				if ($value->categoryId == $categoryId) {
					unset($categories[$key]);
				}
				if ($value->parentCategoryId == $categoryId) {
					unset($categories[$key]);
				}
			}
		}

		return $categories;
	}

	public function getParentPath($parentId) {
		$data = $this->load($parentId);
		return $data->getData()['path'];
	}

	public function modifyPath($categoryId) {
		$category = $this->fetchAll();
		$parentPath = $this->getParentPath($categoryId);
		foreach ($category as $key => $value) {
			if ($value->parentCategoryId == $categoryId) {
				$value->path = $parentPath . "=" . $value->categoryId;
				$value->save();
			}
		}
		return $this;
	}

	public function setPath($categoryId) {
		$parentCategoryId = $this->parentCategoryId;
		if (!$parentCategoryId) {
			$category = $this->load($categoryId);
			$this->path = $this->categoryId;
		} else {
			$parentCategoryPath = $this->getParentPath($parentCategoryId);
			$category = $this->load($categoryId);

			if (!$parentCategoryPath) {
				return null;
			}
			$this->path = $parentCategoryPath . "=" . $this->categoryId;
		}
		return $this->save();
	}

	public function saveData() {
		if (array_key_exists($this->getPrimaryKey(), $this->getData())) {
			$id = $this->update();
			$this->setPath($id);
			$this->modifyPath($id);
		} else {
			$id = $this->insert();
			$this->setPath($id);
		}
		$this->load($id);
		return $this;
	}

	public function createCategoryName($path) {
		$str = '';
		$path = explode("=", $path);

		for ($i = 0; $i < count($path); $i++) {
			$data = $this->load($path[$i]);
			$str .= $this->getData()['categoryName'];
			if ($i != count($path) - 1) {
				$str .= "=>";
			}
		}
		return $str;
	}

	public function removeIdFromPath($path, $parentId) {

		$path = explode("=", $path);
		foreach ($path as $key => $value) {
			if ($path[$key] == $parentId) {
				unset($path[$key]);
			}
		}
		return join("=", $path);
	}

	public function removeCategory($categoryId) //32
	{
		$categoryData = $this->load($categoryId);
		$parentId = $this->getData()['parentCategoryId'];
		$category = $this->fetchAll();
		foreach ($category as $key => $value) {
			if ($value->parentCategoryId == $categoryId) {
				$value->parentCategoryId = $parentId;
				$value->path = $this->removeIdFromPath($value->path, $categoryId);
				$value->save();

			}

		}
		$this->delete($categoryId);
		return $this;
	}
}
?>