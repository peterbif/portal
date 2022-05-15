<?php
session_start();

require ('time_out.php');

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();










    $query_po = $db->selectStat();
    $result_po = mysqli_fetch_assoc($query_po);

    $query_po2 = $db->selectStat2();
    $result_po2 = mysqli_fetch_assoc($query_po2);





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

    <script src="js/slide.js"></script>


    <script src="js/jquery.min.js"></script>

    <style>
        .td{
            text-transform: uppercase;
        }

    </style>

</head>



<body>
<div class="container-fluid">

    <div class="panel panel-danger">
        <?php require ('header.php')?>

        <div class="panel-body">&nbsp;&nbsp;
            <div class="row">
                <form class="form-horizontal form-inline"   method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">


                </form>


            </div> <br/><br />

            <br/><br />
            <div class="row">

                <div class="col-lg-6 col-sm-offset-3 input-container" align="center"> <input type="text" id="myInput" class="input-field" onkeyup="myFunction()" placeholder="Search By Specialty" name="myInput"></div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-sm-offset-1">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>

                            <th>S/N</th>
                            <th>Specialty</th>
                            <th>Total Applicants</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php @$sn = 1; do{ ?>
                            <tr>
                                <td><?php if($result_po) {echo $sn++;} ?></td>
                                <td><?php echo @$result_po['specialty']; ?></td>
                                <td><?php echo  @$result_po['COUNT(DISTINCT specialty)']; ?></td>
                            </tr>

                        <?php }while($result_po = mysqli_fetch_assoc($query_po));

                        ?>
                        <tr> <td colspan="2" style="font-size: 25px"><strong>Total </strong></td><td><?php echo '<strong>'. @$result_po2['COUNT(DISTINCT specialty)'] .'</strong>' ;?></td></tr>

                        </tbody>
                    </table>


                </div>


            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div align="right"><button class="button" ><a href="stat_print.php" style="color: #FFFFFF;"><i class="fa fa-print"></i> Print</a> </button>
                    </div>
                </div>
                <?php require ('footer.php')?>

            </div>

        </div>


        <script>
            function myFunction() {

                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for(i = 0; i < tr.length; i++){

                    td = tr[i].getElementsByTagName("td")[1];
                    if(td){

                        if(td.innerHTML.toUpperCase().indexOf(filter) > -1){

                            tr[i].style.display = "";
                        }

                        else {

                            tr[i].style.display = "none";
                        }
                    }
                }

            }
        </script>



</body>

</html>