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


    @$result_ref = $db->selectREF($record_pin['pin_no_id']);
    @$recordset_ref = mysqli_fetch_assoc($result_ref);




//$output = '';

    echo   ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                            
                                          
                                                <th>S/N</th>
                                                <th>Surname</th>
                                                <th>Firstname</th>
                                                <th>Gender</th>
                                               <th>Occupation</th>
                                               <th>Contact Address</th>
                                               <th>Phone NO</th>
                                               <th>Email</th>
                                                <th>Action</th>
     
                                            </tr>
                                            </thead> 
                                            <tbody>';

    if($recordset_ref){
        $sn  = 1;
        do {
            echo '<tr>';
            echo '<td>' . $sn++ .'</td>';
            echo'<td class="school" data-id1="'.@$recordset_ref['applicant_ref_id'].'">'. ucwords(@$recordset_ref['rsurname']) .'</td>';
            echo '<td class="school" data-id2="'.@$recordset_ref['applicant_ref_id'].'" >' . ucwords(@$recordset_ref['rfirstname']) . '</td>';
            echo '<td class="school" data-id3="'.@$recordset_ref['applicant_ref_id'].'" >' . ucwords(@$recordset_ref['gender']) . '</td>';
            echo '<td class="school" data-id4="'.@$recordset_ref['applicant_ref_id'].'" >' . ucwords(@$recordset_ref['roccupation']) . '</td>';
            echo '<td class="school" data-id5="'.@$recordset_ref['applicant_ref_id'].'" >' . ucwords(@$recordset_ref['rcontact_add']) . '</td>';
            echo '<td class="school" data-id6="'.@$recordset_ref['applicant_ref_id'].'" >' . ucwords(@$recordset_ref['rphone_no']) . '</td>';
            echo '<td class="school" data-id7="'.@$recordset_ref['applicant_ref_id'].'" >' . ucwords(@$recordset_ref['remail']) . '</td>';
            echo  ' <td><a href="update_ref.php?id='.@$recordset_ref['applicant_ref_id'].'" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_ref" id="delete_ref" data-id8="'. @$recordset_ref['applicant_ref_id'].'" class="button2" style="font-size: 13px;">Delete</button></td>';
            echo  '<tr>';
        }

        while(@$recordset_ref = mysqli_fetch_assoc($result_ref));


    }

    else{

        echo  '<tr><td colspan="6">No Records Found</td></tr>';
    }

    echo '</tbody></table>';
//query exam type table





?>







