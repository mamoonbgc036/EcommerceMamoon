<?php
session_start();
include_once("inc/header.php");
include_once('autoload.php');
$dbInstance = DB::getInstance();
$categories = $dbInstance->read('categories','')->results();
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
		<div class="card" id="main">	
			<div>
				<h2>About Us</h2>
				<div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
			<div>
				<h3 class="text-center">Our Products Categories</h3>
				<div class="categorySection">
					<ul>
					<?php
						if($categories){
							foreach($categories as $categorie){
								?>
								<li><a href="categoryShow.php?category=<?=$categorie['catId']?>"><?=$categorie['catName']?></a>
										<img src="categoryImage/<?=$categorie['image']?>" alt="">
								</li>
								<?php
							}
						}
					?>
					</ul>
				</div>
			</div>
			<div id="notice">
				<h2>Notice Board</h2>
				<div>
					<ul>
						<li>1.this product is zero stock now</li>
						<li>1.this product is zero stock now</li>
						<li>1.this product is zero stock now</li>
					</ul>
				</div>
			</div>
		</div>
<?php
include_once("inc/footer.php");
?>