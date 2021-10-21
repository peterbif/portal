<?php
session_start();

// check to see if $_SESSION['timeout'] is set

require('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();




@$pin = $_POST['pin'];

@$email2 = trim($_POST['email']);

@$phone_no2 = trim($_POST['phone_no']);





if (isset($_POST['update'])) {


    if (empty($_POST['email'])) {

        echo '<script type="text/javascript"> alert("Enter Email")</script>';
    } elseif (empty($_POST['phone_no'])) {

        echo '<script type="text/javascript"> alert("Enter Phone NO")</script>';
    } else {
        @$query = "UPDATE pin_nos SET email = '{$email2}', phone_no ='{$phone_no2}'  WHERE  pin = '{$pin}'";
        $db->update($query);
    }
}
















?>
<!DOCTYPE html>
<html lang="en">

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


    <script src="js/vue.js"></script>


    <style>
        .blink {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            30% {
                opacity: 0;
            }
        }
    </style>

</head>

<body>
    <!-- background="img/jamb.jpg"-->
    <div class="container-fluid" id="app">
        <?php require('header.php'); ?>

        <br />
        <?php if (@$_SESSION['user'] == "peterbif@yahoo.com") {
            echo '  <div class="row">
            <div class="col-lg-12" align="right">
                <a href="super_admin.php" class="button" style="color: #ffffff">Back</a>
            </div>
        </div>';
        } ?>
        <!--Pin form-->

        <h1 style="background-color: #FFFFFF; color: forestgreen; text-align: center">Update Email/Phone NO</h1>
        <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">

            <div class="row" align="center" style="margin-top: 30px;">
                <div class="col-lg-6 col-sm-offset-3">
                    <div class="input-container">
                        <i class="fa fa-key icon"> &nbsp; Pin</i>
                        <input class="input-field" type="text" name="pin" id="pin" placeholder="Enter Pin" v-model="pin" required>&nbsp;&nbsp;

                        <button type="button" id="search" class="button" @click="searchPin()" :disabled="!pin"><i class="fa fa-search"></i></button>
                    </div>

                </div>
            </div>



            <div class="row" align="center" style="margin-top: 30px;" v-if="form && pin">
                <div id="live_data">

                </div>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    new Vue({

        el: '#app',

        data: {
            pin: '',
            form: false,
            phone_no: '',
            email: ''
        },

        created() {
            if (!this.pin) {
                form = false;
            }
        },

        methods: {

            searchPin() {

                if (this.pin) {

                    this.form = true;

                }

            }
        }
    })
</script>


<script>
    $('#search').click(function() {
        var id = document.getElementById('pin').value;
        // alert(id);
        $.ajax({
            url: "selectpin.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "text",
            success: function(data) {
                $('#live_data').html(data);
            }

        });

    });
</script>