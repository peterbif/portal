<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();





    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);


//echo $record_pin['pin_no_id'];

    @$result_wk = $db->selectWorkExperience(@$record_pin['pin_no_id']);
    @$recordset_wk = mysqli_fetch_assoc($result_wk);


    //query schools table

    @$result_res2 = $db->selectSchool2(@$record_pin['pin_no_id']);
    @$record_res2 = mysqli_fetch_assoc($result_res2);


//   <?php if($record_res2['schools_id'] != 3){


//$output = '';




        echo   ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Establishment</th>
                                                <th>Position</th>
                                                <th>Year (From)</th>
                                                <th>Year (To)</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead> 
                                            <tbody>';

        if($recordset_wk){
            $sn  = 1;
            do {
                echo '<tr>';
                echo '<td>' . $sn++ .'</td>';
                echo'<td class="school" data-id1="'.@$recordset_wk['work_experience_id'].'">' . ucwords(@$recordset_wk['establishment']) . '</td>';
                echo '<td class="school" data-id3="'.@$recordset_wk['work_experience_id'].'">' . ucwords(@$recordset_wk['position']) . ' </td>';
                echo '<td class="school" data-id4="'.@$recordset_wk['work_experience_id'].'">' . ucwords(@$recordset_wk['yearfw']) . ' </td>';
                echo '<td class="school" data-id5="'.@$recordset_wk['work_experience_id'].'">' . ucwords(@$recordset_wk['yeartw']) . ' </td>';
                echo  ' <td><a href="update_work_experience.php?id='.@$recordset_wk['work_experience_id'].'" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_work" id="delete_work" data-id6="'. @$recordset_wk['work_experience_id'].'" class="button2" style="font-size: 13px;">Delete</button></td>';
                echo  '<tr>';
            }

            while(@$recordset_wk = mysqli_fetch_assoc($result_wk)) ;


        }

        else{

            echo  '<tr><td colspan="6">No Records Found</td></tr>';
        }

        echo '</tbody></table>';










?>







