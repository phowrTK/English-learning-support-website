Create table TrangChu
(
	Id int,
	Link nvarchar(MAX),
	Name nvarchar(50),
	Meta nvarchar(MAX),
	Hide bit,
	Datebegin smalldatetime,
	img nvarchar(50),
	primary key(Id) 
)
Create table KhoaHoc
(
	Id int,
	Link nvarchar(MAX),
	Name nvarchar(50),
	Meta nvarchar(MAX),
	Hide bit,
	Datebegin smalldatetime,
	img nvarchar(50),
	CourseID int primary key,
	Descriptionn nvarchar(MAX) 
	foreign key(Id) references TrangChu(Id)
)

Create table KyNang
(
	Id int,
	Link nvarchar(MAX),
	Name nvarchar(50),
	Meta nvarchar(MAX),
	Hide bit,
	Datebegin smalldatetime,
	SkillID int primary key,
	img nvarchar(50),
	Descriptionn nvarchar(MAX),
	foreign key(Id) references TrangChu(Id)
)

Create table NguPhap
(
	Id int,
	Link nvarchar(MAX),
	Name nvarchar(50),
	Meta nvarchar(MAX),
	Hide bit,
	Datebegin smalldatetime,
	img nvarchar(50),
	TenseID int primary key,
	Descriptionn nvarchar(MAX),
	foreign key(Id) references TrangChu(Id)
)

Create table TuVung
(
	Id int,
	Link nvarchar(MAX),
	Name nvarchar(50),
	Meta nvarchar(MAX),
	Hide bit,
	Datebegin smalldatetime,
	img nvarchar(50),
	TopicID int primary key,
	Descriptionn nvarchar(MAX),
	foreign key(Id) references TrangChu(Id)
)
d