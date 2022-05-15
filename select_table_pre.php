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


    @$result_pre = $db->selectPreviousAppointment($record_pin['pin_no_id']);
    @$recordset_pre = mysqli_fetch_assoc($result_pre);


//$output = '';

    echo   ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Establishment</th>
                                                <th>Address</th>
                                                <th>Date</th>
                                                <th>Salary</th>
                                                 <th>Nature of Job</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead> 
                                            <tbody>';

    if($recordset_pre){
        $sn  = 1;
        do {
            echo '<tr>';
            echo '<td>' . $sn++ .'</td>';
            echo'<td class="school" data-id1="'.@$recordset_pre['present_appointment_id'].'">' . ucwords(@$recordset_pre['preestab']) . '</td>';
            echo '<td class="school" data-id2="'.@$recordset_pre['present_appointment_id'].'" >' . ucwords(@$recordset_pre['preaddress']) . '</td>';
            echo '<td class="school" data-id3="'.@$recordset_pre['present_appointment_id'].'">' . ucwords(@$recordset_pre['predate']) . ' </td>';
            echo '<td class="school" data-id4="'.@$recordset_pre['present_appointment_id'].'">' . ucwords(@$recordset_pre['presalary']) . '</td>';
            echo '<td class="school" data-id5="'.@$recordset_pre['present_appointment_id'].'">' . ucwords(@$recordset_pre['prenature']) . '</td>';
            echo  ' <td><a href="update_previous_appointment.php?id='.@$recordset_pre['present_appointment_id'].'" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_pre" id="delete_pre" data-id6="'. @$recordset_pre['present_appointment_id'].'" class="button2" style="font-size: 13px;">Delete</button></td>';
            echo  '<tr>';
        }

        while(@$recordset_pre = mysqli_fetch_assoc($result_pre));


    }

    else{

        echo  '<tr><td colspan="6">No Records Found</td></tr>';
    }

    echo '</tbody></table>';
//query exam type table








?>







