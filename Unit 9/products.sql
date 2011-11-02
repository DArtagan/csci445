create table products (
	productID int unsigned not null auto_increment primary key,
	name char(50) not null,
	plural char(50) not null,
	price float(6,2) unsigned not null
);

insert into products values 
	(NULL, 'box', 'boxes', 5.00),
	(NULL, 'tape', 'rolls of tape', 7.00),
	(NULL, 'biodegradable packing peanut', 'biodegradable packing peanuts', 3.00);