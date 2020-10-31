<?php
include_once('inc/header.php');
include_once('autoload.php');
$check = $_GET['prodId'];
//var_dump(['product='.$check.'']);die;
$items = DB::getInstance()->specialQuery(['productId','details','model','price','products.image','brandName','catName'],['products','brands','categories'],['productId='.$check.'','products.brand=brandId AND products.categoryId=categories.catId']);
//var_dump($items);die();
?>
<div id="parent">
     <div id="image">
        <img src="productImages/<?=$items[0]['image']?>" alt="">
    </div>
    <div id="details">
            <h2>Name: <?=$items[0]['model']?></h2>
            <h3>Brand: <?=$items[0]['brandName']?></h3>
            <h3>Category : <?=$items[0]['catName']?></h3>
            <div id="details">
                <h3>Product Details</h3>
                <p>
                <?=$items[0]['details']?>
                </p>
            </div>
            <h3 id="price">Price : $ <?=$items[0]['price']?></h3>
            <div id="plusCard">
                <div>
                    <input type="number" id="<?=$items[0]['productId']?>" class="buyfield form-control" value="1">
                    <input type="submit" id="bulkAdd" class="btn btn-info" value="Add Card">
                </div>
            </div>
     </div>
       <div id="categories">
          <h2>Categories:</h2>
           <ul>
            <li><a href="">Electronics</a></li>
         </ul>
     </div>    
    
</div>

<?php
include_once('inc/footer.php');
?>



           