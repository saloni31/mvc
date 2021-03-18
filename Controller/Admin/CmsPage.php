<?php
namespace Controller\Admin;

class CmsPage extends \Controller\Core\Admin {
	protected $page = null;

	public function setPage($page = null) {
		if (!$page) {
			$page = \Mage::getModel("Model\CmsPage");
		}
		$this->page = $page;
		return $this;
	}

	public function getPage() {
		if (!$this->page) {
			$this->setPage();
		}
		return $this->page;
	}

	public function gridAction() {
		try {
			$grid = \Mage::getBlock("Block\Admin\CmsPage\Grid")->toHtml();
			$response = [
				"status" => "success",
				"message" => "Grid",
				"element" => [
					"selector" => "#contentHtml",
					"html" => $grid,
				],
			];
			header("Content-Type:application/json");
			echo json_encode($response);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

	public function editAction() {
		try {
			$page = $this->getPage();
			if ($pageId = $this->getRequest()->getGet("pageId")) {
				$page = $page->load($pageId);
				if (!$page) {
					throw new Exception("No record available.");
				}
			}
			$edit = \Mage::getBlock("Block\Admin\CmsPage\Edit");
			$edit->setTableRow($page);
			$edit = $edit->toHtml();
			$response = [
				"status" => "success",
				"message" => "Edit",
				"element" => [
					"selector" => "#contentHtml",
					"html" => $edit,
				],
			];
			header("Content-Type:application/json");
			echo json_encode($response);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

	public function saveAction() {
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Request Method");
			}
			$page = $this->getPage();
			if ($pageId = $this->getRequest()->getGet("pageId")) {
				$page = $page->load($pageId);
				if (!$page) {
					throw new \Exception("No record available");
				}
			} else {
				$page->createdDate = date("Y-m-d H:i:s");
			}
			$pageData = $this->getRequest()->getPost("cms");
			$page->setData($pageData);
			if (!$page->save()) {
				throw new \Exception("Unable to save record.");
			}
			$this->getAdminMessage()->setSuccess("Record Saved.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\CmsPage\Grid")->toHtml();
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$response = [
			"status" => "success",
			"message" => "Grid",
			"element" => [
				[
					"selector" => "#contentHtml",
					"html" => $grid,
				],
				[
					"selector" => "#message",
					"html" => $message,
				],

			],
		];
		header("Content-Type:application/json");
		echo json_encode($response);
	}

	public function deleteAction() {
		try {
			$pageId = (int) $this->getRequest()->getGet("pageId");
			if (!$pageId) {
				throw new \Exception("Invalid Id given.");
			}
			if (!$this->getPage()->delete($pageId)) {
				throw new \Exception("Unable to delete record.");
			}
			$this->getAdminMessage()->setSuccess("Record Removed.");
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\CmsPage\Grid")->toHtml();
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$response = [
			"status" => "success",
			"message" => "Grid",
			"element" => [
				[
					"selector" => "#contentHtml",
					"html" => $grid,
				],
				[
					"selector" => "#message",
					"html" => $message,
				],

			],
		];
		header("Content-Type:application/json");
		echo json_encode($response);
	}
}