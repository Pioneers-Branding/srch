<?php 



session_start();

if (!isset($_SESSION['uniqid_user_id'])) {
    $_SESSION['uniqid_user_id'] = uniqid();
}

echo $_SESSION['uniqid_user_id'];







?>