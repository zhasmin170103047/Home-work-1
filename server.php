<?php 
	session_start();
	$conn=mysqli_connect('localhost:8889', 'root', 'root') or die("No conn");
	$db =mysqli_select_db($conn,'my_db') or die("Not open");

	// initialize variables
	$firstname = "";
	$lastname = "";
	$email = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];

		mysqli_query($db, "INSERT INTO persons (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')"); 
		$_SESSION['message'] = "Person saved"; 
		header('location: index.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];

		mysqli_query($db, "UPDATE persons (firstname, lastname, email) VALUES ( $firstname', '$lastname', '$email')"); 
		$_SESSION['message'] = "Person updated"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM persons ( firstname, lastname, email) VALUES ( $firstname', '$lastname', '$email')"); 
		$_SESSION['message'] = "Person deleted"; 
		header('location: index.php');
}


	$results = mysqli_query($db, "SELECT * FROM persons");


?>