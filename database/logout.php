<?php
session_start();

// Remove login variables from the session
session_unset();
session_destroy();

// Redirect to login page with a success message
header('Location: /pos/login.php?message=logout_success');
exit; // Ensure no further code is executed
?>