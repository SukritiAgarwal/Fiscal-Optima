CREATE table userDetails(
	fname VARCHAR(50) NOT NULL,
	lname VARCHAR(50) NOT NULL,
	gender CHAR NOT NULL,
	companyName VARCHAR(100) NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL, 
	dob DATE NOT NULL,
	CONSTRAINT userDetails_pk PRIMARY KEY(email)
);

CREATE table accountStatement(
	email VARCHAR(50) NOT NULL,
	tdate DATE NOT NULL,
	customer VARCHAR(50) NOT NULL,
	description VARCHAR(100) NOT NULL,
	amount INT NOT NULL,
    CONSTRAINT accountStatement_fk FOREIGN KEY(email) REFERENCES userdetails(email),
	CONSTRAINT accountStatement_pk PRIMARY KEY(email,tdate)
);

INSERT INTO userDetails(fname, lname, gender, companyName, email, phone, password,dob) 
VALUES ('Ma','Mingzhe','M','Ping an Insurance Co.','Ma.Mingzhe@insurance.com','+64 789-458-4882','mm@insurance1','1998-12-12'),
('Nigel','Wilson','M','Legal and General Co op.','Nigel.Wilson@law.com','+86 259-265-1484','nw@law2','2000-01-20'),
('Ernest','Harrison','M','Vodafone','Ernest.Harrison@telecomm.com','+85 145-414-8167','eh-telecomm3','2001-05-11'),
('Mary','Barra','F','General Motors','Mary.Barra@automobile.com','+71 152-437-8512','mb!autoceo4','1990-10-10'),
('Gail','Boudreaux','F','Anthem Insurance','Gail@Anthem.insurance.com','+62 875-485-4685','bestInsurance-5','1995-09-30'),
('Ted',     'Thorp',       'M',  'Your Choices',               'TedLThorp@armyspy.com',        '+1 318-478-8606',   'aeCazeish3',      '1985/09/23'),
('William', 'Lustig',      'M',  'Rainbow Records',            'WilliamGLustig@teleworm.us',   '+1 305-984-2219',   'Ojapaec8x',       '1957/04/28'),
('Luz',     'Putney',      'F',  'Dream Home Improvements',    'LuzMPutney@dayrep.com',        '+1 432-844-8456',   'aizieMo6',        '1989/10/29'),
('Erma',    'Jennette',    'F',  'Mozilla',                    'ErmaJJennette@teleworm.us',    '+1 401-847-8963',   'aiShae6Ie',       '1970/03/03'),
('Ruth',    'Boyer',       'F',  'Exact Solutions',            'RuthJBoyer@armyspy.com',       '+1 435-487-8173',   'Ayed1962',        '1962/12/14'),
('Lillian', 'Drury',       'F',  'Alert Alarm Company',        'LillianJDrury@teleworm.us',    '+1 229-209-6681',   'Uopeitia6ni',     '1967/02/21'),
('Ryan',    'Bryant',      'M',  'Access Asia',                'RyanKBryant@jourrapide.com',   '+1 516-594-2252',   'Aihait3Wa',       '1980/01/25');

INSERT INTO accountStatement(email,tdate,customer,description,amount) 
VALUES ('Ernest.Harrison@telecomm.com','2015-12-11','Kumar','Keys',2000),
('Ernest.Harrison@telecomm.com','2018-09-16','Steve','washers',2768),
('Ernest.Harrison@telecomm.com','2017-06-01','Sukriti','clothes',6723),
('Ernest.Harrison@telecomm.com','2017-06-02','Mekouar','services',6834),
('Ernest.Harrison@telecomm.com',     '2017-08-01',  'paleonti',   'random services', 4085015),
('Ernest.Harrison@telecomm.com',     '2017-01-12',  'premill',      'silk sell', 3712349),
('Ernest.Harrison@telecomm.com',     '2013-12-15',  'antemia',        'telecomm services', 70102),
('Ernest.Harrison@telecomm.com',     '2011-12-08',  'meeloo',     'luxury', 3421926),
('Ernest.Harrison@telecomm.com',     '2012-08-31',  'susist',        'clock', 997112),
('Ernest.Harrison@telecomm.com',     '2012-06-14',  'enity',     'car rides', 418028),

('Mary.Barra@automobile.com','2018-06-14','Hamza','Cars',3000),
('Mary.Barra@automobile.com',     '2018/05/04',  'multimia',    'colors or pigments', 944976),
('Mary.Barra@automobile.com',     '2016/03/22',  'creatable hawk',   'artists', 4496149),
('Mary.Barra@automobile.com',     '2015/10/01',  'unearth satin',      'saints', 55602),
('Mary.Barra@automobile.com',     '2019/12/05',  'profiterole stonework',        'marble stonework', 635273),
('Mary.Barra@automobile.com',     '2014/06/08',  'scholar conductor',     'educational loan', 209976),

('Nigel.Wilson@law.com','2018-07-24','Gold','candies',50000),
('Nigel.Wilson@law.com','2018-11-01','Sam','paper',567),
('Nigel.Wilson@law.com','2016-01-14','Shivam','watches',2435),

('Ma.Mingzhe@insurance.com','2018-08-26','Rogers','engine',678),
('Ma.Mingzhe@insurance.com','2017/01/17','Cal State Fullerton','students and faculties',4496149),
('Ma.Mingzhe@insurance.com','2017-03-07','Agarwal','books',5387),
('Ma.Mingzhe@insurance.com','2018/04/09','Toyota Motors','all employees',   1697149),
('Ma.Mingzhe@insurance.com','2017/02/19','Capitol Constructions','Construction workers',35457149),
('Ma.Mingzhe@insurance.com','2019-01-05','Jayden','silk',656),
('Ma.Mingzhe@insurance.com','2016-08-17','Kadari','housewash',8732),

('Gail@Anthem.insurance.com','2015-08-06','Arvid','iron',5676),

('TedLThorp@armyspy.com', '2016/09/11',  'Ping an Insurance Co.',  'spy mission', 838339),
('TedLThorp@armyspy.com', '2014/02/25',  'Vodafone',  'final payment for case', 278013),
('TedLThorp@armyspy.com', '2018/09/02',  'General Motors',  'insurance', 758410),
('TedLThorp@armyspy.com', '2015/05/01',  'Mozilla',  'internet services', 531340),
('TedLThorp@armyspy.com', '2017/12/30',  'Access Asia',  'flights', 989723),

('RuthJBoyer@armyspy.com', '2017/12/30',  'Dream Home Improvements',  'new home', 8383369),
('RuthJBoyer@armyspy.com', '2014/02/25',  'Your Choices',  'investment choices', 5301340),
('RuthJBoyer@armyspy.com', '2018/09/02',  'Exact Solutions',  'paint volors', 7758410),

('RyanKBryant@jourrapide.com', '2016/09/15',  'Vodafone',  'bus shuttles', 510569),
('RyanKBryant@jourrapide.com', '2018/09/02',  'Access Asia',  'law firm', 968289),
('RyanKBryant@jourrapide.com', '2014/02/25',  'Anthem Insurance',  'motor cars', 8383369),
('RyanKBryant@jourrapide.com', '2017/12/30',  'Rainbow Records',  'army spy', 331887),
('RyanKBryant@jourrapide.com', '2015/05/01',  'Exact Solutions',  'rainbow paints', 647853);