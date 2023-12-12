<?php include "db_connection.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="auto_img/favicon.ico">
    <link rel="stylesheet" href="css/juht.css">
    <title>Juht</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <!-- <div class="header">
        <div class="logo_div"><a href="https://www.tthk.ee/" target="_blank"><img class="logo" alt="logo" src="auto_img/tthk_logo.img"></a></div>
        <a class="header_a" href="https://www.google.com/maps/@59.411508,24.7061099,17z?entry=ttu" target="_blank">Kaart</a>
        <a class="active" href="juht.php">Juht ja auto</a>
        <a class="header_a" href="tellimus.php">Tellimus</a>
        <a class="header_a" href="autoveod.php">Autoveod</a>
    </div> -->
    <?php include "menyy_2.php" ?>
    <h2>Juht ja auto</h2>
    <div>
        <table>
            <tr>
                <td rowspan="2" style="background-color: brown;">
                    <div class="form_div">
                           
                            <script>
                                function updateStaatus(selectedTellimus) {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'staatus_ajax.php',
                                        data: { tellimus: selectedTellimus },
                                        success: function (response) {
                                            //$('#staatus').html(response);
                                            console.log(response)
                                            j = JSON.parse(response)
                                            // console.log(j["autojuhi FK"] + " " + j["auto registri FK"])
                                            console.log("autojuhi FK:", j["autojuhi FK"]);
                                            console.log("auto registri FK:", j["auto registri FK"]);
                                            console.log(typeof(j["auto registri FK"]));
                                            console.log(j["auto registri FK"] != null);
                                            console.log(j["auto registri FK"] !== null);

                                            if (j["autojuhi FK"] === null && j["auto registri FK"] !== null) {
                                                console.log("1");
                                                document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: Määramata" + "<br>Auto reg number: " + j["reg_number"];
                                            }
                                            else if (j["auto registri FK"] === null && j["autojuhi FK"] !== null) {
                                                console.log("2");
                                                document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: " + j["autojuhi_nimi"] + "<br>Auto reg number: Määramata";
                                            }
                                            else if (j["autojuhi FK"] === null && j["auto registri FK"] === null) {
                                                console.log("3");
                                                document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: Määramata" + "<br>Auto reg number: Määramata";
                                            }
                                            else {
                                                console.log("4");
                                                document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: " + j["autojuhi_nimi"] + "<br>Auto reg number: " + j["reg_number"];
                                            }
                                        },
                                        error: function (xhr, status, error) {
                                            console.error(xhr.responseText);
                                        }
                                    });
                                }
                                // function updateStaatus(selectedTellimus) {
                                //     var autojuhtValue = document.getElementById("autojuht").value;
                                //     var autoValue = document.getElementById("auto").value;

                                //     if (autojuhtValue === "Vali autojuht" || autoValue === "Vali auto") {
                                //         document.getElementById("tellimuse_info").innerHTML = "Palun vali autojuht ja auto.";
                                //     } else {
                                //         $.ajax({
                                //             type: 'POST',
                                //             url: 'staatus_ajax.php',
                                //             data: {
                                //                 tellimus: selectedTellimus,
                                //                 autojuht: autojuhtValue,
                                //                 auto: autoValue
                                //             },
                                //             success: function (response) {
                                //                 console.log(response);
                                //                 var j = JSON.parse(response);

                                //                 if (j["autojuhi FK"] === null) {
                                //                     document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: Määramata" + "<br>Auto reg number: " + j["reg_number"];
                                //                 } else if (j["auto registri FK"] === null) {
                                //                     document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: " + j["autojuhi_nimi"] + "<br>Auto reg number: Määramata";
                                //                 } else if (j["autojuhi FK"] === null && j["auto registri FK"] === null) {
                                //                     document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: Määramata" + "<br>Auto reg number: Määramata";
                                //                 } else {
                                //                     document.getElementById("tellimuse_info").innerHTML = "Autojuhi nimi: " + j["autojuhi_nimi"] + "<br>Auto reg number: " + j["reg_number"];
                                //                 }
                                //             },
                                //             error: function (xhr, status, error) {
                                //                 console.error(xhr.responseText);
                                //             }
                                //         });
                                //     }
                                // }

                            </script>
                    
                    <form action="db_connection.php" method="post">
                        <label for="tellimus">Tellimus</label><br>
                        <select id="tellimus" name="tellimus" required onchange="updateStaatus(this.value)" >
                                <option value="null" selected>Vali tellimus</option>
                            <?php 
                                $tellimus_query = "select * from tellimus";
                                $tellimus = mysqli_query($yhendus, $tellimus_query);
                                while ($t = mysqli_fetch_array($tellimus)) {
                            ?>
                           <option value="<?php echo $t['id'] ?>">
                                    <?php echo "Tellimus nr. " .$t['id']?>
                           </option><?php } ?>
                        </select><br>
                        <label for="tellimuse_info">Tellimuse info</label><br>
                            <output id="tellimuse_info" name="tellimuse_info"></output><br>
                        <label for="autojuht">Autojuht</label><br>
                        <select id="autojuht" name="autojuht" required>
                            <?php
                                $autojuhid_query = "select * from autojuhid where staatus = 1";
                                $autojuhid = mysqli_query($yhendus, $autojuhid_query);
                                while ($a = mysqli_fetch_array($autojuhid)) {
                            ?>
                            <option value="<?php echo $a['id']; log_($a['id']); ?>">
                                    <?php echo $a['autojuhi_nimi'] ?>
                            </option>
                            <?php } ?>
                        </select><br>
                        <label for="auto">Auto</label><br>
                        <select id="auto" name="auto" required>
                            <?php
                                $autod_query = "select * from autod where staatus = 1";
                                $autod = mysqli_query($yhendus, $autod_query);
                                while ($a = mysqli_fetch_array($autod)) {
                            ?>
                                <option value="<?php echo $a['id'] ?>">Auto reg. <?php echo $a['reg_number'] ?></option>
                            <?php } ?>
                        </select><br>
                        <!-- <label for="staatus">Staatus</label><br>
                            <select id="staatus" name="staatus">
                            </select><br> -->   
                        <button type="submit" name="submit_juht">Kinnita tellimus</button><br>
                        <button type="submit" name="tellimuse_lopp">Lõpeta tellimus</button>
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
