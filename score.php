<?php
session_start();

require ('time_out.php');

$_SESSION['email'];

@$_SESSION['exam_type'] = $_POST['exam_type'];

@$_SESSION['time'] = $_POST['time'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//$r_query = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($r_query);

$result3 = $db->selectExam_type3();
$row3 = mysqli_fetch_assoc($result3);



$result_t = $db->date();
$row_t = mysqli_fetch_assoc($result_t);



if(isset($_POST['submit'])) {

    if (empty($_POST['exam_type'])) {

        echo '<script type="text/javascript"> alert("Select Examination Type") </script>';
    }

    if (empty($_POST['time'])) {

        echo '<script type="text/javascript"> alert("Select Exam Time") </script>';
    }

    else {

        $result = $db->selectUserScore($_POST['exam_type'], $_POST['time']);
        $row = mysqli_fetch_assoc($result);


        $result2 = $db->score($_POST['exam_type']);
        $row2 = mysqli_fetch_assoc($result2);


    }


if(!@$row2 && !@$row){
        echo '<script type="text/javascript"> alert("No Records for this exam") </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php require ('title.php');?></title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>

</head>

<body>
<div class="container-fluid">

    <div class="panel panel-danger">
        <?php require ('header.php')?>

        <div class="panel-body" style="margin-left: 80px">
            <div class="row">
                <div class="col-lg-12">
                    <h2 align="right">
                        <a href="admin.php" class="btn btn-danger btn-lg">
                            <span class="glyphicon glyphicon"></span> <= Backward
                        </a>

                    </h2>
                </div>
            </div>

                    <h2 align="center" style="color: #000000">Score Sheet </h2><br />
                    <form  class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" name="exam_type">
                                        <option value="">Select Exam Type</option>
                                        <?php do{?>
                                            <option value="<?php echo @$row3['id']?>"><?php echo @$row3['name']?></option>
                                        <?php }while($row3 = mysqli_fetch_assoc($result3)) ?>
                                    </select>

                                </div>

                            </div>
                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" name="time">
                                        <option value="">Select Date</option>
                                        <?php do{?>
                                            <option value="<?php echo @$row_t['time']?>"><?php echo @$row_t['time']?></option>
                                        <?php }while($row_t = mysqli_fetch_assoc($result_t)) ?>
                                    </select>

                                </div>


                            </div>

                                <div class="col-lg-2">
                                    <div class="form-group" align="right">
                                        <input type="submit" class="btn btn-danger" name="submit" value="Search">
                                    </div>
                                </div>

                        </div>
                        <br /><br />
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 align="center"><strong><?php echo @$row['name'] ;?></strong></h3><br /><br />
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Surname</th>
                                        <th>Firstname</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                    <tr>
                                        <?php $sn = 1;  do{ ;
                                        ?>
                                        <td><?php echo $sn++;  ?></td>
                                        <td><?php echo @$row['surname'] ;?></td>
                                        <td><?php echo @$row['firstname']; ?></td>
                                        <td><?php echo @$row['email']; ?></td>
                                        <td><?php echo @$row['phone_no'] ;?></td>
                                        <td><?php echo @$row['answer'];?></td>
                                    </tr>

                                    <?php }while(@$row = mysqli_fetch_assoc($result));?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-lg-8">
                              <h3 align="right"><a href="print_score.php" class="btn btn-lg btn-danger">Print</a> </h3>
                            </div>
                        </div>

                    </form>






        </div>

    </div>

</div>

<?php require('footer.php');?> </div>


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