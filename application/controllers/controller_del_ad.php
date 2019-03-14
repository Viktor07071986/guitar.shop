<?php
/**
* Controller_Main вызывается по умолчанию
* индексный метод возвращает массив объявлений
*/

class Controller_Del_Ad extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->model=new Model_Del_Ad();
	}
	
	function action_del_ad($id)
	{
		$id=Library::clear_data($id, true);
		$result=$this->model->del_ad($id);
		if($result)
		{
			header("Location: ".Config::$root);
			exit();
		}
		else
		{
			$this->view->generate('error_view.php', 'template_view.php');
		}
	}
}