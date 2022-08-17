/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - data_request
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
-- CREATE DATABASE /*!32312 IF NOT EXISTS*/`data_request` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

-- USE `data_request`;

/*Table structure for table `data_request` */

DROP TABLE IF EXISTS `data_request`;

CREATE TABLE `data_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `data_crfs` text DEFAULT NULL,
  `data_variables` text DEFAULT NULL,
  `data_sites` varchar(200) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `other_info` text DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `reviewed_by` varchar(200) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `status_comments` text DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `review_comments` text DEFAULT NULL,
  `data_manager` int(11) DEFAULT NULL,
  `issued_status` int(11) DEFAULT 1,
  `issued_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_request` */

insert  into `data_request`(`id`,`project_id`,`user_id`,`data_crfs`,`data_variables`,`data_sites`,`date_from`,`date_to`,`other_info`,`received_date`,`reviewed_by`,`approved_by`,`approved_date`,`status`,`status_comments`,`feedback`,`review_date`,`review_comments`,`data_manager`,`issued_status`,`issued_date`) values 
(3,7,1,'enrolment','asasasas','Kilifi, Mbagathi, Migori','2020-11-05','2020-11-26','<p>asasasa</p>\r\n','2020-11-25','1',1,'2020-11-23',2,'Good to go',NULL,'2020-12-09',' <p> Narshion  Ngao : <br/>\n<p> asasasa </p>\n<p> Date: 2020-11-23 </p> </p> <p> Narshion  Ngao : <br/>\n<p> asaa </p>\n<p> Date: 2020-12-09 </p> </p>',NULL,NULL,NULL),
(4,8,1,'enrolment','adm_dob, adm_height, adm_weight','Kilifi, Migori','2018-02-01','2020-11-30','',NULL,'1',NULL,NULL,1,NULL,NULL,'2020-11-23',' <p> Narshion  Ngao : <br/>\n<p> asasas </p>\n<p> Date: 2020-11-23 </p> </p>',NULL,NULL,NULL),
(5,9,15,'Enrolment Part 2, PHQ','Household Social economic status and PHQ','Blantyre',NULL,NULL,'',NULL,'1',NULL,NULL,1,NULL,NULL,'2021-01-11',' <p> Narshion  Ngao : <br/>\n<p> this is ok </p>\n<p> Date: 2021-01-11 </p> </p>',NULL,NULL,NULL),
(6,16,16,'','','',NULL,NULL,'',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(7,17,17,'asasasasa','sasaas','asasas','2020-12-01','2020-12-31','<p>asasas</p>\r\n','2020-12-15',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,18,15,'asasasa, asasa, asasa, asas','asas, assa,asas','asasa','2020-12-01','2020-12-31','<p>asasa</p>\r\n','2020-12-08',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,19,17,'asasasa','aaas','asasas','2020-12-01','2020-12-31','<p>aasas</p>\r\n','2020-12-01',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(10,20,16,'assaas','asasasa','aaas','2020-12-01','2020-12-31','<p>asasa</p>\r\n','2020-12-10','1',1,'2020-12-09',2,'ok',NULL,'2020-12-09',' <p> Narshion  Ngao : <br/>\n<p> asasas </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Test </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Test again </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> assdssddsaass </p>\n<p> Date: 2020-12-09 </p> </p>',NULL,NULL,NULL),
(11,23,1,'asasasa','asasa','asas,fdfdf,dfdf','2021-01-01','2021-01-31','<p>sdsdsd</p>\r\n','2021-01-20',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,26,1,'sasasa','asasa','asasas','2021-01-05','2021-02-05','<p>sassa</p>\r\n','2021-01-20',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,27,18,'Participant Enrollment, Primary Carers Health Questionnaire, Household Nutrition, Household Wealth Assessment, Social Information, Haematology and Biochemistry (Enrollment and Discharge), Daily Record Verbal Autopsy','all','Blantyre, Malawi','2018-07-01','2020-03-31','','2020-06-24',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,28,1,'enrolment, discharge, follow up','All','All','2020-12-01','2021-01-31','<p>asasasa</p>\r\n','2021-01-20',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,15,2,'2021-01-05'),
(15,29,17,'Enrolment, nnfmf, fhffjf, ','asasas, aasas, asas, asaa, All','sasas,aa,asas,aas,asa,asa','2020-12-01','2021-01-31','<p>I will use the for bluh bluh</p>\r\n','2021-01-22','15',1,'2021-01-22',2,'Okay',NULL,'2021-01-22',' <p> Christopher  Maronga : <br/>\n<p> Okay this is good </p>\n<p> Date: 2021-01-22 </p> </p>',16,2,'2021-01-22'),
(16,28,18,'asasas','asasas','sasasa','2021-01-20','2021-01-29','<p>asasasa</p>\r\n','2021-01-20','1',1,'2021-01-23',2,'Whew',NULL,'2021-01-23',' <p> Narshion  Ngao : <br/>\n<p> Review comment </p>\n<p> Date: 2021-01-23 </p> </p>',15,2,'2021-01-28');

/*Table structure for table `lookup` */

DROP TABLE IF EXISTS `lookup`;

CREATE TABLE `lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_category` int(11) DEFAULT NULL,
  `key` int(11) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`fk_category`),
  CONSTRAINT `lookup_ibfk_1` FOREIGN KEY (`fk_category`) REFERENCES `lookup_category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

/*Data for the table `lookup` */

insert  into `lookup`(`id`,`fk_category`,`key`,`value`,`_status`) values 
(1,54,1,'Idea/Analysis/Project Request',NULL),
(2,54,2,'Data Request',NULL),
(3,55,1,'CHAIN Main Cohort',NULL),
(4,55,2,'CHAIN Main Cohort + Substudy',NULL),
(5,55,3,'Substudy Only',NULL),
(6,55,4,'Young Infants Data',NULL),
(7,55,5,'Post Main Cohort Data',NULL),
(8,56,1,'Concept',NULL),
(9,56,2,'Idea Generation',NULL),
(10,56,3,'Proposal',NULL),
(11,56,4,'Approved Protocol',NULL),
(12,56,5,'Existing Study',NULL),
(13,57,1,'Yes, from IRB',NULL),
(14,57,2,'Yes, local institution',NULL),
(15,57,3,'Yes, national regulator',NULL),
(16,57,4,'No, not applicable',NULL),
(17,57,5,'No, still pending',NULL),
(18,58,1,'Submitted',NULL),
(19,58,2,'Review Complete',NULL),
(20,58,3,'Returned for corrections',NULL),
(21,58,4,'Re-submitted with corrections',NULL),
(22,58,5,'Merge with existing project',NULL),
(23,59,1,'Kemri Wellcome Trust Programme',NULL),
(24,59,2,'University of Washington',NULL),
(25,59,3,'Makerere University',NULL),
(26,60,1,'Data Manager',NULL),
(27,60,2,'Reviewer',NULL),
(28,60,3,'Approver',NULL),
(29,60,4,'System Admin',NULL),
(30,61,1,'Submitted',NULL),
(31,61,2,'Approved',NULL),
(32,61,3,'Returned',NULL),
(33,62,1,'PI',NULL),
(34,62,2,'Investigator',NULL),
(35,62,3,'Co-Investigator',NULL),
(36,62,4,'Data Analysis',NULL),
(37,62,5,'Reviewer',NULL),
(38,58,6,'Approved',NULL),
(39,63,2,'Review Complete',1),
(40,63,3,'Returned for corrections',1),
(41,64,3,'Returned for corrections',NULL),
(42,64,5,'Merge with existing project',NULL),
(43,64,6,'Approved',NULL),
(44,64,7,'Declined',NULL),
(45,58,7,'Declined',NULL),
(46,58,8,'Data Review Decline',NULL),
(47,63,8,'Data Review Decline',1),
(48,59,4,'Department of Paediatrics, the College of Medicine, Blantyre, Malawi',NULL),
(49,59,5,'Global Child Health Group, Emma Children’s Hospital, Academic Medical Centre, University of Amsterdam, Amsterdam, The Netherlands',NULL),
(50,59,6,'CHAIN Study',NULL),
(51,59,7,'Dept of Paediatrics, CoM, Blantyre / University of Amsterdam',NULL),
(52,59,8,'Independent Consultant',NULL),
(53,59,9,'Palliative Care Trust',NULL),
(54,59,10,'College of Medicine, Blantyre',NULL),
(55,59,11,'JKUAT',NULL),
(56,59,12,'Nairobi University',NULL),
(57,59,13,'Moi Uni',NULL),
(58,59,14,'Pwani Uni',NULL),
(59,NULL,1,'TUM',NULL),
(60,59,15,'Technical University of Mombasa',NULL),
(61,NULL,1,'TUM 2',NULL),
(62,59,16,'TUM',NULL),
(63,NULL,1,'TUM 2',NULL),
(64,NULL,1,'TUM 3',NULL),
(65,59,17,'Test',NULL),
(66,NULL,1,'Test 2',NULL),
(67,59,18,'TUM2',NULL),
(68,59,19,'Test2',NULL),
(69,59,20,'Test3',NULL),
(70,59,21,'Test4',NULL),
(71,59,22,'Test5',NULL),
(72,65,1,'Pending',NULL),
(73,65,2,'Done',NULL),
(74,59,23,'JKUAT',NULL),
(75,59,24,'MOI',NULL),
(76,59,25,'Pwani',NULL);

/*Table structure for table `lookup_category` */

DROP TABLE IF EXISTS `lookup_category`;

CREATE TABLE `lookup_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  `field` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `lookup_category` */

insert  into `lookup_category`(`id`,`category_name`,`field`) values 
(54,'RequestType',NULL),
(55,'TypeData',NULL),
(56,'ProposalType',NULL),
(57,'IrbApproval',NULL),
(58,'RequestStatus',NULL),
(59,'Affiliation',NULL),
(60,'Role',NULL),
(61,'DataStatus',NULL),
(62,'DataAccessRole',NULL),
(63,'ReviewStatus',NULL),
(64,'ApprovalStatus',NULL),
(65,'IssuedStatus',NULL);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `msg_from` varchar(200) DEFAULT NULL,
  `msg_to` varchar(200) DEFAULT NULL,
  `msg_subject` varchar(200) DEFAULT NULL,
  `msg_body` text DEFAULT NULL,
  `msg_status` int(11) DEFAULT NULL,
  `error_msg` text DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4;

/*Data for the table `message` */

insert  into `message`(`id`,`project_id`,`msg_from`,`msg_to`,`msg_subject`,`msg_body`,`msg_status`,`error_msg`,`date_created`) values 
(114,NULL,'Narshion  Ngao <narshon@gmail.com>','narshon@gmail.com','New Analysis Request: Final test project','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: New Analysis Request: Final test project  <br/>\nHi Narshion  Ngao, <br/>We have received an analysis request. Please login to view the details.',1,NULL,NULL),
(115,NULL,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','New Analysis Request: Final test project','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: New Analysis Request: Final test project  <br/>\nHi Christopher  Maronga, <br/>We have received an analysis request. Please login to view the details.',1,NULL,NULL),
(116,NULL,'Narshion  Ngao <narshon@gmail.com>','mmburu@kemri-wellcome.org','New Analysis Request: Final test project','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: New Analysis Request: Final test project  <br/>\nHi Moses  Mburu, <br/>We have received an analysis request. Please login to view the details.',1,NULL,NULL),
(117,NULL,'Narshion  Ngao <narshon@gmail.com>','narshon@gmail.com','asasas','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: asasas  <br/>\nDear narshon@gmail.com, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\naasasa\n<br/> Please reach out to them and book the appointment.',1,NULL,NULL),
(118,NULL,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','asasas','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: asasas  <br/>\nDear cmaronga@kemri-wellcome.org, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\naasasa\n<br/> Please reach out to them and book the appointment.',1,NULL,NULL),
(119,NULL,'Narshion  Ngao <narshon@gmail.com>','mmburu@kemri-wellcome.org','asasas','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: asasas  <br/>\nDear mmburu@kemri-wellcome.org, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\naasasa\n<br/> Please reach out to them and book the appointment.',1,NULL,NULL),
(120,NULL,'Narshion  Ngao <narshon@gmail.com>','narshon@gmail.com','asasa','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: asasa  <br/>\nDear narshon@gmail.com, 26 <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\naasas\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-13 16:35:09'),
(121,NULL,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','asasa','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: asasa  <br/>\nDear cmaronga@kemri-wellcome.org, 26 <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\naasas\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-13 16:35:09'),
(122,NULL,'Narshion  Ngao <narshon@gmail.com>','mmburu@kemri-wellcome.org','asasa','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: asasa  <br/>\nDear mmburu@kemri-wellcome.org, 26 <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\naasas\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-13 16:35:09'),
(123,26,'Narshion  Ngao <narshon@gmail.com>','narshon@gmail.com','sasasas','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: sasasas  <br/>\nDear narshon@gmail.com, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\nassassasa\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-13 16:49:25'),
(124,26,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','sasasas','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: sasasas  <br/>\nDear cmaronga@kemri-wellcome.org, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\nassassasa\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-13 16:49:25'),
(125,26,'Narshion  Ngao <narshon@gmail.com>','mmburu@kemri-wellcome.org','sasasas','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: sasasas  <br/>\nDear mmburu@kemri-wellcome.org, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: Final test project. The user left the following message: <br/>\nassassasa\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-13 16:49:25'),
(126,NULL,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','New Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: New Analysis Request: MITS in CHAIN  <br/>\nHi Narshion  Ngao, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:02:25'),
(127,NULL,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','New Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: New Analysis Request: MITS in CHAIN  <br/>\nHi Christopher  Maronga, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:02:25'),
(128,NULL,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','New Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: New Analysis Request: MITS in CHAIN  <br/>\nHi Moses  Mburu, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:02:25'),
(129,NULL,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','New Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: New Analysis Request: MITS in CHAIN  <br/>\nHi Wieger  Voskuijl, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:02:25'),
(130,27,'Narshion  Ngao <narshon@gmail.com>','w.p.voskuijl@amsterdamumc.nl','New Review Comment','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: New Review Comment  <br/>\nWe have recieved a review comment about your analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:22:57'),
(131,27,NULL,'narshon@gmail.com','Updated Analysis Request: MITS in CHAIN','From: , <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:12'),
(132,27,NULL,'cmaronga@kemri-wellcome.org','Updated Analysis Request: MITS in CHAIN','From: , <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:12'),
(133,27,NULL,'mmburu@kemri-wellcome.org','Updated Analysis Request: MITS in CHAIN','From: , <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:12'),
(134,27,NULL,'w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: MITS in CHAIN','From: , <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:12'),
(135,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:32'),
(136,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:32'),
(137,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:32'),
(138,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:26:32'),
(139,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:27:40'),
(140,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:27:40'),
(141,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:27:40'),
(142,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:27:40'),
(143,27,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','w.p.voskuijl@amsterdamumc.nl','Analysis Request Update','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-14 10:39:13'),
(144,27,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','w.p.voskuijl@amsterdamumc.nl','Analysis Request Update','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Analysis Request Update  <br/>\nAn approval update was posted on your analysis request. Please login to view the details. ',1,NULL,'2021-01-14 10:41:46'),
(145,27,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','w.p.voskuijl@amsterdamumc.nl','Analysis Request Update','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-14 10:43:02'),
(146,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:45:20'),
(147,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:45:20'),
(148,27,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: MITS in CHAIN','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: MITS in CHAIN  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-14 10:45:20'),
(149,27,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','narshon@gmail.com','Discuss my request','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Discuss my request  <br/>\nDear narshon@gmail.com, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: MITS in CHAIN. The user left the following message: <br/>\nI would bebedm smdmdndnd d\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-14 10:49:47'),
(150,27,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','mmburu@kemri-wellcome.org','Discuss my request','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Discuss my request  <br/>\nDear mmburu@kemri-wellcome.org, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: MITS in CHAIN. The user left the following message: <br/>\nI would bebedm smdmdndnd d\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-14 10:49:47'),
(151,27,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','w.p.voskuijl@amsterdamumc.nl','Discuss my request','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Discuss my request  <br/>\nDear w.p.voskuijl@amsterdamumc.nl, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: MITS in CHAIN. The user left the following message: <br/>\nI would bebedm smdmdndnd d\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-14 10:49:47'),
(152,NULL,'Narshion  Ngao <narshon@gmail.com>','narshon@gmail.com','New Analysis Request: ML Analysis','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: New Analysis Request: ML Analysis  <br/>\nHi Narshion  Ngao, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-22 10:39:49'),
(153,NULL,'Narshion  Ngao <narshon@gmail.com>','mmburu@kemri-wellcome.org','New Analysis Request: ML Analysis','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: New Analysis Request: ML Analysis  <br/>\nHi Moses  Mburu, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-22 10:39:49'),
(154,NULL,'Narshion  Ngao <narshon@gmail.com>','w.p.voskuijl@amsterdamumc.nl','New Analysis Request: ML Analysis','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: New Analysis Request: ML Analysis  <br/>\nHi Wieger  Voskuijl, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-22 10:39:49'),
(155,28,'Narshion  Ngao <narshon@gmail.com>','narshon@gmail.com','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-22 10:58:44'),
(156,28,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','narshon@gmail.com','Analysis Request Update','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-22 11:02:43'),
(157,28,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','narshon@gmail.com','New Review Comment','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: New Review Comment  <br/>\nWe have recieved a review comment about your analysis request. Please login to view the details.',1,NULL,'2021-01-22 11:03:12'),
(158,28,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','narshon@gmail.com','Analysis Request Update','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-22 11:16:39'),
(159,NULL,'Jay  Berkeley <jberkeley@kemri-wellcome.org>','narshon@gmail.com','New Analysis Request: Young Infants Analysis','From: Jay  Berkeley <jberkeley@kemri-wellcome.org>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: New Analysis Request: Young Infants Analysis  <br/>\nHi Narshion  Ngao, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-22 13:44:04'),
(160,NULL,'Jay  Berkeley <jberkeley@kemri-wellcome.org>','cmaronga@kemri-wellcome.org','New Analysis Request: Young Infants Analysis','From: Jay  Berkeley <jberkeley@kemri-wellcome.org>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: New Analysis Request: Young Infants Analysis  <br/>\nHi Christopher  Maronga, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-22 13:44:04'),
(161,NULL,'Jay  Berkeley <jberkeley@kemri-wellcome.org>','mmburu@kemri-wellcome.org','New Analysis Request: Young Infants Analysis','From: Jay  Berkeley <jberkeley@kemri-wellcome.org>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: New Analysis Request: Young Infants Analysis  <br/>\nHi Moses  Mburu, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-22 13:44:04'),
(162,NULL,'Jay  Berkeley <jberkeley@kemri-wellcome.org>','w.p.voskuijl@amsterdamumc.nl','New Analysis Request: Young Infants Analysis','From: Jay  Berkeley <jberkeley@kemri-wellcome.org>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: New Analysis Request: Young Infants Analysis  <br/>\nHi Wieger  Voskuijl, <br/>We have received an analysis request. Please login to view the details.',1,NULL,'2021-01-22 13:44:04'),
(163,29,'Christopher  Maronga <cmaronga@kemri-wellcome.org>','jberkeley@kemri-wellcome.org','New Review Comment','From: Christopher  Maronga <cmaronga@kemri-wellcome.org>, <br/>\nTo: jberkeley@kemri-wellcome.org,  <br/>\nSubject: New Review Comment  <br/>\nWe have recieved a review comment about your analysis request. Please login to view the details.',1,NULL,'2021-01-22 13:50:21'),
(164,29,'Narshion  Ngao <narshon@gmail.com>','jberkeley@kemri-wellcome.org','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: jberkeley@kemri-wellcome.org,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-22 13:56:41'),
(165,29,'Narshion  Ngao <narshon@gmail.com>','jberkeley@kemri-wellcome.org','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: jberkeley@kemri-wellcome.org,  <br/>\nSubject: Analysis Request Update  <br/>\nAn approval update was posted on your analysis request. Please login to view the details. ',1,NULL,'2021-01-22 13:57:44'),
(166,29,'Narshion  Ngao <narshon@gmail.com>','jberkeley@kemri-wellcome.org','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: jberkeley@kemri-wellcome.org,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-22 13:59:57'),
(167,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:25:29'),
(168,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:25:29'),
(169,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:25:29'),
(170,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:25:29'),
(171,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:26:05'),
(172,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:26:05'),
(173,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:26:05'),
(174,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:26:05'),
(175,28,'Narshion  Ngao <narshon@gmail.com>','w.p.voskuijl@amsterdamumc.nl','New Review Comment','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: New Review Comment  <br/>\nWe have recieved a review comment about your analysis request. Please login to view the details.',1,NULL,'2021-01-23 17:26:05'),
(176,28,'Narshion  Ngao <narshon@gmail.com>','w.p.voskuijl@amsterdamumc.nl','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-23 17:26:34'),
(177,28,'Narshion  Ngao <narshon@gmail.com>','w.p.voskuijl@amsterdamumc.nl','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-23 20:34:45'),
(178,28,'Narshion  Ngao <narshon@gmail.com>','w.p.voskuijl@amsterdamumc.nl','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-23 20:35:26'),
(179,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 21:35:10'),
(180,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 21:35:10'),
(181,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 21:35:10'),
(182,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-23 21:35:10'),
(183,8,'Narshion  Ngao <narshon@gmail.com>','mmburu@kemri-wellcome.org','Testing sending message to DT','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Testing sending message to DT  <br/>\nDear mmburu@kemri-wellcome.org, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: CHAIN young Infants analysis. The user left the following message: <br/>\nMessage body is here\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-23 21:48:59'),
(184,7,'Narshion  Ngao <narshon@gmail.com>','narshon@gmail.com','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-23 22:44:35'),
(185,9,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-23 22:44:45'),
(186,9,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Analysis Request Update  <br/>\nAn approval update was posted on your analysis request. Please login to view the details. ',1,NULL,'2021-01-23 22:46:22'),
(187,9,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Analysis Request Update  <br/>\nThe data team have posted an update on the status of your data request. Login to check the details. ',1,NULL,'2021-01-23 22:47:51'),
(188,9,'Narshion  Ngao <narshon@gmail.com>','cmaronga@kemri-wellcome.org','Analysis Request Update','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Analysis Request Update  <br/>\nAn approval update was posted on your analysis request. Please login to view the details. ',1,NULL,'2021-01-23 22:53:53'),
(189,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:47:20'),
(190,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:47:20'),
(191,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:47:20'),
(192,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:47:20'),
(193,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: ML Analysis xxx','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: ML Analysis xxx  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:50:28'),
(194,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: ML Analysis xxx','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis xxx  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:50:29'),
(195,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: ML Analysis xxx','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis xxx  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:50:29'),
(196,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: ML Analysis xxx','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: ML Analysis xxx  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:50:29'),
(197,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','narshon@gmail.com','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: narshon@gmail.com,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Narshion  Ngao, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:53:59'),
(198,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','cmaronga@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: cmaronga@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Christopher  Maronga, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:53:59'),
(199,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','mmburu@kemri-wellcome.org','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Moses  Mburu, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:53:59'),
(200,28,'Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>','w.p.voskuijl@amsterdamumc.nl','Updated Analysis Request: ML Analysis','From: Wieger  Voskuijl <w.p.voskuijl@amsterdamumc.nl>, <br/>\nTo: w.p.voskuijl@amsterdamumc.nl,  <br/>\nSubject: Updated Analysis Request: ML Analysis  <br/>\nHi Wieger  Voskuijl, <br/>We have received updates from this analysis request. Please login to view the details.',1,NULL,'2021-01-24 10:53:59'),
(201,28,'Narshion  Ngao <narshon@gmail.com>','mmburu@kemri-wellcome.org','reloading automatically','From: Narshion  Ngao <narshon@gmail.com>, <br/>\nTo: mmburu@kemri-wellcome.org,  <br/>\nSubject: reloading automatically  <br/>\nDear mmburu@kemri-wellcome.org, <br/>\nAs a data team admin, a meeting has been requested to discuss analysis project titled: ML Analysis. The user left the following message: <br/>\ngood to go\n<br/> Please reach out to them and book the appointment.',1,NULL,'2021-01-24 10:54:51');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(200) DEFAULT NULL,
  `project_aims` text DEFAULT NULL,
  `request_type` int(11) DEFAULT NULL,
  `type_data` int(11) DEFAULT NULL,
  `proposal_type` int(11) DEFAULT NULL,
  `date_submitted` date DEFAULT NULL,
  `irb_other_approval` int(11) DEFAULT NULL,
  `sap` text DEFAULT NULL,
  `pub_plan` text DEFAULT NULL,
  `target_completion_date` date DEFAULT NULL,
  `milestones` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `request_status` int(11) DEFAULT NULL,
  `request_approved_by` int(11) DEFAULT NULL,
  `date_review` date DEFAULT NULL,
  `request_reviewed_by` varchar(50) DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `review_notes` text DEFAULT NULL,
  `approval_notes` text DEFAULT NULL,
  `approval_status` int(11) DEFAULT NULL,
  `data_manager` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `project` */

insert  into `project`(`id`,`project_name`,`project_aims`,`request_type`,`type_data`,`proposal_type`,`date_submitted`,`irb_other_approval`,`sap`,`pub_plan`,`target_completion_date`,`milestones`,`user_id`,`request_status`,`request_approved_by`,`date_review`,`request_reviewed_by`,`date_approved`,`review_notes`,`approval_notes`,`approval_status`,`data_manager`,`active`) values 
(7,'Machine Learning analysis using CHAIN data','<p>Aim 1</p>\r\n\r\n<p>Aim 2</p>\r\n\r\n<p>Aim 3</p>\r\n\r\n<p>Aim 4</p>\r\n\r\n<p>Aim 5</p>\r\n',1,1,2,'2020-11-05',5,'<p>sasaasasa</p>\r\n','<p>sasasasasas</p>\r\n','2020-11-05','<p>sasasa</p>\r\n',1,2,1,'2020-12-09','1','2020-11-23',' <p> Narshion  Ngao : <br/>\n<p> SASASas </p>\n<p> Date: 2020-11-23 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Iko sawa </p>\n<p> Date: 2020-11-23 </p> </p> <p> Narshion  Ngao : <br/>\n<p>  <p> Narshion  Ngao : <br/>\n<p> SASASas </p>\n<p> Date: 2020-11-23 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Iko sawa </p>\n<p> Date: 2020-11-23 </p> </p> </p>\n<p> Date: 2020-12-09 </p> </p>','Please include all variables.',NULL,15,1),
(8,'CHAIN young Infants analysis','<ul>\r\n	<li>To analyis young infants strata</li>\r\n	<li>bluh bluh bluh</li>\r\n</ul>\r\n',1,1,1,'2020-10-07',2,'<p>A summary of what you want to do</p>\r\n','<p>Tell us how you will publish</p>\r\n','2020-11-30','',1,8,1,'2020-11-23','1','2020-11-23',' <p> Narshion  Ngao : <br/>\n<p> It looks good. Did you consider thinking about bluh bluh bluh bluh. </p>\n<p> Date: 2020-11-23 </p> </p> <p> Narshion  Ngao : <br/>\n<p> asaksajkasjaks </p>\n<p> Date: 2020-11-23 </p> </p>','',NULL,16,NULL),
(9,'Wealth Index Analysis','<ul>\r\n	<li>Check standard scoring of household wealth index and caregiver mental health</li>\r\n	<li>hfhhgh</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n',1,1,3,'2020-05-22',4,'completeness.pdf','','2020-05-27','',15,6,1,'2020-11-25','17','2021-01-23',' <p> Jay  Berkeley : <br/>\n<p> comments </p>\n<p> Date: 2020-11-25 </p> </p>','All the best',NULL,16,1),
(10,'Testing out data request app','<p>sassa</p>\r\n',NULL,2,2,'2020-12-03',2,'<p>xasasas</p>\r\n','<p>asasas</p>\r\n','2020-12-15','<p>asasa</p>\r\n',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,'Machine Learning analysis using CHAIN data','<p>asas</p>\r\n',NULL,3,3,'2020-12-02',4,'<p>sasas</p>\r\n','<p>asas</p>\r\n','2020-12-30','<p>sasasa</p>\r\n',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,'CHAIN young Infants analysis','<p>asasasas</p>\r\n',NULL,3,4,'2020-12-09',4,'<p>sasas</p>\r\n','<p>sasasa</p>\r\n','2020-12-15','<p>sasaa</p>\r\n',15,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,'sasasasa','<p>asaasas</p>\r\n',NULL,2,2,'2020-12-16',4,'<p>sassa</p>\r\n','<p>sasasa</p>\r\n','2020-12-16','<p>sasas</p>\r\n',1,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,'CHAIN Main Cohort','<p>sasas</p>\r\n',NULL,2,2,'2020-12-03',2,'<p>asasa</p>\r\n','<p>asasa</p>\r\n','2020-12-31','<p>asas</p>\r\n',15,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,'CHAIN Main Cohort','<p>sasasa</p>\r\n',NULL,4,2,'2020-12-02',3,'<p>sasa</p>\r\n','<p>sasa</p>\r\n','2020-12-30','<p>sasas</p>\r\n',15,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,'sasa','<p>asaas</p>\r\n',NULL,5,2,'2020-12-16',3,'<p>asasas</p>\r\n','<p>asaa</p>\r\n','2020-12-15','<p>sasas</p>\r\n',16,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,'Machine Learning analysis using CHAIN data','<p>sasasa</p>\r\n',NULL,4,2,'2020-12-30',2,'<p>asasas</p>\r\n','<p>asss</p>\r\n','2020-12-02','<p>asasa</p>\r\n',17,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(18,'complete cycle','<p>assa</p>\r\n',NULL,5,3,'2020-12-09',5,'<p>sasasa</p>\r\n','<p>sasas</p>\r\n','2020-12-31','<p>asas</p>\r\n',15,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(19,'complete cycle 2','<p>asasa</p>\r\n',NULL,3,3,'2020-12-09',4,'<p>saaasa</p>\r\n','<p>asaas</p>\r\n','2020-12-09','<p>sasas</p>\r\n',17,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(20,'complete cycle 3','<p>asasa</p>\r\n',NULL,4,4,'2020-12-15',2,'<p>sasasasa</p>\r\n','<p>asasas</p>\r\n','2020-12-08','<p>aasas</p>\r\n',16,8,1,'2020-12-09','1','2020-12-09',' <p> Moses  Mburu : <br/>\n<p> saaas </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> sasasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> saasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Someone else </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> asdaas </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p>  <p> Moses  Mburu : <br/>\n<p> saaas </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> sasasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> saasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Someone else </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> asdaas </p>\n<p> Date: 2020-12-09 </p> </p> </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p>  <p> Moses  Mburu : <br/>\n<p> saaas </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> sasasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> saasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Someone else </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> asdaas </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p>  <p> Moses  Mburu : <br/>\n<p> saaas </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> sasasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> saasa </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Someone else </p>\n<p> Date: 2020-12-09 </p> </p> <p> Narshion  Ngao : <br/>\n<p> asdaas </p>\n<p> Date: 2020-12-09 </p> </p> </p>\n<p> Date: 2020-12-09 </p> </p> </p>\n<p> Date: 2020-12-09 </p> </p>','We already have a pipeline for this work',NULL,NULL,NULL),
(21,'Machine Learning analysis using CHAIN data','<p>sasasasa</p>\r\n',NULL,3,2,'2020-12-02',1,'<p>asasas</p>\r\n','<p>asasa</p>\r\n','2020-12-08','<p>asasas</p>\r\n',16,8,NULL,'2020-12-14','1',NULL,' <p> Narshion  Ngao : <br/>\n<p> asaasa </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> I think the scope is too wide. We cannot conclusively serve this request. Please resubmit. </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p>  <p> Narshion  Ngao : <br/>\n<p> asaasa </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> I think the scope is too wide. We cannot conclusively serve this request. Please resubmit. </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p>  <p> Narshion  Ngao : <br/>\n<p> asaasa </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> I think the scope is too wide. We cannot conclusively serve this request. Please resubmit. </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p>  <p> Narshion  Ngao : <br/>\n<p> asaasa </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> I think the scope is too wide. We cannot conclusively serve this request. Please resubmit. </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> <p> Narshion  Ngao : <br/>\n<p> test </p>\n<p> Date: 2020-12-14 </p> </p> </p>\n<p> Date: 2020-12-14 </p> </p> </p>\n<p> Date: 2020-12-14 </p> </p>',NULL,NULL,NULL,NULL),
(22,'Saasas','<p>sasasas</p>\r\n',NULL,1,3,'2021-01-05',NULL,'','<p>asasas</p>\r\n',NULL,'',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(23,'rerererer','<p>sasas</p>\r\n',NULL,1,2,'2021-01-26',4,'','<p>ssasas</p>\r\n','2021-01-30','<p>asasas</p>\r\n',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(24,'sasasdsdsfere','<p>eewewew</p>\r\n',NULL,3,2,'2021-01-20',5,'','','2020-12-30','',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(25,'sasaas','<p>aasas</p>\r\n',NULL,3,3,'2021-01-20',4,'completeness.pdf','<p>sasasa</p>\r\n',NULL,'',15,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(26,'Final test project','<p>asasas</p>\r\n',NULL,1,3,'2021-01-20',2,'completeness.pdf','<p>sasasa</p>\r\n','2021-01-19','<p>asasas</p>\r\n',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(27,'MITS in CHAIN','<p>AIM 1. To determine the extent to which MITS informs COD attribution beyond clinical COD determination in children, aged 2-23 months, who die during an inpatient admission for an acute illness with various forms of undernutrition.<br />\r\nAIM 2. To determine the feasibility of post-mortem endoscopy and biopsy of the small intestine and sigmoid/rectum and the effect of time to sampling after death on tissue integrity.<br />\r\nAIM 3. To explore underlying and indirect contributors to mortality and pathophysiologic mechanisms based on MITS, including intestinal sampling.<br />\r\nAIM 4. To understand parental and key gatekeeper/frontline health-care worker perceptions and attitudes about MITS and associated consent procedures.</p>\r\n',NULL,2,2,'2020-06-24',4,'','<p>This request is to compare the CHAIN enrollment CRF with the information extracted from the patient clinical notes to write a &quot;clinical vignette&quot; described the antemortem clinical condition of MITS in CHAIN participants. This will avoid discrepent data for our Cause of Death panel. We also would like the socio-demographic data collected to inform and contextualize our social sciences work for MITS in CHAIN. Additionally, we would like to review the antemortem data for future analysis ideas for the MITS substudy.</p>\r\n','2021-09-30','<p>1. End of sub-study recruitment: April 14, 2020.</p>\r\n',18,1,15,'2021-01-14','1','2021-01-14',' <p> Narshion  Ngao : <br/>\n<p> Yes this is good </p>\n<p> Date: 2021-01-14 </p> </p>','Okay, proceed',NULL,NULL,NULL),
(28,'ML Analysis','<p>1. asssas</p>\r\n\r\n<p>2.reloading works!</p>\r\n',NULL,1,3,'2021-01-22',1,'NLP Presentation.pptx','','2021-01-31','<p>1. gfg</p>\r\n\r\n<p>2. ffdf</p>\r\n\r\n<p>3. testt</p>\r\n',18,4,NULL,'2021-01-23','1',NULL,' <p> Christopher  Maronga : <br/>\n<p> Please check xyz </p>\n<p> Date: 2021-01-22 </p> </p> <p> Narshion  Ngao : <br/>\n<p> Okay good to go. </p>\n<p> Date: 2021-01-23 </p> </p>',NULL,NULL,15,1),
(29,'Young Infants Analysis','<ol>\r\n	<li>One&nbsp;</li>\r\n	<li>Two&nbsp;</li>\r\n	<li>Three</li>\r\n</ol>\r\n',NULL,4,2,'2021-01-22',4,'NLP Presentation.pptx','<p>asaas</p>\r\n','2021-02-10','<p>asasas</p>\r\n',17,8,1,'2021-01-22','15','2021-01-22',' <p> Christopher  Maronga : <br/>\n<p> This is good to go </p>\n<p> Date: 2021-01-22 </p> </p>','Work in collabo with xyz',NULL,NULL,NULL);

/*Table structure for table `project_user` */

DROP TABLE IF EXISTS `project_user`;

CREATE TABLE `project_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `affiliation` varchar(200) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `project_user` */

insert  into `project_user`(`id`,`project_id`,`name`,`email`,`affiliation`,`role`) values 
(4,7,'narshion Matai ngao','nngao@gmail.com','1','4'),
(5,8,'Peter','nngao@gmail.com','2','5'),
(6,8,'asasas','asasa@sasa.com','3','3'),
(7,9,'Peter','nngao@gmail.com','2','2'),
(8,8,'narshion ngao','nngao@gmail.com','1','4'),
(9,19,'Test 1','nngao@gmail.com','1','1'),
(10,20,'asasasa','asasa@sasa.com','3','3'),
(11,20,'narshion ngao','nngao@gmail.com','2','3'),
(12,20,'Peter','petr@test.com','1','4'),
(13,23,'asasasa','asasa@sasa.com','1','4'),
(14,23,'asasasa','asasa@sasa.com','2','2'),
(15,26,'narshion Matai ngao','nngao@gmail.com','1','3'),
(16,27,'Donna Denno','','2','2'),
(17,27,'Chikondi Makwinja','test@test.com','4','4'),
(18,27,'Emmanuel Chimwezi','test@test.com','4','4'),
(19,27,'Wieger Voskuijl','test@test.com','5','1'),
(20,27,'Daniella Brals','test@test.com','7','2'),
(21,27,'Donna Denno','test@test.com','2','1'),
(22,27,'Sarah Lawrence','test@test.com','2','2'),
(23,27,'Erika Fuetz','test@test.com','2','2'),
(24,27,'Kelley VanBuskirk','test@test.com','8','2'),
(25,27,'Cornelius Huwa','test@test.com','9','5'),
(26,27,'Steve Kamiza','test@test.com','10','5'),
(27,27,'Sumaya Mohamed','test@test.com','2','5'),
(28,28,'saaasas','','12','2'),
(29,28,'narshion ngao','nngao@gmail.com','1','4'),
(30,29,'Tudor Otieno','','12','3'),
(31,29,'asasa','narshon@gmail.com','5','5');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) DEFAULT 1,
  `email` varchar(500) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `passwd` varchar(500) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `mname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`org_id`,`email`,`username`,`passwd`,`fname`,`mname`,`lname`,`designation`,`role`,`last_login`) values 
(1,2,'narshon@gmail.com','admin','$2y$13$frMfTx.8RdNRtOBC0l11ze08Q13O9YeQeH5Q9xFv.qkFZf3f/mU3W','Narshion','','Ngao','3',4,'2021-01-22 13:35:43'),
(15,2,'cmaronga@kemri-wellcome.org','chris','$2y$13$frMfTx.8RdNRtOBC0l11ze08Q13O9YeQeH5Q9xFv.qkFZf3f/mU3W','Christopher','','Maronga','3',2,'2021-01-22 13:36:39'),
(16,NULL,'mmburu@kemri-wellcome.org','moses',NULL,'Moses','','Mburu','',1,NULL),
(17,NULL,'jberkeley@kemri-wellcome.org','jay',NULL,'Jay','','Berkeley','',3,NULL),
(18,NULL,'w.p.voskuijl@amsterdamumc.nl','Wieger',NULL,'Wieger','','Voskuijl','',2,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
