<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 11:11
 */

class Users extends XV_Controller
{
	private $users;

	function __construct() {
		parent::__construct();

		$this->users = new $this->model();
	}

	public function doGet($request)
	{
		$id = $request["args"][0];

		$data = $this->users->get($id);

		http_response_code(200);
		return $data;
	}

	public function doPost($request)
	{
		$data = $request["data"];

		$data = $this->users->edit($data);

		http_response_code(201);
		return $data;
	}

	public function doPut($request)
	{
		$id = $request["args"][0];
		$data = $request["data"];

		$data = $this->users->edit($id, $data);

		http_response_code(200);
		return $data;
	}

	public function doDelete($request)
	{
		$id = $request["args"][0];

		$data = $this->users->delete($id);

		http_response_code(200);
		return $data;
	}
}