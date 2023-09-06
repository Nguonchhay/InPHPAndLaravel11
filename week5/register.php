<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-4 mt-3">
                    <h2>Register to System</h2>
                    <form action="auth.php" method="POST">
                        <input type="hidden" name="from" value="register"/>
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Fullname *</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" required placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" id="email" required placeholder="name@example.com">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" class="form-control" name="password" id="password" required placeholder="">
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>

                        <div class="mb-3">
                            <hr>
                            <a href="login.php">Already has an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>