<?php
/**
*@Model_Del_ad class удаляет объявление и 
*комментарии к этому объявлению по заданному айди
*Возвращает тру или фолс в зависимости от результата
*/
class Model_Del_Ad extends Model
{
	function del_ad($id)
	{
		$sql="DELETE FROM `ads` WHERE id='$id'";
		$query=$this->model->query($sql);
		if($query)
		{
			$sql="DELETE FROM `comments` WHERE id_ad='$id'"; //Удалив объявление, удаляем комментарии к нему.
			$query=$this->model->query($sql);
			if($query) return true;
		}
		else
		{
			return false;
		}
	}
}