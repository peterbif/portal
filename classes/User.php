<?php
require_once ('Connect.php');
class User
{


    private $id;
    private $surname;
    private  $firstname;
    private $email;
    private $password;
    private $phone_no;
    private $role;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPhoneNo()
    {
        return $this->phone_no;
    }

    /**
     * @param mixed $phone_no
     */
    public function setPhoneNo($phone_no)
    {
        $this->phone_no = $phone_no;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }



    public static function find_all_users()
    {


        $query = "SELECT * FROM users";

        return self::find_by_sql($query);
    }


    public static function find_user_id($id = 0)
    {

        global $db;
        $query = "SELECT * FROM users WHERE id = '{$id}'";
        $result = self::find_by_sql($query);
        $result =  mysqli_fetch_assoc($result);
        return $result;
    }


    public static function find_by_sql($query = "")
    {

        global $db;
        $result = $db->selectQuery($query);
        return $result;
    }


    public static function redirect_to($direction = " ")
    {
        if($direction != ""){

            header('location: $direction');
        }

        else{

            header('location:index.php');
        }
    }


    private static function instantiate($record){

         $object = new self;
        foreach ($record as $attribute=>$value){

            if($object->has_attribute($attribute)){
                $object->$attribute = $value;
            }

        }
        return $object;
    }



    private function has_attribute($attribute){
        // get_object_vars return associative array with all attributes as the keys and their current values as the value

        $object_vars = get_object_vars($this);

        //check if key exists
        //return true or false
        return array_key_exists($attribute, $object_vars);


    }


}