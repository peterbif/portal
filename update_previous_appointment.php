<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];


//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

@$id = $_GET['id'];



    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);


    @$result_pre = $db->selectPreviousAppointment($record_pin['pin_no_id']);
    @$recordset_pre = mysqli_fetch_assoc($result_pre);



        $search = $id;
        $query_pre2 = $db->selectPreviousAppointment2($search);
        $recordset_pre2 = mysqli_fetch_assoc($query_pre2);


        @$establishment = ucwords($recordset_pre2['preestab']);
        @$address = ucwords($recordset_pre2['preaddress']);
        @$dates =  ucwords($recordset_pre2['predate']);
        @$present_salary =  ucwords($recordset_pre2['presalary']);
        @$nature =   ucwords($recordset_pre2['prenature']);


    //professional Training modal

    @$establishment2 = ucwords($_POST['estab2']);
    @$address2 = ucwords($_POST['address2']);
    @$dates2 = $_POST['dates2'];
    @$present_salary2 = $_POST['salary2'];
    @$nature2 = ucwords($_POST['nature2']);


    if (isset($_POST['update_pre'])) {

            $query_pre3 = "UPDATE previous_appointment SET preestab = '{$establishment2}', preaddress = '{$address2}', predate = '{$dates2}', presalary = '{$present_salary2}', prenature = '{$nature2}' WHERE present_appointment_id = '{$_POST['hidden']}'";
            $db->update($query_pre3);


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
                            <h2 align="center">Update Previous Appointment
                            </h2>
                        </div>
                        <div class="col-lg-4">
                            <h2 align="right">
                                <a href="pre_table.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/>

                    <div class="row">
                        <div class="col-lg-8">



                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br /><br /> Establishment</i>
                                    <input class="input-field" type="text" placeholder="Name of Establishment" required value="<?php echo @$establishment;?>"  name="estab2">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Address</i>
                                    <input class="input-field" type="text"   placeholder="Address" required value="<?php echo @$address ?>"   name="address2">
                                </div>


                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Date of<br />Appointment</i>
                                    <input class="input-field" type="date"   placeholder="" value="<?php echo @$dates?>"  required name="dates2">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-money icon"><br />Salary</i>
                                    <input class="input-field" type="text"   placeholder="2000.00"  value="<?php echo @$present_salary;?>" required  name="salary2">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-arrows icon"><br />Nature Of Job</i>
                                    <input class="input-field" type="text"   placeholder="Nature Of Present Duties and Responsibilities" required  value="<?php echo @$nature;?>"  name="nature2">
                                </div>


                                    <div align="right">
                                        <button type="submit" name="update_pre" class="button2" value="Update">Update</button>&nbsp;
                                        <input type="hidden" name="hidden" value="<?php echo @$id ;?>">
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