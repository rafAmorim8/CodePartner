<?php
// function error($msg){
//   $response = array("succes" => false, "message" => $msg);
//   return json_encode($response);
// }

// $github = $_POST["github"];

// if($github = ''){
//   die(error('Error: No Github Account.'));
// }

// $response = array();
// $response["success"] = true;
// $response["message"] = $message;

// echo json_encode($response);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CodePartner</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>GitHub</h1>
    <p id="statusText"></p>
    <input type="text" name="github" id="github" />
    <button id="getUser">Get User</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./index.js"></script>
  </body>
</html>