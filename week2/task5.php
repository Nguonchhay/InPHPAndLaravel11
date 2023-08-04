<h1>Task 5</h1>
<form action="" method="GET">
    <p>
        <label>First Value: </label>
        <input type="number" name="value1" value=""/>
    </p>
    <p>
        <label>Second Value: </label>
        <input type="number" name="value2" value=""/>
    </p>
    <p>
        <button type="submit">Calculate</button>
    </p>
</form>

<?php

if (!empty($_GET['value1'] && !empty($_GET['value2']))) {
    $value1 = intval($_GET['value1']);
    $value2 = intval($_GET['value2']);

    // $result = 'False';
    // if ($value1 === 30 || $value2 === 30 || ($value1 + $value2) === 30) {
    //     $result = 'True';
    // }
    // echo $result;
    echo ($value1 === 30 || $value2 === 30 || ($value1 + $value2) === 30) ? 'True' : 'False';
}

?>
