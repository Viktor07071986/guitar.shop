<p>Main view</p>
<?php if(Library::check_session()) {?><a href="leave_ad">Оставить объявление</a></br><?php }?>
<?php foreach($data as $ad) require "all_ads_view.php"; ?>
<?php //print_r($data) ?>

		<?php
		//риализация динамической подгрузки объявлений по 5 штук
		?>
		
		<div id="content"></div>
		
		<div id="load">
			<button>Загрузить еще</button>
			<span id="loader">Грузится</span>
		</div>		
		
<script type="text/javascript">

	$(document).ready(function(){
	   $("#loader").hide();  //Скрываем прелоадер
	});
	var num = 5; //чтобы знать с какой записи вытаскивать данные
	$(function() {
	   $("#load button").click(function(){ //Выполняем если по кнопке кликнули
	   $("#loader").show(); //Показываем прелоадер
	   $.ajax({
			  url: "<?=Config::$root?>/main/more_ads/"+num,
			  type: "POST",
			  data: {"num": num},
			  success: function(response){
				  if(response == 0){  // смотрим ответ от сервера и выполняем соответствующее действие
					 $("#loader").hide();
					 $("#load button").hide();
				  }else{
					 $("#content").append(response);
					 num = num + 5;
					 $("#loader").hide();
					 $("#load button").hide();
				  }
			   }
			});
		});
	});
	</script>


