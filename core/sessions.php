<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 16:26
 */

if (!function_exists("create_session")) {
	/**
	 * @return bool
	 */
	function is_session_started()
	{
		if (php_sapi_name() !== 'cli') {
			if (version_compare(phpversion(), '5.4.0', '>=')) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return FALSE;
	}
}

if (!function_exists("create_session")) {
	/**
	 * @return bool
	 */
	function create_session($name, $role, $policies)
	{
		if (isset($_SESSION["valid_user"])) {
			close_session();
		}

		set_session_key("valid_user", TRUE);
		set_session_key("name", $name);
		set_session_key("role", $role);
		set_session_key("policies", $policies);

		return TRUE;
	}
}

if (!function_exists("valid_user")) {
	/**
	 * @return bool
	 */
	function valid_user()
	{
		if (is_session_started() === FALSE) session_start();

		if ($_SESSION["valid_user"]) {
			return TRUE;
		}

		return FALSE;
	}
}

if (!function_exists("get_session_key")) {
	/**
	 * @return object
	 */
	function get_session_key($key)
	{
		if (is_session_started() === FALSE) session_start();

		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}

		return null;
	}
}

if (!function_exists("set_session_key")) {
	/**
	 * @return bool
	 */
	function set_session_key($key, $data)
	{
		if (is_session_started() === FALSE) session_start();

		$_SESSION[$key] = $data;

		return FALSE;
	}
}

if (!function_exists("close_session")) {
	/**
	 * @return bool
	 */
	function close_session()
	{
		if (is_session_started() === FALSE) session_start();

		session_unset();
		session_destroy();

		return TRUE;
	}
}