<?php

session_start();



//require('time_out.php');



$_SESSION['user'];



//auto load classes required

spl_autoload_register(function ($class) {

    include 'classes/' . $class . '.php';

});



$db = new Connect();







@$query_pin = $db->selectPinNOPosition(@$_SESSION['user']);

@$record_pin = mysqli_fetch_assoc($query_pin);



//query school table

@$result_res2 = $db->selectSchool222($record_pin['pin_no_id']);

@$record_res2 = mysqli_fetch_assoc($result_res2);







//query capture table

@$query_pass = $db->selectPassport($record_pin['pin_no_id']);

@$result_pass = mysqli_fetch_assoc($query_pass);



//joining table biodata marital status Gender

$query_bio = $db->selectBioDataMaritalGender(@$record_pin['pin_no_id']);

$result_bio = mysqli_fetch_assoc($query_bio);





//query school logo table

@$query_pro = $db->selectProgram($record_pin['pin_no_id']);

@$result_pro = mysqli_fetch_assoc($query_pro)







?>





<!doctype html>

<html>



<head>

    <meta charset="utf-8">

    <title>Admission Letter</title>



    <style>

        div {

            margin: 10px;



        }



        .principal {

            text-align: center;

        }





        body {



            width: auto;

            height: auto;

            font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;

            font-size: 14.5px;

            text-align: justify;

            padding: 5px;





        }



        .email {

            font-size: 13px;

        }



        p {

            margin-bottom: 4px;

        }



        #logo {

            height: 110px;

            width: 1000px;



        }

    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

    <link href="../css/table_result.css" rel="stylesheet" type="text/css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script src="js/slide.js" type="text/javascript"></script>





    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">



    <![endif]-->

</head>



<body>

    <div class="container-fluid text-center">

        <div class="row content">



            <div class="col-sm-12 text-left">

                <div class="container">

                    <div align="center"><img src="saved_images/letter_head.fw.png" class="img-rounded" height="98px" width="auto" />



                    </div>

                    <div>



                        <p>&nbsp;</p>





                        <h4 align="center"> <strong>OFFER OF PROVISIONAL ADMISSION INTO <?php echo strtoupper(@$result_pro['program']); ?> <br />PROGRAMME (<?php echo strtoupper(@$record_res2['session']); ?> ACADEMIC SESSION)</strong></h4>

                        <p>With reference to your application for admission into <strong> <?php echo ucwords(@$result_pro['program']); ?> Programme in the School of Health Information Management, University College Hospital, Ibadan</strong>, I have the pleasure to inform you that you have been offered provisional admission to pursue an academic programme leading to the award of <strong><?php echo strtoupper(@$result_pro['program']); ?> in HEALTH INFORMATION MANAGEMENT</strong>. The programme commences from 19th of November, 2021.  An arrangement for your Medical Examination will be made when you resume.</p>



                        <h3><strong> This offer of admission is strictly provisional and may be revoked if:</strong></h3>



                        <ol>

                            <li>You fail to formally accept this offer by paying the acceptance fee of <strong>&#8358;25, 000.00</strong>. <strong>NHIS fee of N2,000.00</strong>  and 50% of your school fees within two (2 weeks) after

                         printing of admission letter.</li>

                            <!-- <li>School fees is allowed to be paid only twice</li> -->

                            <!-- <li>You fail to pay your NHIS fee of &#8358;2,000.00 within two (2 weeks) after printing of admission letter;</li> -->

                            <li>You are unable to complete your medical examination within 3 weeks after you have been scheduled by the staff clinic <strong>(which you are going to pay base on your

                                    medical need);</strong> and</li>



                            <li>You cannot produce the original copies of your transcript and other academic credentials as at the time of registration.</li>

                        </ol>

                        <p>This offer of provisional admission and your continued stay in this School are subject to the condition that your health conduct and general progress are satisfactory throughout the course. Failure to achieve a Grade Point Average (GPA) of 1.0 at the end of 1st semester would result in your being asked to <strong><u>withdraw/repeat</u></strong> from the School.</p>

                        <p>You should also note that the School&rsquo;s policy stipulates that any student involved in any form of boycott, strike action, mis-conduct or secret cult activities at any stage of training will be dismissed and the Health Records Officers Registration Board would be notified accordingly.</p>

                        <p><strong>Pregnancy is not allowed during training.</strong></p>

                        <p>In event of any emergency preventing your arrival at scheduled time, you should inform the School and payment should have been made. The entire members of staff of this School look forward to welcoming you and I pray you enjoy your stay in the Premier Institution.</p>

                        <p class="principal">Yours faithfully,</p>

                        <p class="principal"><img src="saved_images/sig.jpg" height="35px" width="350px;"></p>

                        <p class="principal">O. Lanlehin <br>

                            <strong>Head of School</strong>

                        </p>

                        <p align="right" colspan="12"><button type="button" id="submit" name="submit" class="btn btn-primary" onClick="print_page()" formtarget="_blank"><i class="fa fa-print icon"></i>&nbsp;&nbsp;Print</button></p>

                        <footer class="container-fluid text-center" id="footer_3">

                            <p align="center" style="color:#1b6d85; font-size: 10px;">&copy 20<?php echo date("y") ?>&nbsp;&nbsp; Designed by Information Technology Department, University College Hospital, Ibadan.</p>

                        </footer>

                        <div>

                            <div> <?php echo '<h3 style="text-align: left; color: #0F971A; font-size: 20px; position: absolute; top: 115px; left: 230px; z-index: 1;">' .  $result_bio['bsurname'] . '  ' . '  ' . $result_bio['bfirstname'] . ' ' . '    ' . $result_bio['bothername'] . '&nbsp;<span style="font-size:14px; color:#000;">(DOB:'.date('d-m-Y',strtotime(@$result_bio['date_of_birth'])) .')</span></h3>'; ?>  <img style="position: absolute; top: 135px; right: 3px;" src="thumbs/<?php echo @$result_pass['capture']; ?>" class="img-rounded" height="80px" width="88" /></div>

                        </div>

                    </div>

                </div>

            </div>



</body>



</html>
