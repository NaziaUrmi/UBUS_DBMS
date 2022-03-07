<?php

session_start();
$nam="";

$name = $_REQUEST['name'];
$comments = $_REQUEST['comments'];


require("db/db.php");

$nam=$_SESSION['username'];
$query="select * from users where username='$nam'";
mysqli_query($conn,$query);
$row=mysqli_fetch_array(mysqli_query($conn,$query));
//print_r($row);
$uname=$row["username"];

mysqli_query($conn, "INSERT INTO comments(name, comments) VALUES('$uname','$comments')");

$result = mysqli_query($conn, "SELECT * FROM comments ORDER BY id ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
//echo "<h4><a href='delete.php?id=" . $row['id'] . "'> x</a></h4>";
echo "<h1>" . $row['name'] . "</h1>";
echo "<h2>" . $row['date_publish'] . "</h2></br></br>";
echo "<h3>" . $row['comments'] . "</h3>";
echo "</div>";
}
mysqli_close($conn);
?>