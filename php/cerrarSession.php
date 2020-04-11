<?php
session_start();
$_SESSION["admin"]="";
unset($_SESSION["admin"]);
session_destroy();
echo "<script>window.location='../index2.html';</script>";

?>