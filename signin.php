<?php
include_once("inc/header.php");
include_once("autoload.php");
?>
<div class="card my-2" id="signin">
	<h3 class="text-center">Log in</h3>
	<?php
		if(!empty($_POST)){
			$error = validation::check($_POST)->getCheck();
			if(sizeof($error)!=null){
				for($i=0;$i<count($error);$i++){
					?>
					<div class="text-danger text-center"><?=$error[$i]?></div>
					<?php
				}
			} else {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$sql = "SELECT * FROM admin WHERE username = '$username' AND password= '$password'";
				$dbInstance = DB::getInstance();
				$megaItems = $dbInstance->read(null,$sql)->getCount();	
				if($megaItems){
					header("Location: dashboard.php");
				}else{
					die('not ok');
				}
			}
		}
	?>
	<form action="signin.php" method="POST" class="form-group">
		<div>
			<label>
			Username:
			</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<div>
			<label>
			Password:
			</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div>
			<button class="btn btn-primary my-2" name="submit">Submit</button>
		</div>
	</form>
	<p class="text-center">Have no account?<span><a href="addusers.php">signin</a></span></p>
</div>
<?php
include_once("inc/footer.php");
?>