<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

 $id = @$_GET['id'];

    @$sql = "SELECT * FROM users WHERE id = '{$id}'";
    $r_query = mysqli_query($conn, $sql);

    if ($r_query) {
        $row = mysqli_fetch_array($r_query);

        $surname = $row['surname'];
        $firstname = $row['firstname'];
        $email = $row['email'];
        $phone_no = $row['phone_no'];
        $role = $row['role'];


    }



//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

if(isset($_POST['update'])){

    if(empty($_POST['role'])){

        echo '<script type="text/javascript"> alert("Select role") </script>';
    }
    else {

        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $phone_no = htmlspecialchars($_POST['phone_no']);
        @$role = htmlspecialchars($_POST['role']);

        $sql1 = "UPDATE users SET surname ='{$surname}', firstname = '{$firstname}', phone_no = '{$phone_no}', role ='{$role}' WHERE email = '{$email}'";
        $db->update($sql1);

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
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>

</head>



<body>
<div class="container-fluid">

    <div class="panel panel-danger">
        <div class="panel-heading" align="center" style="font-size: 22px; color: #ffffff; background-color: #bf1208"><img src="img/download.jpg" width="80" height="80"  align="left" >Blood Bank Unit <br /> <span style="font-size: 20px;">University Collge Hospital, Ibadan </span></div>


        <div class="panel-body" style="margin-left: 80px">
            <div class="row">
                <div class="col-lg-8 showResult">
                    <h2 align="center" style="color: #000000">Update User </h2>
                    <form  class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">


                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <label for="email">Surname:</label>
                            <input type="text" class="form-control" name="surname" value="<?php echo @$surname; ?>" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Firstname:</label>
                            <input type="text" class="form-control" name="firstname" id="pwd" value="<?php echo @$firstname; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <input type="text" class="form-control" id="pwd" name="email"  readonly value="<?php echo @$email; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="pwd">Phone No:</label>
                            <input type="text" class="form-control" id="pwd" name="phone_no" value="<?php echo @$phone_no; ?>">
                        </div>
                        <div class="form-group">
                            <label for="role" style="font-size: 20px"> Role: </label> &nbsp;&nbsp;
                            <input type="radio" class="radio-inline" name="role" value="1" size="12" <?php if(@$row['role'] && @$row['role'] == 1) {echo 'checked';}?>> <span style="font-size: 18px;"> &nbsp;&nbsp;Admin </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="radio-inline" name="role" value="2" <?php if(@$row['role'] && @$row['role'] == 2) {echo 'checked';}?>>  <span style="font-size: 18px;">&nbsp;&nbsp;User</span>
                        </div>
                        <h2 align="right"><button type="submit" name="update" class="btn btn-lg btn-danger">Update</button></h2>
                    </form>
                </div>
                <div class="col-lg-4">
                    <h2 align="right">
                        <a href="admin.php" class="btn btn-danger btn-lg">
                            <span class="glyphicon glyphicon"></span> <= Backward
                        </a>

                    </h2>


                </div>
            </div>






        </div>

        <div class="panel-footer" style="background-color: #bf1208;  position: fixed;
  right: 10px;
  bottom: 0;
  left: 10px;
  padding: 1rem;
  text-align: center; font-size: 12px; color: #ffffff";  align="center"><?php include_once ('copyright.php');?> </div>

    </div>

</div>


</body>

</html>