<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="auto_img/favicon.ico">
    <link rel="stylesheet" href="css/tellimus.css">
    <title>Tellimus</title>
</head>
<body>
    <!-- <div class="header">
        <div class="logo_div"><a href="https://www.tthk.ee/" target="_blank"><img class="logo" alt="logo" src="auto_img/tthk_logo.img"></a></div>
        <a class="header_a" href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">Kaart</a>
        <a class="header_a" href="juht.php">Juht ja auto</a>
        <a class="active" href="tellimus.php">Tellimus</a>
        <a class="header_a" href="autoveod.php">Autoveod</a>
    </div> -->
    <?php include "menyy_2.php" ?>
    <h2>Tellimuse esitamine</h2>
    <div>
        <table>
            <tr>
                <td rowspan="2" style="background-color: brown;">
                    <div class="form_div">
                    <form action="db_connection.php" method="post">
                        <label for="alguspunkt">Alguspunkt</label><br>
                        <input type="text" id="alguspunkt" placeholder="Alguspunkt" name="alguspunkt" required title="Palun sisestage alguspunkt"><br>
                        <label for="sihtkoht">Sihtkoht</label><br>
                        <input type="text" id="sihtkoht" placeholder="Sihtkoht" name="sihtkoht" required title="Palun sisestage sihtkoht"><br>
                        <label for="aeg">Kuupäev</label><br>
                        <input type="date" id="aeg" placeholder="Kuupäev" name="aeg" required title="Palun sisestage kuupäev"><br>
                        <button type="submit" name="submit_tellimus">Kinnita</button>
                    </form>
                    </div> 
                </td>
                <td>
                    <a href="autoveod.php">
                        <img class="grid_pic" alt="Autoveod" src="auto_img/auto_10.jpg">
                        <div class="overlay">
                            <div class="text">Autoveod</div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="tellimus.php">
                        <img class="grid_pic" alt="Tellimus" src="auto_img/juht.jpg">
                        <div class="overlay">
                            <div class="text">Tellimus</div>
                        </div>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="juht.php">
                        <img class="grid_pic" alt="Juht" src="auto_img/juht_3.jpg">
                        <div class="overlay">
                            <div class="text">Juht ja auto</div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">
                        <img class="grid_pic" alt="Kaart" src="auto_img/kaart.jpg">
                        <div class="overlay">
                            <div class="text">Kaart</div>
                        </div>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>