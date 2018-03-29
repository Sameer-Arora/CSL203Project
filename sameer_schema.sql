DROP DATABASE IF EXISTS tnp_cell;
CREATE DATABASE tnp_cell;
USE tnp_cell;

-- SOURCE C:/Users/Shreyanshu Shekhar/Desktop/csp_203_project/tnp_cell-schema.sql
-- auth table is just made to check weather this is running or not --

CREATE TABLE auth (
	person_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	email varchar(90) NOT NULL,
	password varchar(90) NOT NULL,
	role TINYINT UNSIGNED, 
	PRIMARY KEY (person_id)
);

CREATE TABLE student (
	student_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name varchar(20) NOT NULL,
	department varchar(20) NOT NULL,
	year TINYINT UNSIGNED NOT NULL,
	person_id INT UNSIGNED,
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (student_id)
);


CREATE TABLE faculty (
	faculty_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name varchar(20) NOT NULL,
	department varchar(20) NOT NULL,
	reasearch_area TEXT ,
	post varchar(20) NOT NULL,
	phone_number INT UNSIGNED NOT NULL,
	person_id INT UNSIGNED,
	office_number varchar(20),
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (faculty_id)
);


CREATE TABLE letter_of_motivation (
	lom_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	time_updated DATETIME NOT NULL, 
	person_id INT UNSIGNED,
	rating INT UNSIGNED NOT NULL,
	share_option boolean,
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (lom_id)
);

CREATE TABLE cv (
	cv_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	time_updated DATETIME NOT NULL, 
	person_id INT UNSIGNED,
	share_option boolean,
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (cv_id)
);

CREATE TABLE cover_letter (
	cover_letter_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	time_updated DATETIME NOT NULL, 
	person_id INT UNSIGNED,
	share_option boolean,
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	PRIMARY KEY (cover_letter_id)
);


CREATE TABLE ratings (
	rating_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	person_id INT UNSIGNED,
	lom_id INT UNSIGNED,cv_id INT UNSIGNED, cover_letter_id INT UNSIGNED,
	FOREIGN KEY (person_id) REFERENCES auth(person_id),
	FOREIGN KEY (lom_id) REFERENCES letter_of_motivation(lom_id),
	FOREIGN KEY (cv_id) REFERENCES cv(cv_id),
	FOREIGN KEY (cover_letter_id) REFERENCES cover_letter(cover_letter_id),
	PRIMARY KEY (rating_id)
);

