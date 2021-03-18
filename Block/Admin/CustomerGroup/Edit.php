<?php
namespace Block\Admin\CustomerGroup;
class Edit extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	function __construct() {
		$this->setTemplate("./View/admin/customerGroup/edit.php");
	}
}