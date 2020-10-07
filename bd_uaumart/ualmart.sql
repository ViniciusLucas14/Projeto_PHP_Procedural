create database if not exists ualmart;
use ualmart;

create table if not exists usuarios_adm(
idUsuarioadm int primary key auto_increment,
Nome varchar (50) NOT NULL,
Email varchar(50) NOT NULL,
Senha varchar (255) NOT NULL
);

INSERT INTO usuarios_adm (idUsuarioadm, Nome, Email, Senha) VALUES (1, 'Vinicius', 'vlucassouza@gmail.com', '123456');
-- LOGIN: email: vlucassouza@gmail.com || senha: 123456

create table if not exists categorias(
IDCategoria int primary key auto_increment,
nome varchar(50) NOT NULL UNIQUE
);
Insert into categorias (IDCategoria, nome) values (1, "Eletrodomésticos");
Insert into categorias (IDCategoria, nome) values (2, "Itens de Casa");
Insert into categorias (IDCategoria, nome) values (4, "Tecnologia");
Insert into categorias (IDCategoria, nome) values (5, "Esporte e lazer");
Insert into categorias (IDCategoria, nome) values (6, "Jóias");
Insert into categorias (IDCategoria, nome) values (7, "Relógios");
Insert into categorias (IDCategoria, nome) values (8, "Brinquedos");
Insert into categorias (IDCategoria, nome) values (9, "Ferramentas");
Insert into categorias (IDCategoria, nome) values (10, "Acessórios");
Insert into categorias (IDCategoria, nome) values (11, "Beleza e Cuidado Pessoal");
Insert into categorias (IDCategoria, nome) values (12, "Moda e Roupas");
Insert into categorias (IDCategoria, nome) values (13, "Leitura");
Insert into categorias (IDCategoria, nome) values (14, "Calçados");
Insert into categorias (IDCategoria, nome) values (15, "Itens Pessoais");

Create table if not exists Produtos(
IDProduto int primary key auto_increment,
Nome varchar(50) NULL,
Detalhes varchar(50) NULL,
Descricao varchar(100) NULL,
Marca varchar (50) NULL,
Valor decimal NULL,
ID_Categoria int NULL,
ID_Adm int NULL,
Foto varchar(100),
foreign key (ID_Categoria) references Categorias(idcategoria),
foreign key (ID_Adm) references Vendedores(idUsuarioadm)
 );

create table if not exists Clientes(
IDCliente int primary key auto_increment,
Nome varchar(50) NOT NULL,
Cpf int(11) NOT NULL UNIQUE,
Email varchar(30) NOT NULL UNIQUE,
Sexo char(1) NOT NULL,
Endereco varchar(100) NOT NULL,
Telefone varchar(30)NOT NULL,
Data_nasc Date NOT NULL,
Senha varchar(100) NOT NULL,
ID_Cidade int,
foreign key (ID_Cidade) references Cidades(idcidade)
);  
