<?php

class Connect
{

    private $hostname = "localhost";
    private $db_name = "son";
    private $username = "peterbif";
    private $password = "Pe12te34@r";

    public $link;


    public  function __construct()
    {

        $this->link = new mysqli($this->hostname, $this->username, $this->password, $this->db_name);
        if (!($this->link)) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }


    public function close_connection()
    {
        if (isset($this->link)) {
            mysqli_close($this->link);
            unset($this->link);
        }
    }



    public function escape_value($string)
    {
        $escaped_string = mysqli_real_escape_string($this->link, $string);
        return $escaped_string;
    }





    public function last_inserted_id()
    {
        //get the last id inserted over the current DB connection
        return mysqli_insert_id($this->link);
    }


    public function affected_row()
    {
        //affected rows
        return mysqli_affected_rows($this->link);
    }



    public function fetch_array($result)
    {
        return mysqli_fetch_array($result);
    }


    public function insert($query)
    {

        $result = $this->link->query($query);

        if ($result) {
            echo '<script type="text/javascript"> alert("Information successfully submitted") </script>';
        } else {
            echo '<script type="text/javascript"> alert("Information not submitted") </script>';
        }
    }




    public function insertPins($query)
    {

        $this->link->query($query);
    }


    public function insertPin($query)
    {

        $result = $this->link->query($query);
        return $result;
    }



    public function delete($query)
    {

        $result = $this->link->query($query);

        if ($result) {
            echo '<script type="text/javascript"> alert("Information successfully delete") </script>';
        } else {
            echo '<script type="text/javascript"> alert("Information not submitted, the record exists") </script>';
        }
    }


    public function updatePin($query)
    {

        $result = $this->link->query($query);

        if ($result) {

            header("location:index.php");
            // echo '<script type="text/javascript"> alert("Pin Discarded") </script>';
        } else {
            echo '<script type="text/javascript"> alert("Pin not discarded") </script>';
        }
    }



    public function insertImage($query)
    {
        $result = $this->link->query($query);

        if ($result) {
            echo '<script type="text/javascript"> alert("Image successfully uploaded.....") </script>';
        } else {
            echo '<script type="text/javascript"> alert("Image not uploaded xxxxxxx") </script>';
        }
    }



    public function update($query)
    {
        $result = $this->link->query($query);

        if ($result) {
            echo '<script type="text/javascript"> alert("Information successfully updated") </script>';
        } else {
            echo '<script type="text/javascript"> alert("Information not updated") </script>';
        }
    }


    public function selectQuery($query)
    {

        $result = $this->link->query($query);
        return $result;
    }


    public function selectCreditPasses()
    {
        $query = "SELECT * FROM credit_passes";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectAdminStatus()
    {
        $query = "SELECT * FROM admin_status";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPrograms()
    {
        $query = "SELECT * FROM programs";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectPrograms2($program_id)
    {
        $query = "SELECT * FROM programs WHERE programs_id ='{$program_id}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectAddQualification($id)
    {
        $query = "SELECT * FROM additional_qualification INNER JOIN qualification ON qualification.qualification_id = additional_qualification.qualification_id INNER JOIN grade ON grade.grade_id = additional_qualification.grade_id WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectAddQualification2($id)
    {
        $query = "SELECT * FROM additional_qualification INNER JOIN qualification ON qualification.qualification_id = additional_qualification.qualification_id INNER JOIN grade ON grade.grade_id = additional_qualification.grade_id WHERE additional_qualification_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function orderDate($date)
    {


        $date = new DateTime($date);
        //echo $date->format('d.m.Y'); // 31.07.2012
        return $date->format('d-m-Y'); // 31-07-2012


    }





    public function selectProgram($id)
    {
        $query = "SELECT * FROM program INNER JOIN programs ON programs.programs_id = program.programs_id WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectProgram2($id)
    {
        $query = "SELECT * FROM program  WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectJamb($id)
    {
        $query = "SELECT * FROM jamb_score WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSubject()
    {
        $query = "SELECT * FROM subject ORDER BY subject ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectGrade()
    {
        $query = "SELECT * FROM grade ORDER BY grade ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectExamType()
    {
        $query = "SELECT * FROM exam_type ORDER BY exam_type ASC";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectNOK($id)
    {
        $query = "SELECT * FROM applicant_nok INNER JOIN gender ON gender.gender_id = applicant_nok.ngender WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectREF($id)
    {
        $query = "SELECT * FROM applicant_ref INNER JOIN gender ON gender.gender_id = applicant_ref.rgender WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    /**
     * @return string
     */
    public function age($dob)
    {
        $from = new DateTime($dob);
        $to   = new DateTime('today');
        return $from->diff($to)->y;
    }

    public function selectSchools()
    {
        $query = "SELECT * FROM schools ORDER BY school ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectModeOfTraining()
    {
        $query = "SELECT * FROM mode_of_training ORDER BY sponsor ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectModeOfTraining2($id)
    {
        $query = "SELECT * FROM sponsor2 INNER JOIN mode_of_training ON mode_of_training.mode_id = sponsor2.ssponsor WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectSchoolLogo($id)
    {
        $query = "SELECT * FROM school_logo WHERE school_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectReligion()
    {
        $query = "SELECT * FROM religion ORDER BY religion ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSchool2($id)
    {
        $query = "SELECT * FROM pin INNER JOIN schools on schools.schools_id = pin.school_id WHERE pin.applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectPin()
    {
        $query = "SELECT * FROM pin ORDER BY pin_id DESC LIMIT 1";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectAllSchool($id)
    {
        $query = "SELECT * FROM school  WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectSchool222($id)
    {
        $query = "SELECT * FROM pin INNER JOIN schools on schools.schools_id = pin.school_id INNER JOIN session ON session.session_id = pin.session_id WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectWorkExperience($id)
    {
        $query = "SELECT * FROM work_experience  WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectWorkExperience2($id)
    {
        $query = "SELECT * FROM work_experience  WHERE work_experience_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSchool()
    {
        $query = "SELECT * FROM schools";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSchool22($id)
    {
        $query = "SELECT * FROM schools WHERE schools_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function update2($query)
    {
        $result = $this->link->query($query);

        if ($result) {
            header("location:biodata.php");
        } else {
            echo '<script type="text/javascript"> alert("Information not updated") </script>';
        }
    }



    public function select()
    {
        $query = "SELECT * FROM users";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectPermanentAdd($id)
    {
        $query = "SELECT * FROM permanent_add WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPermanentAddSenatorialStateLgCountry($id)
    {
        $query = "SELECT * FROM permanent_add INNER JOIN senatorial_district ON senatorial_district.senatorial_district_id = permanent_add.senatorial_district 
                 INNER JOIN state ON state.state_id = permanent_add.state_of_origin2 INNER JOIN local_govt ON lg_id = permanent_add.lg_of_origin2
                 INNER JOIN countries ON countries.country_id = permanent_add.nationality WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectContactAddSenatorialStateLgCountry($id)
    {
        $query = "SELECT * FROM contact_add INNER JOIN state ON state.state_id = contact_add.state_of_origin INNER JOIN local_govt ON lg_id = contact_add.lg_of_origin WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectQualification2()
    {
        $query = "SELECT * FROM qualification ORDER BY qualification ASC";
        $result = $this->link->query($query);
        return $result;
    }





    public function selectProfessionalTraining($id)
    {
        $query = "SELECT * FROM professional_training WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectProfessionalTraining22($id)
    {
        $query = "SELECT * FROM professional_training WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectProfessionalTraining2($course)
    {
        $query = "SELECT * FROM professional_training WHERE pro_id ='{$course}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectEducation($id)
    {
        $query = "SELECT * FROM education WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectEducationp($id)
    {
        $query = "SELECT * FROM education WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectEducation22($id)
    {
        $query = "SELECT * FROM education  WHERE education_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectEducation222($id)
    {
        $query = "SELECT * FROM education  WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectEducationCount($id)
    {
        $query = "SELECT COUNT(education_id) FROM education WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectAward($id)
    {
        $query = "SELECT * FROM awards WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSittings()
    {
        $query = "SELECT * FROM sittings ORDER BY sitting ASC";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectSponsor($id)
    {
        $query = "SELECT * FROM sponsor WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectOlevel($id)
    {
        $query = "SELECT * FROM olevel WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectOlevelSitting($id, $id2)
    {
        $query = "SELECT * FROM olevel WHERE applicant_id ='{$id}' AND sitting_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectOlevelUpdate($id)
    {
        $query = "SELECT * FROM olevel WHERE olevel_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectOlevel1($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_1 INNER JOIN grade ON grade.grade_id = olevel.grade_1 WHERE applicant_id ='{$id}' and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel2($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_2 INNER JOIN grade ON grade.grade_id = olevel.grade_2 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }
    public function selectOlevel3($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_3 INNER JOIN grade ON grade.grade_id = olevel.grade_3 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel4($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_4 INNER JOIN grade ON grade.grade_id = olevel.grade_4 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel5($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_5 INNER JOIN grade ON grade.grade_id = olevel.grade_5 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel6($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_6 INNER JOIN grade ON grade.grade_id = olevel.grade_6 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel7($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_7 INNER JOIN grade ON grade.grade_id = olevel.grade_7 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel8($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_8 INNER JOIN grade ON grade.grade_id = olevel.grade_8 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel9($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_9 INNER JOIN grade ON grade.grade_id = olevel.grade_9 WHERE applicant_id ='{$id}'  and olevel.sitting_id = 1";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel11($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_1 INNER JOIN grade ON grade.grade_id = olevel.grade_1 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel12($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_2 INNER JOIN grade ON grade.grade_id = olevel.grade_2 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }
    public function selectOlevel13($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_3 INNER JOIN grade ON grade.grade_id = olevel.grade_3 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }
    public function selectOlevel14($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_4 INNER JOIN grade ON grade.grade_id = olevel.grade_4 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }
    public function selectOlevel15($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_5 INNER JOIN grade ON grade.grade_id = olevel.grade_5 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel16($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_6 INNER JOIN grade ON grade.grade_id = olevel.grade_6 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel17($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_7 INNER JOIN grade ON grade.grade_id = olevel.grade_7 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectOlevel18($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_8 INNER JOIN grade ON grade.grade_id = olevel.grade_8 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectOlevel19($id)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_9 INNER JOIN grade ON grade.grade_id = olevel.grade_9 WHERE applicant_id ='{$id}' AND olevel.sitting_id = 2 ";
        $result = $this->link->query($query);
        return $result;
    }






    public function selectOlevel21($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_1 INNER JOIN grade ON grade.grade_id = olevel.grade_1 WHERE applicant_id ='{$id}' AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel22($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_2 INNER JOIN grade ON grade.grade_id = olevel.grade_2 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }
    public function selectOlevel23($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_3 INNER JOIN grade ON grade.grade_id = olevel.grade_3 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel24($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_4 INNER JOIN grade ON grade.grade_id = olevel.grade_4 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel25($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_5 INNER JOIN grade ON grade.grade_id = olevel.grade_5 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel26($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_6 INNER JOIN grade ON grade.grade_id = olevel.grade_6 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel27($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_7 INNER JOIN grade ON grade.grade_id = olevel.grade_7 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel28($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_8 INNER JOIN grade ON grade.grade_id = olevel.grade_8 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectOlevel29($id, $id2)
    {
        $query = "SELECT * FROM olevel INNER JOIN sittings ON sittings.sittings_id = olevel.sitting_id INNER JOIN exam_type ON exam_type.exam_type_id = olevel.exam_type INNER JOIN subject ON subject.subject_id = olevel.subject_9 INNER JOIN grade ON grade.grade_id = olevel.grade_9 WHERE applicant_id ='{$id}'  AND olevel.olevel_id = '{$id2}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectAwards($id)
    {
        $query = "SELECT * FROM awards WHERE award_id  ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectEducation2($id)
    {
        $query = "SELECT * FROM education WHERE education_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPresentAppointment($id)
    {
        $query = "SELECT * FROM present_appointment WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectPreviousAppointment($id)
    {
        $query = "SELECT * FROM previous_appointment WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectPreviousAppointment2($id)
    {
        $query = "SELECT * FROM previous_appointment WHERE present_appointment_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectContactAdd($id)
    {
        $query = "SELECT * FROM contact_add WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectState()
    {
        $query = "SELECT * FROM state ORDER BY state_name ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSenateDistrict()
    {
        $query = "SELECT * FROM senatorial_district ORDER BY district ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectCountry()
    {
        $query = "SELECT * FROM countries";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSession()
    {
        $query = "SELECT * FROM session ORDER BY session ASC";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectCutOffMark($session_id, $school_id, $program_id)
    {
        $query = "SELECT * FROM cut_off_mark WHERE session_id ='{$session_id}' AND school_id ='{$school_id}' AND program_id ='{$program_id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectCutOffMarkSet($school)
    {
        $query = "SELECT * FROM cut_off_mark INNER JOIN session ON session.session_id = cut_off_mark.session_id INNER JOIN schools ON schools.schools_id = cut_off_mark.school_id INNER JOIN programs ON programs.programs_id = cut_off_mark.program_id WHERE cut_off_mark.school_id ='{$school}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectCutOffMarkSet2($id)
    {
        $query = "SELECT * FROM cut_off_mark INNER JOIN session ON session.session_id = cut_off_mark.session_id INNER JOIN schools ON schools.schools_id = cut_off_mark.school_id INNER JOIN programs ON programs.programs_id = cut_off_mark.program_id WHERE cut_off_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectStudentExamScore($applicant_id)
    {
        $query = "SELECT * FROM student_exam_score LEFT OUTER JOIN admin_status ON admin_status.admin_status_id =  student_exam_score.admin_status_id WHERE applicant_id ='{$applicant_id}' ORDER BY student_exam_score_id DESC LIMIT 1";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectStudentExamScore2($applicant_id)
    {
        $query = "SELECT * FROM student_exam_score  WHERE student_exam_score_id  ='{$applicant_id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPinSessionSchool($school, $session)
    {
        $query = "SELECT pin FROM pin INNER JOIN schools ON schools.schools_id = pin.school_id INNER JOIN session on session.session_id = pin.session_id WHERE pin.school_id = '{$school}' AND pin.session_id = '{$session}' ORDER BY pin.form_no ASC";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPinSessionSchool2($school, $session)
    {
        $query = "SELECT * FROM pin INNER JOIN schools ON schools.schools_id = pin.school_id INNER JOIN session on session.session_id = pin.session_id WHERE pin.school_id = '{$school}' AND pin.session_id = '{$session}' ORDER BY pin_id ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectPinCode($pin)
    {
        $query = "SELECT * FROM pin WHERE pin = '{$pin}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectSetSession33()
    {
        $query = "SELECT * FROM set_session INNER JOIN schools ON schools.schools_id = set_session.school INNER JOIN session ON session.session_id = set_session.set_session ORDER BY schools.school DESC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSession2($session)
    {
        $query = "SELECT * FROM session WHERE session = '{$session}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectSession3($id)
    {
        $query = "SELECT * FROM session WHERE session_id  = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectQualification($qualification)
    {
        $query = "SELECT * FROM qualification WHERE qualification = '{$qualification}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectQualifications()
    {
        $query = "SELECT * FROM qualification";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectGender()
    {
        $query = "SELECT * FROM gender";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectGender2()
    {
        $query = "SELECT * FROM gender";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectGender3()
    {
        $query = "SELECT * FROM gender";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectMaritalStatus()
    {
        $query = "SELECT * FROM marital_status";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPinNum2($school, $session)
    {
        $query = "SELECT * FROM pin_nos INNER JOIN bio_data ON bio_data.applicant_id = pin_nos.pin_no_id INNER JOIN school ON school.applicant_id = bio_data.applicant_id  WHERE school.schools_id ='{$school}' AND school.session ='{$session}'  ORDER BY bio_data.biodata_id ASC";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPinPinNo($pin, $email)
    {
        $query = "SELECT * FROM pin_nos WHERE pin = '{$pin}' OR email = '{$email}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectPinNum22($school, $session)
    {
        $query = "SELECT * FROM pin_nos LEFT OUTER JOIN bio_data ON bio_data.applicant_id = pin_nos.pin_no_id LEFT OUTER JOIN pin ON pin.applicant_id = pin_nos.pin_no_id LEFT OUTER JOIN gender ON gender.gender_id = bio_data.bgender LEFT OUTER JOIN capture ON capture.applicant_id = bio_data.applicant_id  WHERE pin.school_id ='{$school}' AND pin.session_id ='{$session}'  ORDER BY pin.form_no ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectPinNum222($school, $session, $program)
    {
        $query = "SELECT * FROM pin_nos LEFT OUTER JOIN bio_data ON bio_data.applicant_id = pin_nos.pin_no_id LEFT OUTER JOIN pin ON pin.applicant_id = pin_nos.pin_no_id LEFT OUTER JOIN gender ON gender.gender_id = bio_data.bgender LEFT OUTER JOIN capture ON capture.applicant_id = bio_data.applicant_id LEFT OUTER JOIN student_exam_score ON student_exam_score.applicant_id =  pin_nos.pin_no_id  LEFT OUTER JOIN admin_status ON admin_status.admin_status_id =  student_exam_score.admin_status_id INNER JOIN program ON program.applicant_id = pin_nos.pin_no_id INNER JOIN programs ON programs.programs_id = program.programs_id LEFT OUTER JOIN contact_add ON contact_add.applicant_id = bio_data.applicant_id LEFT OUTER JOIN marital_status ON marital_status.marital_status_id = bio_data.bmarital_status LEFT OUTER JOIN permanent_add ON permanent_add.applicant_id = bio_data.applicant_id WHERE pin.school_id ='{$school}' AND pin.session_id ='{$session}' AND program.programs_id ='{$program}' ORDER BY pin.form_no ASC";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectStat()
    {
        $query = "SELECT specialty, COUNT(DISTINCT specialty) FROM  department  INNER JOIN residency ON residency.residency_id = department.residency_id  INNER JOIN bio_data ON bio_data.applicant_id = department.applicant_id  INNER JOIN permanent_add ON permanent_add.applicant_id = bio_data.applicant_id INNER JOIN contact_add ON contact_add.applicant_id = bio_data.applicant_id  INNER JOIN education ON education.applicant_id = bio_data.applicant_id  INNER JOIN qualification ON qualification.qualification_id = education.equalification WHERE (qualification.qualification_id = 15 or qualification.qualification_id = 16) GROUP BY specialty ASC";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectStat2()
    {
        $query = "SELECT COUNT(DISTINCT specialty) FROM  department  INNER JOIN residency ON residency.residency_id = department.residency_id INNER JOIN bio_data ON bio_data.applicant_id = department.applicant_id  INNER JOIN permanent_add ON permanent_add.applicant_id = bio_data.applicant_id INNER JOIN contact_add ON contact_add.applicant_id = bio_data.applicant_id  INNER JOIN education ON education.applicant_id = bio_data.applicant_id  INNER JOIN qualification ON qualification.qualification_id = education.equalification WHERE (qualification.qualification_id = 15 or qualification.qualification_id = 16)";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectPinNo($email, $phone_no)
    {
        $query = "SELECT * FROM pin_nos WHERE email = '{$email}' AND phone_no ='{$phone_no}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectPinNo2($email)
    {
        $query = "SELECT * FROM pin_nos WHERE email = '{$email}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPinNo22($pin)
    {
        $query = "SELECT * FROM pin_nos WHERE pin ='{$pin}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPinNoEMail($email)
    {
        $query = "SELECT * FROM pin_nos WHERE email = '{$email}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectSetSession3($school)
    {
        $query = "SELECT * FROM set_session WHERE school ='{$school}' ORDER BY set_session_id DESC LIMIT 1";
        $result = $this->link->query($query);
        return $result;
    }





    public function selectCutOffMarks($school, $session, $program)
    {
        $query = "SELECT * FROM cut_off_mark WHERE school_id ='{$school}' AND  session_id ='{$session}' and program_id ='{$program}' ORDER BY cut_off_id DESC LIMIT 1";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectSetSession($session, $school)
    {
        $query = "SELECT * FROM set_session WHERE set_session = '{$session}' AND school = '{$school}'";
        $result = $this->link->query($query);
        return $result;
    }




    public function selectSetTime2($set_time)
    {
        $query = "SELECT * FROM set_time WHERE set_time = '{$set_time}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPosition2()
    {
        $query = "SELECT * FROM positions";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectAllUsers($email)
    {
        $query = "SELECT * FROM users LEFT JOIN schools ON schools.schools_id = users.school_id WHERE uemail ='{$email}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectUserPara($email)
    {
        $query = "SELECT * FROM users WHERE email ='{$email}'";
        $result = $this->link->query($query);
        return $result;


        if (!$result) {
            echo '<script type="text/javascript"> alert("This record does not exist") </script>';
        }
    }


    public function selectPassport($id)
    {
        $query = "SELECT * FROM capture WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectCapture($id)
    {

        $query = "SELECT * FROM capture WHERE applicant_id ='{$id}'";
        $result = $this->link->query($query);
        return $result;
    }





    public function selectQuestions2($id)
    {
        $query = "SELECT * FROM questions WHERE id = '{$id}'";
        $result = $this->link->query($query);
        return $result;


        if (!$result) {
            echo '<script type="text/javascript"> alert("This record does not exist") </script>';
        }
    }



    public function selectBioDataMaritalGender($id)
    {
        $query = "SELECT * FROM bio_data INNER JOIN marital_status ON marital_status.marital_status_id = bio_data.bmarital_status INNER  JOIN gender ON gender.gender_id = bio_data.bgender INNER JOIN religion ON religion.religion_id = bio_data.breligion_id WHERE applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectBioData($id)
    {
        $query = "SELECT * FROM bio_data where applicant_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }



    public function selectPinNOs($email)
    {
        $query = "SELECT * FROM bio_data where email = '{$email}'";
        $result = $this->link->query($query);
        return $result;
    }


    public function selectPinNOPosition($email)
    {
        $query = "SELECT * FROM pin_nos  where email = '{$email}'";
        $result = $this->link->query($query);
        return $result;
    }

    public function selectPinNOPosition2($id)
    {
        $query = "SELECT * FROM pin_nos  where pin_no_id = '{$id}'";
        $result = $this->link->query($query);
        return $result;
    }
}
