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

<a href="<?=$correctPricePath?>" class="price">Цены</a>