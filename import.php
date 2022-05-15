<?php
require_once('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['user'];




if (isset($_POST['submit']) && @$_FILES["file"]["size"] > 0) {

    try {

        if (($_FILES['file']['tmp_name']) =='') {
            echo '<script type="text/javascript">  alert("file not selected") </script>';

        }
        $filename = $_FILES["file"]["name"];

        $check_ext = explode(".", $filename);



        //we check,file must be have csv extention
        if(strtolower(end($check_ext)) == "csv") {
            $file = $_FILES["file"]["tmp_name"];
            $files = fopen($file, "r");
            while (($Data = fgetcsv($files, 10000, ",")) !== FALSE) {
                @$sql = "INSERT INTO countries(country) values('$Data[0]')";
                $sql_run = mysqli_query($conn, $sql);
            }
            fclose($files);
            if ($sql_run) {
                echo '<script type="text/javascript">  alert("File successfully uploaded") </script>';
            } else {
                echo '<script type="text/javascript">  alert("File not uploaded") </script>';
            }
        } else {
            echo '<script type="text/javascript"> alert("Error: Please Upload only CSV File")</script>';


        }

    } catch
    (Exception $e) {

        echo $e->getMessage();
    }


}





//$stu = new score();

//echo $stu->football();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php require ('title.php')?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="bootstrap.css"></script>

    <style>



    </style>
</head>
<body>
<div class="container-fluid">
    <div class="panel panel-danger">
        <?php require ('header.php')?>
        <div class="panel-body" style="margin-left: 50px; margin-right: 50px;">

    <h2>Please Select file</h2>
    <div class="row">
        <div class="col-lg-6" style="background-color:forestgreen";>

                        <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data" autocomplete="off">
<table>
                           <tr> <td><div class="form-group" style="margin:10px;">
                                <label for="file"><h4 style="color: white">Select File (.csv file only) </h4></label> </td>
                                <td><input style="background: #FFFFFF; color: #000000" type="file" class="form-control" name="file" accept=".csv"  required="required"/> </td>
                            </div>

                                 <td>  <button style="margin:5px; border-radius: 20px" type="submit" class="btn btn-primary" name="submit"><span style="font-size: 20px;">Upload file</span></button> </td>

                                   <td><input type="reset" class="glyphicon-refresh" style="color: #000000; font-size: 16px;">
                               </td></tr>



</table>
                        </form>

        </div>
    </div>
        </div>
    </div>
</div>

</body>

</html>

