<?php
namespace Block\Admin\Shipping;
class Edit extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;

	public function __construct() {
		$this->setTemplate("./View/admin/shippingMethod/edit.php");
	}
}
?>