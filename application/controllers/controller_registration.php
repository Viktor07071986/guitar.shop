<?php
/**
* @action_new_user method выводит вид регистрации
* 
*/

class Controller_Registration extends Controller
{

	function __construct()
	{
		$this->view=new View();
		$this->model=new Model_Registration();
	}

	function action_new_user()
	{
		$this->view->generate('registration_view.php', 'template_view.php');
		
	}
	
	function action_unique_mail()
	{
		$mail=Library::clear_data($_POST['mail']);
		$unique_mail=$this->model->unique_mail($mail);
		if($unique_mail)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	
	function action_create_new_user()
	{
		if(isset($_POST['submit_reg'])) //если есть пост...
		{
			$name_user=Library::clear_data($_POST['name_user']);
			$pswd=Library::encrypt_pswd($_POST['pswd']); //данные очищаются в методе
			$mail=Library::clear_data($_POST['mail']);
			//$unique_mail=$this->model->unique_mail($mail);
			
			
			if($name_user && $pswd && $mail) //если данные после очистки дают тру, то продолжаем регистрацию.
			{
				$ip_reg=$_SERVER['REMOTE_ADDR'];
				$date=time();
				$date_finish=time()+3600; //user должен перейти по ссылке в течении часа
				$registration=$this->model->create_new_user($name_user,$pswd,$mail,$date,$ip_reg,$date_finish);
				//$data=array($name_user,$pswd,$mail);
				if($registration)
				{
					$result=Library::send_mail($mail,$date_finish); //Описание функции смотри в библиотеке
					if($result)
					{
						$this->view->generate('pre_reg_view.php', 'template_view.php');
					}
					else
					{
						$this->view->generate('error_view.php', 'template_view.php');
					}
					
				}
				else
				{
					$this->view->generate('error_view.php', 'template_view.php');
				}
			}
			else
			{
				header("Location: ".$_SERVER['SCRIPT_FILENAME']); 
				exit();
			}
		}
	}
	
	function action_check_user($id)
	{
		$res=explode("+", $id);
		$mail=base64_decode(Library::clear_data($res[1]));
		$data=$this->model->check_user($mail);
		if($data)
		{
			//что бы избежать лишних запросов, вытаскиваем все из базы при подтверждении
			$data=Library::unwraper($data);
			$date_finish=$data['date_finish'];
			$id_user=$data['id_user'];
			$name_user=$data['name_user'];
			$pswd=$data['pswd'];
			$mail=$data['mail'];
			$date=$data['date'];
			$ip_reg=$data['ip_reg'];
			if($date_finish>=time())
			{	
				$moving_user=$this->model->moving_user($id_user,$name_user,$pswd,$mail,$date,$ip_reg);
				$this->view->generate('successful_reg_view.php', 'template_view.php', $data);
			}
			else
			{
				$data="Поздно подтвердил!!!";
				$this->view->generate('error_view.php', 'template_view.php',$data);
			}
		}
		else
		{
			header("Location: ".Config::$root); 
			exit();
		}
	}
}











