DROP DATABASE IF EXISTS fastpic;
CREATE DATABASE IF NOT EXISTS fastpic;
USE fastpic;

CREATE TABLE user (
 email_address varchar(255),
 name varchar (255),
 user_id INT NOT NULL,
 PRIMARY KEY (user_id),
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE image (
 filename varchar (255),
 image_id INT NOT NULL,
 PRIMARY KEY (image_id),
 uploaded_by_user_id INT NOT NULL,
 FOREIGN KEY (uploaded_by_user_id) REFERENCES user(user_id),
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE commentcomment (
 image_id INT NOT NULL,
 FOREIGN KEY (image_id) REFERENCES image(image_id) ON DELETE CASCADE,
 user_id INT NOT NULL,
 FOREIGN KEY (user_id) REFERENCES user(user_id),
 comment_id INT NOT NULL,
 PRIMARY KEY (comment_id),
 -- [No_Column name]TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 imageurl varchar (1000) NOT NULL,
 comment varchar(2500),
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE follow (
 user_id INT NOT NULL,
 FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE,
 following_id INT NOT NULL,
 PRIMARY KEY (following_id),
 timestamp_id INT NOT NULL,
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
