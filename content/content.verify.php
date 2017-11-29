<?php
// error_reporting (E_ALL);

include_once('lib/kcaptcha/kcaptcha.php');

session_start();

$captcha = new KCAPTCHA();

$_SESSION['examine'] = $captcha->getKeyString();

exit();

?>