<?php

class Model_Main extends Model
{

	public function get_ads()
	{
		$query=$this->model->query("SELECT * FROM `ads` ORDER BY `date_last_com` DESC LIMIT 5");
		$data=array();
		while($row=$query->fetch_assoc()) $data[]=$row;
		return $data;
	}
	
	public function more_ads($num)
	{
		$query=$this->model->query("SELECT * FROM `ads` ORDER BY `date_last_com` DESC LIMIT $num, 2");
		$data=array();
		while($row=$query->fetch_assoc()) $data[]=$row;
		return $data;		
	}
}
