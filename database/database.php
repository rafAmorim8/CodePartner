<?php
require 'config.php';

$devs =[];

function db_connect() {
  try {
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

// Handles form submission
function handle_register_submission() {
  global $pdo;
  global $message;

  if(isset($_POST["register"])){
    if(empty($_POST["emailInput"]) || empty($_POST["password"]) || empty($_POST["github"])){
      $message = "<span class='form-error'>All fields are required.</span>";
    }else{
      try{
        $sql='INSERT INTO users(email, github, password) VALUES (:email, :github, :password)';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(':email', $_POST['emailInput']);
        $statement->bindValue(':github', $_POST['github']);
        $statement->bindValue(':password', $_POST['password']);
        $statement->execute();

        $email = $_POST["emailInput"];
        $_SESSION["email"] = $email;
        header("Location: ./dashboard.php");
      }catch(PDOException $e){
        if($e->errorInfo[1] == 1062){
          $message = "<span class='form-error'>User already exists for this email or github username.</span>";
        }
      }
    }
  }
}


// Handles logout
function handle_logout(){
  global $pdo;

  if(isset($_POST["logout"])){
    // Destroys all saved session data and goes back to main page
    session_start();
    session_destroy();
    header("Location: index.php");
  }
}

// Gets all devs from database and store in $devs
function get_devs() {
  global $pdo;
  global $devs;

  $stmt = $pdo->query('SELECT * FROM users ORDER BY ID DESC');
  while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    array_push($devs, $row);
  }
}

// Checks if user exists in the database and logs in
function handle_login(){
  global $message;
  global $pdo;
  global $users;

  if(isset($_POST["login"])){
    $email = $_POST["emailInput"];
    $password = $_POST["password"];

    $stmt= $pdo->prepare("SELECT COUNT('ID') FROM users WHERE email = :email AND password = :password");
    $stmt->bindValue(':email', $_POST['emailInput']);
    $stmt->bindValue(':password', $_POST['password']);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    if($count == "1"){
      $_SESSION["email"] = $email;
      header("Location: ./dashboard.php");
    }else{
      $message = "<span class='form-error'>User not found for this email and password.</span>";
    }
  }
}