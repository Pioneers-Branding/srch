<?php
session_start(); // Start the session (if it hasn't already been started)

if (isset($_POST['logout_btn'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to a login page or any other desired page
    
    exit();
}
?>






