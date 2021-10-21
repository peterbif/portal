<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

//keep user session
@$_SESSION['user'] = $_POST['email'];



//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//query schools table
$result4 = $db->selectSchool();
$record4 = mysqli_fetch_assoc($result4);


//submit users details

if(isset($_POST['button1'])) {

    $surname =  htmlspecialchars($_POST['surname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $phone_no = htmlspecialchars($_POST['phone_no']);
    $password = htmlspecialchars($_POST['password']);
    $password1 = htmlspecialchars($_POST['password1']);
    $school= htmlspecialchars($_POST['school']);
    @$role = htmlspecialchars($_POST['role']);


        if ($password != $password1) {

            echo '<script type="text/javascript"> alert("Passwords don\'t match, re-type") </script>';
        }

        else if(empty($_POST['school'])){

            echo '<script type="text/javascript"> alert("Select School") </script>';
        }


        else {


            $query = "INSERT INTO users(surname, firstname, email, phone_no, password, role, school_id) VALUES('{$surname}', '{$firstname}', '{$email}', '{$phone_no}', '{$password}', '{$role}', '{$school}')";

            $run = $db->insert($query);
            header("location:capture.php");

        }




}

//clear all text fields
if(isset($_POST['reset'])){
    $surname = " ";
    $firstname = "";
    $email = " ";
    $phone_no =" ";
    $password = " ";
    $password1 = " ";
    @$role = " ";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CBT | UCH</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

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
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2 align="center">Register Yourself
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="index.php" class="btn btn-danger btn-lg">
                                    <span class="glyphicon glyphicon"></span> <= login
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-10">

                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="surname">Surname:</label>
                                    <input type="text" class="form-control" id="surname"  name="surname" value="<?php echo @$surname; ?>" required placeholder="Enter Surname">
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Firstname:</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo @$firstname; ?>" required placeholder="Enter Firstname">
                                </div>
                                <div class="form-group">
                                    <label for="email" > Email:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo @$email; ?>"  placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="phone_no"> Phone No:</label>
                                    <input type="text" class="form-control" name="phone_no" value="<?php echo @$phone_no; ?>" required placeholder="phone_no">
                                </div>

                                <div class="form-group">
                                    <label for="pwd"  > Password:</label>
                                    <input type="password" class="form-control" id="pwd" name="password" value="<?php  echo @$password; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="pwd"  > Re-type Password:</label>
                                    <input type="password" class="form-control" id="pwd1"  value="<?php echo @$password1;?>" name="password1" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd"> Schoool:</label>
                                    <select name="school" class="form-control">
                                        <option value="">Select School</option>
                                        <?php do{ ?>
                                            <option value="<?php echo @$record4['id'] ?>"><?php echo @$record4['school_name'];?></option>
                                        <?php }while ($record4 = mysqli_fetch_assoc($result4));?>
                                    </select>
                                </div>

                                <div class="form-group">
                                   <!-- <label for="role" style="font-size: 15px"> Role: </label> &nbsp;&nbsp;-->
                                   &nbsp;<input type="hidden" class="radio-inline" name="role" value="3" checked>
                                </div>

                                <h2 align="right">  <button type="submit" name="button1" class="btn btn-lg btn-danger">Submit</button>&nbsp;&nbsp; <button type="submit" name="reset" class="btn btn-lg btn-default">Clear</button> &nbsp;&nbsp;<a href="user1_update.php" style="color: forestgreen; font-size: 20px">Update Record</a> </h2>

                            </form>


                        </div>
                    </div>


                </div>





            </div>

            <?php require ('footer.php');?>

        </div>

    </div>


</body>

</html>