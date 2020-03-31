<?php
  handle_login();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CodePartner</title>
    <link rel="stylesheet" href="style.css">    
  </head>
  <body>
    <div class="loginContainer">
      <?php 
        if(isset($message)){
          echo $message;
        }
      ?>
      <div class="formSection">
        <h1 class="logo">Code<span>Partner</span></h1>
        <p>Find a coding partner to study and work on projects.</p>
        <form method="POST">
          <label for="emailInput">
            EMAIL*
            <input id="emailInput" name="emailInput" type="email" placeholder="Type your email" />
          </label>
          <label for="password">
            PASSWORD*
            <input type="password" name="password" placeholder="Type your password" />
          </label>
          <button type="submit" name="login">Login</button>
          
          <a class="registerLink" href="register.php">
            <img src="./assets/log-in.svg" alt="Log in icon">
            Register a new account 
          </a>
        </form>
      </div>
      <div class="imageSection">
        <img src="./assets/peerCoding.png" alt="Peer coding">
      </div>
    </div>
  </body>
</html>
