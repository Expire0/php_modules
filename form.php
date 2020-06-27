<?php

// Server Settings
$servername = "127.0.0.1";
$username = "";
$password = "";
$dbname = "";

// Input Vars
$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$services = $_POST["services"];
$securitycode = $_POST["securitycode"];
$message = $_POST["message"];
$status = "pending";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql = "INSERT INTO users (name, email, number, services, securitycode, message, status)
VALUES ('$name', '$email', '$number', '$services', '$securitycode', '$message', '$status')";

if ($conn->query($sql) === TRUE) {
//	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo 'We received your information and will contact you soon, ';

//Send Email

$to = 'change@yo.com';
$subject = ' USER FORM';
$message = 'Name: ' . $name . ' -*-*- Email: ' . $email . ' -*-*- Phone Number: ' . $number .
	' -*-*- Security Code: ' . $securitycode .' -*-*- Service: ' . $services . ' -*-*- Message: ' . $message . ' -*-*- Status: ' . $status;
$headers = 'From: change@yo.com' . "\r\n" .
	'Reply-To: change@yo.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

echo $name;
//echo $email;
//echo $number;
//echo $securitycode;
//echo $message;
