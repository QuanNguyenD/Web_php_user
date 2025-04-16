CREATE DATABASE IF NOT EXISTS `hethongdatlichkham`;
USE `hethongdatlichkham`;

create table `tn_specialities`
(
	id int primary key AUTO_INCREMENT,
	name varchar(30),
	description varchar(255),
	image varchar(255)
);

create table `tn_rooms`
(
	id int AUTO_INCREMENT,
	name varchar(15),
	location varchar(255),
	PRIMARY KEY(id)
);

create table `tn_doctors`
(
	id int AUTO_INCREMENT,
	email varchar(255),
	phone varchar(15),
	password varchar(255),
	name varchar(50),
	description varchar(255),
	price int,
	role varchar(10),
	active int,
	avatar varchar(255),
	create_at datetime,
	update_at datetime,
	speciality_id int,
	room_id int,
	recovery_token varchar(255),
	PRIMARY KEY(id),
	FOREIGN KEY (speciality_id) REFERENCES tn_specialities(id),
	FOREIGN KEY (room_id) REFERENCES tn_rooms(id)
);

create table `tn_patients`
(
	id int AUTO_INCREMENT,
	email varchar(255),
	phone varchar(15),
	password varchar(255),
	name varchar(50),
	gender int,
	birthday varchar(10),
	address varchar(255),
	avatar varchar(255),
	create_at datetime,
	update_at datetime,
	PRIMARY KEY(id)
);









create table `tn_services`
(
	id int AUTO_INCREMENT,
    name varchar(255),
	image varchar(255),
	description TEXT,
	PRIMARY KEY(id)
);

create table `tn_doctor_and_service`
(
	id int AUTO_INCREMENT,
	service_id int,
	doctor_id int,
	PRIMARY KEY(id),
    FOREIGN KEY (doctor_id) REFERENCES tn_doctors(id),
	FOREIGN KEY (service_id) REFERENCES tn_services(id)
);

create table `tn_booking`
(
	id int AUTO_INCREMENT,
	service_id int,
	patient_id int,
	appointment_date varchar(10),
	appointment_hour varchar(5),
	status varchar(15),
	create_at datetime,
	update_at datetime,
	PRIMARY KEY(id),
	FOREIGN KEY (patient_id) REFERENCES tn_patients(id),
	FOREIGN KEY (service_id) REFERENCES tn_services(id)
);
INSERT INTO `tn_specialities` (`name`, `description`, `image`) VALUES
('Tim mạch', 'Chuyên điều trị các bệnh liên quan đến tim', 'tim-mach.jpg'),
('Nội tiết', 'Chuyên điều trị các bệnh về nội tiết', 'noi-tiet.jpg'),
('Da liễu', 'Chuyên điều trị các bệnh ngoài da', 'da-lieu.jpg');

INSERT INTO `tn_rooms` (`name`, `location`) VALUES
('Phòng 101', 'Tầng 1, Tòa nhà A'),
('Phòng 202', 'Tầng 2, Tòa nhà B'),
('Phòng 303', 'Tầng 3, Tòa nhà C');

INSERT INTO `tn_services` (`name`, `image`, `description`) VALUES
('Khám tổng quát', 'tong-quat.jpg', 'Khám tổng quát định kỳ cho mọi độ tuổi'),
('Xét nghiệm máu', 'xet-nghiem.jpg', 'Dịch vụ xét nghiệm máu nhanh và chính xác'),
('Tư vấn da liễu', 'da-lieu.jpg', 'Tư vấn các vấn đề về da');
