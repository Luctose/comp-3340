<?php

class demo extends html5hmflayout
{
    protected output $content;

    public function __construct($pageID, output $content)
    {
        # If the current page is invalid, then redirect to main page...
        pageid::if_invalid_redirect_to_pageid(pageid::MAIN);
        pageid::set_current_pageid($pageID);

        $this->content = $content;

        parent::__construct(
            pageid::get_title($pageID),
            array('css/mainstyle.css'),
            array(),
            new demo_header(),
            new demo_midsection($content, array('css/mainstyle.css')),
            new demo_footer()
        );
    }
}

?>
