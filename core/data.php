<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 12:08
 */

if ($method != "GET" && $method != "DELETE")
{
	$input_data = json_decode(file_get_contents('php://input'));

	if($input_data == "")
	{
		show_error("no data found");
	}

	$request["data"] = $input_data;
}

if(isset($_GET["page"]) && intval($_GET["page"]) > 0)
{
	$page = intval($_GET["page"]);
}
else
{
	$page = 1;
}

$request["page"] = $page;

if(isset($_GET["limit"]) && intval($_GET["limit"]) > 0)
{
	$limit = intval($_GET["limit"]);
}
else
{
	$limit = 100;
}

$request["limit"] = $limit;