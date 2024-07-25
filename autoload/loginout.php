<?php

class loginout
{
    static function login($uname, $pass)
    {
        try
        {
            $db = new dbuser();
            if ($db->check_user_pass($uname,$pass))
            {
                $_SESSION['is_logged_in'] = TRUE;
                $_SESSION['who_is_logged_in'] = $uname;
                return TRUE;
            }
            else
            {
                self::logout();
                return FALSE;
            }
        }
        catch (Exception $e)
        {
            self::logout();
            return FALSE;
        }
    }

    static function logout()
    {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['who_is_logged_in']);
    }

    static function is_logged_in()
    {
        if (array_key_exists('is_logged_in', $_SESSION))
            return TRUE;
        else
            return FALSE;
    }
}

?>
