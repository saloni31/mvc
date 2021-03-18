<?php
namespace Model\Core;
class Message extends \Model\Core\Session {
	function __construct() {
		parent::__construct();
	}

	public function setSuccess($success) {
		$this->success = $success;
		return $this;
	}

	public function getSuccess() {
		return $this->success;
	}

	public function clearSuccess() {
		unset($this->success);
		return $this;
	}

	public function setFailure($failure) {
		$this->failure = $failure;
		return $this;
	}

	public function getFailure() {
		return $this->failure;
	}

	public function clearFailure() {
		unset($this->failure);
		return $this;
	}

	public function setNotice($notice) {
		$this->notice = $notice;
		return $this;
	}

	public function getNotice() {
		return $this->notice;
	}

	public function clearNotice() {
		unset($this->notice);
		return $this;
	}
}