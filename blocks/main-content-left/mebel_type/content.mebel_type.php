<?php
	$links = array(
		"/sadovaia_mebel/stoly" => "Столы",
		"/sadovaia_mebel/stylya" => "Стулья",
		"/sadovaia_mebel/skameiki" => "Скамейки",
	);
	$q = getQ();
?>
<div class="header-text">
	Виды мебели
</div>
<ul>
	<?php foreach ($links as $path => $title):?>
		<li <?=$path == "/" . $q ? "class=\"active\"" : ""?>>
			<a href="<?=$path?>"><?=$title?></a>
		</li>
	<?php endforeach; ?>
</ul>