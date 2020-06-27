/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     27/06/2020 4:50:15 CH                        */
/*==============================================================*/


-- Tạo CSDL

-- TÊN: webbanhang
-- MÃ UNICODE: utf8_vietnamese-ci

/*==============================================================*/
/* Table: CPU                                                   */
/*==============================================================*/
create table CPU
(
   MA_CPU               int not null AUTO_INCREMENT,
   TEN_CPU              varchar(100),
   primary key (MA_CPU)
);

/*==============================================================*/
/* Table: CTHD                                                  */
/*==============================================================*/
create table CTHD
(
   MA_HD                int not null,
   MA_SP                int not null,
   SO_LUONG             int,
   TONG_TIEN            bigint,
   primary key (MA_HD, MA_SP)
);

/*==============================================================*/
/* Table: HANG_SX                                               */
/*==============================================================*/
create table HANG_SX
(
   MA_HANG             int not null  AUTO_INCREMENT,
   TEN_HANG             varchar(100),
   primary key (MA_HANG)
);

/*==============================================================*/
/* Table: HOA_DON                                               */
/*==============================================================*/
create table HOA_DON
(
   MA_HD                int not null AUTO_INCREMENT,
   MA_ND                int not null,
   NGAY_DAT_HANG        datetime,
   TONG_TIEN            bigint,
   primary key (MA_HD)
);

/*==============================================================*/
/* Table: MAN_HINH                                              */
/*==============================================================*/
create table MAN_HINH
(
   MA_MH                int not null AUTO_INCREMENT,
   KICH_THUOC           varchar(100),
   DO_PHAN_GIAI         varchar(100),
   primary key (MA_MH)
);

/*==============================================================*/
/* Table: NGUOI_DUNG                                            */
/*==============================================================*/
create table NGUOI_DUNG
(
   MA_ND                int not null AUTO_INCREMENT,
   TEN_ND               varchar(100),
   NGAY_SINH            date,
   SDT                  varchar(20),
   DIA_CHI              varchar(100),
   LOAI_ND              int,
   TEN_DANG_NHAP        varchar(100),
   MAT_KHAU             varchar(100),
   primary key (MA_ND)
);

/*==============================================================*/
/* Table: O_CUNG                                                */
/*==============================================================*/
create table O_CUNG
(
   MA_OC                int not null AUTO_INCREMENT,
   LOAI_OC              int,
   DUNG_LUONG           int,
   primary key (MA_OC)
);

/*==============================================================*/
/* Table: RAM                                                   */
/*==============================================================*/
create table RAM
(
   MA_RAM               int not null AUTO_INCREMENT,
   BO_NHO               int,
   primary key (MA_RAM)
);

/*==============================================================*/
/* Table: SAN_PHAM                                              */
/*==============================================================*/
create table SAN_PHAM
(
   MA_SP                int not null AUTO_INCREMENT,
   MA_CPU               int not null,
   MA_RAM               int not null,
   MA_OC                int not null,
   MA_MH                int not null,
   MA_HANG              int not null,
   TEN_SP               varchar(100),
   GIA_TIEN             numeric(15,0),
   TRANG_THAI           int,
   SRC_IMG              varchar(100),
   primary key (MA_SP)
);

alter table CTHD add constraint FK_CTHD_HD foreign key (MA_HD)
      references HOA_DON (MA_HD) on delete restrict on update restrict;

alter table CTHD add constraint FK_CTHD_SP foreign key (MA_SP)
      references SAN_PHAM (MA_SP) on delete restrict on update restrict;

alter table HOA_DON add constraint FK_CO_HD foreign key (MA_ND)
      references NGUOI_DUNG (MA_ND) on delete restrict on update restrict;

alter table SAN_PHAM add constraint FK_CO_CPU foreign key (MA_CPU)
      references CPU (MA_CPU) on delete restrict on update restrict;

alter table SAN_PHAM add constraint FK_CO_HANG foreign key (MA_HANG)
      references HANG_SX (MA_HANG) on delete restrict on update restrict;

alter table SAN_PHAM add constraint FK_CO_MH foreign key (MA_MH)
      references MAN_HINH (MA_MH) on delete restrict on update restrict;

alter table SAN_PHAM add constraint FK_CO_OC foreign key (MA_OC)
      references O_CUNG (MA_OC) on delete restrict on update restrict;

alter table SAN_PHAM add constraint FK_CO_RAM foreign key (MA_RAM)
      references RAM (MA_RAM) on delete restrict on update restrict;



/*==============================================================*/
/* TRIGGER: BEFORE DELETE                                          */
/*==============================================================*/

--XÓA HÓA ĐƠN TRƯỚC KHI XÓA NGƯỜI DÙNG

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_NGUOI_DUNG`
BEFORE DELETE ON `nhan_vien` FOR EACH ROW
BEGIN
	DELETE FROM hoa_don WHERE hoa_don.ID_NHAN_VIEN = OLD.ID_NHAN_VIEN;
END
$$
DELIMITER ;


--XÓA CHI TIẾT HÓA ĐƠN TRƯỚC KHI XÓA HÓA ĐƠN

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_HOA_DON`
BEFORE DELETE ON `HOA_DON` FOR EACH ROW
BEGIN
	DELETE FROM CTHD WHERE CTHD.MA_HD = OLD.MA_HD;
END
$$
DELIMITER ;


--XÓA CHI TIẾT HÓA ĐƠN TRƯỚC KHI XÓA SẢN PHẨM

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_SAN_PHAM`
BEFORE DELETE ON `SAN_PHAM` FOR EACH ROW
BEGIN
	DELETE FROM CTHD WHERE CTHD.MA_SP = OLD.MA_SP;
END
$$
DELIMITER ;


-- XÓA SẢN PHẨM TRƯỚC KHI XÓA HÃNG SX

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_HANG_SX`
BEFORE DELETE ON `HANG_SX` FOR EACH ROW
BEGIN
	DELETE FROM SAN_PHAM WHERE SAN_PHAM.MA_HANG = OLD.MA_HANG;
END
$$
DELIMITER ;



-- XÓA SẢN PHẨM TRƯỚC KHI XÓA CPU

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_CPU`
BEFORE DELETE ON `CPU` FOR EACH ROW
BEGIN
	DELETE FROM SAN_PHAM WHERE SAN_PHAM.MA_CPU = OLD.MA_CPU;
END
$$
DELIMITER ;


-- XÓA SẢN PHẨM TRƯỚC KHI XÓA RAM

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_RAM`
BEFORE DELETE ON `RAM` FOR EACH ROW
BEGIN
	DELETE FROM SAN_PHAM WHERE SAN_PHAM.MA_RAM = OLD.MA_RAM;
END
$$
DELIMITER ;

-- XÓA SẢN PHẨM TRƯỚC KHI XÓA MÀN HÌNH

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_MAN_HINH`
BEFORE DELETE ON `MAN_HINH` FOR EACH ROW
BEGIN
	DELETE FROM SAN_PHAM WHERE SAN_PHAM.MA_MH = OLD.MA_MH;
END
$$
DELIMITER ;

-- XÓA SẢN PHẨM TRƯỚC KHI XÓA Ổ CỨNG

DELIMITER $$
CREATE TRIGGER `BEFORE_DELETE_O_CUNG`
BEFORE DELETE ON `O_CUNG` FOR EACH ROW
BEGIN
	DELETE FROM SAN_PHAM WHERE SAN_PHAM.MA_OC= OLD.MA_OC;
END
$$
DELIMITER ;