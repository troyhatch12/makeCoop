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


if (isset($_POST['receipt']) || isset($_GET['memId'])) {
//if we just created a receipt or if we just returned from adding an item
//and now have a memberId in the URL...

  //get the member ID
  if (isset($_POST['memId'])){
      $memId = $_POST['memId'];
  } else if (isset($_GET['memId'])) {
    $memId = $_GET['memId'];
  }

//if we already created a receipt, get the ID, if not create one and get its id
if (isset($_GET['recId'])){
  $recId = $_GET['recId'];
} else {
    $insertQuery = "INSERT INTO receipt (MemberId, Date)
                    VALUES ('$memId', NOW());";
    if ($result = $conn->query($insertQuery)){
      echo "Receipt Created";
      $selectRec = "SELECT ReceiptId from receipt Order BY ReceiptId DESC LIMIT 1;";
      if ($result = $conn->query($selectRec)){
        $resultArr = $result->fetch_assoc();
        $recId = $resultArr['ReceiptId'];
      } else echo "error getting receipt ID";
    } else echo "receipt not created";
}



  echo"
      <table border='1'>
        <tr>
          <th>Name</th>
          <th>Dept</th>
          <th>Price</th>
          <th>Action</th>
        </tr>

  ";

  $selectQry = "SELECT ItemId, Name, Dept, Price FROM item;";
  if ($result = $conn->query($selectQry)){
    while ($row = $result->fetch_assoc()) {
      extract($row);

      echo("
        <form action='' method='post' enctype='multipart/form-data'>
          <tr>
            <input type='text' value='$memId' name='memId' hidden readonly>
            <input type='text' value='$recId' name='recId' hidden readonly>
            <input type='text' value='$ItemId' name='itemId' hidden readonly>
            <td><input type='text' value='$Name' name='name' readonly></td>
            <td><input type='text' value='$Dept' name='dept' readonly></td>
            <td><input type='text' value='$Price' name='price' readonly></td>
            <td><input type='submit' name='addItem' value='Add Item' formaction='pInsert.php'></td>
          </tr>
        </form>
      ");
    }
  } else {
    echo("There was an error retrieving customers: " . mysqli_error($conn));
  }

  echo "
    </table>";
} else {
  echo "No Customer Selected";
}

echo "</div>
    </html>";
?>
