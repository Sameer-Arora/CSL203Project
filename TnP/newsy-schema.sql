DROP DATABASE IF EXISTS newsy;
CREATE DATABASE newsy;
USE newsy;

CREATE TABLE auth (
	person_id	SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(45) NOT NULL,
	email VARCHAR(45) NOT NULL,
	password	 VARCHAR(20) NOT NULL,
	phone_number VARCHAR(20) NOT NULL,
	PRIMARY KEY (person_id)
);

CREATE TABLE feeds (
	feed_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	heading TEXT,
	summary TEXT,
	link TEXT,
	date_added DATE,
	time_added TIME, 
	PRIMARY KEY (feed_id)
);

CREATE TABLE vote (
	vote_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	upvote INT,
	downvote INT,
	feed_id SMALLINT UNSIGNED NOT NULL,
	person_id SMALLINT UNSIGNED NOT NULL,
	FOREIGN KEY (feed_id) REFERENCES feeds(feed_id),
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (vote_id)
);