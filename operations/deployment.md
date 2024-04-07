# digital ocean hosting doc
WP(Apachi): https://marketplace.digitalocean.com/apps/wordpress

WP(OpenLiteSpeed): https://marketplace.digitalocean.com/apps/openlitespeed-wordpress

1. https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-20-04

=======Lets encrypt============
2. https://www.digitalocean.com/community/tutorials/how-to-secure-apache-with-let-s-encrypt-on-ubuntu-20-04


******************* Configuration *************************
Welcome to Ubuntu 20.04.5 LTS (GNU/Linux 5.4.0-135-generic x86_64)

 * Documentation:  https://help.ubuntu.com
 * Management:     https://landscape.canonical.com
 * Support:        https://ubuntu.com/advantage

  System information as of Wed Dec 28 05:43:38 UTC 2022

  System load:  0.19               Users logged in:       0
  Usage of /:   10.6% of 24.05GB   IPv4 address for eth0: 64.227.156.8
  Memory usage: 36%                IPv4 address for eth0: 10.47.0.6
  Swap usage:   0%                 IPv4 address for eth1: 10.122.0.3
  Processes:    122

0 updates can be applied immediately.


********************************************************************************

Welcome to DigitalOcean's One-Click WordPress Droplet.
To keep this Droplet secure, the UFW firewall is enabled.
All ports are BLOCKED except 22 (SSH), 80 (HTTP), and 443 (HTTPS).

In a web browser, you can view:
 * The WordPress One-Click Quickstart guide: https://do.co/34TfYn8#start
 * The new WordPress site: http://64.227.156.8

On the server:
 * The default web root is located at /var/www/html
 * If you're using the embedded database, the MySQL root password
   and MySQL wordpress user password are saved in /root/.digitalocean_password
   If you've opted in to using a DBaaS instance with DigitalOcean, you will
   find your credentials written to /root/.digitalocean_dbaas_credentials and
   you will have access to a DATABASE_URL environment variable holding your
   database connection string.
 * The must-use WordPress security plugin, fail2ban, is located at
   /var/www/html/wp-content/mu-plugins/fail2ban.php
 * Certbot is preinstalled. Run it to configure HTTPS. See
   https://do.co/34TfYn8#enable-https for more detail.
 * For security, xmlrpc calls are blocked by default.  This block can be
    disabled by running "a2disconf block-xmlrpc" in the terminal.

IMPORTANT:
   After connecting to the Droplet for the first time,
   immediately add the WordPress administrator at http://64.227.156.8.

For help and more information, visit https://do.co/34TfYn8

********************************************************************************
To delete this message of the day: rm -rf /etc/update-motd.d/99-one-click
This script will copy the WordPress installation into
Your web root and move the existing one to /var/www/html.old
--------------------------------------------------
This setup requires a domain name.  If you do not have one yet, you may
cancel this setup, press Ctrl+C.  This script will run again on your next login
--------------------------------------------------
Enter the domain name for your new WordPress site.
(ex. example.org or test.example.org) do not include www or http/s
--------------------------------------------------
Domain/Subdomain name: dishcofood.com                                                            
Enabling conf block-xmlrpc.
To activate the new configuration, you need to run:
  systemctl reload apache2
Now we will create your new admin user account for WordPress.
Your Email Address: dishco.bd@gmail.com

Username: dishco.food

Password: 

Blog Title: Dishco

Is the information correct? [Y/n] Y



Next, you have the option of configuring LetsEncrypt to secure your new site.  Before doing this, be sure that you have pointed your domain or subdomain to this server's IP address.  You can also run LetsEncrypt certbot later with the command 'certbot --apache'



Would you like to use LetsEncrypt (certbot) to configure SSL(https) for your new site? (y/n): y
Saving debug log to /var/log/letsencrypt/letsencrypt.log
Plugins selected: Authenticator apache, Installer apache
Enter email address (used for urgent renewal and security notices) (Enter 'c' to
cancel): dishco.bd@gmail.com

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Please read the Terms of Service at
https://letsencrypt.org/documents/LE-SA-v1.3-September-21-2022.pdf. You must
agree in order to register with the ACME server at
https://acme-v02.api.letsencrypt.org/directory
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
(A)gree/(C)ancel: A

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Would you be willing to share your email address with the Electronic Frontier
Foundation, a founding partner of the Let's Encrypt project and the non-profit
organization that develops Certbot? We'd like to send you email about our work
encrypting the web, EFF news, campaigns, and ways to support digital freedom.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
(Y)es/(N)o: Y

Which names would you like to activate HTTPS for?
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
1: dishcofood.com
2: www.dishcofood.com
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Select the appropriate numbers separated by commas and/or spaces, or leave input
blank to select all options shown (Enter 'c' to cancel): 1 2
Obtaining a new certificate
Performing the following challenges:
http-01 challenge for dishcofood.com
http-01 challenge for www.dishcofood.com
Waiting for verification...
Challenge failed for domain dishcofood.com
Challenge failed for domain www.dishcofood.com
http-01 challenge for dishcofood.com
http-01 challenge for www.dishcofood.com
Cleaning up challenges
Some challenges have failed.

IMPORTANT NOTES:
 - The following errors were reported by the server:

   Domain: dishcofood.com
   Type:   dns
   Detail: no valid A records found for dishcofood.com; no valid AAAA
   records found for dishcofood.com

   Domain: www.dishcofood.com
   Type:   dns
   Detail: DNS problem: NXDOMAIN looking up A for www.dishcofood.com -
   check that a DNS record exists for this domain; DNS problem:
   NXDOMAIN looking up AAAA for www.dishcofood.com - check that a DNS
   record exists for this domain
 - Your account credentials have been saved in your Certbot
   configuration directory at /etc/letsencrypt. You should make a
   secure backup of this folder now. This configuration directory will
   also contain certificates and private keys obtained by Certbot so
   making regular backups of this folder is ideal.
WordPress has been enabled at https://dishcofood.com  Please open this URL in a browser to complete the setup of your site.
/root/wp_setup.sh: line 133: break: only meaningful in a `for', `while', or `until' loop
Finalizing installation...
--2022-12-28 05:48:10--  https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
Resolving raw.githubusercontent.com (raw.githubusercontent.com)... 185.199.110.133, 185.199.108.133, 185.199.111.133, ...
Connecting to raw.githubusercontent.com (raw.githubusercontent.com)|185.199.110.133|:443... connected.
HTTP request sent, awaiting response... 200 OK
Length: 6729511 (6.4M) [application/octet-stream]
Saving to: ‘/usr/bin/wp’

/usr/bin/wp                  100%[===========================================>]   6.42M  15.3MB/s    in 0.4s    

2022-12-28 05:48:11 (15.3 MB/s) - ‘/usr/bin/wp’ saved [6729511/6729511]

Completing the configuration of WordPress.Success: WordPress installed successfully.
Installing WP fail2ban (4.4.0.9)
Downloading installation package from https://downloads.wordpress.org/plugin/wp-fail2ban.4.4.0.9.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Success: Installed 1 of 1 plugins.
Plugin 'wp-fail2ban' activated.
Success: Activated 1 of 1 plugins.
Installation complete. Access your new WordPress site in a browser to continue.
root@DishCo:~# certbot --apache -d dishcofood.com -d www.dishcofood.com
Saving debug log to /var/log/letsencrypt/letsencrypt.log
Plugins selected: Authenticator apache, Installer apache
Obtaining a new certificate
Performing the following challenges:
http-01 challenge for dishcofood.com
http-01 challenge for www.dishcofood.com
Waiting for verification...
Challenge failed for domain www.dishcofood.com
http-01 challenge for www.dishcofood.com
Cleaning up challenges
Some challenges have failed.

IMPORTANT NOTES:
 - The following errors were reported by the server:

   Domain: www.dishcofood.com
   Type:   dns
   Detail: DNS problem: NXDOMAIN looking up A for www.dishcofood.com -
   check that a DNS record exists for this domain; no valid AAAA
   records found for www.dishcofood.com
root@DishCo:~# certbot --apache -d dishcofood.com
Saving debug log to /var/log/letsencrypt/letsencrypt.log
Plugins selected: Authenticator apache, Installer apache
Obtaining a new certificate
Created an SSL vhost at /etc/apache2/sites-enabled/000-default-le-ssl.conf
Enabled Apache socache_shmcb module
Enabled Apache ssl module
Deploying Certificate to VirtualHost /etc/apache2/sites-enabled/000-default-le-ssl.conf

Please choose whether or not to redirect HTTP traffic to HTTPS, removing HTTP access.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
1: No redirect - Make no further changes to the webserver configuration.
2: Redirect - Make all requests redirect to secure HTTPS access. Choose this for
new sites, or if you're confident your site works on HTTPS. You can undo this
change by editing your web server's configuration.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Select the appropriate number [1-2] then [enter] (press 'c' to cancel): 2
Redirecting vhost in /etc/apache2/sites-enabled/000-default.conf to ssl vhost in /etc/apache2/sites-enabled/000-default-le-ssl.conf

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Congratulations! You have successfully enabled https://dishcofood.com

You should test your configuration at:
https://www.ssllabs.com/ssltest/analyze.html?d=dishcofood.com
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

IMPORTANT NOTES:
 - Congratulations! Your certificate and chain have been saved at:
   /etc/letsencrypt/live/dishcofood.com/fullchain.pem
   Your key file has been saved at:
   /etc/letsencrypt/live/dishcofood.com/privkey.pem
   Your cert will expire on 2023-03-28. To obtain a new or tweaked
   version of this certificate in the future, simply run certbot again
   with the "certonly" option. To non-interactively renew *all* of
   your certificates, run "certbot renew"
 - If you like Certbot, please consider supporting our work by:

   Donating to ISRG / Let's Encrypt:   https://letsencrypt.org/donate
   Donating to EFF:                    https://eff.org/donate-le

root@DishCo:~# ufw status
Status: active

To                         Action      From
--                         ------      ----
22/tcp                     LIMIT       Anywhere                  
Apache Full                ALLOW       Anywhere                  
22/tcp (v6)                LIMIT       Anywhere (v6)             
Apache Full (v6)           ALLOW       Anywhere (v6)             

root@DishCo:~# lsb_release -a
No LSB modules are available.
Distributor ID: Ubuntu
Description:    Ubuntu 20.04.5 LTS
Release:        20.04
Codename:       focal
root@DishCo:~# sudo systemctl reload apache2
root@DishCo:~# sudo ufw status
Status: active

To                         Action      From
--                         ------      ----
22/tcp                     LIMIT       Anywhere                  
Apache Full                ALLOW       Anywhere                  
22/tcp (v6)                LIMIT       Anywhere (v6)             
Apache Full (v6)           ALLOW       Anywhere (v6)             

root@DishCo:~# sudo ufw allow 'OpenSSH'
Rule added
Rule added (v6)
root@DishCo:~# ufw status
Status: active

To                         Action      From
--                         ------      ----
22/tcp                     LIMIT       Anywhere                  
Apache Full                ALLOW       Anywhere                  
OpenSSH                    ALLOW       Anywhere                  
22/tcp (v6)                LIMIT       Anywhere (v6)             
Apache Full (v6)           ALLOW       Anywhere (v6)             
OpenSSH (v6)               ALLOW       Anywhere (v6)             

root@DishCo:~# certbot --apache -d www.example.com
Saving debug log to /var/log/letsencrypt/letsencrypt.log
Plugins selected: Authenticator apache, Installer apache
Obtaining a new certificate
An unexpected error occurred:
The server will not issue certificates for the identifier :: Error creating new order :: Cannot issue for "www.example.com": The ACME server refuses to issue a certificate for this domain name, because it is forbidden by policy
Please see the logfiles in /var/log/letsencrypt for more details.
root@DishCo:~# 