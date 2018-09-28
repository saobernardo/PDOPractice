#drop database classyrenting;
create database classyrenting;
use classyrenting;

create table cliente(
id_cliente int not null primary key auto_increment,
nome_cliente varchar(100) not null,
idade int(2) not null,
rg int(9) not null,
cpf bigint not null,
data_nascimento date not null,
valor_carteira decimal (6,2) not null,
celular bigint,
cartao_credito bigint,
cartao_debito bigint
)engine=innodb;

alter table cliente add column senha varchar(25) not null;
alter table cliente add column lembrete_senha varchar(25) not null;
alter table cliente modify lembrete_senha varchar(75) not null;

select * from cliente;
#delete from cliente where id_cliente=5;

insert into cliente(id_cliente,nome_cliente,idade,rg,cpf,data_nascimento,valor_carteira,celular,senha,lembrete_senha)
values (1,'Lucas São Bernardo Pinheiro',24,414172358,42676128892,'1994-07-14',0.00,511998965114,'Pyramaze1','Senha para contas de trabalho');

create table endereco(
id_endereco int not null primary key auto_increment,
logradouro varchar(60) not null,
cep int(8) not null,
bairro varchar(45) not null,
cidade varchar(45) not null,
estado varchar(45) not null,
pais varchar(45) not null
)engine=innodb;

alter table endereco add column id_cliente int not null;
alter table endereco add constraint fk_idcliente foreign key(id_cliente) references cliente(id_cliente);

create table historico(
idhistorico int not null primary key auto_increment,
nome_jogo varchar(50) not null,
data_emprestimo date not null,
data_devolucao date not null,
valor_aluguel decimal(4,2) not null
)engine=innodb;

alter table historico add column id_cliente int not null;
alter table historico add column id_aluguel int not null;
alter table historico add constraint fk_idcliente_historico foreign key(id_cliente) references cliente(id_cliente);
alter table historico add constraint fk_idaluguel_historico foreign key(id_aluguel) references aluguel(id_aluguel);

create table aluguel(
id_aluguel int not null primary key auto_increment,
nome_cliente varchar(100) not null,
nome_jogo varchar (50) not null,
valor_aluguel decimal (4,2) not null,
data_emprestimo date not null,
data_devolucao date not null,
horas_jogo int(4) not null,
faixa_etaria_jogo int(2) not null
)engine=innodb;

alter table aluguel add column id_cliente int not null;
alter table aluguel add column id_jogo int not null;
alter table aluguel add constraint fk_idcliente_aluguel foreign key(id_cliente) references cliente(id_cliente);
alter table aluguel add constraint fk_idjogo_aluguel foreign key(id_jogo) references jogo(id_jogo);

create table requisicao_devolucao(
id_requisicao int not null primary key auto_increment,
descricao_problema varchar(1024) not null,
horas_jogo int (4) not null,
data_emprestimo date not null,
data_devolucao date not null
)engine=innodb;

alter table requisicao_devolucao add column id_cliente int not null;
alter table requisicao_devolucao add column id_jogo int not null;
alter table requisicao_devolucao add column id_aluguel int not null;
alter table requisicao_devolucao add constraint fk_idcliente_requisicao foreign key (id_cliente) references cliente(id_cliente);
alter table requisicao_devolucao add constraint fk_idjogo_requisicao foreign key (id_jogo) references jogo(id_jogo);
alter table requisicao_devolucao add constraint fk_idaluguel_requisicao foreign key (id_aluguel) references aluguel(id_aluguel);

create table jogo(
id_jogo int not null primary key auto_increment,
nome_jogo varchar(50) not null,
plataforma varchar(25) not null,
descricao_jogo varchar(1024) not null,
data_lancamento date not null,
preco_aluguel decimal (4,2) not null,
faixa_etaria int(2) not null
)engine=innodb;

alter table jogo add column media_nota decimal (3,1) not null;

alter table jogo add column id_media int not null;
alter table jogo add constraint fk_idmedia_jogo foreign key (id_media) references media_nota(id_media);

create table plataforma(
id_plataforma int not null primary key auto_increment,
nome_plataforma varchar(25) not null,
qte_jogos int(5) not null,
descricao_plataforma varchar(1024) not null
)engine=innodb;

select * from plataforma;
insert into plataforma(nome_plataforma,qte_jogos,descricao_plataforma)
values('Nintendo Switch',999,'Caro... pacas!');

create table plataforma_jogo(
id_jogo int not null,
id_plataforma int not null,
foreign key (id_jogo) references jogo(id_jogo),
foreign key (id_plataforma) references plataforma(id_plataforma)
)engine=innodb;

#drop table plataforma_jogo;

create table avaliacao_jogo(
id_avalicacao int not null primary key auto_increment,
nota_jogo int(2) not null,
comentario varchar(256) not null
)engine=innodb;

alter table avaliacao_jogo add column id_cliente int not null;
alter table avaliacao_jogo add column id_jogo int not null;
alter table avaliacao_jogo add constraint fk_idcliente_avaliacao foreign key (id_cliente) references cliente(id_cliente);
alter table avaliacao_jogo add constraint fk_idjogo_avaliacao foreign key (id_jogo) references jogo(id_jogo);

#DÚVIDA: Para criar uma conta de todas as notas já colocadas na tabela avaliacao_jogo e colocar o resultado em um campo de outra tabela, como fica a relação?

create table media_nota(
id_media int not null primary key auto_increment,
media_nota decimal(3,1) not null
)engine=innodb;

alter table media_nota add column id_jogo int not null;
alter table media_nota add constraint fk_idjogo_media foreign key (id_jogo) references jogo(id_jogo);