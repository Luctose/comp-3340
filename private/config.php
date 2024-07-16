<?php
$CFG = new stdClass();

# Replace the following URL with your site's URL...
$CFG->base_url = 'https://test.sarwehl.myweb.cs.uwindsor.ca/';

# Site-wide password salt...
$CFG->site_wide_password_salt = 'dhgsa77w';

# Set a "global"  session timeout...
$CFG->session_timeout = 60*10; // in seconds

# Database information...
$CFG->db_dsn = 'mysql:host=localhost;dbname=name';
$CFG->db_user = 'uname';
$CFG->db_pass = 'password';

# Special database "admin" security settings...
$CFG->db_admin_permit_create_drop = FALSE;
$CFG->db_admin_only_allow_ip = '172.22.162.178';

# e.g., Special email support address...
$CFG->emailaddr_support = 'sarwehl@uwindsor.ca';

?>
