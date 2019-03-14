<?php

class Model
{
	//private $model;

	function __construct()
	{
		$this->model=new mysqli(Config::$host, Config::$user, Config::$pswd, Config::$db);
	}
	
	// метод выборки данных
	public function get_data()
	{
		// todo
	}
	
 	function __destruct()
	{
		$this->model->close();
	}	
}