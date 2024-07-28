<?php
header('Content-Type: application/json');
require_once('../common.php');
    try {
        $db = new dbcart();
        //check if required POST data is available
        if (isset($_POST['book_id']) && isset($_POST['quantity'])) {
            //get data
            $user_id = $_SESSION['user_id']; //unauthenticated users can't access shopping cart anyways
            $book_id = $_POST['book_id'];
            $quantity = $_POST['quantity'];
            
            if ($quantity < 0) {
                throw new Exception("Invalid quantity.");
            }
            //now do use the function created in dbcart
            $db->updateQty($user_id, $book_id, $quantity);
            $response = json_encode($quantity);

            print_r($response);
        }
    } catch (Exception $e) {
    }
   
    
?>
