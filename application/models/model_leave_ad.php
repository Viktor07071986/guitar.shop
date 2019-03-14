<?php
/**
* model_leave_ad.php
*@method get_ads возвращает массив данных из БД
*
*/

class Model_Leave_Ad extends Model
{
	
	public function leave_ad($post_title_ad, $post_leave_ad, $date, $city, $instrument, $id_user, $name_user, $mail)
	{
		$sql="INSERT INTO `ads`(`title_ad`, `ad`, `date`, `city`, `instrument`, `date_last_com`, `id_user`, `name_user`, `mail`) 
					VALUES('$post_title_ad', '$post_leave_ad', $date, '$city', '$instrument', $date, $id_user, '$name_user', '$mail')";
		//print_r($sql);
		$query=$this->model->query($sql);
		if($query) return true;
		return false;
	}

}
