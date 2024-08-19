<html>
 <head>
  <title>TRS</title>
  <style>
  .inDiv {
  	margin-left: 40px;
  }
  </style>
 </head>
 <body>

<h2>Welcome to the Trivial Reservation System</h2>

<?php include 'config.php' ?>

<?php
// start a session, if we don't have one
if ( ! session_id() ) @ session_start();

echo "server=".gethostname().", ";

// do we have a username and passwd to evaluate
if ( isset($_POST['name'])){

	//check that name and passwd match
	try{
		$mycon = new mysqli(
				$trs_db_host,
				$trs_db_uid,
				$trs_db_pw,
				$trs_db_db);
			
		if ($mycon->connect_errno) {
			printf("Connect failed: %s\n", $mycon->connect_error);
			exit();
		}
		$statement=$mycon->prepare("SELECT id FROM users WHERE name = ? AND passwd = ?");
		$Name=$_POST['name'];
		$Password=$_POST['passwd'];
		$statement->bind_param("ss",$Name,$Password);
		$statement->execute(); // check return code !!!

		$statement->bind_result($UserID);

		// just fetch first row, no loop needed
		if($statement->fetch()){
			// winner, winner - record it in the session
			$_SESSION['uid']= $UserID ;
			$_SESSION['user_name']= $_POST['name'];
		}
		else{
			$LoginMessage = "Bad Username/Passwd Combo";
		}
	$statement->close();
	$mycon->close();
	} catch (Exception $e){
		$LoginMessage = "Uncaught PHP exception logging in. " . $e->getMessage();
	}
}
else{
	$LoginMessage = "";
}


// are we logged in 
if ( !isset($_SESSION['uid']) ){
	// not logged in display login form
	echo "<form action= \"" .  $_SERVER['PHP_SELF'] . "\"" . "method=\"post\">" . "<br>";
	echo "<table>";
	echo "<tr><td>User Name:</td><td> <input type=text name=name></td></tr>\n";
	echo "<tr><td>Passwd:</td><td> <input type=password name=passwd></td></tr>\n";
	echo "<tr><td align=right colspan=2><button type=sumbit name=login>Login</button> </td></tr>";
	echo "</table>";
	echo "</form>";
	if ($LoginMessage != "") printf ("<em>%s</em>\n", $LoginMessage);
}
else{
	echo "<strong>You are logged on as: ". $_SESSION['user_name'] ;
	echo "</strong><em> Not ". $_SESSION['user_name']  ;
	echo '? <a href="logout.php">click here to log out</a>';
	echo "</em>";
	echo "<hr>";

	//
	// print the schedule
	//
	
	try {	
		//connect to the DB
		$mysqli = new mysqli(
				$trs_db_host,
				$trs_db_uid,
				$trs_db_pw,
				$trs_db_db);
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}

		// run the query	
		$QS = 	"SELECT r.id as res_id, r.host_id,a.name as host, r.guest_id as guest_id, b.name as guest, r.start_time ".
				"FROM reservations  r ".
				"LEFT JOIN users a ON r.host_id = a.id ".
				"LEFT JOIN users b ON r.guest_id = b.id ".
				"ORDER BY host, r.start_time;" ;

		if( ! $result = $mysqli->query($QS)){
			echo "DB ERR:" . $QS;
		}
		$LastHost = "";
		$LastStartDay = "";
		while($row = $result->fetch_assoc()){

			if($LastHost != $row['host']){
				if($LastHost != "") {echo sprintf('</div>');}  
				echo sprintf('<br><strong>Meetings Scheduled for %s</strong><br>', $row['host']);
				echo sprintf('<div class=inDiv>');
				$LastHost = $row['host'];
			}

			$StartDay = substr($row['start_time'],0,10);
			if ( $StartDay != $LastStartDay ){
				echo "<br>";
			}
			$LastStartDay = $StartDay;

			echo substr($row['start_time'],0,16)." ";

			if( $row['guest']){
				if($row['guest_id'] == $_SESSION['uid']){
					echo sprintf('<strong>%s</strong>',$row['guest']);
					echo sprintf(' <em><a href="./deladd.php?action=del&res_id=%s">delete reservation</a></em>',
					 $row['res_id']);
				}
				else{
					echo sprintf('%s',$row['guest']);
				}
			}
			else{
				echo sprintf('<a href="./deladd.php?action=add&res_id=%s">book</a>',
					 $row['res_id']);
			}
			echo "<br>";

		}
		$result->close();
		$mysqli->close();
		echo "</div>";
	} catch (Exception $e){
		echo 'Unexpected error fetching sechedule: ' . $e->getMessage(); 

	}

}
?>




</body>
</html>
