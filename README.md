# comp-3340
Web Group Project for COMP-3340 at the University of Windsor
Some description of the project

[Link to Live Website here](https://test.sarwehl.myweb.cs.uwindsor.ca/)

# Documentation

1. Create a domain to host the server and delete the public_html folder

2. Get the files for this project into the domains filesystem:

Option 1 (git):
-> GO TO the filesystem for your domain in your command line
-> git clone https://github.com/Luctose/comp-3340.git

Option 2 (file transfer):
-> Connect to your file system for your domain
-> Download zip from https://github.com/Luctose/comp-3340 OR from the submission site
-> Unzip the zip file
-> transfer the files to the servers filesystem

3. Rename the root folder the files are in (comp-3340) to "public_html"

4. Activate your database and obtain the database credentials

5. Replace your database credentials for the ones from your database in private/config.php and change the CFG->base_url to the url
of your server. (Includes dbtype, dbhost, dbname, dbuser, dbpass)

6. Change the db_admin_only_allow_ip to your IP address and set db_admin_permit_create_drop to TRUE

7. Go to the following URL's with your base website URL prefixed before it:
/misc/userdb-create.php
/misc/bookdb-create.php
/misc/cartdb-create.php
/misc/userdb-usage.php
/misc/bookdb-usage.php
/misc/cartdb-usage.php

This is to populate the databases

8. Go back to config.php and set db_admin_permit_create_drop to FALSE

9. Set the private folder to not be public by making it chmod 550 (only owner+group read/execute)