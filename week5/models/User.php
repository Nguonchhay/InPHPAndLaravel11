<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class User {
    public function __construct(
        public int $id = 0,
        public string $email = '',
        public string $password = '',
        public string $name = ''
    ) {}

    public static function isAuth()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['user'] = null;
            return false;
        }
        return true;
    }
}


?>