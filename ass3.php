<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
if(!empty($_POST['database']))
{
	$database = $_POST['database'];
	$_SESSION["database"] = $database;
	$sql = "CREATE DATABASE " .$database;
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully";
	    echo '<br>';
	
	}
	else {
	    echo "Error creating database: " . $conn->error;
	    echo '<br>';
	}
}
else
{
	echo "Database is necessary";
}

$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create table
if(!empty($_POST['table']))
{
	$table = $_POST['table'];
	$_SESSION["table"] = $table;
	$create_table = "Create table ".$table. " (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name varchar(30),email varchar(50) NULL,contact int(11) NULL,address varchar(200) NULL)";
	if ($conn->query($create_table) === TRUE) {
	    echo "Table created successfully";
	}
	else {
	    echo "Error creating Table: " . $conn->error;
	}
}

else
{
	echo "Table is necessary";
}



if(!empty($_POST['database']) and !empty($_POST['table']))
{
	header("Location: http://localhost//form2.html");
}
$conn->close();
?>










