-- Database export via SQLPro (https://www.sqlprostudio.com/allapps.html)
-- Exported by dany at 29-06-2020 12:47.
-- WARNING: This file may contain descructive statements such as DROPs.
-- Please ensure that you are running the script at the proper location.


-- BEGIN TABLE EQUIPO
DROP TABLE IF EXISTS EQUIPO;
CREATE TABLE `EQUIPO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(256) DEFAULT NULL,
  `ENTRENADOR` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Inserting 7 rows into EQUIPO
-- Insert batch #1
INSERT INTO EQUIPO (ID, NOMBRE, ENTRENADOR) VALUES
(1, 'Real Madrid', 'Zinedine Zidane'),
(2, 'FC Barcelona', 'Quique Setién'),
(3, 'Juventus de Turín', 'Maurizio Sarri'),
(4, 'Manchester United', ' Ole Gunnar'),
(5, 'Liverpool Football Club', 'Jürgen Klopp'),
(6, 'Bayern München', 'Hans-Dieter Flick'),
(7, 'Jirafas Locas', 'Domingo Quintana');

-- END TABLE EQUIPO

-- BEGIN TABLE JUGADOR
DROP TABLE IF EXISTS JUGADOR;
CREATE TABLE `JUGADOR` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(256) DEFAULT NULL,
  `APELLIDO` varchar(256) DEFAULT NULL,
  `NICKNAME` varchar(256) DEFAULT NULL,
  `IMAGEN` varchar(256) DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `POSICION` varchar(256) DEFAULT NULL,
  `ID_EQUIPO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_EQUIPO` (`ID_EQUIPO`),
  CONSTRAINT `JUGADOR_ibfk_1` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `EQUIPO` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Inserting 30 rows into JUGADOR
-- Insert batch #1
INSERT INTO JUGADOR (ID, NOMBRE, APELLIDO, NICKNAME, IMAGEN, FECHA_NACIMIENTO, POSICION, ID_EQUIPO) VALUES
(1, 'Octavio', 'Torres', 'mulaUDEC', '', '1987-10-12', 'Delantero', 1),
(2, 'Pascual', 'Robledo', 'oRoLATEN', '', '1992-10-03', 'Segundo delantero', 1),
(3, 'Santos', 'Espinosa', 'bRaGniUs', '', '1992-04-17', 'Segundo delantero', 1),
(4, 'Lluis', 'Santana', 'MideCEDI', '', '1992-04-04', 'Segundo delantero', 1),
(5, 'Juan', 'Singh', 'LEventid', '', '1988-09-04', 'Segundo delantero', 1),
(6, 'Iciar', 'Ledesma', 'mulaUDEC', '', '2003-08-12', 'Delantero centro', 2),
(7, 'Mireya', 'Velez', 'oRoLATEN', '', '2003-10-29', 'Defensor lateral', 2),
(8, 'Aquilino', 'Martorell', 'bRaGniUs', '', '2003-05-09', 'Delantero centro', 2),
(9, 'Jenifer', 'Leal', 'MideCEDI', '', '1990-11-04', 'Delantero', 2),
(10, 'Alexander', 'Gomez', 'LEventid', '', '2004-01-08', 'Delantero centro', 2),
(11, 'Tomas', 'Lara', 'mulaUDEC', '', '1982-02-21', 'Segundo delantero', 3),
(12, 'Luciano', 'Cobos', 'oRoLATEN', '', '1982-02-09', 'Defensa central', 3),
(13, 'Najat', 'Romera', 'bRaGniUs', '', '1983-08-17', 'Segundo delantero', 3),
(14, 'Saturnina', 'Herreros', 'MideCEDI', '', '1997-07-17', 'Defensor lateral', 3),
(15, 'Gerard', 'Real', 'LEventid', '', '1985-10-30', 'Delantero', 3),
(16, 'Nekane', 'Benavides', 'mulaUDEC', '', '1990-04-06', 'Portero', 4),
(17, 'German', 'Casal', 'oRoLATEN', '', '1989-12-25', 'Defensor lateral', 4),
(18, 'Anton', 'Caro', 'bRaGniUs', '', '1988-08-23', 'Defensa central', 4),
(19, 'Khadija', 'Godoy', 'MideCEDI', '', '1983-08-12', 'Defensor lateral', 4),
(20, 'Oihane', 'Solano', 'LEventid', '', '1987-11-30', 'Segundo delantero', 4),
(21, 'Kevin', 'Vargas', 'mulaUDEC', '', '1985-06-07', 'Portero', 5),
(22, 'Joaquina', 'Jaen', 'oRoLATEN', '', '2005-09-20', 'Defensor lateral', 5),
(23, 'Rita', 'ViÃ±as', 'bRaGniUs', '', '1988-09-22', 'Defensa central', 5),
(24, 'Teodora', 'Silvestre', 'MideCEDI', '', '2004-09-19', 'Defensa central', 5),
(25, 'Yaiza', 'Bernal', 'LEventid', '', '1985-02-28', 'Delantero centro', 5),
(26, 'Jeronimo', 'Mena', 'mulaUDEC', '', '1985-09-20', 'Portero', 6),
(27, 'Amador', 'Matas', 'oRoLATEN', '', '1985-10-08', 'Defensa central', 6),
(28, 'Erica', 'Sabater', 'bRaGniUs', '', '1986-06-29', 'Delantero', 6),
(29, 'Clotilde', 'Solana', 'MideCEDI', '', '1997-09-23', 'Delantero', 6),
(30, 'Petra', 'Casas', 'LEventid', '', '1982-09-22', 'Delantero', 6);

-- END TABLE JUGADOR

-- BEGIN TABLE NOTICIA
DROP TABLE IF EXISTS NOTICIA;
CREATE TABLE `NOTICIA` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AUTOR` varchar(256) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `TITULO` varchar(256) DEFAULT NULL,
  `CUERPO` text,
  `IMAGEN` varchar(256) DEFAULT NULL,
  `ID_TORNEO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_TORNEO` (`ID_TORNEO`),
  CONSTRAINT `NOTICIA_ibfk_1` FOREIGN KEY (`ID_TORNEO`) REFERENCES `TORNEO` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Inserting 5 rows into NOTICIA
-- Insert batch #1
INSERT INTO NOTICIA (ID, AUTOR, FECHA, TITULO, CUERPO, IMAGEN, ID_TORNEO) VALUES
(1, 'Petra Casas', '2020-07-27', 'Diego MartÃ­nez: Europa es una exigencia para otros equipos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim massa, consectetur ac feugiat nec, ornare vel nisi. Nunc sit amet metus libero. Quisque nec orci a tortor ullamcorper congue. Cras commodo turpis sed felis sagittis, interdum egestas libero cursus. Donec condimentum rutrum tristique. Curabitur pharetra interdum metus, ut rhoncus ipsum dignissim at. Integer dapibus lacinia risus vitae tempor. Vestibulum ultricies nulla non nulla accumsan viverra. Praesent dignissim orci id venenatis vestibulum. Donec a eleifend augue, sed facilisis enim. Maecenas consectetur ipsum in cursus accumsan. Ut vitae auctor magna.', '', 1),
(2, 'Maite Espinoza', '2020-07-27', 'El ValdepeÃ±as hace historia y disputarÃ¡ la final ante el Inter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim massa, consectetur ac feugiat nec, ornare vel nisi. Nunc sit amet metus libero. Quisque nec orci a tortor ullamcorper congue. Cras commodo turpis sed felis sagittis, interdum egestas libero cursus. Donec condimentum rutrum tristique. Curabitur pharetra interdum metus, ut rhoncus ipsum dignissim at. Integer dapibus lacinia risus vitae tempor. Vestibulum ultricies nulla non nulla accumsan viverra. Praesent dignissim orci id venenatis vestibulum. Donec a eleifend augue, sed facilisis enim. Maecenas consectetur ipsum in cursus accumsan. Ut vitae auctor magna.', '', 1),
(3, 'Juliana Ibarra', '2020-07-27', 'AsÃ­ estÃ¡ la lucha por la Bota de Oro: Lewandowski afianza su liderato', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim massa, consectetur ac feugiat nec, ornare vel nisi. Nunc sit amet metus libero. Quisque nec orci a tortor ullamcorper congue. Cras commodo turpis sed felis sagittis, interdum egestas libero cursus. Donec condimentum rutrum tristique. Curabitur pharetra interdum metus, ut rhoncus ipsum dignissim at. Integer dapibus lacinia risus vitae tempor. Vestibulum ultricies nulla non nulla accumsan viverra. Praesent dignissim orci id venenatis vestibulum. Donec a eleifend augue, sed facilisis enim. Maecenas consectetur ipsum in cursus accumsan. Ut vitae auctor magna.', '', 1),
(4, 'Juan Dios Singh', '2020-07-27', 'Las mejores imÃ¡genes del Celta Barcelona', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim massa, consectetur ac feugiat nec, ornare vel nisi. Nunc sit amet metus libero. Quisque nec orci a tortor ullamcorper congue. Cras commodo turpis sed felis sagittis, interdum egestas libero cursus. Donec condimentum rutrum tristique. Curabitur pharetra interdum metus, ut rhoncus ipsum dignissim at. Integer dapibus lacinia risus vitae tempor. Vestibulum ultricies nulla non nulla accumsan viverra. Praesent dignissim orci id venenatis vestibulum. Donec a eleifend augue, sed facilisis enim. Maecenas consectetur ipsum in cursus accumsan. Ut vitae auctor magna.', '', 1),
(5, 'Juan Pedro Postigo', '2020-07-29', 'Unai LÃ³pez agradece la frescura que han dado los cambios', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim massa, consectetur ac feugiat nec, ornare vel nisi. Nunc sit amet metus libero. Quisque nec orci a tortor ullamcorper congue. Cras commodo turpis sed felis sagittis, interdum egestas libero cursus. Donec condimentum rutrum tristique. Curabitur pharetra interdum metus, ut rhoncus ipsum dignissim at. Integer dapibus lacinia risus vitae tempor. Vestibulum ultricies nulla non nulla accumsan viverra. Praesent dignissim orci id venenatis vestibulum. Donec a eleifend augue, sed facilisis enim. Maecenas consectetur ipsum in cursus accumsan. Ut vitae auctor magna.', '', 1);

-- END TABLE NOTICIA

-- BEGIN TABLE PARTICIPA
DROP TABLE IF EXISTS PARTICIPA;
CREATE TABLE `PARTICIPA` (
  `ID_PARTIDO` int(11) DEFAULT NULL,
  `ID_EQUIPO` int(11) DEFAULT NULL,
  `ID_TORNEO` int(11) DEFAULT NULL,
  `VISITANTE` tinyint(1) DEFAULT NULL,
  `CONTRINCANTE` varchar(256) DEFAULT NULL,
  `PUNTOS` int(11) DEFAULT NULL,
  KEY `ID_PARTIDO` (`ID_PARTIDO`),
  KEY `ID_EQUIPO` (`ID_EQUIPO`),
  KEY `ID_TORNEO` (`ID_TORNEO`),
  CONSTRAINT `PARTICIPA_ibfk_1` FOREIGN KEY (`ID_PARTIDO`) REFERENCES `PARTIDO` (`ID`),
  CONSTRAINT `PARTICIPA_ibfk_2` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `EQUIPO` (`ID`),
  CONSTRAINT `PARTICIPA_ibfk_3` FOREIGN KEY (`ID_TORNEO`) REFERENCES `TORNEO` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Inserting 22 rows into PARTICIPA
-- Insert batch #1
INSERT INTO PARTICIPA (ID_PARTIDO, ID_EQUIPO, ID_TORNEO, VISITANTE, CONTRINCANTE, PUNTOS) VALUES
(1, 1, 1, 0, '2', 3),
(1, 2, 1, 1, '1', 0),
(2, 1, 1, 1, '2', 3),
(2, 2, 1, 0, '1', 0),
(3, 3, 1, 0, '4', 3),
(3, 4, 1, 1, '3', 0),
(4, 4, 1, 0, '3', 3),
(4, 3, 1, 1, '4', 0),
(5, 5, 1, 0, '6', 1),
(5, 6, 1, 1, '5', 0),
(6, 6, 1, 0, '5', 1),
(6, 5, 1, 1, '6', 0),
(7, 2, 1, 0, '1', 3),
(7, 1, 1, 1, '2', 0),
(8, 1, 1, 0, '2', 0),
(8, 2, 1, 1, '1', 3),
(9, 2, 1, 0, '6', 3),
(9, 6, 1, 1, '2', 0),
(10, 1, 1, 0, '6', 3),
(10, 6, 1, 1, '1', 0),
(10, 1, 1, 0, '6', 3),
(10, 6, 1, 1, '1', 0);

-- END TABLE PARTICIPA

-- BEGIN TABLE PARTIDO
DROP TABLE IF EXISTS PARTIDO;
CREATE TABLE `PARTIDO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GOLES_LOCAL` int(11) DEFAULT NULL,
  `GOLES_VISITANTE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Inserting 11 rows into PARTIDO
-- Insert batch #1
INSERT INTO PARTIDO (ID, GOLES_LOCAL, GOLES_VISITANTE) VALUES
(1, 3, 1),
(2, 1, 3),
(3, 3, 4),
(4, 5, 4),
(5, 2, 1),
(6, 2, 1),
(7, 3, 1),
(8, 1, 3),
(9, 5, 3),
(10, 2, 1),
(11, 2, 1);

-- END TABLE PARTIDO

-- BEGIN TABLE TORNEO
DROP TABLE IF EXISTS TORNEO;
CREATE TABLE `TORNEO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(256) DEFAULT NULL,
  `FECHA_INICIAL` date DEFAULT NULL,
  `FECHA_FINAL` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Inserting 1 row into TORNEO
-- Insert batch #1
INSERT INTO TORNEO (ID, NOMBRE, FECHA_INICIAL, FECHA_FINAL) VALUES
(1, 'UEFA Champions League', '2020-07-10', '2020-10-10');

-- END TABLE TORNEO

