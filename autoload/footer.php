<?php
require_once('common.php');
final class footer extends output
{
  public function generate_body()
  {
      global $CFG;
      readfile($CFG->base_url.'templates'.DIRECTORY_SEPARATOR.'footer.html');
  }
}

?>