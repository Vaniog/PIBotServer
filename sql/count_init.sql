use web_database;
drop table if exists count;
create table count (
    name varchar(255),
    count int
);

insert into count values ("ping", "0");
insert into count values ("photos_send", "0");