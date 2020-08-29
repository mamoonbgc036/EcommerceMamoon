<?php
session_start();
$catId = $_GET['category'];
include_once("inc/header.php");
include_once('autoload.php');
$dbInstance = DB::getInstance();
$catItems = $dbInstance->specialQuery(['productId','model','brandName','price','image'],['products','brands'],['products.categoryId='.$catId.'','products.brand=brands.brandId']);
?>
<div class="content">
<?php 
  if ($catItems){
  	foreach ($catItems as $cItems) {
?>
		<a id="card" href="productDetails.php?prodId=<?=$cItems['productId']?>">
			<div id="items" class="card m-1">
				<img class="card-img" src="productImages/<?=$cItems['image']?>">
				<div class="card-body text-center">
					<h3 class="card-title"><?=$cItems['brandName']?></h3>
					<p class="card-link"><?=$cItems['model']?></p>
					<h4 class="card-link">$ <span><?=$cItems['price']?></span></h4>
					<button id="btn" class="btn btn-success">Add Cart</button>
					<a id="cards" href="productDetails.php?prodId=<?=$cItems['productId']?>" class="btn btn-primary">Details</a>
				</div>
			</div>
		</a>
<?php 
		}
             } else {
             	?>
            <h2 class= "text-warning">Sorrry there is no product at now!</h2>
             	<?php
             }
?>
	</div>
<?php
include_once("inc/footer.php");
?>
