<?php
namespace Block\Admin\Customer\Edit\Tabs;
class Information extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;

	function __construct() {
		$this->setTemplate("./View/admin/customer/edit/tabs/information.php");
	}
}