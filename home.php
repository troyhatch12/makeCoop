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
      <div class='divider'>
        <h3>Know the member ID?</h3>
        <p>Generate coupons now!</p>
        <form method='post' action='coupon.php'>
          <input type='text' name='memId' placeholder='Member Id'>
      </div>
        <input type='submit' name='submit' value='Generate' class='button-big'>
        </form>
    </div>
    <div class='dual'>
      <div class=divider>
        <h3>Or choose from a list of customers</h3>
      </div>
      <a href='cSelect.php'>
        <button class='button-big'>Customer List</button>
      </a>
    </div>

  </div>
"


 ?>
