DROP DATABASE IF EXISTS fastpic;
CREATE DATABASE IF NOT EXISTS fastpic;
USE fastpic;

CREATE TABLE user
   (
  email_address varchar(255),
  name varchar (255),
  user_id INT NOT NULL,
   PRIMARY KEY (user_id)
  );

CREATE TABLE image
 (
   filename varchar (255),
   image_id INT NOT NULL,
   uploaded_by_user_id INT NOT NULL,
   FOREIGN KEY (uploaded_by_user_id)
   REFERENCES user(user_id)
   ON DELETE CASCADE);
