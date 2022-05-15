<?php
session_start();

// check to see if $_SESSION['timeout'] is set

require ('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

// @$_SESSION['pin'];



//query set time table


//query position
//@$result = $db->selectSchools();
//$row = mysqli_fetch_assoc($result);


if(isset($_POST['create'])) {

    $email = strtolower(htmlspecialchars(trim($_POST['email2'])));

    $email2 = strtolower(htmlspecialchars($_POST['email3']));
    $phone_no = htmlspecialchars($_POST['phone_no']);
    @$pin = $_POST['pass'];
    @$pin2 = $_POST['confirm_pass'];
     @$pin22 = $_POST['hidden'] or  @$pin22 = $_SESSION['pin'] ;

    @$result = $db->selectPinNo($email,$phone_no);
    $row = mysqli_fetch_assoc($result);

    @$result22 = $db->selectPinPinNo($_SESSION['pin'], $email);
    $row22 = mysqli_fetch_assoc($result22);


    if(isset($_POST['hidden'])){


        if(@$email != $email2){

            echo '<script type="text/javascript"> alert("Email doesn\'t match")</script>';
        }

    elseif(@$pin != $pin2){

        echo '<script type="text/javascript"> alert("Password doesn\'t match")</script>';
    }

    elseif($row){

        echo '<script type="text/javascript"> alert("Your Record exists")</script>';
    }

   
    else {

                //  echo $row22['pin'];

            if(!$row22) {
                $pin = md5($_POST['pass']);
                $query_pin = "INSERT INTO pin_nos (pin_no, email, phone_no, pin) VALUES ('{$pin}', '{$email}','{$phone_no}', '{$pin22}')";
                $db->insert($query_pin);


                $applicant_id = $db->last_inserted_id();


                @$query_pin_update = "UPDATE pin SET  applicant_id = '{$applicant_id}' WHERE pin ='{$pin22}'";
                @$db->updatePin($query_pin_update);
            }{

            echo '<script type="text/javascript"> alert("There is an error, this account exists!")</script>';
        }
    }
    
    

}


else{

  header("Location: index.php");
}

}











?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php require ('title.php');?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/style2.css">


    <script src="js/jquery.min.js"></script>
    <script src="js/myOpenForm.js"></script>

    <style>

        .blink{
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            30% { opacity: 0; }
        }
    </style>

</head>

<body ><!-- background="img/jamb.jpg"-->
<div class="container-fluid" >
    <?php require ('header.php');?>
    
    <br />
    
    <div class="row">
        <div class="col-lg-12" align="right">
           <a href="logoutlogic.php" class="button" style="color: #ffffff">Logout</a>
        </div>
    </div>
    
    <!--Pin form-->
    <div class="row" align="center" style="margin-top: 30px;">
        <div class="col-lg-6 col-sm-offset-3">
                    <h1 style="background-color: #FFFFFF; color: forestgreen; text-align: center">Create Account</h1>
                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                        <div class="input-container">
                            <i class="fa fa-envelope icon"> &nbsp; Email</i>
                            <input class="input-field" type="text"   placeholder="Email" value="<?php echo @$_POST['email2']; ?>" required name="email2">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-envelope icon"> &nbsp;Confirm Email</i>
                            <input class="input-field" type="text"   placeholder="Email" value="<?php echo @$_POST['email3']; ?>" required name="email3">
                        </div>


                        <div class="input-container">
                            <i class="fa fa-phone icon">&nbsp; Phone NO</i>
                            <input class="input-field" type="text" placeholder="Phone NO" value="<?php echo @$_POST['phone_no']; ?>"  required name="phone_no">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-key icon">&nbsp; Password</i>
                            <input class="input-field" type="password"   placeholder="xxxxxxxx"  required name="pass">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-key icon">&nbsp; Confirm Password</i>
                            <input class="input-field" type="password"  placeholder="xxxxxxx"  required name="confirm_pass">
                            
                            
                            
                             <input class="input-field" type="hidden"  value="<?php echo @$_SESSION['pin']; ?>" name="hidden">
                        </div>

                        <button type="submit" name="create" class="button"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Create</button> &nbsp;&nbsp;&nbsp;&nbsp;

                    </form>
                </div>
            </div><br/><br/>













</body>

</html>