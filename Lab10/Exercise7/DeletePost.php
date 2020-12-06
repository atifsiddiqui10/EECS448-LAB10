
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "mohammsiddiqui", "paiN7aen", "mohammsiddiqui");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $post_id = $POST["delete"];
    $user = $_POST["username"];

    $query = "SELECT * from Posts";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $delete = $_POST[$row["post_id"]];
            if ($delete == "on"){
                $query = "DELETE FROM Posts WHERE post_id='" .$row["post_id"]. "'";
                $deleted = $mysqli->query($query);
                echo "Post " . $row["post_id"] . " has been deleted.<br>";
            }
        }
    }
    $mysqli->close();
?>
