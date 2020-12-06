<?php
error_reporting(E_ALL);
ini_set("display_error", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "mohammsiddiqui", "paiN7aen", "mohammsiddiqui");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["username"];

    if($user == NULL || $user == "")
    {
        echo "Must have a valid username!\n";
    }

    $query = "INSERT INTO Users (user_id) VALUES ('" . $user .  "')";
    if ($result = $mysqli->query($query)){
        echo "User created successfully";
    }
    else{
        echo "User was not created because " . $user . " is already taken";
    }
    $mysqli->close();
?>
