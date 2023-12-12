<?php 
log_($_SERVER["SCRIPT_NAME"]);
if ($_SERVER["SCRIPT_NAME"] == "/veebirakendused/autoveod/autoveod.php") {
    ?><div class="header">
    <div class="logo_div"><a href="https://www.tthk.ee/" target="_blank"><img class="logo" alt="logo" src="auto_img/tthk_logo.img"></a></div>
    <a class="header_a" href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">Kaart</a>
    <a class="header_a" href="juht.php">Juht ja auto</a>
    <a class="header_a" href="tellimus.php">Tellimus</a>
    <a class="active" href="autoveod.php">Autoveod</a>
</div>
<?php
}
elseif ($_SERVER["SCRIPT_NAME"] == "/veebirakendused/autoveod/tellimus.php") {
    ?><div class="header">
    <div class="logo_div"><a href="https://www.tthk.ee/" target="_blank"><img class="logo" alt="logo" src="auto_img/tthk_logo.img"></a></div>
    <a class="header_a" href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">Kaart</a>
    <a class="header_a" href="juht.php">Juht ja auto</a>
    <a class="active" href="tellimus.php">Tellimus</a>
    <a class="header_a" href="autoveod.php">Autoveod</a>
</div>
<?php
}
elseif ($_SERVER["SCRIPT_NAME"] == "/veebirakendused/autoveod/juht.php") {
    ?><div class="header">
    <div class="logo_div"><a href="https://www.tthk.ee/" target="_blank"><img class="logo" alt="logo" src="auto_img/tthk_logo.img"></a></div>
    <a class="header_a" href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">Kaart</a>
    <a class="active" href="juht.php">Juht ja auto</a>
    <a class="header_a" href="tellimus.php">Tellimus</a>
    <a class="header_a" href="autoveod.php">Autoveod</a>
</div>
<?php
}
else {echo "tüng!";}
?>
<!-- <div class="header">
        <div class="logo_div"><a href="https://www.tthk.ee/" target="_blank"><img class="logo" alt="logo" src="auto_img/tthk_logo.img"></a></div>
        <a class="header_a" href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">Kaart</a>
        <a class="active" href="juht.php">Juht ja auto</a>
        <a class="header_a" href="tellimus.php">Tellimus</a>
        <a class="header_a" href="autoveod.php">Autoveod</a>
    </div> -->

