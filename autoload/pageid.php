<?php

final class pageid
{
    public const INVALID = 0;
    public const MAIN = 1;
    public const CART = 2;
    public const CONTACT = 3;
    public const CATALOGUE = 4;

    public static function is_valid($pageID)
    {
        switch ($pageID)
        {
            default:                        return FALSE;
            case self::MAIN:                return TRUE;
            case self::CART:               return TRUE;
            case self::CONTACT:             return TRUE;
            case self::CATALOGUE:           return TRUE;
            
        }
    }

    public static function get_full_url($pageID)
    {
        global $CFG;

        $prefix = http_utils::get_site_base_url();
        switch ($pageID)
        {
            default:                        return $prefix;
            case self::MAIN:                return $prefix;
            case self::CART:               return $prefix.'/cart.php';
            case self::CONTACT:             return $prefix.'/contact.php';
            case self::CATALOGUE:           return $prefix.'/catalogue.php';
        }
    }

    public static function get_title($pageID)
    {
        switch ($pageID)
        {
            case self::MAIN:                return 'Books Books Books';
            case self::CART:               return 'Shopping Cart';
            case self::CONTACT:             return 'Contact Page';
            case self::CATALOGUE:           return 'Book Catalogue';
            default:                        return 'Invalid';
        }
    }

    public static function get_current_pageid()
    {
        if (!isset($_SESSION['current-page']))
            $_SESSION['current-page'] = self::INVALID;
        return $_SESSION['current-page'];
    }

    public static function set_current_pageid($pageID)
    {
        $_SESSION['current-page'] = $pageID;
    }

    public static function if_invalid_redirect_to_pageid($pageID)
    {
        if (self::is_valid(self::get_current_pageid()) == FALSE)
            http_utils::temporary_redirect_url(self::get_full_url($pageID));
    }
}

?>
