<?php 

include_once 'config/init.php';

$_SESSION['user'] = null;
$_SESSION['redirect_url'] = null;

session_destroy();

session_start();

redirect('index.php', 'You have logged out', 'warning');

?>
