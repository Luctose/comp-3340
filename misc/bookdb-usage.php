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
  /* added omar and badr's books from the ../templates/book_catalogue.html. */
  $db->insert('Game of Thrones', 'George R. R. Martin', '15.00', 'game_of_thrones.jpg');
  $db->insert('Harry Potter and the Order of the Phoenix', 'J K Rowling', '10.00', 'harry_potter_and_the_order_of_the_phoenix.jpg');
  $db->insert('The Hobbit', 'J.R.R. Tolkien', '14.99', 'the_hobbit.jpg');
  //$db->insert('The Fellowship Of The Ring', 'J.R.R. Tolkien', '8.99', 'the_fellowship_of_the_ring.jpg');
  $db->insert('Funny Story', 'Emily Henry', '24.99', 'funny_story.jpg');
  $db->insert('Master Your Mind and Defy the Odds', 'David Goggins', '26.99', 'master_your_mind_and_defy_the_odds.jpg');
  $db->insert('Unshackle Your Mind and Win the War Within', 'David Goggins', '21.99', 'unshackle_your_mind_and_win_the_war_within.jpg');
  //$db->insert('Texture Over Taste', 'Joshua Weissman', '18.34', 'texture_over_taste.jpg');

  echo "\nLookup All...\n";
  print_r($db->lookup_all());

  echo "Done.\n";
}
catch (Exception $e)
{
  echo "EXCEPTION: ".$e->getMessage()."\n";
  echo "IP: ".http_utils::get_client_ip_address()."\n";
}
?>
