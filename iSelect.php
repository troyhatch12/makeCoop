<?php
require_once('printhtml.php');
$config = require_once('config.php');
//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

print_head();
print_nav();
echo"
	<div class='container'>
		<h1>Items</h1>
	    <table>
	      <tr>
					<th>Item ID</th>
	        <th>Name</th>
	        <th>Department</th>
	        <th>Price</th>
					<th>Action</th>
	      </tr>
";
$selectQry = "SELECT * FROM item;";
if ($result = $conn->query($selectQry)){
  while ($row = $result->fetch_assoc()) {
    extract($row);

    echo("
      <form action='' method='post' enctype='multipart/form-data'>
        <tr>
					<td><input type='text' value='$ItemId' name='itemId' readonly></td>
          <td><input type='text' value='$Name' name='name' readonly></td>
          <td><input type='text' value='$Dept' name='dept' readonly></td>
          <td><input type='text' value='$Price' name='price' readonly></td>
        	<td><input type='submit' name='delete' value='Delete' formaction='iDelete.php'>
					<input type='submit' name='update' value='Update' formaction='iUpdate.php'>
					</td>
        </tr>
      </form>
    ");
  }
} else {
  echo("There was an error retrieving customers: " . mysqli_error($conn));
}

echo ("
    	</table>
			<a href='iInsert.php'>
        <button class='button-big'>Add Item</button>
      </a>
		</div>");


echo "</html>";
mysqli_close($conn);
?>
