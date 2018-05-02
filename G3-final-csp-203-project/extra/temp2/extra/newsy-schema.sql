DROP DATABASE IF EXISTS tnp_cell;
CREATE DATABASE tnp_cell;
USE tnp_cell;

-- SOURCE C:/Users/Shreyanshu Shekhar/Desktop/csp_203_project/tnp_cell-schema.sql
-- auth table is just made to check weather this is running or not --

CREATE TABLE auth (
	person_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(50),
	PRIMARY KEY (person_id)
);

-- store the details of post --
CREATE TABLE posts (
	post_id	SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	person_id SMALLINT UNSIGNED NOT NULL,
	subject TEXT NOT NULL,
	link VARCHAR(400),
	body TEXT NOT NULL,
	date_time TIMESTAMP,
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (post_id)
);

-- store the details of followed posts --
CREATE TABLE followed_posts (
	follow_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	post_id SMALLINT UNSIGNED NOT NULL,
	person_id SMALLINT UNSIGNED NOT NULL,
	FOREIGN KEY (post_id) REFERENCES posts(post_id),
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (follow_id)
);

CREATE TABLE feedbacks (
	feedback_id	SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(45),
	email VARCHAR(45),
	content TEXT NOT NULL,
	PRIMARY KEY (feedback_id)
);


-- store the details of upvote and downvote of the posts --
/*CREATE TABLE vote (
	vote_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	upvote INT NOT NULL,
	downvote INT NOT NULL,
	post_id SMALLINT UNSIGNED NOT NULL,
	person_id SMALLINT UNSIGNED NOT NULL,
	FOREIGN KEY (post_id) REFERENCES posts(post_id),
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (vote_id)
);*/

-- upvote and downvote should store only two values:
-- 1 for vote
-- 0 for no vote

-- store the attachments attached in the post --

/*CREATE TABLE post_attachments (
	attachment_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	post_id SMALLINT UNSIGNED NOT NULL,
	attachment BLOB,
	FOREIGN KEY (post_id) REFERENCES posts(post_id),
	PRIMARY KEY (attachment_id)
);*/