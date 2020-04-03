<?php

function print_nav(){
	echo "
		<nav>
			<ul>
				<li><a href='home.php'>MakeCoop</a></li>
				<li><a href='cInsert.php'>Insert</a></li>
				<li><a href='cSelect.php'>Select/Update/Delete</a></li>
				<li><a href='cQuery.php'>Query</a></li>
			</ul>
		</nav>
	";
}
function print_head(){
	echo (
	"<html>
		<head>
			<link rel='stylesheet' type='text/css' href='style/style.css'></link>
		</head>
	");
}
function print_redirect(){
	echo"
	<h3>Redirecting In <span id='countdown'>4</span></h3>
	<script type='text/javascript'>

	// Total seconds to wait
	var seconds = 4;

	function countdown() {
			seconds = seconds - 1;
			if (seconds < 1) {
					// Chnage your redirection link here
					window.location = 'cSelect.php';
			} else {
					// Update remaining seconds
					document.getElementById('countdown').innerHTML = seconds;
					// Count down using javascript
					window.setTimeout('countdown()', 1000);
			}
	}

	countdown();
	</script>";
}

?>
