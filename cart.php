<?php
require_once('common.php');

$page = new demo(pageid::CART, new cart_page(), array('css/mainstyle.css'), array());
$page->generate();

?>
