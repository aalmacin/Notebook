<?php
  $note = $_REQUEST['note'];
  $id = $_REQUEST['id'];
  if (!empty($id)) {
    $sql = "UPDATE Note SET note='$note' WHERE ID=$id";
  } else {
    $sql = "INSERT INTO Note(`note`) VALUES ('$note')";
  }
?>
