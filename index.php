<?php

function autoload($className) {
	$filename = $className . ".php";
	if (file_exists($filename)) {
		require $filename;
	}
}

spl_autoload_register("autoload");

class Mage {
	public static function init() {
		Controller\Core\Front::init();
	}

	public static function buildClassName($className, $ton = false) {
		$className = ucwords(str_replace("\\", " ", $className));
		$className = str_replace(" ", "\\", $className);
		if (!$ton) {
			return new $className();
		}

		if (!self::getRegistery($className)) {
			return self::setRegistery($className, new $className());
		}
		return self::getRegistery($className);

	}

	public static function getController($controllerName, $ton = false) {
		return self::buildClassName($controllerName, $ton);
	}

	public static function getModel($modelName, $ton = false) {
		return self::buildClassName($modelName, $ton);
	}

	public static function getBlock($blockName, $ton = false) {
		return self::buildClassName($blockName, $ton);
	}

	public static function setRegistery($key, $value) {
		$GLOBALS[$key] = $value;
	}

	public function getRegistery($key) {
		if (!array_key_exists($key, $GLOBALS)) {
			return null;
		}
		return $GLOBALS[$key];
	}
}
Mage::init()

?>