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


    $query_pro = $db->selectProfessionalTraining($record_pin['pin_no_id']);
    $recordset_pro = mysqli_fetch_assoc($query_pro);



//$output = '';

    echo   ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Institution</th>
                                                <th>Course</th>
                                                <th>Certification/Honours</th>
                                                <th>Year</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead> 
                                            <tbody>';

    if($recordset_pro){
        $sn  = 1;
        do {
            echo '<tr>';
            echo '<td>' . $sn++ .'</td>';
            echo'<td class="school" data-id1="'.@$recordset_pro['pro_id'].'">' . ucwords(@$recordset_pro['pschool_name']) . '</td>';
            echo '<td class="school" data-id2="'.@$recordset_pro['pro_id'].'" >' . ucwords(@$recordset_pro['pcourse']) . '</td>';
            echo '<td class="school" data-id3="'.@$recordset_pro['pro_id'].'">' . ucwords(@$recordset_pro['pcertificate']) . ' </td>';
            echo '<td class="school" data-id4="'.@$recordset_pro['pro_id'].'">' . ucwords(@$recordset_pro['pdate']) . '</td>';
            echo  ' <td><a href="update_pro.php?id='.@$recordset_pro['pro_id'].'" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_" id="delete_pro" data-id5="'. @$recordset_pro['pro_id'].'" class="button2" style="font-size: 13px;">Delete</button></td>';
            echo  '<tr>';
        }

        while(@$recordset_pro = mysqli_fetch_assoc($query_pro));


    }

    else{

        echo  '<tr><td colspan="6">No Records Found</td></tr>';
    }

    echo '</tbody></table>';
//query exam type table







?>







