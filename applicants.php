<?php
session_start();

require ('time_out.php');

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

@$_SESSION['user'];


@$_SESSION['session'] = $_POST['session'];
@$_SESSION['program'] = $_POST['program'];



//query users table

@$query_sch = $db->selectAllUsers(@$_SESSION['user']);
@$result_sch = mysqli_fetch_assoc($query_sch);

@$school2 = @$result_sch['school_id'];

//query session table
@$query_ses = $db->selectSession();
$result_ses = mysqli_fetch_assoc($query_ses);


//query program table
@$query_pro = $db->selectPrograms();
$result_pro = mysqli_fetch_assoc($query_pro);


@$query_ses2 = $db->selectSession3(@$_SESSION['session']);
@$result_ses2 = mysqli_fetch_assoc($query_ses2);



@$query_sch2 = $db->selectSchool22($school2);
@$result_sch2 = mysqli_fetch_assoc($query_sch2);





if(isset($_POST['search_button'])) {

    @$school = $school2;

    @$session = $_POST['session'];

    @$program = @$_POST['program'];



    if (@$school && @$session) {

        if (@$school == 11) {
            @$query = $db->selectPinNum222(@$school, @$session, @$program);
            @$result = mysqli_fetch_assoc($query);
        } else {

            @$query = $db->selectPinNum22(@$school, $session);
            @$result = mysqli_fetch_assoc($query);
        }

    }

    if (!@$result) {

        echo '<script type="text/javascript"> alert("No records for this school") </script>';
    }


    if (@$school == 11) {

//loop through

        @$query2 = $db->selectPinNum222($school, $session, $program);
        @$result2 = mysqli_fetch_assoc($query2);

        if (@$result2) {
            @$count = 0;

            do {
                @$result2["bsurname"];
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
                @$result2["bsurname"];
                @$count++;
            } while (@$result2 = mysqli_fetch_assoc($query2));

            @$total_applicants = $count++;

        } else {
            @$total_applicants = 0;
        }
    }


}
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
                    <div class="input-container col-lg-8">

                        <!-- <select name="school" class="input-field" required>
                            <option value="">Select School</option>
                            <?php do{?>
                                <option value="<?php echo @$result_sch['schools_id'];?>"><?php echo @$result_sch['school'];?></option>
                            <?php }while(@$result_sch = mysqli_fetch_assoc($query_sch));?>
                        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->

                        <select class="input-field state state-control" name="session" required>
                            <option value="">Select Session</option>
                            <?php do{  ?>
                                <option value="<?php echo @$result_ses['session_id']; ?>"><?php echo @$result_ses['session'];?></option>
                            <?php }while(@$result_ses = mysqli_fetch_assoc($query_ses)); ?>
                        </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <?php if(@$school2 == 11){
                      echo '<select class="input-field state state-control" name="program" required>';
                            echo'<option value="">Select Program</option>';
                             do {
                              echo   '<option value="'.@$result_pro['programs_id'].'">'.@$result_pro['program'].'</option>';
                             } while(@$result_pro = mysqli_fetch_assoc($query_pro));
                      echo '</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}?>

                        <button type="submit"  name="search_button" class="button">Search</button>
                    </div>


                    <div class="col-lg-2" align="right">
                        <h6 class="button"> Applicants: <?php echo @$total_applicants;?></h6>
                    </div>

                    <div class="col-lg-2" align="right">
                        <a href="admin.php" style="font-size: 23px;" class="button fa fa-backward">
                            Back
                        </a>
                    </div>
                </form>


            </div> <br/><br />

            <br/><br />
            <div class="row">

                <div class="col-lg-3 col-sm-offset-1 input-container" align="center"> <input type="text" id="myInput" class="input-field" onkeyup="myFunction()" placeholder="Search By Surname" name="myInput"></div>
                <div class="col-lg-3 col-sm-offset-1 input-container" align="center"> <input type="text" id="myInput2" class="input-field" onkeyup="myFunction2()" placeholder="Search By Form NO" name="myInput2"></div>
                <div class="col-lg-3 col-sm-offset-1 input-container" align="center"> <a href="student_score.php" class="btn btn-success" target="_blank">Enter Student's Score</a> </div>

            </div>
            <div class="row">
                <div class="col-lg-12 showResult">
                    <h3 align="center"  style="color: #000000"><?php if(@$result){echo 'List of '. ' ' .@$result_sch2['school'].' '; if(@$school2 == 11){echo 'for ';} '  ' . '  '; echo @$result['program'].' '.'Applicant(s)'.' ('.@$result_ses2['session'].' Session)';}?></h3>

                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>

                            <th>S/N</th>
                            <th>Passport</th>
                            <th>Form NO</th>
                            <th>Surname</th>
                            <th>Firstname</th>
                            <th>Othername</th>
                           <!-- <th>Gender</th>
                           <th> Marital Status</th>
                            <!--<th>Exam NO</th>-->
                            <th>DOB/Age</th>

                            <!--  <th>Contact Address</th>
                           <th>lg of Res</th>
                           <th>State of Res</th>
                           <th>lg of Origin</th>
                           <th>State of Origin</th>-->
                            <th>Email</th>
                            <th>Phone NO</th>
                           <!-- <th>Nationality</th>-->

                        </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1; do{

                            if (@$result){
                                @$image = $result['capture'];
                                @$form_no = $result['form_no'];
                                @$surname = $result['bsurname'];
                                @$firstname = $result['bfirstname'];
                                @$othername = $result['bothername'];
                                @$gender = $result['gender'];
                                @$marital_status = $result['status'];
                                @$contact_add = $result['street_add2'];
                                @$lg_of_res = $result['lg_of_origin'];
                               @$state_of_res = $result['state_of_origin'];
                                @$lg_of_origin = $result['lg_of_origin2'];
                                @$state_of_origin = $result['state_of_origin2'];

                                // $exam_no = substr($result['capture'],  0, strlen($result['capture']) - 4);

                                @$date_of_birth = /*date('d-m-Y', strtotime(*/ $result['date_of_birth'];
                                @$email = $result['email'];
                                @$phone_no = $result['phone_no'];
                                @$applicant =  $result['pin_no_id'];

                                // @$_SESSION['id'] = $result['pin_no_id'];



                            }



                            ?>
                            <tr>
                                <td class="td"><?php if(@$result) {echo $sn++;} ?></td>
                                <td><img  align="right" src="uploads/<?php echo @$image;?>" class="img-rounded" width="80px" height="80px" /></td>
                                <td><?php echo @$form_no; ?></td>
                                <td class="td"> <a href="admin_applicant.php?id=<?php echo @$applicant;?>" target="_blank" > <?php echo @$surname;?></a>
                                <td><?php echo @$firstname; ?></td>
                                <td><?php echo @$othername; ?></td>
                               <!-- <td><?php echo @$gender; ?></td>
                                <td> <?php echo @$exam_no; ?></td>
                               <td> <?php echo @$marital_status; ?>-->
                                   <td><?php echo  @$date_of_birth  .  ' ('.@$db->age($db->orderDate($date_of_birth)).'yrs)'; ?></td>
                                <!-- <td><?php echo @$contact_add; ?></td>
                                <td><?php echo @$lg_of_res; ?></td>
                                <td><?php echo @$state_of_res; ?></td>
                                <td><?php echo @$lg_of_origin; ?></td>
                                <td><?php echo @$state_of_origin; ?></td>-->
                                <td><?php echo @$email; ?></td>
                                <td><?php echo @$phone_no; ?></td>
                              <!-- <td><?php echo "Nil" ; ?></td>-->


                            </tr>
                        <?php }while(@$result = mysqli_fetch_assoc($query));

                        ?>

                        </tbody>
                    </table>


                </div>


            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div align="right"><button class="button" ><a href="print.php" style="color: #FFFFFF;" target="_blank"><i class="fa fa-print"></i> Print</a> </button>
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

                    td = tr[i].getElementsByTagName("td")[3];
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


            function myFunction2() {

                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput2");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for(i = 0; i < tr.length; i++){

                    td = tr[i].getElementsByTagName("td")[2];
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