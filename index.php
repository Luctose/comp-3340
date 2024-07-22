<?php
require_once('common.php');

$page = new demo(pageid::MAIN, new index_page(), array('css/mainstyle.css'), array());
$page->generate();

?>
