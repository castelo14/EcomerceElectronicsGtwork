-- MariaDB dump 10.19  Distrib 10.5.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ecomerce
-- ------------------------------------------------------
-- Server version	10.5.15-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT 'Gtwork Electronics',
  `descricao` varchar(300) DEFAULT 'Computation and electronics of Gtwork',
  `imgBanner` varchar(100) DEFAULT NULL,
  `estado` enum('activado','desativado') DEFAULT 'desativado',
  `alterar` enum('First slide','Second slide','Third slide') DEFAULT 'Third slide',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (6,'Gtwork Electronics','Gtwork ElectronicsGtwork ElectronicsGtwork Electronics','63cf8fed2693bb.jpg','activado','First slide'),(7,'Gtwork Electronics','Computation and electronics of Gtwork','63ca7ae050413b.jpg','activado','Second slide'),(9,'Gtwork Electronics','Computation and electronics of Gtwork','63cc0e72989f6b.png','activado','Third slide'),(11,'Electronics gtwork Moisana','Electronics gtwork Moisana, com VOIP ASTERISK e LINUX com samba','63cc3ef52edeeb.jpg','activado','Third slide');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (6,'telefone'),(7,'tv-plasma'),(8,'computador');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `Pnome` varchar(80) DEFAULT NULL,
  `Unome` varchar(30) NOT NULL,
  `pais` varchar(50) DEFAULT 'Angola',
  `Nempresa` varchar(70) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `condado` varchar(80) NOT NULL,
  `cep` varchar(89) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefone` varchar(80) NOT NULL,
  `produtos` varchar(600) DEFAULT NULL,
  `preco` varchar(300) DEFAULT NULL,
  `qtd` varchar(200) DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `id` (`id`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,3,'Abraao','Castelo','AO','Gtwork','Vuana/estalagem','Luanda','Angola','6684556','abraaocastelo14@gmail.com','944029977',',Tv plasma LG','140000',',10',140000),(2,3,'Moisana','Castelo','AO','Gtwork','Vuana/estalagem','','','','','',',Tv plasma LG','140000',',10',140000),(3,3,'Paula','Castelo','AO','Primogenito','Km 14A','Luanda','Angola','3456765','abraaocastelo14@gmail.com','932292101',',TECNO SPARK 3','65000',',15',65000),(4,30,'Florencia','guda','AO','Makeup','viana','LUANDA','ANGOLA','4324243','florencia@gmail.com','',',gel','2500',',3',2500),(5,30,'Florencia','guda','DZ','gtwork','Viana','luanda','','2232132','root','0922340091',',serum','8000',',3',8000),(6,3,'','','AO','','','','','','root','','','','',0),(7,3,'gel','sdf','AO','makeup','viana','luanda','ANGOLA','','root','930326154','','','',0),(8,3,'Florencia','guda','AO','Makeup','viana','LUANDA','ANGOLA','','root','','','','',0),(9,3,'Florencia','jota','AO','Makeup','viana','LUANDA','ANGOLA','','florencia@gmail.com','930326154','','','',0),(10,32,'Moisana','Castelo','AO','Gtwork','Km 14A','Luanda','Angola','3456765','abraaocastelo14@gmail.com','944029977',',Comando sem fio xbox 360,Tv plasma LG',',20000,270000',',7,3',6450000),(11,32,'Francisco','Castelo','AO','Primogenito','Km 14A','Luanda','Angola','6684557','casteloabraao@gmail.com','934455433',',Tv plasma LG',',270000',',4',6210000),(12,32,'Joaquim','Madeira','AO','Gtwork','Capalanga','Luanda','Angola','6684557','cu@gmail.com','93399201',',Cabo vga',',1000',',1',110000),(13,32,'Fernando','Ferreira','AO','Gtwork','Cazenga','Luanda','Angola','6684556','casteloabraao@gmail.com','922113098',',Cabo vga',',1000',',1',109000),(14,32,'Ezequiel','Caetano','AO','Gtwork','Calemba2','Luanda','Angola','6684557','moisana@gmail.com','928878222',',Cabo vga,Computador pichau gamer i3',',1000,987000',',1,1',5043000),(15,32,'Ezequiel','Caetano','AO','Primogenito','Capalanga','Luanda','Angola','6684557','casteloabraao@gmail.com','93399201',',Cabo vga,comando Thrustmaster',',1000,16000',',1,1',347000);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalhesproduct`
--

DROP TABLE IF EXISTS `detalhesproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalhesproduct` (
  `idPedido` int(11) DEFAULT NULL,
  `produto` varchar(600) DEFAULT NULL,
  `preco` varchar(300) DEFAULT NULL,
  `qtd` varchar(200) DEFAULT NULL,
  KEY `idPedido` (`idPedido`),
  CONSTRAINT `detalhesProduct_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalhesproduct`
--

LOCK TABLES `detalhesproduct` WRITE;
/*!40000 ALTER TABLE `detalhesproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalhesproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `data_necessaria` datetime DEFAULT NULL,
  `data_envio` date DEFAULT NULL,
  `via_maritima` enum('sim','nao') DEFAULT 'nao',
  `frete` enum('sim','nao') DEFAULT 'nao',
  `nome_navio` enum('sim','nao') DEFAULT 'nao',
  `endereco_navio` enum('sim','nao') DEFAULT 'nao',
  `modo_entrega` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idCliente` (`idCliente`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,1,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(3,2,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(4,3,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(8,4,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(13,5,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(17,6,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(24,7,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(32,8,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(41,9,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(51,10,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(62,11,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(74,12,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(87,13,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(101,14,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL),(116,15,NULL,NULL,NULL,NULL,'nao','nao','nao','nao',NULL);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) DEFAULT NULL,
  `precoUnitario` float DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `estado` varchar(90) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `supplid` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `descricao` varchar(289) DEFAULT NULL,
  `imagem` varchar(90) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `total` float DEFAULT NULL,
  `visivel` enum('sim','nao') DEFAULT 'sim',
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (24,'PC GAMER - INTEL I7',870000,332,'nao',1,4560,8,'PC GAMER - INTEL I7','63aca53d23fb1','2022-12-28 21:21:17',288840000,'sim'),(25,'Computador pichau gamer i3',987000,4,'stock',1,665,8,'Computador pichau gamer i3','63afbb3ce7066','2022-12-31 05:31:56',3948000,'sim'),(26,'Comando sem fio xbox 360',20000,12,'stock',1,332,8,'Comando sem fio xbox 360','63afbbb120cb2','2022-12-31 05:33:53',240000,'sim'),(27,'comando Thrustmaster',16000,14,'stock',1,776,8,'comando Thrustmaster','63afbbf054f5e','2022-12-31 05:34:56',224000,'sim'),(28,'Tv plasma LG',270000,17,'stock',1,880,7,'Tv plasma LG','63afbc4e33afa','2022-12-31 05:36:30',4590000,'sim'),(29,'Cabo vga',1000,106,'stock',1,223,8,'Tv plasma LG','63afbc952aa50','2022-12-31 05:37:41',106000,'sim'),(30,'Teclado Mecânico Gamer6',10000,8,'stock',1,99817,8,'Teclado Mecânico Gamer6','63bd2cd37822d','2023-01-10 10:16:03',80000,'sim'),(31,'Roteador AC4 TENDA',53000,10,'nao',1,6601,8,'Roteador AC4 TENDA','63bd2e62cd1a6','2023-01-10 10:22:42',530000,'sim'),(32,'Auricular OEC',12000,5,'stock',1,447,6,'Auricular OEC','63bd2ec2bbe15','2023-01-10 10:24:18',60000,'sim');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `permissao` enum('admin','cliente','gerente') DEFAULT 'cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'Ezequiel Chiemba','ezequiel@gmail.com','142000','cliente'),(30,'Florencia Fernanda','florencia@gmail.com','123456','admin'),(31,'Mach','mateuschiemba@hotmail.com','123456','cliente'),(32,'Abraao Castelo','abraaocastelo14@gmail.com','142000','admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-24 13:50:36
