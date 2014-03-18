<?php
  include_once '../data/user.php';
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];
  $matched = checkUserLoginCredentials($username, $password);
  if($matched) {
    echo "Matched";
  } else {
    echo "Not matched";
  }
?>
