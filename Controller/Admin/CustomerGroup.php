<?php
namespace Controller\Admin;
class CustomerGroup extends \Controller\Core\Admin {
	protected $customerGroup = null;

	public function setCustomerGroup($customerGroup = null) {
		if (!$customerGroup) {
			$customerGroup = \Mage::getModel("Model\CustomerGroup");
		}
		$this->customerGroup = $customerGroup;
		return $this;
	}

	public function getCustomerGroup() {
		if (!$this->customerGroup) {
			$this->setCustomerGroup();
		}
		return $this->customerGroup;
	}

	public function indexAction() {
		$this->renderLayout();
	}

	public function gridAction() {
		$grid = \Mage::getBlock("Block\Admin\CustomerGroup\Grid")->toHtml();
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
			$customerGroup = $this->getCustomerGroup();
			if ($groupId = $this->getRequest()->getGet("groupId")) {
				$customerGroup = $customerGroup->load($groupId);
				if (!$customerGroup) {
					return null;
				}
			}
			$edit = \Mage::getBlock("Block\Admin\CustomerGroup\Edit");
			$edit->setTableRow($customerGroup);
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
				throw new \Exception("Invalid Method");
			}

			$customerGroup = $this->getCustomerGroup();
			if ($groupId = $this->getRequest()->getGet("groupId")) {
				$customerGroup = $customerGroup->load($groupId);
				if (!$customerGroup) {
					throw new \Exception("No Record Available.");
				}
			} else {
				$customerGroup->createdDate = date("Y-m-d H:i:s");
			}

			$groupData = $this->getRequest()->getPost("group");
			$customerGroup->setData($groupData);
			if (!$customerGroup->save()) {
				throw new \Exception("Unable to save record.");
			}
			$this->getAdminMessage()->setSuccess("Record Saved.");
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\CustomerGroup\Grid")->toHtml();
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
		print_r(json_encode($response));
	}

	public function deleteAction() {
		try {
			$groupId = (int) $this->getRequest()->getGet("groupId");
			if (!$groupId) {
				throw new \Exception("Invalid Id.");
			}
			if (!$this->getCustomerGroup()->delete($groupId)) {
				throw new \Exception("Unable to delete record.");
			}
			$this->getAdminMessage()->setSuccess("Record Deleted.");
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\CustomerGroup\Grid")->toHtml();
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
		print_r(json_encode($response));
	}
}