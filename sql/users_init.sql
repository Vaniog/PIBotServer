use
    web_database;

create table if not exists users
(
    id       int NOT NULL AUTO_INCREMENT,
    name     varchar(255),
    password varchar(40),
    is_admin bool,
    PRIMARY KEY (id)
);

insert into users (name, password)
values ('Ksusha', '123');

insert into users (name, password)
values ('Vania', '321');