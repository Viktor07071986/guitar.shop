<?php
/**
*@send_mail(string, int) первый параметр-кому отправляют, второй время до которого нужно подтверждение регистрации
*тема письма и сам текст берется из готового файла send_mail.txt
*@check строка сформированная из хеша конечного времени и закодированной почты
*почта нужна для выборки пользователя
*при прохождении по ссылке в контроллере выделяется почта, по ней выбирается пользователь и сравнивается конечное время.
*/
class Library
{
	static function clear_data($string, $int=false)
	{
		if(!$int) return strip_tags(trim($string));
		return (int)strip_tags($string);
	}
	
	static function unwraper($data)
	{
		foreach($data as $k)
			{
				$arr=$k;
			}
		return $arr;	
	}
	
	static function check_count_com($i)
	{
		if($i) return "Всего комментариев: ".$i;
		return "Пока нет комментариев";
	}
	
	static function encrypt_pswd($pswd)
	{
		self::clear_data($pswd);
 		for($i=0; $i<=50; $i++)
		{
			$enc_pswd=md5(md5($pswd).$key.$i);
		}
		return $enc_pswd;
	}
	
	static function send_mail($send_to,$date_finish)
	{	
		$file=file(Config::$root."/application/mailer/send_mail.txt");
		$obj=$file[1];
		$date_finish=sha1($date_finish);
		$enc_mail=base64_encode($send_to);
		$check=$date_finish."+".$enc_mail;
		$txt=str_replace('date_finish',$check, file_get_contents(Config::$root."/application/mailer/send_mail.txt"));
		$headers= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$send_mail=mail($send_to,$obj,$txt,$headers);
		if($send_mail) return true;  // в случае успешно отпрвки метод возвращает тру
		return false;
	}
	
	static function create_session($id_user,$mail,$name_user)
	{
		$_SESSION['id_user']=self::clear_data($id_user,true);
		$_SESSION['mail']=self::clear_data($mail);
		$_SESSION['name_user']=self::clear_data($name_user);
		
		if($_SESSION['id_user'] && $_SESSION['mail'] && $_SESSION['name_user'])
		{
			return true;
		}
		else
		{
			session_unset();
			session_destroy();
			return false;
		}
			
	}
	
	static function json_session($id_user,$mail,$name_user)
	{
		$_SESSION['id_user']=self::clear_data($id_user,true);
		$_SESSION['mail']=self::clear_data($mail);
		$_SESSION['name_user']=self::clear_data($name_user);
		
		if($_SESSION['id_user'] && $_SESSION['mail'] && $_SESSION['name_user'])
		{
			$arr=array('id_user'=>$_SESSION['id_user'],
						'mail'=>$_SESSION['mail'],
						'name_user'=>$_SESSION['name_user']
					);
			return json_encode($arr);			
		}
		else
		{
			return true;
		}
	}
	
	static function check_session()
	{
		if(self::clear_data($_SESSION['id_user'],true) && self::clear_data($_SESSION['mail']) && self::clear_data($_SESSION['name_user'])) return true;
		return false;
	}
	
}














