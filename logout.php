<?php
session_start();

unset($_SESSION['kariah_id']);
$_SESSION = array();
session_destroy();

header('Location: index.php');
?>