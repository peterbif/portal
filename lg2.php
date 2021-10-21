<?php 
require_once("connection.php");


ini_set('display_errors', 1);
	
/*
@$query_1 = "SELECT * FROM access_code where email = '{$_SESSION['user']}'";
$query_run_1 = mysql_query($query_1);
$recordset_1 = mysql_fetch_assoc($query_run_1);

 
	
$query_st = "SELECT * FROM state ORDER BY state_name";
$query_run_st = mysql_query($query_st);
$recordset_st = mysql_fetch_assoc($query_run_st);



$query_lg = "SELECT * FROM local_govt ORDER BY lg_name ASC";
$query_run_lg = mysql_query($query_lg);
$recordset_lg = mysql_fetch_assoc($query_run_lg);
*/

if(@$_GET['id'])
{
	$id2=$_GET['id'];
	$sql = "SELECT * FROM local_govt WHERE state_id = '{$id2}'";
	$lg2 = [];
	$result = mysqli_query($conn, $sql);
//	<option value=""></option> 
	while($row = mysqli_fetch_assoc($result))
	{
		$lg2[] = "<option value=\"".$row['lg_id']."\">".$row['lg_name']."</option> ";
	}
 
 	$str = join('', $lg2);
 	echo $str;
	exit;
}
return array();
exit;


?>



