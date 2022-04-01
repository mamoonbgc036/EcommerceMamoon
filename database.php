<?php
$con = mysqli_connect('localhost','root','','show');
$sql = "CREATE TABLE brands(
    brandId int(10) NOT NULL AUTO_INCREMENT,
    brandName varchar(50),
    PRIMARY KEY(brandId)
)";

mysqli_query($con,$sql);

$sql1 = "CREATE TABLE categories(
    catId int(10) NOT NULL AUTO_INCREMENT,
    catName varchar(50),
    image varchar(50),
    PRIMARY KEY(catId)
)";

mysqli_query($con,$sql1);

$sql2 = "CREATE TABLE orders(
    id int(10) NOT NULL AUTO_INCREMENT,
    name varchar(50),
    product_name varchar(50),
    quantity varchar(150),
    price varchar(150),
    token varchar(50),
    PRIMARY KEY(id)
)";

mysqli_query($con,$sql2);

$sql3 = "CREATE TABLE products(
    productId int(10) NOT NULL AUTO_INCREMENT,
    brand varchar(50),
    model varchar(50),
    categoryId varchar(150),
    details varchar(350),
    address varchar(150),
    price varchar(50),
    offer varchar(50),
    image varchar(50),
    PRIMARY KEY(productId)
)";

mysqli_query($con,$sql3);

$sql4 = "CREATE TABLE admin(
    adminId int(10) NOT NULL AUTO_INCREMENT,
    first varchar(50),
    last varchar(50),
    phone varchar(150),
    username varchar(150),
    image varchar(50),
    password varchar(50),
    PRIMARY KEY(adminId)
)";

mysqli_query($con,$sql4);

$sql5 = "CREATE TABLE address(
    token varchar(100) NOT NULL,
    name varchar(50),
    address varchar(250),
    phones varchar(50),
    PRIMARY KEY(token)
)";

mysqli_query($con,$sql5);

$sql6 = "CREATE TABLE notices(
    id int(10) NOT NULL AUTO_INCREMENT,
    heading varchar(50),
    description varchar(250),
    PRIMARY KEY(id)
)";

mysqli_query($con,$sql6);