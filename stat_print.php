<?php
session_start();
require ('time_out.php');
//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

@$_SESSION['position'];
@$_SESSION['time'];
@$_SESSION['specialty'];





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

    <link rel="stylesheet" href="css/font-awesome.css">


    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">

    <link rel="stylesheet" href="src/stable/css/tableexport.min.css">

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
                <div class="col-lg-10 col-sm-offset-1">
                    <table class="table table-bordered" id="applicants">
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
                    <div align="right">&nbsp;&nbsp;
                        <button style=" padding: 15px 25px;
                                font-size: 16px;
                                text-align: center;
                                cursor: pointer;
                                outline: none;
                                color: #fff;
                                background-color: #4CAF50;
                                border: none;
                                border-radius: 20px;
                                box-shadow: 0 12px #999;
                                  margin-top: 10px;" onclick="print_page()" ><i class="fa fa-print"></i> Print to PDF</button>
                    </div>
                </div>
            </div>
            <?php require ('footer.php')?>
            <script src="src/v1/v1.1/js/jquery-1.11.3.min.js"></script>
            <script src="src/v1/v1.0/js/xlsx.core.js"></script>
            <script src="src/v1/v1.0/js/Blob.js"></script>
            <script src="src/v1/v1.0/js/FileSaver.js"></script>
            <script src="src/stable/js/tableexport.min.js"></script>

            <script>
                $("#applicants").tableExport({
                    headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
                    footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
                    formats: ["xls", "csv", "txt"],    // (String[]), filetypes for the export
                    fileName: "id",                    // (id, String), filename for the downloaded file
                    bootstrap: true,                   // (Boolean), style buttons using bootstrap
                    position: "bottom",                 // (top, bottom), position of the caption element relative to table
                    ignoreRows: null,                  // (Number, Number[]), row indices to exclude from the exported file(s)
                    ignoreCols: null,                  // (Number, Number[]), column indices to exclude from the exported file(s)
                    ignoreCSS: ".tableexport-ignore",  // (selector, selector[]), selector(s) to exclude from the exported file(s)
                    emptyCSS: ".tableexport-empty",    // (selector, selector[]), selector(s) to replace cells with an empty string in the exported file(s)
                    trimWhitespace: false

                });
            </script>
</body>

</html>

