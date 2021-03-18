<?php
namespace Controller\Admin;
class ShippingMethod extends \Controller\Core\Admin {
	protected $shippingMethod = null;

	public function setShippingMethod($shippingMethod = null) {
		if (!$shippingMethod) {
			$shippingMethod = \Mage::getModel("Model\shipping");
		}
		$this->shippingMethod = $shippingMethod;
		return $this;
	}

	public function getShippingMethod() {
		if (!$this->shippingMethod) {
			$this->setShippingMethod();
		}
		return $this->shippingMethod;
	}

	public function indexAction() {
		$this->renderLayout();
	}

	public function gridAction() {
		$grid = \Mage::getBlock("Block\Admin\shipping\Grid")->toHtml();
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
			$shippingMethod = $this->getShippingMethod();
			if ($methodId = $this->getRequest()->getGet("methodId")) {
				$shippingMethod = $shippingMethod->load($methodId);
				if (!$shippingMethod) {
					return null;
				}
			}
			$edit = \Mage::getBlock("Block\Admin\shipping\Edit");
			$edit->setTableRow($shippingMethod);
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
				throw new \Exception("Invalid request Method.");
			}

			$shippingMethod = $this->getShippingMethod();
			if ($methodId = $this->getRequest()->getGet("methodId")) {
				$shippingMethod = $shippingMethod->load($methodId);
				if (!$shippingMethod) {
					throw new \Exception("No record Available.");
				}
			}
			$shippingMethod->createdDate = date("Y-m-d H:i:s");
			$shippingData = $this->getRequest()->getPost("shipping");
			$shippingMethod->setData($shippingData);
			if (!$shippingMethod->save()) {
				throw new \Exception("Record does not inserted.");
			}
			$this->getAdminMessage()->setSuccess("Record Saved.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\shipping\Grid")->toHtml();
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
			$methodId = (int) $this->getRequest()->getGet("methodId");
			if (!$methodId) {
				throw new \Exception("Invalid id passed for operation.");
			}

			$shippingMethod = $this->getShippingMethod();
			if (!$shippingMethod->delete($methodId)) {
				throw new \Exception("Record does not deleted.");
			}
			$this->getAdminMessage()->setSuccess("Record Deleted.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\shipping\Grid")->toHtml();
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
			$shippingMethod = $this->getShippingMethod();
			$shippingMethod->shippingMethodId = $this->getRequest()->getGet("methodId");
			$shippingMethod->status = $this->getRequest()->getGet("status");

			if ($shippingMethod->status == 1) {
				$shippingMethod->status = 0;
			} else {
				$shippingMethod->status = 1;
			}

			if (!$shippingMethod->save()) {
				throw new \Exception("Status does not updated.");
			}
			$this->getAdminMessage()->setSuccess("Status Updated.");
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\shipping\Grid")->toHtml();
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
?>