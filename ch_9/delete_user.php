<?php # Script 10.2 - delete_user.php 
// This page is for deleting a user record.
// This page is accessed through view_users.php.

$page_title = 'Delete a User';
include('includes/header.php');
echo '<h1>Delete a User</h1>';

// Check for a valid user ID, through GET or POST:
    if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { //From view_users.php 
  $id = $_GET['id'];
    } elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
        $id = $_POST['id'];
    } else { // No valid ID, Kill the script. 
     echo '<p class="error">This page has been accessed in error.</p>';
     include('includes/footer.php');
     exit();
    }

    require('../mysqli_connect.php');

    // Check if the form has been submitted:
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($_POST['sure'] == 'Yes') { // Delete the record.

                // Make the query:
                $q = "Delete FROM users WHERE user_id=$id LIMIT 1";
                $r = @mysqli_query($dbc, $q);
                if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.


                    //Print the message:
                    echo '<p>The user has been deleted.</p>';

                } else { // If the query did not run OK.
                echo '<p class="error">The user could not be deleted due to a system error.</p>';
                // Public message.
                echo'<p>' . mysqli_error($dbc) . '<br>Query: ' . $q . '</p>'; // Debbuging message.
                }
            } else { // No confirmation of delition.
            echo '<p>The user has NOT been deleted.</p>';
            }
        } else { // Show the form. 

            // Retrieve the user's information:
                $q = "SELECT CONCAT(last_name, ', ', first_name) FROM users WHERE user_id=$id";
                $r = @mysqli_query($dbc, $q);

                if (mysqli_num_rows($r) == 1) {

                }

        }  // Hola