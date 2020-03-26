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
        
        <form action="dashboard.php">
          <label for="emailInput">
            EMAIL*
            <input id="emailInput" type="email" placeholder="Type your email" required>
          </label>
          <label for="github">
            GITHUB USERNAME*
            <input id="github" type="text" placeholder="Enter your gitHub username" required>
          </label>
          <label for="favoriteTechs">
            TECHS*
            <input id="favoriteTechs" type="text" placeholder="Favorite languages separed by , (comma)" required>
          </label>
          <label for="password">
            PASSWORD*
            <input id="password" type="password" placeholder="Type a password (max 8 characters)" required>
          </label>
          <button type="submit">Signup and Login</button>
          
          <a class="returnLink" href="/CodePartner">
            <img src="./assets/arrow-left.svg" alt="Go back icon">
            Return to login page 
          </a>
        </form>
      </div>
    </div>
    
    <?php
      // the_comments();
      // the_commenters();
     ?>
  </body>
</html>
