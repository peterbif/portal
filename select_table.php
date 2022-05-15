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

    $query_edu = $db->selectEducation222($record_pin['pin_no_id']);
    $recordset_edu = mysqli_fetch_assoc($query_edu);


    //query schools table

    @$result_res2 = $db->selectSchool2(@$record_pin['pin_no_id']);
    @$record_res2 = mysqli_fetch_assoc($result_res2);


//   <?php if($record_res2['schools_id'] != 3){


//$output = '';

if($record_res2['schools_id'] != 3){


    echo   ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Institution</th>
                                                <th>Course / Program</th>
                                                <th>Qualification</th>
                                                 <th>Registration Numbar</th>
                                                <th>Year (From)</th>
                                                <th>Year (To)</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead> 
                                            <tbody>';

    if($recordset_edu){
        $sn  = 1;
        do {
            echo '<tr>';
            echo '<td>' . $sn++ .'</td>';
            echo'<td class="school" data-id1="'.@$recordset_edu['education_id'].'">' . ucwords(@$recordset_edu['school_name']) . '</td>';
            echo '<td class="school" data-id2="'.@$recordset_edu['education_id'].'">' . ucwords(@$recordset_edu['ecourse']) . '</td>';
            echo '<td class="school" data-id3="'.@$recordset_edu['education_id'].'">' . ucwords(@$recordset_edu['equalification']) . ' </td>';
            echo '<td class="school" data-id3="'.@$recordset_edu['education_id'].'">' . ucwords(@$recordset_edu['reg_no']) . ' </td>';
            echo '<td class="school" data-id4="'.@$recordset_edu['education_id'].'">' . ucwords(@$recordset_edu['yearf']) . ' </td>';
            echo '<td class="school" data-id5="'.@$recordset_edu['education_id'].'">' . ucwords(@$recordset_edu['yeart']) . ' </td>';
            echo  ' <td><a href="update_education.php?id='.@$recordset_edu['education_id'].'" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_edu" id="delete_edu" data-id6="'. @$recordset_edu['education_id'].'" class="button2" style="font-size: 13px;">Delete</button></td>';
            echo  '<tr>';
        }

        while(@$recordset_edu = mysqli_fetch_assoc($query_edu)) ;


    }

    else{

        echo  '<tr><td colspan="6">No Records Found</td></tr>';
    }

    echo '</tbody></table>';


}

    else {


        echo ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Institution</th>
                                                <th>Qualification</th>
                                                <th>Year (From)</th>
                                                <th>Year (To)</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead> 
                                            <tbody>';

        if ($recordset_edu) {
            $sn = 1;
            do {
                echo '<tr>';
                echo '<td>' . $sn++ . '</td>';
                echo '<td class="school" data-id1="' . @$recordset_edu['education_id'] . '">' . ucwords(@$recordset_edu['school_name']) . '</td>';
                echo '<td class="school" data-id3="' . @$recordset_edu['education_id'] . '">' . ucwords(@$recordset_edu['equalification']) . ' </td>';
                echo '<td class="school" data-id4="' . @$recordset_edu['education_id'] . '">' . ucwords(@$recordset_edu['yearf']) . ' </td>';
                echo '<td class="school" data-id5="' . @$recordset_edu['education_id'] . '">' . ucwords(@$recordset_edu['yeart']) . ' </td>';
                echo ' <td><a href="update_education.php?id=' . @$recordset_edu['education_id'] . '" class="button2" style="font-size: 12px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_edu" id="delete_edu" data-id6="' . @$recordset_edu['education_id'] . '" class="button2" style="font-size: 13px;">Delete</button></td>';
                echo '<tr>';
            } while (@$recordset_edu = mysqli_fetch_assoc($query_edu));


        } else {

            echo '<tr><td colspan="6">No Records Found</td></tr>';
        }

        echo '</tbody></table>';
//query exam type table


    }






?>







