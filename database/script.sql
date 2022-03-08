CREATE DATABASE  IF NOT EXISTS `library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `library`;
-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `complement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_state_id_foreign` (`state_id`),
  CONSTRAINT `addresses_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'Rua Projetada 8 - RB',418,'Casa','Residencial Bonanza','79.816-216','Dourados',12,NULL,NULL),(2,'Rua São José',281,'','Parque das Mangueiras','65.914-240','Imperatriz',10,NULL,NULL),(3,'Rua Santa Lúcia',107,'','Arlindo Villaschi','29.136-215','Viana',8,NULL,NULL),(4,'Travessa Arlindo Haas',299,'Apartamento 101','Centro','99.010-610','Passo Fundo',23,NULL,NULL),(5,'Quadra Dois',290,'','Cidade Industrial','64.012-271','Teresina',17,NULL,NULL),(6,'Rua Nossa Senhora do Socorro',425,'','São José','49.015-300','Aracaju',25,NULL,NULL),(7,'Rua 7 de Dezembro',494,'Casa','Placas','69.902-756','Rio Branco',1,NULL,NULL),(8,'Rua Gonçalves Dias',161,'','Centro','76.801-076','Porto Velho',21,NULL,NULL),(9,'Rua Recreio',892,'','Parque de Palmeiras','69.919-069','Rio Branco',1,NULL,NULL),(10,'Rua Antônio Mota da Silva',572,'','Santa Delmira','59.615-250','Mossoró',20,NULL,NULL),(11,'Rua Rádio Câmara',546,'Apartamento 802','Nova Tiúma','54.727-170','São Lourenço da Mata',16,NULL,NULL),(12,'Passagem Independência',260,'','Jardim Marco Zero','68.903-395','Macapá',4,NULL,NULL),(13,'Rua Girassol',966,'','Loteamento Joafra','69.919-406','Rio Branco',1,NULL,NULL),(14,'Rua Dourado',447,'Casa','Santa Tereza','93.14-134','Boa Vista',22,NULL,NULL),(15,'Rua Raimundo Pires',153,'','Monte Castelo','69.557-110','Tefé',3,NULL,NULL);
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishing_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  `publisher_number` int NOT NULL,
  `available_quantity` int NOT NULL,
  `borrowed_amounts` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `books_isbn_unique` (`isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'978-8532529787','Mulheres que correm com os lobos','Clarissa Pinkola Estés','Rocco','São Paulo','2018-09-17',1,200,0,NULL,NULL),(2,'978-8555340895','Conectadas','Clara Alves','Seguinte','São Paulo','2019-07-31',1,5,0,NULL,NULL),(3,'978-8543104331','A coragem de ser imperfeito','Brené Brown','Editora Sextante','Texas','2016-09-19',1,120,0,NULL,NULL),(4,'978-8543105291','As coisas que você só vê quando desacelera: Como manter a calma em um mundo frenético','Haemin Sunim','Editora Sextante','Daejeon, Coreia do Sul','2017-10-02',1,200,1,NULL,'2022-03-08 20:17:08'),(5,'978-6555603422','O Livro Do Conforto','Matt Haig','Intrínseca','Matt Haig','2021-11-22',1,117,1,NULL,'2022-03-08 03:16:33'),(6,'978-8555390371','Os Humanos: Os Humanos','Matt Haig','Jangada','Sheffield, Reino Unido','2016-02-22',1,500,0,NULL,NULL),(7,'978-6558380542','A Biblioteca da Meia-Noite','Matt Haig','Bertrand Brasil','Sheffield, Reino Unido','2021-09-27',1,20,0,NULL,NULL),(8,'978-8584392162','Malibu renasce','Taylor Jenkins Reid','Paralela','Costa Leste de Maryland','2021-06-14',1,119,1,NULL,'2022-03-08 20:17:00'),(9,'978-8535932560','Pessoas normais','Sally Rooney','Companhia das Letras','Castlebar, Irlanda','2019-09-30',1,140,0,NULL,NULL),(10,'978-8595081536','O homem mais rico da Babilônia','George S Clason','HarperCollins','Missouri, EUA','2017-08-04',1,220,0,NULL,NULL),(11,'978-8565765350','Aristóteles e Dante descobrem os segredos do Universo: 1','Benjamin Alire Sáenz','Seguinte','Castlebar, Irlanda','2014-04-25',1,18,0,NULL,NULL),(12,'978-8539004119','O poder do hábito','Charles Duhigg','Objetiva','Novo México EUA','2012-09-24',1,100,0,NULL,NULL),(13,'978-8543108681','Como convencer alguém em 90 segundos: Crie uma primeira impressão vendedora','Nicholas Boothman','Universo dos Livros','Inglaterra','2012-01-12',1,100,0,NULL,NULL),(14,'978-8579303197','Como fazer amigos e influenciar pessoas','Dale Carnegie','Editora Sextante','Nova Iorque','2019-10-08',1,50,0,NULL,NULL),(15,'978-8575428092','As armas da persuasão','Robert Cialdini','Editora Sextante','Wisconsin, EUA','2012-07-31',1,200,0,NULL,NULL),(16,'978-8582892107','Gatilhos Mentais: O Guia Completo com Estratégias de Negócios e Comunicações Provadas Para Você Aplicar','Gustavo Ferreira','DVS EDITORA','São Paulo','2019-03-22',1,40,0,NULL,NULL),(17,'978-8547000240','Mindset: A nova psicologia do sucesso','Carol S. Dweck','Objetiva','Nova Iorque','2017-01-24',1,190,0,NULL,NULL),(18,'978-8564574168','Fundamentos da Programação de Computadores: Algoritmos, Pascal, C, C++ e Java','Ana Fernanda Gomes Ascencio','Pearson Universidades','São Paulo','2012-03-19',3,120,0,NULL,NULL),(19,'978-8536531458','Algoritmos: Lógica Para Desenvolvimento de Programação de Computadores','José Augusto N. G. Manzano','Editora Érica','São Paulo','2019-02-27',29,200,0,NULL,NULL),(20,'978-8575227183','Introdução à Programação com Python: Algoritmos e Lógica de Programação Para Iniciantes','Nilo Ney Coutinho Menezes','Novatec Editora','Bélgica','2019-01-08',3,40,0,NULL,NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address_id` bigint unsigned NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `books` int NOT NULL DEFAULT '0',
  `traffic_ticket` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_cpf_unique` (`cpf`),
  UNIQUE KEY `clients_rg_unique` (`rg`),
  UNIQUE KEY `clients_email_unique` (`email`),
  UNIQUE KEY `clients_telephone_unique` (`telephone`),
  KEY `clients_address_id_foreign` (`address_id`),
  CONSTRAINT `clients_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'215.505.517-01','24.023.498','Marcos Vinicius Luiz Galvão','1946-01-24',1,'marcosviniciusgalvao@alcoa.com.br','(67)98875-4367',' ',' ',0,0.00,NULL,NULL),(2,'101.514.443-82','23.001.997','Renata Luana Nogueira','1976-02-12',2,'renataluananogueira@accardoso.com.br','(98)99320-4881','Aluno','DCBL',-1,54.00,NULL,'2022-03-08 20:17:00'),(3,'683.523.977-88','12.977.562','Enzo Ian Viana','1988-02-13',3,'enzo_ian_viana@indaseg.com.br','(27)99852-2962','Aluno','DCEX',0,0.00,NULL,NULL),(4,'484.630.062-56','36.684.935','Gabrielly Sara Simone Silveira','1960-02-21',4,'gabrielly-silveira81@4now.com.br','(54)99792-7075','Professor','DCBL',0,0.00,NULL,NULL),(5,'689.942.667-63','13.521.705','Rafael Luan Lopes','1989-03-02',5,'rafael_lopes@ggm.com.br','(86)98152-0743','Aluno','DCEX',0,0.00,NULL,NULL),(6,'109.186.340-75','24.155.126','Stella Camila Sueli das Neves','1949-03-06',6,'stella-dasneves90@ohms.com.br','(79)98126-3589','Funcionário','Não se aplica',0,0.00,NULL,NULL),(7,'427.495.197-99','12.357.689','Eloá Alícia Simone Porto','1984-03-06',7,'eloa_porto@mectron.com.br','(68)98626-1275','Professor','DCNN',0,0.00,NULL,NULL),(8,'908.924.801-30','17.132.629','Jéssica Priscila Brito','2000-02-07',8,'jessica_brito@dbacomp.com.br','(69)99450-0859','Aluno','DCHM',-1,10.00,NULL,'2022-03-08 20:17:08'),(9,'618.556.418-10','41.724.899','Tiago Miguel Victor Freitas','1989-03-03',9,'tiagomiguelfreitas@caocarinho.com.br','(68)99522-3382','Funcionário','Não se aplica',0,0.00,NULL,NULL),(10,'264.981.164-12','34.349.660','Ian Marcelo Benedito Almeida','1971-03-04',10,'ian_almeida@vgl.com.br','(84)99373-3596','Professor','DCNN',1,0.00,NULL,'2022-03-08 03:16:33'),(11,'990.228.762-09','99.228.762','Jorge Mário Gustavo Gomes','1968-02-19',11,'jorgemariogomes@avantii.com.br','(81)99172-7914','Aluno','DCBL',0,0.00,NULL,NULL),(12,'505.324.935-08','10.481.430','Antonella Mirella Silvana Bernardes','1960-03-07',12,'antonella-bernardes96@htmail.com','(96)98983-7709','Comunidade','Não se aplica',0,0.00,NULL,NULL),(13,'763.311.208-58','50.136.830','Lucca Otávio Márcio Jesus','1951-02-22',13,'luccaotaviojesus@mnproducoes.com','(68)99981-8704','Funcionário',' ',0,0.00,NULL,NULL),(14,'505.964.446-48','50.964.446','Josefa Raquel Vitória Assunção','1987-02-12',14,'josefaraquelassuncao@agenciadbd.com','(95)98561-0493','Professor','DCEX',0,0.00,NULL,NULL),(15,'607.076.033-66','60.076.033','Bernardo Breno Vieira','1975-03-01',15,'bernardobrenovieira@itau-unibanco.com.br','(97)98165-5552','Aluno','DCTL',0,0.00,NULL,NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `books_id` bigint unsigned NOT NULL,
  `loan_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `traffic_ticket` decimal(8,2) DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `attendent_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loans_books_id_foreign` (`books_id`),
  KEY `loans_client_id_foreign` (`client_id`),
  KEY `loans_attendent_id_foreign` (`attendent_id`),
  CONSTRAINT `loans_attendent_id_foreign` FOREIGN KEY (`attendent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `loans_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `loans_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
INSERT INTO `loans` VALUES (1,5,'2022-03-08','2022-03-14',NULL,NULL,NULL,10,1,'2022-03-08 03:16:33','2022-03-08 03:16:33'),(2,8,'2022-02-01','2022-02-09','2022-03-08',54.00,0,2,2,NULL,'2022-03-08 20:17:00'),(3,2,'2022-03-01','2022-03-08',NULL,NULL,NULL,10,1,NULL,NULL),(4,4,'2022-03-06','2022-03-13',NULL,NULL,NULL,5,1,NULL,NULL),(5,17,'2022-02-01','2022-02-09',NULL,NULL,NULL,9,2,NULL,NULL),(6,4,'2022-02-24','2022-03-03','2022-03-08',10.00,0,8,1,NULL,'2022-03-08 20:17:08'),(7,8,'2022-03-07','2022-03-14',NULL,NULL,NULL,4,2,NULL,NULL),(8,6,'2022-03-03','2022-03-10',NULL,NULL,NULL,5,1,NULL,NULL),(9,14,'2022-03-02','2022-03-09',NULL,NULL,NULL,5,1,NULL,NULL),(10,2,'2022-03-05','2022-03-12',NULL,NULL,NULL,5,1,NULL,NULL);
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_02_01_130747_create_states_table',1),(6,'2022_02_01_133939_create_addresses_table',1),(7,'2022_02_01_160120_create_clients_table',1),(8,'2022_02_01_161506_create_books_table',1),(9,'2022_02_01_163140_create_loans_table',1),(10,'2022_02_16_232528_create_permissions_table',1),(11,'2022_02_16_233117_create_user__permissions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'administrador','Administrador do sistema','2022-03-07 19:35:10','2022-03-07 19:35:10'),(2,'operador','Operador do sistema','2022-03-07 19:35:10','2022-03-07 19:35:10');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Acre','AC',NULL,NULL),(2,'Alagoas','AL',NULL,NULL),(3,'Amazonas','AM',NULL,NULL),(4,'Amapá','AP',NULL,NULL),(5,'Bahia','BA',NULL,NULL),(6,'Ceará','CE',NULL,NULL),(7,'Distrito Federal','DF',NULL,NULL),(8,'Espírito Santo','ES',NULL,NULL),(9,'Goiás','GO',NULL,NULL),(10,'Maranhão','MA',NULL,NULL),(11,'Minas Gerais','MG',NULL,NULL),(12,'Mato Grosso do Sul','MS',NULL,NULL),(13,'Mato Grosso','MT',NULL,NULL),(14,'Pará','PA',NULL,NULL),(15,'Paraíba','PB',NULL,NULL),(16,'Pernambuco','PE',NULL,NULL),(17,'Piauí','PI',NULL,NULL),(18,'Paraná','PR',NULL,NULL),(19,'Rio de Janeiro','RJ',NULL,NULL),(20,'Rio Grande do Norte','RN',NULL,NULL),(21,'Rondônia','RO',NULL,NULL),(22,'Roraima','RR',NULL,NULL),(23,'Rio Grande do Sul','RS',NULL,NULL),(24,'Santa Catarina','SC',NULL,NULL),(25,'Sergipe','SE',NULL,NULL),(26,'São Paulo','SP',NULL,NULL),(27,'Tocantins','TO',NULL,NULL);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user__permissions`
--

DROP TABLE IF EXISTS `user__permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user__permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user__permissions_user_id_foreign` (`user_id`),
  KEY `user__permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user__permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user__permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user__permissions`
--

LOCK TABLES `user__permissions` WRITE;
/*!40000 ALTER TABLE `user__permissions` DISABLE KEYS */;
INSERT INTO `user__permissions` VALUES (1,1,1,NULL,NULL),(2,2,2,'2022-03-08 03:17:48','2022-03-08 03:17:48');
/*!40000 ALTER TABLE `user__permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','administrador@sistema.com',NULL,'$2y$10$CvcAMEpowOhRt7b82n3x9.D7YTnZArOmPmz2MFHh6c5GMOW6RkO8O','3b58289f53d47a20b6917c729a0a63eb.jpg','LjBYmrLS6EPqrjfK90RgVDQ4m67RGJyq4c8QUq8vXbv3G0ckYS4zdyVLDpni','2022-03-07 22:31:23','2022-03-08 03:18:25'),(2,'Operador 1','operador1@biblioteca.com.br',NULL,'$2y$10$4Uxa1It1P4xtEIBvtlrXZOJwS0C3MwivQZqQipMtH39SAUCiwLhYC',NULL,NULL,'2022-03-08 03:17:48','2022-03-08 20:13:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-08 14:29:11
