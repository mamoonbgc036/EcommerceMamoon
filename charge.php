<?php
    require_once('vendor/autoload.php');

    \Stripe\Stripe::setApiKey('sk_test_GAsnKZjNu5OKUgKGLd3bDLvb00KrjEKY7I');
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $amount = explode("$", $POST['totalTk']);


    //Create Custormer in stripe

    $customer = \Stripe\Customer::create(array(
        'email'=>$POST['email'],
        'source' => $POST['token']
    ));

    //Charge Customer

    $charge = \Stripe\Charge::create(array(
        'amount' => $amount[1],
        'currency'=> "usd",
        'customer'=> $customer->id
    ));
    
    header("Location: address.php?transId={$charge->id}");

?>