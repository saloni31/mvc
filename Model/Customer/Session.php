<?php
namespace Model\Customer;

class Session extends \Model\Core\Session {
	public function __construct() {
		parent::__construct();
		$this->setNameSpace("customer");
	}
}