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

echo "
  <html>
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
      <form action='' method='post' enctype'multipart/form-data'>
        <tr>
          <td><input type='text' value=$MemberId name='memId' hidden readonly></td>
          <td>$Name</td>
          <td>$Address</td>
          <td>$Phone</td>
          <td>$CreditNum</td>
          <td><input type='submit' value='Update' formaction='cUpdate.php'></td>
        </tr>

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
