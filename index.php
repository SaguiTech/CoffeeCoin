<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS);

/**
 * Returns an absolute path, replacing the directory separator.
 * @param string $path A relative to root path.
 * @return string An absolute path.
 */
function __ABPATH($path) { return ROOT.str_replace('/', DS, str_replace('\\', '/', $path)); }

require __ABPATH('vendor/autoload.php');

class Index {
	public static function initDB() {

		$confs = require __ABPATH('config.php');
		Flight::set('config', $confs);

		// Register class with constructor parameters
		Flight::register('db', 'medoo', [$confs['DB']]);

	}
}

Index::initDB();