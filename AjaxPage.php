<?php
require_once ('connection.php');

@$term = mysqli_real_escape_string($conn, $_GET['search_name']);

@$sql = "SELECT * FROM users WHERE email LIKE '%".$term."%'";
$r_query = mysqli_query($conn, $sql);

if($r_query) {
    while ($row = mysqli_fetch_array($r_query)) {

        $surname = $row['surname'];
        $firstname = $row['firstname'];
        $email = $row['email'];
        $phone_no = $row['phone_no'];
        $role = $row['role'];


    }
}
else{

    echo '<script type="text/javascript"> alert("Record doesn\'t exist") </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Transfusion Unit</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/3.3.7bootstrap.min.css">


    <script src="js/3.3.7bootstrap.min.js.js"></script>

    <script src="js/3.2.1jquery.min.js.js"></script>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $( "#target").submit(function( event ) {
                event.preventDefault();
                var search_name=$('#search_name').val();
                $.ajax({url:"AjaxPage.php?search_name="+search_name,cache:false,success:function(result){
                        $('.showResult').html(result);
                    }});
            });
        });
    </script>

</head>



<body>
<div class="container-fluid">
        <div class="panel-body" style="margin-left: 80px">
            <div class="row">
                <div class="col-lg-8 showResult">
                    <h2 align="center" style="color: #000000">Update User </h2>
                    <form id="target">
                        <div class="form-group">
                            <input type="text" name="search" id="search_name">
                            <input type="submit" name="submit">
                        </div>

                        <div class="form-group">
                            <label for="email">Surname:</label>
                            <input type="text" class="form-control" name="surname" value="<?php echo @$surname; ?>" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Firstname:</label>
                            <input type="text" class="form-control" name="firstname" id="pwd" value="<?php echo @$firstname; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <input type="text" class="form-control" id="pwd"  value="<?php echo @$email; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="pwd">Phone No:</label>
                            <input type="text" class="form-control" id="pwd" value="<?php echo @$phone_no; ?>">
                        </div>
                        <div class="form-group">
                            <label for="role" style="font-size: 20px"> Role: </label> &nbsp;&nbsp;
                            <input type="radio" class="radio-inline" name="role" value="1" size="12"> <span style="font-size: 18px;"> &nbsp;&nbsp;Admin </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="radio-inline" name="role" value="2">  <span style="font-size: 18px;">&nbsp;&nbsp;User</span>
                        </div>
                        <h2 align="right"><button type="submit" class="btn btn-lg btn-danger">Update</button></h2>
                    </form>
                </div>

            </div>






        </div>

        <div class="panel-footer" style="background-color: #bf1208;  position: fixed;
  right: 10px;
  bottom: 0;
  left: 10px;
  padding: 1rem;
  text-align: center; font-size: 12px; color: #ffffff";  align="center"><?php include_once ('copyright.php');?> </div>

    </div>

</div>


</body>

</html>

