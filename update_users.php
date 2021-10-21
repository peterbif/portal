<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['user'];


//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


$db = new Connect();

if(isset($_POST['button_search'])) {

    if (empty($_POST['search'])) {

        echo '<script type="text/javascript"> alert("Enter Email to search for records") </script>';
    } //search records using email

    else {

        @$term = htmlspecialchars($_POST['search']);

        @$user = $db->selectAllUsers(@$term);
        @$row = mysqli_fetch_assoc($user);

        if ($row) {
            $surname = $row['usurname'];
            $firstname = $row['ufirstname'];
            $email = $row['uemail'];
            $phone_no = $row['uphone_no'];
            $role = $row['role'];
            $school = $row['school'];
        }
        if (!$row['uemail']) {

            echo '<script type="text/javascript"> alert("Record doesn\'t exist") </script>';
        }
    }


}



//query schools table
$query_sch = $db->selectSchools();
$result_sch = mysqli_fetch_assoc($query_sch);



if(isset($_POST['update'])){

    $surname2 =  ucwords(htmlspecialchars($_POST['surname']));
    $firstname2 = ucwords(htmlspecialchars($_POST['firstname']));
    $email2 = strtolower(htmlspecialchars($_POST['email']));
    $phone_no2 = htmlspecialchars($_POST['phone_no']);
    $password2 = htmlspecialchars($_POST['password']);
    $password1 = htmlspecialchars($_POST['password1']);
    @$role2 = htmlspecialchars($_POST['role']);
    @$school_id = $_POST['school'] or @$school_id = $_POST['hidden'];


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

    elseif ($password2 != $password1) {

        echo '<script type="text/javascript"> alert("Passwords don\'t match, re-type") </script>';
    }



    else {
        if(empty($_POST['password1'])) {
            @$pass = $_POST['hidden2'];

        }
        else{
            @$pass = md5($password2);
        }


        $sql1 = "UPDATE users SET usurname ='{$surname2}', ufirstname ='{$firstname2}',  uphone_no = '{$phone_no2}', password ='{$pass}', role = '{$role2}', school_id = '{$school_id}' WHERE uemail ='{$email2}'";
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

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12" align="right">
                    <a href="super_admin.php" class="button">
                        <span class="fa fa-backward"></span>&nbsp;Back
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-sm-offset-2">
                    <h2 align="center" style="color: #000000">Update User </h2>
                    <form  class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                        <div class="input-container">
                            <i class="fa fa-envelope icon">&nbsp; Email</i>
                            <input type="email" class="input-field" maxlength="60" name="search" id="search" placeholder="Enter Email to search">&nbsp;&nbsp;
                            <input type="submit" name="button_search" class="btn btn-primary fa fa-search" value="Search">
                        </div><br /><br />
                        <div class="input-container">
                            <i class="fa fa-text-width icon"></i>
                            <input type="text" class="input-field" id="surname"  name="surname" value="<?php echo @$surname; ?>"  placeholder="Enter Surname">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-text-width icon"></i>
                            <input type="text" class="input-field" name="firstname" id="firstname" value="<?php echo @$firstname; ?>"  placeholder="Enter Firstname">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>
                            <input type="email" class="input-field" name="email" value="<?php echo @$email; ?>" readonly placeholder="Enter Email">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-phone icon"></i>
                            <input type="text" class="input-field" name="phone_no" value="<?php echo @$phone_no; ?>"  placeholder="Enter Phone NO">
                        </div>

                        <div class="input-container">
                            <i class="fa fa-sort-alpha-asc icon"></i><input type="text" value="<?php echo @$school; ?>" class="input-field">
                            <select class="input-field" name="school">
                                <option value="">Select School</option>
                                <?php  do{  ?>
                                    <option value="<?php echo @$result_sch['schools_id']; ?>"><?php echo @$result_sch['school'];?></option>
                                <?php  }while(@$result_sch = mysqli_fetch_assoc($query_sch)); ?>
                            </select>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-key icon">&nbsp;Password</i>
                            <input type="password" class="input-field" id="pwd" name="password" placeholder="Password" value="<?php  echo @$password; ?>" >
                        </div>

                        <div class="input-container">
                            <i class="fa fa-key icon">&nbsp;Re-type Password</i>
                            <input type="password" class="input-field" id="pwd1"  placeholder="Re-type Password" value="<?php echo @$password;?>" name="password1" >
                        </div>

                        <div class="input-container">
                            <i class="fa fa-arrow-circle-o-right icon">Click</i>&nbsp;&nbsp;
                            &nbsp;<input type="radio" class="radio-inline" name="role" <?php if(@$row['role']==2) {echo 'checked';}?> value="2"><span class="radio-select">&nbsp;&nbsp;Super Admin</span>  &nbsp;&nbsp;&nbsp;<input type="radio" class="radio-inline" name="role" <?php if(@$row['role']==1) {echo 'checked';}?> value="1"> <span class="radio-select"> &nbsp;&nbsp;Admin</span>
                            <input type="hidden" name="hidden" value="<?php echo @$row['school_id']?>">
                            <input type="hidden" name="hidden2" value="<?php echo @$row['password']?>">
                        </div>
                        <div align="right" class="inline-block"> <button type="submit" name="update" class="button">Submit</button><br /><br /><br /><br />

                    </form>
                </div>

            </div>

        </div>

        <?php require ('footer.php');?>

    </div>

</div>

</body>

</html>