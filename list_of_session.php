<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//$r_query = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($r_query);

$result = $db->selectSetSession33();
$row = mysqli_fetch_assoc($result);



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

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>

</head>



<body>
<div class="container-fluid">

    <div class="panel panel-danger">
        <?php require ('header.php')?>

        <div class="panel-body">
            <div class="row col-sm-offset-2">
                <div class="col-lg-8">
                    <h2 align="center" style="color: #000000">All Session </h2>
                        <div class="input-container">
                           <i class="fa fa-search"></i> <input type="text" class="form-control glyphicon glyphicon-search" id="myInput" onkeyup="myFunction()"  placeholder="Search by School">
                        </div> <br /><br /><br />

    <table class="table table-bordered" id="myTable">
    <thead>
    <tr>

        <th>S/N</th>
        <th>School</th>
        <th>Session</th>


    </tr>
    </thead>
    <tbody>
    <?php $sn = 1; do{ ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $row['school']; ?></a></td>
            <td><a href="update_session.php?id=<?php echo $row['session_id']; ?>"><?php echo $row['session']; ?></a></td>

        </tr>
    <?php }while($row = mysqli_fetch_assoc($result));

    ?>

    </tbody>
</table>

</div>
<div class="col-lg-2">
    <h2 align="right">
        <a href="super_admin.php" class="button">
            <i class="fa fa-backward"></i> Back
        </a>

    </h2>


</div>







</div>

<?php require('footer.php');?> </div>

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