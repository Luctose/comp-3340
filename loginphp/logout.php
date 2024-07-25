<?php

require_once("../common.php");

# Call db logout function
loginout::logout();

# Redirect back to same page was on
http_utils::temporary_redirect_url('index.php');
# Use AJAX to change menu with js

?>
