
Create database fitzone;

Use fitzone;

create table signup(
id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(255) ,
    email VARCHAR(50) ,
    password VARCHAR(255),
    PRIMARY KEY (id)
);

create table membership(
   name VARCHAR(255) NOT NULL,
   phonenumber INTEGER(25) NOT NULL,
   Gender VARCHAR(55) NOT NULL,
   Branch VARCHAR(55) NOT NULL,
   Membership VARCHAR(255) NOT NULL,
   Email VARCHAR(255) NOT NULL,
  Address VARCHAR(255) NOT NULL
);


create table massages(
     username VARCHAR(55) NOT NULL,
     email VARCHAR(55) NOT NULL,
     subject VARCHAR(255) NOT NULL,
     massage VARCHAR(500) NOT NULL
);


create table admin(
    email VARCHAR(55) NOT NULL,
     password VARCHAR(55) NOT NULL
);


create table blogs(
    title VARCHAR(55) NOT NULL,
    images LONGBLOB,
     Description VARCHAR(5000) NOT NULL
);

create table Product(
    Productname VARCHAR(55) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    productDescription VARCHAR(5000) NOT NULL,
    images LONGBLOB
);

create table cart(
     Productname VARCHAR(55) NOT NULL,
     Price DECIMAL(10, 2) NOT NULL,
     images LONGBLOB
);

CREATE TABLE orders (
    name VARCHAR(50) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    contactNumber VARCHAR(15) NOT NULL,
    zipCode VARCHAR(15) NOT NULL,        
    method VARCHAR(50) NOT NULL,
    product VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,              
    totalprice DECIMAL(10, 2) NOT NULL     
);








 


