<?php
namespace Controller\Admin\Product;

class Media extends \Controller\Core\Admin {
	public function uploadAction() {
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Method");
			}

			$file = \Mage::getModel("Model\Core\File");
			$media = \Mage::getModel("Model\Product\Media");
			$file->setFile("file");
			$file->setPath("./skin/admin/images/products/");
			$folder = $file->getFolder();

			$media->productId = $this->getRequest()->getGet("productId");
			$media->image = $folder;
			if (!$file->moveFile()) {
				throw new \Exception("Unable to upload image.");
			}
			if (!$media->insertMultipleRecords()) {
				throw new \Exception("Unable to save record.");
			}
			$this->getAdminMessage()->setSuccess("Media Saved and file uploaded successfully.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$form = \Mage::getBlock("Block\Admin\Product\Edit");
		$form->setTableRow($media);
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

	public function editAction() {
		try {
			$media = \Mage::getModel("Model\Product\Media");

			$label = $this->getRequest()->getPost('label');
			$small = $this->getRequest()->getPost('small');
			$thumb = $this->getRequest()->getPost('thumb');
			$base = $this->getRequest()->getPost('base');
			$gallery = $this->getRequest()->getPost('gallery');

			if (empty($label) || empty($small) || empty($thumb) || empty($base) || empty($gallery)) {
				return null;
			}

			foreach ($label as $key => $value) {
				$media->load($key);
				$media->label = $value;
				if ($key == $small) {
					$media->small = 1;
				} else {
					$media->small = 0;
				}

				if ($key == $thumb) {
					$media->thumb = 1;
				} else {
					$media->thumb = 0;
				}

				if ($key == $base) {
					$media->base = 1;
				} else {
					$media->base = 0;
				}

				if (array_key_exists($key, $gallery)) {
					$media->gallery = 1;
				} else {
					$media->gallery = 0;
				}

				if (!$media->save()) {
					throw new \Exception("Unable to save record.");
				}
			}
			$this->getAdminMessage()->setSuccess("Records Updated successfully.");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}
		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$form = \Mage::getBlock("Block\Admin\Product\Edit");
		$form->setTableRow($media);
		$form = $form->toHtml();
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

	public function removeAction() {
		try {
			$media = \Mage::getModel("Model\Product\Media");
			$file = \Mage::getModel("Model\Core\File");
			$ids = $this->getRequest()->getPost('remove');
			foreach ($ids as $id => $value) {
				$data = $media->load($id);
				$fileName = $data->image;
				if (!$file->removeFile($fileName)) {
					throw new Exception("Unable to remove file from folder.");
				}
				if (!$media->delete($id)) {
					throw new \Exception("Unable to delete Records");
				}
				$this->getAdminMessage()->setSuccess("File removed from folder and record deleted.");
			}

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
		}

		$message = \Mage::getBlock("Block\Core\Layout\Message")->toHtml();
		$form = \Mage::getBlock("Block\Admin\Product\Edit");
		$form->setTableRow($media);
		$form = $form->toHtml();
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