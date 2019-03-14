<?php
/**
*
*
*/

class Model_Auth extends Model
{
	function login($mail, $pswd)
	{
		$sql="SELECT `pswd`, `name_user`, `id_user` FROM `users` WHERE mail='$mail'";
		$query=$this->model->query($sql);
		$data=array();
		while($row=$query->fetch_assoc()) $data[]=$row;
		if($data) return $data;
		return false;
	}
}















