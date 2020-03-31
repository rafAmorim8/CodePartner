<?php
  session_start();
  require_once 'database/database.php';
  
  $message = "";

  global $pdo;
  $pdo = db_connect();

  handle_register_submission();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CodePartner</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="registerContainer">
    <?php 
      if(isset($message)){
        echo $message;
      }
    ?>
      <div class="registerSection">
        <h1 class="logo">Code<span>Partner</span></h1>
        <p>Register to be able to find other developers and also to be found by them.</p>
        
        <form method="POST">
          <label for="emailInput">
            EMAIL*
            <input id="emailInput" name="emailInput" type="email" placeholder="Type your email">
          </label>
          <label for="github">
            GITHUB USERNAME*
            <input id="github" name="github" type="text" placeholder="Enter your gitHub username">
          </label>
          <!-- <label for="favoriteTechs">
            TECHS*
            <input id="favoriteTechs" type="text" placeholder="Favorite languages separed by , (comma)" required>
          </label> -->
          <label for="password">
            PASSWORD*
            <input id="password" name="password" type="password" placeholder="Type a password (max 8 characters)">
          </label>
          <button type="submit" name="register">Signup and Login</button>
          
          <a class="returnLink" href="/CodePartner">
            <img src="./assets/arrow-left.svg" alt="Go back icon">
            Return to login page 
          </a>
        </form>
      </div>
    </div>
  </body>
</html>
