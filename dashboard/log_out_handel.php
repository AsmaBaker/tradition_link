<?php
session_start();
include '../connection_db.php';

if(isset($_GET['action'])){
  session_destroy();
  header("location:sign.php");
}
?>