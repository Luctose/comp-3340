<?php
require_once('common.php');

$page = new demo(pageid::CART, new cart_page(), array('css/cart.css'), array('js/cart.js'));
$page->generate();

?>
