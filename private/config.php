<?php
$CFG = new stdClass();

# Replace the following URL with your site's URL...
$CFG->base_url = 'https://example.myweb.cs.uwindsor.ca/';

# Site-wide password salt...
$CFG->site_wide_password_salt = 'dhgsa77w';

# Set a "global"  session timeout...
$CFG->session_timeout = 60*10; // in seconds

# Database information...
$CFG->dbtype = 'mysql';
$CFG->dbhost = 'localhost';
$CFG->dbname = 'example_comp3440';
$CFG->dbuser = 'example_comp3440';
$CFG->dbpass = 'examplepass';

# Special database "admin" security settings...
$CFG->db_admin_permit_create_drop = FALSE;
$CFG->db_admin_only_allow_ip = '255.255.255.255';

# e.g., Special email support address...
$CFG->emailaddr_support = 'example@uwindsor.ca';

?>
