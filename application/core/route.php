<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = Library::clear_data($routes[1]);
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = Library::clear_data($routes[2]);
		}
		
		if ( !empty($routes[3]) )
		{
			$id = Library::clear_data($routes[3]);
		}		

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		/*
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
		*/

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = $_SERVER['DOCUMENT_ROOT']."/application/models/".$model_file;
		if(file_exists($model_path))
		{
			include $_SERVER['DOCUMENT_ROOT']."/application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = $_SERVER['DOCUMENT_ROOT']."/application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include $_SERVER['DOCUMENT_ROOT']."/application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаю редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			if($id)
			{
				$controller->$action($id);
			}
			else
			{
				$controller->$action();
			}
			
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			//Route::ErrorPage404();
 	 		$url=explode('/', $_SERVER['REQUEST_URI']);
			$cntr_1=Library::clear_data($url[1]);
			$cntr_2=Library::clear_data($url[2]);
			$act=Library::clear_data($url[3]);
			if($cntr_1===$cntr_2)
			{	
				header("Location: ".Config::$root."/".$cntr_1."/".$act);
				exit();
			}
			else
			{
				Route::ErrorPage404();
			}
		}
	
	}

 	static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    } 
    
}
