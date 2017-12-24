<?php
	$links = array(
		"/karnizy/pryamie" => "������ � ��� ����������",
		"/karnizy/g-type" => "�-��������",
		"/karnizy/p-type" => "�-��������",
		"/karnizy/t-type" => "�-��������",
		"/karnizy/radiusnie" => "���������",
		"/karnizy/assimetrichnie" => "�������������",
		"/karnizy/ovalnie" => "��������",
		"/karnizy/kruglie" => "�������",
		"/karnizy/dlya-dusha" => "��� ����",
		"/karnizy/dlya-basseinov" => "��� ���������",
		"/karnizy/medical" => "��� �������������",
		"/karnizy/slojnie" => "������� ������������",
	);
	$q = getQ();
?>
<div class="header-text">
	����� ��������
</div>
<ul>
	<?php foreach ($links as $path => $title):?>
		<li <?=$path == "/" . $q ? "class=\"active\"" : ""?>>
			<a href="<?=$path?>"><?=$title?></a>
		</li>
	<?php endforeach; ?>
</ul>