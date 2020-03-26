<?php
require 'config.php';

// Should return a PDO
function db_connect() {

  try {
    // TODO
    // try to open database connection using constants set in config.php
    // return $pdo;
    $host = DBHOST;
    $dbname = DBNAME;
    $user = DBUSER;
    $pass = DBPASS;
    $connString = 'mysql:host='.$host.';dbname='.$dbname;
    $pdo = new PDO($connString, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }

  return $pdo;
}

// Handle form submission
function handle_register_submission() {
  global $pdo;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // TODO
    $sql='INSERT INTO users(email, github, password) VALUES (:email, :github, :password)';
    $statement=$pdo->prepare($sql);
    $statement->bindValue(':email', $_POST['emailInput']);
    $statement->bindValue(':github', $_POST['github']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->execute();
  }
}

// Get all comments from database and store in $comments
function get_users() {
  global $pdo;
  global $users;

  //TODO
  $stmt = $pdo->query('SELECT * FROM comments ORDER BY ID DESC');
  while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    array_push($comments, $row);
  }
}

// // Get unique email addresses and store in $commenters
// function get_commenters() {
//   global $pdo;
//   global $commenters;

//   //TODO
//   $stmt = $pdo->query('SELECT DISTINCT email FROM comments');
//   while($row = $stmt->fetch(PDO::FETCH_OBJ)){
//     array_push($commenters, $row);
//   }
// }

// Check if user exists in the database and login
function handle_login(){
  
}
