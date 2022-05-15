<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();





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

    <script src="jquery/jquery-3.1.0.slim.js"></script>

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
                        <div class="col-lg-10">
                            <h2 align="center">Update/Delete Previous Appointment
                            </h2>
                        </div>
                        <div class="col-lg-2">
                            <h2 align="right">
                                <a href="biodata.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/><br/><br/>

                    <div class="row">
                        <div class="col-lg-10 col-sm-offset-1">

                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                <div id="live_data">


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

<script>
    $(document).ready(function () {
        function fetch_data() {
            $.ajax({
                url:"select_table_pre.php",
                method:"POST",
                success:function (data) {
                    $('#live_data').html(data);
                }

            });
        }

        fetch_data();

        $(document).on('click', '#delete_pre', function(){
            var id = $(this).data("id6");
            $.ajax({
                url: "delete_pre.php",
                method:"POST",
                data:{id:id},
                dataType:"text",
                success:function (data) {
                    fetch_data();
                }

            });

        });

    });
</script>