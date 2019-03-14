		<form action="<?=Config::$root?>/auth/login" method="POST">
			<p>Почта: <input type="text" name="mail" id="mail" onchange="uniqueMail()"/></p>
			<p>Пароль: <input type="password" name="pswd"/></p>
			<p><input type="submit" name="auth" value="Войти"/></p>
		</form>
		<a href="<?=Config::$root?>/registration/new_user">Зарегистрироваться</a>
		<a href="<?=Config::$root?>">На главную</a>
		<?php require_once 'application/views/'.$content_view; ?>
		
		
	</body>
</html>