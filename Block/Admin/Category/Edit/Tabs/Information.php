<?php
namespace Block\Admin\Category\Edit\Tabs;

class Information extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	function __construct() {
		$this->setTemplate("./View/admin/category/edit/tabs/information.php");
	}
}