<?php
session_start();
include_once('autoload.php');
// get an instance of DB class
$dbActivity=DB::getInstance();

if(isset($_REQUEST['logout'])){
	//unset($_SESSION['username']);
	session_destroy();
	header('Location: index.php');
} else{
	if (!isset($_POST['submit'])) {
		header('Location: addproducts.php?click=empty');
		} else{
			// remove button field from the request
			array_pop($_REQUEST);
	
			//remove repassword
			if (array_key_exists("repassword", $_REQUEST)) {
				array_pop($_REQUEST);
			}
	
				
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
					if ($imgSize > 1000000) {
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

			var_dump($_REQUEST['brand']);die();

			
			if(isset($_SESSION['updateId'])){
					
// productId
// brand
// model
// categoryId
// details
// image
// address
// price
// offe
// 				$sql = "UPDATE products SET brand="
				header('Location: dashboard.php');
				//exit();
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
			}
			if ($dbActivity->generateQuery($table,$_REQUEST)) {
				if(array_key_exists('phone',$_REQUEST)){
					$_SESSION['username']= $_REQUEST['username'];
					header("Location: dashboard.php");
				} else{
					header("Location: add{$table}.php");
				}
			} else {
				echo "somethings wrong";
			}
		
	}
}
