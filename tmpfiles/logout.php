<?php
session_start();
$_SESSION["logged_in"] = "";
session_destroy();
header("Location: home.php");
?>
