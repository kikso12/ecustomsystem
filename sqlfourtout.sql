CREATE TABLE dossiers (
    id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    numdoss varchar(250) NOT NULL COMMENT 'Nom',
    client_id int(11) NOT NULL COMMENT 'Client ID',
	  date_ouverture date NOT NULL COMMENT 'Date ouverture',
	  taux_douane int(11) NOT NULL COMMENT 'Taux de douane',
    position_tarif  varchar(255) NOT NULL COMMENT 'Position tarifaire',
	  msavion  varchar(255) NOT NULL COMMENT 'MS AVION',
    bl_lta  varchar(255) NOT NULL COMMENT 'BL ou LTA',
    numero_container  varchar(255) NOT NULL COMMENT 'numero container',
    type_container  varchar(255) NOT NULL COMMENT 'Type de container',
    nombre_colis  int(11) NOT NULL ,
    poids_brut  decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT 'poids brute',
    nature_marchandises  varchar(250) NOT NULL COMMENT 'Nature Marchandise',
    fob  decimal(18,2) NOT NULL DEFAULT '0.00'  COMMENT 'fob',
    freight  decimal(18,2) NOT NULL DEFAULT '0.00'  COMMENT 'freight',
    assurances  decimal(18,2) NOT NULL DEFAULT '0.00'  COMMENT 'assurance',
    numero_e varchar(250) NOT NULL COMMENT 'numéro declaration',
    numero_l varchar(250) NOT NULL COMMENT 'numéro liquidation',
    numero_q varchar(300) NOT NULL COMMENT 'numéro quittace',
    statut varchar(250) NOT NULL COMMENT 'nif',
    PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable dossiers' AUTO_INCREMENT=1;

  



INSERT INTO `dossiers` 
(`id`, `numdoss`, `client_id`, `date_ouverture`, `taux_douane`, `position_tarif`, `msavion`, `bl_lta`, `numero_container`,  `type_container`,  `nombre_colis`, `poids_brut`, `nature_marchandises`, `fob`, `freight`, `assurances`, `numero_e`, `numero_l`, `numero_q`, `statut`) VALUES
(1, '670/21', 1, DATE('25/07/2021'),10, 'test','test', 'TA1210061', 'NIDU 22728/2','test type', '135', '6921.00', 'Produits alimentaires', '24229.37', '8000.00', '19.38', 'E8552', 'L8522', 'Q5365', 'attente validation'),
(2, '673/21', 2, DATE('26/07/2021'),10, 'test', 'test', 'TA12105561', 'POSU 22728/2','type 2', '200', '6927.00', 'Produits alimentaires', '52888.37', '15000.00', '200.38', 'E8782', 'L8442', 'Q5377', 'en traitement');