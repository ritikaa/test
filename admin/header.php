<?php
@session_start();
 ?>
<div class="header">
    <div class="logo"><a href="dashboard.php"><img src="images/softage_logo.png" /></a></div>
    
    <div class="right_header"><strong>Welcome <?php echo ucfirst($_SESSION['admin_user']);?></strong> | <a href="logout.php" class="logout">Logout</a></div>
    <div class="jclock"></div>
    </div>