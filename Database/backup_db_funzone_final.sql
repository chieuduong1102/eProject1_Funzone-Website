-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for funzone
DROP DATABASE IF EXISTS `funzone`;
CREATE DATABASE IF NOT EXISTS `funzone` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `funzone`;

-- Dumping structure for table funzone.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table funzone.admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin`, `pass`) VALUES
	('admin1', '202cb962ac59075b964b07152d234b70'),
	('admin2', '827ccb0eea8a706c4c34a16891f84e7b'),
	('admin3', '1f8a7d7a2b952c9da39cb84e5a1af24a'),
	('admin4', '15e0e82b92fe12edc5c98cf2fc67cccc');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table funzone.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `c_id` varchar(20) NOT NULL,
  `name_category` varchar(100) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table funzone.category: ~7 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`c_id`, `name_category`, `position`) VALUES
	('eve1', 'EVENTS', 6),
	('exp1', 'EXPERIENCE', 3),
	('hot1', 'HOTEL', 5),
	('map1', 'MAP', 7),
	('ort1', 'Orther', 1),
	('res1', 'RESTAURANT', 4);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table funzone.image
DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `i_id` varchar(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `detail_image` longtext DEFAULT NULL,
  `description_image` varchar(255) DEFAULT NULL,
  `link_image` varchar(255) NOT NULL,
  PRIMARY KEY (`i_id`),
  KEY `s_id` (`s_id`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `service` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table funzone.image: ~64 rows (approximately)
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` (`i_id`, `s_id`, `title_image`, `detail_image`, `description_image`, `link_image`) VALUES
	('abu1_imgbanan', 'ort1_abu', 'Explore the world of entertainment', '', '', 'abu1_bananvip.jpg'),
	('abu1_imghotel', 'ort1_abu', '5 Stars Hotel', '  The hotel system at FUNZONE is at the forefront of quality, trained receptionist staff intensive, clean rooms that fully meet the needs of everyone. FUNZONE will bring a feeling cosy, friendly for all customers when using the service here.', '', 'abu1_sanhkhachsan.jpg'),
	('abu1_imgnhahang', 'ort1_abu', 'Peculiar cuisine', ' A catering chain in FUNZONE is diverse enough, ranging from local treats to more exotic fusion ones that cater to all possible palates of visitors. It will be a perfect destination for you all to explore and relish most inspiring foods in FUNZONE.', '', 'abu1_khonggiannhahang.jpg'),
	('abu1_imgtongquat', 'ort1_abu', 'FUNZONE – A pinnacle of amusement, excitement and endless joys!', 'Spanning 214ha in total, FUNZONE is world-class amusement and recreational complex that consists of two main areas: The Coastal Amusement Park and Amusement Park on Ba Deo Hill, which are connected together with a unique cabe car system. The FUNZONE is a brainchild of FunZone Group, one of the top-notch companies in investment and operation of amusement and recreational compounds, which have carved their marks through FUNZONE Ba Na Hills, FUNZONE Danang Wonders or FUNZONE Fansipan Legend… Given the experiences and prestige of FunZone Group, FUNZONE is expected to become a top and ideal destination of Vietnam.', '', 'abu1_khuvuichoi.jpg'),
	('eve1_imgcovid1', 'eve1_covid', 'FUNZONE SUSPENDED ITS OPERATION FROM MARCH 31, 2020', 'Due to the impact of the Covid 19 epidemic, implementing the policy of restricting crowds of people in public places, FUNZONE suspended its operation from March 31, 2020. We will be back as soon as possible!', '', 'eve1_covid.jpg'),
	('eve1_imgnoel1', 'eve1_noel', 'Merry Christmas', 'This Christmas year, FUNZONE has colourful decorative themes young and vibrant with very eye-catching foci. The most attractive thing that the dear customers could experience is the Christmas tree with lively colour bands from over 500,000 led bulbs and its height up to 18,88m, bringing unforgettable experiences to the visitors right after arriving at the FUNZONE park.\r\n', '', 'eve1_noel.jpg'),
	('eve1_imgqk', 'eve1_covid', 'Quốc khánh 2/9', 'Ngày quốc khánh VN', '', 'quockhanh.jpg'),
	('eve1_imgtet2', 'eve1_tet', 'EXPERIENCE THE TRADITIONAL TET AT “THE YEAR OF RAT – HAPPY SPRING” FESTIVAL', 'Lunar New Year – Year of the Rat 2020 is about to come, let FUNZONE leave all the chaos to immerse in the exciting spring atmosphere of the exciting traditional New Year days with activities of national colors!\r\n‼️ SCHEDULE OF ATTRACTIVE CELEBRATING ACTIVITIES OF THE YEAR OF THE RAT 🐭\r\n🌸 Making Chung Cake – Pounding Giay Cake: From Lunar December 28 to Lunar January 3 (Lunar New Year)\r\n🌸 Dragon unicorn dance for early spring: 1st (Lunar New Year)\r\n🌸 Giving Lucky money for early spring: From the 1st to the 3rd (Lunar New Year)\r\n🌸 Confucian scholars give letters: From the 1st to the 5th (Lunar New Year)\r\n🌸 Performing traditional music and folk games: From the 1st to the 3rd (Lunar New Year)\r\n👉 Come to FUNZONE to enjoy a meaningful Lunar New Year with your family and loved ones!', '', 'eve1_tetnguyendan.jpg'),
	('exp1_gwc1', 'exp1_gwc', '', 'The Great Wall of China is the collective name of a series of fortification systems generally built across the historical northern borders of China to protect and consolidate territories of Chinese states and empires against various nomadic groups of the steppe and their polities. Several walls were being built from as early as the 7th century BC by ancient Chinese states; selective stretches were later joined together by Qin Shi Huang (220–206 BC), the first emperor of China. Little of the Qin wall remains. Later on, many successive dynasties have built and maintained multiple stretches of border walls. The most well-known sections of the wall were built by the Ming dynasty (1368–1644).', '', 'vanlytruongthanh1.jpg'),
	('exp1_gwc2', 'exp1_gwc', '', '', 'The Ming dynasty Great Wall at Jinshanling', 'vanlytruongthanh2.jpg'),
	('exp1_gwc3', 'exp1_gwc', '', '', 'The Great Wall at Badaling - Credit: ', 'vanlytruongthanh3.jpg'),
	('exp1_imgcc1', 'exp1_cci', '', 'Chichen Itza was a large pre-Columbian city built by the Maya people of the Terminal Classic period. The archaeological site is located in Tinúm Municipality, Yucatán State, Mexico. Chichen Itza was a major focal point in the Northern Maya Lowlands from the Late Classic (c. AD 600–900) through the Terminal Classic (c. AD 800–900) and into the early portion of the Postclassic period (c. AD 900–1200). The site exhibits a multitude of architectural styles, reminiscent of styles seen in central Mexico and of the Puuc and Chenes styles of the Northern Maya lowlands. The presence of central Mexican styles was once thought to have been representative of direct migration or even conquest from central Mexico, but most contemporary interpretations view the presence of these non-Maya styles more as the result of cultural diffusion.', '', 'chichenitza1.jpg'),
	('exp1_imgcc2', 'exp1_cci', '', '', 'Chichen Itza - Credit: ', 'chichenitza2.jpg'),
	('exp1_imgcc3', 'exp1_cci', '', '', 'The ruins of the Mayans remain at Chichen Itza', 'chichenitza3.jpg'),
	('exp1_imgcci4', 'exp1_cci', '', '', 'Beautiful views in Chichen Itza', 'chichenitza4.png'),
	('exp1_imgcls1', 'exp1_cls', '', 'The Colosseum or Coliseum, also known as the Flavian Amphitheatre, is an oval amphitheatre in the centre of the city of Rome, Italy. Built of travertine limestone, tuff (volcanic rock), and brick-faced concrete, it was the largest amphitheatre ever built at the time and held 50,000 to 80,000 spectators. The Colosseum is situated just east of the Roman Forum. Construction began under the emperor Vespasian in AD 72 and was completed in AD 80 under his successor and heir, Titus. Further modifications were made during the reign of Domitian (81–96).', '', 'dautruonglama1.png'),
	('exp1_imgcls2', 'exp1_cls', '', '', 'Colosseum', 'dautruonglama2.png'),
	('exp1_imgcls3', 'exp1_cls', '', '', 'Colosseum - Credit: ', 'dautruonglama3.png'),
	('exp1_imgctr1', 'exp1_ctr', '', 'Christ the Redeemer is an Art Deco statue of Jesus Christ in Rio de Janeiro, Brazil, created by French sculptor Paul Landowski and built by Brazilian engineer Heitor da Silva Costa, in collaboration with French engineer Albert Caquot. Romanian sculptor Gheorghe Leonida fashioned the face. Constructed between 1922 and 1931, the statue is 30 metres (98 ft) high, excluding its 8-metre (26 ft) pedestal. The arms stretch 28 metres (92 ft) wide. The statue weighs 635 metric tons (625 long, 700 short tons), and is located at the peak of the 700-metre (2,300 ft) Corcovado mountain in the Tijuca Forest National Park overlooking the city of Rio de Janeiro. A symbol of Christianity across the world, the statue has also become a cultural icon of both Rio de Janeiro and Brazil and is listed as one of the New7Wonders of the World. It is made of reinforced concrete and soapstone.', '', 'kito1.jpeg'),
	('exp1_imgctr2', 'exp1_ctr', '', '', 'Christ the Redeemer on Corcovado Mountain', 'kito2.jpeg'),
	('exp1_imgctr3', 'exp1_ctr', '', '', 'Christ the Redeemer as a symbol of the city of Rio - Credit:  ', 'kito3.jpg'),
	('exp1_imgeif1', 'exp1_eif', '', '', '', 'EiffelTower1.jpg'),
	('exp1_imgeif2', 'exp1_eif', '', '', '', 'EiffelTower2.jpg'),
	('exp1_imgeif3', 'exp1_eif', '', '', '', 'EiffelTower3.jpg'),
	('exp1_imghlb1', 'exp1_hlb', 'Ha Long Bay', 'Hạ Long Bay is a UNESCO World Heritage Site and popular travel destination in Quảng Ninh Province, Vietnam. The name Hạ Long means "descending dragon". Administratively, the bay belongs to Hạ Long city, Cẩm Phả city, and is a part of Vân Đồn District. The bay features thousands of limestone karsts and isles in various shapes and sizes. Ha Long Bay is a center of a larger zone which includes Bai Tu Long Bay to the northeast, and Cát Bà Island to the southwest. These larger zones share a similar geological, geographical, geomorphological, climate, and cultural characters.', '', 'halongbay1.jpg'),
	('exp1_imghlb2', 'exp1_hlb', '', '', 'The view from the sky', 'halongbay2.jpg'),
	('exp1_imghlb3', 'exp1_hlb', '', '', 'Titop Island - Credit: ', 'halongbay3.jpg'),
	('exp1_imgmcpc1', 'exp1_mcpc', '', ' Machu Picchu is a 15th-century Inca citadel, located in the Eastern Cordillera of southern Peru, on a 2,430-metre (7,970 ft) mountain ridge. It is located in the Cusco Region, Urubamba Province, Machupicchu District, above the Sacred Valley, which is 80 kilometres (50 mi) northwest of Cuzco. The Urubamba River flows past it, cutting through the Cordillera and creating a canyon with a tropical mountain climate. Most archaeologists believe that Machu Picchu was constructed as an estate for the Inca emperor Pachacuti (1438–1472). Often mistakenly referred to as the "Lost City of the Incas", it is the most familiar icon of Inca civilization. The Incas built the estate around 1450 but abandoned it a century later at the time of the Spanish conquest. Although known locally, it was not known to the Spanish during the colonial period and remained unknown to the outside world until American historian Hiram Bingham brought it to international attention in 1911.', '', 'machupicchu1.jpg'),
	('exp1_imgmcpc2', 'exp1_mcpc', '', '', 'Inca City - Credit: ', 'machupicchu2.jpg'),
	('exp1_imgmcpc3', 'exp1_mcpc', '', '', 'Machu Picchu', 'machupicchu3.jpg'),
	('exp1_imgpru1', 'exp1_pru', '', ' Petra, originally known to its inhabitants as Raqmu, is a historical and archaeological city in southern Jordan. Petra lies around Jabal Al-Madbah in a basin surrounded by mountains which form the eastern flank of the Arabah valley that runs from the Dead Sea to the Gulf of Aqaba. The area around Petra has been inhabited from as early as 7000 BC, and the Nabataeans might have settled in what would become the capital city of their kingdom, as early as the 4th century BC. However, archaeological work has only discovered evidence of Nabataean presence dating back to the second century BC, by which time Petra had become their capital. The Nabataeans were nomadic Arabs who invested in Petra\'s proximity to the trade routes by establishing it as a major regional trading hub.', '', 'petra1.jpg'),
	('exp1_imgpru2', 'exp1_pru', '', '', 'Petra City', 'petra2.jpg'),
	('exp1_imgpru3', 'exp1_pru', '', '', 'Visitors are riding camels', 'petra3.jpg'),
	('exp1_imgzcci', 'exp1_cci', 'Chichen Itza', '', '', 'chichen.jpg'),
	('exp1_imgzcls', 'exp1_cls', 'The Colosseum', '', '', 'dautruonglama.jpg'),
	('exp1_imgzctr', 'exp1_ctr', 'Christ the Redeemer', '', '', 'tuongchua.jpg'),
	('exp1_imgzeif', 'exp1_eif', 'Eiffel Tower', '', '', 'EiffelTower.jpg'),
	('exp1_imgzgwc', 'exp1_gwc', 'Great Wall of China', '', '', 'vanlitruongthanh.jpg'),
	('exp1_imgzhlb', 'exp1_hlb', 'Ha Long Bay', '', '', 'vinhhalong.jpg'),
	('exp1_imgzmcpc', 'exp1_mcpc', 'Machu Picchu', '', '', 'machupicchu.jpg'),
	('exp1_imgzpru', 'exp1_pru', 'Petra Raqmu', '', '', 'petra.jpg'),
	('hot1_imgbar', 'hot1_dvt', '', '', 'Bar Pub', 'hotel_quaybarkhachsan.jpg'),
	('hot1_imgbview', 'hot1_dvt', '', '', 'Beautiful view', 'hotel_bancong.jpg'),
	('hot1_imghall', 'hot1_dvt', 'The Hall', 'This Hall will celebrate for wedding, anniversary and many events.', '', 'hotel_hoitruongkhachsan.jpg'),
	('hot1_imgoutside', 'hot1_dvt', 'The Outside', 'View from the outside of the hotel With a very European style, DVT deserves to be one of the hotels The most beautiful at FUNZONE, it makes people feel warm, romantic with lights and sparkling flowers ......', '', 'hotel_khonggianbengoaikhachsan.jpg'),
	('hot1_imgreception', 'hot1_dvt', 'Reception Service', 'We have a team of professional receptionists, intensive training will give everyone a sense of intimacy.', '', 'hotel_dichvutieptan.jpg'),
	('hot1_imgswimming', 'hot1_dvt', '', '', 'Swimming Pool', 'hotel_hoboikhachsan.jpg'),
	('hot1_imgwine', 'hot1_dvt', '', '', 'Wine Cellar', 'hotel_hamruoukhachsan.jpg'),
	('hot1_img_slide11', 'hot1_dvt', '', 'Economy and VIP ROOM The price of economy room is $150 for each night.\r\nThe price of VIP room is $300 for each night, which includes the buffet at our restaurant and swimming pool.', 'Economy Room', 'hotel_slidephongthuong01.jpg'),
	('hot1_img_slide21', 'hot1_dvt', '', '', 'VIP Room', 'hotel_slidephongvip01.jpg'),
	('hot1_img_slides12', 'hot1_dvt', '', '', '', 'hotel_slidephongthuong02.jpg'),
	('hot1_img_slides13', 'hot1_dvt', '', '', '', 'hotel_slidephongthuong03.jpg'),
	('hot1_img_slidev22', 'hot1_dvt', '', '', '', 'hotel_slidephongvip02.jpg'),
	('hot1_img_slidev23', 'hot1_dvt', '', '', '', 'hotel_slidephongvip03.jpg'),
	('hot1_img_slidev24', 'hot1_dvt', '', '', '', 'hotel_slidephongvip04.jpg'),
	('hot1_img_slidev25', 'hot1_dvt', '', '', '', 'hotel_slidephongvip05.jpg'),
	('res1_img', 'res1_dvt', 'Nhân viên phục vụ', 'Professional service staff, trained. They are willing to please all customers.', '', 'cong-viec-cua-nhan-vien-phuc-vu-trong-nha-hang.png'),
	('res1_imgbar', 'res1_dvt', '', '', 'Bar', 'restaurant_khonggianquaybar.jpg'),
	('res1_imginside', 'res1_dvt', 'The Inside', 'Coming to DVT restaurant, we not only have delicious food, fancy but also gives guests the space inside the restaurant luxurious, modern and unique. With Unique designs unique to FUNZONE.', '', 'restaurant_khonggianbentrong.jpg'),
	('res1_imgkhonggian', 'res1_dvt', '', '', 'Respected space', 'restaurant_khonggianquaysangtrong.jpg'),
	('res1_imgkitchen', 'res1_dvt', '', '', 'Kitchen', 'restaurant_khonggianbep.jpg'),
	('res1_imgmenu', 'res1_dvt', '', 'We have many tradition food that you want to try. Check it out!', '', 'restaurant_menu.jpg'),
	('res1_imgoutside', 'res1_dvt', 'The Outside', 'View from the outside of the restaurant With a pleasant, comfortable space with a luxurious restaurant interior design and nice DVT deserves to be one of the Restaurants The most beautiful at FUNZONE, it makes people feel impressed and romantic ...', '', 'restaurant_khonggianbenngoai.jpg'),
	('res1_imgviproom', 'res1_dvt', '', '', 'VIP Room', 'restaurant_phonganvip.jpg');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;

-- Dumping structure for table funzone.service
DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `s_id` varchar(20) NOT NULL,
  `c_id` varchar(20) DEFAULT NULL,
  `name_service` varchar(100) DEFAULT NULL,
  `detail_service` longtext DEFAULT NULL,
  PRIMARY KEY (`s_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `service_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table funzone.service: ~17 rows (approximately)
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` (`s_id`, `c_id`, `name_service`, `detail_service`) VALUES
	('eve1_covid', 'eve1', 'FUNZONE SUSPENDED ITS OPERATION FROM MARCH 31, 2020', 'Due to the impact of the Covid 19 epidemic, implementing the policy of restricting crowds of people in public places, FUNZONE suspended its operation from March 31, 2020. We will be back as soon as possible!'),
	('eve1_noel', 'eve1', ' MERRY CHRISTMAS', 'This Christmas year, FUNZONE has colourful decorative themes young and vibrant with very eye-catching foci. The most attractive thing that the dear customers could experience is the Christmas tree with lively colour bands from over 500,000 led bulbs and its height up to 18,88m, bringing unforgettable experiences to the visitors right after arriving at the FUNZONE park.'),
	('eve1_qk', 'eve1', 'Quoc  Khanh', 'Quoc Khanh Viet Nam 2-9'),
	('eve1_tet', 'eve1', 'EXPERIENCE THE TRADITIONAL TET AT “THE YEAR OF RAT – HAPPY SPRING” FESTIVAL', 'Lunar New Year – Year of the Rat 2020 is about to come, let Sun World Halong Complex leave all the chaos to immerse in the exciting spring atmosphere of the exciting traditional New Year days with activities of national colors!\r\n‼️ SCHEDULE OF ATTRACTIVE CELEBRATING ACTIVITIES OF THE YEAR OF THE RAT 🐭\r\n🌸 Making Chung Cake – Pounding Giay Cake: From Lunar December 28 to Lunar January 3 (Lunar New Year)\r\n🌸 Dragon unicorn dance for early spring: 1st (Lunar New Year)\r\n🌸 Giving Lucky money for early spring: From the 1st to the 3rd (Lunar New Year)\r\n🌸 Confucian scholars give letters: From the 1st to the 5th (Lunar New Year)\r\n🌸 Performing traditional music and folk games: From the 1st to the 3rd (Lunar New Year)\r\n👉 Come to FUNZONE to enjoy a meaningful Lunar New Year with your family and loved ones!\r\n'),
	('exp1_cci', 'exp1', 'Chichen Itza', ' Chichen Itza was a large pre-Columbian city built by the Maya people of the Terminal Classic period. The archaeological site is located in Tinúm Municipality, Yucatán State, Mexico. Chichen Itza was a major focal point in the Northern Maya Lowlands from the Late Classic (c. AD 600–900) through the Terminal Classic (c. AD 800–900) and into the early portion of the Postclassic period (c. AD 900–1200). The site exhibits a multitude of architectural styles, reminiscent of styles seen in central Mexico and of the Puuc and Chenes styles of the Northern Maya lowlands. The presence of central Mexican styles was once thought to have been representative of direct migration or even conquest from central Mexico, but most contemporary interpretations view the presence of these non-Maya styles more as the result of cultural diffusion.'),
	('exp1_cls', 'exp1', 'The Colosseum', 'The Colosseum or Coliseum, also known as the Flavian Amphitheatre, is an oval amphitheatre in the centre of the city of Rome, Italy. Built of travertine limestone, tuff (volcanic rock), and brick-faced concrete, it was the largest amphitheatre ever built at the time and held 50,000 to 80,000 spectators. The Colosseum is situated just east of the Roman Forum. Construction began under the emperor Vespasian in AD 72 and was completed in AD 80 under his successor and heir, Titus. Further modifications were made during the reign of Domitian (81–96).'),
	('exp1_ctr', 'exp1', 'Christ the Redeemer', 'Christ the Redeemer is an Art Deco statue of Jesus Christ in Rio de Janeiro, Brazil, created by French sculptor Paul Landowski and built by Brazilian engineer Heitor da Silva Costa, in collaboration with French engineer Albert Caquot. Romanian sculptor Gheorghe Leonida fashioned the face. Constructed between 1922 and 1931, the statue is 30 metres (98 ft) high, excluding its 8-metre (26 ft) pedestal. The arms stretch 28 metres (92 ft) wide. The statue weighs 635 metric tons (625 long, 700 short tons), and is located at the peak of the 700-metre (2,300 ft) Corcovado mountain in the Tijuca Forest National Park overlooking the city of Rio de Janeiro. A symbol of Christianity across the world, the statue has also become a cultural icon of both Rio de Janeiro and Brazil and is listed as one of the New7Wonders of the World. It is made of reinforced concrete and soapstone.\r\n\r\n'),
	('exp1_eif', 'exp1', 'Eiffel Tower', '&emsp;The Eiffel Tower is a wrought-iron lattice tower on the Champ de Mars in Paris, France. It is named after the engineer Gustave Eiffel, whose company designed and built the tower.\r\nConstructed from 1887 to 1889 as the entrance to the 1889 World\'s Fair, it was initially criticised by some of France\'s leading artists and intellectuals for its design, but it has become a global cultural icon of France and one of the most recognisable structures in the world.[3] The Eiffel Tower is the most-visited paid monument in the world; 6.91 million people ascended it in 2015.\r\n\r\nThe tower is 324 metres (1,063 ft) tall, about the same height as an 81-storey building, and the tallest structure in Paris. Its base is square, measuring 125 metres (410 ft) on each side. During its construction, the Eiffel Tower surpassed the Washington Monument to become the tallest man-made structure in the world, a title it held for 41 years until the Chrysler Building in New York City was finished in 1930. It was the first structure to reach a height of 300 metres. Due to the addition of a broadcasting aerial at the top of the tower in 1957, it is now taller than the Chrysler Building by 5.2 metres (17 ft). Excluding transmitters, the Eiffel Tower is the second tallest free-standing structure in France after the Millau Viaduct.'),
	('exp1_gwc', 'exp1', 'Great Wall of China', ' The Great Wall of China is the collective name of a series of fortification systems generally built across the historical northern borders of China to protect and consolidate territories of Chinese states and empires against various nomadic groups of the steppe and their polities. Several walls were being built from as early as the 7th century BC by ancient Chinese states; selective stretches were later joined together by Qin Shi Huang (220–206 BC), the first emperor of China. Little of the Qin wall remains. Later on, many successive dynasties have built and maintained multiple stretches of border walls. The most well-known sections of the wall were built by the Ming dynasty (1368–1644).'),
	('exp1_hlb', 'exp1', 'Ha Long Bay', 'Ha Long Bay is a UNESCO World Heritage Site and popular travel destination in Quang Ninh Province, Vietnam. The name Ha Long means "descending dragon". Administratively, the bay belongs to Ha Long city, Cam Pha city, and is a part of Van Đon District. The bay features thousands of limestone karsts and isles in various shapes and sizes. Ha Long Bay is a center of a larger zone which includes Bai Tu Long Bay to the northeast, and Cat Ba Island to the southwest. These larger zones share a similar geological, geographical, geomorphological, climate, and cultural characters.'),
	('exp1_mcpc', 'exp1', 'Machu Picchu', ' Machu Picchu is a 15th-century Inca citadel, located in the Eastern Cordillera of southern Peru, on a 2,430-metre (7,970 ft) mountain ridge. It is located in the Cusco Region, Urubamba Province, Machupicchu District, above the Sacred Valley, which is 80 kilometres (50 mi) northwest of Cuzco. The Urubamba River flows past it, cutting through the Cordillera and creating a canyon with a tropical mountain climate. Most archaeologists believe that Machu Picchu was constructed as an estate for the Inca emperor Pachacuti (1438–1472). Often mistakenly referred to as the "Lost City of the Incas", it is the most familiar icon of Inca civilization. The Incas built the estate around 1450 but abandoned it a century later at the time of the Spanish conquest. Although known locally, it was not known to the Spanish during the colonial period and remained unknown to the outside world until American historian Hiram Bingham brought it to international attention in 1911.'),
	('exp1_pru', 'exp1', 'Petra Raqmu', ' Petra, originally known to its inhabitants as Raqmu, is a historical and archaeological city in southern Jordan. Petra lies around Jabal Al-Madbah in a basin surrounded by mountains which form the eastern flank of the Arabah valley that runs from the Dead Sea to the Gulf of Aqaba. The area around Petra has been inhabited from as early as 7000 BC, and the Nabataeans might have settled in what would become the capital city of their kingdom, as early as the 4th century BC. However, archaeological work has only discovered evidence of Nabataean presence dating back to the second century BC, by which time Petra had become their capital. The Nabataeans were nomadic Arabs who invested in Petra\'s proximity to the trade routes by establishing it as a major regional trading hub.'),
	('hot1_dvt', 'hot1', 'DVT Hotel', 'If you are looking for luxury hotels in Hanoi, try DVT Hotel. If you like to explore famous landmarks when coming to Hanoi, DVT Hotel is located not far from Hanoi Opera House (0.4 km) and St. Joseph Cathedral (0.8 km). The hotel rooms offer flat-screen TVs, mini bars and air conditioners, and online is possible because free wifi is available, allowing you to relax to rest without worry. DVT Hotel provides room service and concierge staff. Moreover, as our valuable customer, you can enjoy the pool and breakfast, available at the property. Guests traveling to the hotel by vehicle can use the parking lot. While in Hanoi, you may want to try some restaurants just a few steps from FUNZONE, including Bun Cha Huong Lien (0.9 km), Quan An Ngon (1.3 km) and The Hanoi Social Club ( 1.1 km). If you are looking for leisure activities, Hanoi Old Quarter (1.1 km) and Hoa Lo (1.0 km) are both interesting experiences, and within walking distance of Hanoi. DVT Hotel looks forward to serving you on the upcoming holiday.'),
	('ort1_abu', 'ort1', 'ABOUT US', ''),
	('ort1_hop', 'ort1', 'HOME', ''),
	('ort1_map', 'ort1', 'Map', 'FUNZONE THE MOST ENTERTAINING THEME PARK'),
	('res1_dvt', 'res1', 'DVT Restaurant', 'The notion that music can touch the core of our being, mood and attitudes has been manifested through the time-honored bonding with melodic rhymes of prominent poets and music composers. And though Shakespeare, the master poet of romance, once referred to music as the “food of love”, he went much further, writing that music has the power to create art as well as to destroy life.\r\nOur restaurant concept is formed in harmony with the rhythms of the King’s Symphony, showcasing an orchestra of Vietnamese authentic cuisine embellished with the grandeur of royal ambience. The blending of sophisticated Western architecture with local heritage has created a beautiful melody, expected to touch the emotion of guests and take them on a unique sensory journey.\r\nOur dream for The DVT Restaurant is to capture the charm of local cuisine and elevate it to an upper standard with compassion and creativity. The development of our upcoming restaurants is expected to cultivate a harmonious society where both locals and international friends can embrace, cherish and spread the taste of Vietnamese cuisine throughout the region.');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
