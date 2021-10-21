<?php
//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

    @$pin = (string)$_SESSION['pin'];

//query pin table
   @$result = $db->selectPinCode($pin);
   @$row = mysqli_fetch_assoc($result);

   if(@$row) {
       echo @$row['email'];

   }

   else{

       echo  'No Records Found';
   }