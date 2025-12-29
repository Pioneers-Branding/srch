<?php/*<?php
session_start();
session_destroy();
setcookie('user',0, time() + (86400 * 0), "/");
header('location : login.php');
?>*/?>

<?php
session_start();
include('index.php');
// Remove token and user data from the session
unset($_SESSION['token']);
unset($_SESSION['userData']);

// Reset OAuth access token
// $gClient->revokeToken();

// Destroy entire session data
session_destroy();
setcookie('user',0, time() - (86400 * 0), "/");
header('location : '.base_url.'');
?>