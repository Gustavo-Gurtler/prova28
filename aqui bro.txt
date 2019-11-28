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
CREATE DATABASE IF NOT EXISTS `patio_detran` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `patio_detran`;

-- Copiando estrutura para tabela patio_detran.tipo_veiculo
CREATE TABLE IF NOT EXISTS `tipo_veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela patio_detran.tipo_veiculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_veiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_veiculo` ENABLE KEYS */;

-- Copiando estrutura para tabela patio_detran.veiculo_patio
CREATE TABLE IF NOT EXISTS `veiculo_patio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(20) NOT NULL,
  `marca_veiculo` varchar(45) NOT NULL,
  `modelo_veiculo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela patio_detran.veiculo_patio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculo_patio` DISABLE KEYS */;
/*!40000 ALTER TABLE `veiculo_patio` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
