If your client doesn't know their WordPress login URL, you can try the following methods to find it:

### 1. **Try Default Login URLs**
Start by checking the default login URLs in your browser:
- `example.com/wp-admin/`
- `example.com/wp-login.php/`
- `example.com/admin/`
- `example.com/login/`

Replace `example.com` with the actual domain name.

---

### 2. **Check the `.htaccess` File**
If the login URL has been changed, it might be redirected using `.htaccess`:
1. Access the website files via FTP or cPanel.
2. Open the root folder (usually `public_html`).
3. Check the `.htaccess` file for any login URL redirections.

---

### 3. **Check `functions.php` or Theme Files**
Sometimes developers change the login URL directly in the theme’s `functions.php` file:
1. Go to `wp-content/themes/your-theme/`.
2. Open `functions.php` and search for:
   - `wp_redirect()`
   - `add_action('init', ...)`
   - Any custom functions related to login

---

### 4. **Look for Security Plugins**
Some security plugins allow changing the login URL, like:
- **WPS Hide Login**
- **iThemes Security**
- **All In One WP Security & Firewall**

To find out if any of these plugins are active:
1. Check the `wp-content/plugins/` folder.
2. Look for folders named like the plugins mentioned.
3. Open the plugin files (especially main files) and search for keywords like `login`, `redirect`, or `wp-login`.

---

### 5. **Check the Database**
Sometimes, plugins store the custom login URL in the database:
1. Access **phpMyAdmin** via cPanel.
2. Find the database associated with the website.
3. Look in the `wp_options` table for plugin settings related to login URLs.

---

### 6. **Use an Admin Dashboard Access**
If you have access to the hosting control panel (like cPanel), use **Softaculous** or similar installers to see the admin URL directly.

---

Let me know if you need help with any of these steps! 😊