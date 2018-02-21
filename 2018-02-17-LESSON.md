# Create PHP scaffolding #15

## Notes / Random
1. Based on - https://laracasts.com/series/php-for-beginners
2. Some files might not match what is written in this Lesson.md file. I'm going to be creating and refacorting during the lesson.

3. Inside vagrant I hate not having some of my normal bash alias commands, so I add [this](https://gist.github.com/cancerimex/644c713f3e23db8d13afdb83c06c056c) to my `~/.bash_profile` inside Vagrant then run `source ~/.bash_profile`

## Updating Vagrant
I made some changes to the `Vagrantfile`. I tried to rethink the way I did this so I'm only touching stuff I really think needs to be added/updated. I made one port change in my `Vagrantfile` because I had a local conflict. I added php7 and an apache2 mod.

Inside the /fastpic directory you can run: `vagrant provision` to make these changes.

## Directory Changes

```
New Directory Structure
/core
  bootstrap.php
  connection.php
  functions.php
  query-builder.php
  user.php
/css
  app.css
/database
  schema.md
  schema.sql
/js
  app.js
index.php
about.php
contact.php
```

I will go over the files and changes in the lesson.

## Database Created/Seeded

```bash
cd database
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
Now that we know the schema was added, lets try and connect and get all rows of the fastpic/user table.

Let's make the connection. Inside index.php:
```php
<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=fastpic', 'vagrant', 'vagrant');
} catch (PDOException $e) {
  die('Database Connection Failed');
}
```

Navigation to `localhost:8080` and lets see if get the error.

Lets move on to getting the all the users from the user table.

Inside index.php add
```php
<?php
$statement = $pdo->prepare('SELECT * FROM user');
$statement->execute();
var_dump($statement->fetchAll());
```
Navigate to `localhost:8080`.
```html
array(0) {
}
```
We didn't see a result because we don't have any rows in the table yet. Lets add one.
```bash
vagrant ssh
mysql -uvagrant -pvagrant
## make sure we are using the right database
use fastpic;
```
```sql
INSERT INTO `user` (`email_address`, `name`, `user_id`, `created_date`, `modified_date`) VALUES ('joe@joe.com', 'New User Joe', 1, now(), now());
```
```html
array(1) {
  [0]=>
  array(10) {
    ["email_address"]=>
    string(11) "joe@joe.com"
    [0]=>
    string(11) "joe@joe.com"
    ["name"]=>
    string(12) "New User Joe"
    [1]=>
    string(12) "New User Joe"
    ["user_id"]=>
    string(1) "1"
    [2]=>
    string(1) "1"
    ["created_date"]=>
    string(19) "2018-02-14 15:43:28"
    [3]=>
    string(19) "2018-02-14 15:43:28"
    ["modified_date"]=>
    string(19) "2018-02-14 15:43:28"
    [4]=>
    string(19) "2018-02-14 15:43:28"
  }
}
```
