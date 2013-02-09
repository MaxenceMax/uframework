CREATE TABLE IF NOT EXISTS locations
(
       id int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
       name VARCHAR(250) NOT NULL,
       created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS comments 
(
	id          int NOT NULL AUTO_INCREMENT,
	location_id int NOT NULL,
	username  VARCHAR(250) NOT NULL,
	body     TEXT NOT NULL,
	created_at  DATETIME,
	PRIMARY KEY (id),
	KEY comments_loc (location_id)
);

ALTER TABLE comments ADD CONSTRAINT comments_loc FOREIGN KEY (location_id) REFERENCES locations (id) ON DELETE CASCADE ON UPDATE NO ACTION;