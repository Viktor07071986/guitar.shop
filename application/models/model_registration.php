<?php
/**
*
*
*/

class Model_Registration extends Model
{
	
	function unique_mail($mail)
	{
		$sql="SELECT * FROM `users` WHERE mail='$mail'";
		$query=$this->model->query($sql);
		
		$data=array();
		while($row=$query->fetch_assoc()) $data[]=$row;
		if($data) return false;
		return true;			
/* 	 	if($query) return $query; //если такой почты не зарегестрированно, то продолжаем регистрацию
		return $query;  */
	}

	function create_new_user($name_user,$pswd,$mail,$date,$ip_reg,$date_finish)
	{
		$sql="INSERT INTO `users_tmp`(name_user, pswd, mail, date, ip_reg, date_finish)
						VALUES('$name_user','$pswd','$mail',$date,'$ip_reg',$date_finish)";
		$query=$this->model->query($sql);				
		if($query) return true;
		return false;
	}
	
	function check_user($mail)
	{
		$sql="SELECT * FROM `users_tmp` WHERE mail='$mail'";
		$query=$this->model->query($sql);
		$data=array();
		while($row=$query->fetch_assoc()) $data[]=$row;
		if($data) return $data;
		return false;	
	}
	
	function moving_user($id_user,$name_user,$pswd,$mail,$date,$ip_reg)
	{
		$sql="INSERT INTO `users`(name_user, pswd, mail, date, ip_reg)
						VALUES('$name_user','$pswd','$mail',$date,'$ip_reg')";
		$query=$this->model->query($sql);
		if($query)
		{
			$sql="DELETE FROM `users_tmp` WHERE id_user='$id_user'";
			$this->model->query($sql);
			return true;
		}
		else
		{
			return false;
		}
	}

}















