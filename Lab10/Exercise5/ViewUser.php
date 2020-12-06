<?php
  error_reporting(E_ALL);
  ini_set("display_error", 1);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "mohammsiddiqui", "paiN7aen", "mohammsiddiqui");

  /* checking for connection */
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
      }


    $query = "SELECT * from Users";
    $result = $mysqli->query($query);

    echo "<table style='border-style: groove'> <tr style='border-style: groove'> <th style='border-style: groove'> Users </th> </tr> <br>";

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
          echo "<tr style='border-style: groove'> <td style='border-style: groove'>$row[user_id] </td></tr>";
        }
        $result -> free();
    }
    echo "</table>";

    $mysqli->close();
?>
