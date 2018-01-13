<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php 
  require_once 'functions.php';

  createTable('members',
              'id int(11) NOT NULL AUTO_INCREMENT,
              firstname VARCHAR(35) NOT NULL,
              surname VARCHAR(35) NOT NULL,
              gender VARCHAR(7) NOT NULL,
              dob DATE NOT NULL,
              email VARCHAR(250) NOT NULL,
              username VARCHAR(100) NOT NULL,
              password VARCHAR(250) NOT NULL,
              primarysport VARCHAR(100),
              reg_date TIMESTAMP,
              PRIMARY KEY (id)');
      
 createTable('calendar',
            'id int(11) NOT NULL AUTO_INCREMENT,
            startdate VARCHAR(48) NOT NULL,
            title VARCHAR(255) NOT NULL,
            destination VARCHAR (255) NOT NULL,
            eventtime VARCHAR(48) NOT NULL,
            destinationpc VARCHAR(15),
            meetingpoint VARCHAR(255) NOT NULL,
            meetingtime VARCHAR(48) NOT NULL,
            meetingpc VARCHAR(15),
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      
  createTable('aboutMe',
            'id int(11) NOT NULL AUTO_INCREMENT,
            intro VARCHAR(255),
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');   
      
  createTable('positions',
            'id int(11) NOT NULL AUTO_INCREMENT,
            footballGK int(1),
            footballLCB int(1),
            footballRCB int(1),
            footballLB int(1),
            footballLWB int(1),
            footballRB int(1),
            footballRWB int(1),
            footballLDM int(1),
            footballRDM int(1),
            footballLCM int(1),
            footballRCM int(1),
            footballLM int(1),
            footballRM int(1),
            footballAM int(1),
            footballLW int(1),
            footballRW int(1),
            footballCF int(1),
            footballLF int(1),
            footballRF int(1),
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)'); 
     
      createTable('teams',
            'id int(11) NOT NULL AUTO_INCREMENT,
            teamSport VARCHAR(100) NOT NULL,
            teamName VARCHAR(100),
            addressLine1 VARCHAR(100),
            addressLine2 VARCHAR (100),
            addressLine3 VARCHAR(100),
            postCode VARCHAR(15),
            teamEmail VARCHAR(255),
            teamWebsite VARCHAR(255),
            managersFirstname VARCHAR(35),
            managersSurname VARCHAR(35),
            managersContactNumber VARCHAR(15),
            managersEmail VARCHAR(250),
            founded int(4),
            stadium VARCHAR(100),
            sponsor VARCHAR(100),
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('clubs',
            'id int(11) NOT NULL AUTO_INCREMENT,
            clubCode VARCHAR(5),
            clubSport VARCHAR(100) NOT NULL,
            clubName VARCHAR(100),
            addressLine1 VARCHAR(100),
            addressLine2 VARCHAR (100),
            addressLine3 VARCHAR(100),
            postCode VARCHAR(15),
            clubEmail VARCHAR(255),
            clubWebsite VARCHAR(255),
            chairmanFirstname VARCHAR(35),
            chairmanSurname VARCHAR(35),
            chairmanContactNumber VARCHAR(15),
            chairmanEmail VARCHAR(250),
            secretaryFirstname VARCHAR(35),
            secretarySurname VARCHAR(35),
            secretaryContactNumber VARCHAR(15),
            secretaryEmail VARCHAR(250),
            treasurerFirstname VARCHAR(35),
            treasurerSurname VARCHAR(35),
            treasurerContactNumber VARCHAR(15),
            treasurerEmail VARCHAR(250),
            welfareOfficerFirstname VARCHAR(35),
            welfareOfficerSurname VARCHAR(35),
            welfareOfficerContactNumber VARCHAR(15),
            welfareOfficerEmail VARCHAR(250),
            founded int(4),
            stadium VARCHAR(100),
            sponsor VARCHAR(100),
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('scout',
            'id int(11) NOT NULL AUTO_INCREMENT,
            scoutingUsername VARCHAR(100) NOT NULL,
            scoutingName VARCHAR(100) NOT NULL,
            scoutedUsername VARCHAR(100) NOT NULL,
            scoutedName VARCHAR(100) NOT NULL,
            timestamp TIMESTAMP,
            PRIMARY KEY (id)');

      createTable('teamControl',
            'id int(11) NOT NULL AUTO_INCREMENT,
            teamID VARCHAR(100) NOT NULL,
            teamName VARCHAR(100) NOT NULL,
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('clubControl',
            'id int(11) NOT NULL AUTO_INCREMENT,
            clubID VARCHAR(100) NOT NULL,
            clubName VARCHAR(100) NOT NULL,
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
    
      createTable('register',
            'id int(11) NOT NULL AUTO_INCREMENT,
            username VARCHAR(100) NOT NULL,
            teamID int(11) NOT NULL,
            teamName VARCHAR(100),
            firstname VARCHAR(35) NOT NULL,
            surname VARCHAR(35) NOT NULL,
            dob DATE NOT NULL, 
            addressLine1 VARCHAR(100),
            addressLine2 VARCHAR (100),
            addressLine3 VARCHAR(100),
            postCode VARCHAR(15),
            ethnicity VARCHAR(100),
            PRIMARY KEY (id)');
      
      createTable('leagues',
            'id int(11) NOT NULL AUTO_INCREMENT,
            sport VARCHAR(100) NOT NULL,
            year VARCHAR(15) NOT NULL,
            district VARCHAR(100) NOT NULL,
            age VARCHAR(35) NOT NULL,
            division VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
    
      createTable('defaultLeagues',
            'id int(11) NOT NULL AUTO_INCREMENT,
            league VARCHAR(300) NOT NULL,
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('leagueTables',
            'id int(11) NOT NULL AUTO_INCREMENT,
            leagueName VARCHAR(300) NOT NULL,
            teamID VARCHAR(11) NOT NULL,
            teamName VARCHAR(100) NOT NULL,
            played int(5) NOT NULL,
            won int(5) NOT NULL,
            drawn int(5) NOT NULL,
            lost int(5) NOT NULL,
            goalsFor int(5) NOT NULL,
            goalsAgainst int(5) NOT NULL,
            goalDifference int(5) NOT NULL,
            points int(5) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('leagueNotes',
            'id int(11) NOT NULL AUTO_INCREMENT,
            leagueName VARCHAR(300) NOT NULL,
            notes VARCHAR(500),
            PRIMARY KEY (id)');
      
      createTable('leagueControl',
            'id int(11) NOT NULL AUTO_INCREMENT,
            leagueName VARCHAR(300) NOT NULL,
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('fixturesResults',
            'id int(11) NOT NULL AUTO_INCREMENT,
            leagueName VARCHAR(300) NOT NULL,
            homeTeamID VARCHAR(11) NOT NULL,
            homeTeamName VARCHAR(100) NOT NULL,
            homeTeamScore int(5),
            awayTeamScore int(5),
            awayTeamName VARCHAR(100) NOT NULL,
            awayTeamID VARCHAR(11) NOT NULL,
            gameTime TIME NOT NULL,
            gameDate DATE NOT NULL,
            details VARCHAR(100),
            PRIMARY KEY (id)');
     
      createTable('defaultTeams',
            'id int(11) NOT NULL AUTO_INCREMENT,
            teamName VARCHAR(100) NOT NULL,
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('seasonStats',
            'id int(11) NOT NULL AUTO_INCREMENT,
            apps int(5) NOT NULL,
            wins int(5) NOT NULL,
            draws int(5) NOT NULL,
            losses int(5) NOT NULL,
            goals int(5) NOT NULL,
            cleanSheets int(5) NOT NULL,
            MOM int(5) NOT NULL,
            yellowCards int(5) NOT NULL,
            redCards int(5) NOT NULL,
            username VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
       createTable('topScorers',
            'id int(11) NOT NULL AUTO_INCREMENT,
            teamID VARCHAR(11) NOT NULL,
            username VARCHAR(100) NOT NULL,
            goals int(11) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('discipline',
            'id int(11) NOT NULL AUTO_INCREMENT,
            teamID VARCHAR(11) NOT NULL,
            username VARCHAR(100) NOT NULL,
            card VARCHAR(10) NOT NULL,
            suspended VARCHAR(4) NOT NULL,
            payment VARCHAR(4) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('clubTeamList',
            'id int(11) NOT NULL AUTO_INCREMENT,
            clubID VARCHAR(11) NOT NULL,
            teamID VARCHAR(11) NOT NULL,
            teamName VARCHAR(100) NOT NULL,
            PRIMARY KEY (id)');
      
      createTable('feed',
            'id int(11) NOT NULL AUTO_INCREMENT,
            username VARCHAR(100) NOT NULL,
            name VARCHAR(100) NOT NULL,
            text VARCHAR(5000) NOT NULL,
            timestamp TIMESTAMP,
            PRIMARY KEY (id)');
      
      createTable('feedLikes',
            'id int(11) NOT NULL AUTO_INCREMENT,
            feedID int(11) NOT NULL,
            username VARCHAR(100) NOT NULL,
            name VARCHAR(100) NOT NULL,
            timestamp TIMESTAMP,
            PRIMARY KEY (id)');
      
      createTable('feedComments',
            'id int(11) NOT NULL AUTO_INCREMENT,
            feedID int(11) NOT NULL,
            username VARCHAR(100) NOT NULL,
            name VARCHAR(100) NOT NULL,
            text VARCHAR(5000) NOT NULL,
            timestamp TIMESTAMP,
            PRIMARY KEY (id)');
    
?>
    
  </body>
</html>
