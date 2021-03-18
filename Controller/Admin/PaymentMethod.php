<?php
namespace Controller\Admin;
class PaymentMethod extends \Controller\Core\Admin {
	protected $payment = null;

	public function setPayment($payment = null) {
		if (!$payment) {
			$payment = \Mage::getModel("Model\payment");
		}
		$this->payment = $payment;
		return $this;
	}

	public function getPayment() {
		if (!$this->payment) {
			$this->setPayment();
		}
		return $this->payment;
	}

	public function indexAction() {
		$this->renderLayout();
	}

	public function gridAction() {
		$grid = \Mage::getBlock("Block\Admin\Payment\Grid")->toHtml();
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
			$payment = \Mage::getModel("Model\payment");
			if ($methodId = $this->getRequest()->getGet("methodId")) {
				$payment = $payment->load($methodId);
				if (!$payment) {
					throw new Exception("No record available.");

				}
			}
			$edit = \Mage::getBlock("Block\Admin\Payment\Edit");
			$edit->setTableRow($payment);
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

			$payment = $this->getPayment();
			if ($methodId = $this->getRequest()->getGet("methodId")) {
				$payment = $payment->load($methodId);
				if (!$payment) {
					throw new \Exception("No record available.");
				}
			}

			$paymentData = $this->getRequest()->getPost("payment");
			$payment->setData($paymentData);
			if (!$payment->save()) {
				throw new \Exception("Record does not inserted.");
			}
			$this->getAdminMessage()->setSuccess("Record Saved.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Payment\Grid")->toHtml();
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
			$payment = $this->getPayment();
			if (!$payment->delete($methodId)) {
				throw new \Exception("Record does not deleted.");
			}
			$this->getAdminMessage()->setSuccess("Record Deleted.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Payment\Grid")->toHtml();
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
			$payment = $this->getPayment();
			$payment->paymentMethodId = $this->getRequest()->getGet("methodId");
			$payment->status = $this->getRequest()->getGet("status");
			if ($payment->status == 1) {
				$payment->status = 0;
			} else {
				$payment->status = 1;
			}
			if (!$payment->save()) {
				throw new \Exception("Status does not updated.");
			}
			$this->getAdminMessage()->setSuccess("Status Updated.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Payment\Grid")->toHtml();
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