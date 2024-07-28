<?php
header('Content-Type: application/json');
require_once('../common.php');

    try {
        // the following line connects to the dbc
        $dbc = new dbcart();
        $dbb = new dbbook();
        $cart;
        if(loginout::is_logged_in()){
            //retrieves all cart items from user_id of the current session
            //stored in $items
            $items = ($dbc->lookup($_SESSION['user_id']));

            //ensure $items is an array
        if (is_array($items)) {
            //add book details to each item
            foreach ($items as &$item) {
                $bookId = $item['book_id'];
                $bookDetails = $dbb->getById($bookId);
                // add the book details to the item
                $item['book_details'] = $bookDetails;
            }

            // encode the items as a JSON string
            $cart = json_encode($items);
        } else {
            // handle the case where $items is not an array
            $cart = json_encode([]);
        }
        } else 
        {
            //an empty array if not logged in
            $items = ($dbc->lookup_all());
        }

            // Output the JSON-encoded items
            print_r($cart);
        
    } catch (Exception $e) {
        echo "Exception";
    }
?>
