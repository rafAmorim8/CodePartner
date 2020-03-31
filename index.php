<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// global variables
$users = [];
$message = "";

require_once 'database/database.php';
require_once 'templates/functions/template_functions.php';

//Connect to database: PHP Data object representing Database connection
$pdo = db_connect();

include 'templates/login.php';

?>
