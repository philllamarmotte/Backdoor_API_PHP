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

	public function get($id)
	{
		$file_data = $this->read();
		$name = $this->file_name;

		if (!isset($file_data->$name)) {
			if (!isset($id)) {
				return json_encode(array());
			}
			show_error("no data available");
		}

		if (isset($id)) {
			foreach ($file_data->$name as $object_val) {
				if (isset($object_val->id) && ($object_val->id == $id)) {
					return json_encode($object_val);
				}
			}
			show_error("object not found");
		} else {
			return json_encode($file_data->$name);
		}
	}

	public function edit($id, $data)
	{
		$file_data = $this->read();
		$name = $this->file_name;

		if(!isset($id))
		{
			if(!isset($data))
				show_error("no data found");

			$data->id = uniqid();

			$file_data->{$name}[]=$data;

			return $this->save($file_data);
		}
		else {
			foreach ($file_data->$name as $object_key => $object_val) {
				if (isset($object_val->id) && ($object_val->id == $id)) {
					if (!isset($data)) {
						show_error("no data found");
					}

					$file_data->{$name}[$object_key] = $data;

					return $this->save($file_data);
				}
			}
		}

		show_error("object not found");
	}

	public function delete($id)
	{
		$file_data = $this->read();
		$name = $this->file_name;

		foreach($file_data->$name as $object_key => $object_val){
			if ($object_val->id==$id){
				array_splice($file_data->$name,$object_key,1);

				return $this->save($file_data);
			}
		}

		show_error("object not found");
	}

	protected function read()
	{
		return json_decode(@file_get_contents($this->file_path));
	}

	protected function save($data)
	{
		return file_put_contents($this->file_path, json_encode($data));
	}
}