<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<title>Constants</title>
    </head>
<body>
    <?php  # Script 1.9 - Constants.php

// Set today's date as constant:
define('TODAY', 'October 5, 2023');

// Print a message, using predefined constants and the TODAY constant:
echo '<p>Today is ' . TODAY . '.<br>This server is running version <strong>' . 
PHP_VERSION . '</strong> of PHP on the <strong>' . PHP_OS . '</strong> operationg system.</p>';


?>
</body>
</html>