<?php
error_reporting(E_ALL);
ini_set("display_error", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "mohammsiddiqui", "paiN7aen", "mohammsiddiqui");

/* checking connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

$user = $_POST['user'];
$query = "Select * from Posts where author_id = '" . $user ."'";



if ($result = $mysqli->query($query)) {
   /* fetch associative array */
   print("<h1> Posts from ". $user. ": </h1>");

   print("<table>");

   print( "<tr>" );
   print("<th> Post ID </th>");
   print("<th> Content </th>");
   print("</tr>");

   while ($row = $result->fetch_assoc()) {
      print(" <tr>");
      print(" <td> ".$row['post_id']."</td>");
      print(" <td> ".$row['content']."</td>");
      print("</tr>");
   }
   /* free result set */
   $result->free();


}
 $mysqli->close();

?>
