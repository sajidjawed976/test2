<?php

session_start();

// Unset all of the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login.php with a parameter indicating successful logout
header("Location: login.php?logout=true");
exit;
?>
