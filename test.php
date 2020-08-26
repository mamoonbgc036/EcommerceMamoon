<?php
include_once('autoload.php');
if(isset($_REQUEST['result'])){
    $dbActivity=DB::getInstance();
    foreach($_REQUEST['result'] as $item){
        //var_dump($item);die();
        $dbActivity->generateQuery('orders',$item);
    }
}
