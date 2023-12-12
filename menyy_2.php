<?php
function class_val($script_name) {
    if ($_SERVER["SCRIPT_NAME"] == "/veebirakendused/autoveod/" . $script_name) {
        echo "active";
    } else {
        echo "header_a";
    }
}
?>
<div class="header">
    <div class="logo_div"><a href="https://www.tthk.ee/" target="_blank"><img class="logo" alt="logo" src="auto_img/tthk_logo.img"></a></div>
    <a class="header_a" href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">Kaart</a>
    <a class="<?php class_val("juht.php"); ?>" href="juht.php">Juht ja auto</a>
    <a class="<?php class_val("tellimus.php"); ?>" href="tellimus.php">Tellimus</a>
    <a class="<?php class_val("autoveod.php"); ?>" href="autoveod.php">Autoveod</a>
</div>