<?php
session_start();
if(isset($_SESSION['username'])){
 include_once('inc/header.php');
?>
<h1 class="text-center text-danger">Add Category</h1>
<div id="categoryForm">
	<form class="form my-4" action="insert.php" method="POST" enctype="multipart/form-data">
		<div>
			<h3>Name :</h3>
			<input type="text" name="catName" class="form-control" placeholder="Add Category Name" required="">
		</div>
		<div>
			<h3>Image :</h3>
			<input type="file" name="image" class="form-control" required="">
		</div>
		<div class="mt-1 text-center">
            <a class="btn btn-warning btn-lg" href="addproducts.php">Back</a>
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