<?php
require_once('printhtml.php');
$config = require_once('config.php');

print_head();
print_nav();

echo "
  <div class='container'>
    <h1 class='banner'>Welcome to MakeCoop</h1>
    <p class='subhead'>A coupon generator</p>
    <div class='dual'>
      <h3>Know the member ID?</h3>
      <p>Generate coupons now!</p>
      <form method='post' action='coupon.php'>
        <input type='text' name='memId'>
        <input type='submit' name='submit' value='Generate'>
    </div>
    <div class='dual'>
      <h3>View Customer Selection</h3>
    </div>

  </div>
"


 ?>
