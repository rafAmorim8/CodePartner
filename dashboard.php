<?php
  session_start();

  require_once 'database/database.php';
  require_once 'templates/functions/template_functions.php';

  global $pdo;
  $pdo = db_connect();
  $connectionMessage = "";

  handle_logout();

  get_devs();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CodePartner</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="dashboardContainer">
      <h1>CodePartner Dashboard</h1>
      <?php
         if(isset($_SESSION["email"])){
          echo '<h3>Login Success, email: '.$_SESSION["email"].'</h3>';
        }else{
          header("Location: index.php");
        }
      ?>
      <form method="POST">
        <button type="submit" name="logout">Logout</button>
      </form>
      <div id="devsContainer" class="devsContainer">
        <?php
          showDevs();
        ?>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./index.js"></script>
  </body>
</html>