<?php
namespace Controller\Admin;
class Admin extends \Controller\Core\Admin {
	protected $admin = null;

	public function setAdmin($admin = null) {
		if (!$admin) {
			$admin = \Mage::getModel("Model\Admin");
		}
		$this->admin = $admin;
		return $this;
	}

	public function getAdmin() {
		if (!$this->admin) {
			$this->setAdmin();
		}
		return $this->admin;
	}

	public function indexAction() {
		$this->renderLayout();
	}

	public function gridAction() {
		try {
			$admins = $this->getAdmin()->fetchAll();
			$grid = \Mage::getBlock("Block\Admin\Admin\Grid");
			// $grid->setTableRow($admins);
			$grid = $grid->toHtml();
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

		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

	public function editAction() {
		try {
			$admin = $this->getAdmin();
			if ($id = $this->getRequest()->getGet("adminId")) {
				$admin = $admin->load($id);

				if (!$admin) {
					throw new Exception("No records available.");
				}
			}
			$edit = \Mage::getBlock("Block\Admin\Admin\Edit");
			$edit->setTableRow($admin);
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
				throw new Exception("Wrong Request Method");
			}

			$admin = $this->getAdmin();
			if ($adminId = $this->getRequest()->getGet("adminId")) {
				$admin = $admin->load($adminId);
				if (!$admin) {
					$this->getAdminMessage()->setNotice("No Record Available");
				}
			} else {
				$admin->createdDate = date("Y-m-d H:i:s");
			}

			$adminData = $this->getRequest()->getPost("admin");
			if ($adminData['password']) {
				$adminData['password'] = md5($adminData['password']);
			}

			$admin->setData($adminData);
			if (!$admin->save()) {
				$this->getAdminMessage()->setFailure("Record does not inserted.");
			}
			$this->getAdminMessage()->setSuccess("Record saved.");
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
		$grid = \Mage::getBlock("Block\Admin\Admin\Grid")->toHtml();
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
			$adminId = (int) $this->getRequest()->getGet("adminId");
			if (!$adminId) {
				throw new Exception("Invalid id provided.");
			}
			$admin = $this->getAdmin();
			if (!$admin->delete($adminId)) {
				throw new Exception("Unable to delete record.");
			}
			$this->getAdminMessage()->setSuccess("Record Deleted successfully.");
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Admin\Grid")->toHtml();
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

	public function statusAction() {
		try {
			$adminId = (int) $this->getRequest()->getGet("adminId");
			$status = $this->getRequest()->getGet("status");
			if (!$adminId) {
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

			$data = ["adminId" => $adminId, "status" => $status];
			$this->getAdmin()->setData($data);
			if (!$this->getAdmin()->save()) {
				throw new Exception("Status does not updated.");
			}
			$this->getAdminMessage()->setSuccess("Status Updated.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Admin\Grid")->toHtml();
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