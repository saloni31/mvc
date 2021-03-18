<?php
namespace Block\Admin\Admin;
class Edit extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	public function __construct() {
		$this->SetTemplate("./View/admin/admin/edit.php");
	}
}