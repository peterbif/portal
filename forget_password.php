<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];


//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();



// submitting position
if(isset($_POST['login'])) {

    //query Pin_nos  table
    $query_po = $db->selectPinNo($_POST['email'],$_POST['phone_no'] );
    @$result_po = mysqli_fetch_assoc($query_po);


   if(!$result_po) {

        echo '<script type="text/javascript"> alert("No record this email or Phone NO and you can\'t change password") </script>';
    }


   else if ($_POST['new_pin'] != $_POST['new_pin2']) {

        echo '<script type="text/javascript"> alert("Password doesn\'t match, pls retype") </script>';
    }


    else if ($result_po) {
        $pin = md5($_POST['new_pin']);
        $email = $_POST['email'];
        //update into pin_nos table
        $phone = $_POST['phone_no'];
        @$sql = "UPDATE pin_nos SET pin_no ='{$pin}' WHERE email = '{$email}' AND phone_no = '{$phone}'";
        $db->update($sql);
        header('location:index.php');


    }
    else {

        echo '<script type="text/javascript"> alert("You have no record, pls generate Pin Code") </script>';
    }

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php require ('title.php');?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>

</head>



<body>
<div class="container-fluid">

    <div class="panel panel-danger">

        <?php require ('header.php');?>
        <div class="panel-body" style="margin-left: 80px">
            <div class="row">
                <div class="col-lg-10">
                    <h2 align="center">Update Your Password
                    </h2>
                </div>
                <div class="col-lg-2">
                    <h2 align="right">
                        <a href="logoutlogic.php" class="button">
                            <i class="fa fa-sign-out"></i>&nbsp; logout
                        </a>

                    </h2>
                </div>
            </div><br/><br/><br/>

            <div class="row col-sm-offset-2">
                <div class="col-lg-8">
                    <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                        <div class="input-container">
                            <i class="fa fa-envelope icon"><br /> Email</i>
                            <input class="input-field" type="text"  value="<?php echo @$_SESSION['user'];?>"  placeholder="Email your registered Email" required  name="email">
                        </div>


                        <div class="input-container">
                            <i class="fa fa-code icon"><br /> Phone NO</i>
                            <input class="input-field" type="text"   placeholder="Enter your registered Phone No" required  name="phone_no">
                        </div>


                        <div class="input-container">
                            <i class="fa fa-key icon"> <br />New Pin</i>
                            <input class="input-field" type="password"  placeholder="Enter your desired Password"  required  name="new_pin">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-key icon"><br />  New Pin</i>
                            <input class="input-field" type="password"  placeholder="Confirm your desired Password"  required  name="new_pin2">
                        </div>

                        <br />
                        <div align="right">
                            <button type="submit" name="login" class="button"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Update</button> &nbsp;&nbsp;

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    </form>



</div>





</div>



</div>
<?php require ('footer.php');?>
</div>
</div>



</body>

</html>