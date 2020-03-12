<?php
$servername="localhost";
$username="dev";
$password="develop";
$dbname="makeCoop";

//Create Connection and check
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$selectQry = 	"SELECT * FROM customer WHERE
	Name = '$name'";
	if ($result = $conn->query($selectQry)){
	  while ($row = $result->fetch_assoc()) {
	    extract($row);

	    echo("
	      <form action='' method='post' enctype='multipart/form-data'>
	        <tr>
	          <input type='text' value=$MemberId name='memId' hidden readonly>
	          <td><input type='text' value='$Name' name='name' readonly></td>
	          <td><input type='text' value='$Address' name='address' readonly></td>
	          <td><input type='text' value='$Phone' name='phone' readonly></td>
	          <td><input type='text' value='$CreditNum' name='cc' readonly></td>
	        </tr>
	      </form>
	    ");
	  }
		echo "<button><a href=cQuery.php>Go Back</a></button>";
	} else {
	  echo("There was an error retrieving customers: " . mysqli_error($conn));
	}

} else {
	echo( "
		<html>
			<h1> Search</h1>
			<form method='post' action='cQuery.php'>
				<h3>Name</h3>
				<input type='text' name='name'>
				<input type='submit' value='Submit Query' name='submit'>
			</form>
		</html>
			");
}

//Query person form
//not sure what a form would look like

//select info from customer
//need to come up with some query, this should return the
//name and credit cards of people living in the same house with
//the same last name

mysqli_close($conn);
?>
