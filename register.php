<?php
  session_start();
  require_once 'database/database.php';
  
  $message = "";

  global $pdo;
  $pdo = db_connect();

  handle_register_submission();

  // Import functions
  require_once('validation.php');

  // Validate form submission
  validate_register();
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
      <div class="registerSection">
        <h1 class="logo">Code<span>Partner</span></h1>
        <p>Register to be able to find other developers and also to be found by them.</p>
        
        <form id="register-form" method="POST">
          <?php 
            if(isset($message)){
              echo $message;
            }
          ?>
          <label for="emailInput">
            EMAIL*
            <input id="emailInput" name="emailInput" type="text" data-validation="email" data-validation="required" data-validation-error-msg="Invalid email format." placeholder="Type your email">
            <!-- Display validation message for email input -->
            <?php validation_register_message('email'); ?>
          </label>
          <label for="github">
            GITHUB USERNAME*
            <input id="github" name="github" type="text" data-validation="required" data-validation="length" data-validation-length="1-39" data-validation-error-msg="Invalid github username." placeholder="Enter your gitHub username">
             <!-- Display validation message for email input -->
             <?php validation_register_message('github'); ?>
          </label>
          <label for="password_confirmation">
            PASSWORD*
            <input type="password" id="password_confirmation" name="password_confirmation" data-validation="length" data-validation-length="4-8" placeholder="Enter a password (4 to 8 characters)">
             <!-- Display validation message for email input -->
             <?php validation_register_message('password'); ?>
          </label>
          <label for="password">
            CONFIRM PASSWORD*
            <input type="password" id="password" name="password" data-validation="confirmation" data-validation-error-msg="Passwords do not match." placeholder="Repeat password">
             <!-- Display validation message for email input -->
             <?php validation_register_message('confirmPassword'); ?>
          </label>
          <button type="submit" id="register" name="register">Signup and Login</button>
          
          <a class="returnLink" href="/CodePartner">
            <img src="./assets/arrow-left.svg" alt="Go back icon">
            Return to login page 
          </a>
        </form>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $.validate({
          modules: 'security',
        });
      });
    </script>
  </body>
</html>
