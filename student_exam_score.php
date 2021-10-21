<?php
require_once ('connection.php');

session_start();

require ('time_out.php');

@$_SESSION['user'];

@$id = $_GET['id'] or @$id = $_POST['hidden'];


//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

$applicant_id = $id;

$query_po = $db->selectStudentExamScore2($applicant_id);
@$result_po = mysqli_fetch_assoc($query_po);

// submitting position
if(isset($_POST['submit'])) {
    //if this session exists


   @$score = trim($_POST['score']) or  @$score = @$result_po['student_score'];
    @$admin_status = $_POST['status'] or  @$admin_status = @$result_po['admin_status_id'];


    if($applicant_id) {

        //query position table

        if ($result_po) {
            @$sql = "UPDATE student_exam_score SET student_score = '{$score}', admin_status_id = '{$admin_status}' WHERE student_exam_score_id = '{$applicant_id}'";
            $db->update($sql);
            header('location:student_score.php');
        } else {
            //Insert into student_exam_score table
         echo   @$sql = "INSERT INTO student_exam_score(student_score, applicant_id) VALUES ('{$score}', '{$applicant_id}')";
           $db->insert($sql);
            header('location:student_score.php');
        }


    }else{

        header('location:student_score.php');
    }


}
if(isset($_POST['reset2'])){
    $_POST['score'] ='';


}



@$query_status = $db->selectAdminStatus();
@$result_status = mysqli_fetch_assoc($query_status);


$status = [];
$admin_status_id = [];
$total = 0;

do{
    array_push($status, $result_status['status']);
    array_push($admin_status_id, $result_status['admin_status_id']);

    $total ++;
}
while(@$result_status = mysqli_fetch_assoc($query_status));

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

    <script src="js/jquery.min.js"></script>

</head>



<body>
<div class="container-fluid">

    <div class="panel panel-danger">

        <?php require ('header.php');?>
        <div class="panel-body" style="margin-left: 80px">

            <div class="row">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 align="center">Update Score and Status
                        </h2>
                    </div>
                    <div class="col-lg-4">
                        <h2 align="right">
                            <a href="student_score.php" class="button">
                                <i class="fa fa-backward"></i>&nbsp; Back
                            </a>




                        </h2>
                    </div>
                </div><br/>

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-2">
                        <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                            <div class="input-container">
                                <i class="fa fa-text-width icon"></i>
                                <input type="text" class="input-field" id="score"  name="score" value="<?php echo @$result_po['student_score']; ?>"  placeholder="e.g 200">&nbsp;&nbsp;&nbsp;&nbsp;



                                <select name="status" class="form-control">
                                    <option value=""> Select Status</option>
                                    <?php $count = 0; do{?>
                                        <option value="<?php echo @$admin_status_id[$count];?>"><?php  echo @$status[$count]; $count++;?></option>

                                    <?php }while($count < $total);?>
                                </select>
                                <input type="hidden" class="input-field" id="hidden"  name="hidden" value="<?php echo @$id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;

                                <button type="submit" name="submit" class="button">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="reset2" class="button">Clear Text</button> </button>
                            </div>

                    </div>

                </div><br /><br />

                </form>



            </div>





        </div>

        <?php require ('footer.php');?>

    </div>

</div>


</body>

</html>