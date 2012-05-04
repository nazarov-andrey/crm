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
INSERT INTO `contact` (`id`, `person`, `type`, `value`) VALUES (1,1,3,'a.uezdin@cersanit.ru'),(2,1,2,'+79169002514'),(3,1,2,'+7 495 7470114'),(4,1,1,'alex.uezdin'),(5,5,1,'+7.812.3268534 , E-mail: belkovets@mail.ru'),(6,6,2,'+7.921.8782478'),(7,6,3,'dashkovl@mail.ru , vtd_razvitie@vozr.ru'),(8,7,2,'+7(812) 3268880'),(9,7,2,'+7(963) 3129079'),(10,7,3,'rvpasko@gmail.com'),(11,7,1,'rpasko'),(12,8,2,'+7. 928. 2249768'),(13,8,3,'biruza@dinet.ru '),(14,9,3,'moderneco@gmail.com '),(15,9,2,'+7.928.5238987'),(16,10,2,'+7 (495) 2218038'),(17,10,3,' info@ligron.ru'),(18,11,3,'infoligron@gmail.ru'),(19,12,2,'+998 71 2544083'),(20,12,3,'beck_5973@bk.ru'),(21,13,2,'+99-872-365-63-52 '),(22,14,2,'79029829389'),(23,14,3,'marmimarco@mail.ru'),(24,15,3,'E-mail: russart@bk.ru'),(25,16,2,'0074957399123'),(26,17,2,'+7. 8443 392692'),(27,17,3,' stbmramor@mail.ru'),(28,18,2,'+7(495)5448541'),(29,18,3,'info@mpamop.ru');
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
INSERT INTO `organization` (`id`, `type`, `name`, `phone`, `site`, `address`, `country`, `legal_entity`) VALUES (1,2,'CERSANIT-FRIANOVO FACTORY','+7 495 747 01 14','www.cersanit.ru','via Molodejnaia, 15, pos. Fryanovo, Scelkovskiy raion, oblast di Mosca','Russia',1),(2,2,'CERSANIT-KUCINO FACTORY','+7 495 9749763	','www.cersanit.ru','Kucino','Russia',1),(26,2,'UTT','','','Tatarstan, g. Nabereznie Chelni','Russia',2),(27,2,'Barlet ','+7 383 217 4700','http://barlet.ru/kontakt.php?go=7&level=1','Pashkalov Andrey, general director, Novosibirsk, 630099,via Semi  Shamshinykh 24,  ','Russia',2),(28,2,'Colizei Vechi ','Josan Liudmila, (3732) 27-05-82, 910 2092 mob. +373.69.102092    ','','Kishinev, via Tighina, 42,','Moldova',2),(29,2,'Santemax','Mirsoev Khagani tel : 8 495 779 10 23 , 8 985 765 35 55 ','http://www.santemax.ru/','17218, Mosca Nakhimovsky prospect  28','Russia ',2),(30,2,'Technoservice Build ','Stanetsky Gennady, +38 044 278 082 10, +38 044 272 14 23','http://www.stonegallery.com.ua/contents/o-nas','Kiev, via Trohsvyatitelskaya 11, office 5, email : ukrnerudprom@ukr.net','Ucraina ',2),(31,2,'Artishok ','Alexandra Bykovskaya ( purchasing department), email : bykovskaya@artishock.ru, tel : 8 495 739 3880, 8 916 318 68 11','http://artishock.ru/index.php?option=com_contact&Itemid=3','','Russia ',2),(32,2,'GRAN KERMAIKA','','','Cheboksary','Russia',1),(33,2,'GRAND KERAMIKA','','','Cheboksary','',1),(34,1,'Ferrari & Cigarini','','','','Italy',1),(35,2,'POLIGRESS OOO','','','','RUSSIA',1),(36,2,'SOKOL OAO','','','','RUSSIA',1),(37,2,'\"AAB PROJECT\" LLC','+37410259359','','','Armenia ',2),(38,2,'VOZROZHDENIE','+7 (812) 3268534','http://www.vozr.com','4a Michaylovskiy str.,198092Â  St.Petersburg','Russia ',2),(39,2,'BIRYUZA ','+7. 8722. 603917 ',' www.biryuza-mramor.ru ','10a Pugachiov Street Makhachkala city, Republic of Daghestan','Russia',2),(40,2,'MODERN',' +7.8722.676569','www.modern05.ru','Makhachkala, Batiraya str.167, 367000','Russia',2),(41,2,'LIGRON','+7 (495) 2218038','www.ligron.ru','125195, Moscow, 59, Leningradskoe chaussee, MRP, 4th floor','Russia',2),(42,2,'ÐžÐžÐž \"NE\'MAT B\"','+998 97 4570259','','ul. Ðžybek 38, Ð¢Ð°shkent - Rep.Uzbekistan','Uzbekistan',2),(43,2,'ÐžÐžÐž \"POYTAXT BAHOLASH MASLAXATI\"',' 8-371-233-98-39','','Taskent','Uzbekistan',2),(44,2,'MRAMORNY VEK','79029829389','','Krasnoyarsk ','Russia',2),(45,2,'GARDENBERG','+7 (812) 3264558','www.gardenberg.ru','ul. Voroshilova 2, office 812,193318 Sant Petersburg','Russia',2),(46,2,'LGE','0074957415157','','Armenia','Armenia',2),(47,2,'STB OOO','+7. 8443.315773','','Lenina pr-t 50,404110 Volzhskiy','Russia',2),(48,2,'NATURAL STONES','+7(495)7867357','www.mpamop.ru','Moscow','Russia ',2);
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
INSERT INTO `person` (`id`, `organization`, `name`, `position`, `comment`, `legal_entity`) VALUES (1,1,'Uezdin Alexey','Purchase Manager','',1),(2,33,'Sergey','Director','',1),(3,36,'Sokol Alexey','DIRECTOR','',1),(4,27,'Pashkalov Andrey','General Director ','',2),(5,38,'Sergey Belkoviez','General director ','',2),(6,38,'Leonid Dashkov','direttore tecnico ','',2),(7,38,'Roman Pasko','manager','parla inglese ',2),(8,39,'Hadjimurad Gadjievich AKAEV','Deputy Director ','',2),(9,40,'Rustam Gadzhikerimov','manager','',2),(10,41,'Valeri Vorotyntsev','Company Owner ','',2),(11,41,'Elena Maiarova','Office Manager ','',2),(12,42,'Farhad Zakirov','manager','',2),(13,43,'Sergey Evgenievic','Director ','',2),(14,44,'Dmitry Kiselyov',' director of manufacturing ','',2),(15,45,'GARDENBERG','Managers','',2),(16,46,'Serobyan Norair Oganesovich','Director','',2),(17,47,'Svetlana','manager','',2),(18,48,'Eskhil Nikiforov','manager','',2);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id`, `contact`, `date`, `comment`, `legal_entity`) VALUES (1,5,'2011-10-06',' CMS : aveva firmato con noi nel 2010 un contratto in fiera a Verona per una cnc 5 assi; poi perÃ² nel 2011 ha acquistato da Breton ( sono giÃ  clienti Bidese e probabilmente questa fusione li ha spinti a cambiare idea ). Sotto trovate vari contatti; io parlavo sempre con Roman Pasko che Ã¨ l\'unico che parlicchia anche inglese (anche se non molto).....so che volevano comprare anche un tornio probabilmente ( che gli abbiamo offerto ) e forse una waterjet.',2),(2,12,'2011-09-23','CMS: abbiamo incontrato il 23.09.11 presso la fiera di Verona questo nostro cliente russo con cui siamo da tempo in contatto per varie tecnologie.Il cliente ha una sua cava di pietra calcarea ed una fabbrica nella Repubblica del Daghestan (parte meridionale della Federazione Russa), con vecchie linee di lavorazione di produttori misti (vecchia linea modulmarmo della CAMMA di Mario Spadone anno 1996-1997, vecchia fresa sempre della CAMMA, macchine piÃ¹ recenti Bombieri ',2),(3,19,'2011-09-05','Ci hanno chiesto oggi una nostra offerta per una fresa a CN contornatrice con elettromandrino come la \"Contoursaw FR/NC\" della BRETON ',2),(4,21,'2011-09-05','Il cliente ha giÃ Â  una proposta per una OMAG \"Mill 98\" e, per essere competitivi con il prezzo, possiamo proporgli una CONCEPT 283 nella stessa configurazione della macchina giÃ  recentemente proposta alla STB OOO (Russia)',2),(5,22,'2011-09-05','interessato di equipment Maxima 5X CNC ',2),(6,24,'2011-08-31','haÂ chiesto se abbiamo disponibile un impianto water-jet usato e se possiamo anche proporre una macchina per \"engravings\", non crediamo un centro a CN completo, ma una piccola macchina a 3 assi per scrivere e fare piccoli bassorilievi.',2),(7,25,'2011-08-21','Aveva chiesto info per Maxima',2),(8,28,'2011-09-23','Ci sembra di aver capito che al cliente, forse anche per una questione di prezzo di investimento, potrebbe andare bene una macchina piÃ¹ semplice ed economica rispetto alla UNYKA, come una fresa con motore tradizionale che gli possa anche fare delle lavorazioni a CN con l\'albero in verticale e cambiando \"qualche\" utensile (vedi quali e quali lavorazioni possibili...) con un attacco conico ISO. Mi ha detto di avere giÃ  una fresa a CN, ma con banco rotante e piuttosto lenta (+ con problemi di software..) con la quale lui ha giÃ  fatto lavorazioni di engravings ed altre con utensili a CN applicati.',2);
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

-- Dump completed on 2012-05-04 14:02:37
