<?php
include_once("inc/header.php");
?>
<div id="register" class="card my-2">
	<h2 class="text-center">Register Here...</h2>
	<form action="insert.php" method="POST" class="form-group" enctype="multipart/form-data">
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
		<div class="address">
			<label>
				Address:
			</label>
			<input type="text" class="form-control" name="address" placeholder="Enter Shop Address">
		</div>
		<div class="category">
			<label>
				Business Category:
			</label>
			<select class="form-control" name="bcategory">
				<option value="electronic">Electric</option>
				<option value="departmental">Departmental</option>
				<option value="furniture">Funiture</option>
			</select>
		</div>
		<div class="image">
			<label>
				Image:
			</label>
			<input type="file" class="form-control" name="image">
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
			<button type="submit" name="submit" class="btn btn-info my-2">Submit</button>
		</div>
	</form>
</div>

<?php
include_once("inc/footer.php");
?>