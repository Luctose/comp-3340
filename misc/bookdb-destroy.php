<?php
require_once('../common.php');

header('Content-Type: text/plain');
try
{
  echo "Destroying users DB...\n";
  $db = new dbbook();
  $db->admin_destroy_db();
  echo "Finished destroying DB.\n";
}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage()."\n";
  echo "IP: ".http_utils::get_client_ip_address()."\n";
}
?>
