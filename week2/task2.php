<html>
    <head>
        <link rel="stylesheet" href="task2.css" />
    </head>
    <body>
        <h1>Task 2</h1>
        <h2>
            <?php
                $word = "Laravel";
                $firstChar = substr($word, 0, 1);
                $remainChars = substr($word, 1);

                echo '<span style="color: blue">' . $firstChar . '</span>' . $remainChars;
            ?>
        </h2>
    </body>
</html>