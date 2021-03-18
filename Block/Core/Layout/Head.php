<?php
namespace Block\Core\Layout;

class Head extends \Block\Core\Template {
	public function __construct() {
		$this->setTemplate("./View/core/layout/head.php");
	}
}
?>
