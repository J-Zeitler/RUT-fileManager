CREATE TABLE IF NOT EXISTS Users(
	id int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	name varchar(30) NOT NULL,

	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Files(
	id int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	fileName varchar(30) NOT NULL,
	upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	s_level int(2) UNSIGNED NOT NULL DEFAULT '0',
	user_id int(2) UNSIGNED NOT NULL,
	file_size_kb int(5) UNSIGNED NOT NULL,

	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES Users (id)
);

CREATE TABLE IF NOT EXISTS Images(
	id int(5) UNSIGNED NOT NULL,
	height int(5) NOT NULL,
	width int(5) NOT NULL,
	image_type varchar(30) NOT NULL,

	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Files (id)
);

CREATE TABLE IF NOT EXISTS PowerPoints(
	id int(5) UNSIGNED NOT NULL,
	no_of_slides int(4),


	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Files (id)
);

CREATE TABLE IF NOT EXISTS PDFs(
	id int(5) UNSIGNED NOT NULL,
	no_of_pages int(4),


	PRIMARY KEY (id),
	FOREIGN KEY (id) REFERENCES Files (id)
);

CREATE TABLE IF NOT EXISTS Tags(
	id int(5) UNSIGNED NOT NULL,
	name varchar(30) NOT NULL,

	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Has_tag(
	tag_id int(5) UNSIGNED NOT NULL,
	file_id int(5) UNSIGNED NOT NULL,

	PRIMARY KEY (tag_id, file_id),
	FOREIGN KEY (tag_id) REFERENCES Tags (id),
	FOREIGN KEY (file_id) REFERENCES Files (id)
);

CREATE TABLE IF NOT EXISTS File_comments(
	id int(5) UNSIGNED NOT NULL,
	comment_text text(150) NOT NULL,
	comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	user_id int(2) UNSIGNED NOT NULL,

	PRIMARY KEY (id),
	FOREIGN KEY (user_id) REFERENCES Users (id)
);

CREATE TABLE IF NOT EXISTS Comments_about_files(
	comment_id int(5) UNSIGNED NOT NULL,
	file_id int(5) UNSIGNED NOT NULL,

	PRIMARY KEY (comment_id, file_id),
	FOREIGN KEY (comment_id) REFERENCES File_comments (id),
	FOREIGN KEY (file_id) REFERENCES Files (id)
);

CREATE TABLE IF NOT EXISTS Words(
	id int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	word varchar(30) NOT NULL UNIQUE,

	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Words_in_files(
	word_id int(5) UNSIGNED NOT NULL,
	file_id int(5) UNSIGNED NOT NULL,
	occurrences int(5) UNSIGNED NOT NULL,

	PRIMARY KEY (word_id, file_id),
	FOREIGN KEY (word_id) REFERENCES Words (id),
	FOREIGN KEY (file_id) REFERENCES Files (id)
);