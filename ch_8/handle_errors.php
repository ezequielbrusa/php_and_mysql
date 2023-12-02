<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Handling Errors</title>
    </head>
<body>
    <h2>Testing Error Handling</h2>
<?php #Script 8.2 - report_errors.php  8.3 handle_errors.php 

// Flag variable for site status:
    define('LIVE', TRUE);
    
// Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

    // Build the error message :
    $message = "An error ocurred in script '$e_file' on line $e_line: $e_message\n";

    // Apeend $e_vars to $message:
    $message .= print_r ($e_vars, 1);

    if (!LIVE) { // Development (print error).
echo '<pre>' . $message . "\n";
debug_print_backtrace();
echo '</pre><br>';
} else { // Don't show the error.
echo '<div class="error">A system error ocurred. We appologize for the inconvenience.</div><br>';
 }

}  // End of my_error_handler() definition.

// Use of my error handler:

set_error_handler('my_error_handler');

// Create errors:
foreach ($var as $v) {}
$result = 1/0;

?>

</body>
</html>