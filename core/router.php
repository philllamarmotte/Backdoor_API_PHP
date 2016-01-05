<?php defined('BASEPATH') OR exit('No direct script access allowed');

$routes = explode('/', $_SERVER["REDIRECT_URL"]);

$input_controller = $routes[1];
$request = array("args"=>array_slice($routes, 2));

if (!empty($input_controller)) {
	if (load_controller($input_controller)) {
		//$class = ucfirst(Utils::pluralize($input_controller));
		$class = ucfirst($input_controller);

		$controller = new $class();
	} else {
		http_response_code(501);
		show_error("no find object name");
	}
} else {
	http_response_code(400);
	show_error("no object name");
}