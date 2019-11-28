-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para patio_detran
DROP DATABASE IF EXISTS `patio_detran`;
CREATE DATABASE IF NOT EXISTS `patio_detran` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `patio_detran`;

-- Copiando estrutura para tabela patio_detran.tipo_veiculo
DROP TABLE IF EXISTS `tipo_veiculo`;
CREATE TABLE IF NOT EXISTS `tipo_veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela patio_detran.tipo_veiculo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_veiculo` DISABLE KEYS */;
INSERT INTO `tipo_veiculo` (`id`, `tipo`) VALUES
	(1, 'Carro'),
	(2, 'Pico');
/*!40000 ALTER TABLE `tipo_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela patio_detran.veiculo_patio
DROP TABLE IF EXISTS `veiculo_patio`;
CREATE TABLE IF NOT EXISTS `veiculo_patio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(20) NOT NULL,
  `marca_veiculo` varchar(45) NOT NULL,
  `modelo_veiculo` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipoFKveiculo_patio` (`tipo`),
  CONSTRAINT `tipoFKveiculo_patio` FOREIGN KEY (`tipo`) REFERENCES `tipo_veiculo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela patio_detran.veiculo_patio: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculo_patio` DISABLE KEYS */;
INSERT INTO `veiculo_patio` (`id`, `placa`, `marca_veiculo`, `modelo_veiculo`, `tipo`) VALUES
	(1, 'mkj6453', 'Daihatsu', 'chana', 1),
	(2, 'ksda223', 'Subaru', 'Impreza', 2),
	(3, 'dasd73123', 'Corolla', 'Corvette', 1);
/*!40000 ALTER TABLE `veiculo_patio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
