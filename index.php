<?php
require_once('common.php');

$page = new demo(pageid::MAIN, new index_page());
$page->generate();

?>
