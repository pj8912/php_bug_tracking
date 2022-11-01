CREATE TABLE users(
	user_id int AUTO_INCREMENT primary key not null,
	user_fullname varchar(256) ,
	user_email varchar(256) not null,
	user_pwd varchar(256) not null,
    created_at datetime default CURRENT_TIMESTAMP,
	last_seen datetime default current_timestamp
);




CREATE TABLE projects(
	project_id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	project_title varchar(300) not null,
	project_type varchar(100) not null,
    project_description varchar(200) not null,
	project_manager varchar(200) not null,
	frontend text not null,
	backend text not null,
	client_name varchar(200) not null,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);



CREATE TABLE tickets(
	id int auto_increment primary key not null,
	ticket_name varchar(120) not null,
	project_name varchar(200) not null,
	type text not null,
	description varchar(250) ,
	assigned_to text,
	status varchar(100), 
	priority varchar(100),
	start_date text,
	end_date text,
	created_at datetime default current_timestamp,
	updted_at datetime default current_timestamp
);



CREATE TABLE employees(
	e_id int auto_increment primary key not null,
	e_name varchar(100) not null,
	e_roles varchar(200) not null,
	e_description varchar(250),
	e_email varchar(200),
	e_phone varchar(20) not null,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);


create table roles(
	r_id int auto_increment primary key not null,
	role_name text not null
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
);


create table types(

	t_id int AUTO_INCREMENT primary key not null,
	ticket_type varchar(100) not null,
	created_at datetime default CURRENT_TIMESTAMP
);

create table statuses(

	s_id int AUTO_INCREMENT primary key not null,
	ticket_status varchar(100) not null,
	created_at datetime default CURRENT_TIMESTAMP

);

create table priorities(

	p_id int AUTO_INCREMENT primary key not null,
	ticket_priority varchar(100) not null,
	created_at datetime default CURRENT_TIMESTAMP
);

create table contacts(
	id int AUTO_INCREMENT PRIMARY KEY not null,
	name varchar(100) not null,
	company varchar(300) not null,
    email varchar(300) not null,
    mobile varchar(12) not null,
    message text not null,
    created_at datetime default CURRENT_TIMESTAMP
);
