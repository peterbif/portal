<?php
session_start();

require('time_out.php');

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

@$school = $_SESSION['school'];
@$session = $_SESSION['session'];
@$program = $_SESSION['program'];



$query_ses2 = $db->selectSession3(@$_SESSION['session']);
$result_ses2 = mysqli_fetch_assoc($query_ses2);


@$query_sch2 = $db->selectSchool22($school);
@$result_sch2 = mysqli_fetch_assoc($query_sch2);



if (@$school && @$session) {

    if (@$school == 11 && $program) {
        @$query = $db->selectPinNum222(@$school, @$session, $program);
        @$result = mysqli_fetch_assoc($query);
    } else {

        @$query = $db->selectPinNum22(@$school, $session);
        @$result = mysqli_fetch_assoc($query);
    }



    if (!@$result) {

        echo '<script type="text/javascript"> alert("No records for this school") </script>';
    }
}

if (@$school == 11) {

    //loop through

    @$query2 = $db->selectPinNum222($school, $session, $program);
    @$result2 = mysqli_fetch_assoc($query2);

    if (@$result2) {
        @$count = 0;

        do {
            @$result2["surname"];
            @$count++;
        } while (@$result2 = mysqli_fetch_assoc($query2));

        @$total_applicants = $count++;
    } else {
        @$total_applicants = 0;
    }
} else {
    @$query2 = $db->selectPinNum22($school, $session);
    @$result2 = mysqli_fetch_assoc($query2);

    if (@$result2) {
        @$count = 0;

        do {
            @$result2["surname"];
            @$count++;
        } while (@$result2 = mysqli_fetch_assoc($query2));

        @$total_applicants = $count++;
    } else {
        @$total_applicants = 0;
    }
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php require('title.php'); ?></title>

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
        .td {
            text-transform: uppercase;
        }
    </style>


</head>



<body>
    <div class="container-fluid">

        <!--  <div class="panel panel-danger">-->
        <?php require('header.php') ?>

        <!--<div class="panel-body">&nbsp;-->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered" id="applicants">
                    <thead>
                        <tr>
                            <td align="center" colspan="12">
                                <h3 align="center" style="color: #000000"><?php if (@$result) {
                                                                                echo 'List of ' . ' ' . @$result_sch2['school'] . ' ';
                                                                                if (@$school2 == 11) {
                                                                                    echo 'for ';
                                                                                }
                                                                                '  ' . '  ';
                                                                                echo @$result['program'] . ' ' . 'Applicant(s)' . ' (' . @$result_ses2['session'] . ' Session)';
                                                                            } ?></h3>
                            </td>
                        </tr>
                        <tr>
                            <th>S/N</th>
                            <th>Passport</th>
                            <th>Form NO</th>
                            <th>Surname</th>
                            <th>Firstname</th>
                            <th>Othername</th>
                            <th>Gender</th>
                            <!--<th>Time In</th>
                            <th>Time Out</th>
                            <th>Sign</th>-->
                            <th>Image</th>
                            <th>DOB/Age</th>
                            <th>Email</th>
                            <th>Phone NO</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $sn = 1;
                        do {

                            if (@$result) {
                                $image = $result['capture'];
                                $form_no = $result['form_no'];
                                $surname = $result['bsurname'];
                                $firstname = $result['bfirstname'];
                                $othername = $result['bothername'];
                                $gender = $result['gender'];

                                $exam_no = substr($result['capture'],  0, strlen($result['capture']) - 4);

                                $date_of_birth = date('d-m-Y', strtotime($result['date_of_birth']));
                                $email = $result['email'];
                                $phone_no = $result['phone_no'];
                                $applicant =  $result['pin_no_id'];

                                // @$_SESSION['id'] = $result['pin_no_id'];



                            }



                        ?>
                            <tr>
                                <td class="td"><?php if (@$result) {
                                                    echo $sn++;
                                                } ?></td>
                                <td><img align="right" src="thumbs/<?php echo @$image; ?>" class="img-rounded" width="80px" height="80px" /></td>
                                <td><?php echo @$form_no; ?></td>
                                <td class="td">
                                    <!-- <a href="admin_applicant.php?id=<?php echo @$applicant; ?>" target="_blank" > --><?php echo @$surname; ?></a></td>
                                <td><?php echo @$firstname; ?></td>
                                <td><?php echo @$othername; ?></td>
                                <td><?php echo @$gender; ?></td>
                                <!-- <td></td>
                                <td></td>
                                <td></td>-->
                                <td><?php echo @$image; ?></td>
                                <td><?php echo  @$date_of_birth  .  ' (' . @$db->age($db->orderDate($date_of_birth)) . 'yrs)'; ?></td>
                                <td><?php echo @$email; ?></td>
                                <td><?php echo @$phone_no; ?></td>

                            </tr>
                        <?php } while (@$result = mysqli_fetch_assoc($query));

                        ?>

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
                                  margin-top: 10px;" onclick="print_page()"><i class="fa fa-print"></i> Print to PDF</button>
                </div>
            </div>
        </div>

        <!--     </div>-->
        <!--  </div>-->
        <?php require('footer.php') ?>
        <script src="src/v1/v1.1/js/jquery-1.11.3.min.js"></script>
        <script src="src/v1/v1.0/js/xlsx.core.js"></script>
        <script src="src/v1/v1.0/js/Blob.js"></script>
        <script src="src/v1/v1.0/js/FileSaver.js"></script>
        <script src="src/stable/js/tableexport.min.js"></script>

        <script>
            $("#applicants").tableExport({
                headings: true, // (Boolean), display table headings (th/td elements) in the <thead>
                footers: true, // (Boolean), display table footers (th/td elements) in the <tfoot>
                formats: ["xls", "csv", "txt"], // (String[]), filetypes for the export
                fileName: "id", // (id, String), filename for the downloaded file
                bootstrap: true, // (Boolean), style buttons using bootstrap
                position: "bottom", // (top, bottom), position of the caption element relative to table
                ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s)
                ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s)
                ignoreCSS: ".tableexport-ignore", // (selector, selector[]), selector(s) to exclude from the exported file(s)
                emptyCSS: ".tableexport-empty", // (selector, selector[]), selector(s) to replace cells with an empty string in the exported file(s)
                trimWhitespace: false

            });
        </script>
</body>

</html>