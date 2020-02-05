-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `boutiquefmm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `boutiquefmm`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `mail` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `delivered_at` datetime DEFAULT NULL,
  `customers_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_customers1` (`customers_id`),
  CONSTRAINT `fk_orders_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `order_lines`;
CREATE TABLE `order_lines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `products_name` varchar(250) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `tva` decimal(5,2) DEFAULT NULL,
  `orders_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_line_orders1` (`orders_id`),
  CONSTRAINT `fk_order_line_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `taxe` decimal(5,2) DEFAULT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `stock` int(10) unsigned DEFAULT NULL,
  `arrival_date` datetime DEFAULT curdate(),
  `order_line_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_order_line1` (`order_line_id`),
  CONSTRAINT `fk_products_order_line1` FOREIGN KEY (`order_line_id`) REFERENCES `order_lines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `brand`, `name`, `description`, `price`, `taxe`, `weight`, `stock`, `arrival_date`, `order_line_id`) VALUES
(1,	'Samsung',	'Galaxy Watch Active - GPS - 40 mm',	'Par son seul nom, la Samsung Galaxy Watch Active indique clairement ses intentions. Cette nouvelle montre connectée du constructeur coréen ravira effectivement tous ceux qui ne jurent que par le sport et la dépense d\'énergie ! Fine et élégante, la belle embarque de nouveau un cardio fréquencemètre, un GPS, et affiche une résistance 5 ATM, qui vous permettra de nager par 50 mètres de profondeur. Boitier aluminium (noir) - bracelet silicone (noir.',	200.00,	19.60,	300,	150,	'2019-04-04 17:52:33',	NULL),
(2,	'Samsung',	'Galaxy Watch - GPS - 46 mm',	'Fini l\'attente ! Le petit univers des montres connectées accueille le nouveau modèle phare de Samsung : la Galaxy Watch ! Au menu d\'abord, un changement de nomenclature qui indique clairement la volonté de Samsung d\'intégrer tous ses produits dans un écosystème ultra connecté, ou chaque appareil peut interagir avec les autres. On retrouve bien évidemment ce qui fit le succès de la série Gear : un design soigné, évoquant immédiatement une vraie montre plutôt qu\'un simple accessoire électronique, un écran super AMOLED, cerclé d\'une lunette rotative idéale pour la navigation. Le cardiofréquencemètre est de nouveau de la partie, tout comme les bracelets interchangeables en sillicone. Et si cette matière a été choisie plutôt que le cuir par exemple, c\'est que cette montre est étanche jusqu\'à 50 mètres ! Ajoutez encore une autonomie jusqu\'à 7 jours, et vous obtiendrez une montre ultra complète qui deviendra vite indispensable au quotidien.\r\nBoitier acier (gris acier) - bracelet silicone (noir)',	275.00,	19.60,	325,	229,	'2019-02-04 17:53:52',	NULL),
(3,	'Apple',	'Watch Series 5 Aluminium - GPS - 44 mm',	'L\'Apple Watch Séries 5 est équipée d\'un écran Retina toujours activé. Elle affiche l\'heure et les informations importantes permanentes en permanence. Elle vous permet de surveiller votre coeur avec l\'application ECG. Elle suit vos entraînements et votre activité. (Gris - Bracelet Sport Noir).',	450.00,	19.60,	267,	154,	'2020-02-04 17:55:27',	NULL),
(4,	'Honor',	'Watch - GPS - 42 mm',	'La montre connectée Honor Watch est un compagnon idéal pour la vie de tous les jours et vos activités sportive. Endurante, elle tiendra jusqu\'à 7 jour entre 2 charges, et vous permettra d\'explorer les fonds marins jusqu\'à 50 mètres de profondeur ! (acier - marron).',	170.00,	19.60,	237,	28,	'2018-01-04 17:56:49',	NULL),
(5,	'Samsung',	'Galaxy Watch Active 2 4G - GPS - 44 mm',	'Écoutez votre musique, appelez, envoyez vos SMS et bien plus encore. Encore plus moderne et classe, ce concentré de technologie ne vous lâchera plus jamais. La Samsung Galaxy Watch Active 2 4G, dispose de nombreuses fonctionnalités pour vous faciliter la vie. De plus, elle dispose d\'une étanchéité 5ATM ainsi que d\'une certification militaire, pour descendre avec vous jusqu\'à 50 mètres de profondeur.',	425.00,	19.60,	358,	243,	'2020-02-04 17:57:56',	NULL),
(6,	'JDI',	'Mavic 2 Pro',	'Le roi des drones est de retour, cette année en 2 versions ! Ici, nous avons à faire au DJI Mavic 2 Pro, doté d\'une caméra Hasselblad à ouverture réglable, capable d\'enregistrer vos vidéos au format 4K HDR ! Son ouverture variable vous assure d\'obtenir des films et photos idéales en plein jour comme en faible luminosité. Et avec 31 minutes d\'autonomie, vous aurez tout le temps qu\'il vous faut pour choisir le bon angle, la bonne altitude et le bon moment pour déclencher vos prises. Drone, CMOS 1\", stabilisation 3 axes, 31 minutes, 18 km, 72 km/h.',	1200.00,	19.60,	907,	25,	'2020-02-04 18:17:06',	NULL),
(7,	'Parrot',	'Anafi Extended',	'Le drone Parrot Anafi vient concurrencer les tenant du titre dans la catégorie des drones pliables. Loin d\'être un jouet, ce quadricoptère est à la fois compact et léger. Il bénéficie d\'une belle autonomie de vol de 25 minutes et permet de filmer en 4K HDR grâce à sa caméra de 21 mégapixels, capable de s\'orienter à 90° vers le haut ou vers le bas. Un outil idéal pour les photographes en quête de prise de vue aérienne réussie. Et grâce à cette version Extended et ses 2 batteries supplémentaires, profitez d\'un temps de vol de 1h15, pour des tournages sans interruption. Drone, CMOS 1/2,4\", Stabilisation 3 axes, 25 minutes, 55 km/h.',	800.00,	19.60,	320,	13,	'2016-07-04 18:14:39',	NULL),
(8,	'Focal',	'Focal Listen Bluetooth - Casque sans fil',	'Le casque Focal Listen passe au Bluetooth, avec sa conception Française il combine tous les atouts d\'un casque nomade premium le sans fil en plus grâce à son mode sans fil Bluetooth 4.1 permettant de se déplacer librement jusqu\'à 15 mètres. Son excellente isolation est assurée par un design clos et de larges coussinets permettant de préserver ses qualités acoustiques, même dans des environnements bruyants.\r\n',	100.00,	19.60,	300,	15,	'2018-05-15 18:16:40',	NULL),
(9,	'Sennheiser',	'MOMENTUM True Wireless - Écouteurs sans fil ',	'Le son Momentum en totale liberté ça vous dit ? Les écouteurs Sennheiser Momentum True Wireless sont un véritable concentré de savoir-faire.',	250.00,	19.60,	17,	223,	'2020-02-04 18:18:52',	NULL),
(10,	'Apple',	'Homepod Gris sidéral - Enceinte connectée',	'L\'Apple HomePod est beaucoup plus qu\'une enceinte sans fil, elle offre une expérience audiophile exceptionnelle à 360°, c\'est aussi un véritable majordome. Vous allez pouvoir lui demander un nombre incroyable de requêtes que ce soit pour l\'écoute de votre musique, la gestion de votre emploi du temps ou encore piloter vos accessoires domotiques compatibles. Avec seulement 18 cm de hauteur et un esthétisme élégant elle trouve facilement sa place dans votre foyer pour le plaisir des yeux et des oreilles.',	300.00,	19.60,	2500,	10,	'2019-02-22 18:20:49',	NULL),
(11,	'Google',	'Home - Enceinte connectée',	'Le futur est déjà là avec les assistants domestiques Google Home. L\'enceinte connectée Google Home permet de contrôler et de faire de plus en plus de choses chez vous, il suffit simplement de lui dire avec \"Ok Google\". L\'assistant Google est capable de communiquer avec de nombreux produits et accessoires avec pour seul but de vous simplifier la vie au quotidien.',	75.00,	19.60,	477,	42,	'2020-02-04 18:22:11',	NULL),
(12,	'Anki Robot',	'Cozmo',	'Extraordinaire. Extraverti. Irrésistible. Cozmo est un compagnon et un véritable complice de jeux. Grâce à son intelligence artificielle, il est capable d\'exprimer une large palette d\'émotions : curieux, joyeux, taquin, tenace ou boudeur... son humeur change au fil de vos activités. Il vous reconnaît, vous appelle par votre prénom, attire votre attention et vous propose de jouer. Plus il interagit avec vous, plus sa personnalité évolue. Une intelligence surpuissante. Constitué de plus de 300 pièces, Cozmo est un robot étonnamment intelligent. Il ne se contente pas de se déplacer ; curieux et autonome, il explore le monde qui l’entoure. Il ne se contente pas d’apprendre ; il planifie ses actions et vous surprend. Non seulement il vous voit, mais il apprend aussi à vous connaître ! Et Cozmo est doté de l’atelier de programmation, Code Lab, une plateforme idéale pour les programmeurs débutants. Il vous suffit de glisser-déposer quelques blocs d’instructions pour voir Cozmo agir comme vous l’avez imaginé et programmé. Un joueur né. Cozmo aime jouer et gagner. Qu\'il s\'amuse à soulever ses Power Cubes ou qu\'il vous défie à des jeux tels que Quick Tap et Esquive, il est toujours prêt à l\'action. Le mode Explorateur vous permet de le contrôler à distance pour découvrir le monde à travers ses yeux, de jour comme de nuit. Et l’app Cozmo est régulièrement mise à jour avec de nouvelles compétences et de nouvelles activités ! Prêt à l’action. Cozmo est facile à utiliser : il n\'y a aucune pièce à assembler. Tout ce dont vous avez besoin c’est un appareil iOS ou Android compatible et l\'app Cozmo gratuite. Sa sécurité et sa durabilité ont fait l\'objet de tests rigoureux. Contenu de la boîte : • 1 robot Cozmo • 1 chargeur • 3 Power Cubes interactifs. Une fois sorti de son emballage, n’exposez pas Cozmo à des conditions extrêmes comme une exposition directe et prolongée aux rayons du soleil ou l\'intérieur d\'une voiture surchauffée. Pour de meilleurs résultats utilisez-le en intérieur. Evitez tout contact avec l\'eau. Cozmo est conçu pour être solide mais il est important de maintenir ses capteurs propres pour un fonctionnement optimal. CAMERA / CAPTEURS ANTI-CHUTES : Essuyez légèrement les capteurs de Cozmo (situés sur sa face avant et sa poitrine) avec un chiffon sec, propre et sans peluche pour enlever les tâches ou les dépôts. PILES DES POWER CUBES : Les Power Cubes de Cozmo utilisent une pile Alkaline N. Si un cube ne répond pas, remplacez la pile en utilisant un tournevis pour ouvrir le compartiment à piles placé sur l\'un des côtés du cube. ',	225.00,	19.60,	150,	14,	'2020-02-04 18:25:03',	NULL),
(13,	'Lego',	'Mindstorms EV3',	'Le tout nouveau kit Lego MINDSTORMS EV3 constitue la dernière évolution en date du kit robotique pédagogique Lego Mindstorms.\r\n\r\nAvec Lego MINDSTORMS EV3,  créez votre propre robot qui peut penser, marcher et observer le monde. Grâce à Lego MINDSTORMS EV3, vous êtes libre de construire tous les robots qui vous viennent à l\'esprit, en suivant votre imagination. Vous trouverez dans le kit Lego MINDSTORMS EV3 des instructions de montage pour 5 robots et 12 autres manuels officiels se trouvent en ligne.\r\n\r\nDonnez vie à votre robot Lego EV3 en utilisant un langage de programmation graphique très simple disponible pour PC et Mac. Connectez vous sur le site de la communauté Mindstorms pour échanger avec d\'autre passionnés de Lego Mindstorms et échanger des idées et de l\'expérience.\r\n\r\nContrôlez votre robot MINDSTORMS EV3 avec la télécommande inclue ou bien avec votre smartphone ou tablette (aplication gratuite pour Android et iOS) ou enfin développez une intelligence autonome pour résoudre vos challenges.',	400.00,	19.60,	2200,	5,	'2019-02-04 18:27:48',	NULL),
(14,	'Niryo',	'One - Bras robotique 6 axes',	'Bras robotique Niryo One : pédagogique et accessible à tous les budgets\r\n\r\nLe bras 6 axes pour l\'éducation Niryo One se distingue de nombreux bras robotiques par la façon dont il démocratise l\'apprentissage de la programmation robotique. Il permet aux professeurs, chercheurs et concepteurs d\'acquérir à prix réduit un bras robotique 6 axes entièrement programmable et 100 % open source.\r\n\r\nCe bras robotique Raspberry, ROS et Arduino est fabriqué par impression 3D. Vous pouvez lui ajouter différents accessoires ou concevoir vos propres outils et les imprimer en 3D à votre tour. Pour développer vos applications, vous avez accès à toute une communauté de concepteurs Niryo One, ainsi qu\'aux documents et bibliothèques de code nécessaires. Côté programmation, Niryo One bénéficie d\'une interface visuelle de type Blockly, baptisée Niryo Black, fonctionnant sur le même principe que Scratch, par le biais de sélection et de déplacement de blocs de commandes.\r\n',	1999.00,	19.60,	3300,	5,	'2019-11-20 18:30:28',	NULL),
(15,	'Robotis',	'OP 3',	'Nouvelle évolution du robot humanoïde d\'éducation OP par Robotis, Robotis OP3 vous propose des performances améliorées, un système de navigation autonome, et un ROS adapté à tous les utilisateurs de Linux et de Windows.\r\n\r\nRobotis OP3 est un humanoïde miniature (51 cm de haut), programmable en open source sur Linux, doté de 20 degrés de liberté, d\'un processeur principal double cœur et d\'un processeur secondaire ARM Cortex M7. Il dispose d\'un système de navigation autonome basé sur une centrale inertielle composée de trois instruments (gyroscope, magnétomètre et accéléromètre 3 axes). Cette IMU vous permet ainsi de paramétrer et d\'analyser la vitesse de rotation, l\'accélération, ou encore la direction. \r\n\r\nUne webcam haute définition est intégrée au robot, offrant une résolution de 1920x1080 pixels, rendant Robotis OP3 capable d\'interactions multiples avec son environnement : détection de couleurs et de formes, reconnaissance faciale, etc.',	11000.00,	19.60,	3500,	3,	'2020-01-01 18:33:22',	NULL),
(16,	'Softbank Robotics Aldebaran',	'Robot humanoïde programmable NAO V6',	'NAO6 en gris foncé est la sixième génération du robot humanoïde interactif NAO, développé par SoftBank Robotics, et est autonome et entièrement programmable. Ce robot est destiné aux professionnels et aux académiques.',	8200.00,	19.60,	5480,	1,	'2020-02-04 18:35:31',	NULL),
(17,	'Roomba',	'IRobot 691',	' Un  aspirateur connecté, autonome, intelligent et programmable ! Appuyez sur le bouton Clean ou programmez le  Roomba 691 de iRobot et il aspire à votre place !\r\nConnecté, l’application gratuite iRobot HOME vous permet de lancer le nettoyage et de programmer le Roomba 691 où que vous soyez grâce à votre smartphone ou votre tablette !\r\nQui n\'a jamais rêvé de ne plus avoir à passer l\'aspirateur pour avoir plus de temps libre, pour passer plus de temps avec vos enfants... ?\r\nCet aspirateur fera le ménage à votre place !\r\n',	8000.00,	19.60,	3560,	10,	'2020-02-04 18:38:19',	NULL),
(18,	'Roomba',	'IRobot 650',	'ppuyez sur le bouton et il aspire à votre place !\r\n\r\nQui n\'a jamais rêvé de ne plus avoir à passer l\'aspirateur pour avoir plus de temps libre, pour passer plus de temps avec vos enfants... ?\r\nCet aspirateur fera le ménage à votre place !\r\nIl enlève efficacement saleté, débris, poils d\'animaux, poussières et allergènes sur moquettes et sols durs (carrelages, linoléum, tapis...).Il utilise le système de navigation iAdapt : il analyse l\'environnement à nettoyer 60 fois par seconde, grâce à de multiples capteurs et plus de 40 comportements robotiques pour de meilleures performances de nettoyage.\r\nSes capteurs audio détectent les petites particules et vous permet de nettoyer plus en profondeur.\r\nLa technologie Aerovac utilise une aspiration puissante pour enlever les saletés et les cheveux de la brosse, puis les déposer dans le réservoir.\r\nSa tête de nettoyage avancée fournit de meilleures performances de nettoyage (sur les tapis et sols durs) pour ramasser la saleté, les poussières, les poils d\'animaux, les allergènes...',	1300.00,	19.60,	3600,	27,	'2020-02-04 18:40:00',	NULL),
(19,	'McCulloch',	'Robot tondeuse connecté Rob s500 bluetooth, 500 m²',	'Votre robot tondeuse connecté ROB S est équipé d’un système de coupe adaptant automatiquement ses plages de tonte en fonction de la croissance de l’herbe. Ainsi votre pelouse et votre robot tondeuse ne sont sollicités que lorsque cela est nécessaire.\r\n\r\nVotre robot tondeuse connecté ROB S est équipé d’un système de coupe adaptant automatiquement ses plages de tonte en fonction de la croissance de l’herbe. Ainsi votre pelouse et votre robot tondeuse ne sont sollicités que lorsque cela est nécessaire. ',	650.00,	19.60,	7800,	13,	'2020-02-04 18:42:38',	NULL),
(20,	'Skynet',	'T-800 / T-850 - Model 101',	'Le T-800 est un Cyborg pour Cybernétique micro Organisme. Il a officiellement été créé par l\'ordinateur Skynet en 2029 pour lutter contre la résistance humaine croissante. Sa déclinaison dans le Cyberdyne Systems est série T-800 / T-850. Prototype à l\'origine créé par l’intelligence artificielle militaire Skynet (l\'ordinateur central du réseau de défense des États-Unis, qui crée et contrôle les machines après la guerre nucléaire), il est utilisé en 2029 dans un monde futuriste post-apocalyptique dans les missions d\'infiltration et d\'élimination de la résistance humaine en lutte contre Skynet. ',	100000.00,	19.60,	45000,	1,	'1997-07-04 18:14:39',	NULL),
(21,	'République galactique',	'R2-D2 - Astromecano',	'2-D2 a été en partie inspiré par les robots Huey, Dewey et Louie, du film de Douglas Trumbull, Silent Running (1972), lesquels ressemblent aux gonk droïde qui fonctionnent comme des power droïdes dans les films Star Wars.\r\n\r\nIl s\'exprime par des sifflements et des bips électroniques caractéristiques, qui traduisent ses émotions. Sa voix a été créée par le designer sonore Ben Burtt, à l\'aide d\'un synthétiseur analogique ARP 2600.',	999999.00,	19.60,	20000,	1,	'1977-04-07 18:48:25',	NULL),
(22,	'Interstellar Company',	'Wall-E',	'Robot nettoyeur ',	25000.00,	19.60,	25000,	7,	'2020-02-04 18:51:16',	NULL);

DROP TABLE IF EXISTS `products_has_categories`;
CREATE TABLE `products_has_categories` (
  `products_id` int(10) unsigned NOT NULL,
  `categories_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`products_id`,`categories_id`),
  KEY `fk_products_has_categories_categories1` (`categories_id`),
  CONSTRAINT `fk_products_has_categories_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_categories_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2020-02-05 10:39:52
