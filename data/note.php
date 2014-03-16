<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'devchallenge');

  function startConn() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $conn;
  }

  function closeConn($conn) {
    $conn->close();
  }

  function getNotes() {
    $conn = startConn();

    $sql = "SELECT * FROM Notes WHERE userID=1";

    $result = $conn->query($sql);

    if (!$result) {
      error_log("Query failed: %s\n", $conn->error);
      exit;
    }

    $notes = array();
    while($note = $result->fetch_assoc()) {
      $notes[]=$note;
    }

    $result->close();
    closeConn($conn);
    return $notes;
  }
?>
