<?php
namespace Model\Core;
class Table {
	protected $tableName = null;
	protected $primaryKey = null;
	protected $foreignKey = null;
	protected $data = [];
	protected $adapter = null;

	public function __construct() {

	}

	public function setTableName($tableName) {
		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName() {
		return $this->tableName;
	}

	public function setPrimaryKey($primaryKey) {
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getPrimaryKey() {
		return $this->primaryKey;
	}

	public function setForeignKey($foreignKey) {
		$this->foreignKey = $foreignKey;
		return $this;
	}

	public function getForeignKey() {
		return $this->foreignKey;
	}

	public function setAdapter($adapter = null) {
		if (!$adapter) {
			$adapter = \Mage::getModel("model\core\adapter");
		}
		$this->adapter = $adapter;
		return $this;
	}

	public function getAdapter() {
		if (!$this->adapter) {
			$this->setAdapter();
		}
		return $this->adapter;
	}

	public function __set($name, $value) {
		$this->data[$name] = $value;
		return $this;
	}

	public function __get($name) {
		if (!array_key_exists($name, $this->data)) {
			return null;
		}
		return $this->data[$name];
	}

	public function setData(array $data) {
		$this->data = array_merge($this->data, $data);
		return $this;
	}

	public function getData() {
		return $this->data;
	}

	public function save() {
		// if pk exist then update data
		// else insert data
		// dynamic insert query.
		if (array_key_exists($this->getPrimaryKey(), $this->getData())) {
			$id = $this->update();

		} else {
			$id = $this->insert();
		}
		$this->load($id);
		return $this;
	}

	public function insert() {
		$keys = [];
		$keys = implode(",", array_keys($this->getData()));
		$values = array_values($this->getData());

		for ($i = 0; $i < count($values); $i++) {
			$values[$i] = "'" . $values[$i] . "'";
		}

		$values = implode(",", $values);
		$query = "insert into `{$this->getTableName()}` ({$keys}) values ({$values})";
		// echo $query;

		return $this->getAdapter()->insert($query);
	}

	public function update($query = null) {
		if (!$query) {
			$keys = [];
			$condition = [];
			foreach ($this->getData() as $key => $value) {
				$keys[] = "`" . $key . "` = '" . $value . "'";
			}
			array_shift($keys);
			$keys = implode(',', $keys);

			$id = $this->getData()[$this->getPrimaryKey()];
			$query = "update `{$this->getTableName()}` set {$keys} where `{$this->getPrimaryKey()}` = {$id}";
			// echo $query;
		}

		$this->getAdapter()->update($query);
		return $id;
	}

	public function load($value, $columnName = null) {
		if (!$value) {
			return false;
		}

		if (!$columnName) {
			$columnName = $this->getPrimaryKey();
		}

		$query = "select * from `{$this->getTableName()}` where `{$columnName}` = {$value}";
		$row = $this->fetchRow($query);
		return $this;
	}

	public function fetchRow($query) {
		// echo $query;
		$row = $this->getAdapter()->fetchRow($query);
		if (!$row) {
			return false;
		}
		$this->setData($row);
		return $this;
	}

	public function fetchAll($query = null, $column = null, $order = 'DESC') {
		if (!$column) {
			$column = $this->getPrimaryKey();
		}

		if (!$query) {
			$query = "select * from `{$this->getTableName()}` order by `{$column}` {$order}";
		}

		$rows = $this->getAdapter()->fetchAll($query);
		if (!$rows) {
			return false;
		}
		$collection = \Mage::getModel("Model\Core\Collection");
		foreach ($rows as $key => &$value) {
			$row = new $this;
			$collection[] = $row->setData($value);
		}

		return $collection;
	}

	public function delete($id = null, $column = null) {
		if (!$column) {
			$column = $this->getPrimaryKey();
		}
		if ($id == null) {
			if (!array_key_exists($this->getPrimaryKey(), $this->getData())) {
				return false;
			}
			$id = $this->getData()[$this->getPrimaryKey()];
		}
		$query = "delete from `{$this->getTableName()}` where `{$column}` = {$id}";
		// echo $query;
		return $this->getAdapter()->delete($query);
	}

	public function fetchAllByData($key, $value, $column = null, $order = 'DESC') {
		if (!$column) {
			$column = $this->getPrimaryKey();
		}

		$query = "select * from `{$this->getTableName()}` where `{$key}` = '{$value}' order by `{$column}` {$order}";

		$rows = $this->getAdapter()->fetchAll($query);
		if (!$rows) {
			return false;
		}
		$collection = \Mage::getModel("Model\Core\Collection");
		foreach ($rows as $key => &$value) {
			$row = new $this;
			$collection[] = $row->setData($value);
		}

		return $collection;
	}
}
?>