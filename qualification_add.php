<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

if(@$_SESSION['user']) {
//auto load classes required
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.php';
    });

    $db = new Connect();


    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);

//query additional qualification table
    @$result_addqual = $db->selectAddQualification($record_pin['pin_no_id']);
    @$recordset_add = mysqli_fetch_assoc($result_addqual);

   // echo @$recordset_add['additional_qualification_id'];
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
                            <h2 align="center">Update/Delete Additional Qualification
                            </h2>
                        </div>
                        <div class="col-lg-2">
                            <h2 align="right">
                                <a href="biodata.php" class="button">
                                    <i class="fa fa-backward"></i>&nbsp; Back
                                </a>

                            </h2>
                        </div>
                    </div><br/><br/><br/>

                    <div class="row">
                        <div class="col-lg-10 col-sm-offset-1">

                            <form class="form-horizontal"  method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                                <div id="live_data">


          <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Institution</th>
                                                <th>Qualification</th>
                                                 <th>Grade</th>
                                                <th>Year(From)</th>
                                                <th>Year(To)</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>

        <tr><?php $sn = 1; do{?>
        <td data-id1="<?php  echo @$recordset_add['additional_qualification_id']?>"> <?php echo @$sn++ ;?></td>
        <td  data-id2="<?php  echo @$recordset_add['additional_qualification_id']?>"> <?php  echo ucwords(@$recordset_add['institution']) ?></td>
            <td  data-id3="<?php  echo @$recordset_add['additional_qualification_id']?>"> <?php  echo ucwords(@$recordset_add['qualification']) ?></td>
            <td  data-id4="<?php  echo @$recordset_add['additional_qualification_id']?>"> <?php  echo ucwords(@$recordset_add['grade']) ?></td>
            <td  data-id5="<?php  echo @$recordset_add['additional_qualification_id']?>"> <?php  echo ucwords(@$recordset_add['yfrom']) ?></td>
            <td  data-id6="<?php echo @$recordset_add['additional_qualification_id']?>"> <?php  echo ucwords(@$recordset_add['yto']) ?></td>
         <td><a href="update_add.php?id=<?php echo @$recordset_add['additional_qualification_id']?>" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_add" id="delete_add" data-id6="<?php echo @$recordset_add['additional_qualification_id']?>" class="button2" style="font-size: 13px;">Delete</button></td>
        <tr>
<?php }while(@$recordset_add = mysqli_fetch_assoc($result_addqual));
 ?>
</tbody></table>


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







