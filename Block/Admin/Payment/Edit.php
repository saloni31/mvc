<?php
namespace Block\Admin\Payment;
class Edit extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;

	public function __construct() {
		$this->setTemplate("./View/admin/paymentMethod/edit.php");
	}
}
?>