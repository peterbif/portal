<?php
require_once("connection.php");

session_start();
$_SESSION['email'] = "";
session_destroy($_SESSION['email']);
header("Location: index.php");
exit;

?>
