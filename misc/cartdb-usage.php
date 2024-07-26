<?php
require_once('../common.php');

header('Content-Type: text/plain');
try
{
  echo "Connecting to DB...\n";
  $db = new dbcart();

  echo "Adding some books...\n";
  $db->insert('1', '2', '2'); // user_id, book_id, quantity of books
  $db->insert('1', '3', '1');
  $db->insert('2', '1', '49'); // suzy loves this book. yup.
  echo "\nLookup All...\n";
  print_r($db->lookup_all());

  echo "3. Erasing row. john :(...\n";
  $db->eraseRow('1', '2');
  echo "Lookup...\n";
  print_r($db->lookup('1')); // user_id

  echo "4. Erase John... \n";
  echo $db->eraseUser('1');
  echo "Lookup All...\n";
  print_r($db->lookup_all());

  echo "5. Adding items...\n";
  $db->insert('1', '1', '1');
  $db->insert('2', '3', '1');
  echo "Lookup All...\n";
  print_r($db->lookup_all());

  echo "6. Erase Book with same id... \n";
  echo $db->eraseBook('1');
  echo "Lookup All...\n";
  print_r($db->lookup_all());

  echo "7. Adding more items\n";
  $db->insert('1', '3', '1');
  $db->insert('2', '1', '49'); // suzy loves this book. yup.
  echo "Done.\n";
}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage()."\n";
  echo "IP: ".http_utils::get_client_ip_address()."\n";
}
?>
