<?php
namespace Block\Admin\Product\Edit\Tabs;

class Information extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;

	public function __construct() {
		$this->setTemplate("./View/admin/product/edit/tabs/information.php");
	}
}
?>