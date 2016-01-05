<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 11:12
 */
abstract class AbstractController
{
	abstract public function doGet($request);

	abstract public function doPost($request);

	abstract public function doPut($request);

	abstract public function doDelete($request);
}

class Controller extends AbstractController
{
	public function doGet($request)
	{
		http_response_code(404);
		return json_encode(array("error" => "404 Not Found"));
	}

	public function doPost($request)
	{
		http_response_code(404);
		return json_encode(array("error" => "404 Not Found"));
	}

	public function doPut($request)
	{
		http_response_code(404);
		return json_encode(array("error" => "404 Not Found"));
	}

	public function doDelete($request)
	{
		http_response_code(404);
		return json_encode(array("error" => "404 Not Found"));
	}
}