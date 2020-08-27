<?php
include_once('autoload.php');
if (isset($_POST['search'])){
$sql = "SELECT * FROM products WHERE model LIKE '%".$_POST['search']."%'";
$data = DB::getInstance()->read(null,$sql)->results();
//echo $data[0]['model'];
//echo "<li>".$data[0]['model']."</li>";
$html = "";
$html .= "<ul class='test'>";
foreach($data as $datum){
$html .='<li id="autoSearch"><a class="card-link" href="productDetail.php?prodId='.$datum['productId'].'">'.$datum['model'].'</a></li>';
}
$html .="</ul>";
echo $html;
} else if(isset($_POST['brandName'])){
	$sql = "SELECT * FROM brands";
	$data = DB::getInstance()->read(null,$sql)->results();
	$html = "";
	foreach($data as $datum){
	$html .='<a href="brandShow.php?brand='.$datum['brandId'].'">'.$datum['brandName'].'</a>';
	}
	echo $html;
} else if(isset($_POST['category'])) {
	$sql = "SELECT * FROM categories";
	$data = DB::getInstance()->read(null,$sql)->results();
	$html = "";
	foreach($data as $datum){
	$html .='<a href="categoryShow.php?category='.$datum['catId'].'">'.$datum['catName'].'</a>';
	}
	echo $html;
}
