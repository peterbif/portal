<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['user'];


@$_SESSION['exam_type'] = $_POST['exam_type'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

@$id = $_GET['id'];

//query schools table

$result3 = $db->selectSession3($id);
$record3 = mysqli_fetch_assoc($result3);



//query exam type table

if(isset($_POST['button'])){

        $hidden = $_POST['hidden'];
        $session = $_POST['session'];
        $qrl = "UPDATE session SET session = '{$session}' WHERE session_id = '{$hidden}'";
        $db->update($qrl);
        header('location:list_of_session.php');


}


if(isset($_POST['button2'])){

    $hidden = $_POST['hidden'];
    $qrl = "DELETE FROM session WHERE session_id = '{$hidden}'";
    $db->update($qrl);
    header('location:list_of_session.php');


}

if(isset($_POST['reset'])){


    $_POST['session'] =" ";


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
            <div class="container-fluid">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2 align="center">Update Session
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="super_admin.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-8">



                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                <div class="input-container">
                                    <i class="fa fa-text-width icon"></i>
                                    <input type="text" class="input-field" name="session" value="<?php echo @$record3['session']; ?>" required placeholder="2014/2015">
                                    <input type="hidden" class="input-field" name="hidden" value="<?php echo @$id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="button"  name="button">Update</button>  &nbsp;&nbsp; <button type="submit" class="button2"  name="button2">Delete</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="button"  name="reset">Clear Text</button>
                                </div>


                        </div>

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