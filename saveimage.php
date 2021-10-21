<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

//set random name for the image, used time() for uniqueness

$filename =  time() . '.jpg';
$filepath = 'saved_images/';

move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);

echo $filepath.$filename;

@$_SESSION['file'] = $filename;


?>
