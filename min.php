<?php
require ('vendor/autoload.php');
use pxgamer\ChangeNow\{Currencies,Transactions};

$currencies = new Currencies();
$transactions = new Transactions();

$res = $currencies ->get();

$to = 'btc';
    $from = 'eth';
    $value=1.0;

if ($value !==''){
    
    if(isset($_REQUEST["q"])){
        $to = htmlspecialchars($_REQUEST['q']);
    }
    if(isset($_REQUEST["r"])){
        $from = htmlspecialchars($_REQUEST['r']);
    }
    if(isset($_REQUEST["s"])){
        $value = (float)$_REQUEST["s"];
    }
}


/**if ($value !==''){
    if (isset($_REQUEST['to']) && isset($_REQUEST['from'])){
        $to = htmlspecialchars($_REQUEST['to']);
        $from = htmlspecialchars($_REQUEST['from']);
        
    }
}*/

    $res3 = $currencies ->minimumAmount($to, $from);
    $res3     = get_object_vars($res3);

    $min =  $res3["minAmount"];

    if ($value < $min){
        echo '<div class="col-md-8 minamnt">Amount is below the minimum limit: '.$min.' <span style="text-transform:uppercase;">'.$to.'</span></div>';
    } else{
        echo '';
    }
?>

<link href="assets/css/bootstrap.mim.css" rel="stylesheet">
<link href="assets/css/main2.css" rel="stylesheet">
