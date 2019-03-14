<h3>Регистрация</h3>
<form action="<?=Config::$root?>/registration/create_new_user" method="POST" name="reg">
	<p>Ваше имя:</p>
	<p><input type="text" name="name_user"/></p>
	<p>Пароль:</p>
	<p><input type="password" name="pswd"/></p>
	<p>Повторите пароль:</p>
	<p><input type="password"/></p>
	<p>Ваша почта:</p>
	<p><input type="text" name="mail" onchange="uniqueMail();" id="mail"/><span id="unique"></span></p>
	<input type="submit" name="submit_reg" value="Зарегестрироваться"/>
</form>


		<script type="text/javascript">
		
		function uniqueMail()
		{
			//$('#unique').text('Занято');
 				var mail=document.reg.mail.value;
				//$('#unique').text(mail);
				
 				$.ajax({
					url: '<?=Config::$root?>/registration/unique_mail/',
					type: 'POST',
					data: {'mail': mail},
					cache: false,
					success: function(response){
						if(response==0)
						{
						//alert(response);
							$('#unique').text('Занято'+response);
						}
						else
						{
						//alert(response);
							$('#unique').text('Свободно'+response);
						}
					}
				});	 		
		}
		
/* 			$('#mail').change(function(){
				
  */
		</script>
<?php		
//echo "<pre>";
//print_r($data);