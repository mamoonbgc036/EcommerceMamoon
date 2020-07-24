<?php
include_once("inc/header.php");
?>
<div class="card my-2" id="signin">
	<h3 class="text-center">Log in</h3>
	<form action="search.php" method="POST" class="form-group">
		<div>
			<label>
			Username:
			</label>
			<input type="text" class="form-control" name="username" placeholder="Username" required="">
		</div>
		<div>
			<label>
			Password:
			</label>
			<input type="password" class="form-control" name="password" placeholder="Password" required="">
		</div>
		<div>
			<button class="btn btn-primary my-2">Submit</button>
		</div>
	</form>
</div>
<?php
include_once("inc/footer.php");
?>