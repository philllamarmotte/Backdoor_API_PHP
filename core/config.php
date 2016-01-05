<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: xviricel
 * Date: 16/04/15
 * Time: 13:45
 */

class Config
{
	private $config = array();

	function load($file)
	{
		$file_path = CONFIGPATH . $file . ".php";

		if (file_exists($file_path)) {
			include($file_path);
		} else {
			return null;
		}

		if (!isset($config) OR !is_array($config)) {
			show_error('Your ' . $file_path . ' file does not appear to contain a valid configuration array.');

			return null;
		}

		$this->config[$file] = isset($this->config[$file]) ? array_merge($this->config[$file], $config) : $config;

		return $config;
	}

	function get_config($name)
	{
		if(array_key_exists($name, $this->config))
		{
			return $this->config[$name];
		} else {
			return null;
		}
	}
}

$config = new Config();