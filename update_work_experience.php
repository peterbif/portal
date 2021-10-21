<?php
require_once('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['user'];

@$id = $_GET['id'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();




    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);


   @$search = $id or  @$search = $_POST['hidden'];

    //work experience table
    @$result_wk = $db->selectWorkExperience2($search);
    @$recordset_wk = mysqli_fetch_assoc($result_wk);



    @$establishment3 =  ucwords($_POST['estab'])  or  @$establishment3 =  ucwords(@$recordset_wk['establishment']);
    @$establishment33  = $db->escape_value($establishment3);
    @$position =  ucwords($_POST['position']) or  @$position = ucwords(@$recordset_wk['position']);
    @$yearfw =  ucwords($_POST['yearfw']) or  @$yearfw = ucwords(@$recordset_wk['yearfw']);
    @$yeartw =  ucwords($_POST['yeartw']) or  @$yeartw  = ucwords(@$recordset_wk['yeartw']);
  //  @$applicant = @$record_pin['pin_no_id'];


    if (isset($_POST['update_wk'])) {

        if ($recordset_wk) {
            $query_wk =  $query_wk = "UPDATE work_experience SET establishment = '{$establishment33}', position = '{$position}', yearfw = '{$yearfw}', yeartw = '{$yeartw}' WHERE work_experience_id =  '{$_POST['hidden']}'";
            $db->update($query_wk);
            header("location:work_table.php");
           // echo "<meta http-equiv='refresh' content='0'>";
        }


    }



$query_qua = $db->selectQualification2();
$recordset_qua = mysqli_fetch_assoc($query_qua);

$qualificationList = [];
$qualification_id = [];
$total = 0;

do{
    array_push($qualificationList, $recordset_qua['qualification']);
    array_push($qualification_id, $recordset_qua['qualification_id']);
    $total ++;
}

while($recordset_qua = mysqli_fetch_assoc($query_qua));



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
                            <h2 align="center">Update Work Experience
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="work_table.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-8">

                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Establishment</i>
                                    <input class="input-field" type="text" placeholder="Name of Establishment" value="<?php echo @$establishment3; ?>"  required name="estab">
                                </div>
                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Position</i>
                                    <input class="input-field" type="text"   placeholder="Position Held" required value="<?php echo @$position; ?>"   name="position">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Year(From)</i>
                                    <input class="input-field" type="text"   placeholder="2011" value="<?php echo @$yearfw; ?>"  required name="yearfw">
                                </div>
                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Year(To)</i>
                                    <input class="input-field" type="text"   placeholder="2018"  value="<?php echo @$yeartw; ?>"  required name="yeartw">
                                </div>

                                <div align="right">
                                    <button type="submit" name="update_wk" style="background-color: #c9302c" class="button2 btn btn-lg" >Update</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="hidden" name="hidden" value="<?php echo @$id;?>">
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


