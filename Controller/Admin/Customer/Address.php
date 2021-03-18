<?php
namespace Controller\Admin\Customer;
class Address extends \Controller\Core\Admin {
	protected $address = null;

	public function setAddress($address = null) {
		if (!$address) {
			$address = \Mage::getModel("Model\Customer\Address");
		}
		$this->address = $address;
		return $this;
	}

	public function getAddress() {
		if (!$this->address) {
			$this->setAddress();
		}
		return $this->address;
	}

	public function saveAction() {
		try {

			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Method.");
			}

			$customerData = $this->getRequest()->getPost("customer");
			// print_r($customerData);

			if ($customerId = $this->getRequest()->getGet("customerId")) {
				foreach ($customerData as $type => $data) {

					$address = $this->getAddress();
					$address->customerId = $customerId;
					$address->addressType = $type;
					$address->setData($data);

					if ($address->saveAddress($address)) {
						$this->getAdminMessage()->setSuccess("Record Saved.");
					}
				}
			}

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