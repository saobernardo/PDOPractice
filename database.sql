#drop database classyrenting;
create database classyrenting;
use classyrenting;

#Criando a tabela cliente
create table cliente(
id_cliente int not null primary key auto_increment,
nome_cliente varchar(100) not null,
cpf bigint not null,
data_nascimento date not null,
valor_carteira decimal (6,2) not null,
senha varchar(50) not null,
lembrete_senha varchar (75) not null,
celular bigint,
cartao_credito bigint,
cartao_debito bigint
)engine=innodb;

select * from cliente;

#Mudando o valor defult na coluna pais
alter table cliente modify pais varchar(50) not null default 'Brasil';
#Adicionando colunas esquecidas
alter table cliente add column imagem_perfil blob not null;
alter table cliente add column sexo enum('F','M') not null default 'M';
alter table cliente add column email varchar(100) not null after sexo;
alter table cliente modify email varchar(100)not null unique;
alter table cliente add column pais varchar(50) not null;
alter table cliente add column estado varchar(50) not null;
alter table cliente add column cidade varchar(50) not null;
#Mudando a posição na tabela
alter table cliente drop column sexo;
alter table cliente add column sexo enum('F','M') not null default 'M' after data_nascimento;
alter table cliente modify celular bigint after email;
#Mudando o nome de um campo dda tabela
alter table cliente change sexo genero enum('F','M') not null default 'M';
#Removendo o campo de cpf
alter table cliente drop column cpf;
#dropando colunas desnecessárias 
alter table cliente drop column cartao_debito;
alter table cliente drop column cartao_credito;
alter table cliente drop column valor_carteira;
alter table cliente drop column imagem_perfil;


#Criando a tabela carteira
create table carteira(
id_carteira int  primary key auto_increment,
valor_carteira decimal (5,2) not null
)engine=innodb;

#Criando chaves estrangeiras na tabela carteira
alter table carteira add column id_cliente int not null;
alter table carteira add constraint fk_idcliente_carteira foreign key(id_cliente) references cliente(id_cliente);

#Criando a tabela pgto
create table pgto(
id_pgto int primary key auto_increment,
nome_titular varchar(100) not null,
cpf_titular bigint not null,
num_cartao bigint not null
)engine=innodb;

select* from pgto;
#Mudando as propriedades de cpf_titular
alter table pgto drop column cpf_titular;
alter table pgto add column cpf_titular bigint not null unique after nome_titular;
alter table pgto modify cpf_titular bigint not null;
#Criando chaves estrangeiras na tabela pgto
alter table pgto add column id_cliente int not null;
alter table pgto add constraint fk_idcliente_pgto foreign key(id_cliente) references cliente(id_cliente);

#Criando tabela histórico
create table historico(
idhistorico int not null primary key auto_increment,
nome_jogo varchar(50) not null,
data_emprestimo date not null,
data_devolucao date not null,
valor_aluguel decimal(4,2) not null
)engine=innodb;

#Adicionando chaves estrangeiras da tabela historico
alter table historico add column id_cliente int not null;
alter table historico add column id_aluguel int not null;
alter table historico add constraint fk_idcliente_historico foreign key(id_cliente) references cliente(id_cliente);
alter table historico add constraint fk_idaluguel_historico foreign key(id_aluguel) references aluguel(id_aluguel);

#Criando tabela aluguel
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

#Deletando uma coluna desnecessária
alter table aluguel drop column faixa_etaria_jogo;

#Crianco chaves estrangeiras da tabela aluguel
alter table aluguel add column id_cliente int not null;
alter table aluguel add column id_jogo int not null;
alter table aluguel add constraint fk_idcliente_aluguel foreign key(id_cliente) references cliente(id_cliente);
alter table aluguel add constraint fk_idjogo_aluguel foreign key(id_jogo) references jogo(id_jogo);
alter table aluguel add column id_tag int not null;
alter table aluguel add constraint fk_idtag foreign key(id_tag) references tag_jogo(id_tag);

#Criando a tabela de requisição
create table requisicao_devolucao(
id_requisicao int not null primary key auto_increment,
descricao_problema varchar(1024) not null,
horas_jogo int (4) not null,
data_emprestimo date not null,
data_devolucao date not null
)engine=innodb;

#Adicionando chaves estrangeiras a tabela de requisição
alter table requisicao_devolucao add column id_cliente int not null;
alter table requisicao_devolucao add column id_jogo int not null;
alter table requisicao_devolucao add column id_aluguel int not null;
alter table requisicao_devolucao add constraint fk_idcliente_requisicao foreign key (id_cliente) references cliente(id_cliente);
alter table requisicao_devolucao add constraint fk_idjogo_requisicao foreign key (id_jogo) references jogo(id_jogo);
alter table requisicao_devolucao add constraint fk_idaluguel_requisicao foreign key (id_aluguel) references aluguel(id_aluguel);

#Crindo a tabela de jogos
create table jogo(
id_jogo int not null primary key auto_increment,
nome_jogo varchar(50) not null,
plataforma varchar(25) not null,
descricao_jogo varchar(1024) not null,
data_lancamento date not null,
preco_aluguel decimal (4,2) not null,
faixa_etaria int(2) not null
)engine=innodb;

#Adicionando uma coluna de Imagem do jogo na tabela jogo
alter table jogo add column imagem_jogo blob not null;
#adicionando a coluna de média de notas à tabela
alter table jogo add column media_nota decimal (3,1) not null;
#Adicionando chaves estrangeiras à tabela de jogos
alter table jogo add column id_media int not null;
alter table jogo add constraint fk_idmedia_jogo foreign key (id_media) references media_nota(id_media);
alter table jogo add column id_tag int not null;
alter table jogo add constraint fk_idtag_jogo foreign key (id_tag) references tag_jogo(id_tag);
#dropando colunas desnecessárias
alter table jogo drop column plataforma;
alter table jogo drop column faixa_etaria;
alter table jogo drop column preco_aluguel;
#Removendo uma chave etrangeira
alter table jogo drop foreign key fk_idmedia_jogo;
alter table jogo drop column id_media;

#Criando a tabela de avaliação do jogo
create table avaliacao_jogo(
id_avalicacao int not null primary key auto_increment,
nota_jogo int(2) not null,
comentario varchar(256) not null
)engine=innodb;

select * from avaliacao_jogo;
#Corrigindo o nome da chave primária
alter table avaliacao_jogo change id_avalicacao id_avaliacao int;

#Adicionando chaves estrangeiras a tabela de avaiação do jogo
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
alter table media_nota add column id_avaliacao int not null;
alter table media_nota add constraint fk_idavaliacao foreign key (id_avaliacao) references avaliacao_jogo(id_avaliacao);

create table categoria(
id_categoria int not null primary key auto_increment,
nome_categoria varchar(70) not null
)engine=innodb;

select * from categoria;

insert into categoria (nome_categoria)
values ('4X'),('First Person Adventure'),('Beat em Up'),('bishōjo'),('Business'),('Construct and Management'),
('Dungeon Crawler'),('Educational'),('Eroge'),('Escape the Room'),('Sport'),('Strategy'),('Real-time Strategy'),
('Turn-based Strategy'),('Hack n Slash'),('Card Game'),('Vehicle Combat'),('VR'),('Alternative Reality Game'),
('Rhythm'),('Survival'),('Tactical Shooting Game'),('Action'),('Action/Adventure'),('Audio'),('Adventure'),('Battle-Royale'),
('City Construction'), ('Race'),('War'),('Labyrinth'),('Fighting Game'),('Music'),('Platform'),('Group'),
('Idle Game'),('Stealth'),('Shooting'),('Massively Muliplayer Online First Person-Shooter'),('Metroidvania'),
('Multi-user Dungeon'), ('Massively Multiplayer Online Real-Time Strategy'),('Massively Multiplayer Online Role-Playing Game'),
('Massively Multiplayer Online Social Game'),('Multiplyer Online Battle Arena'),('Open-World'),('Pluzzle'),
('Role-Playing game (RPG)'),('Roguelike'),('Action Role-Playing Game'),('Strategy Role-Playing Game'),
('Shoot em Up'),('Simulation game'),('Air Combat Simulation'),('Racing Simulation'),('Romance Simulation'),
('Life Simulation'),('Surival Horror'),('Real-Time Tactics'),('First Person Shooter'),('Third Person Shooter'),
('Tower Defense'),('Visual Romance');

create table jogo_has_categoria(
id_jogo int not null,
id_categoria int not null,
foreign key (id_jogo) references jogo(id_jogo),
foreign key (id_categoria) references categoria(id_categoria)
)engine=innodb;

create table tag_jogo(
id_tag int not null primary key auto_increment,
nome_tag varchar(45) not null,
preco_aluguel decimal(4,2) not null
)engine=innodb;

insert into tag_jogo (nome_tag, preco_aluguel)
values ('Verde', 15.00),
('Amarelo', 8.00),
('Vermelho', 5.00),
('Preto', 4.00);

create table faixa_etaria(
id_faixaetaria int not null primary key auto_increment,
faixa_etaria tinyint not null
)engine = innodb;

alter table faixa_etaria add column nome_faixaetaria varchar(30) not null;

insert into faixa_etaria(faixa_etaria, nome_faixaetaria)
values (3, 'Early Childhood (EC)'),
(6, 'Everyone (E)'),
(10, 'Everyone 10+ (E10+)'),
(13, 'Teen (T)'),
(17, 'Mature (M)'),
(18, 'Adults Only (AO)');

select * from faixa_etaria;

create table jogo_has_faixaetaria(
id_jogo int not null,
id_faixaetaria int not null,
foreign key (id_jogo) references jogo(id_jogo),
foreign key (id_faixaetaria) references faixa_etaria(id_faixaetaria)
)engine = innodb;