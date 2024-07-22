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
            array_merge($css, array('css/menu.css', 'css/footer.css')),
            array(), # Add javascript same as css once it exists
            new demo_header(),
            new demo_midsection($content, array_merge($css, array('css/menu.css', 'css/footer.css')), $js, new menu(), new footer()),
            new demo_footer()
        );
    }
}

?>
