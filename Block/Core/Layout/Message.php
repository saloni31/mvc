<?php
namespace Block\Core\Layout;

class Message extends \Block\Core\Template {
	function __construct() {
		$this->setTemplate("./View/core/layout/message.php");
	}
}