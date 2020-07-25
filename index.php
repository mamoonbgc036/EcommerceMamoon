<?php
include_once("inc/header.php");
include_once('autoload.php');
$limit = 4;
$dbInstance = DB::getInstance();
$generalItems = $dbInstance->specialQuery(['productId','model','price','image','brandName'],['products','brands'],['products.brand=brandId'],$limit);
$featureItems = $dbInstance->specialQuery(['productId','model','price','image','brandName'],['products','brands'],['products.offer=2','products.brand=brandId'],$limit);
$megaItems = $dbInstance->specialQuery(['productId','model','price','image','brandName'],['products','brands'],['products.offer=3','products.brand=brandId'],$limit);
?>

		
					<!-- carousel -->

			
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="images/banner1.jpg" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/banner2.jpg" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="images/banner3.jpg" alt="Third slide">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
			<div class="card">
	<div class="content">
<?php 
  if ($generalItems){
  	foreach ($generalItems as $gItems) {
?>
		<a id="card" href="productDetails.php?prodId=<?=$gItems['productId']?>">
			<div id="items" class="card m-1">
				<img class="card-img" src="productImages/<?=$gItems['image']?>">
				<div class="card-body text-center">
					<h3 class="card-title"><?=$gItems['brandName']?></h3>
					<p class="card-link"><?=$gItems['model']?></p>
					<h4 class="card-link">$ <span><?=$gItems['price']?></span></h4>
					<button id="btn" class="btn btn-success">Add Cart</button>
					<a id="cards" href="productDetails.php?prodId=<?=$gItems['productId']?>" class="btn btn-primary">Details</a>
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
<h2 id="offer" class="text-center">Special Offer:</h2>
		<div class="content">
<?php 
  if ($featureItems){
  	foreach ($featureItems as $fItems) {
?>
		<a id="card" href="productDetails.php?prodId=<?=$fItems['productId']?>">
			<div id="items" class="card m-1">
				<img class="card-img" src="productImages/<?=$fItems['image']?>">
				<div class="card-body text-center">
					<h3 class="card-title"><?=$fItems['brandName']?></h3>
					<p class="card-link"><?=$fItems['model']?></p>
					<!-- <h4 class="card-link">Tk. <?=$fItems['price']?></h4> -->
					<h4 class="card-link">$ <span><?=$fItems['price']?></span></h4> 
					<button id="btn" class="btn btn-success">Add Cart</button>
					<a id="cards" href="productDetails.php?prodId=<?=$fItems['productId']?>" class="btn btn-primary">Details</a>
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
<h2 id="offer" class="text-center">Mega Offer:</h2>
		<div class="content">
<?php 
  if ($megaItems){
  	foreach ($megaItems as $mItems) {
?>
		<a id="card" href="productDetails.php?prodId=<?=$mItems['productId']?>">
			<div id="items" class="card m-1">
				<img class="card-img" src="productImages/<?=$mItems['image']?>">
				<div class="card-body text-center">
					<h3 class="card-title"><?=$mItems['brandName']?></h3>
					<p class="card-link"><?=$mItems['model']?></p>
					<h4 class="card-link">$ <span><?=$mItems['price']?></span></h4>
					<button id="btn" class="btn btn-success">Add Cart</button>
					<a id="cards" href="productDetails.php?prodId=<?=$mItems['productId']?>" class="btn btn-primary">Details</a>
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
</div>
<?php
include_once("inc/footer.php");
?>