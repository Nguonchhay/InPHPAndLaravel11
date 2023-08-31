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
            'id' => count($_SESSION['students']) + 1,
            'fullname' => $_POST['fullname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        ];
        break;
    case 'update':
        $studentData = [
            'id' => $_POST['id'],
            'fullname' => $_POST['fullname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        ];
        for ($i = 0; $i < count($_SESSION['students']); $i++) {
            if (intval($_POST['id']) === intval($_SESSION['students'][$i]['id'])) {
                $_SESSION['students'][$i] = $studentData;
                break;
            }
        }
        break;
    case 'delete':
        $newStudents = [];
        for ($i = 0; $i < count($_SESSION['students']); $i++) {
            if (intval($_POST['id']) !== intval($_SESSION['students'][$i]['id'])) {
                $newStudents[] = $_SESSION['students'][$i];
            }
        }
        $_SESSION['students'] = $newStudents;
        break;
}

header('Location: students.php');
exit();

?>