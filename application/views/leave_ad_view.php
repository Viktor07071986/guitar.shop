<h3>Оставить объявление</h3>
<form action="leave_ad/insert" method="POST">
	<select name='city'>
		<option value='Москва'>Москва</option>
		<option value='Санкт-Петербург'>Санкт-Петербург</option>
		<option value='Нижний Новгород'>Нижний Новгород</option>
	</select><br>
	<select name='instrument'>
		<option value='Акустическая гитара'>Акустическая гитара</option>
		<option value='Бас гитара'>Бас гитара</option>
		<option value='Электро гитара'>Электро гитара</option>
	</select><br>	
	<p><input type="text" name="title_ad"/></p>
	<p><textarea name="leave_ad" rows="10"></textarea></p>
	<input type="submit" name="submit_ad" value="Оставить"/>
</form>
