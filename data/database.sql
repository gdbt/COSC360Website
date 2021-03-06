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
	UserId int,
	postId int,
	PRIMARY KEY (commentId),
	FOREIGN KEY (postId) REFERENCES Post(postId),
	FOREIGN KEY (UserId) REFERENCES Account(Id) ON DELETE CASCADE ON UPDATE CASCADE

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

CREATE TABLE Contact ( 
	contactId int NOT NULL AUTO_INCREMENT, 
	contactTitle VARCHAR(20), 
	contactDesc VARCHAR(300), 
	contactDate DATE, 
	UserId int, 
	PRIMARY KEY (contactId), 
	FOREIGN KEY (UserId) REFERENCES Account(Id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Category (categoryName) VALUES ('Animals');
INSERT INTO Category (categoryName) VALUES ('Games');
INSERT INTO Category (categoryName) VALUES ('School');
INSERT INTO Category (categoryName) VALUES ('Social');

INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('cat',0,0,'2020-01-01 00:00:00',1,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('dog',0,0,'2020-01-01 00:00:00',1,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('fish',0,0,'2020-01-01 00:00:00',1,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('pokemon',0,0,'2020-01-01 00:00:00',2,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('tree',0,0,'2020-01-01 00:00:00',4,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('ubco',0,0,'2020-01-01 00:00:00',3,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('sfu',0,0,'2020-01-01 00:00:00',3,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('okcollege',0,0,'2020-01-01 00:00:00',3,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('laptop',0,0,'2020-01-01 00:00:00',2,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('social',0,0,'2020-01-01 00:00:00',4,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('phone',0,0,'2020-01-01 00:00:00',4,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('weed',0,0,'2020-01-01 00:00:00',4,1);
INSERT INTO Channel (channelName, postCount, likeCount, channelDate, categoryId, channelAdmin) VALUES ('games',0,0,'2020-01-01 00:00:00',2,1);
