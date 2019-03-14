<?php
/**
* Controller_Main вызывается по умолчанию
* индексный метод возвращает массив объявлений
*/

class Controller_Main extends Controller
{

	function __construct()
	{
		$this->model=new Model_Main();
		$this->view=new View();
	}

	function action_index()
	{	
		$data=$this->model->get_ads();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
	
	function action_more_ads($num)
	{
		$num=Library::clear_data($num, true);
		$data=$this->model->more_ads($num);
		if($data)
		{		//echo $num;	
			$this->view->dynamic_load('more_ads_view.php', $data);		
		}
		else
		{
			echo 0;	//возвращаем 0 для аякс функции
		}
	}
}