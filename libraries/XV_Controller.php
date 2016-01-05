<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 04/06/15
 * Time: 11:12
 */
class XV_Controller extends Controller
{
	public $limit;
	public $page;
	public $model;

	function __construct()
	{
		global $limit;
		global $page;

		$this->limit = $limit;
		$this->page = $page;

		$model = Utils::singularize(get_class($this));

		load_model($model);

		$this->model = ucfirst($model);

		header('Content-Type: application/json');
	}
}