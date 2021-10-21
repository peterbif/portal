<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

if(isset($_POST['button_search'])) {

    if (empty($_POST['search'])) {

        echo '<script type="text/javascript"> alert("Enter Email to search for records") </script>';
    } //search records using email

    else {

        @$term = htmlspecialchars($_POST['search']);

        @$sql = "SELECT * FROM users WHERE email = '{$term}'";
        $r_query = mysqli_query($conn, $sql);

        if ($r_query) {
            $row = mysqli_fetch_array($r_query);

            $surname = $row['surname'];
            $firstname = $row['firstname'];
            $email = $row['email'];
            $phone_no = $row['phone_no'];
            $role = $row['role'];


        }
        if (!$row['email']) {

            echo '<script type="text/javascript"> alert("Record doesn\'t exist") </script>';
        }
    }


}
//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//query schools table
$result4 = $db->selectSchool();
$record4 = mysqli_fetch_assoc($result4);

if(isset($_POST['update'])){


    if(empty($_POST['surname'])){

        echo '<script type="text/javascript"> alert("Enter Surname") </script>';
    }
    elseif(empty($_POST['firstname'])){

        echo '<script type="text/javascript"> alert("Enter Firstname") </script>';
    }
    elseif(empty($_POST['email'])){

        echo '<script type="text/javascript"> alert("Enter Email") </script>';
    }
    elseif(empty($_POST['phone_no'])){

        echo '<script type="text/javascript"> alert("Enter Phone No") </script>';
    }
    elseif(empty($_POST['role'])){

        echo '<script type="text/javascript"> alert("Select role") </script>';
    }

    elseif(empty($_POST['school'])){

        echo '<script type="text/javascript"> alert("Select School") </script>';
    }
    else {

        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $phone_no = htmlspecialchars($_POST['phone_no']);
        $role = htmlspecialchars($_POST['role']);
        $school = htmlspecialchars($_POST['school']);


        $sql1 = "UPDATE users SET surname ='{$surname}', firstname = '{$firstname}', phone_no = '{$phone_no}', school_id = '{$school}', role ='{$role}' WHERE email = '{$email}'";
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
        <?php require ('header.php');?>

        <div class="panel-body" style="margin-left: 80px">
            <div class="row">
                <div class="col-lg-8 showResult">
                    <h2 align="center" style="color: #000000">Update User </h2>
                    <form  class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="email" name="search" size="40" id="search" placeholder="Enter Email">
                            <input type="submit" name="button_search" class="btn-danger" value="Search">
                        </div>

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

                        <h2 align="right"><button type="submit" name="update" class="btn btn-lg btn-danger">Update</button></h2>
                    </form>
                </div>
                <div class="col-lg-4">
                    <h2 align="right">
                        <a href="index.php" class="btn btn-danger btn-lg">
                            <span class="glyphicon glyphicon"></span> <= Login
                        </a>

                    </h2>


                </div>
            </div>






        </div>

        <?php require ('footer.php');?>

    </div>

</div>


</body>

</html>