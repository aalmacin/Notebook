<?php
  include_once('../data/note.php');
  session_start();

  $conn = startConn();

  $note = $_REQUEST['note'];
  if(isset($_REQUEST['id'])) $id = $_REQUEST['id'];

  $note = $conn->real_escape_string($note);

  if(empty($note)){
    closeConn($conn);
    return;
  }

  if (!empty($id)) {
    $sql = "UPDATE Notes SET note='$note' WHERE ID=$id";
  } else {
    $userId = $_SESSION['userId'];
    $sql = "INSERT INTO Notes(`note`, `userID`) VALUES ('$note', $userId)";
  }
  if($conn->query($sql) === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
  } else {
    $last_inserted_id = $conn->insert_id;
    $affected_rows = $conn->affected_rows;
  }

  closeConn($conn);
?>
