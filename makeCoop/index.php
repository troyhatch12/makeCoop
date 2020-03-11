<?php
  $mysqli = new mysqli("localhost", "dev", "develop", "makeCoop");

  $result = $mysqli->query("SELECT *");
  echo $result;
  echo "<html>
    welcome to makecoop
    </html>";

?>
