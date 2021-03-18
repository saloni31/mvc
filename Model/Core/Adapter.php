<?php
namespace Model\Core;
class Adapter {
	private $config = [
		'host' => 'localhost',
		'user' => 'root',
		'password' => '',
		'database' => 'questecom'];
	private $connect = null;

	public function connection() {
		$connect = new \mysqli($this->config['host'], $this->config['user'], $this->config['password'], $this->config['database']);
		$this->setConnection($connect);
	}

	public function isConnected() {
		if (!$this->getConnection()) {
			return false;
		}
		return true;
	}

	public function setConnection(\mysqli $connect) {
		$this->connect = $connect;
		return $this;
	}

	public function getConnection() {
		return $this->connect;
	}

	public function insert($query) {
		if (!$this->isConnected()) {
			$this->connection();
		}
		$res = $this->getConnection()->query($query);
		return $this->getConnection()->insert_id;
	}

	public function update($query) {
		// echo $query;
		if (!$this->isConnected()) {
			$this->connection();
		}

		$res = $this->getConnection()->query($query);
		return $res;
	}

	public function delete($query) {
		if (!$this->isConnected()) {
			$this->connection();
		}
		$res = $this->getConnection()->query($query);
		return $res;
	}

	public function fetchRow($query) {
		if (!$this->isConnected()) {
			$this->connection();
		}
		$res = $this->getConnection()->query($query);
		return $res->fetch_assoc();
	}

	public function fetchAll($query) {
		if (!$this->isConnected()) {
			$this->connection();
		}
		$res = $this->getConnection()->query($query);
		return $res->fetch_all(MYSQLI_ASSOC);
	}

	public function alterTable($query) {
		if (!$this->isConnected()) {
			$this->connection();
		}
		return $this->getConnection()->query($query);
	}
}