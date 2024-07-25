<?php
require_once('common.php');
final class menu extends output
{
  public function generate_body()
  {
      global $CFG;

      if (loginout::is_logged_in())
      {
        readfile($CFG->base_url.'templates'.DIRECTORY_SEPARATOR.'menu2.html');
      }else
      {
        readfile($CFG->base_url.'templates'.DIRECTORY_SEPARATOR.'menu.html');
      }
  }
}

?>