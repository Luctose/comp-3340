<?php
require_once('../common.php');

header('Content-Type: text/plain');
try
{
  echo "Creating users DB...\n";
  $db = new dbbook();
  $db->admin_create_db();
  echo "Finished creating DB.\n";
}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage()."\n";
  echo "IP: ".http_utils::get_client_ip_address()."\n";
}
?>
