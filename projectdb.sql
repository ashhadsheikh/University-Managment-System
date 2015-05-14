drop table studatdnc;
drop table assesmarks;
drop table studattend;
drop table pass;
drop table attendance;
drop table assesment;
drop table feedesc;
drop table Fee;
drop table StakeC;
drop table TteachesC;
drop table semester cascade constraints;
drop table instructor cascade constraints;
drop table course cascade constraints;
drop table student cascade constraints;
drop table department cascade constraints;

Create table department
(
D_No number (4) NOT NULL,
D_name varchar (15) NOT NULL,
D_Loc varchar (20) NOT NULL,
D_phone number,
D_fax number 
);

Create table instructor
(
emp_id varchar(20) NOT NULL,
f_name varchar (15),
l_name varchar (15),
gender varchar(1),
blood_group varchar(3),
dob date,
cnic number(20),
email varchar(30),
I_phone number,
room varchar (5),
D_No number
);

Create table semester
(
s_name varchar(15),
syear number,
start_date date,
end_date date
);

Create Table student
(
roll_No Number,
f_name varchar (15),
l_name varchar (15),
father_name varchar (15),
gender varchar(1),
blood_group varchar(3),
dob date,
cnic number(20),
email varchar(30),
I_phone number,
D_No number
);

Create Table course
(
c_id number ,
c_name varchar (50),
cr_hrs number (1),
sec varchar (1),
s_name varchar (15),
syear number,
D_No number (4),
pre_req number
);


Create Table Fee
(
reciept_no number (10),
due_date date,
roll_No Number
);

Create table feedesc
(
reciept_no number (10),
fee_desc varchar(20),
amount_payable number,
amount_paid number
);

Create Table StakeC
(
roll_No number,
sec varchar (1),
c_id number,
letter_grade varchar(2),
gp number
);

Create Table TteachesC
(
emp_id varchar(20),
sec varchar (1),
c_id number 
);

Create table assesment
(
a_name varchar(15),
a_num number (2),
total_marks number (3),
weightage number (2),
sec varchar (1),
c_id number
);

Create table assesmarks
(
a_name varchar(15),
a_num number(2),
roll_no Number,
marks_obt number (3)
);

create table attendance
(
attenddate date,
duration number,
sec varchar (1),
c_id number
);

create table studattend
(
attenddate date,
roll_no number,
status varchar (1)
);
Create table studatdnc
(
roll_no Number,
c_id number,
sec varchar(1),
atdnc number
);
Alter table department
add CONSTRAINT pk_dno PRIMARY KEY (D_NO);

Alter table instructor
add CONSTRAINT pk_eid PRIMARY KEY (emp_id);

ALTER TABLE instructor
add CONSTRAINT FK_INS_DEPT FOREIGN KEY(D_No) REFERENCES department(D_No);

Alter table semester
add CONSTRAINT pk_sn_yr PRIMARY KEY (s_name,syear);

Alter table student
add CONSTRAINT pk_rnum PRIMARY KEY ( roll_no);

ALTER TABLE student
add CONSTRAINT FK_ST_DEPT FOREIGN KEY(D_No) REFERENCES department(D_No);

Alter table course
add CONSTRAINT pk_cid PRIMARY KEY (c_id,sec);

ALTER TABLE course
add CONSTRAINT FK_C_DEPT FOREIGN KEY(D_No) REFERENCES department(D_No);


ALTER TABLE course
add CONSTRAINT FK_C_Sem FOREIGN KEY(s_name,syear) REFERENCES semester(s_name,syear);


Alter table fee
add CONSTRAINT pk_fee PRIMARY KEY (reciept_no);

ALTER TABLE fee
add CONSTRAINT FK_fee_s FOREIGN KEY( roll_no) REFERENCES student( roll_no);

ALTER TABLE studatdnc
add CONSTRAINT FK_studatdnc_s FOREIGN KEY( roll_no) REFERENCES student( roll_no);

ALTER TABLE studatdnc
add CONSTRAINT FK_as_studatdnc FOREIGN KEY(c_id,sec) REFERENCES course(c_id,sec);

Alter table studatdnc
add CONSTRAINT studatdnc PRIMARY KEY (roll_no,c_id,sec);

Alter table feedesc
add CONSTRAINT pk_feed PRIMARY KEY (reciept_no,fee_desc);

ALTER TABLE feedesc
add CONSTRAINT FK_feeds FOREIGN KEY(reciept_no) REFERENCES fee(reciept_no);

Alter table assesment
add CONSTRAINT pk_as PRIMARY KEY (a_name,a_num);


ALTER TABLE assesment
add CONSTRAINT FK_as_cou FOREIGN KEY(c_id,sec) REFERENCES course(c_id,sec);

Alter table attendance
add CONSTRAINT pk_att PRIMARY KEY (attenddate,c_id,sec);


ALTER TABLE attendance
add CONSTRAINT FK_att_cou FOREIGN KEY(c_id,sec) REFERENCES course(c_id,sec);


ALTER TABLE StakeC
add CONSTRAINT FK_stct_st FOREIGN KEY( roll_no) REFERENCES student( roll_no);

ALTER TABLE StakeC
add CONSTRAINT FK_stc_cou FOREIGN KEY(c_id,sec) REFERENCES course(c_id,sec);
Alter table StakeC
add CONSTRAINT pk_sts PRIMARY KEY ( roll_no,c_id,sec);

ALTER TABLE TteachesC
add CONSTRAINT FK_ttcc FOREIGN KEY(c_id,sec) REFERENCES course(c_id,sec);
ALTER TABLE TteachesC
add CONSTRAINT FK_tti FOREIGN KEY(emp_id) REFERENCES instructor(emp_id);

Alter table assesmarks
add Constraint PK_am PRIMARY KEY (a_name,a_num,roll_no);

Alter table assesmarks
add constraint fk_am_r FOREIGN KEY (roll_no) References student(roll_no);

Alter table studattend
Add constraint PK_sta Primary key (attenddate,roll_no);

Alter table studattend
add constraint fk_sta_r FOREIGN KEY (roll_no) References student(roll_no);

Create Table pass
(
rollno varchar2(20),
password varchar2(20),
desig varchar2(10)
);

		
---CREATION OF USER ACCOUNTS
INSERT INTO pass VALUES('academic',  '123',  'acdm');
INSERT INTO pass VALUES('account',  '123',  'acc');
INSERT INTO pass VALUES('ashhad.sheikh',  '123',  'admin');
INSERT INTO pass VALUES('hamza.siddiqui',  '123',  'admin');


		commit;
