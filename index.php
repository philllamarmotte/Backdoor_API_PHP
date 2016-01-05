<?php

/*
 * ---------------------------------------------------------------
 * Define system constants
 * ---------------------------------------------------------------
 */

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

define('BASEPATH', $root . "/core/");
define('CONFIGPATH', $root . "/config/");
define('LIBRARYPATH', $root . "/libraries/");
define('MODELSPATH', $root . "/models/");
define('CONTROLLERSPATH', $root . "/controllers/");
define('DATAPATH', $root . "/data/");

/*
 * ---------------------------------------------------------------
 * Core system
 * ---------------------------------------------------------------
 */

require_once(BASEPATH . "core.php");
