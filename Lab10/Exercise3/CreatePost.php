<?php
  error_reporting(E_ALL);
  ini_set("display_error", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "mohammsiddiqui", "paiN7aen", "mohammsiddiqui");

    /* checking connection */
    if ($mysqli->connect_errno) {
     printf("Connect failed: %s\n", $mysqli->connect_error);
     exit();
    }


    $post = $_POST["post"];
    $user = $_POST["username"];


    if ($post == ""){
        echo "Post field empty";
        exit();
    }

 /* checking if the user exists*/
    $query = "SELECT * FROM Users";
    $result = $mysqli->query($query);

    $userFound = FALSE;
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            if ($row["user_id"] == $user){
                $userFound = TRUE;
            }
        }
        $result -> free();
    }
    if (!$userFound){
        echo "Post was not created, incorrect UserID.";
        exit();
    }

    /* Inserting post*/

    $query = "INSERT INTO Posts (author_id, content) VALUES ('". $user ."', '". $post ."')";
    if ($result = $mysqli->query($query)){
        echo "Content Added";
        $result -> free();
    }
    else{
        echo "ERROR, User not created.";
    }

    $mysqli->close();
?>
