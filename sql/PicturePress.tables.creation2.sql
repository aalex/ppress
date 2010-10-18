CREATE TABLE blog   (blog_id INT NOT NULL,
                     title VARCHAR(125),
                     author VARCHAR(30),
		     intro TINYTEXT,
		     URL VARCHAR(256),
		     crttime TIMESTAMP NOT NULL,
		     updtime TIMESTAMP NOT NULL,
                     PRIMARY KEY (blog_id))
		     CHARSET utf8;

CREATE TABLE post   (post_id INT NOT NULL AUTO_INCREMENT,
		     blog_id INT NOT NULL,
		     title VARCHAR(125),
		     post_time TIMESTAMP,
		     URL VARCHAR(256),
		     crttime TIMESTAMP NOT NULL,
		     updtime TIMESTAMP NOT NULL,
                     PRIMARY KEY (post_id),
		FOREIGN KEY (blog_id) REFERENCES blog (blog_id) )
		     CHARSET utf8;		     
		
CREATE TABLE word   (word_id INT NOT NULL,
		     post_id INT NOT NULL,
		     position_in_text INT NOT NULL,
 		     length_in_characters INT NOT NULL,
		     text VARCHAR(30),
		     is_chinese TINYINT DEFAULT 0,
		     is_punctuation TINYINT DEFAULT 0,
		     has_an_image TINYINT DEFAULT 0,
		     image_is_downloaded TINYINT DEFAULT 0,
		     image_id  TINYINT DEFAULT 0,
		     PRIMARY KEY (word_id, post_id),
		FOREIGN KEY (post_id) REFERENCES post (post_id) )
		     CHARSET utf8;
		    
CREATE TABLE image   (image_id INT NOT NULL AUTO_INCREMENT,
		     original_image_url VARCHAR(256),
		     local_image_name VARCHAR(60),
		     image_width INT,
		     image_height INT,
		     has_been_resized TINYINT,
		
		     PRIMARY KEY (image_id));
		
