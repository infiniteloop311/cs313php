/*
The userlogin column will be unique so two users won't have the same username.
Basic information will be entered and their name will display to show that they've logged in. 
*/
CREATE TABLE users (
    id           SERIAL NOT NULL PRIMARY KEY,
    userlogin    varchar(80) NOT NULL UNIQUE,
    passwordhash varchar(80) NOT NULL, #need to figure out how to hash a password
    firstname    varchar(80) NOT NULL,
    lastname     varchar(80) NOT NULL
);

/*
Extra info for each author will be in this table.
The portrait column will be for the path to an image of the author. 
*/
CREATE TABLE authorsinfo (
    id   SERIAL NOT NULL PRIMARY KEY,
    name varchar(80) NOT NULL UNIQUE,
    bio  varchar(255) NOT NULL
    portrait varbinary(max) NOT NULL,
);

/*
All book data will be held in this library table.
Instead of multiple tables one for each user the user_id will tell which user it belongs to. 
The cover column will be for the path to an image of the book cover. 
*/
CREATE TABLE library (
    id SERIAL NOT NULL PRIMARY KEY,
    user_id int NOT NULL,
    title varchar(80) NOT NULL,
    author_id int NOT NULL,
    description varchar(255) NOT NULL,
    isbn bigint NOT NULL,
    cover varbinary(max) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id), 
    FOREIGN KEY (author_id) REFERENCES authorsinfo(id)
);