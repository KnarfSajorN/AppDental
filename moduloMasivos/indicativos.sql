-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-01-2023 a las 10:14:11
-- Versión del servidor: 10.3.32-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicaso_ms_ec767`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicativos`
--

DROP TABLE IF EXISTS `indicativos`;
CREATE TABLE `indicativos` (
  `nombre` varchar(200) CHARACTER SET utf8 DEFAULT '',
  `numero` varchar(30) DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `indicativos`
--

INSERT INTO `indicativos` (`nombre`, `numero`, `id`) VALUES
('Albania', '355', 1),
('Argelia', '213', 2),
('Samoa Americana', '1 684', 3),
('Andorra', '376', 4),
('Angola', '244', 5),
('Anguila', '1 264', 6),
('Antigua y Barbuda', '1 268', 7),
('Argentina', '54', 8),
('Armenia', '374', 9),
('Aruba', '297', 10),
('Australia', '61', 11),
('Territorio australiano', '672', 12),
('Austria', '43', 13),
('Bahamas', '1 242', 14),
('Bahrain', '973', 15),
('Bangladesh', '880', 16),
('Barbados', '1 246', 17),
('Belarus', '375', 18),
('Belice', '501', 19),
('Bermuda', '1 441', 20),
('Bolivia', '591', 21),
('Bosnia/Herzegovina', '387', 22),
('Botsuana', '267', 23),
('Brasil', '55', 24),
('Bulgaria', '359', 25),
('Burkina Faso', '226', 26),
('Burundi', '257', 27),
('Camboya', '855', 28),
('Islas de Cabo Verde', '238', 29),
('Chad', '235', 30),
('Chile', '56', 31),
('China', '86', 32),
('Colombia', '57', 33),
('Comoras', '269', 34),
('Islas Cook', '682', 35),
('Costa Rica', '506', 36),
('Croacia', '385', 37),
('Cuba', '53', 38),
('Chipre', '357', 39),
('Dinamarca', '45', 40),
('Yibuti', '253', 41),
('Dominica', '1 767', 42),
('Ecuador', '593', 43),
('Egipto', '20', 44),
('El Salvador', '503', 45),
('Guinea Ecuatorial', '240', 46),
('Eritrea', '291', 47),
('Estonia', '372', 48),
('Islas Malvinas', '500', 49),
('Islas Feroe', '298', 50),
('Fiyi', '679', 51),
('Finlandia', '358', 52),
('Francia', '33', 53),
('Guyana Francesa', '594', 54),
('Gambia', '220', 55),
('Georgia', '995', 56),
('Alemania', '49', 57),
('Ghana', '233', 58),
('Gibraltar', '350', 59),
('Grecia', '30', 60),
('Groenlandia', '299', 61),
('Granada', '1 473', 62),
('Guadalupe (Antillas Francesas)', '590', 63),
('Guatemala', '502', 64),
('Guernsey', '44', 65),
('Guinea', '224', 66),
('Guyana', '592', 67),
('Honduras', '504', 68),
('Hong Kong', '852', 69),
('Islandia', '354', 70),
('India', '91', 71),
('Indonesia', '62', 72),
('Iraq', '964', 73),
('Irlanda', '353', 74),
('Isla de Man', '44', 75),
('Israel', '972', 76),
('Italia', '39', 77),
('Costa de Marfil', '225', 78),
('Jamaica', '1 876', 79),
('Jersey', '44', 80),
('Jordania', '962', 81),
('Kenia', '254', 82),
('Kiribati', '686', 83),
('Corea (Norte)', '850', 84),
('Corea (Sur)', '82', 85),
('Kuwait', '965', 86),
('Laos', '856', 87),
('Letonia', '371', 88),
('Lesoto', '266', 89),
('Liberia', '231', 90),
('Libia', '218', 91),
('Liechtenstein', '423', 92),
('Lituania', '370', 93),
('Luxemburgo', '352', 94),
('Macau', '853', 95),
('Macedonia', '389', 96),
('Madagascar', '261', 97),
('Malaui', '265', 98),
('Malasia', '60', 99),
('Maldivas', '960', 100),
('Malta', '356', 101),
('Islas Marshall', '692', 102),
('Martinica', '596', 103),
('Mauritania', '222', 104),
('Islas Mauricio', '230', 105),
('Micronesia', '691', 106),
('Moldova', '373', 107),
('Mongolia', '976', 108),
('Montenegro', '382', 109),
('Montserrat', '1 664', 110),
('Marruecos', '212', 111),
('Mozambique', '258', 112),
('Myanmar (Birmania)', '95', 113),
('Namibia', '264', 114),
('Nauru', '674', 115),
('Nepal', '977', 116),
('Holanda', '31', 117),
('Antillas Neerlandesas (Bonaire, Curacao, Saba, St. Eustis)', '599', 118),
('Nueva Caledonia', '687', 119),
('Nueva Zelanda', '64', 120),
('Nicaragua', '505', 121),
('Nigeria', '234', 122),
('Islas Marianas del Norte', '1 670', 123),
('Noruega', '47', 124),
('Palaos', '680', 125),
('Autoridad Palestina', '970', 126),
('Paraguay', '595', 127),
('Filipinas', '63', 128),
('Polonia', '48', 129),
('Portugal', '351', 130),
('Qatar', '974', 131),
('Rumania', '40', 132),
('Rusia', '7', 133),
('Ruanda', '250', 134),
('Samoa', '685', 135),
('San Marino', '378', 136),
('Arabia Saudita', '966', 137),
('Senegal', '221', 138),
('Serbia', '381', 139),
('Seychelles', '248', 140),
('Sierra Leona', '232', 141),
('Singapur', '65', 142),
('Eslovaquia', '421', 143),
('Eslovenia', '386', 144),
('Sri Lanka', '94', 145),
('San Vicente/Granadinas', '1 784', 146),
('Suriname', '597', 147),
('Suazilandia', '268', 148),
('Suecia', '46', 149),
('Suiza', '41', 150),
('Siria', '963', 151),
('Tanzania', '255', 152),
('Tailandia', '66', 153),
('Togo', '228', 154),
('Tokelau', '690', 155),
('Tonga', '676', 156),
('Trinidad y Tobago', '1 868', 157),
('Islas Turcas y Caicos', '1 649', 158),
('Tuvalu', '688', 159),
('Uganda', '256', 160),
('Ucrania', '380', 161),
('Reino Unido', '44', 162),
('Uruguay', '598', 163),
('Vanuatu', '678', 164),
('Venezuela', '58', 165),
('Vietnam', '84', 166),
('Yemen', '967', 167),
('Zambia', '260', 168),
('Zimbabue', '263', 169),
('Republica Dominicana', '1 849', 170),
('Republica Dominicana', '1 829', 171),
('Peru', '51', 172),
('México', '52', 173),
('Panama', '507', 174);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `indicativos`
--
ALTER TABLE `indicativos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `indicativos`
--
ALTER TABLE `indicativos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
