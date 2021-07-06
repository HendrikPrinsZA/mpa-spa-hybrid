<?php 

// Initialize the session
session_start();

// Logic to drive the webpack devServer
if (!empty($_GET['SPA_HOST']))  {
  $_SESSION['SPA_HOST'] = $_GET['SPA_HOST']; 
}

// If SPA_HOST hasn't been defined, fall back to the standard host
define('SPA_HOST', $_SESSION['SPA_HOST'] ?? '..');
 
// Check if the user is logged in, if no then redirect him to the login page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  // logged in, all good
} else {
  header("location: ../mpa/login.php");
  exit;
}