<?php
require_once('common.php');
final class contact_page extends output
{
  public function generate_body()
  {
      global $CFG;
      readfile($CFG->base_url.'templates'.DIRECTORY_SEPARATOR.'contact_page.html');
  }
}

?>