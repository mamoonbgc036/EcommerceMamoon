<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<header>
		<div class="subheader1">
			<div class="find">
				<input type="text" id="srcbox" name="search" placeholder="Search for product">
				<div class="result"></div>
			</div>
			<div id="mycart">
				<i class="fas fa-cart-arrow-down"></i>
				<i id="badge" class="badge badge-dark rounded-circle"></i>
			</div>
			<i class="fas fa-user"></i>
		</div>
	</header>
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
	<style>
.cartDiv{
background : #ececec;
width : 30%;
position : fixed;
right : 0;
top : 0;
z-index : 9;
padding : 40px;
height: 100vh;
overflow: scroll;
transition: all .3s linear;
transform : translateX(100%);
}

.cartDiv > h3{
text-align : center;
}

.cartDiv #clear{
margin : 0 auto;
display:block;
background : #f09d51;
padding : 10px;
transition: all 0.3s linear;
}


.cartDiv #remove{
padding : 3px;
background : #f09d51;
transition: all 0.3s linear;
}

.cartDiv #remove:hover,#clear:hover{
	background: #fff;
	color: #000;
}

.cartDivitem{
display: flex;
justify-content : space-between;
margin : 8px auto;
}

.cartDivitem img{
width : 80px;
}

.cartDiv #total{
margin-top : 30px;
}

.cartDivitem .imagePrice{
	display: flex;
}

.cartDivitem .namePrice{
	margin-left : 8px;
}

.updown p{
	margin : 0!important;
}

	</style>
		<main>
			<div class="subheader2">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="">Category</a></li>
					<li><a href="">Brand</a></li>
					<li><a href="">Contact</a></li>
				</ul>
			</div>
		
	