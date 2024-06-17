<?php

$Username = filter_input(INPUT_POST, 'Username');
$Password = filter_input(INPUT_POST, 'Password');

if (!empty($Username)) {
	if (!empty($Password )) {
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "practice";

		//create connection
		$conn = new mysqli($host ,$dbusername ,$dbpassword, $dbname);
		if (mysqli_connect_error()) {
			die('Connect Error ('. mysqli_connect_errno().')' .
				mysqli_connect_error());
		}
		else{
			$sql = "INSERT INTO form(Username,Password) values('$Username','$Password')";
			if ($conn->query($sql)) {
	echo "New record is inserted successifully";
	
}
else{
	echo "Error:" . $sql . "<br>".
	$conn->error;
}
$conn->close();
}

}
else{
	echo "Password should not be empty";
	die();
}

}
else{
	echo "Username shoul not be empty";
	die();
}


?>