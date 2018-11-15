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

    $res2 = $currencies ->exchangeAmount($to, $from, $value);
    $res2     = get_object_vars($res2);

    echo $res2["estimatedAmount"];

?>
