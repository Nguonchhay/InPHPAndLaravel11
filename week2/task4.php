<h1>Task 4</h1>
<form action="" method="GET">
    <p>
        <label>Length: </label>
        <input type="number" name="length" value=""/>
    </p>
    <p>
        <label>Width: </label>
        <input type="number" name="width" value=""/>
    </p>
    <p>
        <button type="submit">Calculate</button>
    </p>
</form>

<?php

if (!empty($_GET['length'] && !empty($_GET['width']))) {
    $length = doubleval($_GET['length']);
    $width = doubleval($_GET['width']);
    $area = $length * $width;
    $perimeter = 2 * ($length + $width);

    echo 'Area = ' . $area . ' , Perimeter = ' . $perimeter;
}

?>
