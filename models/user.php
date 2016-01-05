<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 14:17
 */
class User extends Model_JSON
{

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
}