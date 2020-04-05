<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = $_SESSION["database"];
$table = $_SESSION["table"];
// Create connection
$conn = new mysqli($servername, $username, $password,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



if(isset($_POST['insert']))
{
	if(!empty($_POST['name']))
	{

		$sql = "INSERT INTO ".$table." (name, email,contact,address) VALUES (".$_POST['name'].",".$_POST['email'].",".$_POST['contact']. ",".$_POST['address'].")";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} 
		else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}

	else
	{
		echo "Enter name";
	}


	if(!empty($_POST['name']))
	{
		header("Location: http://localhost//form2.html");
	}

}

if(isset($_POST['display']))
{
	$sql = "SELECT * FROM " .$table;
	$result = $conn->query($sql);

	if ($result->num_rows > 4) 
	{
	    echo "<table><tr><th>ID</th><th>Name</th><th>E-mail</th><th>Contact</th><th>Address</th></tr>";	    
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td><td>".$row["address"]."</td></tr>";
	    }
	    echo "</table>";
	} 
	else 
	{
	    echo "Insert more Records";
	}
}

$conn->close();
?>
