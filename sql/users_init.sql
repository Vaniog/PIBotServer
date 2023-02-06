use
    web_database;

create table if not exists users
(
    id           int         NOT NULL AUTO_INCREMENT,
    nickname     varchar(40) not null,
    password     varchar(40) not null,
    is_admin     bool        not null default 0,
    access_token varchar(40),

    PRIMARY KEY (id)
);
