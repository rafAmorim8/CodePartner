<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// global array of users, to be fetched from database
$users = [];
$loggedUser = 0;

require_once 'database/database.php';
require_once 'templates/functions/template_functions.php';

//connect to database: PHP Data object representing Database connection
$pdo = db_connect();
// Check if user exists on the database
// handle_login();


// Get comments from database
// get_userID();
// Get commenters from database
// get_commenters();

// include the template to display the page

include 'templates/login.php';
