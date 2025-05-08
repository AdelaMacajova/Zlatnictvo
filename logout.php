<?php
require_once('_inc/autoload.php');

$db = new Database();
$auth = new Auth($db);
$auth->logout();

header("Location: login.php");
exit;
?>