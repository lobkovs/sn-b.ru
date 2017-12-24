<?php
	$links = array(
		"/karnizy/pryamie" => "Прямые и без держателей",
		"/karnizy/g-type" => "Г-образные",
		"/karnizy/p-type" => "П-образные",
		"/karnizy/t-type" => "Т-образные",
		"/karnizy/radiusnie" => "Радиусные",
		"/karnizy/assimetrichnie" => "Ассиметричные",
		"/karnizy/ovalnie" => "Овальные",
		"/karnizy/kruglie" => "Круглые",
		"/karnizy/dlya-dusha" => "Для душа",
		"/karnizy/dlya-basseinov" => "Для бассеинов",
		"/karnizy/medical" => "Для медучреждений",
		"/karnizy/slojnie" => "Сложной конфигурации",
	);
	$q = getQ();
?>
<div class="header-text">
	Формы карнизов
</div>
<ul>
	<?php foreach ($links as $path => $title):?>
		<li <?=$path == "/" . $q ? "class=\"active\"" : ""?>>
			<a href="<?=$path?>"><?=$title?></a>
		</li>
	<?php endforeach; ?>
</ul>