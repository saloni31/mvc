<?php
namespace Controller\Admin;

class Login extends \Controller\Core\Admin {
	protected $loginDetails = null;

	public function setLoginDetails($loginDetails = null) {
		if (!$loginDetails) {
			$loginDetails = \Mage::getModel("Model\Login");
		}
		$this->loginDetails = $loginDetails;
		return $this;
	}

	public function getLoginDetails() {
		if (!$this->loginDetails) {
			$this->setLoginDetails();
		}
		return $this->loginDetails;
	}

	public function formAction() {
		try {
			$layout = $this->getLayout();
			$layout->setTemplate("./View/admin/layout/oneColumnLayout.php");
			$login = \Mage::getBlock("Block\Admin\Login\Form");
			$layout->getChild("content")->addChild($login, "login");
			$this->renderLayout();

		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

	public function saveAction() {
		try {
			$loginDetails = $this->getLoginDetails();
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid request method.");
			}

			$loginData = $this->getRequest()->getPost("loginData");
			if ($loginData['password']) {
				$loginData['password'] = md5($loginData['password']);
			}

			if (!$loginDetails->login($loginData)) {
				throw new \Exception("Credential Do Not Match");
			}
			$adminMessage = $this->getAdminMessage();
			$adminMessage->adminId = $loginDetails->getData()['adminId'];
			$this->getAdminMessage()->setSuccess("You Are Logged In.");
			$this->redirect("index", "admin_index");

		} catch (\Exception $e) {
			$this->getAdminMessage()->setFailure($e->getMessage());
			$this->redirect("form", "admin_login", null, true);
		}
	}

	public function logoutAction() {
		try {
			$this->getAdminMessage()->destroy();
			$this->getAdminMessage()->setSuccess("You Are Logged Out.");
			print_r($_SESSION);
			$this->redirect("form", "admin_login", null, true);

		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}
}