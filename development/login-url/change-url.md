To change the default WordPress login URL without using a plugin, follow these steps:

---

### 🚀 **Step 1: Backup Your Site**
Before making any changes, it’s crucial to back up your WordPress site, including the database.

---

### 📝 **Step 2: Edit the `functions.php` File**
1. Log in to your hosting account or use FTP to access your site files.
2. Navigate to your theme directory:  
   ```
   wp-content/themes/your-theme/
   ```
3. Open the `functions.php` file and add the following code at the end:

   ```php
   add_action('init', 'custom_login_url');
   function custom_login_url() {
       global $pagenow;
       if ($pagenow == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET') {
           wp_redirect(home_url('/my-custom-login'));
           exit();
       }
   }

   add_action('template_redirect', 'custom_login_template');
   function custom_login_template() {
       if ($_SERVER['REQUEST_URI'] == '/my-custom-login') {
           require_once ABSPATH . 'wp-login.php';
           exit();
       }
   }
   ```
   - Replace **`/my-custom-login`** with your desired login URL.

---

### 🔧 **Step 3: Update .htaccess (Optional for Extra Security)**
To block direct access to `wp-login.php`, you can add the following code to your `.htaccess` file:

   ```apache
   <Files wp-login.php>
       Order Deny,Allow
       Deny from all
       Allow from 127.0.0.1
   </Files>
   ```
   This code restricts access to the login page, allowing only from localhost.

---

### 🧪 **Step 4: Test Your New Login URL**
1. Open a new browser tab and visit:  
   ```
   yoursite.com/my-custom-login
   ```
2. Make sure it properly redirects and works as expected.

---

### 🚩 **Important Note:**
If you change your theme or update it, your changes to `functions.php` might be lost. Consider creating a **child theme** or using a **custom code snippet plugin** to make your changes persistent.



--------------------------------------------
### change shortcut-way
* rename 'wp-login.php' file as your desire url and replace 'new name' in this code file.