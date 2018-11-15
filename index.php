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

$res2 = $currencies ->exchangeAmount($to, $from, $value);
    $res2     = get_object_vars($res2);

if (isset($_POST['submitbtn'])){	
	header("Location:  exchange.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="M_Adnan">
<title>Currency Exchange</title>

<!-- Bootstrap Core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/main2.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">
<link href="assets/fonts/flaticon.css" rel="stylesheet">
<link href="assets/css/ionicons.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-select.min.css" rel="stylesheet">

<!-- JavaScripts -->
<script src="assets/js/modernizr.js"></script>

<!-- Online Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
<link href="fonts/all.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    
<script>
    function mysend() {
    var x = document.getElementById("sendselect").value;
    document.getElementById("send").innerHTML = x;
}
</script>
<script>
    function myget() {
    var y = document.getElementById("getselect").value;
    document.getElementById("get").innerHTML = y
    //return x;
}
</script>
        <script>
function openModal() {
        document.getElementById('loaderr').style.display = 'block';
        document.getElementById('you_get').value = '';
}
//function my(x) {
    //var x = document.getElementById("mySelect").value;
    //document.getElementById("demo").innerHTML = x;
    //return x;
//}
</script>
<script>
function closeModal() {
    document.getElementById('loaderr').style.display = 'none';
    //document.getElementById('ex_rate').style.display = 'block';
}
</script>

<script>
function showExchange(to,from,value) {
    openModal();
    if (value == 0) { 
        closeModal();
        document.getElementById("you_get").value = 0;
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                closeModal();
                document.getElementById("you_get").value = this.responseText;
            }
        }
        xmlhttp.open("GET", "get.php?q="+to + "&r="+from + "&s="+value, true);
        xmlhttp.send();
    }
}
</script>
<script>
function showExchangeVal(to,from,value) {
    if (value == 0) { 
        document.getElementById("ex_rate_for_one").innerHTML = 0;
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ex_rate_for_one").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "get.php?q="+to + "&r="+from + "&s="+value, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<div id="wrap"> 
  
  <!-- header -->
  <header class="sticky">
  <script>var EXCHANGE_DEFAULTS = {from: "btc", to: "eth", send: "1"};
</script>
  
    <div class="container"> 
      
      <!-- Logo -->
      <div class="logo"> <a href="index.html"><img class="img-responsive" src="images/logo.png" alt="" ></a> </div>
      <nav class="navbar ownmenu navbar-expand-lg ">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span><i class="fas fa-bars"></i></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav">
            <li class="scroll active"><a href="#">Home</a></li>
            <!--li class="scroll"> <a href="#about">About </a> </li-->
			<li class="scroll"> <a href="#">About</a> </li>
			<li class="scroll"> <a href="#">How it works</a> </li>
			<li class="scroll"> <a href="#">FAQ</a> </li>
            <li class="scroll"> <a href="#">Contact</a> </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="clearfix"></div>
  </header>
  
  <!-- HOME MAIN -->
  <section class="simple-head" data-stellar-background-ratio="0.5" id="hme"> 
    <!-- Particles -->
    <div id="particles-js"></div>
    <div class="position-center-center cont-left">
      <div class="container">
        <div class="row"> 
          
          <!-- Left Section -->
          <div class="col-md-6">
            <h1>Currency exchange you can trust</h1>
			<!--p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p-->
            <a href="#." class="button" style="background:#2d3a4b; color:#fff;" >FAQ</a> <a href="#." class="button btn-inverse">How it works</a> </div>
          
          <!-- Text Section -->
          <div class="col-md-6 col-sm-12 distrmi padding-top-15">
    <div id="main-exchange-form">
<form action="" method="post" class="main-exchange-form form-group">
<div class="exchange-form">
 <div class="row no-gutters"><div class="col-md-8 exchange-input exchange-input__dark">
            <div class="exchange-input__wrapper">
                <div class="exchange-input--title">You Send</div>
				<input type="text" value="1" class="exchange-input--input form-control form-control-col" name="value" id="you_send" oninput="showExchange(document.getElementById('sendselect').value,document.getElementById('getselect').value,this.value)"/>
                <div class="exchange-input--vertical"></div>                
            </div>
        </div>
 <div class="col-md-4">
 <select id="sendselect" style="text-transform:uppercase; font-weight:500;" name="to" class="to form-control form-control-col selmectpicker" data-live-search="true" onchange="showExchangeVal(this.value,document.getElementById('getselect').value,1.0); showExchange(this.value,document.getElementById('getselect').value,document.getElementById('you_send').value); mysend()">
    <?php
        foreach ($res as $currency){
            $currency     = get_object_vars($currency); ?>
            <option style="text-transform:uppercase; font-size:18px;" value="<?php echo $currency["ticker"]; ?>" data-icon="<?php echo $currency["image"]; ?>" data-subtext="<?php echo $currency["name"]; ?>"><?php echo $currency["ticker"]; ?></option>
        <?php 
        }
        ?>
     </select></div>
	 </div>
	 <ul class="exchange-sequence" style="height: 86px;">
            <li class="exchange-sequence--item" style="height: 86px; padding-top: 24px;">
                <div class="exchange-sequence--item-circle" style="top: 38px;"></div><span>1 <span id="send" style="text-transform:uppercase;">BTC</span> &nbsp;~ <span id="ex_rate_for_one"><?php echo $res2["estimatedAmount"];?></span> <span id="get" style="text-transform:uppercase;">ETH</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tooltiped">Exchange rate (expected)</span></span>
            </li>
        </ul>
    
    <div class="row no-gutters"><div class="col-md-8 exchange-input exchange-input__dark">
            <div class="exchange-input__wrapper">
                <div class="exchange-input--title">You Get</div>
                <input type="text" value="<?php echo $res2["estimatedAmount"];?>" class="exchange-input--input form-control form-control-col" name="value2" id="you_get" readonly/>
                <div class="exchange-input--vertical"></div>
                <div class="exchange-input--loader" id="loaderr" style="display:none">
                    <div class="loader" id="loademrr" style="display:nonme">
                    </div>
    </div>                
            </div>
        </div>
	<div class="col-md-4">
	<select name="from" style="text-transform:uppercase;font-weight:500;" id="getselect" class="from form-control form-control-col" onchange="showExchangeVal(document.getElementById('sendselect').value,this.value,1.0); showExchange(document.getElementById('sendselect').value,this.value,document.getElementById('you_send').value); myget()">
    <?php
        foreach ($res as $currency){
            $currency     = get_object_vars($currency);
            ?>
            <option style="text-transform:uppercase; font-size:18px;" value="<?php echo $currency["ticker"]; ?>" data-imagesrc="<?php echo $currency["image"]; ?>"
            data-description="<?php echo $currency["name"]; ?>"><?php echo $currency["ticker"]; ?></option>
        <?php 
        }
        ?>
     </select></div>
	 </div>
    </div>
	<button type="submit" name="submitbtn" class="button button__long button__narrow">Exchange</button>
    </form>
	</div>
</div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Why Choose Us -->
    <section class="why-choose padding-top-100 padding-bottom-100" id="about">
      <div class="container"> 
        
        <!-- Why Choose Us  ROW-->
        <div class="row">
          <div class="col-md-7 margin-top-60"> 
            
            <!-- Tittle -->
            <div class="heading margin-bottom-20">
              <h6 class="margin-bottom-10">The world’s only enterprise blockchain solution for global payments</h6>
              <h4>Best Blockchain &amp; Better Than Any Blockchain</h4>
            </div>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
            <p>Cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
            <div class="ultra-ser"> <span><span class="name"> Webicode &nbsp; - &nbsp;</span> <span>Ceo/Founder Chain</span></span> </div>
            <a class="vid-btn margin-top-30 popup-youtube" href="#"><i class="fas fa-play-circle"></i> Watch Video <br>
            <span>How it work</span></a> </div>
          
          <!-- Image -->
          <div class="col-md-5 text-right"> <img src="images/chain-img.png" alt="Why Choose Us Image" > </div>
        </div>
        
        <!-- Services ROW -->
        <div class="row"> 
        
          
          <!-- Services -->
          <div class="col-md-4">
            <div class="ib-icon"> <i class="flaticon-smartphone"></i> </div>
            <div class="ib-info">
              <h4 class="h6">Peer-to-Peer Transactions</h4>
              <p>Contrary to popular belief , Lorem Ipsum is not simply random text. It has roots in a piece</p>
            </div>
          </div>
          
          <!-- Services -->
          <div class="col-md-4">
            <div class="ib-icon"> <i class="flaticon-flat-world-map"></i> </div>
            <div class="ib-info">
              <h4 class="h6">Borderless Payments</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem not simply random accusantium</p>
            </div>
          </div>
          
          <!-- Services -->
          <div class="col-md-4">
            <div class="ib-icon"> <i class="flaticon-secure-shield"></i> </div>
            <div class="ib-info">
              <h4 class="h6">Fully Protection</h4>
              <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece</p>
            </div>
          </div>
          
          <!-- Services -->
          <div class="col-md-4">
            <div class="ib-icon"> <i class="flaticon-credit-card"></i> </div>
            <div class="ib-info">
              <h4 class="h6">Smart Money</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
            </div>
          </div>
          
          <!-- Services -->
          <div class="col-md-4">
            <div class="ib-icon"> <i class="flaticon-wallet"></i> </div>
            <div class="ib-info">
              <h4 class="h6">Secure Wallet</h4>
              <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece</p>
            </div>
          </div>
          
          <!-- Services -->
          <div class="col-md-4">
            <div class="ib-icon"> <i class="flaticon-money"></i> </div>
            <div class="ib-info">
              <h4 class="h6">Easy To buy & Sell</h4>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Token Distribution -->
    <section class="distri padding-top-100 padding-bottom-100 light-bg" id="token">
      <div class="container">
        <div class="row"> 
          
          <!-- Token  -->
          <div class="col-lg-7">
                  <h3>Token Distribution</h3>
            <p>ICO Crypto token will be released on the basis of Ethereum and Bitocin platform. It’s compatibility of the token with third-party services wallets, exchanges etc, and provides easy-to-use integration.</p>
            
            <!-- Progress -->
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="150"><span>9,000,000 <small>50%</small></span> </div>
            </div>
            <div class="row">
              <div class="col">
                <h6> Now Distribution</h6>
                <span>2,000,000</span> </div>
              <div class="col">
                <h6> 99,910</h6>
                <span>ETH Received</span> </div>
              <div class="col">
                <h6> 99,910</h6>
                <span>BTC Received</span> </div>
            </div>
            
            <!-- CountdownEnd -->
            <div class="countdown">
              <h6>Current Distribution Section End  150/350</h6>
              <!-- Countdown-->
              <ul class="row">
                <!-- Days -->
                <li class="col-md-3">
                  <article> <span class="days">00</span>
                    <p class="days_ref">Days</p>
                  </article>
                </li>
                <!-- Hours -->
                <li class="col-md-3">
                  <article> <span class="hours">00</span>
                    <p class="hours_ref">Hours</p>
                  </article>
                </li>
                <!-- Mintes -->
                <li class="col-md-3">
                  <article><span class="minutes">00</span>
                    <p class="minutes_ref">Minutes</p>
                  </article>
                </li>
                <!-- Seconds -->
                <li class="col-md-3">
                  <article><span class="seconds">00</span>
                    <p class="seconds_ref">Seconds</p>
                  </article>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- Total Distribution -->
          <div class="col-lg-5">
            <h3>Total Distribution Section End <b>350/350</b></h3>
            <p>ICO Crypto token will be released on the basis of Ethereum and Bitocin platform.</p>
            <div class="countdown-all"> 
              
              <!-- Countdown -->
              <ul class="row">
                <!-- Days -->
                <li class="col-md-3">
                  <article> <span class="days">00</span>
                    <p class="days_ref">Days</p>
                  </article>
                </li>
                <!-- Hours -->
                <li class="col-md-3">
                  <article> <span class="hours">00</span>
                    <p class="hours_ref">Hours</p>
                  </article>
                </li>
                <!-- Mintes -->
                <li class="col-md-3">
                  <article><span class="minutes">00</span>
                    <p class="minutes_ref">Minutes</p>
                  </article>
                </li>
                <!-- Seconds -->
                <li class="col-md-3">
                  <article><span class="seconds">00</span>
                    <p class="seconds_ref">Seconds</p>
                  </article>
                </li>
              </ul>
              <a href="#." class="btn">Join Us</a> <a href="#." class="btn btn-inverse">Buy Now</a> 
              
              <!-- Buy Option -->
              <div class="card-info"> <i class="fab  fa-bitcoin"></i> <i class="fab  fa-cc-discover"></i> <i class="fab  fa-cc-visa"></i> <i class="fab  fa-cc-mastercard"></i> </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- ABOUT -->
    
    
    <!-- Development -->
    
    <!-- Road Map -->
    
    
    <!-- Team Members -->
    
    
    <!-- Join our community -->
    <section class="community-sec padding-top-100 padding-bottom-80">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="sm-intro">
              <h2>Join our community</h2>
              <ul class="socials">
                <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                <li><a href="#."><i class="fab fa-github"></i></a></li>
                <li><a href="#."><i class="fab fa-telegram"></i></a></li>
                <li><a href="#."><i class="fab fa-gitter"></i></a></li>
                <li><a href="#."><i class="fab fa-instagram"></i></a></li>
                <li><a href="#."><i class="fab fa-linkedin"></i></a></li>
                <li><a href="#."><i class="fab fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="news-letter">
              <h2>Subscribe to our newsletter</h2>
              <form>
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">SEND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <!-- Footer -->
  <footer id="contact">
    <div class="container">
      <div class="parthner">
        <h6>Partnered with Innovative Globally</h6>
        <ul>
          <li><a href="#."><img src="images/c-mg-1.png" alt=""></a></li>
          <li><a href="#."><img src="images/c-mg-2.png" alt=""></a></li>
          <li><a href="#."><img src="images/c-mg-3.png" alt=""></a></li>
          <li><a href="#."><img src="images/c-mg-1.png" alt=""></a></li>
          <li><a href="#."><img src="images/c-mg-2.png" alt=""></a></li>
          <li><a href="#."><img src="images/c-mg-3.png" alt=""></a></li>
          <li><a href="#."><img src="images/c-mg-1.png" alt=""></a></li>
          <li><a href="#."><img src="images/c-mg-2.png" alt=""></a></li>
        </ul>
      </div>
    </div>
    
    <!-- Rights -->
    <div class="rights">
      <div class="container">
        <div class="row">
          <div class="col">
            <p>© 2018 ICO Crypto BlockChain. All Rights Reserved. <a href="http://thefreemanlabs.com">freeman</a></p>
          </div>
          <div class="col text-right"> <a href="#.">Faqs </a> <a href="#.">How it works </a> <a href="#.">Contact Us</a> </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- GO TO TOP --> 
	<a href="#" class="cd-top"><i class="ion-chevron-up"></i></a> 
<!-- GO TO TOP End -->
    
    <!--php $res2 = $currencies ->exchangeAmount($to, $from, $value);?-->
<!--div><!--?php  $res2     = get_object_vars($res2); echo $res2['estimatedAmount'];?--></div-->

<!-- Script -->
<script type="text/javascript" src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/particles.min.js"></script> 
<script src="assets/js/jquery.counterup.min.js"></script> 
<script src="assets/js/jquery.sticky.js"></script> 
<script src="assets/js/jquery.magnific-popup.min.js"></script> 
<script src="assets/js/main.js"></script>

    <script>
    $(document).ready(function(){
    $('.to option:contains("btc")').prop('selected',true);
    $('.from option:contains("eth")').prop('selected',true);
});

</script>

</body>
</html>



