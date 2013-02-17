CREATE TABLE IF NOT EXISTS locations
(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(250) NOT NULL,
    created_at DATETIME NOT NULL,
    address VARCHAR(250) NOT NULL,
    phone VARCHAR(10),
	presentation VARCHAR(300)
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

CREATE TABLE IF NOT EXISTS party
(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	location_id int NOT NULL,
	message VARCHAR(250) NOT NULL,
	party_time DATETIME NOT NULL
);

ALTER TABLE comments ADD CONSTRAINT comments_loc FOREIGN KEY (location_id) REFERENCES locations (id) ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE party ADD CONSTRAINT parties_loc FOREIGN KEY (location_id) REFERENCES locations (id) ON DELETE CASCADE ON UPDATE NO ACTION;