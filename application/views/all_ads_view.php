<i>Тема объявления </i><b><?=$ad['title_ad']?></b><br>
<i>Объявление </i><b><?=nl2br($ad['ad'])?></b><br>
<i>Инструмент </i><b><?=$ad['instrument']?></b><br>
<i>Город </i><b><?=$ad['city']?></b><br>
<i>Дата </i><b><?=date("m.d.y H:i:s", $ad['date'] )?></b>
<?php if(Library::check_session()) {?>
<?php if($_SESSION['mail']==$ad['mail']){?>&nbsp;&nbsp;&nbsp;<a href="del_ad/del_ad/<?=$ad['id']?>">Удалить</a><? } ?>
<?php }?>
&nbsp;&nbsp;&nbsp;<a href="comments/view/<?=$ad['id']?>">Подробнее</a>&nbsp;<i><?=Library::check_count_com($ad['count_com'])?></i><br><hr>