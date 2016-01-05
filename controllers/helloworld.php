<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 05/01/2016
 * Time: 10:36
 */

class Helloworld extends Controller {

	function __construct() {
		header('Content-Type: application/json');
	}

	public function doGet($request)
	{
		http_response_code(200);
		return json_encode(array("message" => "Hello World"));
	}
}