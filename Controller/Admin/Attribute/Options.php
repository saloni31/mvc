<?php
namespace Controller\Admin\Attribute;

class Options extends \Controller\Core\Admin {

	public function saveAction() {
		try {
			$optionData = $this->getRequest()->getPost();
			$attributeId = $this->getRequest()->getGet('attributeId');

			if (array_key_exists('exist', $optionData)) {
				$options = \Mage::getModel("Model\Attribute\Option");
				$ids = [];
				$existData = $optionData['exist'];
				$optionsDetail = $options->fetchOptions($attributeId);
				foreach ($optionData['exist'] as $id => $value) {
					$ids[] = $id;
				}

				foreach ($optionsDetail as $key => $data) {
					if (array_key_exists($data->optionId, $optionData['exist'])) {
						$options->setData($optionData['exist'][$data->optionId]);
						$options->attributeId = $attributeId;
						$options->optionId = $data->optionId;
						if (!$options->save()) {
							throw new Exception("unable to update existing records");

						}
					} else {
						if (!$options->delete($data->optionId)) {
							throw new Exception("unable to remove record.");

						}
					}
				}

			}

			if (array_key_exists('new', $optionData)) {
				$options = \Mage::getModel("Model\Attribute\Option");
				foreach ($optionData['new'] as $index => $data) {
					$options->setData($data);
					$options->attributeId = $attributeId;
					if (!$options->insert()) {
						throw new \Exception("unable to save new records.");

					}
				}
			}
			$this->getAdminMessage()->setSuccess("Options Saved.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$form = \Mage::getBlock("Block\Admin\Attribute\Edit");
		$form->setTableRow($options);
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