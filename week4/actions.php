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
        $newId = count($_SESSION['students']) + 1;
        $_SESSION['students'][$newId] = [
            'id' => $newId,
            'fullname' => $_POST['fullname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        ];
        break;
    case 'update':
        $selectedId = $_POST['id'];
        $_SESSION['students'][$selectedId] = [
            'id' => $selectedId,
            'fullname' => $_POST['fullname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        ];
        break;
    case 'delete':
        unset($_SESSION['students'][$_POST['id']]);
        break;
}

header('Location: students.php');
exit();

?>