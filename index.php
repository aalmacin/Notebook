<?php
  include_once('data/user.php');
  session_start();
  if(isset($_SESSION['userId'])) {
    header('Location: notebook.php');
  }
  if(isset($_REQUEST['type']) && $type = $_REQUEST['type']) {
    if($type == "login") {
      if(isset($_REQUEST['loginUsername']) && isset($_REQUEST['loginPassword'])) {
        $username = $_REQUEST['loginUsername'];
        $password = $_REQUEST['loginPassword'];
        if(!empty($username) && !empty($password)) {
          loginUser($username, $password);
        }
      }
    } elseif($type == "register") {
      if(isset($_REQUEST['registerUsername']) && isset($_REQUEST['registerPassword']) && isset($_REQUEST['registerConfPassword'])) {
        $username = $_REQUEST['registerUsername'];
        $password = $_REQUEST['registerPassword'];
        $confPassword = $_REQUEST['registerConfPassword'];
        if(!empty($username) && !empty($password) && !empty($confPassword) && $password == $confPassword) {
          register($username, $password);
        }
      }
    } else {
      throw new Exception('Invalid type');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BR Notebook</title>
    <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="//code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div id="main">
      <div id="loginForm">
        <h3 class="ui-bar ui-bar-a ui-corner-all">Login</h3>
        <div class="ui-body">
          <form name="login" method="post">
            <label for="username">Username</label>
            <input id="loginUsername" type="text" name="loginUsername" />
            <label for="password">Password</label>
            <input id="loginPassword" type="password" name="loginPassword" />
            <input type="hidden" name="type" value="login" />
            <input type="submit" value="Login" />
          </form>
        </div>
      </div>
      <div id="registrationForm">
        <h3 class="ui-bar ui-bar-a ui-corner-all">Register</h3>
        <div class="ui-body">
          <form name="registration" method="post">
            <label for="username">Username</label>
            <input id="registerUsername" type="text" name="registerUsername" />
            <label for="password">Password</label>
            <input id="registerPassword" type="password" name="registerPassword" />
            <label for="password">Confirm Password</label>
            <input id="registerConfPassword" type="password" name="registerConfPassword" />
            <input type="hidden" name="type" value="register" />
            <input id="signUpBtn" type="submit" value="Sign up" />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
