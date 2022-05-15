<?php
session_start();

require ('time_out.php');

@$_SESSION['user'];

//auto load classes required
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$db = new Connect();

@$_SESSION['hidden'] = $_GET['olevel_id'];


    @$result_pin = $db->selectPinNO2($_SESSION['user']);
    @$record_pin = mysqli_fetch_assoc($result_pin);


    @$result_pre = $db->selectOlevel1($record_pin['pin_no_id']);
    @$recordset_pre = mysqli_fetch_assoc($result_pre);


    @$result_pre2 = $db->selectOlevel2($record_pin['pin_no_id']);
    @$recordset_pre2 = mysqli_fetch_assoc($result_pre2);

    @$result_pre3 = $db->selectOlevel3($record_pin['pin_no_id']);
    @$recordset_pre3 = mysqli_fetch_assoc($result_pre3);

    @$result_pre4 = $db->selectOlevel4($record_pin['pin_no_id']);
    @$recordset_pre4 = mysqli_fetch_assoc($result_pre4);

    @$result_pre5 = $db->selectOlevel5($record_pin['pin_no_id']);
    @$recordset_pre5 = mysqli_fetch_assoc($result_pre5);

    @$result_pre6 = $db->selectOlevel6($record_pin['pin_no_id']);
    @$recordset_pre6 = mysqli_fetch_assoc($result_pre6);

    @$result_pre7 = $db->selectOlevel7($record_pin['pin_no_id']);
    @$recordset_pre7 = mysqli_fetch_assoc($result_pre7);

    @$result_pre8 = $db->selectOlevel8($record_pin['pin_no_id']);
    @$recordset_pre8 = mysqli_fetch_assoc($result_pre8);

    @$result_pre9 = $db->selectOlevel9($record_pin['pin_no_id']);
    @$recordset_pre9 = mysqli_fetch_assoc($result_pre9);



    @$result_pre11 = $db->selectOlevel11($record_pin['pin_no_id']);
    @$recordset_pre11 = mysqli_fetch_assoc($result_pre11);


    @$result_pre12 = $db->selectOlevel12($record_pin['pin_no_id']);
    @$recordset_pre12 = mysqli_fetch_assoc($result_pre12);

    @$result_pre13 = $db->selectOlevel13($record_pin['pin_no_id']);
    @$recordset_pre13 = mysqli_fetch_assoc($result_pre13);

    @$result_pre14 = $db->selectOlevel14($record_pin['pin_no_id']);
    @$recordset_pre14 = mysqli_fetch_assoc($result_pre14);

    @$result_pre15 = $db->selectOlevel15($record_pin['pin_no_id']);
    @$recordset_pre15 = mysqli_fetch_assoc($result_pre15);

    @$result_pre16 = $db->selectOlevel16($record_pin['pin_no_id']);
    @$recordset_pre16 = mysqli_fetch_assoc($result_pre16);

    @$result_pre17 = $db->selectOlevel17($record_pin['pin_no_id']);
    @$recordset_pre17 = mysqli_fetch_assoc($result_pre17);

    @$result_pre18 = $db->selectOlevel18($record_pin['pin_no_id']);
    @$recordset_pre18 = mysqli_fetch_assoc($result_pre18);

    @$result_pre19 = $db->selectOlevel19($record_pin['pin_no_id']);
    @$recordset_pre19 = mysqli_fetch_assoc($result_pre19);

    //echo $recordset_pre11['sitting'];
    // echo  @$recordset_pre['olevel_id'];

//$output = '';

    echo   ' <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Sitting</th>
                                                <th>Exam-Type</th>
                                                <th>Exam-Year</th>
                                                 <th>Exam Number</th>
                                                 <th>1.Subject/Grade</th>
                                                  <th>2.Subject/Grade</th>
                                                    <th>3.Subject/Grade</th>
                                                      <th>4.Subject/Grade</th>
                                                        <th>5.Subject/Grade</th>
                                                          <th>6.Subject/Grade</th>
                                                            <th>7.Subject/Grade</th>
                                                              <th>8.Subject/Grade</th>
                                                                <th>9.Subject/Grade</th>
                                                                 <th>Subjects Passed</th>
                                                                       <th>Action</th>
                                            </tr>
                                            </thead> 
                                            <tbody>';

    if($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2) && ($recordset_pre['sitting_id'] == 1) ){
        $sn  = 1;

            echo '<tr>';
            echo '<td>' . $sn++ .'</td>';
            echo'<td class="school" data-id1="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['sitting']) . '</td>';
            echo '<td class="school" data-id2="'.$recordset_pre['olevel_id'].'" >' . ucwords(@$recordset_pre['exam_type']) . '</td>';
            echo '<td class="school" data-id3="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['exam_year']) . ' </td>';
        echo '<td class="school" data-id4="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['exam_no']) . ' </td>';
            echo '<td class="school" data-id5="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['subject']) . ' - '.' '.ucwords(@$recordset_pre['grade']).'</td>';
        echo '<td class="school" data-id6="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre2['subject']) . ' - '.' '.ucwords(@$recordset_pre2['grade']).'</td>';
        echo '<td class="school" data-id7="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre3['subject']) . ' - '.' '.ucwords(@$recordset_pre3['grade']).'</td>';
        echo '<td class="school" data-id8="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre4['subject']) . ' - '.' '.ucwords(@$recordset_pre4['grade']).'</td>';
        echo '<td class="school" data-id9="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre5['subject']) . ' - '.' '.ucwords(@$recordset_pre5['grade']).'</td>';
        echo '<td class="school" data-id10="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre6['subject']) . ' - '.' '.ucwords(@$recordset_pre6['grade']).'</td>';
        echo '<td class="school" data-id11="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre7['subject']) . ' - '.' '.ucwords(@$recordset_pre7['grade']).'</td>';
        echo '<td class="school" data-id12="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre8['subject']) . ' - '.' '.ucwords(@$recordset_pre8['grade']).'</td>';
        echo '<td class="school" data-id13="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre9['subject']) . ' - '.' '.ucwords(@$recordset_pre9['grade']).'</td>';
        echo '<td class="school" data-id13="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre9['no_of_credit_passes']) . '</td>';


            echo  ' <td><a href="update_olevel.php?id='.@$recordset_pre['olevel_id'].'" class="button2" style="font-size: 10px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_pre" id="delete_olevel" data-id15="'. @$recordset_pre['olevel_id'].'" class="button2" style="font-size: 10px;">Delete</button></td>';
            echo  '<tr>';


        echo '<tr>';
        echo '<td>' . $sn++ .'</td>';
        echo'<td class="school" data-id1="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['sitting']) . '</td>';
        echo '<td class="school" data-id2="'.$recordset_pre11['olevel_id'].'" >' . ucwords(@$recordset_pre11['exam_type']) . '</td>';
        echo '<td class="school" data-id3="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['exam_year']) . ' </td>';
        echo '<td class="school" data-id4="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['exam_no']) . ' </td>';
        echo '<td class="school" data-id5="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['subject']) . ' - '.' '.ucwords(@$recordset_pre11['grade']).'</td>';
        echo '<td class="school" data-id6="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre12['subject']) . ' - '.' '.ucwords(@$recordset_pre12['grade']).'</td>';
        echo '<td class="school" data-id7="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre13['subject']) . ' - '.' '.ucwords(@$recordset_pre13['grade']).'</td>';
        echo '<td class="school" data-id8="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre14['subject']) . ' - '.' '.ucwords(@$recordset_pre14['grade']).'</td>';
        echo '<td class="school" data-id9="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre15['subject']) . ' - '.' '.ucwords(@$recordset_pre15['grade']).'</td>';
        echo '<td class="school" data-id10="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre16['subject']) . ' - '.' '.ucwords(@$recordset_pre16['grade']).'</td>';
        echo '<td class="school" data-id11="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre17['subject']) . ' - '.' '.ucwords(@$recordset_pre17['grade']).'</td>';
        echo '<td class="school" data-id12="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre18['subject']) . ' - '.' '.ucwords(@$recordset_pre18['grade']).'</td>';
        echo '<td class="school" data-id13="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre19['subject']) . ' - '.' '.ucwords(@$recordset_pre19['grade']).'</td>';
        echo '<td class="school" data-id13="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre19['no_of_credit_passes']) . '</td>';
        echo  ' <td><a href="update_olevel.php?id='.@$recordset_pre11['olevel_id'].'" class="button2" style="font-size: 10px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_olevel" id="delete_olevel" data-id15="'. @$recordset_pre11['olevel_id'].'" class="button2" style="font-size: 10px;">Delete</button></td>';
        echo  '<tr>';



    }


    elseif($recordset_pre11 && ($recordset_pre11['sitting_id'] == 2)){
        $sn  = 1;


        echo '<tr>';
        echo '<td>' . $sn++ .'</td>';
        echo'<td class="school" data-id1="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['sitting']) . '</td>';
        echo '<td class="school" data-id2="'.$recordset_pre11['olevel_id'].'" >' . ucwords(@$recordset_pre11['exam_type']) . '</td>';
        echo '<td class="school" data-id3="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['exam_year']) . ' </td>';
        echo '<td class="school" data-id4="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['exam_no']) . ' </td>';
        echo '<td class="school" data-id5="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre11['subject']) . ' - '.' '.ucwords(@$recordset_pre11['grade']).'</td>';
        echo '<td class="school" data-id6="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre12['subject']) . ' - '.' '.ucwords(@$recordset_pre12['grade']).'</td>';
        echo '<td class="school" data-id7="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre13['subject']) . ' - '.' '.ucwords(@$recordset_pre13['grade']).'</td>';
        echo '<td class="school" data-id8="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre14['subject']) . ' - '.' '.ucwords(@$recordset_pre14['grade']).'</td>';
        echo '<td class="school" data-id9="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre15['subject']) . ' - '.' '.ucwords(@$recordset_pre15['grade']).'</td>';
        echo '<td class="school" data-id10="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre16['subject']) . ' - '.' '.ucwords(@$recordset_pre16['grade']).'</td>';
        echo '<td class="school" data-id11="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre17['subject']) . ' - '.' '.ucwords(@$recordset_pre17['grade']).'</td>';
        echo '<td class="school" data-id12="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre18['subject']) . ' - '.' '.ucwords(@$recordset_pre18['grade']).'</td>';
        echo '<td class="school" data-id13="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre19['subject']) . ' - '.' '.ucwords(@$recordset_pre19['grade']).'</td>';
        echo '<td class="school" data-id14="'.@$recordset_pre11['olevel_id'].'">' . ucwords(@$recordset_pre19['no_of_credit_passes']) . '</td>';
        echo  ' <td><a href="update_olevel.php?id='.@$recordset_pre11['olevel_id'].'" class="button2" style="font-size: 10px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_olevel" id="delete_olevel" data-id15="'. @$recordset_pre11['olevel_id'].'" class="button2" style="font-size: 10px;">Delete</button></td>';
        echo  '<tr>';



    }


    elseif ($recordset_pre && ($recordset_pre['sitting_id'] == 1)){
        $sn  = 1;

        echo '<tr>';
        echo '<td>' . $sn++ .'</td>';
        echo'<td class="school" data-id1="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['sitting']) . '</td>';
        echo '<td class="school" data-id2="'.$recordset_pre['olevel_id'].'" >' . ucwords(@$recordset_pre['exam_type']) . '</td>';
        echo '<td class="school" data-id3="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['exam_year']) . ' </td>';
        echo '<td class="school" data-id4="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['exam_no']) . ' </td>';
        echo '<td class="school" data-id5="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre['subject']) . ' - '.' '.ucwords(@$recordset_pre['grade']).'</td>';
        echo '<td class="school" data-id6="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre2['subject']) . ' - '.' '.ucwords(@$recordset_pre2['grade']).'</td>';
        echo '<td class="school" data-id7="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre3['subject']) . ' - '.' '.ucwords(@$recordset_pre3['grade']).'</td>';
        echo '<td class="school" data-id8="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre4['subject']) . ' - '.' '.ucwords(@$recordset_pre4['grade']).'</td>';
        echo '<td class="school" data-id9="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre5['subject']) . ' - '.' '.ucwords(@$recordset_pre5['grade']).'</td>';
        echo '<td class="school" data-id10="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre6['subject']) . ' - '.' '.ucwords(@$recordset_pre6['grade']).'</td>';
        echo '<td class="school" data-id11="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre7['subject']) . ' - '.' '.ucwords(@$recordset_pre7['grade']).'</td>';
        echo '<td class="school" data-id12="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre8['subject']) . ' - '.' '.ucwords(@$recordset_pre8['grade']).'</td>';
        echo '<td class="school" data-id13="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre9['subject']) . ' - '.' '.ucwords(@$recordset_pre9['grade']).'</td>';
        echo '<td class="school" data-id14="'.@$recordset_pre['olevel_id'].'">' . ucwords(@$recordset_pre9['no_of_credit_passes']) . '</td>';


        echo  ' <td><a href="update_olevel.php?id='.@$recordset_pre['olevel_id'].'" class="button2" style="font-size: 10px;">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="delete_olevel" id="delete_olevel" data-id15="'. @$recordset_pre['olevel_id'].'" class="button2" style="font-size: 10px;">Delete</button></td>';
        echo  '<tr>';






    }





    else{

        echo  '<tr><td colspan="6">No Records Found</td></tr>';
    }

    echo '</tbody></table>';
//query exam type table





?>





