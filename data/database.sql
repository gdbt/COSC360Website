DROP TABLE DailyPicture;
DROP TABLE Facts;
DROP TABLE Achievements;
DROP TABLE Comment;
DROP TABLE Post;
DROP TABLE Channel;
DROP TABLE Category;
DROP TABLE Account;
CREATE TABLE Account (
	Id int NOT NULL AUTO_INCREMENT,
	Username VARCHAR(20),
	Password VARCHAR(20),
	Gender VARCHAR(20),
	AccountDesc VARCHAR(300),
	Interests VARCHAR(200),
	SecurityQ VARCHAR(300),
	SecurityA VARCHAR(30),
	Likes int,
	ServerAdmin boolean,
	PRIMARY KEY (Id)
);

CREATE TABLE Category(
	categoryId int NOT NULL AUTO_INCREMENT,
	categoryName VARCHAR(20),
	PRIMARY KEY (categoryId)
);

CREATE TABLE Channel (
	channelId int NOT NULL AUTO_INCREMENT,
	channelName VARCHAR(20),
	postCount int,
	likeCount int,
	channelDate DATE, 
	categoryId int,
	channelAdmin int,
	PRIMARY KEY (channelId),
	FOREIGN KEY (categoryId) REFERENCES Category(categoryId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (channelAdmin) REFERENCES Account(Id) ON DELETE CASCADE ON UPDATE CASCADE

);
CREATE TABLE Post(
	postId int NOT NULL AUTO_INCREMENT,
	postLikes int,
	postTitle VARCHAR(60),
	postDescription VARCHAR(1000),
	postDate DATE,
	UserId int,
	channelId int,
	PRIMARY KEY (postId),
	FOREIGN KEY (channelId) REFERENCES Channel(channelId),
	FOREIGN KEY (UserId) REFERENCES Account(Id) ON DELETE CASCADE ON UPDATE CASCADE
	
);

CREATE TABLE Comment (
	commentId int NOT NULL AUTO_INCREMENT,
	comment VARCHAR(500),
	commentDate DATE,
	Username VARCHAR(20),
	postId int,
	PRIMARY KEY (commentId),
	FOREIGN KEY (postId) REFERENCES Post(postId),
	FOREIGN KEY (Username) REFERENCES Account(Username) ON DELETE CASCADE ON UPDATE CASCADE

);

CREATE TABLE Achievements(
	AchievementId int NOT NULL AUTO_INCREMENT,
	AchievementName VARCHAR(20),
	accountId int,
	PRIMARY KEY (AchievementId),
	FOREIGN KEY (accountId) REFERENCES Account(Id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Facts(
	factId int NOT NULL AUTO_INCREMENT,
	fact VARCHAR(300),
	PRIMARY KEY (factId)
);

CREATE TABLE DailyPicture(
	dailyPicId int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (dailyPicId)
);
