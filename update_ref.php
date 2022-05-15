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

    @$result_ref = $db->selectREF($record_pin['pin_no_id']);
    @$recordset_ref = mysqli_fetch_assoc($result_ref);


    @$result_gen2 = $db->selectGender3();
    @$recordset_gen2  = mysqli_fetch_assoc($result_gen2);


    @$rsurname = $_POST['rsurname'] or  @$rsurname = $recordset_ref['rsurname'];
    @$rfirstname = $_POST['rfirstname'] or  @$rfirstname = $recordset_ref['rfirstname'];
    @$rgender = $_POST['rgender'] or  @$rgender = $recordset_ref['gender'];
    @$roccupation = $_POST['roccupation'] or  @$roccupation = $recordset_ref['roccupation'];
    @$rcontact_add = $_POST['rcontact_add'] or @$rcontact_add = $recordset_ref['rcontact_add'];
    @$rcontact_add2  = $db->escape_value($rcontact_add);
    @$rphone_no = $_POST['rphone_no'] or @$rphone_no = $recordset_ref['rphone_no'];
    @$remail = $_POST['remail'] or  @$remail = $recordset_ref['remail'];



    if(isset($_POST['update_ref'])){
        if (@$record_pin) {
            $query = "UPDATE applicant_ref SET  rsurname = '{$rsurname}', rfirstname = '{$rfirstname}', rgender = '{$rgender}', roccupation = '{$roccupation}', rcontact_add = '{$rcontact_add2}' ,  rphone_no = '{$rphone_no}', remail = '{$remail}'  WHERE applicant_ref_id = '{$_POST['hidden']}'";
            $db->update($query);
            header('location:ref_table.php');

        }

    }


//query exam type tabl


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
                            <h2 align="center">Update Application Referee
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="ref_table.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-8">

                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br /><br />Surname</i>
                                    <input class="input-field" type="text"   value="<?php echo @$rsurname ?>"   required name="rsurname">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Firstname</i>
                                    <input class="input-field" type="text"  value="<?php echo @$rfirstname ?>"    required   name="rfirstname">
                                </div>


                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Occupation/<br />Post Held</i>
                                    <input class="input-field" type="text"   placeholder="Civil Service/Chief Accountant" value="<?php echo @$roccupation ?>"   required name="roccupation">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-sort-alpha-asc icon"><br />Gender</i><?php if(@$recordset_gen2){echo '<input type="text" value="'.@$rgender.'" readonly>';}?>
                                    <select class="input-field" name="rgender" required="required">
                                        <option value="">Select Gender</option>
                                        <?php  do{  ?>
                                            <option value="<?php echo @$recordset_gen2['gender_id']; ?>"><?php echo @$recordset_gen2['gender'];?></option>
                                        <?php  }while( @$recordset_gen2 = mysqli_fetch_assoc($result_gen2)); ?>
                                    </select>
                                </div>



                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Contact Add.</i>
                                    <input class="input-field" type="text"   placeholder="Contact Address"  value="<?php echo @$rcontact_add; ?>"    required name="rcontact_add">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Email</i>
                                    <input class="input-field" type="email"   placeholder="peterbif@yahoo.com"  value="<?php echo @$remail; ?>"    required name="remail">
                                </div>


                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Phone</i>
                                    <input class="input-field" type="text"   placeholder="08056324789" value="<?php echo @$rphone_no; ?>"    required name="rphone_no">
                                </div>


                                <div align="right">
                                    <button type="submit" name="update_ref" class="button2" value="Update">Update</button>
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


