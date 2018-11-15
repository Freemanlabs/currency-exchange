<?php
require ('vendor/autoload.php');
use pxgamer\ChangeNow\{Currencies,Transactions};

$currencies = new Currencies();
$transactions = new Transactions();

$res =$currencies->minimumAmount('btc', 'etc');
$res     = get_object_vars($res);
echo $res["minAmount"];

       
?>
<!DOCTYPE html>
<html>
<body>

<select>
	<?php
        foreach ($res as $currency){
            $currency     = get_object_vars($currency); ?>
            <option style="text-transform:uppercase; font-size:18px;" value="<?php echo $currency["ticker"]; ?>" data-icon="<?php echo $currency["image"]; ?>" data-subtext="<?php echo $currency["name"]; ?>"><?php echo $currency["minimumAmount"]; ?></option>
        <?php 
        }
        ?>

</select>


</body>
</html>