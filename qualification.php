<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['email'];


@$_SESSION['exam_type'] = $_POST['exam_type'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();






// submitting position
if(isset($_POST['button_two'])) {
    //if this session exists
   

        $qualification = ucwords($_POST['qualification']);


        //query position table
        $query_po = $db->selectQualification($qualification);
        @$result_po = mysqli_fetch_assoc($query_po);
        if ($result_po) {
            echo '<script type="text/javascript"> alert("This record exists") </script>';
        }

        else {
            //Insert into position table
            @$sql = "INSERT INTO qualification(qualification) VALUES ('{$qualification}')";
            $db->insert($sql);
        }
        

}


if(isset($_POST['reset2'])){
    $_POST['qualification'] ='';


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
                <div class="row">
                    <div class="col-lg-8">
                        <h2 align="center">Add Qualification
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
                    <div class="col-lg-10">
                        <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                            <div class="input-container">
                                <i class="fa fa-text-width icon"></i>
                                <input type="text" class="input-field" id="qualification"  name="qualification" value="<?php echo @$qualification; ?>" required placeholder="e.g B.Sc.">&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" name="button_two" class="button">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="reset2" class="button">Clear Text</button>&nbsp;&nbsp;  &nbsp;&nbsp;<button type="button" class="button2"><a href="update_qualification.php" style="color: #FFFFFF">Edit</a> </button>
                            </div>

                    </div>

                </div><br /><br />

                </form>



            </div>





        </div>

        <?php require ('footer.php');?>

    </div>

</div>


</body>

</html>