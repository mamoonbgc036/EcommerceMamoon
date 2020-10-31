<?php
session_start();
$catId = $_GET['category'];
include_once("inc/header.php");
include_once('autoload.php');
$dbInstance = DB::getInstance();
$catItems = $dbInstance->specialQuery(['productId','model','brandName','price','image'],['products','brands'],['products.categoryId='.$catId.'','products.brand=brands.brandId']);
?>
   <h2 id="contentheading">Electric Section</h2>  
        <?php
            if($catItems){
                ?>
                <div id="content">
                <?php
                foreach ($catItems as $feature) {
                    ?>
                        <div id="cart" class="<?=$feature['productId']?>">
                            <img src="productImages/<?=$feature['image']?>">
                            <p>$ <?=$feature['price']?></p>
                            <h5><?=$feature['model']?></h5>
                            <h4><?=$feature['brandName']?></h4>
                            <button class="add btn btn-info">Add To Cart</button>
                            <a href="productDetail.php?prodId=<?=$feature['productId']?>" class="btn btn-info">Details</a>
                        </div>
                    <?php
                }
                ?>
                 </div>
                <?php
            }else{
                ?>
                <h3 class="text-info text-center">Sorry there is no product now</h3>
                <?php
            }
        ?> 
       
<?php
include_once("inc/footer.php");
?>
