<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/**
 * Solution:
 * 1. Get input string: $data
 * 2. Split $data by comma (,)
 * 3. Store name from first piece of split data
 * 4. Store date data from second peice of splid data: $strDate
 * 5. Split $strData by period (.): $arrDate
 * 6. if count $arrDate < 3 then redirect back
 * 7. else check the $arrDate value
 * 8. if first piece of $arrDate < 1 || first piece of $arrDate > 31 then redirect back
 * 9. if second piece of $arrDate < 1 || second piece of $arrDate > 12 then redirect back
 * 10. if third piece of $arrDate >= current year then redirect back
 * 11. Convert $arrDate into Date object : $birthDate
 * 12. Calculate date = current date - $birthDate
 * 13. Take the result and convert to days or years if applicable
 * 14. Output the whole result
 */

 $name = '';
 $age = '';

if (!empty($_GET['input'])) {
    $input = $_GET['input'];
    $arrInput = explode(',', $input);
    $name = $arrInput[0];
    $strDate = $arrInput[1];
    $arrDate = explode('.', $strDate);

    if (count($arrDate) > 2) {
        if (
            ($arrDate[0] > 0 && $arrDate[0] < 32) &&
            ($arrDate[1] > 0 && $arrDate[1] < 13) && 
            $arrDate[2] < date('Y')
        ) {
            $birthDate = date_create($arrDate[2] . '-'. $arrDate[1] . '-' . $arrDate[0]);
            $curDate = date_create(date('Y') . '-' . date('m') . '-' . date('d'));
            $dateDiff = date_diff($birthDate, $curDate);
            $age = $dateDiff->y;
        }
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Week 2 - Task 7</title>
    </head>
    <body>
        <div class="container">
            <h1>Task 6</h1>

            <div class="col-4">
                <form action="" method="GET">
                
                    <div class="mb-3">
                        <label for="input" class="form-label">Text: </label>
                        <input type="text" class="form-control" name="input" id="input" placeholder="Full Name , DD.MM.YYYY">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Calculate</button>
                    </div>
                    
                </form>
                <p>
                    <?php
                        if (!empty($name) && !empty($age)) {
                            echo 'Welcome to ' . $name . '! you are ' . $age . ' years old.';
                        }
                    ?>
                </p>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->
    </body>
</html>