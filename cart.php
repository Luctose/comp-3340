<?php
require_once('common.php');

// redirect to login.php if the user is not logged in. Access to cart it blocked.
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: index.php');
    exit();
} else {
    $page = new demo(pageid::CART, new cart_page(), array('css/cart.css'), array('js/cart.js'));
    $page->generate();
}

?>
