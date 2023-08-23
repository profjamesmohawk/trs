<html>
 <head>
  <title>TRS</title>
 </head>
 <body>


<?php include 'config.php' ?>


<?php
// start a session, if we don't have one
if ( ! session_id() ) @ session_start();

echo "server=". gethostname();

// check if we are logged on
if ( !isset($_SESSION['user_name']) ){
	echo "Please log in!";
	echo " </body> </html>";
	exit;
}

// connect to the DB
$mycon = new mysqli(
		$trs_db_host,
		$trs_db_uid,
		$trs_db_pw,
		$trs_db_db);
if ($mycon->connect_errno) {
	printf("Connect failed: %s\n", $mycon->connect_error);
    	exit();
}

// Do the delete or the add 
//
if(htmlspecialchars($_GET['action']) == "del" || htmlspecialchars($_GET['action']) == "add"  ){
	$statement = $mycon->prepare("UPDATE reservations set guest_id = ? WHERE id = ?");
	
	// set values for bound params
	$ResID=htmlspecialchars($_GET['res_id']);
	if( htmlspecialchars($_GET['action']) == "del" ){
		$GuestID=NULL;
	}
	else{
		$GuestID=$_SESSION['uid'];
	}
	$statement->bind_param("ii", $GuestID,$ResID);
	$statement->execute();

	if( $statement->affected_rows == 1 ){
		echo "<h2>Reservation updated.</h2>";
	}
	else{
		echo sprintf("<h3>Unexpected error updating reservation id %s.  Contact the developers.</h3>", $foo);
	}

	$statement->close();
	$mycon->close();
}
else{
	echo "unexpect error, bad or missing action";
}

echo '<a href="trs.php">Back to Reservations</a>';
?>
</body>
</html>
