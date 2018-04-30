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
	FOREIGN KEY (person_id) REFERENCES auth(person_id) ON DELETE CASCADE,
	PRIMARY KEY (post_id)
);

-- store the details of followed posts --
CREATE TABLE followed_posts (
	follow_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	post_id SMALLINT UNSIGNED NOT NULL,
	person_id SMALLINT UNSIGNED NOT NULL,
	FOREIGN KEY (post_id) REFERENCES posts(post_id) ON DELETE CASCADE,
	FOREIGN KEY (person_id) REFERENCES auth(person_id) ON DELETE CASCADE,
	PRIMARY KEY (follow_id)
);

CREATE TABLE feedbacks (
	feedback_id	SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(45),
	email VARCHAR(45),
	content TEXT NOT NULL,
	PRIMARY KEY (feedback_id)
);

CREATE TABLE company (
	company_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	company_name VARCHAR(50),
	company_link TEXT,
	apply_date DATE,
	interview_date DATE,
	branch VARCHAR(100),
	message TEXT,
	PRIMARY key (company_id)
);

CREATE TABLE internshipTable (
	isAbroad INT NOT NULL,  	#1 for abroad internship
	name VARCHAR(100) NOT NULL,
	duration INT NOT NULL,
	department VARCHAR(100),
	year INT NOT NULL,
	place VARCHAR(100),
	time INT NOT NULL,   #1 for summer and 0 for winter
	website VARCHAR(100) NOT NULL
);

CREATE TABLE placementTable (
	isAbroad INT NOT NULL,  	#1 for abroad internship
	name VARCHAR(100) NOT NULL,
	department VARCHAR(100),
	place VARCHAR(100),
	website VARCHAR(100) NOT NULL
);
