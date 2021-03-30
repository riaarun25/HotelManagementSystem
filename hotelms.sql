create database HotelMS;
use hotelms;
create table customer(
Customer_ID varchar(12),
Name varchar(25) NOT NULL,
Contact varchar(10) NOT NULL,
Address varchar(20) NOT NULL,
Password varchar(30) NOT NULL,
Primary Key(Customer_ID),
Constraint num_check check(length(Contact)=10),
Constraint ID_check check(length(Customer_ID)=12)
);

create table Payment(
Bill_No int AUTO_INCREMENT,
Customer_ID varchar(12),
Total_Amount float,
Primary key(Bill_No),
Foreign key(Customer_ID) references Customer(Customer_ID)
);

create table Employee(
Emp_ID varchar(4) Primary key NOT NULL,
Name varchar(25) NOT NULL,
Contact varchar(10) NOT NULL,
Address varchar(20) NOT NULL,
Designation varchar(20) NOT NULL,
Salary int NOT NULL,
Constraint emp_num_check check(length(Contact)=10)
);

create table Rooms(
Room_No varchar(4),
Type varchar(10),
Price float,
Status varchar(10),
Primary key(Room_no)
);

create table Booking(
Booking_No int AUTO_INCREMENT,
Check_in date NOT NULL,
Check_out date NOT NULL,
Customer_ID varchar(12),
Room_No varchar(4),
Primary Key(Booking_No),
Foreign key(Customer_ID) references Customer(Customer_ID),
Foreign key(Room_No) references Rooms(Room_No),
Constraint date_check check(Check_out>=Check_in)
);

create table Services(
Service_No varchar(5),
Description varchar(20),
Price float,
Emp_ID varchar(4),
Primary key(Service_No),
Foreign Key(Emp_ID) references Employee(Emp_ID)
);

create table Orders(
Order_No int AUTO_INCREMENT,
Customer_ID varchar(12),
Service_No varchar(5),
Primary key(Order_No),
Foreign key(Customer_ID) references Customer(Customer_ID),
Foreign key(Service_No) references Services(Service_No)
);

insert into rooms values
('S001','Single',1500,'Available'),
('D002','Double',2500,'Available'),
('DE03','Delux',3500,'Available'),
('SU04','Suite',4500,'Available'),
('D005','Double AC','3500','Available'),
('S006','Single AC','2500','Available'),
('SU07','Suite AC','5500','Available'),
('DE08','Deluxe AC','4500','Available');

insert into employee values
('EM01','Ravindar kumar','9101028001','Bengaluru,Karnataka','Manager',70000),
('EM02','Rujin Shrestha','9108871103','Vellore,Tamil Nadu','HouseKeeping',25000),
('EM03','Ria Arun','1508423884','New Delhi,Delhi','Beverage manager',35000),
('EM04','Divya Sharma','6364682127','Mumbai,Maharashtra','Chef',40000),
('EM05','Samyogita Bhandari','9150467979','Chennai,Tamil Nadu','Receptionist',33000);

insert into services values
('SR001','Laundry',250,'EM02'),
('SR002','Beverages',150,'EM03'),
('SR003','Lunch',500,'EM04'),
('SR004','Dinner',500,'EM04'),
('SR005','Room Cleaning',200,'EM02');
