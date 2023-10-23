-- DROP DATABASE IF EXISTS trs;
CREATE DATABASE trs;
USE trs;

CREATE TABLE users (
	id	INT NOT NULL AUTO_INCREMENT,
	name	VARCHAR(150) NOT NULL,
	passwd	VARCHAR(150) NOT NULL,
	type	CHAR(1),
	UNIQUE (name),
	PRIMARY KEY (id)
);

CREATE TABLE reservations (
	id	INT NOT NULL AUTO_INCREMENT,
	host_id		INT  NOT NULL,
	guest_id	INT  ,
	start_time		DATETIME NOT NULL,
	length_min	INT NOT NULL,
	PRIMARY KEY (id,start_time)
);

