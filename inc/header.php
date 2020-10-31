<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<title></title>
</head>
<body>

							<!-- HEADER -->

	<div id="topheader">
		<div id="logo">
			<a href="index.php"><img src="images/logo.png"></a>
		</div>
		<div id="search">
			<span class="fa fa-search form-control-feedback"></span>
			<div id="inputResult">
				<input type="text" name="" id="srcbox">
				<div class="result"></div>
			</div>
		</div>
		<div id="cartuser">
			<div id="cart">
				<i class="fas fa-cart-arrow-down"></i>
				<i id="badges" class="badge badge-dark rounded-circle"></i>
			</div>
			<div id="user">
				<i class="fas fa-user">
				<ul>
				<?php
				// session_start();
				if(isset($_SESSION['username'])){
					?>
					<li><a href="insert.php?logout=<?=$_SESSION['username']?>">Logout</a></li>
					<?php
				}else{
					?>
					<li><a href="signin.php">Login</a></li>
					<?php
				}
				?>
				</ul>
			</i>
			</div>
		</div>
	</div>

	<div class="cartDiv">
			<i class="fas fa-window-close"></i>
			<h3>Your Cart</h3>
			<div class="apnd">
				<!-- <div class="cartDivitem">
					<div class="imagePrice">
						<img src="images/test.jpg" alt="">
						<div class="namePrice">
							<h5>Samsung</h5>
							<h5>$ 35.40</h5>
							<button id="remove">Remove</button>
						</div>
					</div>
					<div class="updown">
						<i class="fas fa-chevron-up"></i>
						<p>0</p>
						<i class="fas fa-chevron-down"></i>
					</div>
				</div>
				<h3 id="total">Your Total : $ 4748</h3>
				<button id="clear">CLEAR CART</button> -->
			</div>
		</div>
