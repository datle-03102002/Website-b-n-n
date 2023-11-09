-- create database Restaurant;
-- use Restaurant;
/*
Created		5/20/2023
Modified		5/22/2023
Project		
Model			
Company		
Author		
Version		
Database		MS SQL 2005 
*/
-- update customers set email = 'abc2.com' where customer_id = 'CS06';
-- select * from customers;
-- select * from foods;
-- select * from news;
-- select * from order_;
-- select * from menu;
-- select * from orderdetail;
-- select * from dinnertable;
-- select * from detaildinnertable;
-- select * from restaurant;
-- select * from employees;
-- select * from carts;
-- drop database restaurant;
-- Drop table DetailDinnerTable;
-- DELETE FROM carts
-- WHERE customer_id = 'CS06';
-- Drop table OrderDetail;
-- SELECT cart_id from carts where customer_id = 'CS05';
-- Drop database restaurant;

-- Drop table News;

-- Drop table Order_;

-- Drop table Employees;

-- Drop table Customers;

-- Drop table DinnerTable;

-- Drop table Foods;

-- Drop table Menu;


-- SELECT * FROM customers ORDER BY customer_id DESC limit 1;
Create table Menu
(
	menu_id Char(10) NOT NULL,
	name Nvarchar(50) ,
	description Text ,
Primary Key (menu_id)
) ;


Create table Foods
(
	food_id Char(10) NOT NULL,
	menu_id Char(10) NOT NULL,
	name Nvarchar(50) ,
	images Char(100) ,
	descriptions Text ,
	vote Decimal(2,1) ,
	price Decimal(10,0) ,
	quantity Integer ,
	Primary Key (food_id)
) ;


Create table DinnerTable
(
	dinnerTable_id Char(5) NOT NULL,
	tableNumber Bigint NOT NULL, UNIQUE (tableNumber),
	seat Bigint ,
	price Decimal(8,1) ,
	type Bit ,
	quantity Integer ,
Primary Key (dinnerTable_id)
) ;


Create table Customers
(
	customer_id Char(10) NOT NULL,
	fullName Nvarchar(50) ,
	phone Char(10) ,
	address Nvarchar(50) ,
	email Nvarchar(100) UNIQUE,
	password Char(30) ,
	Primary Key (customer_id)
) ;
create table carts
(
	cart_id char(10) not null,
    customer_id char(10) not null,
    food_id Char(10) NOT NULL,
    quantity int,
    primary key(cart_id,customer_id,food_id)
) ;
Create table Employees
(
	employee_id Char(10) NOT NULL,
	fullName Nvarchar(50) ,
	gender Nvarchar(10),
	id_card Char(12) ,
	birthday Datetime ,
	phone Char(10) ,
	email Char(30) UNIQUE,
	password Char(30) ,
	permission Nvarchar(30) ,
Primary Key (employee_id)
) ;


Create table Order_
(
	order_id Char(10) NOT NULL,
	customer_id Char(10) NOT NULL,
	order_date Datetime,
	order_time Datetime,
Primary Key (order_id)
) ;


Create table News
(
	new_id Char(10) NOT NULL,
	title text NOT NULL,
	detail text NOT NULL,
	author Nvarchar(50) NOT NULL,
	dateSubmitted Datetime NOT NULL,
	name Nvarchar(50) NOT NULL,
Primary Key (new_id)
) ;

Create table Restaurant
(
	name Nvarchar(50) NOT NULL,
	phone Char(10) NOT NULL,
	address Nvarchar(50) NOT NULL,
	email Char(50) NOT NULL,
Primary Key (name)
) ;

Create table OrderDetail
(
	order_id Char(10) NOT NULL,
	food_id Char(10) NOT NULL,
	orderDate Datetime NOT NULL,
	state Char(20) NOT NULL,
	quantity Integer NOT NULL,
	price Decimal(10,0) NOT NULL,
	ship Bit NOT NULL,
	Primary Key (order_id,food_id)
);

Create table DetailDinnerTable
(
	order_id Char(10) NOT NULL,
	dinnerTable_id Char(5) NOT NULL,
	orderDate Datetime NOT NULL,
	time Datetime NOT NULL,
	quantity Integer NOT NULL,
	price Decimal(10,0) NOT NULL,
Primary Key (order_id,dinnerTable_id)
) ;

Alter table Foods add  foreign key(menu_id) references Menu (menu_id)  on update cascade on delete cascade; 
Alter table OrderDetail add  foreign key(food_id) references Foods (food_id)  on update cascade on delete cascade ;
Alter table DetailDinnerTable add  foreign key(dinnerTable_id) references DinnerTable (dinnerTable_id)  on update cascade on delete cascade ;

Alter table Order_ add  foreign key(customer_id) references Customers (customer_id)  on update cascade on delete cascade ;

Alter table OrderDetail add  foreign key(order_id) references Order_ (order_id)  on update cascade on delete cascade ;

Alter table DetailDinnerTable add  foreign key(order_id) references Order_ (order_id)  on update cascade on delete cascade ;

Alter table News add  foreign key(name) references Restaurant (name)  on update cascade on delete cascade ;

alter table carts add foreign key(food_id) references foods(food_id) on update cascade on delete cascade;
alter table carts add foreign key(customer_id) references customers(customer_id) on update cascade on delete cascade;


-- select * from carts;


Insert into menu values('menu01',N'Trái cây','');
Insert into menu values('menu02',N'Đồ uống','');
Insert into menu values('menu03',N'Đồ ăn','');
INSERT INTO foods values('FOOD01','menu01',N'Táo','imgs/menu/menu-item-1.png','',3,100000.0,30);
INSERT INTO foods values('FOOD02','menu02',N'Nước cam','imgs/menu/menu-item-1.png','',4,100000.0,20);
INSERT INTO foods values('FOOD03','menu03',N'Lẩu bốn mùa','imgs/menu/menu-item-1.png','',5,100000.0,10);
INSERT INTO foods values('FOOD04','menu01',N'Cam','imgs/menu/menu-item-2.png','',5,100000.0,120);
INSERT INTO foods values('FOOD05','menu01',N'Lê','imgs/menu/menu-item-1.png','',5,100000.0,180);
INSERT INTO foods values('FOOD06','menu03',N'Thị bò nướng đá','imgs/menu/menu-item-1.png','',5,100000.0,180);
INSERT INTO foods values('FOOD07','menu02',N'Nước ép táo','imgs/menu/menu-item-2.png','',5,100000.0,10);
INSERT INTO foods values('FOOD08','menu03',N'Cua hoàng đế','imgs/menu/menu-item-3.png','',5,100000.0,100);
INSERT INTO foods values('FOOD09','menu03',N'Thịt lợn cháy cạnh','imgs/menu/menu-item-4.png','',5,100000.0,100);
INSERT INTO foods values('FOOD010','menu03',N'Thịt kho tàu','imgs/menu/menu-item-5.png','',5,100000.0,100);
INSERT INTO foods values('FOOD011','menu03',N'Cá kho gừng','imgs/menu/menu-item-2.png','',5,100000.0,100);




INSERT INTO customers values('CS01',N'Nguyễn Văn A','0867687695',N'Việt Tiến, Việt Yên, Bắc Giang','abc123@gmail.com','abc123!'),
							('CS02',N'Nguyễn Văn B','0867687695',N'Việt Tiến, Việt Yên, Bắc Giang','abc1234@gmail.com','abc123!');

Insert into restaurant values(N'Nhà hàng ShinQua','0867687695','Kim Chung, Hoài Đức, Hà Nội','dvquan210502@gmail.com');


Insert into news values('N01',N'Món ngon trong tuần 1','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
						('N02',N'Món ngon trong tuần 2','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N03',N'Món ngon trong tuần 3','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N04',N'Món ngon trong tuần 4','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N05',N'Món ngon trong tuần 5','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N06',N'Món ngon trong tuần 6','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N07',N'Món ngon trong tuần 7','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N08',N'Món ngon trong tuần 8','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N09',N'Món ngon trong tuần 9','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N10',N'Món ngon trong tuần 10','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N11',N'Món ngon trong tuần 11','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua'),
                        ('N12',N'Món ngon trong tuần 12','Chưa có gì','Đoàn Văn Quân','2023-05-11',N'Nhà hàng ShinQua');

                    
                        

Insert into menu values('MN01',N'Đồ uống','Giải khát'),
						('MN02',N'Hoa quả','Giải khát'),
                        ('MN03',N'Đồ chín','Giải khát'),
                        ('MN04',N'Tráng miệng','Giải khát'),
                        ('MN05',N'Đồ hải sản','Giải khát');

-- Insert into orderdetail values('OD01','FOOD01','2023-05-11',N'Đang giao',3,1000000,0);
-- Insert into orderdetail values('OD01','FOOD02','2023-05-11',N'Đang giao',3,1000000,0),
--                                 ('OD01','FOOD03','2023-05-11',N'Đang giao',3,1000000,0),
--                                 ('OD01','FOOD04','2023-05-11',N'Đang giao',3,1000000,0),
--                                 ('OD01','FOOD05','2023-05-11',N'Đang giao',3,1000000,0),
--                                 ('OD02','FOOD01','2023-05-11',N'Đang giao',3,1000000,1),
--                                 ('OD03','FOOD07','2023-05-11',N'Đang giao',3,1000000,1),
--                                 ('OD04','FOOD05','2023-05-11',N'Đang giao',3,1000000,1),
--                                 ('OD05','FOOD03','2023-05-11',N'Đang giao',3,1000000,0),
--                                 ('OD05','FOOD02','2023-05-11',N'Đang giao',3,1000000,0),
--                                 ('OD05','FOOD01','2023-05-11',N'Đang giao',3,1000000,0),
--                                 ('OD05','FOOD06','2023-05-11',N'Đang giao',3,1000000,0);
-- Update orderdetail set ship = 0 where order_id = 'OD01' and food_id = 'FOOD03'; 
Insert into dinnertable values('TB01',1,6,100000,0,1),
								('TB02',2,4,100000,0,1),
                                ('TB03',3,4,100000,0,1),
                                ('TB04',4,8,100000,1,1),
                                ('TB05',5,10,100000,1,1),
                                ('TB06',6,12,100000,1,1),
                                ('TB07',7,6,100000,0,1),
                                ('TB08',8,4,100000,0,1),
                                ('TB09',9,4,100000,0,1),
                                ('TB10',10,8,100000,1,1),
                                ('TB11',11,2,100000,0,1),
                                ('TB12',12,2,100000,0,1),
                                ('TB13',13,2,100000,0,1);
