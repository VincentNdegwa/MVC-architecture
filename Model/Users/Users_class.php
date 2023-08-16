<?php
include('Users_DBO.php');

class UserClass
{
    public $obj;
    public $userInstance;
    public $lastInsertId;
    public $error;
    public $message;

    public function __construct()
    {

        $this->userInstance = new UserDBO();
        $this->error = $this->userInstance->error;
    }

    public function setObj($obj)
    {
        $this->obj = new stdClass();
        $this->obj->name = $obj->name ?? "New Member";
        $this->obj->age = $obj->age ?? 0;
        $this->obj->password = $obj->password ?? "Password123";
    }

    public function getObj()
    {
        return $this->obj;
    }

    public function validate($obj)
    {

        foreach ($obj as $key => $value) {
            if (empty($value)) {
                $this->error = "Value $key is empty";
                break;
                return false;
            } else {
                if (preg_match('/[0-9]/', $obj->name)) {
                    $this->error = "Name cannot contain numbers";
                    return false;
                } elseif (!preg_match('/[0-9]/', $obj->age)) {
                    $this->error = "Age must be a number";
                    return false;
                } elseif ($obj->password == $obj->confpassword) {
                    $this->error = "Password did not match";
                    return false;
                } elseif (!preg_match("/[A-Z]/", $obj->password) || !preg_match("/[a-z]/", $obj->password) || !preg_match("/[0-9]/", $obj->password)) {
                    $this->error = "Password must have lovercase,uppercase and a number";
                    return false;
                } else {
                    $this->error = "";
                    return true;
                }
            }
        }
    }


    public function create($obj)
    {
        $this->setObj($obj);
        $data = $this->getObj();

        if ($this->validate($data)) {
            if ($this->userInstance->insert($data)) {
                $this->lastInsertId = $this->userInstance->lastInsertId;
                $this->error = "";
                $this->message = $this->userInstance->message;
                unset($_SESSION['error']);
                $_SESSION['message'] = $this->message;
                return true;
            }
        } else {
            $this->message = "";
            unset($_SESSION['message']);
            $_SESSION['error'] = $this->error;
            return false;
        }
    }
}
