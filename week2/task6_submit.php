<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: task6.php');
    exit();
}

$formData = $_POST;
if (empty($formData['input1']) || empty($formData['input2']) || empty($formData['input3'])) {
    header('Location: task6.php?errMessage=All fields are required');
    exit();
}

$operand = $formData['input3'][0];
$result = '';
switch ($operand) {
    case '+':
        $result = $formData['input1'] + $formData['input2'];
        break;
    case '-':
        $result = $formData['input1'] - $formData['input2'];
        break;
    case '*':
        $result = $formData['input1'] * $formData['input2'];
        break;
    case '/':
        $result = $formData['input1'] / $formData['input2'];
        break;
    case '%':
        $result = $formData['input1'] % $formData['input2'];
        break;
}

?>

<h1>Result: <?=$result?> </h1>
<a href="task6.php">Re-calculate</a>