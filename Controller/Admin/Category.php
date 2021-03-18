<?php
namespace Controller\Admin;

class Category extends \Controller\Core\Admin {
	protected $category = null;

	public function setCategory($category = null) {
		if ($category == null) {
			$this->category = \Mage::getModel("Model\Category");
			return $this;
		}
		$this->category = $category;
		return $this;
	}

	public function getCategory() {
		if (!$this->category) {
			$this->setCategory();
		}
		return $this->category;
	}

	public function indexAction() {
		$this->renderLayout();
	}

	public function gridAction() {
		$grid = \Mage::getBlock("Block\Admin\Category\Grid")->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Hello',
			'element' => [
				'selector' => '#contentHtml',
				'html' => $grid,
			],
		];
		header("Content-Type: application/json");
		print_r(json_encode($response));
	}

	public function editAction() {
		try {
			$category = $this->getCategory();
			if ($categoryId = $this->getRequest()->getGet("categoryId")) {
				$category = $category->load($categoryId);
				if (!$category) {
					throw new Exception("No record found.");
				}
			}
			$edit = \Mage::getBlock("Block\Admin\Category\Edit");
			$edit->setTableRow($category);
			$edit = $edit->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'Hello',
				'element' => [
					'selector' => '#contentHtml',
					'html' => $edit,
				],
			];
			header("Content-Type: application/json");
			print_r(json_encode($response));
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

	}

	public function saveAction() {
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Wrong Request Method.");
			}
			$category = $this->getCategory();

			if ($id = $this->getRequest()->getGet("categoryId")) {
				$category = $category->load($id);
				if (!$category) {
					throw new \Exception("No record available.");
				}
			} else {
				$category->createdDate = date("Y-m-d H:i:s");
			}

			$categoryData = $this->getRequest()->getPost("category");
			$category->setData($categoryData);
			if (!$category->saveData()) {
				throw new \Exception("Unable to save record.");
			}

			$this->getAdminMessage()->setSuccess("Record Saved.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Category\Grid")->toHtml();
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Hello',
			'element' => [
				[
					'selector' => '#contentHtml',
					'html' => $grid,
				],
				[
					'selector' => '#message',
					'html' => $message,
				],

			],
		];
		header("Content-Type: application/json");
		echo json_encode($response);
	}

	public function deleteAction() {
		try {
			$categoryId = (int) $this->getRequest()->getGet('categoryId');
			if (!$categoryId) {
				throw new \Exception("Invalid id passed for request.");
			}

			if (!$this->getCategory()->removeCategory($categoryId)) {
				throw new \Exception("Record does not deleted.");

			}
			$this->getAdminMessage()->setSuccess("Record Removed.");
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Category\Grid")->toHtml();
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Hello',
			'element' => [
				[
					'selector' => '#contentHtml',
					'html' => $grid,
				],
				[
					'selector' => '#message',
					'html' => $message,
				],

			],
		];
		header("Content-Type: application/json");
		echo json_encode($response);
	}

	public function statusAction() {
		try {
			$categoryId = $this->getRequest()->getGet("categoryId");
			$status = $this->getRequest()->getGet("status");

			if (!$categoryId) {
				throw new \Exception("Invalid Id.");
			}

			if (!($status == 0 || $status == 1)) {
				throw new \Exception("Invalid status value.");
			}

			if ($status == 1) {
				$status = 0;
			} else {
				$status = 1;
			}

			$data = ["categoryId" => $categoryId, "status" => $status];
			$this->getCategory()->setData($data);
			if (!$this->getCategory()->save()) {
				throw new \Exception("Status does not updated.");
			}
			$this->getAdminMessage()->setSuccess("Status changed.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Category\Grid")->toHtml();
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Hello',
			'element' => [
				[
					'selector' => '#contentHtml',
					'html' => $grid,
				],
				[
					'selector' => '#message',
					'html' => $message,
				],

			],
		];
		header("Content-Type: application/json");
		echo json_encode($response);
	}
}