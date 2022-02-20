<?php 
if(isset($_SESSION['message'])) {
  echo "<div class='alert text-white alert-".$_SESSION['message'][0]."'>".$_SESSION['message'][1]."</div>";
  unset($_SESSION['message']); }
 ?>