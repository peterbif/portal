<?php
session_start();
//maintain session for user's email
require('time_out.php');

@$_SESSION['user'];


//auto loading classes
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

//search for applicant id using  session
@$result_pin = $db->selectPinNO2($_SESSION['user']);
@$record_pin = mysqli_fetch_assoc($result_pin);



if (isset($_POST['save'])) {

    $applicant_id = $record_pin['pin_no_id']; // user id


    @$result_pass = $db->selectPassport($applicant_id);
    @$record_pass = mysqli_fetch_assoc($result_pass);


    // allow valid image file formats
    if (isset($_FILES['image'])) {

        include 'libs/img_upload_resize_crop.php';
        $your_image = new _image;

        //To Upload
        $your_image->uploadTo = 'uploads/';
        $upload = $your_image->upload($_FILES['image']);
        // echo "<div>" . $upload . "</div>";

        //To Resize
        $your_image->newPath = 'thumbs/';
        $your_image->newWidth = 150;
        $your_image->newHeight = 150;
        $resized = $your_image->resize();
        // echo "<div>" . $resized . "</div>";

        //To Crop
        $width = "150";
        $height = "100";
        $fromX = "0";
        $fromY = "0";
        $your_image->newPath = 'cropped/';
        $cropped = $your_image->crop($width, $height, $fromX, $fromY);
        //  echo "<div>" . $cropped . "</div>";




        @$userpic =   substr($resized, 7);


        // if no error occured, continue ....

        if (!$record_pass) {
            if ($userpic) {

                @$query = "INSERT INTO capture(applicant_id, capture) VALUES('{$applicant_id}', '{$userpic}')";
                $db->insertImage($query);
                header('location:biodata.php');
            } else {

                echo '<script type="text/javascript"> alert("Passport is not uploaded, there is an error, use another picture")</script>';
            }
        } else {

            if ($userpic) {
                @$query = "UPDATE capture SET capture = '{$userpic}'  WHERE applicant_id = '{$applicant_id}'";
                $db->update($query);
            } else {

                echo  '<script type="text/javascript"> alert("Passport is not uploaded, there is an error, use another picture")</script>';
            }
        }
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

                reader.onload = function(e) {
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
            <?php require('header.php'); ?>

            <div class="panel-body">
                <div class="container" style="margin-top: 50px;">

                    <div class="row">
                        <div class="col-lg-10">
                            <h3 align="center">Upload Standard Passport
                            </h3>
                            <h4 align="center">(White Background and not more than 300kb)
                            </h4>
                        </div>
                        <div class="col-lg-2">
                            <h2 align="right">
                                <a href="biodata.php" class="button">
                                    <i class="fa fa-backward"></i> Back
                                </a>

                            </h2>


                        </div>
                    </div><br />

                    <form class="form-horizontal" method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><img id="blah" src="#" alt="my passport" /></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">Email</label></td>
                                    <td><input class="form-control" type="text" name="email" value="<?php echo @$_SESSION['user']; ?>" disabled /></td>

                                </tr>


                                <tr>
                                    <td><label class="control-label">Passport</label></td>
                                    <td><input id="src" class="form-control" required type="file" name="image" id="image" onchange="readURL(this);" accept="image/*" /></td>
                                </tr>


                                <tr>
                                    <td></td>
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
        <?php require('footer.php'); ?>

    </div>




</body>

</html>