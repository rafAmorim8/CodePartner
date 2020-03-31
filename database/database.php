<?php
require 'config.php';

$devs =[];

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
  global $message;

  if(isset($_POST["register"])){
    if(empty($_POST["emailInput"]) || empty($_POST["password"]) || empty($_POST["github"])){
      $message = "<label>All fields are required.</label>";
    }else{
    // TODO
    $sql='INSERT INTO users(email, github, password) VALUES (:email, :github, :password)';
    $statement=$pdo->prepare($sql);
    $statement->bindValue(':email', $_POST['emailInput']);
    $statement->bindValue(':github', $_POST['github']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->execute();

    $email = $_POST["emailInput"];
    $_SESSION["email"] = $email;
    header("Location: ./dashboard.php");
    }
  }
}

// Handle logout
function handle_logout(){
  global $pdo;

  if(isset($_POST["logout"])){
    session_start();
    session_destroy();
    header("Location: index.php");
  }
}

// Get all devs from database and store in $devs
function get_devs() {
  global $pdo;
  global $devs;

  //TODO
  $stmt = $pdo->query('SELECT * FROM users ORDER BY ID DESC');
  while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    array_push($devs, $row);
  }
}

// Check if user exists in the database and login
function handle_login(){
  global $message;
  global $pdo;
  global $users;
  global $loggedUser;

  if(isset($_POST["login"])){
    if(empty($_POST["emailInput"]) || empty($_POST["password"])){
      $message = "<label>All fields are required.</label>";
    }else{
      $email = $_POST["emailInput"];
      $password = $_POST["password"];

      // $sql = "query(SELECT COUNT (id) FROM users WHERE email = :email AND password = :password )";
      $stmt= $pdo->prepare("SELECT COUNT('ID') FROM users WHERE email = :email AND password = :password");
      $stmt->bindValue(':email', $_POST['emailInput']);
      $stmt->bindValue(':password', $_POST['password']);
      $stmt->execute();

      $count = $stmt->fetchColumn();

      if($count == "1"){
        $_SESSION["email"] = $email;
        header("Location: ./dashboard.php");
      }else{
        $message = "<label>User not found.</label>";
      }
    }
  }
}