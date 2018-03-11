-- User table seed data
USE fastpic;
-- Remove all data first
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE image;
SET FOREIGN_KEY_CHECKS = 1;
-- Insert these values
INSERT INTO image (filename, image_url, image_path, uploaded_by_user_id) VALUES ('file1.jpg', 'public/img/baDvRWZ', 'mGRdss0.jpg', 1);
INSERT INTO image (filename, image_url, image_path, uploaded_by_user_id) VALUES ('file2.jpg', 'public/img/baDvRWZ', 'cQEhtSm.jpg', 1);
INSERT INTO image (filename, image_url, image_path, uploaded_by_user_id) VALUES ('file3.jpg', 'public/img/baDvRWZ', 'WAOsF0B.jpg', 1);
