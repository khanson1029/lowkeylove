

CREATE DATABASE IF NOT EXISTS heroku_5df2d48f062ccf3;
USE heroku_5df2d48f062ccf3;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS pdfs;
DROP TABLE IF EXISTS mp3s;
DROP TABLE IF EXISTS songs;
DROP TABLE IF EXISTS stats;

CREATE TABLE IF NOT EXISTS users(
 user_id INT AUTO_INCREMENT,
 actualname VARCHAR(100) NOT NULL,
 username VARCHAR(50) NOT NULL,
 pass VARCHAR(100) NOT NULL,
 email VARCHAR(100) NOT NULL,

 PRIMARY KEY(user_id)
);
CREATE TABLE IF NOT EXISTS pdfs(
 pdf_id INT AUTO_INCREMENT,
 pdf_location VARCHAR(100) NOT NULL,
 song_name VARCHAR(50) NOT NULL,
 song_author VARCHAR(50) NOT NULL,
 pdf_description VARCHAR(1000),
 date_added DATE,
 PRIMARY KEY (pdf_id)
);
CREATE TABLE IF NOT EXISTS mp3s(
 mp3_id INT AUTO_INCREMENT,
 mp3_location VARCHAR(100) NOT NULL,
 song_name VARCHAR(50) NOT NULL,
 song_author VARCHAR(50) NOT NULL,
 mp3_description VARCHAR(1000),
 date_added DATE,
 PRIMARY KEY (mp3_id)
);
CREATE TABLE IF NOT EXISTS songs(
 song_id INT AUTO_INCREMENT,
 song_name VARCHAR(80) NOT NULL,
 song_author VARCHAR(80) NOT NULL,
 song_genre VARCHAR(80) NOT NULL,
 song_description VARCHAR(1000),
 PRIMARY KEY (song_id)
);
CREATE TABLE IF NOT EXISTS stats(
stats_id INT AUTO_INCREMENT,
username VARCHAR(80) NOT NULL,
hours_played INT,
songs_learned INT,
songs_uploaded INT,
liked_songs VARCHAR(10000),
PRIMARY KEY (stats_id)
);
