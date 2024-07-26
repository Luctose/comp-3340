<?php
require_once('common.php');

$page = new demo(pageid::CONTACT, new contact_page(), array('css/contact.css'), array());
$page->generate();

?>
