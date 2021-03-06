

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

-- a bug or a ticket

CREATE TABLE tickets( 
	ticket_id int auto_increment primary key not null, 
	ticket_name varchar(200), 
	project_name varchar(200) not null, 
	ticket_type text not null, 
	ticket_description text, 
	ticket_assigned_to text, 
	ticket_status varchar(100),
	ticket_priority varchar(100),
	startDate varchar(200),
	endDate varchar(200),
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime DEFAULT CURRENT_TIMESTAMP
  
);

CREATE TABLE users(
	user_id int AUTO_INCREMENT primary key not null,
	user_name varchar(256) ,
	user_mobile varchar(20) ,
	email varchar(256) not null,
	user_pwd varchar(256) not null,
	last_seen datetime default current_timestamp
);

-- team member or company employees
create table employees(
	e_id int auto_increment primary key not null,
	e_name varchar(100) not null ,
	e_roles varchar(200) not null, -- role(s)
    e_description varchar(250) ,
	e_email varchar(200) not null,
	e_phone varchar(20) not null,
	on_date datetime default current_timestamp
);

create table roles(
	r_id int auto_increment primary key not null,
	role_name varchar(300) not null,
	on_date datetime default current_timestamp
);

create table contacts(
	id int AUTO_INCREMENT PRIMARY KEY not null,
	name varchar(100) not null,
	company varchar(300) not null,
    email varchar(300) not null,
    mobile varchar(12) not null,
    message text not null,
    on_date datetime default CURRENT_TIMESTAMP
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
