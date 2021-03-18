<?php
namespace Block\Admin\Admin;
class Grid extends \Block\Core\Template {
	use \Block\Admin\Traits\TableRow;
	protected $admins = null;

	public function __construct() {
		$this->setTemplate("./View/admin/admin/grid.php");
	}

	public function setAdmins($admins = null) {
		if (!$admins) {
			$admins = \Mage::getModel("Model\Admin");
			$admins = $admins->fetchAll();
		}
		$this->admins = $admins;
		return $this;
	}

	public function getAdmins() {
		if (!$this->admins) {
			$this->setAdmins();
		}
		return $this->admins;
	}
}