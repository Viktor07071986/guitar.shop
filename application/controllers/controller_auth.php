<?php
/**
* @action_login method принимает пост
* model->login($mail,$pswd) выбирает пароль по почте
*возвращает массив с сочетанием пароль-почта
*/

class Controller_Auth extends Controller
{
	function __construct()
	{
		$this->view=new View();
		$this->model=new Model_Auth();
	}
	
	function action_login()
	{
		if(isset($_POST['auth']))
		{
			$mail=Library::clear_data($_POST['mail']); //принимаем почту
			$pswd=Library::encrypt_pswd($_POST['pswd']); //принимаем пароль
			if($mail && $pswd)
			{
				$login=$this->model->login($mail,$pswd);
				
				if($login)
				{
					$data=Library::unwraper($login);
					if($pswd==$data['pswd'])
					{
						$id_user=$data['id_user'];
						$name_user=$data['name_user'];
						if(Library::create_session($id_user,$mail,$name_user))
						{
							header("Location: ".Config::$root);
							exit();						
						}

					}
					//$this->view->generate('error_view.php', 'template_view.php',$data);
						header("Location: ".$_SERVER['SCRIPT_FILENAME']);
						exit();					
				}
				else
				{
					$data="((((((((((((((((";
					$this->view->generate('error_view.php', 'template_view.php', $data);			
				}
			}
			else
			{
				header("Location: ".$_SERVER['SCRIPT_FILENAME']); //Если юзер пытается отправить пустую форму, то происходит редирект на самого себя
				exit();
			}
		}
	}
	
	function action_unlogin()
	{
		session_unset();
		session_destroy();
		header("Location: ".Config::$root);
		exit();		
	}
}











