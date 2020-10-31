<?php
session_start();
if(isset($_SESSION['username'])){
 include_once('inc/header.php');
?>
<h1 class="text-center text-danger">Add Notice</h1>
<div id="categoryForm">
	<form class="form my-4" action="insert.php" method="POST">
		<div>
			<h3>Notice Heading :</h3>
			<input type="text" name="heading" class="form-control" placeholder="Add Notice Heading" required="">
		</div>
		<div>
			<h3>Notice Description :</h3>
			<textarea class="form-control" name="description" placeholder="Add Notice Description"></textarea>
		</div>
		<div class="mt-1 text-center">
			<input type="submit" name="submit" class="btn btn-primary btn-lg">
		</div>
	</form>
</div>
<?php
	include_once('inc/footer.php');
}else{
	header('Location: signin.php');
}
?>