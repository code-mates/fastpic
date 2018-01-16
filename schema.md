# Tables

## User

* id
* email
  * unique
* user_name
* full_name
  * should we do first_name and last_name or just full_name?
* password
* reset_hash
  * (if this is set we know they need to reset the password)
http://example.com/reset-password/hash
* confirmation_token
* last_login


## Image

* id
* title
* file_name
  *  filename displayed to everyone, if you download the file you can use this name (tim.jpg)
* full_path
  * full path plus hash or timestamp filename, so we don't have file name collisions on the server  (path/to/d41d8cd98f00b204e9800998ecf8427e.jpg)
* uploaded_by

## Comment

* id
* user_id
* comment
  *  we can leverage created_date and modified_date

## ImageUser
Not sure if we need this. One image uploaded by one user, don't need many to many

* image_id
* user_id

## CommentUser

* user_id
* comment_id


## CommentImage

* image_id
* comment_id

## Follow

* user_id
* following_id

## all tables

* created_date
* modified_date
* deleted_date
  * soft deletes (if date found, it was deleted)
