<!DOCTYPE html>
 <html>
  <style>
.emptable {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

 td, th {
    border: 1px solid #ddd;
    padding: 8px;
}

 tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

 th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>


   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
   
   <form method="post" action="cmnt.php">
     	<div class="input-group">
  		<button type="submit" class="btn" name="approve">APPROVE</button>
  	</div>
	</form>
     


     <div class="maincontent">
 			<br><br/>
 			<table class = "emptable">
 				<br><br><br>
 				<caption><strong><h2>Inbox</h2></strong></caption>
        
 				<th>Name</th>
 				<th>Date</th>
 				
 				<th>Comment</th>
				<th>delete</th>

 				<?php
					session_start();
					$id="";
					$db="ubus";
                    $conn=mysqli_connect("localhost", "root","",$db);
					
					

 					$sql = "SELECT * FROM comments";
 					$result = $conn->query($sql);
 				 

 					if ($result==true) {
 						// output data of each row
 						while($row = $result->fetch_assoc()) {

 							echo "<tr>";

                                echo "<td>".$row['name']."</td>";

 								echo "<td>".$row['date_publish']."</td>";

 								

 								echo "<td>".$row['comments']."</td>";
								
								echo "<td><a href='delete.php?id=" . $row['id'] . "'> DELETE</a></td>";
								//echo "<td><a href="#" onClick="commentSubmit()" class="button">APPROVE</a></td>";
							//echo "<td><a href='delete.php?id=" . $row['id'] . "'> DELETE</a></td>";
								
							
			
 							echo "</tr>";
							
							

 							}
 					} else {
 						echo ("<h1>List empty!</h1>");
 					}
 					$conn->close();
 				?>

 			</table>
 			<br />
 			<br />
 			<br />
 			<br />
 		</div>


   </body>
 </html>