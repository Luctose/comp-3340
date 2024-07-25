<?php
require_once("../common.php");

# Retrieve Info from submission form
if (array_key_exists('uname', $_POST) &&
    array_key_exists('pass', $_POST))
{
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    # Call db login function
    loginout::login($uname, $pass);

}
else
{
    unset($_SESSION['is_logged_in']);
}

# Redirect back to same page was on
http_utils::temporary_redirect_url('index.php');
# Use AJAX to change menu with js

?>
