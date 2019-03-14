<?php
/**
*@Model_Comments class модель для комментариев
*@get_ad_by_id method возвращает массив объявлений по айди 
*@get_com_by_id возвращает массив комментариев по айди объявления
*@leave_comment кладет в БД все данные о комменте
*
*/

class Model_Comments extends Model
{
	function get_ad_by_id($id)
	{
		$sql="SELECT * FROM `ads` WHERE id='$id'";
		$query=$this->model->query($sql);
		//Упаковываем все данные в массив
	 	$data=array();
		while($row=$query->fetch_assoc()) $data[]=$row;
		return $data;
	}

	function get_com_by_id($id)
	{
		$sql="SELECT * FROM `comments` WHERE id_ad='$id' ORDER BY `date`";
		$query=$this->model->query($sql);
		//Упаковываем все данные в массив
	 	$data_ex=array();
		while($row=$query->fetch_assoc()) $data_ex[]=$row;
		return $data_ex;	
	}
	
	function leave_comment($comment, $id_ad, $date, $title_ad, $user, $ip_user)
	{
	
		$sql="INSERT INTO comments(comment, id_ad, date, title_ad, user, ip_user)
							VALUES('$comment', $id_ad, $date, '$title_ad', '$user', '$ip_user')";
		
		$query=$this->model->query($sql);
		if($query)
		{
			$sql="UPDATE `ads` SET count_com=count_com+1,date_last_com='$date' WHERE id='$id_ad'"; // увеличиваем счетчик объявлений
			$query=$this->model->query($sql);													   // date_last_com как критерий вывода объявлений
			if($query) return true;
		}
		else
		{
			return false;
		}
	}
}















