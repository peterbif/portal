<?php
session_start();

@$_SESSION['user'] = $_POST['email'];


@$_SESSION['pin'] = $_POST['pin'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


$db = new Connect();

$us = new User();



$users = User::find_all_users();
$user = mysqli_fetch_assoc($users);




$sn = 1;
do{
    $surname = $us->setSurname($user['usurname']);
    $firstname = $us->setFirstname($user['ufirstname']);
    $email = $us->setEmail($user['uemail']);
   echo $sn++ . '.  Surname:' . $us->getSurname(). ' Firstname:'. $us->getFirstname(). '  Eamil:'. $us->getEmail(). '<br />';
}while(
    $user = mysqli_fetch_assoc($users)
);


$user_id = User::find_user_id(50);


echo '<br />' . $user_id['uemail'];

if(isset($user_id)){

    //User::redirect_to('biodata.php');
}



?>