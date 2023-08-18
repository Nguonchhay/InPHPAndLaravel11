<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: task8.php');
    exit();
}

$isRedirect = false;

$_SESSION['errFullName'] = '';
$_SESSION['fullname'] = '';
if (empty($_POST['fullname'])) {
    $_SESSION['errFullName'] = 'This field is required!';
    $isRedirect = true;
} else {
    $_SESSION['fullname'] = $_POST['fullname'];
}

$_SESSION['errEmail'] = '';
$_SESSION['email'] = '';
if (empty($_POST['email'])) {
    $_SESSION['errEmail'] = 'This field is required!';
    $isRedirect = true;
} else {
    $_SESSION['email'] = $_POST['email'];
}

$_SESSION['errMessage'] = '';
$_SESSION['message'] = '';
if (empty($_POST['message'])) {
    $_SESSION['errMessage'] = 'This field is required!';
    $isRedirect = true;
} else {
    $_SESSION['message'] = $_POST['message'];
}

if ($isRedirect) {
    header('Location: task8.php');
    exit();
}

header('Location: task8_thank_you.php');
exit();

?>