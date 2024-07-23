<?php
require_once('common.php');
class header extends output
{
    protected function do_css_files_required()
    {
        return array('css/header.css');
    }

    public function generate_body()
    {
        global $CFG;
        readfile($CFG->base_url.'templates'.DIRECTORY_SEPARATOR.'header.html');
    }
}

?>
