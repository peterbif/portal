<?php
@$id = $_GET['id'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();


@$result = $db->selectPinNo22($_POST['id']);
@$row = mysqli_fetch_assoc($result);

if (@$row) {

    $email = $row['email'];

    $phone_no = $row['phone_no'];
} else {

    echo '<script type="text/javascript"> alert("No record")</script>';
}

?>

<div class="col-lg-6 col-sm-offset-3">
    <div class="input-container">
        <i class="fa fa-envelope icon"> &nbsp; Email</i>
        <input class="input-field" type="text" v-model="email" placeholder="Email" value="<?php echo @$email; ?>" name="email">
    </div>

    <div class="input-container">
        <i class="fa fa-phone icon"> &nbsp; Phone</i>
        <input class="input-field" type="text" v-model="phone_no" placeholder="Phone No" value="<?php echo @$phone_no; ?>" name="phone_no">
    </div>



    <div align="right">
        <button type="submit" name="update" class="button"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Update</button>
    </div>

</div>