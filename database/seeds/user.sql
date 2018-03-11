-- User table seed data
USE fastpic;
-- Remove all data first
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE user;
SET FOREIGN_KEY_CHECKS = 1;
-- Insert these values
INSERT INTO user (user_id, user_name, email_address) VALUES (1, 'jbartlet', 'jbartlet@51.la');
INSERT INTO user (user_id, user_name, email_address) VALUES (2, 'lmcgarry', 'lmcgarry@w3.org');
INSERT INTO user (user_id, user_name, email_address) VALUES (3, 'jlyman', 'jlyman@rediff.com');
INSERT INTO user (user_id, user_name, email_address) VALUES (4, 'tziegler', 'tziegler@godaddy.com');
INSERT INTO user (user_id, user_name, email_address) VALUES (5, 'sseaborn', 'sseaborn@eventbrite.com');
