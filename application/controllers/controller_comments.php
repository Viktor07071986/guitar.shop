<?php
/*
*@action_view method отвечает за вывод выбранного объявления по айди
*возвращает массив с объявлением и все комментарии
*
*@action_leave_comment method передает методу модели leave_comment
*все параметры комментария
*
*/

class Controller_Comments extends Controller
{
	function __construct()
	{
		$this->model=new Model_Comments();
		$this->view=new View();
	}
	
	function action_view($id)
	{
		$id=Library::clear_data($id, true);
		$data=$this->model->get_ad_by_id($id);
		$data=Library::unwraper($data);
		$data_ex=$this->model->get_com_by_id($id);
		$this->view->generate('ad_view.php', 'template_view.php', $data, $data_ex);
	}
	
	function action_leave_comment($id)
	{
		if(isset($_POST['submit_com']))								 //если был послан комментарий
		{
			$comment=Library::clear_data($_POST['leave_comment']);
			if(!$comment)             								 //если комментарий пустой перенаправляем на самого себя
			{
				header("Location: ".$_SERVER['SCRIPT_FILENAME']); 
				exit();			
			}
			$title_ad=Library::clear_data($_POST['title_ad']);
			$date=time();
			$user="admin";
			$ip_user=$_SERVER['REMOTE_ADDR'];
			$id_ad=Library::clear_data($id, true);
			$result=$this->model->leave_comment($comment, $id_ad, $date, $title_ad, $user, $ip_user);
			if($result)
			{
				header("Location: ".Config::$root."/comments/view/".$id_ad); //если коммент удачно добавлен (вызывается метод action_view
				exit();														 //и ему передается айди выбранного объявления	
			}
			else
			{
				$this->view->generate('error_view.php', 'template_view.php');
			}
		}
	}
}