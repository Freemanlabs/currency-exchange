<?php
    //require ('min.php');
   
?>
    <!DOCTYPE html>
    <html lang="en">
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
<link href="assets/css/fontawesome/css/font-awesome.min.css" rel="stylesheet">

<!-- JavaScripts -->
<script src="assets/js/modernizr.js"></script>

<!-- Online Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
<link href="fonts/all.css" rel="stylesheet">    

<script>
    function confirmation() {
    document.getElementById("sendrow").style.display = "none";
    document.getElementById("cnfmrow").style.display = "block";

    var a = document.getElementById("sendselect").value;
    document.getElementById("send").innerHTML = a;
    document.getElementById("send2").innerHTML = a;

    var b = document.getElementById("you_send").value;
    document.getElementById("sendval").innerHTML = b;
    document.getElementById("sendval2").innerHTML = b;

    var c = document.getElementById("getselect").value;
    document.getElementById("get").innerHTML = c
    document.getElementById("get2").innerHTML = c

    var d = document.getElementById("you_get").value;
    document.getElementById("getval").innerHTML = d
    document.getElementById("getval2").innerHTML = d;

    var e = document.getElementById("address").value;
    document.getElementById("getaddr").innerHTML = e;
}
</script>
<script>
    function myget() {
    var y = document.getElementById("getselect").value;
    document.getElementById("get").innerHTML = y

    var z = document.getElementById("you_get").value;
    document.getElementById("getval").innerHTML = z;
    //return x;
}
</script>
<script>
    function address() {
        var y = document.getElementById("getselect").value;
        var z = y.toUpperCase();
        document.getElementById("address").placeholder = "Enter the recipient's " +z+ " address";
    //return x;
}
</script>
<script>
    function addrbtn() {
        if(document.getElementById("address").value == ''){
            document.getElementById("addrbtn").disabled = true;
        }
        else {
            document.getElementById("addrbtn").disabled = false;
        }
    //return x;
}
</script>
<script>
    function addrbtn2() {
            document.getElementById("addrbtn").disabled = true;
    //return x;
}
</script>
<script>
    function openModal() {
        document.getElementById('loaderr2').style.display = 'block';
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
        document.getElementById('loaderr2').style.display = 'none';
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
    } 
    else {
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
function showMin(to,from,value) {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("minamount").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "min.php?q="+to + "&r="+from + "&s="+value, true);
        xmlhttp.send();
}
</script>
    </head>

    <body>
        <div class="exchange exchange__fullwidth container content">	
<div class="row" id="sendrow">
    <div class="col-md-12 col-md-offset-1">
        <div id="exchange-stepper" data-amount="1" data-from="btc" data-to="eth">
            <div>
                <div class="steps" style="display: flex; flex-direction: column; place-content: center space-between; align-items: stretch;">
						<div stymle="text-align:center"><div stbyle="display:inline-block">
						<ul class="progressbar">
							<li class="active exchange-input--title">Send To</li>
							<li class="exchange-input--title">Confirmation</li>
							<li class="exchange-input--title">Sending</li>
							<li class="exchange-input--title">Sending</li>
						</ul></div></div>
					<fieldset>
    <div style="position: relative; overflow: hidden; height: auto;">
                                <div style="position: relative; height: auto; width: 100%; top: 0px; left: 0px; overflow: hidden; transition: height 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
                                    <div>
                                        <div style="overflow: hidden;">
                                        <div class="exchange--step exchange--step__two">
                                                <div class="exchange-form exchange-form__light">
                                                <div id="minamount"></div>
                                                <div class="row no-gutters"> <div class=" col-md-8 exchange-input exchange-input__light">
                                                        <div class="exchange-input__wrapper">
                                                            <div class="exchange-input--title">You Send</div>
                                                                <input type="text" value="1" class="exchange-input--input form-control form-control-col" name="value" id="you_send" oninput="showMin(document.getElementById('sendselect').value,document.getElementById('getselect').value,this.value); showExchange(document.getElementById('sendselect').value,document.getElementById('getselect').value,this.value)"/>
                                                                <div class="exchange-input--vertical"></div> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select id="sendselect" style="text-transform:uppercase; font-weight:500;" name="to" class="to form-control form-control-col selmectpicker" data-live-search="true" onchange="showMin(this.value,document.getElementById('getselect').value,document.getElementById('you_send').value); showExchange(this.value,document.getElementById('getselect').value,document.getElementById('you_send').value)">
                                                            <?php
                                                                foreach ($res as $currency){
                                                                    $currency     = get_object_vars($currency); ?>
                                                                    <option style="text-transform:uppercase; font-size:18px;" value="<?php echo $currency["ticker"]; ?>" data-icon="<?php echo $currency["image"]; ?>" data-subtext="<?php echo $currency["name"]; ?>"><?php echo $currency["ticker"]; ?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                            </select></div>
                                                </div>
                                                    <div class="exchange--centerArrow">
                                                        <div class="exchange--swap-icon exchange-input-swap-icon" id="swap">
                                                            <div class="svg-sprite--exchange-arrows"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row no-gutters"> <div class=" col-md-8 exchange-input exchange-input__light">
                                                        <div class="exchange-input__wrapper">
                                                            <div class="exchange-input--title">You Get</div>
                                                                <input type="text" value="<?php echo $res2["estimatedAmount"];?>" class="exchange-input--input form-control form-control-col" name="value2" id="you_get" readonly/>
                                                                    <div class="exchange-input--vertical"></div>
                                                                    <div class="exchange-input--loader" id="loaderr2" style="display:none">
                                                                        <div class="loader" id="loademrr" style="display:nonme">
                                                                        </div>
                                                            </div>                 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                    <select name="from" style="text-transform:uppercase;font-weight:500;" id="getselect" class="from form-control form-control-col sel" onchange="showExchange(document.getElementById('sendselect').value,this.value,document.getElementById('you_send').value); address()">
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
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="exchange--inputAddressWrapper col-md-10" style="display:inline-block;">
                                                    <div class="field field__inline">
                                                        <input type="text" id="address" class="exchange--input" placeholder="Enter the recipient's ETH address" name="destination" value="" oninput="addrbtn()">
                                                        
                                                    </div>
                                                    <!--ul class="sequence">
                                                        <li class="sequence--item sequence--item__iconed sequence--item__active sequence--item__visible"><span class="sequence--item-icon" style="left: -29px; top: -2px;"><img src="../images/up-down.svg" style="background-color: rgb(246, 244, 248); z-index: 1; position: relative;"></span><span class="sequence--item-name">Don't have wallet yet?</span>
                                                            <div class="sequence--item-content"></div>
                                                        </li>
                                                    </ul-->
                                                </div>
												<button class="next button btn-inverse"  name="next" id="addrbtn">Next</button>
  </fieldset>
  <fieldset>
    <div style="position: relative; overflow: hidden; height: auto;">
                                <div style="position: relative; height: auto; width: 100%; top: 0px; left: 0px; overflow: hidden; transition: height 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
                                    <div>
                                        <div style="overflow: hidden;">
                                            <div class="exchange--step exchange--step__three">
                                                <table class="exchange--table">
                                                    <tbody>
                                                        <tr >
															<td>You Send</td></div>
                                                            <td><span id="sendval" style="text-transform:uppercase;">1</span> <span id="send" style="text-transform:uppercase;">BTC</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>You Get</td>
                                                            <td>≈ <span id="getval" style="text-transform:uppercase;">0.0308051</span> <span id="get" style="text-transform:uppercase;">ETH</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Recipient Address</td>
                                                            <td class="address-text"><span id="getaddr">14BZW1C1AYSKVYCkHkAf8noyqreCgFmhKu</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="extra">Exchange Rate</td>
                                                            <td><span id="sendval2" style="text-transform:uppercase;">1</span> <span id="send2" style="text-transform:uppercase;">BTC</span>&nbsp; ≈ <span id="getval2" style="text-transform:uppercase;">0.0308051</span> <span id="get2" style="text-transform:uppercase;">ETH</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="extra">Estimated Arrival</td>
                                                            <td>≈ 10 minutes - 1 hour</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="fancy-checkbox custom-bgcolor-yellow">
                                        <label><input type="checkbox"><span>I've read and agree to the ChangeNOW&nbsp;
                                                            <a href="https://changenow.io/terms-of-use" target="_blank">Terms of Use</a>&nbsp;and&nbsp;
                                                            <a href="https://changenow.io/privacy-policy" target="_blank">Privacy Policy</a>
															</span></label>
                                    </div>
												<button class="previous button btn-inverse" name="previous">Back</button>
                                                    <button class="next button btn-inverse" name="next">Confirm</button>
  </fieldset>
  <fieldset>
    <div style="position: relative; overflow: hidden; height: auto;">
                                <div style="position: relative; height: auto; width: 100%; top: 0px; left: 0px; overflow: hidden; transition: height 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
                                    <div>
                                        <div style="overflow: hidden;">
                                            <div class="exchange--step exchange--step__four">
                                                <div>
                                                    <div class="exchange--sending">
                                                        <div class="row">
														<div class="col-md-3">
														<div class="qrcode">
                                                            <canvas height="296" width="296" style="height: 296px; width: 296px;"></canvas>
                                                        </div>
														</div>
														<div class="col-md-9">
                                                        <div class="info">
                                                            <div class="box">
                                                                <dl><dt>Send</dt>
                                                                    <dd>1 ETH</dd>
                                                                </dl>
                                                                <dl><dt>To</dt>
                                                                    <dd><strong class="address-text">0xE44FaFfdb50xE44FaFfdb50xE44FaFfdb50xE44FaFfdb577F2B5a19A34533DA88E98080Fd469</strong>
                                                                        <dl></dl>
                                                                    </dd>
                                                                </dl>
                                                            </div>
                                                            <div class="box">
                                                                <dl><dt>You will recieve</dt>
                                                                    <dd>~ 0.0308251 BTC</dd>
                                                                </dl>
                                                                <dl><dt>To</dt>
                                                                    <dd class="address-text">14BZW1C1AYSKVYCkHkAf8noyqreCgFmhKu</dd>
                                                                </dl>
                                                            </div>
                                                        </div></div></div>
                                                    </div>
                                                    <div class="exchange--status">
                                                        <div class="exchange--state exchange--state__active">
                                                            <div class="icon">
                                                                <div class="waiting-deposit"></div>
                                                            </div>
                                                            <div class="label">Awaiting payment</div>
                                                            <div class="connection"></div>
                                                        </div>
                                                        <div class="exchange--state ">
                                                            <div class="icon">
                                                                <div class="waiting-exchange"></div>
                                                            </div>
                                                            <div class="label">Waiting for exchange</div>
                                                            <div class="connection"></div>
                                                        </div>
                                                        <div class="exchange--state ">
                                                            <div class="icon">
                                                                <div class="finished"></div>
                                                            </div>
                                                            <div class="label">Sent to your wallet</div>
                                                        </div>
                                                    </div>
													<div class="status" style="text-align:center;">
													<div clmass="exchange--status" style="display:inline-block;">
                                                        <div class="exchange--state2 exchange--state__active2">
                                                            <div class="icon">
                                                                <div class="waiting-deposit"></div>
                                                            </div>
                                                            <div class="label">Awaiting payment</div>
                                                            <div class="connection"></div>
                                                        </div>
                                                        <div class="exchange--state2 ">
                                                            <div class="icon">
                                                                <div class="waiting-exchange"></div>
                                                            </div>
                                                            <div class="label">Waiting for exchange</div>
                                                            <div class="connection"></div>
                                                        </div>
                                                        <div class="exchange--state2 ">
                                                            <div class="icon">
                                                                <div class="finished"></div>
                                                            </div>
                                                            <div class="label">Sent to your wallet</div>
                                                        </div>
                                                    </div></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="subscription-block">
                                                    <div class="subscription-block--text">
                                                        <p>Thank you for using <span>ChangeNOW</span>, a non-custodial service for fast coin swaps.</p>
                                                        <p>Your coins are on the way to your wallet! Please, provide your email address and we’ll notify you once your funds reach your wallet. Thanks!</p>
                                                    </div>
                                                    <div class="subscription-block--form" >
                                                        <div class="subscription-form" style="display:inline-block;">
                                                            <input type="text" placeholder="Email" value="">
                                                        </div>
                                                    </div>
                                                </div>
												<button class="submit button" name="submit" style="float:left;">Confirm</button>
  </fieldset>
                </div>
            </div>
        </div>
    </div>
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
            <p>© 2018 ICO Crypto BlockChain. All Rights Reserved. freeman</p>
          </div>
          <div class="col text-right"> <a href="#.">Faqs </a> <a href="#.">How it works </a> <a href="#.">Contact Us</a> </div>
        </div>
      </div>
    </div>

<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap-select.js"></script>
<script src="assets/js/particles.min.js"></script> 
<script src="assets/js/jquery.counterup.min.js"></script> 
<script src="assets/js/jquery.sticky.js"></script> 
<script src="assets/js/jquery.magnific-popup.min.js"></script> 
<script src="assets/js/jquery.easing.min.js"></script> 
<script src="assets/js/main.js"></script>
<script src="assets/js/index.js"></script>

<script>
    $(document).ready(function(){
    $('.to option:contains("btc")').prop('selected',true);
    $('.from option:contains("eth")').prop('selected',true);
});
</script>

<script>
    $("#swap").click(function (e){
        e.preventDefault();

        var sendval = $("#sendselect option:selected").val();
        var sendtext = $("#sendselect option:selected").text();
        var getval = $("#getselect option:selected").val();
        var gettext = $("#getselect option:selected").text();

        var val = $("#you_send").val();

        $("#sendselect option:selected").val(getval);
        $("#sendselect option:selected").text(gettext);
        $("#getselect option:selected").val(sendval);
        $("#getselect option:selected").text(sendtext);

        var nsendval = $("#sendselect option:selected").val();
        var ngetval = $("#getselect option:selected").val();

        address()
        showMin(nsendval,ngetval,val);
        showExchange(nsendval,ngetval,val);
        
    });
</script>

</body>
</html>