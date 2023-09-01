<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Student {
    private $id;
    private $fullname;
    private $gedner;
    private $address;


    public function __construct()
    {
        $id = 0;
        if (!isset($_SESSION['students'])) {
            $_SESSION['students'] = [];
        }
    }

    public static function getList()
    {
        return $_SESSION['students'] ?? [];
    }

    public static function create($studentData)
    {
        $id = isset($_SESSION['students']) ? count($_SESSION['students']) + 1 : 1;
        $studentData['id'] = $id;
        $_SESSION['students'][$id] = $studentData;
    }

    public function update($studentData)
    {

    }

    public function remove($id)
    {

    }
}


?>