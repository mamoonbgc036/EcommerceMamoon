<?php
session_start();
if(isset($_SESSION['username'])){
include_once("inc/header.php");
include_once("autoload.php");
$pdo = DB::getInstance();
$products = $pdo->read('products','')->results();
if(isset($_POST['del'])){
	print_r($_POST['del']);die();
}
?>
<style type="text/css">
	main{
		width:100%;
	}
	.dashboard .table {
		width: 84%;
	}
#action{
width: 18%;
}
#img{
width:30px;
}
</style>
<div class="dashboard">
	<div class="sidebar">
		<ul>
			<li><a href="">Upload Product</a></li>
			<li><a href="">Post Product</a></li>
			<li><a href="">Your Account</a></li>
		</ul>
	</div>
	<table class="table table-dark">
	  <thead>
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Name</th>
	      <th scope="col">Category</th>
	      <th scope="col">Brand</th>
	      <th scope="col">Details</th>
	      <th scope="col">Image</th>
	      <th scope="col">Price</th>
	      <th scope="col" id="action">Action</th>
	    </tr>
	  </thead>
	  <tbody>
<?php
	foreach($products as $product){
?>
	    <tr id="<?=$product[0]?>">
	      <td id="prodId" scope="row"><?=$product[0]?></td>
	      <td><?=$product[2];?></td>
	      <td><?=$product[3];?></td>
	      <td><?=$product[1];?></td>
		  <td><?=$product[4];?></td>
			<td><img src="productImages/<?=$product[5];?>" id="img" alt=""></td>
			<td><?=$product[7];?></td>
			<td>
				<a href="" class="btn btn-success">Update</a>
				<button class="btn btn-danger">Delete</button>
			</td>
	    </tr>
<?php
	}
?>
	  </tbody>
	</table>
</div>
<?php
include_once("inc/footer.php");
} else{
	header('Location: signin.php');
}
?>