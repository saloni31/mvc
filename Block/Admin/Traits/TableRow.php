<?php
namespace Block\Admin\Traits;

trait TableRow {
	protected $tableRow = null;
	public function setTableRow(\Model\Core\Table $tableRow) {
		$this->tableRow = $tableRow;
		return $this;
	}

	public function getTableRow() {
		return $this->tableRow;
	}
}