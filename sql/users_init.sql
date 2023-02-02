use
web_database;
drop
    table if exists users;

create table users
(
    id       int NOT NULL AUTO_INCREMENT,
    name     varchar(255),
    password varchar(32),
    PRIMARY KEY (id)
);

insert into users (name, password)
values ('Ksusha', '123');

insert into users (name, password)
values ('Vania', '321');