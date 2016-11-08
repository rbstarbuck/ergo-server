DROP DATABASE ergo;
CREATE DATABASE ergo;
USE ergo;

CREATE TABLE Scenes(
    SceneName varchar(255) PRIMARY KEY,
    DateCreated datetime NOT NULL,
    LastUpdated timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE RawData(
    RawVideoFile varchar(255) PRIMARY KEY,
    InfoFile varchar(255) UNIQUE,
    SceneName varchar(255) NOT NULL,
    DateCreated datetime NOT NULL,
    LastUpdated timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (SceneName) REFERENCES Scenes(SceneName)
);

CREATE TABLE ProcessedData(
    ProcessedVideoFile varchar(255) PRIMARY KEY,
    InfoFile varchar(255) UNIQUE,
    RawVideoFile varchar(255) NOT NULL,
    LastUpdated timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (RawVideoFile) REFERENCES RawData(RawVideoFile)
);


INSERT INTO Scenes (SceneName, DateCreated) VALUES ("Example Scene", CURRENT_TIMESTAMP);
INSERT INTO RawData (RawVideoFile, InfoFile, SceneName, DateCreated) VALUES ("example.mp4", "example.json", "Example Scene", CURRENT_TIMESTAMP);
INSERT INTO ProcessedData (ProcessedVideoFile, InfoFile, RawVideoFile) VALUES ("example_processed.mp4", "example_processed.json", "example.mp4");