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
		//insert data into customer
		$addQry = "INSERT INTO purchase (ReceiptId, ItemId)
					VALUES ('$receiptId' , '$itemId');";

		if (mysqli_query($conn, $addQry)){
			echo("
				<p>New Purchase created!<p>
				<button onclick='redirect()'>Go Back</button>
				<script>
					const redirect = () => {
						window.location = 'shop.php?memId=$memId&recId=$receiptId';
					}
				</script>
			");
			$_POST['submit'] = '';
		} else {
			echo("There was an error adding customer: " . mysqli_error($conn));
		}
	} else {
		echo "Error: Values cannot be blank";
	}
};

mysqli_close($conn);
?>
