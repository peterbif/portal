<?php
session_start();

@$_SESSION['user'] = $_POST['email'];


@$_SESSION['pin'] = $_POST['pin'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


@$db = new Connect();



if (isset($_POST['generate'])) {


    @$pin = (string) $_POST['pin'];

    //query pin table

    @$result = $db->selectPinCode($pin);
    $row = mysqli_fetch_assoc($result);



    if (($row['pin']) === ($_POST['pin']) && ($row['applicant_id'] == 0)) {


        header('location:create_acct.php');
    } else if ($row['applicant_id'] != 0) {

        echo '<script type="text/javascript"> alert("Already Used Pin")</script>';
    } else {

        echo '<script type="text/javascript"> alert("Incorrect Pin")</script>';
    }
}




if (isset($_POST['login'])) {

    $email = $_POST['email'];

    $password = md5($_POST['password']);


    //query pin_no table
    @$result_pin = $db->selectPinNoEMail($email);
    @$row_pin = mysqli_fetch_assoc($result_pin);


    //query users table
    $query = $db->selectAllUsers($email);
    $record = mysqli_fetch_assoc($query);

    // echo $record['uemail'];

    // echo $row_pin['email'] ;

    // echo  $_POST['email'];

    //echo $record['uemail'];


    if (isset($_POST['login'])) {

        $email = strtolower(trim($_POST['email']));

        $password = md5($_POST['password']);

        //$password = $_POST['password'];


        //query pin_no table

        @$result_pin = $db->selectPinNoEMail($email);
        @$row_pin = mysqli_fetch_assoc($result_pin);


        //query users table

        $query = $db->selectAllUsers($email);
        $record = mysqli_fetch_assoc($query);


        if ($record) {
            if ((strtolower($record['uemail'])) != $email) {

                echo '<script type="text/javascript"> alert("Email is incorrect") </script>';
            } else if ($record['password'] != $password) {


                echo '<script type="text/javascript"> alert("Password is incorrect") </script>';
            } elseif ($record['password'] == $password && $record['role'] == 1) {

                header('location: admin.php');
            } else {
                if ($record['password'] == $password && $record['role'] == 2) {

                    header('location: super_admin.php');
                }
            }
        }


        if (!$record) {

            if ((strtolower($row_pin['email'])) != $email) {

                echo '<script type="text/javascript"> alert("Email is incorrect") </script>';
            } else if ($row_pin['pin_no'] != md5($_POST['password'])) {


                echo '<script type="text/javascript"> alert("Password is incorrect") </script>';
            } else {


                if ($row_pin['pin_no'] == $password) {

                    header('location: biodata.php');
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php require('title.php'); ?></title>
    <?php require('links.php') ?>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>


    <style>
        body {
            background-image: url("img/nurse.jpg");
            background-repeat: no-repeat;
            background-size: 1600px 810px;

        }
    </style>

    <style>
        .blink {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            30% {
                opacity: 0;
            }
        }

        .marquee {
            width: 400px;
            line-height: 50px;
            color: Black;
            white-space: nowrap;
            box-sizing: border-box;
        }

        .marquee p {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 22s linear infinite;
            font-size: 20px;
        }

        @keyframes marquee {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-100%, 0);
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>

    <script src="js/vue.js"></script>

</head>








<body>

    <div class="container-fluid">
        <?php require('header1.php'); ?>

        <!-- background="img/jamb.jpg"-->
        <!-- <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span style="color: red !important;" class="fa fa-close"><strong></strong></span></button>
                        <h4 class="modal-title" align="center"><span style="color: forestgreen !important;"><strong>NOTICE TO ALL APPLICANTS INTO THE SCHOOL OF NURSING AND POST-BASIC SCHOOLS, UCH, IBADAN</strong></span></h4>
                    </div>
                    <div class="modal-body">

                   <ul style="list-style: decimal; margin-left: 10px;">

                    <li>

                     List of School of Nursing Applicants (2021-2022) ............<i class="fa fa-hand-o-right" aria-hidden="true"></i>  <a href="son.pdf" target="_blank">click here</a>
                    </li>
                

                   
                       <li>

                    List of School of Perioperative Nursing Applicants (2021/2022 Session) ............<i class="fa fa-hand-o-right" aria-hidden="true"></i>  <a href="perio.pdf" target="_blank">click here</a>
                    </li>

                    
                       <li>

                   List of School of Occupational Health Nursing Applicants(2021/2022) ............<i class="fa fa-hand-o-right" aria-hidden="true"></i>  <a href="ocn.pdf" target="_blank">click here</a>
                    </li>
                </ul>


                      
                        <h4 align="center" style="color:red"><strong>Venue: Chief Adebayo Akande Hall Ajibode, Off University of Ibadan, Ibadan</strong></h4>
                        <h4 align="center" style="color:red"><strong>DATE: 12th and 13th of July, 2021</strong></h4>

                    </div>
                </div>
            </div>
        </div>  -->

          <div class="marquee">
          <!-- <p id="div1"><span style="color: deeppink; background-color: #FFFFFF" id="son">School of Nursing Examination Result ..... <i class="fa fa-hand-o-right" aria-hidden="true"></i>  &nbsp;<a href="https://son.uch-ibadan.org.ng/" target="_blank">Click here</a></span>
          </p> -->
           <!-- <p id="div2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <span style="color: purple; background-color: #FFFFFF">Sales of Admission Forms for POST-BASIC PERIOPERATIVE NURSING COURSE For 2021/2022 Academic Session are still on ..... <i class="fa fa-hand-o-right" aria-hidden="true"></i>  &nbsp;<a href="https://pns.uch-ibadan.org.ng/" target="_blank">click here for more details</a></span></p>
          <p id="div3"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <span style="color: dodgerblue; background-color: #FFFFFF">Sales of Admission Forms for POST-BASIC OCCUPATIONAL HEALTH NURSING COURSE For 2021/2022 Academic are still on ..... <i class="fa fa-hand-o-right" aria-hidden="true"></i>  &nbsp;<a href="OCHN.pdf" target="_blank">click here for more details</a></span></p> -->
         <!-- <p id="div4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <span style="color: orangered; background-color: #FFFFFF">Sales of Admission Forms into School of Health Information Management For 2021/2022 Academic Session are on ....<a href="https://shim.uch-ibadan.org.ng/" target="_blank">Click here</a></span></p>
          </p> -->
           <!-- <p id="div5"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <span style="color: blue; background-color: #FFFFFF">Sales of Admission Forms into Nurse/Midwife/Public Health Nurse Tutors Programme For 2021/2022 Academic Session are on....<a href="https://ntp2.uch-ibadan.org.ng/" target="_blank">Click here</a></span></p>
          </p> -->
      </div>
        <div id="app" style="margin-top: 180px; border: 0px solid grey;">

            <div class="col-md-offset-4">
                <div class="row">


                    <!-- <div class="col-md-2">
                        <div align="left"> <span class="login-button button"> <i class="fa fa-sign-in" v-on:click=topForm=!topForm></i></span></div>
                    </div>-->

                    <div class="col-md-6">
                        <div align="right"><span class="login-button button"> <i class="fa fa-pencil" v-on:click=topForm=!topForm></i> </span> </div>
                    </div>

                </div> <br />


                <div class="row">
                    <div class="col-md-6">

                        <div v-if="topForm">
                            <div class="form-popup2 input-group">
                                <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">

                                    <div class="input-container">
                                        <i class="fa fa-envelope icon"> Pin</i>
                                        <input class="input-field" type="text" placeholder="Enter Pin" required name="pin" v-model="file_no">
                                    </div>
                                    <div align="center">
                                        <button type="submit" name="generate" class="btn btn-success" v-bind:disabled="!(file_no)"><i class=" fa fa-sign-in"></i>&nbsp;&nbsp;Create Account </button> &nbsp;&nbsp;&nbsp;&nbsp;
                                      <a href="check_pin.php" target="_blank">Change Email/Phone NO</a>

                                    </div>
                                </form>
                                  
                            
                            </div>
                        </div>

                        <!--login form-->
                        <div v-else>
                            <div class="form-popup">
                                <!--<h1 style="background-color: #FFFFFF; color: lightslategrey; text-align: center">Login</h1>-->
                                <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                                    <div class="input-container">
                                        <i class="fa fa-envelope icon">&nbsp; Email</i>
                                        <input class="input-field" type="text" placeholder="Email" required name="email" v-model="emails">
                                    </div><br /><b />

                                    <div class="input-container">
                                        <i class="fa fa-key icon"> Password</i>
                                        <input class="input-field" type="password" placeholder="Password" required name="password" v-model="passwords">
                                    </div>

                                    <div align="center">
                                        <button type="submit" name="login" class="btn btn-success" v-bind:disabled="!(emails && passwords)"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</button>
                                        <a href="forget_password.php">Forget Password/Change Password</a>
                                    </div>

                                </form>
                            </div>
                        </div>



                    </div>


                </div>

            </div>

        </div>


    
        <div class="row" align="center" style="margin-top: 150px;">
            <a href="user_guide.pdf" class="blink" style="font-size:20px; color:#EE1122; background-color: #0f0f0f" target="_blank">Download Applicant's Guide</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="mailto:admission@uch-ibadan.org.ng" style="font-size:20px; background-color: black; color:#ffffff;" target="_blank">Mail us for any complaint or call: Elizabeth: 07035073765 or Omobolanle:08124249848</a>

        </div><br /><br />

    </div>







    <script>
        const app = new Vue({
            el: '#app',
            data: {
                topForm: false,
                downForm: true,
                passwords: '',
                emails: '',
                file_no: ''
            },
            methods: {
                topForm1: function() {
                    this.topForm = false;
                    this.downForm = true;
                },

                downForm1: function() {
                    this.downForm = false;
                    this.topForm = true;
                }
            }
        });
    </script>

        <script>
            $(function() {

                var counter = 0,
                    divs = $('#div1, #div4, #div5');

                function showDiv() {
                    divs.hide() // hide all divs
                        .filter(function(index) {
                            return index == counter % 3;
                        }) // figure out correct div to show
                        .show('slow'); // and show it

                    counter++;
                }; // function to loop through divs and show correct div

                showDiv(); // show first div

                setInterval(function() {
                    showDiv(); // show next div
                }, 10 * 2000); // do this every 40 seconds

            });
        </script>




</body>

</html>

</html>