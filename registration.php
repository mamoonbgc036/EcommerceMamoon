<?php
include_once("inc/header.php");
?>
<div id="register" class="card my-2">
	<h2 class="text-center">Register Here...</h2>
	<form action="validation.php" class="form-group">
	<div class="first">
		<label>
			First Name:
		</label>
		<input type="text" class="form-control" name="first" placeholder="First Name">
	</div>
	<div class="last">
		<label>
			Last Name:
		</label>
		<input type="text" class="form-control" name="last" placeholder="Last Name">
	</div>
	<div class="phone">
		<label>
			Phone No:
		</label>
		<input type="text" class="form-control" name="phone" placeholder="Enter Your Phone No.">
	</div>
	<div class="username">
		<label>
			Username:
		</label>
		<input type="text" class="form-control" name="username" placeholder="Enter Username">
	</div>
	<div class="password">
		<label>
			Password:
		</label>
		<input type="password" class="form-control" name="password" placeholder="Enter Password">
	</div>
	<div class="reenterpassword">
		<label>
			Re-enter Password:
		</label>
		<input type="password" class="form-control" name="repassword" placeholder="Re-enter Password">
	</div>
	<div>
		<input type="submit" class="btn btn-info my-2" value="submit" name="submit">
	</div>
</form>
</div>

<?php
include_once("inc/footer.php");
?>