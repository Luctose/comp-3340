<?php

class demo_midsection extends output
{
    private $css;
    private $js;
    private $content;
    private $menu;
    private $footer;
    private $has_menu;
    private $has_footer;

    public function __construct(
        output $content = new no_output(),
        $css = array(),
        $js = array(),
        output $menu = null,
        output $footer = null
    )
    {
        if (is_array($css))
          $this->css = $css;
        elseif (is_string($css))
          $this->css = array($css);
        else
          $this->css = array();

        if (is_array($js))
          $this->js = $js;
        elseif (is_string($js))
          $this->js = array($js);
        else
            $this->js = array();

        $this->content = $content;
        $this->menu = $menu;
        $this->footer = $footer;

        $this->has_menu = ($menu !== NULL);
        if ($this->has_menu === false)
            $this->menu = new no_output();
        
        $this->has_footer = ($footer !== NULL);
        if ($this->has_footer === false)
            $this->footer = new no_output();
    }

  protected function do_css_files_required()
  {
    return
      array_unique(
        array_merge(
          $this->menu->css_files_required(),
          $this->footer->css_files_required(),
          $this->content->css_files_required(),
          $this->css
        )
      )
    ;
  }

  protected function do_js_files_required()
  {
    return
      array_unique(
        array_merge(
          $this->menu->js_files_required(),
          $this->footer->js_files_required(),
          $this->content->js_files_required(),
          $this->js
        )
      )
    ;
  }

  public function generate_body()
  {
    if ($this->has_menu)
    {
      echo "\n<div id='menu'>\n";
      $this->menu->generate();
      echo "\n</div>";
    }

    echo "\n<div id='content'>\n";
    $this->content->generate();
    echo "\n</div>\n";

    if ($this->has_footer)
    {
      echo "\n<div id='footer'>\n";
      $this->footer->generate();
      echo "\n</div>";
    }
  }
}

?>
