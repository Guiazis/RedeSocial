create schema cadastros default char set utf8;
use cadastros;

create table cadastro (
	id int not null,
    nome varchar (30) not null,
    sobrenome varchar(45) not null,
	usernome varchar(10) not null,
	senha varchar(700) not null,
    email varchar (50) not null,
    sexo varchar (2),
	primary key (usernome)
);
insert into cadastro (id,nome,sobrenome,usernome,senha,email,sexo)
	values (1,'Samuel','Rimes','Samu','1234','samuelrimes@gmail.com', 'M');
    
    select * from cadastro;
    show tables;
    
 delete  from cadastro
where id != 0 and usernome !='';