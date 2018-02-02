DROP DATABASE IF EXISTS fastpic;

/* Delete any existing database called fastpic */
CREATE DATABASE IF NOT EXISTS fastpic;
/* Create a database called fastpic if there is no existing database called Fastpic */

USE fastpic;
/* Use the database fastpic */

CREATE TABLE user
/* Create a table called user */
  (
  email_address varchar(255),
  name varchar (255),
  user_id INT NOT NULL,
  /* The column user_id uniquely identifies user table */
   PRIMARY KEY (user_id),
   created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
   );

CREATE TABLE image
/* Create a table called image */
   (
   filename varchar (255),
   image_id INT NOT NULL,
   /* The column image_id uniquely identifies image table */
   PRIMARY KEY (image_id),
   uploaded_by_user_id INT NOT NULL,
   /* The column uploaded_by_user_id references user table */
   FOREIGN KEY (uploaded_by_user_id),
   REFERENCES user(user_id),
   ON DELETE CASCADE),
   created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
   );

CREATE TABLE commentcomment
   /* Create a table called commentcomment */
   (
    image_id INT NOT NULL,
    /* The column image_id references the image table */
    FOREIGN KEY (image_id),
    REFERENCES image(image_id),
    ON DELETE CASCADE),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id),
    REFERENCES user(user_id),
    comment_id INT NOT NULL,
     /* The column comment_id uniquely identifies commentcomment table */
    PRIMARY KEY (comment_id),
    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    imageurl varchar (1000) NOT NULL,
    comment varchar(2500),
    created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    );

CREATE TABLE follow
     /* Create a table called follow */
     (
      user_id INT NOT NULL,
      /* The column user_id references user table */
      FOREIGN KEY (user_id),
      REFERENCES user(user_id),
      ON DELETE CASCADE),
      following_id INT NOT NULL,
      /* The column following_id uniquely identifies follow table */
      PRIMARY KEY (following_id),
      timestamp_id INT NOT NULL,
      created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
      modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
      )
