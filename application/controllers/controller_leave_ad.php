<?php
/**
*Контроллер отвечает за добавление объявлений
*@class Model_leave_Ad - класс отвечающий за добавление объявления в БД
*@method leave_ad - метод класс Model_Leave_Ad отправляет данные в БД
*
*/
class Controller_Leave_Ad extends Controller
{
	function __construct()
	{
		$this->model=new Model_Leave_Ad();
		$this->view=new View();
	}

	function action_index()
	{
		$this->view->generate('leave_ad_view.php', 'template_view.php');
	}
	
	
	function action_insert()
	{
		//Принимаем данные с формы добавления объявлений
		$post_title_ad=$_POST['title_ad'];
		$post_title_ad=Library::clear_data($post_title_ad);
		$post_city_ad=$_POST['city'];
		$post_city_ad=Library::clear_data($post_city_ad);
		$post_instr_ad=$_POST['instrument'];
		$post_instr_ad=Library::clear_data($post_instr_ad);		
		$post_leave_ad=$_POST['leave_ad'];
		$post_leave_ad=Library::clear_data($post_leave_ad);
		
		$id_user=$_SESSION['id_user'];  //сессии создаются при авторизации
		$name_user=$_SESSION['name_user'];
		$mail=$_SESSION['mail'];
		
		$date=time();
		if(!$post_title_ad && !$post_leave_ad)
		{
			header("Location: ".$_SERVER['SCRIPT_FILENAME']); //Если юзер пытается отправить пустую форму, то происходит редирект на самого себя
			exit();			
		}else{	
			$result=$this->model->leave_ad($post_title_ad,$post_leave_ad,$date,$post_city_ad,$post_instr_ad, $id_user, $name_user, $mail);
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
}