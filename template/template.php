<!DOCTYPE html>
<html lang="ru" xml:lang="ru">
	<head>
		<title><?=$headerTitle?></title>

		<!-- FAVICON -->
		<link rel="shortcut icon" href="/images/favicon.ico">

		<!-- META -->
		<meta http-equiv="content-type" content="text/html; charset=windows-1251">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="keywords" content="карнизы для ванн, складная садовая мебель, мангалы, перголы, электро-плазменное полирование, полировка, сверловка цветных металлов, сверловка">
		<meta name="author" content="Фирма SNB">
		<meta name="description" content="<?=$metaDescription?>">
		<meta name='yandex-verification' content='76652e23788cd025' />

		<!-- CSS -->
		<link rel="stylesheet" href="/css/jquery.fancybox.css" type="text/css" />
		<link rel="stylesheet" href="/css/main.css" type="text/css" />
		<link rel="stylesheet" href="/css/orbit.css" type="text/css" />

		<!-- JS -->
		<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="/js/jquery.orbit.min.js"></script>
		<script type="text/javascript" src="/js/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
	</head>
	<body>
		<div class="main-wrapper">
			<div class="top-menu-wrapper">
				<div class="top-menu-content">
					<?php getBlocks("main-menu");?>
				</div>
			</div>
			<div class="header-wrapper">
				<div class="header-content">
					<div class="left block">
						<?php getBlocks("header-left");?>
					</div>
					<div class="center block">
						<?php getBlocks("header-center");?>
					</div>
					<div class="right block">
						<?php getBlocks("header-right");?>
					</div>
				</div>
				<div class="clear-fix"></div>
			</div>
			<div class="main-menu-wrapper">
				<div class="main-menu-content">
					<?php getBlocks("second-menu");?>
				</div>
			</div>
			<div class="main-content-wrapper">
				<div class="main-content">
					<div class="main-content-left">
						<?php getBlocks("main-content-left");?>
					</div>
					<div class="main-content-center <?=!checkBlocks('main-content-left') ? 'no-left' : ''?>">
						<?=$content?>
						<div class="scrolltop" title="На верх">&#9650;</div>
					</div>
					<div class="clear-fix"></div>
				</div>
			</div>
			<div class="footer-wrapper">
				<div class="footer-content">
					<div class="left block">
						<?php getBlocks("footer-left");?>
					</div>
					<div class="center block">
						<?php getBlocks("footer-center");?>
					</div>
					<div class="right block">
						<?php getBlocks("footer-right");?>
					</div>
					<div class="clear-fix"></div>
				</div>
			</div>
		</div>
	</body>
</html>