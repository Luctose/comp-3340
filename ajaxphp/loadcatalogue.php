<?php
require_once('../common.php');
header('Content-Type: text/plain');

    try {
        // the following line connects to the db
        $db = new dbbook();

    //retrieves all book items from book db
    $items = ($db->lookup_all());;

    // encode the items as a json string
    $catalogue = json_encode($items);

    print_r($catalogue);
    } catch (Exception $e) {
        echo "Exception";
    }
    
?>
