<?php
include_once('autoload.php');
$dbActivity=DB::getInstance();
if(isset($_REQUEST['result'])){
    foreach($_REQUEST['result'] as $item){
        //var_dump($item);die();
        $dbActivity->generateQuery('orders',$item);
    }
    echo "congratulation, Your order is placed. we contact with you soon";
} elseif(isset($_POST['del'])){
   if($dbActivity->delete('products',$_POST['del'])){
       echo "One Products is deleted";
   }else{
       echo "there is somethink wrong";
   }
} elseif(isset($_POST['fdata'])){
    $data = json_decode($_POST['fdata']);
    $token = array_pop($data);
    $name  = array_pop($data);
    //echo gettype($data[0][0]);die();
    foreach ($data as $datum) {
      $dbActivity->read("","INSERT INTO `orders`(`name`, `product_name`, `quantity`, `price`,`token`) VALUES ('$name','$datum[0]',$datum[2],$datum[3],'$token')"); 
    }
    //print_r($data[0]);
    // $dbActivity->read("","INSERT INTO `order`(`name`, `product_name`, `quantity`, `price`) VALUES ('a','b',2,250)");
}
