<?php
require_once('printhtml.php');
$config = require_once('config.php');

$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
die("connection failed: " . $conn->connect_error);
}

print_head();
print_nav();

echo("<div class='container'>");

if (isset($_POST['memId'])) {
  $memId = $_POST['memId'];

  //check if this is a valid MemberId
  $memberQuery = "SELECT * FROM customer WHERE MemberId=$memId;";
  if ($result = mysqli_query($conn, $memberQuery)){
    if ($result->num_rows == 1) {
      $customer = $result->fetch_assoc();
      $name = $customer['Name'];
      $memberId = $customer['MemberId'];
      $address = $customer['Address'];
      $phone = $customer['Phone'];
      $cc = $customer['CreditNum'];
      echo("
        <h1>Coupons Generated</h1>
        <table>
          <tr>
            <th>Name</th>
            <th>Member ID</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Credit Card</th>
          </tr>
          <tr>
            <td>$name</td>
            <td>$memberId</td>
            <td>$address</td>
            <td>$phone</td>
            <td>$cc</td>
          </tr>
        ");
    } else {
      echo "Invalid Member Id!";
      print_redirect('home.php');
    }

	} else {
		echo("Error checking for customer" . mysqli_error($conn));
	}

} else echo("Error: No Member ID Specified");

echo("</div>");
mysqli_close($conn);
?>
