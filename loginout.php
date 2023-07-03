<?php
if ($_GET['action']=="logout"){
    unset($_SESSION['user']);
    header("Location:login.php");
}
?>