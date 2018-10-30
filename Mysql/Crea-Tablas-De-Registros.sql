create table category (
	id int unsigned primary key auto_increment unique,
    created_at timestamp,
    updatede_at timestamp Null Default Null,
    name varchar(20) not null unique,
    descriptionc varchar(30) default null,
    isset tinyint unsigned default 1
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table product (
	id int unsigned primary key auto_increment unique,
    created_at timestamp,
	updated_at timestamp NULL DEFAULT NULL,
    name varchar(50) not null,
    price float unsigned not null,
    image varchar(100) default null,
    descriptionp varchar(500) default null,
    brand varchar(30) default null,
    isset tinyint unsigned default 1
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table user(
	id int unsigned primary key auto_increment unique,
    created_at timestamp,
	updated_at timestamp NULL DEFAULT NULL,
    name varchar(30) not null,
    last_name varchar (30) not null,
    username varchar (30) not null unique,
    image varchar (100) default null,
    mail varchar(50) not null,
    phone varchar(35) default null,
    password varchar (100) not null,
    isset tinyint unsigned default 1
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table cart(
	id int unsigned primary key auto_increment unique,
	created_at timestamp,
    updated_at timestamp null default null,
    total float unsigned not null
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table user_cart(
	id int unsigned primary key auto_increment unique,
  	created_at timestamp,
    updated_at timestamp null default null,
    id_username int unsigned not null,
    id_cart int unsigned not null,
    FOREIGN KEY (id_username) references user(id),
    FOREIGN KEY (id_cart) references cart(id)
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table cart_product(
	id int unsigned primary key auto_increment unique,
  	created_at timestamp,
    updated_at timestamp null default null,
    id_product int unsigned not null,
    id_cart int unsigned not null,
    FOREIGN KEY (id_product) references product(id),
    FOREIGN KEY (id_cart) references cart(id)
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table product_categotry (
	id int unsigned primary key auto_increment unique,
  	created_at timestamp,
    updated_at timestamp null default null,
	id_product int unsigned not null,
    id_category int unsigned not null,
    FOREIGN KEY (id_product) references product(id),
	FOREIGN KEY (id_category) references category(id)
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into category (name)
values ('procesadores'),('Notebooks'),('Mother Bords'),('Placas de Video');

insert into product (name, price, descriptionp, brand, image)
values ('Procesador intel i5', 30000, 'Laptop Siragon','Intel','/\images/\procesadores/\Corei57400.jpg'),
	('Procesador Intel i3',10849,'Notebooks Gadnic 15,6','Intel','/\images/\procesadores/\Corei38100.jpg'),
    ('Procesador Ryzen 7',12638,'Notebook Hp 240','RYZEN','/\images/\procesadores/\ryzen1800x.jpg'),
    ('Procesador Ryzen 5',10999,'Notebook Asus Vivobook','RYZEN','/\images/\procesadores/\ryzen52600.jpg'),
    ('Procesador Intel i5',30000,'Laptop Siragon','Intel','/\images/\procesadores/\Corei58500.jpg'),
	('Procesador Ryzen 5',10849,'Notebook Gadnic 15,6','RYZEN','/\images/\procesadores/\ryzen52600X.jpg'),
	('Procesador Intel i5',12638,'Notebook Hp 240','Intel','/\images/\procesadores/\Corei58600.jpg'),
	('Procesador Ryzen 7',30000,'Notebook Asus Vivobook','RYZEN','/\images/\procesadores/\ryzen72700.jpg'),
    ('Procesador Intel i7',20000,'Notebook Asus Vivobook','Intel','/\images/\procesadores/\corei78700.jpg'),
    ('Procesador Ryzen 7',12638,'Notebook Hp 240','RYZEN','/\images/\procesadores/\ryzen72700X.jpg'),
    ('Procesador Intel i7',30000,'Notebook Asus Vivobook','Intel','/\images/\procesadores/\corei78700K.jpg'),
    ('Procesador Ryzen threadripper',30000,'Notebook Asus Vivobook','RYZEN','/\images/\procesadores/\ryzenthreadripper1950X.jpg')
    
    
    