<?php
include('./Users_DBO.php');

class UserClass
{
    public $obj;
    public $userInstance;
    public $lastInsertId;

    public function __construct()
    {
        $this->userInstance = new UserDBO();
    }

    public function setObj($obj)
    {
        $this->obj = new stdClass();
        $this->obj->name = $obj->name ?? "null";
        $this->obj->age = $obj->age ?? "null";
        $this->obj->password = $obj->password ?? "Password123";
    }

    public function getObj()
    {
        return $this->obj;
    }

    public function validate($obj)
    {
        if (preg_match('/[0-9]/', $obj->name)) {
            $this->userInstance->error = "Name cannot contain numbers";
            return false;
        } elseif (!is_numeric($obj->age) || is_string($obj->age)) {
            $this->userInstance->error = "Age must be a number";
            return false;
        } elseif (!preg_match('/[A-Z]/', $obj->password) || !preg_match('/[a-z]/', $obj->password) || !preg_match('/\d/', $obj->password)) {
            $this->userInstance->error = "Password should contain at least one uppercase letter, one lowercase letter, and a number";
            return false;
        } else {
            foreach ($obj as $key => $value) {
                if (empty($value)) {
                    $this->userInstance->error = "Value $key is empty";
                    return false;
                }
            }
            return true;
        }
    }


    public function create($obj)
    {
        $this->setObj($obj);
        $data = $this->getObj();

        if ($this->validate($data)) {
            if ($this->userInstance->insert($data)) {
                $this->lastInsertId = $this->userInstance->lastInsertId;
            }
        } else {
            echo $this->userInstance->error;
        }
    }
}
$vincent = new UserClass();
$vincent->create((object)['name' => 'Vincent', 'age' => 8]);
