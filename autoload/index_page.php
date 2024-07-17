<?php

final class index_page extends output
{
  public function generate_body()
  {
      readfile('templates/index.html');
  }
}

?>