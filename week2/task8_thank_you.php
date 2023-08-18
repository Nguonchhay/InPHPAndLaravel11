<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<h1>Hello, <?php echo $_SESSION['fullname'] ?? '' ?></h1>
<h3>Thank you !!!</h3>
<p>We will contact to you shortly.</p>