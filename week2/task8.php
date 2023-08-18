<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
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

        <title>Week 2 - Task 8</title>
    </head>
    <body>
        <div class="container">
            <h1>Task 8 - Contact Form</h1>

            <div class="col-4">
                <form action="task8_submit.php" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Fullname *</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $_SESSION['fullname'] ?? '' ?>" placeholder="Last name First Name">
                        <p  class="form-label text-danger">
                            <?php echo $_SESSION['errFullName'] ?? '' ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="input2" class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email'] ?? '' ?>" placeholder="test@example.com">
                        <p  class="form-label text-danger">
                            <?php echo $_SESSION['errEmail'] ?? '' ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message *</label>
                        <textarea class="form-control" name="message" id="message"><?php echo $_SESSION['message'] ?? '' ?></textarea>
                        <p  class="form-label text-danger">
                            <?php echo $_SESSION['errMessage'] ?? '' ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
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