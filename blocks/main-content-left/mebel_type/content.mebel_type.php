<?php
	$links = array(
		"/sadovaia_mebel/stoly" => "�����",
		"/sadovaia_mebel/stylya" => "������",
		"/sadovaia_mebel/skameiki" => "��������",
	);
	$q = getQ();
?>
<div class="header-text">
	���� ������
</div>
<ul>
	<?php foreach ($links as $path => $title):?>
		<li <?=$path == "/" . $q ? "class=\"active\"" : ""?>>
			<a href="<?=$path?>"><?=$title?></a>
		</li>
	<?php endforeach; ?>
</ul>