<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once("./models/Student.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: students.php');
    exit();
}

$from = $_POST['from'];
switch($from) {
    case 'create':
        Student::create([
            'fullname' => $_POST['fullname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        ]);
        break;
    case 'update':
        $selectedId = $_POST['id'];
        $student = new Student($selectedId);
        $student->update([
            'id' => $selectedId,
            'fullname' => $_POST['fullname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        ]);
        break;
    case 'delete':
        $student = new Student($_POST['id']);
        $student->remove();
        break;
}

header('Location: index.php');
exit();

?>