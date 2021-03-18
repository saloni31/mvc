<?php
namespace Block\Admin\Login;

class Form extends \Block\Core\Template {
	function __construct() {
		$this->setTemplate("./View/admin/login/form.php");
	}
}