<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once("./models/User.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$from = $_POST['from'];

if ($from === 'register') {
    $formData = $_POST;
    User::save($formData);
} else if ($from === 'login') {
    $formData = $_POST;
    $queryUser = User::checkAuth($formData);
    if (empty($queryUser)) {
        header('Location: login.php?err="invalid"');
        exit();
    }
    $_SESSION['user'] = $queryUser;
}

header('Location: index.php');
exit();

?>