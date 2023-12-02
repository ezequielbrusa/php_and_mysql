<?php # Script 3.5  calculator.php // Script 3.6   Script 3.8 #3  // 3.9 #4 // 3.10   #5 //

//This function creates a radio buttom. Takes one argument: the value. Makes the buttom "sticky".
function create_radio($value, $name = 'gallon_price') {

    // Start the element:
    echo '<input type="radio" name="' . $name . '" value="' . $value . '"';
 
    // Check for stickiness:
        if (isset($_POST[$name]) && ($_POST[$name] == $value)) {
            echo ' checked="checked"';
        }

        // Complete the element:
        echo "> $value ";
} // End of create_gallon_radio() function.

// THis function calculates the cost of the trip.
// The function takes three arguments: distance, fuel efficiency, price per gallon.
// The function returns the total cost.
function calculate_trip_cost($miles, $mpg, $ppg) {

//Get the number of gallons:
$gallons = $miles/$mpg;

// Get the cost of those gallons:
$dollars = $gallons * $ppg;

// Return the formatted cost:
    return number_format($dollars, 2);

} // ENd of calculate_trip_cost() function.


$page_title = 'Trip Cost Calculator'; 
include('includes/header.php');

//Check for form submission:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Minimal form validation: B
            if (isset($_POST['distance'], $_POST['gallon_price'], $_POST['efficiency']) &&
            is_numeric($_POST['distance']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency']) ) {
            
            // Calculate the results:
                $cost = calculate_trip_cost($_POST['distance'], $_POST['efficiency'], 
                $_POST['gallon_price']);            
                $hours = $_POST['distance']/65;
                
                //Print the results:
                echo '<div class="page-header"><h1>Total estimated Cost</h1></div>
                <p>The total coat of driving ' . $_POST['distance'] . ' miles, averaging ' . 
                $_POST['efficiency'] . ' miles per gallon, and payiing an average of $' . 
                $_POST['gallon_price'] . ' per gallon,  is $' . $cost . '.
                If you drive at an average of 65 miles per hour, the trip will take approcimately ' . 
                number_format($hours, 2) . ' hours.</p>';

            } else { // Invalid submitted values.
echo '<div class="page-header"><h1>Error!</h1></div>
<p class="text-danger">Please enter a valid distance, price per gallon, 
and fuel efficiency.</p>';
            }
    } // ENd of main submission IF.

    // Leave the PHP section and create the HtML form:
        ?>

<div class="page-header"><h1>Trip Cost calculator</h1></div>
<form action="calculator.php" method="post">
    <p>Distance (in miles): <input type="number" name="distance" value="<?php 
    if (isset($_POST['distance'])) echo $_POST['distance']; ?>"></p>
<p>Ave. Price Per Gallon:
<?php
create_radio('3.00');
create_radio('3.50');
create_radio('4.00');
?>
	</p>
    
    <p>Fuel Efficiency: <select name="efficiency">
		<option value="10"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '10')) echo ' selected="selected"'; ?>>Terrible</option>
		<option value="20"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '20')) echo ' selected="selected"'; ?>>Decent</option>
		<option value="30"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '30')) echo ' selected="selected"'; ?>>Very Good</option>
		<option value="50"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '50')) echo ' selected="selected"'; ?>>Outstanding</option>
	</select></p>
	<p><input type="submit" name="submit" value="Calculate!"></p>
</form>

<?php include('includes/footer.php'); ?>


    