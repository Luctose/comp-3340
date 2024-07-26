<?php
require_once("../common.php");
header('Content-type: text/plain');

$name = $_SESSION['who_is_logged_in'];

echo "Logged in as $name";
?>