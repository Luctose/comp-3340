<?php
require_once('common.php');
final class footer extends output
{
  protected function do_css_files_required()
    {
        return array('css/footer.css');
    }

  public function generate_body()
  {
      global $CFG;
      readfile($CFG->base_url.'templates'.DIRECTORY_SEPARATOR.'footer.html');
  }
}

?>