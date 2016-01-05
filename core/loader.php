<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 11:40
 */

/*
 * ---------------------------------------------------------------
 * Functions
 * ---------------------------------------------------------------
 */

if (!function_exists("load_library")) {
	function load_library($file)
	{
		$file_path = LIBRARYPATH . $file . ".php";

		if (file_exists($file_path)) {
			require_once($file_path);
		} else {
			return FALSE;
		}

		return TRUE;
	}
}

if (!function_exists("load_model")) {
	function load_model($file)
	{
		$file_path = MODELSPATH . $file . ".php";

		if (file_exists($file_path)) {
			require_once($file_path);
		} else {
			return FALSE;
		}

		return TRUE;
	}
}

if (!function_exists("load_controller")) {
	function load_controller($file)
	{
		$file_path = CONTROLLERSPATH . $file . ".php";

		if (file_exists($file_path)) {
			require_once($file_path);
		} else {
			return FALSE;
		}

		return TRUE;
	}
}