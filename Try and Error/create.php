<?php
//INCLUDE CONFIGURATION FILE
require_once"config.php";
//DEFINE VARIABLES AND INITILIAZE WITH EMPTY VALUES
$firstname= $lastname= $email ="";
$firstname_err = $lastname_err = $email_err= "";

//PROCESSING FORM DATA WHEN FORM IS SUBMITTED
if($_SERVER["REQUEST_METHOD"] == "POST"){

	//VALIDATE FIRST NAME
	$input_firstname = trim($_POST["firstname"]);
if(empty($input_firstname)){
	$firstname_err "Please enter your firstname.";
}
//VALIDATE LAST NAME
$input_lastname = trim($_POST["lastname"]);
if(empty($input_firstname)){
	$lastname_err "Please enter your lastname.";
}
//VALIDATE EMAIL
$input_email = trim($_POST["email"]);
if(empty($input_email)){
	$email_err "Please enter your email.";
}

//CHECK INPUT ERRRORS B4 INSERTING INTO DATABASE
if (empty($firstname_err) && empty($lastname_err) && empty($email_err)) {
	//PREPARE AN INSERT STMT
	$sql = "INSERT INTO members(firstname, lastname, email) VALUES(:firstname, :lastname ,:email)";

	if ($stmt = $pdo->prepare($sql)) {
		//BIND VARIABLES TO THE PREPARED STATEMENT AS PARAMETERS
		$stmt->bindParam(":firstname",$param_firstname);
		$stmt->bindParam(":lastname",$param_lastname);
		$stmt->bindParam(":email",$param_email);

		//SET PARAMETERS
		$param_firstname = $firstname;
		$param_lastname = $lastname;
		$param_email = $email;

		//ATTEMPT TO EXECUTE PREPARED STMT

		if ($stmt->execute()) {

		//Records creaytedsuccessfully direct to landing page
			header("location:First form.<!DOCTYPE html>
<html>
<head>
	<title>Form Design</title>
</head>
<body style="background-color: gold;">
	<p>Please fill the form below</p>
	<div style="background-color: orange;">
		<h3 style="color:red; ">Form Design</h3>
		<form action="config.php"
			method="post">
		<label>First Name</label>
		<input type="text" name="firstname"><br>
		<label>Last Name</label>
		<input type="text" name="lastname+
		"><br>
		<label>Email</label>
		<input type="text" name="email"><br>
		<input type="Submit" name="">
	</form>
	</div>


	
	

</body>
</html>");
			exit();
			# code...
		}else{
			echo "Something went wrong.Kindly try again later";
		}
		# code...
	}
}
//close connection
unset($pdo)}
?>
