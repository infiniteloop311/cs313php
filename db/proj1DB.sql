/*
The userlogin column will be unique so two users won't have the same username.
Basic information will be entered and their name will display to show that they've logged in.
#need to figure out how to hash a password#
*/
CREATE TABLE users (
    id           SERIAL NOT NULL PRIMARY KEY,
    userlogin    varchar(80) NOT NULL UNIQUE,
    passwordhash varchar(80) NOT NULL,
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
    bio  varchar(255) NOT NULL,
    portrait bytea NOT NULL
);

/*
Info on the book will be stored here, except the author of the book.
The cover column will be for the path to an image of the book cover. 
*/
CREATE TABLE books (
    id SERIAL NOT NULL PRIMARY KEY,
    title varchar(80) NOT NULL,
    description varchar(255) NOT NULL,
    isbn bigint NOT NULL,
    cover varchar
);

/*
Instead of multiple tables, one for each user, the user_id will tell which user the book belongs to.
This table connects the book and the author by the id and the information is held in the other tables.
*/
CREATE TABLE shelf (
    id SERIAL NOT NULL PRIMARY KEY,
    user_id int NOT NULL,
    author_id int NOT NULL,
    book_id int NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (author_id) REFERENCES authorsinfo(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);