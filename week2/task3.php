<h1>Task 3</h1>
<form action="" method="GET">
    <label>Score: </label>
    <input type="number" name="score" value=""/>
    <p>
        <button type="submit">Calculate</button>
    </p>
</form>

<?php

if (!empty($_GET['score'])) {
    $score = intval($_GET['score']);
    $result = '';

    if ($score >= 95 && $score < 101) {
        $result = 'A';
    } else if ($score >= 90 && $score < 95) {
        $result = 'B';
    }  else if ($score >= 80 && $score < 90) {
        $result = 'C';
    }  else if ($score >= 65 && $score < 80) {
        $result = 'D';
    }  else if ($score >= 50 && $score < 65) {
        $result = 'E';
    } else {
        $result = 'F';
    }

    echo 'Your Grade is: ' . $result;
}

?>
