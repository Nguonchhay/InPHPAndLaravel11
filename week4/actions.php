<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: students.php');
    exit();
}

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

$from = $_POST['from'];
switch($from) {
    case 'create':
        $_SESSION['students'][] = [
            'fullname' => $_POST['fullname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        ];
        break;
    case 'update':
        break;
    case 'delete':
        break;
}

header('Location: students.php');
exit();

?>