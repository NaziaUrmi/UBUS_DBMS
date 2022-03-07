<!DOCTYPE html>
<html>
<head>
  <title>ADMIN LOGIN PAGE</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>

<style type="text/css">

body{ 
  

	background-size:cover;
    background-image: url(Bus2.gif);
    background-position: center;
    background-repeat: no-repeat, repeat;
    padding: 50px;
	text-algin:center;


}


</style>






<body>
  <div class="header">
  	<h2>ADMIN LOGIN</h2>
  </div>
	 
  <form method="get" action="admin_login.php">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" id="a_name" name="a_name">
  	</div>
	<div class="input-group">
  		<label>Password</label>
  		<input type="password" id="a_pass" name="a_pass"> 
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
		</div>
  	<p>
  		back home? <a href="map.php">back</a>
  	</p>
  </form>

	
	

	

        
        <?php
        $loginuser="";
        $loginpass="";
        
        if(isset($_GET['a_name']) && isset($_GET['a_pass'])){
            $loginuser=$_GET['a_name'];
            $loginpass=$_GET['a_pass'];
        }
        
            $username="root";
            $pass="";
            $serveraddr="localhost";
            $dbname="ubus";
            
            try{
                $conn=new PDO("mysql:host=$serveraddr;dbname=$dbname",$username,$pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt="Select * from admin ";
                $pdostmt=$conn->prepare($stmt);
                $pdostmt->execute();
                $res=$pdostmt->fetchAll(PDO::FETCH_NUM);
				
				
                
                
                for($it=0;$it<count($res);$it++){
                    if($loginuser==$res[$it][1] && $loginpass==$res[$it][2]){
                        echo "<script>window.location.assign('admin_panel.php');</script>";
                    }
                }
                
                
            }catch(PDOException $ex){
                echo "<script>window.alert('database not connected');</script>";
            }
            
        ?>
        
	

	</body>

</html>