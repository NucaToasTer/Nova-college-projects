-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.25-0ubuntu0.20.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for keukenprins
CREATE DATABASE IF NOT EXISTS `keukenprins` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `keukenprins`;

-- Dumping structure for table keukenprins.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `blog_id` int NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blog_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blog_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blog_author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table keukenprins.blogs: ~0 rows (approximately)

-- Dumping structure for table keukenprins.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `car_id` int NOT NULL AUTO_INCREMENT,
  `car_brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `car_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `car_color` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`car_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table keukenprins.cars: ~50 rows (approximately)
INSERT INTO `cars` (`car_id`, `car_brand`, `car_type`, `car_color`) VALUES
	(1, 'Volkswagen', 'Golf', 'Blauw'),
	(2, 'Toyota', 'Corolla', 'Zilver'),
	(3, 'Ford', 'Focus', 'Rood'),
	(4, 'BMW', '3 Serie', 'Zwart'),
	(5, 'Mercedes-Benz', 'C-Klasse', 'Wit'),
	(6, 'Audi', 'A3', 'Grijs'),
	(7, 'Hyundai', 'i30', 'Geel'),
	(8, 'Renault', 'Megane', 'Groen'),
	(9, 'Nissan', 'Qashqai', 'Oranje'),
	(10, 'Chevrolet', 'Cruze', 'Paars'),
	(11, 'Volvo', 'V40', 'Bruin'),
	(12, 'Mazda', '3', 'Roze'),
	(13, 'Kia', 'Ceed', 'Turquoise'),
	(14, 'Peugeot', '308', 'Zalm'),
	(15, 'Citroen', 'C4', 'Lime'),
	(16, 'Opel', 'Astra', 'Goud'),
	(17, 'Subaru', 'Impreza', 'Zwart'),
	(18, 'Fiat', 'Tipo', 'Blauw'),
	(19, 'Skoda', 'Octavia', 'Rood'),
	(20, 'Dodge', 'Dart', 'Zilver'),
	(21, 'Tesla', 'Model 3', 'Groen'),
	(22, 'Jaguar', 'XE', 'Oranje'),
	(23, 'Lexus', 'IS', 'Paars'),
	(24, 'Infiniti', 'Q50', 'Bruin'),
	(25, 'Mitsubishi', 'Lancer', 'Roze'),
	(26, 'Suzuki', 'SX4', 'Turquoise'),
	(27, 'Alfa Romeo', 'Giulietta', 'Zalm'),
	(28, 'Chrysler', '200', 'Lime'),
	(29, 'Acura', 'ILX', 'Goud'),
	(30, 'Buick', 'Verano', 'Blauw'),
	(31, 'Cadillac', 'ATS', 'Rood'),
	(32, 'Daihatsu', 'Charade', 'Zwart'),
	(33, 'Ferrari', '488', 'Grijs'),
	(34, 'Honda', 'Civic', 'Geel'),
	(35, 'Isuzu', 'Gemini', 'Oranje'),
	(36, 'Jeep', 'Cherokee', 'Paars'),
	(37, 'Land Rover', 'Discovery', 'Bruin'),
	(38, 'Maserati', 'Ghibli', 'Roze'),
	(39, 'Mini', 'Cooper', 'Turquoise'),
	(40, 'Porsche', '911', 'Zalm'),
	(41, 'Seat', 'Leon', 'Lime'),
	(42, 'Smart', 'Fortwo', 'Goud'),
	(43, 'Tata', 'Nano', 'Blauw'),
	(44, 'Vauxhall', 'Corsa', 'Rood'),
	(45, 'Wuling', 'Sunshine', 'Zwart'),
	(46, 'Yugo', 'Skala', 'Grijs'),
	(47, 'Zastava', 'Yugo', 'Geel'),
	(48, 'Lada', 'Priora', 'Oranje'),
	(49, 'Geely', 'Emgrand', 'Groen'),
	(50, 'Proton', 'Persona', 'Oranje');

-- Dumping structure for table keukenprins.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city_population` int DEFAULT NULL,
  `city_province` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city_mayor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city_foundation_date` date DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table keukenprins.cities: ~69 rows (approximately)
INSERT INTO `cities` (`city_id`, `city_name`, `city_population`, `city_province`, `city_mayor`, `city_foundation_date`) VALUES
	(1, 'Amsterdam', 821752, 'Noord-Holland', 'Femke Halsema', '1300-01-01'),
	(2, 'Rotterdam', 650942, 'Zuid-Holland', 'Aboutaleb Ahmed', '1340-01-01'),
	(3, 'Utrecht', 357179, 'Utrecht', 'Sharon Dijksma', '1122-01-01'),
	(4, 'Eindhoven', 234235, 'Noord-Brabant', 'John Jorritsma', '1232-01-01'),
	(5, 'Arnhem', 162525, 'Gelderland', 'Ahmed Marcouch', '1233-01-01'),
	(6, 'Maastricht', 122378, 'Limburg', 'Annemarie Penn-te Strake', '1202-01-01'),
	(7, 'Goes', 37765, 'Zeeland', 'Margo Mulder', '1234-01-01'),
	(8, 'Almere', 214405, 'Flevoland', 'Franc Weerwind', '1976-01-01'),
	(9, 'Zwolle', 127497, 'Overijssel', 'Peter Snijders', '1201-01-01'),
	(10, 'Groningen', 232277, 'Groningen', 'Koen Schuiling', '0100-01-01'),
	(11, 'The Hague', 548854, 'Zuid-Holland', 'Jan van Zanen', '1345-01-01'),
	(12, 'Nijmegen', 177670, 'Gelderland', 'Hubert Bruls', '1347-01-01'),
	(13, 'Breda', 183873, 'Noord-Brabant', 'Paul Depla', '1212-01-01'),
	(14, 'Haarlem', 161265, 'Noord-Holland', 'Jos Wienen', '1245-01-01'),
	(15, 'Leiden', 124014, 'Zuid-Holland', 'Henri Lenferink', '1250-01-01'),
	(16, 'Enschede', 160552, 'Overijssel', 'Onno van Veldhuizen', '1305-01-01'),
	(17, 'Middelburg', 40106, 'Zeeland', 'Harald Bergmann', '1100-01-01'),
	(18, 'Leeuwarden', 124210, 'Friesland', 'Sybrand Buma', '1402-01-01'),
	(19, 'Amersfoort', 156286, 'Utrecht', 'Lucas Bolsius', '1200-01-01'),
	(20, 'Bergen op Zoom', 67285, 'Noord-Brabant', 'Frank Petter', '1292-01-01'),
	(21, 'Tilburg', 217259, 'Noord-Brabant', 'Theo Weterings', '1211-01-01'),
	(22, 'Zaanstad', 155382, 'Noord-Holland', 'Jan Hamming', '1280-01-01'),
	(23, 'Deventer', 100113, 'Overijssel', 'Ron König', '1195-01-01'),
	(24, 'Alkmaar', 108363, 'Noord-Holland', 'Emile Roemer', '1023-01-01'),
	(25, 'Helmond', 91584, 'Noord-Brabant', 'Elly Blanksma', '1247-01-01'),
	(26, 'Delft', 103163, 'Zuid-Holland', 'Marja van Bijsterveldt', '1140-01-01'),
	(27, 'Vlissingen', 44823, 'Zeeland', 'Bas van den Tillaar', '1189-01-01'),
	(28, 'Heerlen', 87473, 'Limburg', 'Roel Wever', '1252-01-01'),
	(29, 'Hoorn', 73262, 'Noord-Holland', 'Jan Nieuwenburg', '1316-01-01'),
	(30, 'Gouda', 70932, 'Zuid-Holland', 'Pieter Verhoeve', '1143-01-01'),
	(31, 'Dordrecht', 118599, 'Zuid-Holland', 'Wouter Kolff', '1215-01-01'),
	(32, 'Amstelveen', 91876, 'Noord-Holland', 'Tjapko Poppens', '1195-01-01'),
	(33, 'Zoetermeer', 125095, 'Zuid-Holland', 'Michel Bezuijen', '1274-01-01'),
	(34, 'Roosendaal', 77669, 'Noord-Brabant', 'Han van Midden', '1299-01-01'),
	(35, 'Purmerend', 81536, 'Noord-Holland', 'Don Bijl', '1326-01-01'),
	(36, 'Oss', 93299, 'Noord-Brabant', 'Wobine Buijs-Glaudemans', '1075-01-01'),
	(37, 'Delfshaven', 78522, 'Zuid-Holland', 'Aboutaleb Ahmed', '1340-01-01'),
	(38, 'Sittard', 93404, 'Limburg', 'Bas van den Tillaar', '1243-01-01'),
	(39, 'Harderwijk', 50142, 'Gelderland', 'Cor Lamers', '1230-01-01'),
	(40, 'Zwijndrecht', 44921, 'Zuid-Holland', 'Dominic Schrijer', '1202-01-01'),
	(41, 'Assen', 67810, 'Drenthe', 'Marco Out', '1258-01-01'),
	(42, 'Heerhugowaard', 57461, 'Noord-Holland', 'Bert Blase', '1423-01-01'),
	(43, 'Nieuwegein', 63043, 'Utrecht', 'Frans Backhuijs', '1939-01-01'),
	(44, 'Woerden', 52578, 'Utrecht', 'Victor Molkenboer', '1300-01-01'),
	(45, 'Roermond', 58536, 'Limburg', 'Rianne Donders-de Leest', '1232-01-01'),
	(46, 'Doetinchem', 57507, 'Gelderland', 'Mark Boumans', '1193-01-01'),
	(47, 'Barneveld', 59056, 'Gelderland', 'Jan Luteijn', '1234-01-01'),
	(48, 'Culemborg', 28033, 'Gelderland', 'Gerdo van Grootheest', '1290-01-01'),
	(49, 'Tiel', 42038, 'Gelderland', 'Hans Beenakker', '1200-01-01'),
	(50, 'Drachten', 45516, 'Friesland', 'Jan Rijpstra', '1205-01-01'),
	(51, 'Harderwijk', 50142, 'Gelderland', 'Cor Lamers', '1230-01-01'),
	(52, 'Zwijndrecht', 44921, 'Zuid-Holland', 'Dominic Schrijer', '1202-01-01'),
	(53, 'Venlo', 100143, 'Limburg', 'Antoin Scholten', '1343-01-01'),
	(54, 'Rijswijk', 53176, 'Zuid-Holland', 'Michel Bezuijen', '1247-01-01'),
	(55, 'Katwijk', 65331, 'Zuid-Holland', 'Cornelis Visser', '1202-01-01'),
	(56, 'Gorinchem', 37480, 'Zuid-Holland', 'Reinie Melissant-Briene', '1209-01-01'),
	(57, 'Emmeloord', 26238, 'Flevoland', 'Jan Westmaas', '1943-01-01'),
	(58, 'Barendrecht', 48016, 'Zuid-Holland', 'Jan van Belzen', '1135-01-01'),
	(59, 'Pijnacker', 23079, 'Zuid-Holland', 'Francisca Ravestein', '1338-01-01'),
	(60, 'Lelystad', 76012, 'Flevoland', 'Ina Adema', '1967-01-01'),
	(61, 'Veendam', 27609, 'Groningen', 'Sipke Swierstra', '1200-01-01'),
	(62, 'Maarssen', 39019, 'Utrecht', 'Apoloniah van Veen-De Rijke', '1449-01-01'),
	(63, 'Geldrop', 29853, 'Noord-Brabant', 'Berry Link', '1421-01-01'),
	(64, 'Waalwijk', 47737, 'Noord-Brabant', 'Nol Kleijngeld', '1255-01-01'),
	(65, 'Heemstede', 27142, 'Noord-Holland', 'Astrid Nienhuis', '1286-01-01'),
	(66, 'Sliedrecht', 25542, 'Zuid-Holland', 'Bram van Hemmen', '1421-01-01'),
	(67, 'Weesp', 19825, 'Noord-Holland', 'Bas Jan van Bochove', '1355-01-01'),
	(68, 'Oisterwijk', 25914, 'Noord-Brabant', 'Hans Janssen', '1211-01-01'),
	(69, 'Losser', 22658, 'Overijssel', 'Cia Kroon', '1016-01-01');

-- Dumping structure for table keukenprins.provinces
CREATE TABLE IF NOT EXISTS `provinces` (
  `province_id` int NOT NULL AUTO_INCREMENT,
  `province_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province_capital` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province_population` int DEFAULT NULL,
  `province_area_km2` decimal(10,2) DEFAULT NULL,
  `province_foundation_date` date DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table keukenprins.provinces: ~10 rows (approximately)
INSERT INTO `provinces` (`province_id`, `province_name`, `province_capital`, `province_population`, `province_area_km2`, `province_foundation_date`) VALUES
	(1, 'Noord-Holland', 'Haarlem', 2853359, 4222.20, '1840-01-01'),
	(2, 'Zuid-Holland', 'Den Haag', 3673893, 3614.28, '1840-01-01'),
	(3, 'Utrecht', 'Utrecht', 1382150, 1371.84, '1840-01-01'),
	(4, 'Noord-Brabant', 'Den Bosch', 2544159, 4964.69, '1840-01-01'),
	(5, 'Gelderland', 'Arnhem', 2078057, 5136.94, '1840-01-01'),
	(6, 'Limburg', 'Maastricht', 1116735, 2155.61, '1839-04-01'),
	(7, 'Zeeland', 'Middelburg', 383488, 2935.36, '1839-04-01'),
	(8, 'Flevoland', 'Lelystad', 422506, 1426.87, '1986-01-01'),
	(9, 'Overijssel', 'Zwolle', 1156431, 3314.85, '1840-01-01'),
	(10, 'Groningen', 'Groningen', 587161, 2959.18, '1840-01-01');

-- Dumping structure for table keukenprins.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` int NOT NULL AUTO_INCREMENT,
  `session_user_id` int NOT NULL,
  `session_key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `session_start` date NOT NULL,
  `session_end` date NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table keukenprins.sessions: ~0 rows (approximately)

-- Dumping structure for table keukenprins.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_admin` int NOT NULL,
  `user_role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'standaard',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table keukenprins.users: ~10 rows (approximately)
INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_username`, `user_password`, `user_admin`, `user_role`) VALUES
	(1, 'Eva', 'Johnson', 'eva.johnson@email.com', 'eva_j', 'Eva@123', 0, 'standaard'),
	(2, 'Liam', 'Miller', 'liam.miller@email.com', 'liam_m', 'Liam#456', 0, 'standaard'),
	(3, 'Sophia', 'Smith', 'sophia.smith@email.com', 'sophia_s', 'Sophia@789', 0, 'standaard'),
	(4, 'Noah', 'Brown', 'noah.brown@email.com', 'noah_b', 'Noah_123', 0, 'standaard'),
	(5, 'Ava', 'Davis', 'ava.davis@email.com', 'ava_d', 'Ava#456', 0, 'standaard'),
	(6, 'Jackson', 'Martinez', 'jackson.martinez@email.co', 'jackson_m', 'Jackson@789', 0, 'standaard'),
	(7, 'Olivia', 'Garcia', 'olivia.g@email.com', 'olivia_g', 'Olivia_123', 0, 'standaard'),
	(8, 'Lucas', 'Williams', 'lucas.w@email.com', 'lucas_w', 'Lucas#456', 0, 'standaard'),
	(9, 'Isabella', 'Jones', 'isabella.j@email.com', 'isabella_j', 'Isabella@789', 0, 'standaard'),
	(10, 'Mia', 'Rodriguez', 'mia.rodriguez@email.com', 'mia_r', 'Mia_123', 0, 'standaard');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
