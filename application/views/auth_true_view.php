		
		<b>Hello, </b><i><?=$_SESSION['name_user']?></i>
		<a href="<?=Config::$root?>/auth/unlogin">Выйти</a>
		<a href="<?=Config::$root?>">На главную</a>
		<?php require_once 'application/views/'.$content_view; ?>
		

			
	</body>
</html>