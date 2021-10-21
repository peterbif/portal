<?php
session_start();

@$_SESSION['user'];

@$id = $_GET['id'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();




    $query_edu = "DELETE FROM awards WHERE award_id = '{$_POST['id']}'";
    $db->delete($query_edu);


?>