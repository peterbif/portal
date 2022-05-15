<?php
$inactive = 600;
// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
    $session_life = time() - $_SESSION['timeout'];
    if($session_life > $inactive)
    {header("refresh:2; index.php"); }
}
$_SESSION['timeout'] = time();

@$_SESSION['user'];

?>
