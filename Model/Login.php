<?php
namespace Model;

class Login extends \Model\Core\Table {

	function __construct() {
		$this->setTableName("admin");
		$this->setPrimaryKey("adminId");
	}

	public function login(array $data) {
		$str = [];
		foreach ($data as $key => $value) {
			$str[] = "`" . $key . "` = '" . $value . "' ";
		}
		$query = "select * from `{$this->getTableName()}` where " . implode(" and ", $str);
		$this->fetchRow($query);
		if (!$this->getData()) {
			return false;
		}
		return $this;
	}
}