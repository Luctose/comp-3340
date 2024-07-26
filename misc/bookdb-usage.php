<?php
require_once('../common.php');

header('Content-Type: text/plain');
try
{
  echo "Connecting to DB...\n";
  $db = new dbbook();

  echo "Adding some books...\n";
  $db->insert('To Kill a Mockingbird', 'Harper Lee', '10.99','tkam.jpg');
  $db->insert('1984', 'George Orwell', '9.99', '1984.jpg');
  $db->insert('The Great Gatsby', 'F. Scott Fitzgerald', '8.99', 'the_great_gatsby.jpg');

  echo "\nLookup All...\n";
  print_r($db->lookup_all());

  echo "Lookup...\n";
  print_r($db->lookup('1984'));

  //echo "3. Erasing john...\n";
  //$db->erase('john');

  //echo "Lookup All...\n";
  //print_r($db->lookup_all());

  //echo "4. Checking john with incorrect password... ";
  //echo $db->check_user_pass('john','abc123') ? 'FAIL' : 'PASS';

  //echo "\n5. Checking john with old correct password... ";
  //echo $db->check_user_pass('john','hd834h8irtj9') ? 'FAIL' : 'PASS';

  //echo "\n6. Erasing suzy...\n";
  //$db->erase('suzy');

  echo "Done.\n";
}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage()."\n";
  echo "IP: ".http_utils::get_client_ip_address()."\n";
}
?>
