# Part 1
After switching to my branch you need to run `vagrant reload`. This will force vagrant to sync the outside folder with the folder inside vagrant.

```
New Directory Structure
-app
-database
  schema.md
  schema.sql
-public
  /css
  /js
  index.php
-resources
```

Because of my directory changes we will need to update apache a bit.

```bash
vagrant ssh
cd /etc/apache2/sites-enabled
sudo nano 000-default.conf
# Change `DocumentRoot /var/www/html` to `DocumentRoot /var/www/html/public`
# Control+X to save
# Yes, save what is in the buffer
# Yes to the file name
```

Now we want to restart apache to reflect these changes.

`sudo /etc/init.d/apache2 restart`

Should see - `[ ok ] Restarting apache2 (via systemctl): apache2.service`.

Now in Chrome, navigation to `localhost:8080` and you should see:

```php
<?php
phpinfo();
?>
```

Apache has been updated, but now we have a new problem. We don't have php installed. The current stable release of PHP is 7.2.2

```bash
sudo apt-get install -y php7.0 php7.0-fpm php7.0-cli php7.0-common php7.0-mbstring php7.0-gd php7.0-intl php7.0-xml php7.0-mysql php7.0-mcrypt php7.0-zip libapache2-mod-php7.0
# confirm it was installed
php -v
```

Now in Chrome, navigate to `localhost:8080` and you should see the standard php info page.

# Part 2

Inside the `fastpic` directory lets open the `mysql.php` file.

Navigate to `localhost:8080/mysql.php`.

This might vary for a few of us. If you have imported our schema.sql this will work, if you haven't you need to follow the commands below:

```bash
cd /var/www/html/database
mysql -uvagrant -pvagrant < schema.sql
# lets confirm it worked
mysql -uvagrant -pvagrant
MariaDB [(none)]> show databases;
```
```
+--------------------+
| Database           |
+--------------------+
| fastpic            |
| information_schema |
| mysql              |
| performance_schema |
+--------------------+
4 rows in set (0.00 sec)
```
Now that we know we can connect, lets try getting all rows of the fastpic/user table.
Go into mysql.php and add:
```php
$statement = $pdo->prepare('SELECT * FROM user');
$statement->execute();
var_dump($statement->fetchAll());
```
Navigate to `localhost:8080/mysql.php`.
```html
array(0) {
}
```
We didn't see a result because we don't have any rows in the table yet. Lets add one.
Go into mysql, use fastpic and then run:
```sql
INSERT INTO `user` (`email_address`, `name`, `user_id`, `created_date`, `modified_date`) VALUES ('joe@joe.com', 'New User Joe', 1, now(), now());
```
