-- minor updates
DROP DATABASE IF EXISTS `fastpic`;
CREATE DATABASE IF NOT EXISTS `fastpic`;
USE `fastpic`;

CREATE TABLE user (
 user_id INT NOT NULL AUTO_INCREMENT,
 user_name VARCHAR(255),
 email_address VARCHAR(255),
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (user_id)
);

CREATE TABLE image (
 image_id INT NOT NULL AUTO_INCREMENT,
 filename VARCHAR(255),
 image_url TEXT NOT NULL,
 image_path TEXT,
 uploaded_by_user_id INT NOT NULL,
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (uploaded_by_user_id) REFERENCES user(user_id),
 PRIMARY KEY (image_id)
);

CREATE TABLE comment (
 comment_id INT NOT NULL AUTO_INCREMENT,
 image_id INT NOT NULL,
 user_id INT NOT NULL,
 comment_body TEXT,
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (image_id) REFERENCES image(image_id) ON DELETE CASCADE,
 FOREIGN KEY (user_id) REFERENCES user(user_id),
 PRIMARY KEY (comment_id)
);

CREATE TABLE follow (
 follow_id INT NOT NULL AUTO_INCREMENT,
 leader_user_id INT NOT NULL,
 follower_user_id INT NOT NULL,
 timestamp_id INT NOT NULL,
 created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 modified_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (leader_user_id) REFERENCES user(user_id) ON DELETE CASCADE,
 FOREIGN KEY (follower_user_id) REFERENCES user(user_id) ON DELETE CASCADE,
 PRIMARY KEY (follow_id)
);
