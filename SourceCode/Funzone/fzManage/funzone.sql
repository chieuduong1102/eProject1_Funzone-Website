CREATE DATABASE IF NOT EXISTS FUNZONE;
USE FUNZONE;
CREATE TABLE category (
	c_id VARCHAR(20) PRIMARY KEY NOT NULL,
	name_category VARCHAR(255) NOT NULL 
);

CREATE TABLE service(
	s_id VARCHAR(20) PRIMARY KEY NOT NULL,
	c_id VARCHAR(20) ,
	name_service VARCHAR(255) ,
	detail_service LONGTEXT,
	FOREIGN KEY	(c_id) REFERENCES category(c_id)
);

CREATE TABLE image (
	i_id VARCHAR(20) PRIMARY KEY NOT NULL,
	s_id VARCHAR(20) NOT NULL,
	title_image VARCHAR(255),
	detail_image LONGTEXT,
	description_image VARCHAR(255),
	link_image VARCHAR(255) NOT NULL,
	FOREIGN KEY	(s_id) REFERENCES service(s_id)
)
CREATE TABLE admin(
	`admin` VARCHAR(20) PRIMARY KEY NOT NULL,
	pass VARCHAR(20) NOT NULL
)

INSERT INTO admin(admin, pass)
VALUES ('admin1' , '123')