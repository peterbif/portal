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


//echo $record_pin['pin_no_id'];

    $query_edu = $db->selectEducation($record_pin['pin_no_id']);
    $recordset_edu = mysqli_fetch_assoc($query_edu);

  //query schools table

    @$result_res2 = $db->selectSchool2(@$record_pin['pin_no_id']);
    @$record_res2 = mysqli_fetch_assoc($result_res2);


    //@$query_edu2 = $db->selectEducation2($search);
    //  @$recordset_edu2 = mysqli_fetch_assoc($query_edu2);




    @$search = $id or  @$search = $_POST['hidden'];

    $query_edu22 = $db->selectEducation22($search);
    $recordset_edu22 = mysqli_fetch_assoc($query_edu22);


    // $query_edu = $db->selectEducation2($search);
    //  $recordset_edu = mysqli_fetch_assoc($query_edu);

    @$school2 = ucwords($recordset_edu22['school_name']);
    @$course2 = ucwords($recordset_edu22['ecourse']);
    @$qua2 = ucwords($recordset_edu22['equalification']);
    @$reg_no2 = ucwords($recordset_edu22['reg_no']);
    @$yearf2 = ucwords($recordset_edu22['yearf']);
    @$yeart2 = ucwords($recordset_edu22['yeart']);


    @$school = ucwords($_POST['institution']);
    @$school22 = $db->escape_value($school);
    @$course = ucwords($_POST['course']);
    $course22 = $db->escape_value($course);
    @$qual = $_POST['qualification'];
    @$reg_no = $_POST['reg_no'];
    @$yearf = ucwords($_POST['yearf']);
    @$yeart = ucwords($_POST['yeart']);
    @$applicant = $record_pin['pin_no_id'];


//query exam type table

    if (isset($_POST['update_edu'])) {


        if ($recordset_edu) {
            $query_edu = "UPDATE education SET school_name = '{$school22}', ecourse = '{$course22}', equalification = '{$qual}', reg_no = '{$reg_no}', yearf = '{$yearf}' , yeart = '{$yeart}'  WHERE education_id = '{$_POST['hidden']}'";
            $db->update($query_edu);
            header("location:edu_table.php");
            //echo "<meta http-equiv='refresh' content='0'>";
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
                            <h2 align="center">Update Academic Records
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="edu_table.php" class="button">
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
                                    <input class="input-field" type="text" placeholder="Name of Institution" required value="<?php echo @$school2; ?>"  name="institution">
                                </div>

                                <?php if($record_res2['schools_id'] != 3){
                                    echo '<div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Course</i>
                                            <input class="input-field" type="text"  value="'.@$course2.'"  placeholder="Computer Science"   name="course">
                                        </div>';} ?>


                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Qualification</i>
                                    <input class="input-field" type="text"   placeholder="Computer Science"  name="qualification" required value="<?php echo @$qua2; ?>">
                                   <!-- <select class="input-field" name="qualification" required="required">
                                        <option value="">Select Qualification</option>
                                        <?php $count = 0; do{  ?>
                                            <option value="<?php echo $qualification_id[$count]; ?>"><?php echo $qualificationList[$count];?></option>
                                            <?php  $count++; }while($count < $total); ?>
                                    </select>-->
                                </div>


                                <?php if($record_res2['schools_id'] != 3){
                                    echo ' <div class="input-container">
                                            <i class="fa fa-text-width icon"><br />Registration <br />Number</i>
                                            <input class="input-field" type="text"  value="'.@$reg_no2.'"  placeholder="345278" required  name="reg_no">
                                        </div>';} ?>


                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Year (From)</i>
                                    <input class="input-field" type="text" required  value="<?php echo @$yearf2; ?>" name="yearf">
                                </div>


                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Year (To)</i>
                                    <input class="input-field" type="text"   required  value="<?php echo @$yeart2; ?>" name="yeart">
                                </div>


                                    <div align="right">
                                        <button type="submit" name="update_edu" class="button2" value="Update">Update</button>
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


