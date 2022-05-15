<?php
session_start();

require('time_out.php');

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();



if ($_SESSION['user']) {



    @$_SESSION['school'] = $_POST['school'];

    @$_SESSION['session'] = $_POST['session'];



    @$query_pin = $db->selectPin();
    @$result_pin = mysqli_fetch_assoc($query_pin);



    @$query_sch = $db->selectSchools();
    @$result_sch = mysqli_fetch_assoc($query_sch);


    @$query_ses = $db->selectSession();
    @$result_ses = mysqli_fetch_assoc($query_ses);


    if (isset($_POST['submit'])) {
        if (empty($_POST['first'])) {
            echo '<script type="text/javascript"> alert("Enter first Pin Pattern")</script>';
        } elseif (empty($_POST['total'])) {
            echo '<script type="text/javascript"> alert("Enter total number of pins to generate")</script>';
        } else {
            $number = 1;
            $length = $_POST['total'];

            $counter = $_POST['first'];

            do {
                $char = "123345412578967890132145678900235643217689654324512669874512369772323465198768875655522752542442678883333553456123678912234454678884512741901864236151788373535354363563214785412369745810237888754451278963214785965474123214567986543754433624513980754267389654231098763451987243564781298707501312145167484948765443122436536748748982625244232452526436738909022";
                $pin = trim(substr(str_shuffle($char), -1000000000, 10));
                $school = $_POST['school'];
                $session = $_POST['session'];
                $counter = trim($counter);
                $applicant_id = 0;
                $query_con = "INSERT INTO pin(pin, school_id, session_id, form_no, applicant_id) VALUES('{$pin}', '{$school}', '{$session}', '{$counter}', '{$applicant_id}')";
                $db->insertPin($query_con);
                $number++;
                $counter++;
            } while ($number <= $length);

            if (@$query_con) {
                echo '<script type="text/javascript"> alert("Pins successfully generated")</script>';
            }
        }
    }

    if (isset($_POST['submit2'])) {
        $school = $_POST['school'];
        $session = $_POST['session'];
        @$query_sepin = $db->selectPinSessionSchool($school, $session);
        @$result_sepin = mysqli_fetch_assoc($query_sepin);

        if (@$result_sepin) {
            header('location:pin2.php');
        }
        if (!isset($result_sepin)) {
            echo '<script type="text/javascript"> alert("No record for this school and session")</script>';
        }
    }




    if (isset($_POST['submit3'])) {
        $school = $_POST['school'];
        $session = $_POST['session'];
        @$query_sepin = $db->selectPinSessionSchool($school, $session);
        @$result_sepin = mysqli_fetch_assoc($query_sepin);

        if (@$result_sepin) {
            header('location:pin3.php');
        }
        if (!isset($result_sepin)) {
            echo '<script type="text/javascript"> alert("No record for this school and session")</script>';
        }
    }
}else{

  header('index.php');
 //$db->redirect('index.php');
}


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <title><?php require('title.php'); ?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/style2.css">


    <script src="js/jquery.min.js"></script>
    <script src="js/myOpenForm.js"></script>


</head>

<body>
    <div class="container-fluid body">
        <?php require('header.php'); ?>

        <br /><br />
        <div class="row">
            <div class="col-lg-12" align="right">
                <a href="super_admin.php" class="button" style="color: #ffffff">Back</a>
            </div>
        </div>

        <div class="row col-sm-offset-2">
            <div class="col-lg-8">
                <h2 align="center"><strong>Generate/Print Pins for Schools</strong></h2>
            </div>
        </div><br />



        <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">

            <div class="row col-sm-offset-3">

                <div class="col-lg-3">
                    <label for="first">Form No (Pattern)</label>
                    <input type="number" id="first" name="first" class="form-control" value="<?php if ($result_pin) {
                                                                                                    echo (@$result_pin['form_no'] + 1);
                                                                                                } else {
                                                                                                    echo (rand(10, 10000002));
                                                                                                } ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); show();" maxlength="7" /> &nbsp;&nbsp;&nbsp;&nbsp;
                    <span id="showme" style="color: red"></span>
                </div>


                <div class="col-lg-3">
                    <label for="total">Total Numbers of Form</label>
                    <input type="number" id="total" class="form-control" name="total">
                </div>


            </div>

            <br />

            <div class="row col-sm-offset-2">
                <div class="col-lg-5">
                    <select name="school" class="input-field" required>
                        <option value="">Select School</option>
                        <?php do { ?>
                            <option value="<?php echo @$result_sch['schools_id']; ?>"><?php echo @$result_sch['school']; ?></option>
                        <?php } while (@$result_sch = mysqli_fetch_assoc($query_sch)); ?>
                    </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <select class="input-field state state-control" name="session" required>
                        <option value="">Select Session</option>
                        <?php do {  ?>
                            <option value="<?php echo @$result_ses['session_id']; ?>"><?php echo @$result_ses['session']; ?></option>
                        <?php } while (@$result_ses = mysqli_fetch_assoc($query_ses)); ?>
                    </select>
                </div>

                <div class="col-lg-3">
                    <button type="submit" name="submit" class="button btn btn-lg">Generate Pins</button>&nbsp;&nbsp;&nbsp;
                    <button type="submit" name="submit3" class="button btn btn-lg">Print Student Pins</button>&nbsp;&nbsp;&nbsp;
                    <button type="submit" name="submit2" class="button btn btn-lg">Print School Pins</button>

                </div>


            </div><br /><br /><br /><br />


        </form>


        <script>
            function show() {
                var first = document.getElementById("first").value;

                var min = "Minimum of 7 numbers entry ";

                if ((first.length) < 7) {
                    // alert("hi");
                    document.getElementById("showme").innerHTML = min;
                }

                if ((first.length) == 7) {
                    // alert("hi");
                    document.getElementById("showme").innerHTML = "";
                }
                if ((first.length) == 7) {

                    document.getElementById("showme").innerHTML = "";
                }

            }
        </script>

</body>

</html>