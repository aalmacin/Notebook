<?php
  include_once('../data/note.php');

  $conn = startConn();

  $id = $_REQUEST['id'];

  $sql = "DELETE FROM `Notes` WHERE id=$id";
  if($conn->query($sql) === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  }

  closeConn($conn);
?>
