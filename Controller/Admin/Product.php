<?php
namespace Controller\Admin;

class Product extends \Controller\Core\Admin {
	protected $product = null;

	protected function setProduct($product = null) {
		if (!$product) {
			$this->product = \Mage::getModel("Model\product");
			return $this;
		}
		$this->product = $product;
		return $this;

	}

	protected function getProduct() {
		if (!$this->product) {
			$this->setProduct();
		}
		return $this->product;
	}

	public function gridAction() {
		$grid = \Mage::getBlock("Block\Admin\Product\Grid")->toHtml();
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
			$product = \Mage::getModel("Model\product");
			if ($productId = $this->getRequest()->getGet("productId")) {
				$product = $product->load($productId);
				if (!$product) {
					throw new Exception("No records available.");

				}
			}
			$form = \Mage::getBlock("Block\Admin\Product\Edit");
			$form->setTableRow($product);
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
				throw new \Exception("Invalid Request Method.");
			}

			$product = $this->getProduct();
			if ($id = $this->getRequest()->getGet("productId")) {
				$product = $product->load($id);
				if (!$product) {
					throw new \Exception("Record not found");
				}
				$product->updatedDate = date("Y-m-d H:i:s");
			} else {
				$product->createdDate = date("Y-m-d H:i:s");
			}

			$productData = $this->getRequest()->getPost("product");
			$product->setData($productData);
			if (!$product->save()) {
				throw new \Exception("Record does not inserted.");
			}
			$this->getAdminMessage()->setSuccess("Record saved.");

		} catch (\Exception $e) {
			$this->getAdminMessage->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Product\Grid")->toHtml();
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
			$productId = $this->getRequest()->getGet('productId');
			if (!$productId) {
				throw new \Exception("Wrong id provided.");
			}
			if (!$this->getProduct()->delete($productId)) {
				throw new \Exception("Record does not deleted.");
			}
			$this->getAdminMessage()->setSuccess("Record Deleted.");

		} catch (\Exception $e) {
			$this->getAdminMessage->setFailure($e->getMessage());
		}
		$grid = \Mage::getBlock("Block\Admin\Product\Grid")->toHtml();
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
			$productId = (int) $this->getRequest()->getGet("productId");
			$status = $this->getRequest()->getGet("status");
			if (!$productId) {
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

			$data = ["productId" => $productId, "status" => $status];
			$this->getProduct()->setData($data);
			if (!$this->getProduct()->save()) {
				throw new \Exception("Status does not updated");
			}
			$this->getAdminMessage()->setSuccess("Status Changed.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure();
		}
		$grid = \Mage::getBlock("Block\Admin\Product\Grid")->toHtml();
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

	public function updateAction() {
		try {
			if (!$this->getRequest()->isPost()) {
				throw new Exception("Invalid Request Method.");
			}

			$productId = (int) $this->getRequest()->getGet("productId");
			if (!$productId) {
				throw new Exception("Invalid Id Provaided for process");
			}

			$productCategories = \Mage::getBlock("Model\Product\Category");
			$categoryData = $productCategories->fetchAllByData("productId", $productId);
			$data = $this->getRequest()->getPost();

			if (array_key_exists("exist", $data)) {
				$existData = $data['exist'];
				foreach ($categoryData as $key => $value) {
					if (!array_key_exists($value->categoryId, $existData)) {
						if (!$productCategories->delete($value->product_category_id)) {
							throw new Exception("Unable to remove category.");
						}
					}
				}
			} else {
				if ($categoryData) {
					foreach ($categoryData as $key => $value) {
						if (!$productCategories->delete($value->product_category_id)) {
							throw new Exception("Unable to remove category.");

						}
					}
				}
			}

			if (array_key_exists("new", $data)) {
				foreach ($data['new'] as $id => $data) {
					$productCategories->categoryId = $id;
					$productCategories->productId = $productId;
					if (!$productCategories->insert()) {
						throw new Exception("Unable to save record.");
					}
				}
			}
			$this->getAdminMessage()->setSuccess("Categories Updated successfully.");
		} catch (Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}

		$form = \Mage::getBlock("Block\Admin\Product\Edit");
		$form->setTableRow($productCategories);
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
		echo json_encode($response);
	}

}
?>