<?php
namespace Controller\Admin\Product;

class GroupPrice extends \Controller\Core\Admin {

	protected $groupPrice = null;
	public function setGroupPrice($groupPrice = null) {
		if (!$groupPrice) {
			$groupPrice = \Mage::getModel("Model\Product\GroupPrice");
		}
		$this->groupPrice = $groupPrice;
		return $this;
	}

	public function getGroupPrice() {
		if (!$this->groupPrice) {
			$this->setGroupPrice();
		}
		return $this->groupPrice;
	}

	public function saveAction() {
		try {
			$groupPrice = $this->getGroupPrice();
			$priceData = $this->getRequest()->getPost('price');
			$productId = $this->getRequest()->getGet('productId');

			if (array_key_exists('new', $priceData)) {
				foreach ($priceData['new'] as $groupId => $price) {
					if ($price) {
						$groupPrice->productId = $productId;
						$groupPrice->groupPrice = $price;
						$groupPrice->groupId = $groupId;
						if (!$groupPrice->save()) {
							throw new Exception("Unable to save record.");
						}
					}
				}
			} else if (array_key_exists('exist', $priceData)) {
				foreach ($priceData['exist'] as $groupId => $price) {
					if ($groupPrice->groupPrice != $price) {
						$groupPrice->groupPrice = $price;
						$valuesArray = ['groupId' => $groupId, 'productId' => $productId];
						$groupPrice->updatePrice($valuesArray);
					}
				}
			}
			$this->getAdminMessage()->setSuccess("Record saved.");
		} catch (Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$form = \Mage::getBlock("Block\Admin\Product\Edit");
		$form->setTableRow($groupPrice);
		$form = $form->toHtml();
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Hello',
			'element' => [
				[
					'selector' => '#contentHtml',
					'html' => $form,
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