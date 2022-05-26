drop database monitoring; 
 
create database monitoring;

use monitoring;

/* MASTER DATA */

create table IF NOT EXISTS tb_user ( 
	nik 		varchar (255) not null,
	nama		varchar (255) not null,
	username	varchar (255) not null, 
	password	varchar	(255) not null,
	bagian		varchar (255) not null,
	constraint pk_login primary key (nik) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

create table IF NOT EXISTS tb_namaproduk (
	idproduk 	varchar (255) not null,
	namaproduk 	varchar (255) not null,
	constraint pk_idproduk primary key (idproduk)	
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table IF NOT EXISTS tb_customer ( 
	kdcustomer	 varchar (255) not null,		
	namacustomer varchar (255)not null,
	telepon		 integer (30) not null,
	email		 varchar (255) not null,	
	alamat		 varchar (255) not null,
	constraint pk_kdcustomer primary key (kdcustomer)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 


create table IF NOT EXISTS bahan_baku ( 
	kdbarang	  varchar (255) not null,
	namabarang	  varchar (255)not null,
	stokbahanbaku integer (11) not null,
	constraint pk_kdbarang primary key (kdbarang)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table IF NOT EXISTS produkdetail (
	idproduk 	varchar (255) not null,
	kdbarang	  varchar (255) not null,
	constraint fk_idpro foreign key (idproduk)
		references tb_namaproduk (idproduk)
			on delete cascade
			on update cascade,
	constraint fk_kdbarng foreign key (kdbarang)
		references bahan_baku (kdbarang)
			on delete cascade
			on update cascade

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table IF NOT EXISTS tb_datapesan (
	
	nopo 			varchar (255) not null,
	tglorder		date,
	kdcustomer 		varchar (255) not null,
	idproduk 		varchar (255) not null,	
	jumlahproduk	integer	(11) not null,	
	proses			varchar (18) not null,	
	constraint pk_datapesan primary key (nopo),		
	constraint fk_kdcustomer foreign key (kdcustomer)
		references tb_customer (kdcustomer)
			on delete cascade
			on update cascade,
	constraint fk_idproduk foreign key (idproduk)
		references tb_namaproduk (idproduk)
			on delete cascade
			on update cascade
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table IF NOT EXISTS produksi (
	noproduksi			varchar (255)not null,
	nopo				varchar (255)not null,
	idproduk			varchar (255)not null,
	jumlahproduksi		integer (11)not null,	
	statusprod 			varchar (255)NOT NULL,
	tglmulaiproduksi	varchar (255),
	tglselesaiproduksi	date,
	tgldateline			varchar (255),
	constraint pk_produksi primary key (noproduksi),
	constraint fk_nopur foreign key (nopo)
		references tb_datapesan (nopo)
			on delete cascade
			on update cascade,
	constraint fk_idproduks foreign key (idproduk)
		references tb_namaproduk (idproduk)
			on delete cascade
			on update cascade
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table IF NOT EXISTS produksi_dt (
	noproduksi			varchar (255)not null,
	kdbarang			varchar (255)not null,
	jumlahproduksi		integer (11)not null,	
	constraint pk_produksi primary key (noproduksi),
	constraint fk_nopro foreign key (noproduksi)
		references produksi (noproduksi)
			on delete cascade
			on update cascade,
	constraint fk_kdbrg foreign key (kdbarang)
		references produkdetail (kdbarang)
			on delete cascade
			on update cascade
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS barang_masuk (
  id_masuk  	integer (11) NOT NULL auto_increment,
  tglmasuk		date,
  kdbarang 		varchar(255) NOT NULL,
  jml_masuk 	int(11) NOT NULL,
  constraint pk_idmasuk primary key (id_masuk),
  constraint fk_kdbarang foreign key (kdbarang)
		references bahan_baku (kdbarang)
			on delete cascade
			on update cascade
  
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

/*
CREATE TABLE IF NOT EXISTS barang_keluar (
  id_keluar  	integer(16) NOT NULL auto_increment,
  noproduksi	varchar (255)not null,
  kdbarang   	varchar(16) NOT NULL,
  jml_keluar	integer(11)not null,
  constraint pk_idkeluar primary key (id_keluar),
   constraint fk_kdbg foreign key (kdbarang)
		references bahan_baku (kdbarang)
			on delete cascade
			on update cascade,
  constraint fk_noproduksi foreign key (noproduksi)
		references produksi (noproduksi)
			on delete cascade
			on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




create table IF NOT EXISTS stokmodemjadi ( 
	kdmodem				varchar (255) not null,	
	tglterima			date,
	noproduksi			varchar (255)not null,

	constraint pk_kdmodem primary key (kdmodem),
	constraint fk_noprodks foreign key (noproduksi)
		references produksi (noproduksi)
			on delete cascade
			on update cascade	
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table IF NOT EXISTS pengiriman ( 
	kdpengiriman		varchar (255) not null,	
	nopo 		integer (30)not null,
	tglterimaBJ			varchar (255)not null,
	kdcustomer		date,
	constraint pk_kdmodem primary key (kdpengiriman),
	
	constraint fk_noprod foreign key (noproduksi)
		references produksi (noproduksi)
			on delete cascade
			on update cascade,
	constraint fk_dtord foreign key (nodataorder)
		references tb_datapesan (nodataorder)
			on delete cascade
			on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/


-- Triggers `barang_masuk`
DELIMITER $$
CREATE TRIGGER `barangmasuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_baku SET stokbahanbaku=stokbahanbaku+NEW.jml_masuk
    WHERE kdbarang = NEW.kdbarang; 
END
$$
DELIMITER ;

/*
-- Triggers `barang_keluar`
DELIMITER $$
CREATE TRIGGER `barangkeluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE bahan_baku SET stokbahanbaku=stokbahanbaku-NEW.jumlahproduksi
    WHERE kdbarang = NEW.jumlahproduksi;
    
END
$$
DELIMITER ;

---------------------------------------------------------------------------------------------------------------



CREATE TABLE `barang_keluar` (
  `id_keluar` int(16) NOT NULL,
  `noproduksi` varchar(255) NOT NULL,
  `kdbarang` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
