<?php extract($data) ?>

<h3><?=$title_ad?></h3>
<p><?=nl2br($ad)?></p>
<p><?=$instrument?></p>
<p><?=$city?></p>
<i>Дата создания: </i><b><?=$date?></b><hr>

<?php foreach($data_ex as $com){ ?>

<i>Юзер <?=$com['user']?> с ip <?=$com['ip_user']?> </i>Прокомментировал:
<p><?=nl2br($com['comment'])?></p>
<b>Дата: </b><i><?=date("m.d.y H:i:s",$com['date'])?></i>
<hr>

<?php } ?>
<hr>
<?php if(Library::check_session()) {?>

<h3>Оставить комментарий</h3>
<form action="<?=Config::$root?>/comments/leave_comment/<?=$id?>" method="POST">
	<p><textarea name="leave_comment" rows="10"></textarea></p>
	<p><input type="hidden" name="title_ad" value="<?=$title_ad?>"></p>
	<input type="submit" name="submit_com" value="Оставить свой комментарий"/>
</form>

<?php } else {?>

<h3>Вы не можете оставлять комментарий</h3>

<?php }?>

