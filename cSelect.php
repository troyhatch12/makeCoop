<?php
require_once('printhtml.php');
$config = require_once('config.php');
//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

echo "
  <html>
  ";
print_nav();
echo"
    <table border='1'>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Credit Card</th>
      </tr>

";
$selectQry = "SELECT MemberId, Name, Address, Phone, CreditNum FROM customer;";
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
          <td><input type='submit' name='update' value='Update' formaction='cUpdate.php'></td>
          <td><input type='submit' name='delete' value='Delete' formaction='cDelete.php'></td>
		  <td><input type='submit' name='receipt' value='Add Receipt' formaction='shop.php'</td>
        </tr>
      </form>
    ");
  }
} else {
  echo("There was an error retrieving customers: " . mysqli_error($conn));
}

echo "
    </table>";


echo "</html>";
mysqli_close($conn);
?>
