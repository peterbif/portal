<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

@$id = $_GET['id'] or @$id = $_POST['hidden'];

if(@$_SESSION['user']) {
//auto load classes required
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.php';
    });

    $db = new Connect();


//query additional qualification table

    @$result_addqual = $db->selectAddQualification2($id);
    @$recordset_add = mysqli_fetch_assoc($result_addqual);


    @$institution_add = $db->escape_value($_POST['institution_add']);
    @$qualification_add = $_POST['qualification_add'] or @$qualification_add = $recordset_add['qualification_id'];
    @$grade_add = $_POST['grade_add'] or   @$grade_add =  @$recordset_add['grade_id'];
    @$yfrom_add = $_POST['yfrom_add'];
    @$yto_add = $_POST['yto_add'];
    @$applicant = $record_pin['pin_no_id'];



        if (isset($_POST['update_add'])) {

            if($_POST['hidden']) {
                echo $query = "UPDATE additional_qualification SET  institution = '{$institution_add}', qualification_id = '{$qualification_add}', grade_id = '{$grade_add}', yfrom = '{$yfrom_add}' ,  yto = '{$yto_add}'  WHERE additional_qualification_id = '{$id}'";
                $db->update($query);
                header("Location: qualification_add.php");



        }

            else {

                header("Location: qualification_add.php");
            }

    }






//query qualification table
    $query_qua = $db->selectQualification2();
    $recordset_qua = mysqli_fetch_assoc($query_qua);


    $qualificationList = [];
    $qualification_id = [];
    $total2 = 0;

    do {
        array_push($qualificationList, $recordset_qua['qualification']);
        array_push($qualification_id, $recordset_qua['qualification_id']);
        $total2++;
    } while ($recordset_qua = mysqli_fetch_assoc($query_qua));




//query grade table


    $query_grad = $db->selectGrade();
    $recordset_grad = mysqli_fetch_assoc($query_grad);

    $grade_list = [];
    $grade_id_list = [];
    $total_1 = 0;
    do {
        array_push($grade_list, $recordset_grad['grade']);
        array_push($grade_id_list, $recordset_grad['grade_id']);
        $total_1++;
    } while (@$recordset_grad = mysqli_fetch_assoc($query_grad));



}

else{

    header("Location: index.php");
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
                            <h2 align="center">Update Additional Qualification
                            </h2>
                        </div>
                        <div class="col-lg-2">
                            <h2 align="right">
                                <a href="qualification_add.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/><br/><br/>

                    <div class="row">
                        <div class="col-lg-8 col-sm-offset-2">

                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">


                                <div class="input-container">
                                    <i class="fa fa-text-width icon"><br />Institution</i>
                                    <input class="input-field" type="text" placeholder="Name of Institution"  value="<?php echo @$recordset_add['institution']; ?>"  name="institution_add">
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-sort-alpha-asc icon"></i><?php if($recordset_add) {echo '<input class="input-field" type="text" value="'.@$recordset_add['qualification'].'"/>';}?>
                                    <select class="input-field" name="qualification_add">
                                        <option value="">Select Qualification</option>
                                        <?php $count = 0; do{  ?>
                                            <option value="<?php echo $qualification_id[$count]; ?>"><?php echo $qualificationList[$count]; $count++;?></option>
                                        <?php   }while($count < $total2); ?>
                                    </select>
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-sort-alpha-asc icon"></i><?php if($recordset_add) {echo '<input class="input-field" type="text" value="'.@$recordset_add['grade'].'"/>';}?>
                                    <select class="input-field" name="grade_add">
                                        <option value="">Select Grade</option>
                                        <?php $count_1 = 0; do{?>
                                            <option value="<?php echo @$grade_id_list[$count_1]?>"> <?php echo @$grade_list[$count_1]; $count_1++;?></option>
                                        <?php }while($count_1 < $total_1);?>
                                    </select>
                                </div>

                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Year (From)</i>
                                    <input class="input-field" type="text"   placeholder="2011"  name="yfrom_add"   value="<?php echo @$recordset_add['yfrom'];?>"  required>
                                </div>
                                <div class="input-container">
                                    <i class="fa fa-clock-o icon"><br />Year (To)</i>
                                    <input class="input-field" type="text"   placeholder="2018"  name="yto_add"  value="<?php echo @$recordset_add['yto'];?>"   required>

                                    <input class="hidden" type="text"   placeholder="2018"  value="<?php echo @$_GET['id'];?>"  name="hidden">
                                </div>


                                <div align="right">
                                    <button type="submit" name="update_add" class="button2" value="Update">Update</button>
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
    $(document).on('click', '#delete_add', function(){
        var id = $(this).data("id6");
        $.ajax({
            url: "delete_add.php",
            method:"POST",
            data:{id:id},
            dataType:"text",
            success:function (data) {
                fetch_data();
            }

        });

    });

</script>







