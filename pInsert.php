<?php
require_once('printhtml.php');
$config = require_once('config.php');

//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

if (isset($_POST['addItem'])) {
	$itemId = $_POST['itemId'];
	$receiptId = $_POST['recId'];
	$memId = $_POST['memId'];
	//make sure that nothing is blank before creating the query
	if ($itemId && $receiptId){
		echo($receiptId);
		//first check the quantity of this purchase already in the table
		$selectQry = "SELECT * FROM purchase WHERE ReceiptId=$receiptId AND ItemId=$itemId";
		if ($result = mysqli_query($conn, $selectQry)) {
			if ($result->num_rows > 0) {
				$values = $result->fetch_assoc();
				$quantity = $values['Quantity'] + 1;
				$updateQry = "UPDATE purchase SET Quantity=$quantity WHERE ReceiptId=$receiptId AND ItemId=$itemId;";
				if (mysqli_query($conn, $updateQry)) {
					echo("<h2>Item Added To Purchase");
					print_redirect('shop.php?memId='.$memId .'&recId='.$receiptId);
				}
			} else {
				$quantity = 1;
				$addQry = "INSERT INTO purchase (ReceiptId, ItemId, Quantity)
							VALUES ($receiptId , $itemId, $quantity);";

				if (mysqli_query($conn, $addQry)){
					echo("
						<p>New Purchase created!<p>
					");
					print_redirect('shop.php?memId='.$memId .'&recId='.$receiptId);
					$_POST['submit'] = '';
				} else {
					echo("There was an error adding purchase: " . mysqli_error($conn));
				}
			}

		}else echo("Problem with select query: " . mysqli_error($conn));
		//insert data into purchase

	} else {
		echo "Error: Values cannot be blank";
	}
};

mysqli_close($conn);
?>
