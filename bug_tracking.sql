

CREATE TABLE projects(
	project_id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
	project_title varchar(300) not null,
	project_type varchar(100) not null,
    project_description varchar(200) not null,
	project_manager varchar(200) not null,
	frontend text not null,
	backend text not null,
	client_name varchar(200) not null,
	created_at datetime default current_timestamp
);

-- a bug or a ticket

CREATE TABLE  tickets(
	ticket_id int auto_increment primary key not null,
	ticket_name varchar(200),
	project_id int not null,
	ticket_type text not null, -- type: issue, bug, feature_request.
	ticket_description varchar(300),
	ticket_assigned_to text not null,
	ticket_status varchar(200) not null, -- status: resolved, in-progress, new 
	ticket_priority varchar(300), -- priority: immediate, high, low, medium
	startDate varchar(200),
	endDate varchar(200),
	total_time varchar(200),
	FOREIGN KEY (project_id) REFERENCES projects(project_id),
	ticket_created_at datetime default current_timestamp

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