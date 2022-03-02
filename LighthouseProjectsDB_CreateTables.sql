/****************************
Lighthouse Projects Database 
Create tables


*****************************/

--CREATE DATABASE LighthouseProjectsDB
--GO
--USE LighthouseProjectsDB
--GO

CREATE TABLE `Volunteer` (
  `VolunteerID` int,
  `FirstName` varchar(50),
  `LastName` varchar(50),
  `PhoneNumber` varchar(10),
  `Address` varchar(50),
  `City` varchar(50),
  `State` char(2),
  `Zip` char(5),
  PRIMARY KEY (`VolunteerID`)
);

CREATE TABLE `Event` (
  `EventID` int,
  `Date_Time` DateTime,
  `Address` varchar(50),
  `City` varchar(50),
  `State` char(2),
  `Zip` char(5),
  PRIMARY KEY (`EventID`)
);

CREATE TABLE `Donator` (
  `DonatorID` int,
  `Name` varchar(50),
  `ContactFirstName` varchar(50),
  `ContactLastName` varchar(50),
  `PhoneNumber` varchar(10),
  `City` varchar(50),
  `State` char(2),
  `Zip` char(5),
  PRIMARY KEY (`DonatorID`)
);

CREATE TABLE `Donation` (
  `DonationID` int,
  `DonatorID` int,
  `AMT` money,
  PRIMARY KEY (`DonationID`),
  FOREIGN KEY (`DonationID`) REFERENCES `Donator`(`DonatorID`)
);

CREATE TABLE `Organizor` (
  `OrganizorID` int,
  `Name` varchar(50),
  `ContactFirstName` varchar(50),
  `ContactLastName` varchar(50),
  `PhoneNumber` varchar(10),
  `City` varchar(50),
  `State` char(2),
  `Zip` char(5),
  PRIMARY KEY (`OrganizorID`)
);

CREATE TABLE `Employee` (
  `EmployeeID` int,
  `ContactFirstName` varchar(50),
  `ContactLastName` varchar(50),
  `PhoneNumber` varchar(10),
  `Address` varchar(50),
  `City` varchar(50),
  `State` char(2),
  `Zip` char(5),
  PRIMARY KEY (`EmployeeID`)
);

CREATE TABLE `EventEmployee` (
  `EventID` int,
  `Field` int,
  PRIMARY KEY (`EventID`, `Field`),
  FOREIGN KEY (`EventID`) REFERENCES `Event`(`EventID`),
  FOREIGN KEY (`Field`) REFERENCES `Employee`(`EmployeeID`)
);

CREATE TABLE `EventVolunteer` (
  `EventID` int,
  `VolunteerID` int,
  PRIMARY KEY (`EventID`, `VolunteerID`),
  FOREIGN KEY (`EventID`) REFERENCES `Event`(`EventID`),
  FOREIGN KEY (`VolunteerID`) REFERENCES `Volunteer`(`VolunteerID`)
);

CREATE TABLE `EventDonator` (
  `DonatorID` int,
  `EventID` int,
  PRIMARY KEY (`DonatorID`, `EventID`),
  FOREIGN KEY (`DonatorID`) REFERENCES `Donator`(`DonatorID`),
  FOREIGN KEY (`EventID`) REFERENCES `Event`(`EventID`)
);

CREATE TABLE `EvenOrganizor` (
  `OrganizorID` int,
  `EventID` int,
  PRIMARY KEY (`OrganizorID`, `EventID`),
  FOREIGN KEY (`OrganizorID`) REFERENCES `Organizor`(`OrganizorID`),
  FOREIGN KEY (`EventID`) REFERENCES `Event`(`EventID`)
);

CREATE TABLE `OrganizorDonation` (
  `DonationID` int,
  `OrganizorID` int,
  PRIMARY KEY (`DonationID`, `OrganizorID`),
  FOREIGN KEY (`OrganizorID`) REFERENCES `Organizor`(`OrganizorID`),
  FOREIGN KEY (`DonationID`) REFERENCES `Donation`(`DonationID`)
);

