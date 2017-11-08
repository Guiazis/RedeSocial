create schema cadastros default char set utf8;
use cadastros;

create table cadastro (
    nome varchar (30) not null,
    sobrenome varchar(45) not null,
	usernome varchar(10) not null,
	senha varchar(700) not null,
    email varchar (50) not null,
    sexo varchar (2),
	primary key (email)
);
    
select * from cadastro;
show tables;