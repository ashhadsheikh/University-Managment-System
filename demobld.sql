--
-- Copyright (c) Oracle Corporation 1988, 2000.  All Rights Reserved.
--
-- NAME
--   demobld.sql
--
-- DESCRIPTION
--   This script creates the SQL*Plus demonstration tables in the
--   current schema.  It should be STARTed by each user wishing to
--   access the tables.  To remove the tables use the demodrop.sql
--   script.
--
--  USAGE
--    From within SQL*Plus, enter:
--        START demobld.sql

SET TERMOUT ON
PROMPT Building demonstration tables.  Please wait.
SET TERMOUT OFF

DROP TABLE ProjAssign;
DROP TABLE Project;
DROP TABLE EMP;
DROP TABLE DEPT;
DROP TABLE BONUS;
DROP TABLE SALGRADE;
DROP TABLE DUMMY;

CREATE TABLE DEPT
       (DEPTNO NUMBER(2),
        DNAME VARCHAR2(14),
        LOC VARCHAR2(13) );

Alter table dept
add constraints pk_deptno primary key (deptno);

INSERT INTO DEPT VALUES (10, 'ACCOUNTING', 'NEW YORK');
INSERT INTO DEPT VALUES (20, 'RESEARCH',   'DALLAS');
INSERT INTO DEPT VALUES (30, 'SALES',      'CHICAGO');
INSERT INTO DEPT VALUES (40, 'OPERATIONS', 'BOSTON');

CREATE TABLE EMP
       (EMPNO NUMBER(4) NOT NULL,
        ENAME VARCHAR2(10),
        JOB VARCHAR2(9),
        MGR NUMBER(4),
        HIREDATE DATE,
        SAL NUMBER(7, 2),
        COMM NUMBER(7, 2),
        DEPTNO NUMBER(2));

Alter table emp
add constraints pk_empno primary key (empno);

Alter table emp
add constraints fk_deptno foreign key (deptno)
references dept(deptno);

INSERT INTO EMP VALUES
        (7369, 'SMITH',  'CLERK',     7902,
        TO_DATE('17-DEC-1980', 'DD-MON-YYYY'),  800, NULL, 20);
INSERT INTO EMP VALUES
        (7499, 'ALLEN',  'SALESMAN',  7698,
        TO_DATE('20-FEB-1981', 'DD-MON-YYYY'), 1600,  300, 30);
INSERT INTO EMP VALUES
        (7521, 'WARD',   'SALESMAN',  7698,
        TO_DATE('22-FEB-1981', 'DD-MON-YYYY'), 1250,  500, 30);
INSERT INTO EMP VALUES
        (7566, 'JONES',  'MANAGER',   7839,
        TO_DATE('2-APR-1981', 'DD-MON-YYYY'),  2975, NULL, 20);
INSERT INTO EMP VALUES
        (7654, 'MARTIN', 'SALESMAN',  7698,
        TO_DATE('28-SEP-1981', 'DD-MON-YYYY'), 1250, 1400, 30);
INSERT INTO EMP VALUES
        (7698, 'BLAKE',  'MANAGER',   7839,
        TO_DATE('1-MAY-1981', 'DD-MON-YYYY'),  2850, NULL, 30);
INSERT INTO EMP VALUES
        (7782, 'CLARK',  'MANAGER',   7839,
        TO_DATE('9-JUN-1981', 'DD-MON-YYYY'),  2450, NULL, 10);
INSERT INTO EMP VALUES
        (7788, 'SCOTT',  'ANALYST',   7566,
        TO_DATE('09-DEC-1982 21:39:05', 'DD-MON-YYYY HH24:MI:SS'), 3000, NULL, 20);
INSERT INTO EMP VALUES
        (7839, 'KING',   'PRESIDENT', NULL,
        TO_DATE('17-NOV-1981', 'DD-MON-YYYY'), 5000, NULL, 10);
INSERT INTO EMP VALUES
        (7844, 'TURNER', 'SALESMAN',  7698,
        TO_DATE('8-SEP-1981', 'DD-MON-YYYY'),  1500,    0, 30);
INSERT INTO EMP VALUES
        (7876, 'ADAMS',  'CLERK',     7788,
        TO_DATE('12-JAN-1983 09:15:53', 'DD-MON-YYYY HH24:MI:SS'), 1100, NULL, 20);
INSERT INTO EMP VALUES
        (7900, 'JAMES',  'CLERK',     7698,
        TO_DATE('3-DEC-1981', 'DD-MON-YYYY'),   950, NULL, 30);
INSERT INTO EMP VALUES
        (7902, 'FORD',   'ANALYST',   7566,
        TO_DATE('3-DEC-1981', 'DD-MON-YYYY'),  3000, NULL, NULL);
INSERT INTO EMP VALUES
        (7934, 'MILLER', 'CLERK',     7782,
        TO_DATE('23-JAN-1982', 'DD-MON-YYYY'), 1300, NULL, 10);

commit;

Alter table emp
add constraints fk_mgr foreign key (mgr)
references emp(empno);

CREATE TABLE BONUS
        (ENAME VARCHAR2(10),
         JOB   VARCHAR2(9),
         SAL   NUMBER,
         COMM  NUMBER);

CREATE TABLE SALGRADE
        (GRADE NUMBER,
         LOSAL NUMBER,
         HISAL NUMBER);

INSERT INTO SALGRADE VALUES (1,  700, 1200);
INSERT INTO SALGRADE VALUES (2, 1201, 1400);
INSERT INTO SALGRADE VALUES (3, 1401, 2000);
INSERT INTO SALGRADE VALUES (4, 2001, 3000);
INSERT INTO SALGRADE VALUES (5, 3001, 9999);

CREATE TABLE DUMMY
        (DUMMY NUMBER);

INSERT INTO DUMMY VALUES (0);

COMMIT;


-------------------------------Additional Project tables for employees-----------
create table Project
(Projno CHAR(6),
ProjName VARCHAR2(30) NOT NULL,
ProjType CHAR(1),
StartDate DATE,
EndDate   DATE,
ManagerNo NUMBER(4) NOT NULL,
HrsRate Number(5,2)
);

Alter table Project
add constraints pk_Project primary key (Projno);

Alter table Project
add constraints fk_Project_eno foreign key (ManagerNo)
references emp(empno);

INSERT INTO Project VALUES
        ('PM2210', 'Main Building Construction',  'C',
        TO_DATE('17-MAR-2001', 'DD-MON-YYYY'),  TO_DATE('31-MAR-2003', 'DD-MON-YYYY'), 7566, 150);

INSERT INTO Project VALUES
        ('PM2211', 'Avenue Road Renovation',  'R',
        TO_DATE('10-APR-2001', 'DD-MON-YYYY'),  TO_DATE('10-APR-2002', 'DD-MON-YYYY'), 7788, 75);

INSERT INTO Project VALUES
        ('PM2278', 'ERP and Software Development',  'I',
        TO_DATE('01-NOV-2002', 'DD-MON-YYYY'),  TO_DATE('01-MAY-2003', 'DD-MON-YYYY'), 7788, 200);

commit;

create table ProjAssign
(Projno CHAR(6),
Empno NUMBER(4),
ProjPeriod CHAR(7) NOT NULL,
NoOfHrs NUMBER(3)
);

Alter table ProjAssign
add constraints pk_ProjAssign primary key (Projno, Empno, ProjPeriod);

Alter table ProjAssign
add constraints fk_ProjAssign_eno foreign key (EmpNo)
references emp(empno);


Alter table ProjAssign
add constraints fk_ProjAssign_ProjNo foreign key (Projno)
references Project(Projno);

INSERT INTO ProjAssign VALUES
        ('PM2210', 7369,'APR2001',20);

INSERT INTO ProjAssign VALUES
        ('PM2211', 7369,'APR2001',5);

INSERT INTO ProjAssign VALUES
        ('PM2278', 7654,'DEC2002',15);

INSERT INTO ProjAssign VALUES
        ('PM2278', 7788,'MAY2003',25);

INSERT INTO ProjAssign VALUES
        ('PM2211', 7788,'DEC2002',12);

commit;





SET TERMOUT ON
PROMPT Demonstration table build is complete.

PROMPT Following sample tables has been created successfully

select * from tab;

