<!DOCTYPE html>
<html>
<head>
<style> 
body {
	background-size:cover;
    background-image: url(bus.gif);
    background-position: center;
    background-repeat: no-repeat, repeat;
    padding: 290px;
	text-algin:center;


}


h1{
	
 font-size:7em;
  color:white;
  margin:0;
  padding:0;
  text-align:center;
  font-family:'ALGERIAN';
  position:absolute;
  top:8%;
  left:35%

}


.button1 {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: black;
  background-color: white;
  border:none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
  font-family:'BROADWAY';
  position:absolute;
  top:18%;
  left:10%
}
.button2 {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: black;
  background-color: white;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
  font-family:'BROADWAY';
  position:absolute;
  top:18%;
  left:80%
}
.button3 {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: black;
  background-color: white;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
  font-family:'BROADWAY';
  position:absolute;
  top:60%;
  left:40%
}

.button1:hover {background-color: #3e8e41}

.button1:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button2:hover {background-color: #3e8e41}

.button2:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.button3:hover {background-color: #3e8e41}

.button3:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);



</style>
</head>
<body>


<div>
<h1><b>U_BUS</b></h1> 
</div>

 <a href="register.php">
<button class="button1">SIGN UP</button>
<a href="login.php">
<button class="button2">LOG IN</button>
<a href="admin_login.php">
<button class="button3">ADMIN</button>
</a>
</a>
</body>
</html>
