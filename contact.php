<?php
require_once('common.php');

$page = new demo(pageid::CONTACT, new contact_page(), array('css/mainstyle.css'), array());
$page->generate();

?>
