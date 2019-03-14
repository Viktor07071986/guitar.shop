<?php
/**
* @Controller_404 controller - контроллер для перехвата ошибок
* 
*/

class Controller_404 extends Controller
{
	function __construct()
	{
		$this->view=new View();
	}
	
	function action_index()
	{
		$data=$_SERVER['HTTP_REFERER'];
		$this->view->generate('error_view.php', 'template_view.php',$data);			
	}
}











