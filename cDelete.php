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
if (isset($_POST['delete'])) {
	$memId = $_POST['memId'];
}
//vals coming from update/delete html page.
//delete a customer
$dltQry = "DELETE FROM customer WHERE memberId = '$memId'";
if (mysqli_query($conn, $dltQry)){
	echo("
		<h2>Customer info deleted!</h2>
		<h3>Redirecting In <span id='countdown'>4</span></h3>
		<script type='text/javascript'>

    // Total seconds to wait
    var seconds = 4;

    function countdown() {
        seconds = seconds - 1;
        if (seconds < 1) {
            // Chnage your redirection link here
            window.location = 'select.php';
        } else {
            // Update remaining seconds
            document.getElementById('countdown').innerHTML = seconds;
            // Count down using javascript
            window.setTimeout('countdown()', 1000);
        }
    }

		countdown();
		</script>
	");

} else {
	echo("There was an error deleting the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>
