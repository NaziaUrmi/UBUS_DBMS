<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>



<style type="text/css">
body{ 
  

	background-size:cover;
    background-image: url(bus6.gif);
    background-position: center;
    background-repeat: no-repeat, repeat;
    padding: 55px;
	text-algin:center;


}
   .log {
  padding: 10px;
  float:left;
  font-size: 15px;
  color: white;
  background: red;
  border: none;
  border-radius: 5px;
  font-family:'ALGERIAN';
}
   
   
   .con{
	   
	    padding: 10px;
  float:right;
  font-size: 15px;
  color: white;
  background: red;
  border: none;
  border-radius: 5px;
  font-family:'ALGERIAN';
   }
   
   .rev{
	   
	 padding: 10px;
  float:left;
  font-size: 15px;
  color: white;
  background: red;
  border: none;
  border-radius: 5px;
  font-family:'ALGERIAN';
  position:absolute;
  top:50%;
  left:47%
   }
</style>



<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p><br></br></br></br>
    	<p class="log"> <a href="login.php?LOGOUT='1'" style="color: black;"><b>LOGOUT</b></a> </p>
		<p class="rev"> <a href="cmnt.php?REVIEW='1'" style="color: black;"><b>REVIEW</b></a> </p></br>
		<p class="con"> <a href="search.php?CONTINUE='1'" style="color: black;"><b>SEARCH</b></a> </p></br></br></br></br></br>
    <?php endif ?>
</div>
		
</body>
</html>