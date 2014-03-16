<?php
  include_once('../data/note.php');
  $notes = getNotes();
  echo json_encode($notes);
?>
