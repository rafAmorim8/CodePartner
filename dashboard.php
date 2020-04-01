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
    <header class="dashboardHeader">
      <h1 class="logo">Code<span>Partner</span></h1>
      <?php
         if(isset($_SESSION["email"])){
          echo '<h3>Hello: '.$_SESSION["email"].'</h3>';
        }else{
          header("Location: index.php");
        }
      ?>
      <form method="POST">
        <button class="btn-logout" type="submit" name="logout">Logout</button>
      </form>
    </header>  
    <div class="dashboardContainer">
      <h2>List of Developers:</h2>
      <div id="devsContainer" class="devsContainer">
        <?php
          // showDevs();
        ?>
        <!-- HARD CODED HERE -->
        <div class="dev-card">
          <div class="dev-card-header">
            <img src="https://avatars2.githubusercontent.com/u/24491482?s=400&u=2461be2fd9c26de62007092d95c3acf58470e609&v=4" alt="Rafael">
            <h5>Rafael Amorim</h5>
          </div>
          <p><strong>Bio: </strong>Hi, I am a CS student at Langara College that loves developing things and who wants to become a software developer.</p>
          <p><strong>Location: </strong>Vancouver, CA</p>
          <p><strong>Email: </strong>raff.code@gmail.com</p>
          <a href="http://www.github.com">See gitHub</a>
        </div>
        <div class="dev-card">
          <div class="dev-card-header">
            <img src="https://avatars2.githubusercontent.com/u/31913664?s=400&u=bd318fa27c1fe668d5ed99ee3f5e25e1641c2323&v=4" alt="Rafael">
            <h5>Salvatore de Simone</h5>
          </div>
          <p><strong>Bio: </strong>I am a Langara CS student and employee at Powell Ind Canada.</p>
          <p><strong>Location: </strong>North Vancouver, BC, Canad</p>
          <p><strong>Email: </strong>test@gmail.com</p>
          <a href="http://www.github.com">See gitHub</a>
        </div>
        <div class="dev-card">
          <div class="dev-card-header">
            <img src="https://avatars2.githubusercontent.com/u/24491482?s=400&u=2461be2fd9c26de62007092d95c3acf58470e609&v=4" alt="Rafael">
            <h5>Rafael Amorim</h5>
          </div>
          <p><strong>Bio: </strong>Hi, I am a CS student at Langara College that loves developing things and who wants to become a software developer.</p>
          <p><strong>Location: </strong>Vancouver, CA</p>
          <p><strong>Email: </strong>raff.code@gmail.com</p>
          <a href="http://www.github.com">See gitHub</a>
        </div>
        <div class="dev-card">
          <div class="dev-card-header">
            <img src="https://avatars2.githubusercontent.com/u/24491482?s=400&u=2461be2fd9c26de62007092d95c3acf58470e609&v=4" alt="Rafael">
            <h5>Rafael Amorim</h5>
          </div>
          <p><strong>Bio: </strong>Hi, I am a CS student at Langara College that loves developing things and who wants to become a software developer.</p>
          <p><strong>Location: </strong>Vancouver, CA</p>
          <p><strong>Email: </strong>raff.code@gmail.com</p>
          <a href="http://www.github.com">See gitHub</a>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="./index.js"></script> -->
  </body>
</html>