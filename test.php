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
}
