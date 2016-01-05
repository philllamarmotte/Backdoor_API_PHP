<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * ---------------------------------------------------------------
 * Cores system require
 * ---------------------------------------------------------------
 */

require_once(BASEPATH . "loader.php");
require_once(BASEPATH . "errors.php");
require_once(BASEPATH . "config.php");
require_once(BASEPATH . "utils.php");
require_once(BASEPATH . "sessions.php");
require_once(BASEPATH . "controller.php");

/*
 * ---------------------------------------------------------------
 * Variables
 * ---------------------------------------------------------------
 */

$method = $_SERVER['REQUEST_METHOD'];

/*
 * ---------------------------------------------------------------
 * Init frameworks
 * ---------------------------------------------------------------
 */

$default = $config->load("default");

if (!is_null($default)) {
	if (array_key_exists("libraries", $default)) {
		foreach ($default["libraries"] as $library) {
			if (!load_library($library)) {
				show_error("The library " . $library . " not loaded.");
			}
		}
	}

	if (array_key_exists("config", $default)) {
		foreach ($default["config"] as $conf) {
			$config->load($conf);
		}
	}

	if (array_key_exists("models", $default)) {
		foreach ($default["models"] as $model) {
			if (!load_model($model)) {
				show_error("The model " . $model . " not loaded.");
			}
		}
	}
}

/*
 * ---------------------------------------------------------------
 * Start router
 * ---------------------------------------------------------------
 */

require_once(BASEPATH . "router.php");

/*
 * ---------------------------------------------------------------
 * Get data
 * ---------------------------------------------------------------
 */

require_once(BASEPATH . "data.php");

/*
 * ---------------------------------------------------------------
 * Execute request
 * ---------------------------------------------------------------
 */

require_once(BASEPATH . "request.php");