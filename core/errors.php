<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 11:41
 */

if (!function_exists("show_error")) {
	function show_error($message)
	{
		exit(json_encode(array("error" => $message)));
	}
}