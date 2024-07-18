<?php

class demo extends html5hmflayout
{
    protected output $content;

    public function __construct($pageID, output $content, $css, $js)
    {
        # If the current page is invalid, then redirect to main page...
        #pageid::if_invalid_redirect_to_pageid(pageid::MAIN);
        pageid::set_current_pageid($pageID);

        $this->content = $content;

        parent::__construct(
            pageid::get_title($pageID),
            array('css/mainstyle.css', 'css/menu.css'),
            array(),
            new demo_header(),
            new demo_midsection($content, $css, $js, new menu()),
            new demo_footer()
        );
    }
}

?>
