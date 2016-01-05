<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xavierviricel
 * Date: 05/01/2016
 * Time: 09:57
 */

if (isset($controller)) {
	switch ($method) {
		case "GET":
			exit($controller->doGet($request));
			break;
		case "POST":
			exit($controller->doPost($request));
			break;
		case "PUT":
			exit($controller->doPut($request));
			break;
		case "DELETE":
			exit($controller->doDelete($request));
			break;
		default:
			http_response_code(404);
			show_error("no method found");
			break;
	}
}