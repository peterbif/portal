<?php
session_start();
//maintain session for user's email, donor's phone no & the picture
require ('time_out.php');

@$_SESSION['user'];


//auto loading classes
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//search for applicant id using  session
@$result_sch = $db->selectSchool();
@$record_sch = mysqli_fetch_assoc($result_sch);



@$result_logo = $db->selectSchoolLogo($_POST['school']);
@$record_logo = mysqli_fetch_assoc($result_logo);




    if (isset($_POST['save'])) {

         $school = $_POST['school'];



        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = filesize($_FILES['user_image']['tmp_name']);


        /*
                 if(@$record_pass){

                    echo '<script type="text/javascript"> alert("Your Passport already exists")</script>';
                }
                else
                {*/
        $upload_dir = 'uploads/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $userpic = rand(1000, 1000000) . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '300kb'
            if ($imgSize < 300000) {
                move_uploaded_file($tmp_dir, $upload_dir . $userpic);
            } else {

                echo $errMSG = '<script type="text/javascript"> alert("Sorry, your file is too large, not more than 300kb")</script>';
            }
        } else {

            echo $errMSG = '<script type="text/javascript"> alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed")</script>';
        }


        // if no error occured, continue ....

        if (!$record_logo) {
            if (!isset($errMSG)) {
              @$query = "INSERT INTO school_logo(logo, school_id) VALUES('{$userpic}', '{$school}')";
                $db->insertImage($query);
            }

        } else {

            if (!isset($errMSG)) {
                @$query = "UPDATE school_logo SET logo = '{$userpic}'  WHERE school_id = '{$school}'";
                $db->update($query);


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


    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style2.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</head>

<body>
<div class="container-fluid">

    <div class="panel panel-danger">
        <?php require ('header.php');?>

        <div class="panel-body">
            <div class="container" style="margin-top: 50px;">

                <div class="row">
                    <div class="col-lg-10">
                        <h3 align="center">Upload School Logo
                        </h3>
                    </div>
                    <div class="col-lg-2">
                        <h2 align="right">
                            <a href="super_admin.php" class="button">
                                <i class="fa fa-backward"></i> Back
                            </a>

                        </h2>


                    </div>
                </div><br/>

                <form class="form-horizontal"  method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                    <table  class="table table-bordered">
                        <tbody>
                        <tr>
                            <td ><img id="blah" src="#" alt="my passport"/></td>
                        </tr>
                       <tr>
                           <td><label class="control-label">School</label></td>
                           <td><div class="input-container">
                            <select class="input-field" name="school" required="required">
                                <option value="">Select School</option>
                                <?php  do{  ?>
                                    <option value="<?php echo @$record_sch['schools_id']; ?>"><?php echo @$record_sch['school'];?></option>
                                <?php  }while(@$record_sch = mysqli_fetch_assoc($result_sch)); ?>
                            </select>
                               </div></td></tr>

                        <tr>
                            <td><label class="control-label">Logo</label></td>
                            <td><input id="src" class="form-control" required type="file" name="user_image" onchange="readURL(this);" accept="image/*" /></td>
                        </tr>


                        <tr>
                            <td colspan="2">
                                <button type="submit" name="save" class="button btn-lg btn-block">
                                    Save
                                </button>
                            </td>
                        </tr>

                        </tbody>
                </form>


            </div>
        </div>

    </div>
    <?php require ('footer.php');?>

</div>

</div>


</body>

</html>