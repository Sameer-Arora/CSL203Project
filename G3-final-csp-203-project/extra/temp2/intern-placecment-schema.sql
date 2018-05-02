DROP DATABASE IF EXISTS sahil_csp;
CREATE DATABASE sahil_csp;
USE sahil_csp;

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
