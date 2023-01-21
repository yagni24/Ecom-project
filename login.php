<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
if (isset($_POST['username']) || $_POST['number'] || $_POST['password'] || $_POST['email'] ){
    $number = $_POST['number'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$email = $_POST['email'];
}
	$conn = new mysqli('127.0.0.1','root','','happyhubdb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into userdata(username, email, password, number) values(?, ?, ?, ?)");
		$stmt->bind_param("sssi", $username, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registered Successfully";
		$stmt->close();
		$conn->close();
	}
?>
</body>
</html>
