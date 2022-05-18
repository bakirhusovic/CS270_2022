create schema cs270_2022 collate utf8mb4_0900_ai_ci;
use cs270_2022;
create table if not exists users
(
    id         int auto_increment
    primary key,
    first_name varchar(255) not null,
    last_name  varchar(255) not null,
    email      varchar(255) not null,
    password   varchar(255) not null,
    type       varchar(20)  null,
    constraint users_email_uindex
    unique (email)
    );

create table if not exists categories
(
    id      int auto_increment
    primary key,
    name    varchar(255) not null,
    user_id int          null,
    constraint categories_user_fk
    foreign key (user_id) references users (id)
    );

create table if not exists items
(
    id          int auto_increment
    primary key,
    name        varchar(255)   not null,
    description text           null,
    price       decimal(10, 3) null,
    category_id int            not null,
    image       varchar(255)   null,
    user_id     int            null,
    constraint items_categories_fk
    foreign key (category_id) references categories (id),
    constraint items_user_fk
    foreign key (user_id) references users (id)
    );

