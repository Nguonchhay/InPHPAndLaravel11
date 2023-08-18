<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$result = '';
if (!empty($_GET['input'])) {
    $input = $_GET['input'];
    $count = strlen($input);
    for ($i = 0; $i < $count; $i++) {
        $countChar = 0;
        for ($k = 0; $k < $count; $k++) {
            if ($input[$i] === $input[$k]) {
                $countChar++;
            }
        }
        if ($countChar === 1) {
            $result .= $input[$i];
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

        <title>Week 2 - Task 10</title>
    </head>
    <body>
        <div class="container">
            <h1>Task 10</h1>

            <div class="col-4">
                <form action="" method="GET">
                
                    <div class="mb-3">
                        <label for="input" class="form-label">Text: </label>
                        <input type="text" class="form-control" name="input" id="input" placeholder="Enter a word">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Calculate</button>
                    </div>
                    
                </form>
                <p>
                    <?php echo $result; ?>
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