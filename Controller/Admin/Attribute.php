<?php
namespace Controller\Admin;

class Attribute extends \Controller\Core\Admin {
	protected $attribute = null;

	public function setAttribute($attribute = null) {
		if (!$attribute) {
			$attribute = \Mage::getModel("Model\Attribute");
		}
		$this->attribute = $attribute;
		return $this;
	}

	public function getAttribute() {
		if (!$this->attribute) {
			$this->setAttribute();
		}
		return $this->attribute;
	}

	public function gridAction() {
		try {

			$grid = \Mage::getBlock("Block\Admin\Attribute\Grid")->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'Grid',
				'element' => [
					[
						'selector' => '#contentHtml',
						'html' => $grid,
					],
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
			$attribute = $this->getAttribute();
			if ($attributeId = $this->getRequest()->getGet("attributeId")) {
				$attribute = $attribute->load($attributeId);
				if (!$attribute) {
					throw new Exception("No record available.");

				}
			}

			$edit = \Mage::getBlock("Block\Admin\Attribute\Edit");
			$edit->setTableRow($attribute);
			$edit = $edit->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'Edit',
				'element' => [
					[
						'selector' => '#contentHtml',
						'html' => $edit,
					],
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
			$attributeData = $this->getRequest()->getPost("attribute");
			$attribute = $this->getAttribute();
			$attribute->setData($attributeData);
			if (!$attribute->save()) {
				throw new \Exception("Unable to save Record.");
			}
			$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
			$grid = \Mage::getBlock("Block\Admin\Attribute\Grid")->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'Grid',
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
			header("Content-Type:application/json");
			echo json_encode($response);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteAction() {
		try {
			$attributeId = (int) $this->getRequest()->getGet("attributeId");
			if (!$attributeId) {
				throw new Exception("Invalid ID Provided for process.");
			}

			if (!$this->getAttribute()->removeAttribute($attributeId)) {
				throw new Exception("Unable to remove attribute.");
			}
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$grid = \Mage::getBlock("Block\Admin\Attribute\Grid")->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Grid',
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
		header("Content-Type:application/json");
		echo json_encode($response);
	}

	public function updateAction() {
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Id provided for the process.");
			}

			print_r($this->getRequest()->getPost());
		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
	}

}