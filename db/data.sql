-- MySQL dump 10.13  Distrib 5.1.61, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: italy
-- ------------------------------------------------------
-- Server version	5.1.61-0ubuntu0.10.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` (`id`, `client`, `supplier`, `date`, `comment`, `legal_entity`) VALUES (1,33,34,'2012-04-29','Matteo,\r\n \r\nIl ns cliente â€œGran Keramikaâ€ chiede per la sua F&C che ha compratpo da noi  :\r\n1)      Set per tagliare mosaico 20x20 mm ( tray )\r\n2)      6 pz dischi per gres\r\n3)      1 pz nastro di trasporto\r\n \r\nCi mandi lâ€™offerta per favore\r\n \r\nAndrey',1),(2,35,34,'2012-04-29','Hello, Andrey !\r\n \r\nOur factory produces the polished gres. We also cut it, basically the size 600x600 into battiscopas 100x600 ( precisely  92x600 ). Besides we cat the size 300x600 but in this case we also bevel the edge ( for wich pupose we make the machine ourselves ). We receive some orderes for other sizes as well.\r\n \r\nPls, send us your offer for the cutting line of gres 600x600 into different sizes with beveling the edge !!!\r\n \r\nBest regards,\r\nOOO \"Poligres\" head of Production\r\nAndrey Koltashev\r\n-------- ÐŸÐµÑ€ÐµÑÑ‹Ð»Ð°ÐµÐ¼Ð¾Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ--------\r\n20.04.2012, 14:15, \"ÐžÐžÐž ÐŸÐ¾Ð»Ð¸Ð³Ñ€ÐµÑ\" <poligres@mail.ru>:\r\nÐ”Ð¾Ð±Ñ€Ñ‹Ð¹ Ð´ÐµÐ½ÑŒ, ÐÐ½Ð´Ñ€ÐµÐ¹!\r\n\r\nÐÐ°Ñˆ Ð·Ð°Ð²Ð¾Ð´ Ð¿Ñ€Ð¾Ð¸Ð·Ð²Ð¾Ð´Ð¸Ñ‚ Ð¿Ð¾Ð»Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ñ‹Ð¹ ÐºÐµÑ€Ð°Ð¼Ð¾Ð³Ñ€Ð°Ð½Ð¸Ñ‚. Ð¢Ð°Ðº Ð¶Ðµ Ð·Ð°Ð½Ð¸Ð¼Ð°ÐµÐ¼ÑÑ Ñ€ÐµÐ·ÐºÐ¾Ð¹ ÐºÐµÑ€Ð°Ð¼Ð¾Ð³Ñ€Ð°Ð½Ð¸Ñ‚Ð°, Ð² Ð¾ÑÐ½Ð¾Ð²Ð½Ð¾Ð¼ Ñ€Ð°Ð·Ð¼ÐµÑ€Ð¾Ð¼ 600Ñ…600, Ð½Ð° Ð¿Ð»Ð¸Ð½Ñ‚ÑƒÑÑ‹ Ñ€Ð°Ð·Ð¼ÐµÑ€Ð¾Ð¼ 100Ñ…600 (Ñ‚Ð¾Ñ‡Ð½Ñ‹Ð¹ Ñ€Ð°Ð·Ð¼ÐµÑ€ 92Ñ…600). Ð•Ñ‰Ñ‘ Ñ€ÐµÐ¶ÐµÐ¼ Ñ€Ð°Ð·Ð¼ÐµÑ€Ð¾Ð¼ 300Ñ…600, Ð½Ð¾ ÑƒÐ¶Ðµ Ñ Ð½Ð°Ð½ÐµÑÐµÐ½Ð¸ÐµÐ¼ Ñ„Ð°ÑÐºÐ¸ (ÐºÐ¾Ñ‚Ð¾Ñ€ÑƒÑŽ Ð¾Ð±Ð¾Ñ€ÑƒÐ´Ð¾Ð²Ð°Ð»Ð¸ Ð½Ð° ÑÑ‚Ð°Ð½Ð¾Ðº ÑÐ°Ð¼Ð¸). Ð‘Ñ‹Ð²Ð°ÑŽÑ‚ Ð·Ð°ÐºÐ°Ð·Ñ‹ Ð¸ Ð½Ð° Ð´Ñ€ÑƒÐ³Ð¸Ðµ Ñ€Ð°Ð·Ð¼ÐµÑ€Ñ‹.\r\n\r\nÐŸÑ€Ð¾ÑˆÑƒ Ð’Ð°Ñ Ð¾Ñ‚Ð¿Ñ€Ð°Ð²Ð¸Ñ‚ÑŒ Ð½Ð°Ð¼ Ð¿Ñ€ÐµÐ´Ð»Ð¾Ð¶ÐµÐ½Ð¸Ñ Ð¿Ð¾ Ð»Ð¸Ð½Ð¸Ð¸ Ñ€ÐµÐ·ÐºÐ¸ ÐºÐµÑ€Ð°Ð¼Ð¾Ð³Ñ€Ð°Ð½Ð¸Ñ‚Ð½Ð¾Ð¹ Ð¿Ð»Ð¸Ñ‚ÐºÐ¸ Ñ€Ð°Ð·Ð¼ÐµÑ€Ð¾Ð¼ 600Ñ…600 Ð½Ð° Ñ€Ð°Ð·Ð½Ñ‹Ðµ Ñ€Ð°Ð·Ð¼ÐµÑ€Ñ‹ Ñ Ð½Ð°Ð½ÐµÑÐµÐ½Ð¸ÐµÐ¼ Ñ„Ð°ÑÐºÐ¸!!!\r\n\r\n \r\nÐ¡ ÑƒÐ²Ð°Ð¶ÐµÐ½Ð¸ÐµÐ¼, Ð½Ð°Ñ‡.Ð¿Ñ€-Ð²Ð° \r\nÐžÐžÐž \"ÐŸÐ¾Ð»Ð¸Ð³Ñ€ÐµÑ\"\r\nÐÐ½Ð´Ñ€ÐµÐ¹ ÐšÐ¾Ð»Ñ‚Ð°ÑˆÐµÐ².\r\nÑ‚ÐµÐ».89126765223 (Ð¼Ð¾Ð±.)\r\nÑ‚ÐµÐ».83435049307 (Ñ€Ð°Ð±.)',1);
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `attachment`
--

LOCK TABLES `attachment` WRITE;
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `attachment_type`
--

LOCK TABLES `attachment_type` WRITE;
/*!40000 ALTER TABLE `attachment_type` DISABLE KEYS */;
INSERT INTO `attachment_type` (`id`, `code`) VALUES (1,'application'),(2,'organization'),(3,'person');
/*!40000 ALTER TABLE `attachment_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `person`, `type`, `value`) VALUES (2,1,2,'+79169002514'),(3,1,2,'+7 495 7470114'),(4,1,1,'alex.uezdin'),(5,5,1,'+7.812.3268534'),(6,6,2,'+7.921.8782478'),(7,6,3,'dashkovl@mail.ru , vtd_razvitie@vozr.ru'),(8,7,2,'+7(812) 3268880'),(9,7,2,'+7(963) 3129079'),(10,7,3,'rvpasko@gmail.com'),(11,7,1,'rpasko'),(12,8,2,'+7. 928. 2249768'),(13,8,3,'biruza@dinet.ru '),(14,9,3,'moderneco@gmail.com '),(15,9,2,'+7.928.5238987'),(16,10,2,'+7 (495) 2218038'),(17,10,3,' info@ligron.ru'),(18,11,3,'infoligron@gmail.ru'),(19,12,2,'+998 71 2544083'),(20,12,3,'beck_5973@bk.ru'),(21,13,2,'+99-872-365-63-52 '),(22,14,2,'79029829389'),(23,14,3,'marmimarco@mail.ru'),(24,15,3,'E-mail: russart@bk.ru'),(25,16,2,'0074957399123'),(26,17,2,'+7. 8443 392692'),(27,17,3,' stbmramor@mail.ru'),(28,18,2,'+7(495)5448541'),(29,18,3,'info@mpamop.ru'),(30,19,3,'justas@labradoras.lt'),(31,19,2,'+370.61246036'),(32,20,3,' ecosoyuzarmenia@list.ru'),(33,21,2,'+91 - 94443 76114'),(34,21,3,'skstone3@hotmail.com'),(35,22,3,'svs12@list.ru'),(36,23,2,'+371.29115112'),(37,23,3,'ingars.sils@bscgrupa.lv'),(38,24,2,'998 97 457-02-59'),(39,25,3,'admin@ramr.az'),(40,25,2,'(+99412) 5103653'),(41,26,3,'vladimir.khlebnikov@gmail.com'),(42,26,3,'vv@groupsmart.ru  '),(43,27,3,'newlita@mail.ru'),(44,27,2,'+374.10 473672'),(45,28,2,'+374.10 473672'),(46,28,3,'newlita@mail.ru'),(47,29,3,'tolyes37@mail.ru'),(48,29,2,'0077172231662'),(49,30,2,'259 50 83'),(50,31,3,'sardys@sardys.spb.ru'),(51,31,2,'+7. 812. 3201560'),(52,32,3,'popov@sardys.spb.ru'),(53,32,2,'+39.0523.984833'),(54,33,3,'Akvamarin Lait <travertin@inbox.ru>'),(55,34,3,'belakta@tut.by'),(56,34,2,'+375.163419749'),(57,35,2,'+7(963) 7102808'),(58,35,2,'+39(388) 1782711'),(59,35,3,'varagyan@travertin.org '),(60,36,2,' +7(926) 2536101'),(61,36,2,'+39(335) 6409646'),(62,36,3,'journalist@travertin.org Â  Â '),(63,37,2,'Â + 374 (91) 219021'),(64,37,3,'info@travertin.org'),(65,37,3,'artavazardh@list.ru'),(66,38,2,'+998 (71) 1334038'),(67,38,3,'ag@sks.uz'),(68,39,3,'liviosica@comandulli.it'),(69,39,2,'+393472480010'),(70,39,2,'+390374357230'),(71,39,1,'Livio Sica'),(72,40,3,'nicola.decesare@pellegrini.net'),(73,40,2,'+39 045 8203666'),(74,40,1,'decesare.pellegrini.meccanica'),(75,41,2,'+393351276602'),(76,41,2,'+390352057155 '),(77,41,3,'sergio.gervasoni@cmsindustries.it '),(78,41,1,'sergio_cecio_gervasoni'),(79,1,3,'a.uezdin@cersanit.ru'),(80,5,3,'belkovets@mail.ru');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contact_type`
--

LOCK TABLES `contact_type` WRITE;
/*!40000 ALTER TABLE `contact_type` DISABLE KEYS */;
INSERT INTO `contact_type` (`id`, `code`) VALUES (1,'skype'),(2,'phone'),(3,'mail');
/*!40000 ALTER TABLE `contact_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `legal_entity`
--

LOCK TABLES `legal_entity` WRITE;
/*!40000 ALTER TABLE `legal_entity` DISABLE KEYS */;
INSERT INTO `legal_entity` (`id`, `name`, `res_basename`) VALUES (1,'Easyker','easyker'),(2,'Obrastone','obrastone'),(3,'Ital-Kem','italkem');
/*!40000 ALTER TABLE `legal_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` (`id`, `type`, `name`, `phone`, `site`, `address`, `country`, `legal_entity`) VALUES (1,2,'CERSANIT-FRIANOVO FACTORY','+7 495 747 01 14','www.cersanit.ru','via Molodejnaia, 15, pos. Fryanovo, Scelkovskiy raion, oblast di Mosca','Russia',1),(2,2,'CERSANIT-KUCINO FACTORY','+7 495 9749763	','www.cersanit.ru','Kucino','Russia',1),(26,2,'UTT','','','Tatarstan, g. Nabereznie Chelni','Russia',2),(27,2,'Barlet ','+7 383 217 4700','http://barlet.ru/kontakt.php?go=7&level=1','Pashkalov Andrey, general director, Novosibirsk, 630099,via Semi  Shamshinykh 24,  ','Russia',2),(28,2,'Colizei Vechi ','Josan Liudmila, (3732) 27-05-82, 910 2092 mob. +373.69.102092    ','','Kishinev, via Tighina, 42,','Moldova',2),(29,2,'Santemax','Mirsoev Khagani tel : 8 495 779 10 23 , 8 985 765 35 55 ','http://www.santemax.ru/','17218, Mosca Nakhimovsky prospect  28','Russia ',2),(30,2,'Technoservice Build ','Stanetsky Gennady, +38 044 278 082 10, +38 044 272 14 23','http://www.stonegallery.com.ua/contents/o-nas','Kiev, via Trohsvyatitelskaya 11, office 5, email : ukrnerudprom@ukr.net','Ucraina ',2),(31,2,'Artishok ','Alexandra Bykovskaya ( purchasing department), email : bykovskaya@artishock.ru, tel : 8 495 739 3880, 8 916 318 68 11','http://artishock.ru/index.php?option=com_contact&Itemid=3','','Russia ',2),(32,2,'GRAN KERMAIKA','','','Cheboksary','Russia',1),(33,2,'GRAND KERAMIKA','','','Cheboksary','',1),(34,1,'Ferrari & Cigarini','','','','Italy',1),(35,2,'POLIGRESS OOO','','','','RUSSIA',1),(36,2,'SOKOL OAO','','','','RUSSIA',1),(37,2,'\"AAB PROJECT\" LLC','+37410259359','','','Armenia ',2),(38,2,'VOZROZHDENIE','+7 (812) 3268534','http://www.vozr.com','4a Michaylovskiy str.,198092Â  St.Petersburg','Russia ',2),(39,2,'BIRYUZA ','+7. 8722. 603917 ',' www.biryuza-mramor.ru ','10a Pugachiov Street Makhachkala city, Republic of Daghestan','Russia',2),(40,2,'MODERN',' +7.8722.676569','www.modern05.ru','Makhachkala, Batiraya str.167, 367000','Russia',2),(41,2,'LIGRON','+7 (495) 2218038','www.ligron.ru','125195, Moscow, 59, Leningradskoe chaussee, MRP, 4th floor','Russia',2),(42,2,'ÐžÐžÐž \"NE\'MAT B\"','+998 97 4570259','','ul. Ðžybek 38, Ð¢Ð°shkent - Rep.Uzbekistan','Uzbekistan',2),(43,2,'ÐžÐžÐž \"POYTAXT BAHOLASH MASLAXATI\"',' 8-371-233-98-39','','Taskent','Uzbekistan',2),(44,2,'MRAMORNY VEK','79029829389','','Krasnoyarsk ','Russia',2),(45,2,'GARDENBERG','+7 (812) 3264558','www.gardenberg.ru','ul. Voroshilova 2, office 812,193318 Sant Petersburg','Russia',2),(46,2,'LGE','0074957415157','','Armenia','Armenia',2),(47,2,'STB OOO','+7. 8443.315773','','Lenina pr-t 50,404110 Volzhskiy','Russia',2),(48,2,'NATURAL STONES','+7(495)7867357','www.mpamop.ru','Moscow','Russia ',2),(49,2,'LABRADORAS ','+370.61246036','','Vilnius ','Lithuania',2),(50,2,'OOO ALTORON ','+37493145451','','Armenia','Armenia',2),(51,2,'KLIPMASH','(495) 380-2912','http://www.gidro-rezka.ru/','109316, Mosca, Talalikhina  41 stroenie  4','Russia',2),(52,2,'BELGRAN','+375. 296-25-02',' www.belgran.by','220046Â  Minsk, Belarus 11a, Radialnaya str. ','Bielorusia ',2),(53,2,'SK + ','+91 - 44 - 2235 4868','','Moscow','Russia',2),(54,2,'MEKAS','','','g.Cherepovets','Russia',2),(55,2,'BSC GROUP SOLNA TECHNOLOGIES','+371.67503998','','1029 Riga Gramzdas Iela 82-2 ','Latvia',2),(56,2,'MULK-BAHO ','8 (371) 254-40-99','','Tashkent','Uzbekistan',2),(57,2,'R.A.M.R','(+99412) 5103653','','Inshaatchilar avenue 20, Baku','Azerbaijan',2),(58,2,'SB STUDIO (GROUP SMART)','+7.926.6039012','','Moscow','Russia',2),(59,2,'NEWLITA LLC','+374.10 473672','www.newlita-tile.org','Arin/Berd 17, Yerevan','Armenia',2),(60,2,'ART COLOUR','0077172231662','','Astana','Kazakhistan',2),(61,2,'BUNEBA','259 50 83','www.bunebaprint.ge','','Georgia',2),(62,2,'SARDYS ','+7. 812. 3201560','www.sardys.ru ,Â www.sardys.spb.ru','Boksitogorskaya Str. 2, Â St.Petersburg, 195248, ','Russia',2),(63,2,'SARDYS S.E.R.L','+39.0523.984833','www.sardys.ru ,Â www.sardys.spb.ru','Via Calestani 19, 29017, Â Fiorenzuola d\'Arda','Italia ',2),(64,2,'MALAKHIT LTD ','','','Vilchkovskogo Street 182 - G, Yerevan','Armenia',2),(65,2,'BELAKTA','+375.163419749','belakta.at.tut.by','225320 Baranovichy','Belorus',2),(66,2,'\"KARASTGH\" LLC','+7(495) 1361974','','MoscowÂ \"PLANET 2000\" - All Types of Building Works','Russia',2),(67,2,'KARART','+ 374 (244) 55597, + 374 (91) 219021',' www.travertin.org','10 Shirakatsi Str.,377610 Artik city','Armenia',2),(68,2,'OOO \"OSIYO GRANIT\"','+374 10) 589294',' www.karart.am/en ','10 Ayasi Str. 375082 Yerevan, ','',2),(69,1,'COMANDULLI ','+39 037456161','http://www.comandulli.it/','Via Medaglie d\'argento, 20 Zona industriale 26012 CASTELLEONE (CR) ','Italia',2),(70,1,'Pellegrini ','+39 045 8203666','www.pellegrini.net','Viale Delle Nazioni 8 - 37135 Verona','Italia',2),(71,1,'CMS BREMBANA','+39 03 456 4111','http://www.cms.it/','via A. Locatelli, 49 - 24019 Zogno (BG)','Italia',2);
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `organization_type`
--

LOCK TABLES `organization_type` WRITE;
/*!40000 ALTER TABLE `organization_type` DISABLE KEYS */;
INSERT INTO `organization_type` (`id`, `code`) VALUES (1,'supplier'),(2,'client');
/*!40000 ALTER TABLE `organization_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id`, `organization`, `name`, `position`, `comment`, `legal_entity`) VALUES (1,1,'Uezdin Alexey','Purchase Manager','',1),(2,33,'Sergey','Director','',1),(3,36,'Sokol Alexey','DIRECTOR','',1),(4,27,'Pashkalov Andrey','General Director ','',2),(5,38,'Sergey Belkoviez','General director ','',2),(6,38,'Leonid Dashkov','direttore tecnico ','',2),(7,38,'Roman Pasko','manager','parla inglese ',2),(8,39,'Hadjimurad Gadjievich AKAEV','Deputy Director ','',2),(9,40,'Rustam Gadzhikerimov','manager','',2),(10,41,'Valeri Vorotyntsev','Company Owner ','',2),(11,41,'Elena Maiarova','Office Manager ','',2),(12,42,'Farhad Zakirov','manager','',2),(13,43,'Sergey Evgenievic','Director ','',2),(14,44,'Dmitry Kiselyov',' director of manufacturing ','',2),(15,45,'GARDENBERG','Managers','',2),(16,46,'Serobyan Norair Oganesovich','Director','',2),(17,47,'Svetlana','manager','',2),(18,48,'Eskhil Nikiforov','manager','',2),(19,49,'Justas Musteikis','manager','',2),(20,50,'Arutyunyan Sargis','manager','',2),(21,53,'Keshav Kumar','Director','',2),(22,54,'Valeriy Sokolskiy','Director','HANNO ACQUISTATO UNA MAXIMA 2 ANNI FA E SEMPRE SEMBRA CHE ABBIANO PENSATO AD UNA WATERJET. Ha la Maxima 309',2),(23,55,'Ingars Sils ','manager','',2),(24,56,'Muslimov Oybek Yusupzhanovich','manager','AVEVANO CHIESTO INFO IN MERITO A DEGLI USATI POI PERO\' SAPUTO PIU\' NULLA',2),(25,57,'Yagub K.Gambarov','IT Dep & IT Project Manage','AVEVANO CHIESTO OFFERTE PER VARI MACCHINARI NEL 2010',2),(26,58,'Vladimir Khlebnikov ','manager','',2),(27,59,'Arthashes Bagdasarian','General Director','aveva comperato una DONATONI \"Quadrix\"',2),(28,59,'Naira Tandilyan','commercial director','',2),(29,60,'Mr.Tolegnenov','manager','OFFERTA per una Concept per fare bassorilievi, engravings e profili semplici',2),(30,61,'Giorgi Velijanashvili','Director','OFFERTE Sprint-Jet, Water Jet (semplice), Maxima 5A ',2),(31,62,'Mr. Stefan ','titolare','',2),(32,62,'Voktor Popov','manager of machinery and tools department','',2),(33,64,'Ms. Araksi','manager','OFFERTE ORMAI TRE ANNI FA PER MAXIMA A 5 ASSI',2),(34,65,'Costantine Falkovich','manager','',2),(35,66,'Armen Varagyan','Chief Manager for International Sales','giovane genero, parla italiano',2),(36,66,'Lamara Ogannisyan','Director of Information Department',' figlia di Artavazd Ogannisyan- Presidente ',2),(37,67,'Oleg Gabrielyan','Director','',2),(38,68,'Artur Bagryan','president ','',2),(39,69,'Livio Sica','manager','',2),(40,70,'Nicola De Cesare ','manager','',2),(41,71,'Sergio Gervasoni ','manager','',2);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id`, `contact`, `date`, `comment`, `legal_entity`) VALUES (1,5,'2011-10-06',' CMS : aveva firmato con noi nel 2010 un contratto in fiera a Verona per una cnc 5 assi; poi perÃ² nel 2011 ha acquistato da Breton ( sono giÃ  clienti Bidese e probabilmente questa fusione li ha spinti a cambiare idea ). Sotto trovate vari contatti; io parlavo sempre con Roman Pasko che Ã¨ l\'unico che parlicchia anche inglese (anche se non molto).....so che volevano comprare anche un tornio probabilmente ( che gli abbiamo offerto ) e forse una waterjet.',2),(2,12,'2011-09-23','CMS: abbiamo incontrato il 23.09.11 presso la fiera di Verona questo nostro cliente russo con cui siamo da tempo in contatto per varie tecnologie.Il cliente ha una sua cava di pietra calcarea ed una fabbrica nella Repubblica del Daghestan (parte meridionale della Federazione Russa), con vecchie linee di lavorazione di produttori misti (vecchia linea modulmarmo della CAMMA di Mario Spadone anno 1996-1997, vecchia fresa sempre della CAMMA, macchine piÃ¹ recenti Bombieri ',2),(3,19,'2011-09-05','Ci hanno chiesto oggi una nostra offerta per una fresa a CN contornatrice con elettromandrino come la \"Contoursaw FR/NC\" della BRETON ',2),(4,21,'2011-09-05','Il cliente ha giÃ Â  una proposta per una OMAG \"Mill 98\" e, per essere competitivi con il prezzo, possiamo proporgli una CONCEPT 283 nella stessa configurazione della macchina giÃ  recentemente proposta alla STB OOO (Russia)',2),(5,22,'2011-09-05','interessato di equipment Maxima 5X CNC ',2),(6,24,'2011-08-31','haÂ chiesto se abbiamo disponibile un impianto water-jet usato e se possiamo anche proporre una macchina per \"engravings\", non crediamo un centro a CN completo, ma una piccola macchina a 3 assi per scrivere e fare piccoli bassorilievi.',2),(7,25,'2011-08-21','Aveva chiesto info per Maxima',2),(8,28,'2011-09-23','Ci sembra di aver capito che al cliente, forse anche per una questione di prezzo di investimento, potrebbe andare bene una macchina piÃ¹ semplice ed economica rispetto alla UNYKA, come una fresa con motore tradizionale che gli possa anche fare delle lavorazioni a CN con l\'albero in verticale e cambiando \"qualche\" utensile (vedi quali e quali lavorazioni possibili...) con un attacco conico ISO. Mi ha detto di avere giÃ  una fresa a CN, ma con banco rotante e piuttosto lenta (+ con problemi di software..) con la quale lui ha giÃ  fatto lavorazioni di engravings ed altre con utensili a CN applicati.',2),(9,30,'2011-09-23','HA ACQUISTATO UNA PRUSSIANI DI CUI PERO\' NON E\' ASSOLUTAMENTE CONTENTO',2),(10,32,'2011-09-23',' il cliente aspettava la finanziamento statale per questa macchina ancora fine 2010, ma ci sono i ritardi. Adesso dice che promettono il finanziamento in maggio 2011',2),(11,33,'2011-09-23','armeni, ma vivono a Mosca. PiÃ¹ di un anno siamo con loro in trattativa per le macchine grosse per taglio blocchi (Gaspari Menotti), adesso mi hanno detto che finiscono i loro lavori di preparazione nella fabbrica e in febbraio cercheranno di venire in Italia per discutere concretamente. Hanno anche detto che sono interessati nelle macchine tipa centri di lavoro. Quindi, adesso mando a loro la presentazione della CMS e delle macchine e quando arriveranno in febbraio, li porteremo in CMS.',2),(12,36,'2011-09-23','PER QUESTO CLIENTE AVEVAMO FATTO UNA DEMO IN CMS E SEMBRAVA CONVINTO...ASPETTAVA I FINANZIAMENTI PER ACQUISTARE CHE PERO\' NON HA POI PRESO',2);
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `store_item`
--

LOCK TABLES `store_item` WRITE;
/*!40000 ALTER TABLE `store_item` DISABLE KEYS */;
INSERT INTO `store_item` (`id`, `code`, `description`, `supplier_code`, `manufacturer_code`, `amount`, `min_amount`, `comment`) VALUES (1,'EA0001DI','DISCHI in resina 300x6,0xh10 grana D151 rif. prove antiscivolo Ð”Ð¸ÑÐºÐ¸ Ð½Ð° Ð¿Ð»Ð°ÑÑ‚Ð¸ÐºÐ¾Ð²Ð¾Ð¹ ÑÐ²ÑÐ·ÐºÐµ 300x6,0xh10 Ð·ÐµÑ€Ð½Ð¾ D151 Ð´Ð»Ñ Ñ‚ÐµÑÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ñ Ð¿Ð¾ Ð¿Ñ€Ð¾Ñ‚Ð¸Ð²Ð¾ÑÐºÐ¾Ð»ÑŒÐ·ÑÑ‰Ð¸Ð¼ Ð½Ð°ÑÐµÑ‡ÐºÐ°Ð¼','3DISF300DX24809 ','3DISF300DX24809 ',180,140,'');
/*!40000 ALTER TABLE `store_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `login`, `pass`, `super`) VALUES (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',0),(4,'Vasin','bb0e51f2417709e9afddd40e9e1872f9b6275bf8',0),(5,'melloni','4543744cb94daff7b0ea0772f0e4c587b627f3bd',0),(6,'Naumova','99b9762eb5f5df065826a41151245e1208514cf0',0),(7,'Buzmakova','72d3a91ebf44f17997db2397b50f196b0e31c6e8',0),(8,'Bulygina','4a39803d442b5eda8be3669ecc82795e01dddfca',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-05-05 10:14:48
