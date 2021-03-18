<?php
namespace Controller\Admin;

class Customer extends \Controller\Core\Admin {
	protected $customers = null;

	public function setCustomers($customers = null) {
		if (!$customers) {
			$customers = \Mage::getModel("Model\Customer");
		}
		$this->customers = $customers;
		return $this;
	}

	public function getCustomers() {
		if (!$this->customers) {
			$this->setCustomers();
		}
		return $this->customers;
	}

	public function indexAction() {
		$this->renderLayout();
	}

	public function gridAction() {
		try {
			$grid = \Mage::getBlock("Block\Admin\Customer\Grid")->toHtml();
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
			$customer = \Mage::getModel("model\Customer");
			if ($customerId = $this->getRequest()->getGet("customerId")) {
				$customer = $customer->load($customerId);
				if (!$customer) {
					return null;
				}
			}

			$form = \Mage::getBlock("Block\Admin\Customer\Edit");
			$form->setTableRow($customer);
			$form = $form->toHtml();

			$response = [
				'status' => 'success',
				'message' => 'Hello',
				'element' => [
					[
						'selector' => '#contentHtml',
						'html' => $form,
					],
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
				throw new \Exception("Invalid request Method.");
			}

			$customer = $this->getCustomers();
			if ($customerId = $this->getRequest()->getGet("customerId")) {
				$customer = $customer->load($customerId);
				if (!$customer) {
					throw new \Exception("No record available");
				}
				$customer->updatedDate = date("Y-m-d H:i:s");
			} else {
				$customer->createdDate = date("Y-m-d H:i:s");
			}

			$customerData = $this->getRequest()->getPost("customer");
			if (isset($customerData['password'])) {
				$customerData['password'] = md5($customerData['password']);
			}
			$customerData['groupId'] = (int) $customerData['groupId'];
			$customer->setData($customerData);

			if (!$customer->save()) {
				throw new \Exception("Unable to save record.");
			}
			$this->getAdminMessage()->setSuccess("Record Saved.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Customer\Grid")->toHtml();
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
			$customerId = (int) $this->getRequest()->getGet('customerId');
			if (!$customerId) {
				throw new \Exception("No record found for this id.");
			}
			$customer = $this->getCustomers();
			if (!$customer->delete($customerId)) {
				throw new \Exception("Record does not deleted.");
			}
			$this->getAdminMessage()->setSuccess("Record Deleted.");
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Customer\Grid")->toHtml();
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
			$customer = $this->getCustomers();
			$customer->customerId = $this->getRequest()->getGet("customerId");
			$customer->status = $this->getRequest()->getGet("status");
			if ($customer->status == 1) {
				$customer->status = 0;
			} else {
				$customer->status = 1;
			}

			if (!$customer->save()) {
				throw new \Exception("Status does not updated.");
			}
			$this->getAdminMessage()->setSuccess("Status Updated.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Customer\Grid")->toHtml();
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