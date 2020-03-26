<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CodePartner</title>
    <link rel="stylesheet" href="style.css">    
  </head>
  <body>
    <div class="loginContainer">
      <div class="formSection">
        <h1 class="logo">Code<span>Partner</span></h1>
        <p>Find a coding partner to study and work on projects.</p>
        <form action="dashboard.php">
          <label for="emailInput">
            EMAIL*
            <input id="emailInput" type="email" placeholder="Type your email" required>
          </label>
          <label for="password">
            PASSWORD*
            <input type="text" placeholder="Type your password" required>
          </label>
          <button type="submit">Login</button>
          
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
    
    <?php
      // the_comments();
      // the_commenters();
     ?>
  </body>
</html>
