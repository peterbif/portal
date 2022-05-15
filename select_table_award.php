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


    $query_awa = $db->selectAward($record_pin['pin_no_id']);
    $recordset_awa = mysqli_fetch_assoc($query_awa);




//$output = '';

    echo   ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Award/Scholarship</th>
                                                <th>Award/Scholarship Details</th>
                                                 <th>Action</th>
     
                                            </tr>
                                            </thead> 
                                            <tbody>';

    if($recordset_awa){
        $sn  = 1;
        do {
            echo '<tr>';
            echo '<td>' . $sn++ .'</td>';
            echo'<td class="school" data-id1="'.@$recordset_awa['award_id'].'">'.' If you studied and qualified as a private student Please click:'. ' ' . ucwords(@$recordset_awa['award']) . '</td>';
            echo '<td class="school" data-id2="'.@$recordset_awa['award_id'].'" >' . ucwords(@$recordset_awa['scholarship_details']) . '</td>';
            echo  ' <td><a href="update_award.php?id='.@$recordset_awa['award_id'].'" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_awa" id="delete_awa" data-id3="'. @$recordset_awa['award_id'].'" class="button2" style="font-size: 13px;">Delete</button></td>';
            echo  '<tr>';
        }

        while(@$recordset_awa = mysqli_fetch_assoc($query_awa));


    }

    else{

        echo  '<tr><td colspan="6">No Records Found</td></tr>';
    }

    echo '</tbody></table>';
//query exam type table








?>







