<?php
session_start();
if(isset($_SESSION['username'])){
	include_once("inc/header.php");
?>
<div class="card" id="welcomeCard">
	<img src="images/handshake.png">
	<h3 class="text-danger">Thanks You for sign in. Your are now ready to enjoy a number of facilities as our valuable customer</h3>
	<a href="index.php" class="btn btn-primary">Home</a>
	<a href="dashboard.php" class="btn btn-info">MyAdmin</a>
</div>
<?php
include_once("inc/footer.php");
} else{
	header('Location: signin.php');
}
?>