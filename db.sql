CREATE DATABASE TecHub;
USE TecHub;

CREATE TABLE Customer (
    CustomerID INT PRIMARY KEY AUTO_INCREMENT,
    CustomerName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE,
    ContactNo VARCHAR(255) NOT NULL,
    RegNo VARCHAR(255) NOT NULL,
    CustPassword VARCHAR(255) UNIQUE
);

CREATE TABLE TechOfficer (
    TechOfficerID INT PRIMARY KEY AUTO_INCREMENT,
    TechOfficerName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE,
    ContactNo VARCHAR(255) NOT NULL,
    RegNo VARCHAR(255) NOT NULL,
    TOPassword VARCHAR(255) UNIQUE,
    ProfilePicture BLOB NOT NULL
);

CREATE TABLE Admin (
    AdminID INT PRIMARY KEY AUTO_INCREMENT,
    AdminName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE,
    ContactNo VARCHAR(255) NOT NULL,
    RegNo VARCHAR(255) NOT NULL,
    AdminPassword VARCHAR(255) UNIQUE
);

CREATE TABLE invoice (
    InvoiceId INT PRIMARY KEY AUTO_INCREMENT,
    Item_Service VARCHAR(255) NOT NULL,
    Inv_des VARCHAR(255),
    Qty INT,
    Price DECIMAL(10, 2),
    Amount DECIMAL(10, 2) NOT NULL
);

CREATE TABLE Ticket (
    TicketId INT PRIMARY KEY AUTO_INCREMENT,
    OpenDateTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    ClosedDateTime DATE NOT NULL,
    TStatus VARCHAR(255) NOT NULL,
    TPriority INT NOT NULL,
    TicketDes VARCHAR(255) NOT NULL,
    customerEmail VARCHAR(255),
    IssueType VARCHAR(255),
    Telephone VARCHAR(255),
    CustomerId INT,
    TechOfficerId INT,
    InvoiceId INT,
    FOREIGN KEY (CustomerId) REFERENCES Customer(CustomerID),
    FOREIGN KEY (TechOfficerId) REFERENCES TechOfficer(TechOfficerID),
    FOREIGN KEY (InvoiceId) REFERENCES Invoice(InvoiceId)
);