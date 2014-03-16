<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'devchallenge');

  $note = $_REQUEST['note'];
  $id = $_REQUEST['id'];
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $note = $conn->real_escape_string($note);
  if (!empty($id)) {
    $sql = "UPDATE Notes SET note='$note' WHERE ID=$id";
  } else {
    $sql = "INSERT INTO Notes(`note`, `userID`) VALUES ('$note', 1)";
  }
  if($conn->query($sql) === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  } else {
    $last_inserted_id = $conn->insert_id;
    $affected_rows = $conn->affected_rows;
  }
  $conn->close();
?>
