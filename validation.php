<?php
// Global result of form validation
$valid = 0;
// Global array of validation messages. For valid fields, message is ""
$val_messages = Array(
  "email" => "",
  "password" => "",
);

$val_messages_register = Array(
  "email" => "",
  "github" => "",
  "password" => "",
  "confirmPassword" => "",
);

$email ="";
$password ="";

// Check each field to make sure submitted data is valid. If no boxes are checked, isset() will return false
function validate_login()
{
    global $valid;
    global $val_messages;

    global $email;
    global $password;

    // Clear variables before validating
    $valid = 0;

    $val_messages = Array(
      "email" => "",
      "password" => "",
    );

    if($_SERVER['REQUEST_METHOD']== 'POST')
    {     
      $email = $_POST["emailInput"];
      $password = $_POST["password"];
      
      // Validates email field
      if(!preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $email)){
        $val_messages["email"] = "Invalid email format.";
        $valid += 1;
      }

      // Validates password field
      if(strlen($password) < 4 || strlen($password) > 8 ){
        $val_messages["password"] = "Password must have 4 to 8 characters.";
        $valid += 1;
    }
  }
}

// Check each field to make sure submitted data is valid. If no boxes are checked, isset() will return false
function validate_register()
{
  global $valid;
  global $val_messages_register;

  $valid = 0;

  $val_messages_register = Array(
    "email" => "",
    "github" => "",
    "password" => "",
    "confirmPassword" => "",
  );

  if($_SERVER['REQUEST_METHOD']== 'POST'){     
    $email_register = $_POST["emailInput"];
    $github = $_POST["github"];
    $password_register = $_POST["password_confirmation"];
    $password_confirmation = $_POST['password'];
    
    // Validates email field
    if(!preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $email_register)){
      $val_messages_register["email"] = "Invalid email format.";
      $valid += 1;
    }

    // Validates github username field
    if(strlen($github) < 1 || strlen($github) > 39 ){
      $val_messages_register["github"] = "Invalid github username.";
      $valid += 1;
    }

    // Validates password field
    if(strlen($password_register) < 4 || strlen($password_register) > 8 ){
      $val_messages_register["password"] = "Password must have 4 to 8 characters.";
      $valid += 1;
    }

    // Validates password confirmation
    if($password_register != $password_confirmation){
      $val_messages_register["confirmPassword"] = "Passwords do not match.";
      $valid += 1;
    }
  }
}

// Display error message if field not valid. Displays nothing if the field is valid.
function the_validation_message($type) {
  global $valid;
  global $val_messages;

  if($_SERVER['REQUEST_METHOD']== 'POST')
  {
    if($valid > 0){
      echo '<span class="form-error">'.$val_messages[$type].'</span>';
    }
  }
}

function validation_register_message($type){
  global $valid;
  global $val_messages_register;

  if($_SERVER['REQUEST_METHOD']== 'POST')
  {
    if($valid > 0){
      echo '<span class="form-error">'.$val_messages_register[$type].'</span>';
    }
  }
}
