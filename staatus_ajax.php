<?php
include "db_connection.php";

if (isset($_POST['tellimus'])) {
    $selectedTellimus = $_POST['tellimus'];
    $staatus_query = 
            "SELECT t.*, a.autojuhi_nimi, r.reg_number 
        FROM tellimus t
        left join autojuhid a on a.id = t.`autojuhi FK`
        left join autod r on r.id = t.`auto registri FK`
        WHERE t.id = " . $selectedTellimus;
    // $staatus_query = "SELECT t.id, a.autojuhi_nimi, r.reg_number 
    //               FROM tellimus t
    //               JOIN autojuhid a ON a.id = t.`autojuhi FK`
    //               JOIN autod r ON r.id = t.`auto registri FK`
    //               WHERE t.id = " . $selectedTellimus . "
    //               AND a.id IS NOT NULL
    //               AND r.id IS NOT NULL";
    
    echo json_encode(mysqli_fetch_array(mysqli_query($yhendus, $staatus_query)));
    // $staatus_result = mysqli_query($yhendus, $staatus_query);

    // if (!$staatus_result) {
    //     die("Query failed: " . mysqli_error($yhendus));
    // }

    // $staatus_options = '';
    // while ($s = mysqli_fetch_array($staatus_result)) {
    //     $staatus_options .= '<option value="' . $s['staatus'] . '">' . ($s['staatus'] == 1 ? "Tellimus täitmisel" : "Tellimus täidetud") . '</option>';
    // }

    // echo $staatus_options;
} else {
    echo "Tellimus not set!";
}

?>
