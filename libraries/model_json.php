<?php defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Model_JSON
{
	private $file_path;

	protected $file_name;

	function __construct()
	{
		$class = get_class($this);

		$this->file_name = strtolower(Utils::pluralize($class));
		$this->file_path = DATAPATH . "data." . $this->file_name . ".json";
	}

	abstract public function get($id);

	abstract public function edit($id, $data);

	abstract public function delete($id);

	protected function read()
	{
		return json_decode(@file_get_contents($this->file_path));
	}

	protected function save($data)
	{
		return file_put_contents($this->file_path, json_encode($data));
	}
}