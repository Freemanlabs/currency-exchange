<?php 
$btn = isset($_POST['btn']);
if (isset($_POST['submit'])){

if ($_POST['val'] < 3){
    echo '<div id="result">.less than three.</div>';
}
else{
    echo '';
}

}
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/js/bootstrap.min.js" rel="stylesheet">
<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>

<script>
function l(){
//document.getElementById("btn").disabled = true;

if (document.getElementById("result").style.display == "block"){
    document.getElementById("btn").disabled = true;
}
}
</script>
</head>

<body onloamd="l()">
    <form action=""method="post">
    <input type="text" name="val" id="val">
    <button type="submit" name="submit" >submit</button>
    <button id="btn" name="btn" <?php $btn ? '' : 'disabled'; ?>>next</button>
    </form>

    
    
</body>
</html>