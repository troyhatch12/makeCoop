<?php
require_once('printhtml.php');
$config = require_once('config.php');

echo "<html>";
print_nav();

echo"
    <table border='1'>
      <tr>
        <th>Name</th>
        <th>Dept</th>
        <th>Price</th>
      </tr>

";
$selectQry = "SELECT ItemId, Name, Dept, Price FROM item;";
if ($result = $conn->query($selectQry)){
  while ($row = $result->fetch_assoc()) {
    extract($row);

    echo("
      <form action='' method='post' enctype='multipart/form-data'>
        <tr>
          <input type='text' value=$itemId name='memId' hidden readonly>
          <td><input type='text' value='$Name' name='name' readonly></td>
          <td><input type='text' value='$Dept' name='dept' readonly></td>
          <td><input type='text' value='$Price' name='price' readonly></td>
          <td><input type='submit' name='addItem' value='Add Item' formaction='rInsert.php'></td>
		  <td><input type='submit' name='receipt' value='Add Receipt' formaction=''</td>
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
?>
