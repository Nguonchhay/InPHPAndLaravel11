<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class User {
    public function __construct(
        public int $id = 0,
        public string $email = '',
        public string $password = '',
        public string $fullname = ''
    ) {}

    public static function isAuth()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['user'] = null;
            return false;
        }
        return true;
    }

    public static function save($formData)
    {
        $newId = 0;
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }
        if (count($_SESSION['users'])) {
            $newId = array_key_last($_SESSION['users']) + 1;
        } else {
            $newId = 1;
        }

        $user = new User(0, $formData['email'], $formData['password'], $formData['fullname']);
        $_SESSION['users'][$newId] = $user;
    }

    public static function checkAuth($formData)
    {
        if (!isset($_SESSION['users'])) {
            return null;
        }
        
        $query = null;
        foreach ($_SESSION['users'] as $user) {
            if ($formData['email'] === $user->email && $formData['password'] === $user->password) {
                $query = $user;
            }
        }

        return $query;
    }
}


?>