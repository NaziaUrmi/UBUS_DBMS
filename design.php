<?php

include 'header.php';



echo '<section class="testimonials4 cid-qRTVIyowc5 mbr-parallax-background" id="testimonials4-18">

	                  <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);">
	                  </div>
	                  <div class="container">
	                    <h2 class="pb-3 mbr-fonts-style mbr-white align-center display-2">All Routes Available</h2>
	                    
	                    ';

//----------------------------------------till path calculation ------------------------------------------------------
	        $loginuser="";
		    $loginpass="";
		    
		    if(isset($_GET['source']) && isset($_GET['destination']))
		    {
		        $loginuser=$_GET['source'];
		        $loginpass=$_GET['destination'];
		    }
		    
	        $username="root";
	        $pass="";
	        $serveraddr="localhost";
	        $dbname="ubus";

		        
		    try
		    {
	            $conn=new PDO("mysql:host=$serveraddr;dbname=$dbname",$username,$pass);
	            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            
	            $stmt="Select * from routes ";
	            $pdostmt=$conn->prepare($stmt);
	            $pdostmt->execute();
	            $res=$pdostmt->fetchAll(PDO::FETCH_NUM);
				
				 

				
				$stmt="select ID from loc where name = '$loginuser'";
	            $pdostmt=$conn->prepare($stmt);
	            $pdostmt->execute();
	            $src = $pdostmt->fetchAll(PDO::FETCH_NUM);
				$src = $src[0][0];
				//echo $src;
				
				$stmt="select ID from loc where name = '$loginpass'";
	            $pdostmt=$conn->prepare($stmt);
	            $pdostmt->execute();
	            $dest =  $pdostmt->fetchAll(PDO::FETCH_NUM);
			    $dest= $dest[0][0];
			   //echo $dest;
	            
	            
	            for($it=0;$it<count($res);$it++)
	            {
	                if($src==$res[$it][1] && $dest==$res[$it][4])
	                {
	                    //echo "<script>window.location.assign('s.php');</script>";
	                }
	            }
		            
		            
	        }
	        catch(PDOException $ex)
	        {
	            echo "<script>window.alert('database not connected');</script>";
		    }
					
					
					
					
					

			// $loginuser="";
			// $loginpass="";
			// if(isset($_GET['source']) && isset($_GET['destination'])){
			// $loginuser=$_GET['source'];
			// $loginpass=$_GET['destination'];
			// }
			//at most there can be 11 location at the moment. If number of location increses, the number of rows and columns will also have to increse in the graph array
			$graph = array(
			    array(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
			    array(0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
			    array(0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
			    array(0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
			    array(0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
			    array(0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
			    array(0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
			    array(0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
			    array(0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
			    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
			    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
			);

			$username = "root";
			$pass = "";
			$serveraddr = "localhost";
			$dbname = "ubus";

			try 
			{
			    $conn = new PDO("mysql:host=$serveraddr;dbname=$dbname", $username, $pass);
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			    $stmt = "Select * from routes ";
			    $pdostmt = $conn->prepare($stmt);
			    $pdostmt->execute();
			    $res = $pdostmt->fetchAll(PDO::FETCH_NUM);


			    for ($it = 0; $it < count($res); $it++) 
			    {

			        for ($j = 0; $j < count($res); $j++) 
			        {

			            $s = $res[$it][1];
			            $d = $res[$it][4];

			            if ($graph[$s][$d] == 0) 
			            {
			                $graph[$s][$d] = 1;
			                $graph[$s][$d] = 1;
			            }
			        }
			    }
			}

			catch (PDOException $ex) 
			{
				    echo "<script>window.alert('database not connected');</script>";
			}


				function breadthFirst($graph, $start, $dest, $count) {
				    ///to count the total no of paths found
					$counter = 0;

				    ///declaring
				    $parents = array();
				    $queue = array();
				    
					///initializing
				    foreach ($graph as $key => $vertex) 
				    {
				        $parents[$key] = -1;  //// -1 means nil
				    }

				    ///starting from the src
				    array_push($queue, $start);
				    $parents[$start] = -2; //// -2 means $start is a root node

				    while (count($queue)) {

				    	$t = array_shift($queue);
				        foreach ($graph[$t] as $key => $vertex) {
							
							if($vertex == 1 && $key==$dest){  ///meaning it is possible to reach from $t to $dest
								////printing the path
								$parents[$key]=$t;
								$path_arr = array();
								array_push($path_arr, $dest);

								$tmp = $dest;
								while ($parents[$tmp] != -2) {
									$tmp = $parents[$tmp];
									array_push($path_arr, $tmp);
								}

								////showing the whole path

								$username="root";
						        $pass="";
						        $serveraddr="localhost";
						        $dbname="ubus";
						        
						        //source calculation
						            
					            $indx = $path_arr[1];
					            //echo $indx . ' ';




//------------------------------------------------------------------------------------------------------------------------


	                echo '<div class="col-md-10 testimonials-container"> 
	                        <div class="testimonials-item">
	                            <div class="user row">
	                              
	                              <div class="testimonials-caption col-lg-9 col-md-8">
	                                <div class="user_name mbr-bold mbr-fonts-style align-left pt-3 display-7"></div>
	                                <div class="user_desk mbr-light mbr-fonts-style align-left pt-2 display-7">';
	                                    
	                                    echo 'Way ' . $counter . '&nbsp;<br><br>';
	                                    

	                                   	for ($i = 0; $i <= count($path_arr) - 2; $i++) {

											$username="root";
									        $pass="";
									        $serveraddr="localhost";
									        $dbname="ubus";
									        
									        try{
									        	//printing name
									        	

									            $conn=new PDO("mysql:host=$serveraddr;dbname=$dbname",$username,$pass);
									            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									            
									            $stmt="select name from loc where ID = '$path_arr[$i]'";
									            $pdostmt=$conn->prepare($stmt);
									            $pdostmt->execute();
									            $name=$pdostmt->fetchAll(PDO::FETCH_NUM);
									            $name = $name[0][0];
									            echo $name;

									            

												
												//priting bus name 
												echo ' ----- ' ;

												$dest = $path_arr[$i];
												$indx = $path_arr[$i + 1];
												//echo $indx . " " . $path_arr[$i];
												$stmt="select bus_name from bus where bus_id in(select bus_id from routes_buses where routes_id in(select r_id from routes where source = '$indx' and destination = '$dest'))";
												//$indx++;

									            $pdostmt=$conn->prepare($stmt);
									            $pdostmt->execute();
									            $bus=$pdostmt->fetchAll(PDO::FETCH_NUM);

									            //echo $bus[0][0];

						//------------------------------- ERROR! Only getting one bus. ----------------------------------
									            $rows = count($bus);
									            //echo $rows . ' ';
												for ($row = 0; $row < $rows; $row++) {
												     echo $bus[$row][0];
												}
						//-----------------------------------------------------------------------------------------------


												echo ' -----> ';


												//if($i == 0) echo $name;

												$indx = $path_arr[$i];

											} catch(PDOException $ex){
									            echo "<script>window.alert('database not connected');</script>";
									        }
										}

										$username="root";
								        $pass="";
								        $serveraddr="localhost";
								        $dbname="ubus";
								        
								        try{
								        	//printing name
								        	

								            $conn=new PDO("mysql:host=$serveraddr;dbname=$dbname",$username,$pass);
								            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								            
								            $index = count($path_arr) - 1;
								            $stmt="select name from loc where ID = '$path_arr[$index]'";
								            $pdostmt=$conn->prepare($stmt);
								            $pdostmt->execute();
								            $name=$pdostmt->fetchAll(PDO::FETCH_NUM);
								            $name = $name[0][0];
								            echo $name;

								            echo '&nbsp;<br><br> </div>
					                              </div>
					                            </div>

					                            <center>
					                            <div class="mbr-section-btn">
					                            	<form action="showMap.php" method = "POST">';
									                    //<input type="hidden" name="j_id" id="hiddenField" value='.$id.'" />
									                    //<input type="hidden" name="p_id" id="hiddenField" value='.$id1.'" />
									                    echo '<button class="btn btn-md btn-secondary display-3" type="submit" name="submit">Show Map</button>
									                </form>
									            </div>
									            </center>';

									            echo '</div>
					                    		</div>';

								        } catch(PDOException $ex){
								            echo "<script>window.alert('database not connected');</script>";
								        }


								        



	                                    

	                        

	                    $counter = $counter + 1;
										if ($counter == $count) {
											break;
										}
									}
									else if ($vertex == 1 && $parents[$t] != $key && $key != $start && $key != $t) {
										$parents[$key] = $t;
										///now inserting into the queue
										array_push($queue, $key);
									}
								}
							}
						}

						breadthFirst($graph, $dest, $src, 5);
	                

	        echo '
	                  </div>
	                </section>';


include 'footer.php';

?>