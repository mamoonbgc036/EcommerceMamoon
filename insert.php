<?php
session_start();
include_once('autoload.php');
// get an instance of DB class
$dbActivity=DB::getInstance();

//var_dump($_REQUEST);die();

if(isset($_REQUEST['logout'])){
	//unset($_SESSION['username']);
	session_destroy();
	header('Location: index.php');
} else{
	if (!isset($_POST['submit'])) {
		header('Location: addproducts.php?click=empty');
		} else{
			//print_r($_REQUEST);die();
			// remove button field from the request
			array_pop($_REQUEST);
	
			//remove repassword
			if (array_key_exists("repassword", $_REQUEST)) {
				array_pop($_REQUEST);
			};

			//var_dump($_REQUEST);die();
	
				
			// processing image
			if ($_FILES){
				$imgName = $_FILES['image']['name'];
				$imgLocation = $_FILES['image']['tmp_name'];
				$imgSize = $_FILES['image']['size'];
				$imgNarray = explode('.', $imgName);
				$imgActualextension = $imgNarray[1];
				$allowedImageextension = ['jpg', 'jpeg', 'png'];
				if (!in_array($imgActualextension, $allowedImageextension)){
					header('Location: addproducts.php?defectExtension');
				} else {
					if ($imgSize > 10000000) {
						header('Location: addproducts.php?toobig');
					} else {
						$imgNewname = uniqid().'.'.$imgActualextension;
						if (array_key_exists("bcategory", $_REQUEST)) {
							move_uploaded_file($imgLocation, 'sellerImages/'.$imgNewname);
						} elseif(array_key_exists("model", $_REQUEST)){
							move_uploaded_file($imgLocation, 'productImages/'.$imgNewname);
						}	elseif(array_key_exists('phone',$_REQUEST)){
							move_uploaded_file($imgLocation, 'userImages/'.$imgNewname);
						}	elseif(array_key_exists('catName',$_REQUEST)){
							move_uploaded_file($imgLocation, 'categoryImage/'.$imgNewname);
						}
					}
				}
				$_REQUEST['image'] = $imgNewname;
			}

			//var_dump($_REQUEST['brand']);die();

			
			if(isset($_SESSION['updateId'])){
				$sql = "UPDATE products SET brand='{$_REQUEST['brand']}', model='{$_REQUEST['model']}', categoryId='{$_REQUEST['categoryId']}', details='{$_REQUEST['details']}', image='{$_REQUEST['image']}', address= '{$_REQUEST['address']}', price = '{$_REQUEST['price']}', offer = '{$_REQUEST['offer']}' WHERE productId = {$_SESSION['updateId']}";
				 //$sql = "UPDATE products SET brand = '{$_REQUEST["brand"]}' WHERE productId=1";
				 //die($sql);
				$dbActivity->read(null,$sql);
				unset($_SESSION['updateId']);
				header('Location: dashboard.php');
				exit();
			}
	
			// check form input name for selecting table e.g if name model exit than db table will be products
			if (array_key_exists('bcategory',$_REQUEST)) {
				$table = "seller";
			} elseif(array_key_exists("brandName", $_REQUEST)){
				$table = "brands";
			} elseif(array_key_exists("catName",$_REQUEST)){
				$table = "categories";
			} elseif(array_key_exists("model",$_REQUEST)){
				$table = "products";
			} elseif(array_key_exists('phone',$_REQUEST)){
				$table = 'admin';
			} elseif(array_key_exists('token', $_REQUEST)){
				$table = 'address';
			}
			if ($dbActivity->generateQuery($table,$_REQUEST)) {
				if(array_key_exists('phone',$_REQUEST)){
					$_SESSION['username']= $_REQUEST['username'];
					header("Location: welcome.php");
				} elseif(array_key_exists('token', $_REQUEST)){
					header("Location: thanks.php");
				} else{
					header("Location: add{$table}.php");
				}
			} else {
				echo "somethings wrong";
			}
		
	}
}
