create table orders (
	orderID int unsigned not null auto_increment primary key,
	customerID int unsigned not null,
	customerName char(50) not null,
	total float(8,2) unsigned not null
);