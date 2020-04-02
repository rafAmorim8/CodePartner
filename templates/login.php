<?php
  handle_login();
 
  // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Import functions
  require_once('validation.php');

  // Validate form submission
  validate_login();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CodePartner</title>
    <link rel="stylesheet" href="./style.css">    
  </head>
  <body>
    <div class="loginContainer">
      <div class="formSection">
        <h1 class="logo">Code<span>Partner</span></h1>
        <p>Find a coding partner to study and work on projects.</p>
        <form id="login-form" method="POST">
        <?php 
          if(isset($message)){
            echo $message;
          }
        ?>
          <label for="emailInput">
            EMAIL*
            <input id="emailInput" name="emailInput" type="text" data-validation="email" data-validation="required" data-validation-error-msg="Invalid email format." placeholder="Type your email" />

            <!-- Display validation message for email input -->
            <?php the_validation_message('email'); ?>
          </label>

          <label for="password">
            PASSWORD*
            <input id="login-password"type="password" name="password" data-validation="length" data-validation-length="4-8" data-validation="required" data-validation-error-msg="Password must have 4 to 8 characters." placeholder="Type your password" />

            <!-- Display validation message for password input -->
            <?php the_validation_message('password'); ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.validate();
      });
    </script>
  </body>
</html>
