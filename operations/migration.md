## Migration wordpress menually (example: xyz.com to abc.com)
#### To (server/localhost) EX.: abc.com
* Step-1: Install fresh copy of wp from https://wordpress.org/.
* step-2: Drop new database(default wp database)
* Setp-4: Import your working db.
* Step-5: change your site url from options table. (xyz.com to abc.com)
* Step-6: (after upload wp-content folder) you need to edit wp-config.php as like xyz.com's wp-config.php file. 

#### From (server/localhost) Ex. xyz.com
Setp-3: Export your wp db.
Step-6: download wp-content folder and upload it to your new wp. (first you need to delete wp-content folder in your new site)


---------- Summary ----------
```
Download/export database, wp-content folder and wp-config.php file from your existing site.
then import database to your new site, replace wp-content folder, edit wp-config.php file as like your existing website, and change siteurl from options table.
```