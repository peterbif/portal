<?php
session_start();

@$_SESSION['exam_type'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

@$db = new Connect();

//query users table INNER JOIN other tables using $_GET['id'] as parameter
//$myArray = array();
@$record = $db->selectQuestions($_SESSION['exam_type']);
$result = mysqli_fetch_array($record);

do {
    $duration = $result ['duration'];
}
while($result = mysqli_fetch_array($record));

$_SESSION['duration'] = $duration;

$_SESSION['start_time'] = date("Y-m-d H:i:s");

$end_time = date('Y-m-d H:i:s', strtotime('+'. $_SESSION['duration'] . 'minutes', strtotime($_SESSION['start_time'])));

$_SESSION['end_time'] = $end_time ;

?>
<script type="text/javascript">
    window.location="student_question.php";
</script>