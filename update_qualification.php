<?php
require_once ('connection.php');
session_start();

@$_SESSION['user'];


@$_SESSION['exam_type'] = $_POST['exam_type'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


//query schools table

$result3 = $db->selectQualifications();
$record3 = mysqli_fetch_assoc($result3);



//query exam type table

if(isset($_POST['button'])){

    if(empty($_POST['qualification1'])){

        echo '<script type="text/javascript"> alert("Select Qualification to be updated") </script>';
    }

    else {
        $qualification1 = $_POST['qualification1'];
        $qualification = ucwords($_POST['qualification']);
        $qrl = "UPDATE qualification SET qualification = '{$qualification}' WHERE qualification_id = '{$qualification1}'";
        $db->update($qrl);
    }
}

if(isset($_POST['reset'])){
    $_POST['qualification'] =" ";
    $_POST['qualification1'] = " ";


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
                            <h2 align="center">Update Qualification
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="admin.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-8">



                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                <div class="input-container">
                                    <i class="fa fa-sort-numeric-asc icon"></i>
                                    <select name="qualification1"  class="input-field">
                                        <option value="">Select Qualification To be Updated</option>
                                        <?php do{?>
                                            <option value="<?php echo @$record3['qualification_id'];?>"><?php echo @$record3['qualification'];?></option>
                                        <?php }while ($record3 = mysqli_fetch_assoc($result3));?>
                                    </select>
                                </div><br /><br />



                                <div class="input-container">
                                    <i class="fa fa-text-width icon"></i>
                                    <input type="text" class="input-field" name="qualification" value="<?php echo @$qu; ?>" required placeholder="Enter Correct Qualification">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="button"  name="button">Submit</button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="button"  name="reset">Clear Text</button>
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