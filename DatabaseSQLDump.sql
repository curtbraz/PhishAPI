-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: campaigns
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `campaigns`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `campaigns` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `campaigns`;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content` (
  `CampaignName` varchar(100) DEFAULT NULL,
  `Markup` varchar(50000) DEFAULT NULL,
  `Variable1Name` varchar(1000) DEFAULT NULL,
  `Variable2Name` varchar(1000) DEFAULT NULL,
  `Variable3Name` varchar(1000) DEFAULT NULL,
  `Variable4Name` varchar(1000) DEFAULT NULL,
  `Variable5Name` varchar(1000) DEFAULT NULL,
  `Variable6Name` varchar(1000) DEFAULT NULL,
  `Variable7Name` varchar(1000) DEFAULT NULL,
  `Variable8Name` varchar(1000) DEFAULT NULL,
  `Variable9Name` varchar(1000) DEFAULT NULL,
  `Variable10Name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emailalerts`
--

DROP TABLE IF EXISTS `emailalerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emailalerts` (
  `DateTime` datetime DEFAULT NULL,
  `Target` varchar(1000) DEFAULT NULL,
  `Campaign` varchar(1000) DEFAULT NULL,
  `IP` varchar(100) DEFAULT NULL,
  `UserAgent` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'campaigns'
--

--
-- Dumping routines for database 'campaigns'
--
/*!50003 DROP PROCEDURE IF EXISTS `CreateModifyCampaign` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateModifyCampaign`(IN INCampaignName VARCHAR(1000), IN INMarkup VARCHAR(50000), IN INVariable1Name VARCHAR(1000), IN INVariable2Name VARCHAR(1000), IN INVariable3Name VARCHAR(1000), IN INVariable4Name VARCHAR(1000), IN INVariable5Name VARCHAR(1000), IN INVariable6Name VARCHAR(1000), IN INVariable7Name VARCHAR(1000), IN INVariable8Name VARCHAR(1000), IN INVariable9Name VARCHAR(1000), IN INVariable10Name VARCHAR(1000))
BEGIN


IF EXISTS (select 1 from content where CampaignName = INCampaignName) THEN
    UPDATE content
    SET Markup = InMarkup,
    Variable1Name = INVariable1Name,
    Variable2Name = INVariable2Name,
    Variable3Name = INVariable3Name,
    Variable4Name = INVariable4Name,
    Variable5Name = INVariable5Name,
    Variable6Name = INVariable6Name,
    Variable7Name = INVariable7Name,
    Variable8Name = INVariable8Name,
    Variable9Name = INVariable9Name,
    Variable10Name = INVariable10Name 
    WHERE CampaignName = INCampaignName;
  ELSE 
    INSERT INTO content(CampaignName, Markup, Variable1Name, Variable2Name, Variable3Name, Variable4Name, Variable5Name, Variable6Name, Variable7Name, Variable8Name, Variable9Name, Variable10Name) 
	VALUES(INCampaignName, INMarkup, INVariable1Name, INVariable2Name, INVariable3Name, INVariable4Name, INVariable5Name, INVariable6Name, INVariable7Name, INVariable8Name, INVariable9Name, INVariable10Name);

  END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DeleteCampaign` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteCampaign`(IN INCampaignName VARCHAR(1000))
BEGIN

delete from content WHERE CampaignName = INCampaignName;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetRecord` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetRecord`(IN INIP VARCHAR(1000))
BEGIN

SELECT * from emailalerts WHERE IP = INIP;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertRequest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertRequest`(IN INTarget VARCHAR(1000), IN INCampaign VARCHAR(1000), IN INIP VARCHAR(100), IN INUserAgent VARCHAR(1000))
BEGIN

INSERT INTO emailalerts(DateTime, Target, Campaign, IP, UserAgent)
VALUES (now(), INTarget, INCampaign, INIP, INUserAgent);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectCampaign` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectCampaign`(IN INCampaignName VARCHAR(1000))
BEGIN

SELECT * from content WHERE CampaignName = INCampaignName;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Current Database: `phishingdocs`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `phishingdocs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `phishingdocs`;

--
-- Table structure for table `Notifications`
--

DROP TABLE IF EXISTS `Notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Notifications` (
  `Type` varchar(100) DEFAULT NULL,
  `API_Token` varchar(1000) DEFAULT NULL,
  `Channel` varchar(1000) DEFAULT NULL,
  `UUID` varchar(1000) DEFAULT NULL,
  `Datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requests` (
  `Datetime` datetime DEFAULT NULL,
  `IP` varchar(100) DEFAULT NULL,
  `Target` varchar(100) DEFAULT NULL,
  `Org` varchar(100) DEFAULT NULL,
  `NTLMv2` varchar(1000) NOT NULL,
  `UA` varchar(1000) DEFAULT NULL,
  `UUID` varchar(1000) NOT NULL,
  `User` varchar(100) DEFAULT NULL,
  `Pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'phishingdocs'
--

--
-- Dumping routines for database 'phishingdocs'
--
/*!50003 DROP PROCEDURE IF EXISTS `CheckRecentlySubmitted` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CheckRecentlySubmitted`(IN InIP VARCHAR(100), IN InTarget VARCHAR(100), IN InOrg VARCHAR(100))
BEGIN


SELECT 
    *
FROM
    requests
WHERE
    IP = InIP AND Target = InTarget
        AND Org = InOrg
        AND Datetime >= NOW() - INTERVAL 8 SECOND;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CreateNotificationRef` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateNotificationRef`(IN InType VARCHAR(100), IN InAPI_Token VARCHAR(1000), IN InChannel VARCHAR(100))
BEGIN


SET @UUID = UUID();

INSERT INTO Notifications (Type, API_Token, Channel, UUID, Datetime) VALUES (InType, InAPI_Token, InChannel, @UUID, now());
SELECT @UUID AS UUID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetNotificationRef` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetNotificationRef`(IN InUUID VARCHAR(1000))
BEGIN


SELECT 
    *
FROM
    Notifications
WHERE
    UUID = InUUID
ORDER BY Datetime DESC;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetUUIDRecord` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUUIDRecord`(IN InUUID VARCHAR(1000))
BEGIN


SELECT 
    *
FROM
    requests
WHERE
    UUID = InUUID;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertRequests` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertRequests`(IN InIP VARCHAR(100), IN InTarget VARCHAR(100), IN InOrg VARCHAR(100), IN InUA VARCHAR(1000), IN InUUID VARCHAR(1000), IN InUser VARCHAR(100), IN InPass VARCHAR(100))
BEGIN


INSERT INTO requests (Datetime, IP, Target, Org, UA, UUID, User, Pass) VALUES (now(), InIP,InTarget,InOrg,InUA,InUUID,InUser,InPass);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MatchHashes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MatchHashes`(IN InIP VARCHAR(100), IN InHash VARCHAR(1000))
BEGIN


UPDATE requests 
SET 
    NTLMv2 = CONCAT(NTLMv2, InHash, '<br>')
WHERE
    IP = InIP;
    
UPDATE fakesite.stolencreds sc 
SET 
    sc.Hash = CONCAT(sc.Hash, InHash, '<br>')
WHERE
    sc.ip = InIP;

SELECT DISTINCT
    'PhishingDocs' AS Title,
    rq.Target,
    rq.Org,
    nt.API_Token,
    nt.Channel,
    rq.UUID
FROM
    requests rq
        INNER JOIN
    Notifications nt ON nt.UUID = rq.UUID
WHERE
    rq.IP = InIP 
UNION SELECT 
    'FakeSite' AS Title,
    sc.location AS Target,
    '' AS Org,
    '' AS API_Token,
    '' AS Channel,
    '' AS UUID
FROM
    fakesite.stolencreds sc
WHERE
    sc.ip = InIP
LIMIT 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Current Database: `fakesite`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `fakesite` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fakesite`;

--
-- Table structure for table `stats`
--

DROP TABLE IF EXISTS `stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stats` (
  `project` varchar(1000) DEFAULT NULL,
  `numemails` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stolencreds`
--

DROP TABLE IF EXISTS `stolencreds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stolencreds` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `Token` varchar(1000) DEFAULT NULL,
  `Hash` varchar(1000) NOT NULL,
  `stolencredscol` varchar(45) DEFAULT NULL,
  `hibpcount` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'fakesite'
--

--
-- Dumping routines for database 'fakesite'
--
/*!50003 DROP PROCEDURE IF EXISTS `CheckProjects` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CheckProjects`()
BEGIN


SELECT DISTINCT
    location
FROM
    stolencreds
WHERE
    location != '';
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetAwards` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAwards`(IN InProject VARCHAR(1000), IN InUser VARCHAR(1000))
BEGIN


SELECT 
    'MostDedicated' AS Title, username
FROM
    (SELECT 
        username, COUNT(password) AS count
    FROM
        stolencreds sc
    WHERE
        sc.location = InProject
            AND sc.username = InUser
    GROUP BY username) sc
WHERE
    count = 2 

UNION SELECT 
    'MostDelayed' AS Title, username
FROM
    (SELECT 
        DATE_FORMAT(MAX(entered), '%Y-%m-%d') AS LastDate, username
    FROM
        stolencreds
    WHERE
        location = InProject) iq
WHERE
    DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), LastDate) >= 2

UNION SELECT 
    'MostDisclosedPWs' AS Title, username
FROM
    (SELECT 
        username, COUNT(DISTINCT password) AS countpass
    FROM
        stolencreds
    WHERE
        location = InProject
            AND username = InUser
    GROUP BY username , password) iq
WHERE
    countpass = 2 

UNION SELECT 
    'MostPhish' AS Title, iq.countrows AS username
FROM
    (SELECT 
        COUNT(*) AS countrows
    FROM
        stolencreds
    WHERE
        location = InProject) iq
WHERE
    iq.countrows IN (50 , 60, 70, 80);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetEmailsSent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetEmailsSent`(IN InProject VARCHAR(1000))
BEGIN

SELECT numemails FROM stats WHERE project = InProject;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetRecords` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetRecords`(IN InProject VARCHAR(1000))
BEGIN


SELECT 
    *
FROM
    stolencreds
WHERE
    location = InProject;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertStolenCreds` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertStolenCreds`(IN InUser VARCHAR(1000), IN InPass VARCHAR(1000), InIP VARCHAR(100), InLocation VARCHAR(1000), InToken VARCHAR(1000))
BEGIN


INSERT INTO stolencreds(username,password,entered,ip,location,token) VALUES(InUser,InPass,NOW(),InIP,InLocation,InToken);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RemoveProject` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RemoveProject`(IN InProject VARCHAR(1000))
BEGIN


DELETE FROM stolencreds 
WHERE
    location = InProject;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RemoveRecord` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RemoveRecord`(IN InProject VARCHAR(1000), IN InEntered TIMESTAMP)
BEGIN


DELETE FROM stolencreds 
WHERE
    location = InProject
    AND entered = InEntered;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReportHIBPHitCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReportHIBPHitCount`(IN InProject VARCHAR(1000))
BEGIN

-- HaveIBeenPwned Hits
-- Number of Time the Password Has Been Leaked
select distinct password as Password,hibpcount as '# of Known Reuses'
from stolencreds 
where location = InProject
and hibpcount IS NOT NULL
order by hibpcount desc;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReportHIBPNumberReuse` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReportHIBPNumberReuse`(IN InProject VARCHAR(1000))
BEGIN

-- HaveIBeenPwned Hits
-- Number of Reused Passwords in Campaign
set @Total = (select count(distinct password)
from stolencreds
where location = InProject);

set @Hits = (select CASE WHEN (count(password) IS NULL) THEN 0 ELSE count(distinct password) END
from stolencreds
where location = InProject
and hibpcount > 0);

select @Hits as 'Hits',@Total as 'Total';

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReportNonUniquePWs` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReportNonUniquePWs`(IN InProject VARCHAR(1000))
BEGIN

-- Non-Unique Passwords
SELECT 
    FROM_BASE64(iq2.pw) AS Password,
    COUNT(iq2.pw) AS Occurrences
FROM
    (SELECT 
        sc.password AS pw
    FROM
        stolencreds sc
    INNER JOIN (SELECT 
        COUNT(username) AS cnt, password
    FROM
        stolencreds
    WHERE
        location = InProject
    GROUP BY password
    HAVING COUNT(username) > 1
    ORDER BY COUNT(username) DESC) iq ON sc.password = iq.password
    WHERE
        location = InProject
    GROUP BY sc.password , sc.username) iq2
GROUP BY iq2.pw
HAVING COUNT(iq2.pw) > 1
ORDER BY COUNT(iq2.pw) DESC;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReportPWComplexity` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReportPWComplexity`(IN InProject VARCHAR(1000))
BEGIN

-- Password Complexity

-- IF THIS PLUGIN ISN'T INSTALLED YOU MUST RUN THE FOLLOWING COMMAND ONCE
-- INSTALL PLUGIN validate_password SONAME 'validate_password.so';

select count(distinct password) as '# of Passwords',VALIDATE_PASSWORD_STRENGTH(FROM_BASE64(password)) as 'Strength Raiting'
from stolencreds
where location = InProject
GROUP BY VALIDATE_PASSWORD_STRENGTH(FROM_BASE64(password))
order by VALIDATE_PASSWORD_STRENGTH(FROM_BASE64(password)) desc;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ReportPWsByLength` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ReportPWsByLength`(IN InProject VARCHAR(1000))
BEGIN

-- Passwords by Length
SELECT 
    LENGTH(FROM_BASE64(password)) AS Length,
    COUNT(distinct password) AS 'Number of Passwords'
FROM
    stolencreds
WHERE
    location = InProject
GROUP BY Length
ORDER BY Length DESC;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UpdateEmailsSent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateEmailsSent`(IN InProject VARCHAR(1000), IN InNumberofEmails INT)
BEGIN

DELETE FROM stats WHERE project = InProject;

INSERT INTO stats (project, numemails) VALUES(InProject, InNumberofEmails);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UpdateHIBPCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateHIBPCount`(IN InPass VARCHAR(1000), InLocation VARCHAR(1000), InCount INT)
BEGIN


UPDATE stolencreds
SET hibpcount = InCount
WHERE password = InPass
AND location = InLocation;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-05  1:26:33

USE `campaigns`;

-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: campaigns
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES ('DocuSign','PGRpdiBjbGFzcz0iIj4NCjxkaXYgaWQ9Ijo0am0iIGNsYXNzPSJpaSBndCIgc3R5bGU9ImZvbnQtc2l6ZTogMC44NzVyZW07IGRpcmVjdGlvbjogbHRyOyBtYXJnaW46IDhweCAwcHggMHB4OyBwYWRkaW5nOiAwcHg7IHBvc2l0aW9uOiByZWxhdGl2ZTsiPg0KPGRpdiBpZD0iOjRqbCIgY2xhc3M9ImEzcyBhWGpDSCAiIHN0eWxlPSJvdmVyZmxvdzogaGlkZGVuOyBmb250LXZhcmlhbnQtbnVtZXJpYzogbm9ybWFsOyBmb250LXZhcmlhbnQtZWFzdC1hc2lhbjogbm9ybWFsOyBmb250LXN0cmV0Y2g6IG5vcm1hbDsgZm9udC1zaXplOiBzbWFsbDsgbGluZS1oZWlnaHQ6IDEuNTsgZm9udC1mYW1pbHk6IEFyaWFsLCBIZWx2ZXRpY2EsIHNhbnMtc2VyaWY7Ij4NCjxkaXYgc3R5bGU9ImJhY2tncm91bmQtY29sb3I6ICNlYWVhZWE7IHBhZGRpbmc6IDE4LjM2MTFweDsgZm9udC1mYW1pbHk6IEhlbHZldGljYSwgQXJpYWwsICdTYW5zIFNlcmlmJzsiPjxiciAvPg0KPHRhYmxlIGRpcj0iIiBzdHlsZT0iaGVpZ2h0OiAxMTMzcHg7IiByb2xlPSJwcmVzZW50YXRpb24iIGJvcmRlcj0iMCIgd2lkdGg9IjY0OSIgY2VsbHNwYWNpbmc9IjAiIGNlbGxwYWRkaW5nPSIwIiBhbGlnbj0iY2VudGVyIj4NCjx0Ym9keT4NCjx0cj4NCjx0ZCBzdHlsZT0iZm9udC1mYW1pbHk6IFJvYm90bywgUm9ib3RvRHJhZnQsIEhlbHZldGljYSwgQXJpYWwsIHNhbnMtc2VyaWY7IG1hcmdpbjogMHB4OyBjb2xvcjogIzIyMjIyMjsgZm9udC1zaXplOiBzbWFsbDsgdGV4dC1hbGlnbjogbGVmdDsiPiZuYnNwOzwvdGQ+DQo8dGQgc3R5bGU9ImZvbnQtZmFtaWx5OiBSb2JvdG8sIFJvYm90b0RyYWZ0LCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmOyBtYXJnaW46IDBweDsgY29sb3I6ICMyMjIyMjI7IGZvbnQtc2l6ZTogc21hbGw7IiB3aWR0aD0iNjQwIj4NCjx0YWJsZSBzdHlsZT0iYm9yZGVyLWNvbGxhcHNlOiBjb2xsYXBzZTsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsgbWF4LXdpZHRoOiA2NDBweDsiPg0KPHRib2R5Pg0KPHRyPg0KPHRkIHN0eWxlPSJmb250LWZhbWlseTogUm9ib3RvLCBSb2JvdG9EcmFmdCwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgbWFyZ2luOiAwcHg7IHBhZGRpbmc6IDEwcHggMjRweDsgdGV4dC1hbGlnbjogbGVmdDsiPjxpbWcgY2xhc3M9IkNUb1dVZCIgc3R5bGU9ImJvcmRlcjogbm9uZTsiIHNyYz0iaHR0cHM6Ly9jaTMuZ29vZ2xldXNlcmNvbnRlbnQuY29tL3Byb3h5L1hBd05yUjJQNzJOWW1WNkszeDg4bkdoOVIwOFVORDI0N0JCSXdJZF9KMlJjbUZzRjEtVFhwaHRWbGxTdS1QVVN3U3hPOEd0dDlhLWxrUk1ENE9aZ0w3N2UwZTIyNWZTNGtrXzJNNVNZWlE9czAtZC1lMS1mdCNodHRwczovL25hMi5kb2N1c2lnbi5uZXQvU2lnbmluZy9JbWFnZXMvZW1haWwvRW1haWxfTG9nby5wbmciIGFsdD0iRG9jdVNpZ24iIHdpZHRoPSIxMTYiIC8+PC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQgc3R5bGU9ImZvbnQtZmFtaWx5OiBSb2JvdG8sIFJvYm90b0RyYWZ0LCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmOyBtYXJnaW46IDBweDsgcGFkZGluZzogMHB4IDI0cHggMzBweDsiPg0KPHRhYmxlIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOiAjMWU0Y2ExOyBjb2xvcjogI2ZmZmZmZjsiIHJvbGU9InByZXNlbnRhdGlvbiIgYm9yZGVyPSIwIiB3aWR0aD0iMTAwJSIgY2VsbHNwYWNpbmc9IjAiIGNlbGxwYWRkaW5nPSIwIiBhbGlnbj0iY2VudGVyIj4NCjx0Ym9keT4NCjx0cj4NCjx0ZCBzdHlsZT0iZm9udC1mYW1pbHk6IEhlbHZldGljYSwgQXJpYWwsICdTYW5zIFNlcmlmJzsgbWFyZ2luOiAwcHg7IHBhZGRpbmc6IDI4cHggMzZweCAzNnB4OyBib3JkZXItcmFkaXVzOiAycHg7IGZvbnQtc2l6ZTogMTZweDsgd2lkdGg6IDUyMHB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IiBhbGlnbj0iY2VudGVyIj48aW1nIGNsYXNzPSJDVG9XVWQiIHN0eWxlPSJ3aWR0aDogNzVweDsgaGVpZ2h0OiA3NXB4OyIgc3JjPSJodHRwczovL2NpNS5nb29nbGV1c2VyY29udGVudC5jb20vcHJveHkvZ3k3T0N3ajBPMm45TlVRZTlORURFVlZ6Y2JoQlFsdGhnUkU0WlBHWldQR05xRDNmd3ROVHhfejloTkRXYkZub01mb1FHNkVVSFdvbTBaeDVQQzZhZG1FMi1xMHV0d0JFZmhZeThHbVdQem1xd3UwPXMwLWQtZTEtZnQjaHR0cHM6Ly9uYTIuZG9jdXNpZ24ubmV0L21lbWJlci9JbWFnZXMvZW1haWwvZG9jSW52aXRlLXdoaXRlLnBuZyIgYWx0PSIiIHdpZHRoPSI3NSIgaGVpZ2h0PSI3NSIgLz4NCjx0YWJsZSByb2xlPSJwcmVzZW50YXRpb24iIGJvcmRlcj0iMCIgd2lkdGg9IjEwMCUiIGNlbGxzcGFjaW5nPSIwIiBjZWxscGFkZGluZz0iMCI+DQo8dGJvZHk+DQo8dHI+DQo8dGQgc3R5bGU9ImZvbnQtZmFtaWx5OiBIZWx2ZXRpY2EsIEFyaWFsLCAnU2FucyBTZXJpZic7IG1hcmdpbjogMHB4OyBwYWRkaW5nLXRvcDogMjRweDsgZm9udC1zaXplOiAxNnB4OyBib3JkZXI6IG5vbmU7IiBhbGlnbj0iY2VudGVyIj57e1NlbmRlckZpcnN0TmFtZX19IHNlbnQgeW91IGEgZG9jdW1lbnQgdG8gcmV2aWV3IGFuZCBzaWduLjwvdGQ+DQo8L3RyPg0KPC90Ym9keT4NCjwvdGFibGU+DQo8dGFibGUgcm9sZT0icHJlc2VudGF0aW9uIiBib3JkZXI9IjAiIHdpZHRoPSIxMDAlIiBjZWxsc3BhY2luZz0iMCIgY2VsbHBhZGRpbmc9IjAiPg0KPHRib2R5Pg0KPHRyPg0KPHRkIHN0eWxlPSJmb250LWZhbWlseTogUm9ib3RvLCBSb2JvdG9EcmFmdCwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgbWFyZ2luOiAwcHg7IHBhZGRpbmctdG9wOiAzMHB4OyIgYWxpZ249ImNlbnRlciI+DQo8dGFibGUgY2VsbHNwYWNpbmc9IjAiIGNlbGxwYWRkaW5nPSIwIj4NCjx0Ym9keT4NCjx0cj4NCjx0ZCBzdHlsZT0iZm9udC1mYW1pbHk6IEhlbHZldGljYSwgQXJpYWwsICdTYW5zIFNlcmlmJzsgbWFyZ2luOiAwcHg7IGZvbnQtc2l6ZTogMTVweDsgY29sb3I6ICMzMzMzMzM7IGZvbnQtd2VpZ2h0OiBib2xkOyB0ZXh0LWFsaWduOiBjZW50ZXI7IGJvcmRlci1yYWRpdXM6IDJweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmYzQyMzsgZGlzcGxheTogYmxvY2s7IiBhbGlnbj0iY2VudGVyIiBoZWlnaHQ9IjQ0Ij48YSBzdHlsZT0iY29sb3I6ICMzMzMzMzM7IHRleHQtZGVjb3JhdGlvbi1saW5lOiBub25lOyBib3JkZXItcmFkaXVzOiAycHg7IGRpc3BsYXk6IGlubGluZS1ibG9jazsiIGhyZWY9Int7TWFsZG9jTGlua319IiB0YXJnZXQ9Il9ibGFuayIgcmVsPSJub29wZW5lciIgZGF0YS1zYWZlcmVkaXJlY3R1cmw9Int7TWFsZG9jTGlua319Ij48c3BhbiBzdHlsZT0icGFkZGluZzogMHB4IDI0cHg7IGxpbmUtaGVpZ2h0OiA0NHB4OyI+UkVWSUVXIERPQ1VNRU5UPC9zcGFuPjwvYT48L3RkPg0KPC90cj4NCjwvdGJvZHk+DQo8L3RhYmxlPg0KPC90ZD4NCjwvdHI+DQo8L3Rib2R5Pg0KPC90YWJsZT4NCjwvdGQ+DQo8L3RyPg0KPC90Ym9keT4NCjwvdGFibGU+DQo8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZCBzdHlsZT0iZm9udC1mYW1pbHk6IEhlbHZldGljYSwgQXJpYWwsICdTYW5zIFNlcmlmJzsgbWFyZ2luOiAwcHg7IHBhZGRpbmc6IDBweCAyNHB4IDI0cHg7IGNvbG9yOiAjMDAwMDAwOyBmb250LXNpemU6IDE2cHg7Ij4NCjx0YWJsZSByb2xlPSJwcmVzZW50YXRpb24iIGJvcmRlcj0iMCIgY2VsbHNwYWNpbmc9IjAiIGNlbGxwYWRkaW5nPSIwIj4NCjx0Ym9keT4NCjx0cj4NCjx0ZCBzdHlsZT0iZm9udC1mYW1pbHk6IFJvYm90bywgUm9ib3RvRHJhZnQsIEhlbHZldGljYSwgQXJpYWwsIHNhbnMtc2VyaWY7IG1hcmdpbjogMHB4OyBwYWRkaW5nLWJvdHRvbTogMjBweDsiPg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEhlbHZldGljYSwgQXJpYWwsICdTYW5zIFNlcmlmJzsgZm9udC13ZWlnaHQ6IGJvbGQ7IGxpbmUtaGVpZ2h0OiAxOHB4OyBmb250LXNpemU6IDE1cHg7IGNvbG9yOiAjMzMzMzMzOyI+e3tTZW5kZXJGaXJzdE5hbWV9fTwvZGl2Pg0KPGRpdiBzdHlsZT0iZm9udC1mYW1pbHk6IEhlbHZldGljYSwgQXJpYWwsICdTYW5zIFNlcmlmJzsgbGluZS1oZWlnaHQ6IDE4cHg7IGZvbnQtc2l6ZTogMTVweDsgY29sb3I6ICM2NjY2NjY7Ij57e1NlbmRlckVtYWlsQWRkcmVzc319PC9kaXY+DQo8L3RkPg0KPC90cj4NCjwvdGJvZHk+DQo8L3RhYmxlPg0KPHNwYW4gc3R5bGU9ImZvbnQtc2l6ZTogMTVweDsgY29sb3I6ICMzMzMzMzM7IGxpbmUtaGVpZ2h0OiAyMHB4OyI+e3tGaXJzdE5hbWV9fSB7e0xhc3ROYW1lfX0sPGJyIC8+PGJyIC8+UGxlYXNlIERvY3VTaWduIHt7RmlsZU5hbWV9fS5kb2N4PGJyIC8+PGJyIC8+VGhhbmsgWW91LCB7e1NlbmRlckZpcnN0TmFtZX19PC9zcGFuPjwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkIHN0eWxlPSJmb250LWZhbWlseTogSGVsdmV0aWNhLCBBcmlhbCwgJ1NhbnMgU2VyaWYnOyBtYXJnaW46IDBweDsgcGFkZGluZzogMHB4IDI0cHggMTJweDsgZm9udC1zaXplOiAxMXB4OyBjb2xvcjogIzY2NjY2NjsiPiZuYnNwOzwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkIHN0eWxlPSJmb250LWZhbWlseTogUm9ib3RvLCBSb2JvdG9EcmFmdCwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgbWFyZ2luOiAwcHg7IHBhZGRpbmc6IDMwcHggMjRweCA0NXB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZWFlYWVhOyI+DQo8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTogMWVtOyBmb250LWZhbWlseTogSGVsdmV0aWNhLCBBcmlhbCwgJ1NhbnMgU2VyaWYnOyBmb250LXNpemU6IDEzcHg7IGNvbG9yOiAjNjY2NjY2OyBsaW5lLWhlaWdodDogMThweDsiPjxzdHJvbmc+RG8gTm90IFNoYXJlIFRoaXMgRW1haWw8L3N0cm9uZz48YnIgLz5UaGlzIGVtYWlsIGNvbnRhaW5zIGEgc2VjdXJlIGxpbmsgdG8gRG9jdVNpZ24uIFBsZWFzZSBkbyBub3Qgc2hhcmUgdGhpcyBlbWFpbCwgbGluaywgb3IgYWNjZXNzIGNvZGUgd2l0aCBvdGhlcnMuPC9wPg0KPHAgc3R5bGU9Im1hcmdpbi1ib3R0b206IDFlbTsgZm9udC1mYW1pbHk6IEhlbHZldGljYSwgQXJpYWwsICdTYW5zIFNlcmlmJzsgZm9udC1zaXplOiAxM3B4OyBjb2xvcjogIzY2NjY2NjsgbGluZS1oZWlnaHQ6IDE4cHg7Ij48c3Ryb25nPkFsdGVybmF0ZSBTaWduaW5nIE1ldGhvZDwvc3Ryb25nPjxiciAvPlZpc2l0IERvY3VTaWduLmNvbSwgY2xpY2sgJ0FjY2VzcyBEb2N1bWVudHMnLCBhbmQgZW50ZXIgdGhlIHNlY3VyaXR5IGNvZGU6PGJyIC8+MkY0RjI3MTJGN0YzNDU3N0cyNzRLMzIwTjMyMjE8L3A+DQo8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTogMWVtOyBmb250LWZhbWlseTogSGVsdmV0aWNhLCBBcmlhbCwgJ1NhbnMgU2VyaWYnOyBmb250LXNpemU6IDEzcHg7IGNvbG9yOiAjNjY2NjY2OyBsaW5lLWhlaWdodDogMThweDsiPjxzdHJvbmc+QWJvdXQgRG9jdVNpZ248L3N0cm9uZz48YnIgLz5TaWduIGRvY3VtZW50cyBlbGVjdHJvbmljYWxseSBpbiBqdXN0IG1pbnV0ZXMuIEl0J3Mgc2FmZSwgc2VjdXJlLCBhbmQgbGVnYWxseSBiaW5kaW5nLiBXaGV0aGVyIHlvdSdyZSBpbiBhbiBvZmZpY2UsIGF0IGhvbWUsIG9uLXRoZS1nbyAtLSBvciBldmVuIGFjcm9zcyB0aGUgZ2xvYmUgLS0gRG9jdVNpZ24gcHJvdmlkZXMgYSBwcm9mZXNzaW9uYWwgdHJ1c3RlZCBzb2x1dGlvbiBmb3IgRGlnaXRhbCBUcmFuc2FjdGlvbiBNYW5hZ2VtZW50JnRyYWRlOy48L3A+DQo8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTogMWVtOyBmb250LWZhbWlseTogSGVsdmV0aWNhLCBBcmlhbCwgJ1NhbnMgU2VyaWYnOyBmb250LXNpemU6IDEzcHg7IGNvbG9yOiAjNjY2NjY2OyBsaW5lLWhlaWdodDogMThweDsiPjxzdHJvbmc+UXVlc3Rpb25zIGFib3V0IHRoZSBEb2N1bWVudD88L3N0cm9uZz48YnIgLz5JZiB5b3UgbmVlZCB0byBtb2RpZnkgdGhlIGRvY3VtZW50IG9yIGhhdmUgcXVlc3Rpb25zIGFib3V0IHRoZSBkZXRhaWxzIGluIHRoZSBkb2N1bWVudCwgcGxlYXNlIHJlYWNoIG91dCB0byB0aGUgc2VuZGVyIGJ5IGVtYWlsaW5nIHRoZW0gZGlyZWN0bHkuPGJyIC8+PGJyIC8+SWYgeW91IGFyZSBoYXZpbmcgdHJvdWJsZSBzaWduaW5nIHRoZSBkb2N1bWVudCwgcGxlYXNlIHZpc2l0IHRoZSZuYnNwOzxhIHN0eWxlPSJjb2xvcjogIzI0NjNkMTsiIGhyZWY9Imh0dHBzOi8vc3VwcG9ydC5kb2N1c2lnbi5jb20vYXJ0aWNsZXMvSG93LWRvLUktc2lnbi1hLURvY3VTaWduLWRvY3VtZW50LUJhc2ljLVNpZ25pbmciIHRhcmdldD0iX2JsYW5rIiByZWw9Im5vb3BlbmVyIiBkYXRhLXNhZmVyZWRpcmVjdHVybD0iaHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS91cmw/cT1odHRwczovL3N1cHBvcnQuZG9jdXNpZ24uY29tL2FydGljbGVzL0hvdy1kby1JLXNpZ24tYS1Eb2N1U2lnbi1kb2N1bWVudC1CYXNpYy1TaWduaW5nJmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTc0MzU1ODI3OTg3MDAwJmFtcDt1c2c9QUZRakNORkhEaUhRUmJkZVlOc2lhWlBBRnNPYUc5M013USI+SGVscCB3aXRoIFNpZ25pbmc8L2E+Jm5ic3A7cGFnZSBvbiBvdXImbmJzcDs8YSBzdHlsZT0iY29sb3I6ICMyNDYzZDE7IiBocmVmPSJodHRwczovL3d3dy5kb2N1c2lnbi5jb20vc3VwcG9ydCIgdGFyZ2V0PSJfYmxhbmsiIHJlbD0ibm9vcGVuZXIiIGRhdGEtc2FmZXJlZGlyZWN0dXJsPSJodHRwczovL3d3dy5nb29nbGUuY29tL3VybD9xPWh0dHBzOi8vd3d3LmRvY3VzaWduLmNvbS9zdXBwb3J0JmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTc0MzU1ODI3OTg3MDAwJmFtcDt1c2c9QUZRakNORzdpekotM1gySFVCNy1HakJ0cm1tbE9RcTNUQSI+U3VwcG9ydCBDZW50ZXI8L2E+LjxiciAvPjxiciAvPjwvcD4NCjxwIHN0eWxlPSJtYXJnaW4tYm90dG9tOiAxZW07IGZvbnQtZmFtaWx5OiBIZWx2ZXRpY2EsIEFyaWFsLCAnU2FucyBTZXJpZic7IGZvbnQtc2l6ZTogMTNweDsgY29sb3I6ICM2NjY2NjY7IGxpbmUtaGVpZ2h0OiAxOHB4OyI+PGEgc3R5bGU9ImNvbG9yOiAjMjQ2M2QxOyIgaHJlZj0iaHR0cHM6Ly93d3cuZG9jdXNpZ24uY29tL2ZlYXR1cmVzLWFuZC1iZW5lZml0cy9tb2JpbGUiIHRhcmdldD0iX2JsYW5rIiByZWw9Im5vb3BlbmVyIiBkYXRhLXNhZmVyZWRpcmVjdHVybD0iaHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS91cmw/cT1odHRwczovL3d3dy5kb2N1c2lnbi5jb20vZmVhdHVyZXMtYW5kLWJlbmVmaXRzL21vYmlsZSZhbXA7c291cmNlPWdtYWlsJmFtcDt1c3Q9MTU3NDM1NTgyNzk4NzAwMCZhbXA7dXNnPUFGUWpDTkVYYVpNTmhfcmtON2QzMjVpSkN3bjlacWYtd0EiPjxpbWcgY2xhc3M9IkNUb1dVZCIgc3R5bGU9Im1hcmdpbi1yaWdodDogN3B4OyBib3JkZXI6IG5vbmU7IHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7IiBzcmM9Imh0dHBzOi8vY2kzLmdvb2dsZXVzZXJjb250ZW50LmNvbS9wcm94eS9TMmljQm1wVmNRNXdfYWgxeUg0b3JHSy1qZmFXSHJFazBwdUcxTTJzZnQ5Z0g3TGxMbk9RSGoyd3hmbkljTXJ6d0xPUENjUUlyNzBPZTVxUVMwVnpfdTFRWFhObm1NdXZ0VUlNbVEyTmgtRVlJNVNSNjhiYVo1Q2hGamhTPXMwLWQtZTEtZnQjaHR0cHM6Ly9uYTIuZG9jdXNpZ24ubmV0L01lbWJlci9JbWFnZXMvZW1haWwvaWNvbi1Eb3dubG9hZEFwcC0xOHgxOEAyeC5wbmciIHdpZHRoPSIxOCIgaGVpZ2h0PSIxOCIgLz5Eb3dubG9hZCB0aGUgRG9jdVNpZ24gQXBwPC9hPjwvcD4NCjxwIHN0eWxlPSJtYXJnaW4tYm90dG9tOiAxZW07IGZvbnQtZmFtaWx5OiBIZWx2ZXRpY2EsIEFyaWFsLCAnU2FucyBTZXJpZic7IGNvbG9yOiAjNjY2NjY2OyBmb250LXNpemU6IDEwcHg7IGxpbmUtaGVpZ2h0OiAxNHB4OyI+VGhpcyBtZXNzYWdlIHdhcyBzZW50IHRvIHlvdSBieSBUb3JpYSB3aG8gaXMgdXNpbmcgdGhlIERvY3VTaWduIEVsZWN0cm9uaWMgU2lnbmF0dXJlIFNlcnZpY2UuIElmIHlvdSB3b3VsZCByYXRoZXIgbm90IHJlY2VpdmUgZW1haWwgZnJvbSB0aGlzIHNlbmRlciB5b3UgbWF5IGNvbnRhY3QgdGhlIHNlbmRlciB3aXRoIHlvdXIgcmVxdWVzdC48L3A+DQo8L3RkPg0KPC90cj4NCjwvdGJvZHk+DQo8L3RhYmxlPg0KPC90ZD4NCjwvdHI+DQo8L3Rib2R5Pg0KPC90YWJsZT4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg==','FirstName','LastName','MaldocLink','SenderFirstName','SenderLastName','SenderCompany','SenderEmailAddress','FileName','','');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-26 12:12:06
