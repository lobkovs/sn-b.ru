<?php
	$paths = array("karnizy", "sadovaia_mebel", "mangaly", "pergoly");
	$correctPricePath = "/price";
	$q = getQ();

	foreach ($paths as $value) {
		if (eregi($value, $q)) {
			$correctPricePath = "/" . $value . "/price";
		}
	}
?>

<li><a href="<?=$correctPricePath?>" title="Цены">Цены</a></li>