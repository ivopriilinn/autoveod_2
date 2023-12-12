<?php
require($_SERVER["DOCUMENT_ROOT"]."/config.php");
global $yhendus;
?>
<?php
        function log_($logtext) {
            file_put_contents("test.log",date("d.m.y h:i:s") . " " . $logtext . PHP_EOL, FILE_APPEND);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_tellimus"])) {
            $sql_tellimus = "INSERT INTO  tellimus (alguspunkt, sihtkoht, kuupaev, staatus) VALUES ('" . $_POST["alguspunkt"] . "', '" . $_POST["sihtkoht"] . "', '" . $_POST["aeg"] . "', '" . 1 . "')";
            if ($yhendus->query($sql_tellimus) === TRUE) {
                header("Location: tellimus.php?tellimus=esitatud");
            } else {
                echo "Error: " . $sql_tellimus . "<br>" . $yhendus->error;
            }
        }

        else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_juht"])) {
            $sql_autojuhid = "UPDATE autojuhid SET staatus = 0 where id = " . $_POST["autojuht"];
            $sql_autod = "UPDATE autod SET staatus = 0 where id = " . $_POST["auto"];
            $sql_tellimuse_vormistamine = "UPDATE tellimus SET `autojuhi FK` =" . $_POST["autojuht"] . ", `auto registri FK` =" .  $_POST["auto"] . " where id =" . $_POST["tellimus"];
            // $sql_tellimuse_vormistamine = "UPDATE tellimus SET `autojuhi FK` = " . ($j["autojuhi FK"] ? "'" . $j["autojuhi FK"] . "'" : "NULL") . ", `auto registri FK` = " . ($j["auto registri FK"] ? "'" . $j["auto registri FK"] . "'" : "NULL") . " WHERE id = " . $_POST["tellimus"];


            log_($sql_autojuhid);
            log_($sql_autod);
            log_($sql_tellimuse_vormistamine);


            if ($yhendus->query($sql_autojuhid) === TRUE && $yhendus->query($sql_autod) === TRUE && $yhendus->query($sql_tellimuse_vormistamine) === TRUE) {
                header("Location: juht.php?auto_ja_juht=lisatud");
            } else {
                echo "Error: " . $sql_autojuhid . " or " . $sql_autod . "<br>" . $yhendus->error;
            }
        }

        else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tellimuse_lopp"])) {
            $sql_tellimus_FK = "select `autojuhi FK`, `auto registri FK` from tellimus where id = " . $_POST["tellimus"];
            $tellimuse_rida = mysqli_fetch_array(mysqli_query($yhendus, $sql_tellimus_FK));
           
            if (isset($tellimuse_rida["autojuhi FK"])) {
                $sql_vabasta_juht = "UPDATE autojuhid SET staatus = 1 where id = " . $tellimuse_rida["autojuhi FK"];
                log_($sql_vabasta_juht);
                $yhendus->query($sql_vabasta_juht);
            }
            
            if (isset($tellimuse_rida["auto registri FK"])) {
                $sql_vabasta_auto = "UPDATE autod SET staatus = 1 where id = " . $tellimuse_rida["auto registri FK"];
                log_($sql_vabasta_auto);
                $yhendus->query($sql_vabasta_auto);
            }
            
            $sql_tellimus_lopp = "DELETE from tellimus where id = " . $_POST["tellimus"];
            log_($sql_tellimus_lopp);           
            $yhendus->query($sql_tellimus_lopp);

            header("Location: juht.php?auto_ja_juht=lisatud");
        }
?> 