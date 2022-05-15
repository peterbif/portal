<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['email'];

@$id = $_GET['id'];

@$_SESSION['exam_type'] = $_POST['exam_type'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();



    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);



        @$search = $id;

        $query_pro2 = $db->selectProfessionalTraining2($search);
        $recordset_pro2 = mysqli_fetch_assoc($query_pro2);



        @$school2 = ucwords($recordset_pro2['pschool_name']);
        @$course2 = ucwords($recordset_pro2['pcourse']);
        @$cert2 = ucwords($recordset_pro2['pcertificate']);
        @$date2 = ucwords($recordset_pro2['pdate']);


    //professional Training modal

    @$school3 = ucwords($_POST['institution3']);
    @$school33  = $db->escape_value($school3);
    @$course3 = ucwords($_POST['course3']);
    @$course33 = $db->escape_value($course3);
    @$cert3 = $_POST['cert3'];
    @$date3 = ucwords($_POST['date3']);

  if(isset($_POST['update_pro'])) {

      $query_edu = "UPDATE professional_training SET pschool_name = '{$school33}', pcourse = '{$course33}', pcertificate = '{$cert3}', pdate = '{$date3}'  WHERE pro_id = '{$_POST['hidden']}'";
      $db->update($query_edu);


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
                            <h2 align="center">Update Professional Training
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="pro_table.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-8">



                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">


                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Institution</i>
                                    <input class="input-field" type="text" placeholder="Name of Institution" value="<?php echo @$school2;?>" required  name="institution3">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Course</i>
                                    <input class="input-field" type="text"   placeholder="Accounting" value="<?php echo @$course2 ?>" required   name="course3">
                                </div>



                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Certification <br />Honours</i>
                                    <input class="input-field" type="text"   placeholder="ICAN" value="<?php echo @$cert2?>"  required  name="cert3">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Year</i>
                                    <input class="input-field" type="text"   placeholder="2018"  value="<?php echo @$date2;?>" required name="date3">
                                </div>


                                    <div align="right">
                                        <button type="submit" name="update_pro" class="button2" value="Update">Update</button>
                                        <input type="hidden" name="hidden" value="<?php echo @$id; ;?>">
                                    </div>


                            </form>


                        </div>
                    </div><br /><br /><br /><br />
                </div>





            </div>

            <?php require ('footer.php');?>

        </div>

    </div>


</body>

</html>