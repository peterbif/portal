<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

if(isset($_POST['button_search'])) {

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
    if(!$row['email']){

        echo '<script type="text/javascript"> alert("Record doesn\'t exist") </script>';
    }
}

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//$r_query = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($r_query);

$result = $db->select();
$row = mysqli_fetch_assoc($result);



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
        <?php require ('header.php')?>


        <div class="panel-body">
            <div class="row">
                <div class="col-lg-8 col-sm-offset-2">
                    <h2 align="center" style="color: #000000">All Users </h2>
                    <form  class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>S/N</th>
                                <th>Surname</th>
                                <th>Firstname</th>
                                <th>Email</th>
                                <th>Phone NO</th>

                            </tr>
                            </thead>
                            <tbody>
                           <?php $sn = 1; do{ ?>
                            <tr>
                              <td><?php echo $sn++; ?></td>
                                <td><?php echo @$row['usurname']; ?></td>
                                <td><?php echo @$row['ufirstname']; ?></td>
                                <td><?php echo @$row['uemail']; ?></td>
                                <td><?php echo @$row['uphone_no']; ?></td>


                            </tr>
                            <?php }while($row = mysqli_fetch_assoc($result));

                            ?>

                            </tbody>
                        </table>

                </div>
                <div class="col-lg-2">
                    <h2 align="right">
                        <a href="super_admin.php" class="button fa fa-backward">
                            <span class="glyphicon glyphicon"></span>Back
                        </a>

                    </h2>


                </div>







        </div>

            <?php require ('footer.php')?>

    </div>

</div>


</body>

</html>