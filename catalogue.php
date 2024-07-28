<?php
require_once('common.php');

$page = new demo(pageid::CATALOGUE, new catalogue_page(), array('css/book_catalogue.css'), array('js/cart.js','js/catalogue.js'));
$page->generate();

?>
