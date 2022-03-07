<?php

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

try {
    $conn = new PDO("mysql:host=$serveraddr;dbname=$dbname", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = "Select * from routes ";
    $pdostmt = $conn->prepare($stmt);
    $pdostmt->execute();
    $res = $pdostmt->fetchAll(PDO::FETCH_NUM);


    for ($it = 0; $it < count($res); $it++) {

        for ($j = 0; $j < count($res); $j++) {

            $s = $res[$it][1];
            $d = $res[$it][4];

            if ($graph[$s][$d] == 0) {
                $graph[$s][$d] = 1;
                $graph[$s][$d] = 1;
            }
        }
    }
} catch (PDOException $ex) {
    echo "<script>window.alert('database not connected');</script>";
}


function breadthFirst($graph, $start, $dest, $count) {
    ///to count the total no of paths found
	$counter = 0;

    ///declaring
    $parents = array();
    $queue = array();
    
	///initializing
    foreach ($graph as $key => $vertex) {
        $parents[$key] = -1;  //// -1 means nil
    }

    ///starting from the src
    array_push($queue, $start);
    $parents[$start] = -2; //// -2 means $start is a root node

    while (count($queue)) {
        var_dump($queue); echo "<br/>";
       
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
				echo "path no: " . $counter . "<br/>";
				for ($i = count($path_arr) - 1; $i >= 0; $i--) {
					echo $path_arr[$i] . " --> ";
				}
				echo "<br/>----------------------------<br/>";

				///increasing the counts
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

breadthFirst($graph, 4, 1, 5);

?>