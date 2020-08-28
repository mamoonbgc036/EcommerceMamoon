<?php
session_start();
if(isset($_SESSION['username'])){
include_once("inc/header.php");
include_once('autoload.php');
$dbInstance = DB::getInstance();
$brands = $dbInstance->read('brands','')->results();
$categories = $dbInstance->read('categories','')->results();
?>
<h1 class="text-center text-danger">Add Product</h1>
<div class="addproduct">
	<form class="form my-2" action="insert.php" method="POST" enctype="multipart/form-data">
		<div>
			<h3>Product Brand :</h3>
			<select class="form-control" name="brand"  id="brand" required>
				<option value="" selected>Select a Brand</option>
				<?php foreach ($brands as $key => $val){?>
				<option value="<?=$val['brandId'];?>"><?=$val['brandName'];?></option>
				<?php }?>
				<option id="add" value="addBrands.php">Add Brand</option>
			</select>
		</div>	
		<div>
			<h3>Product Model :</h3>
			<input type="text" name="model" class="form-control" placeholder="Product model" required="">
		</div>	
		<div>
			<h3>Product Category :</h3>
			<select class="form-control" name="categoryId"  id="category" required>
				<option value="" selected>Select a Category</option>
				<?php foreach ($categories as $key => $val){?>
				<option value="<?=$val['catId'];?>"><?=$val['catName'];?></option>
				<?php }?>
				<option id="add" value="addcategories.php">Add Category</option>
			</select>
		</div>	
		<div>
			<h3>Product Details :</h3>
			<textarea name="details" class="form-control"></textarea>
		</div>	
		<div>
			<h3>Product Image :</h3>
			<input type="file" name="image" class="form-control" required="">
		</div>	
		<div>
			<h3>Contact Adress :</h3>
			<textarea name="address" class="form-control" required=""></textarea>
		</div>	
		<div>
			<h3>Product Price :</h3>
			<input type="text" name="price" class="form-control" placeholder="Product price" required="">
		</div>
		<div>
			<h3>Speciality :</h3>
			<select class="form-control" name="offer"  required>
				<option selected>Select a Speciality</option>
				<option value="1">General Offer</option>
				<option value="2">Feature Offer</option>
				<option value="3">Mega Offer</option>
			</select>
		</div>	
		<div class="mt-1 text-center">
			<input type="submit" name="submit" class="btn btn-primary btn-lg">
		</div>
	</form>
</div>
 <script>
	$(function(){
		$('#brand').on('change',function(){
			if ($(this).val()=='addBrands.php'){
				window.location = $(this).val();
			}
		});
		$('#category').on('change',function(){
			if ($(this).val()=='addcategories.php'){
				window.location = $(this).val();
			}
		});
	})
 </script>
<?php
include_once('inc/footer.php');
}else{
	header('Location: signin.php');
}
?>