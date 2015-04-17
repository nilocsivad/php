
mysql> create user php_ci@127.0.0.1 identified by 'php_ci';
Query OK, 0 rows affected (0.00 sec)

mysql> create user php_ci@'%' identified by 'php_ci';
Query OK, 0 rows affected (0.00 sec)

mysql> create user php_ci@localhost identified by 'php_ci';
Query OK, 0 rows affected (0.00 sec)

mysql> flush privileges;
Query OK, 0 rows affected (0.00 sec)



mysql> revoke all privileges , grant option from php_ci;
Query OK, 0 rows affected (0.00 sec)

mysql> flush privileges;
Query OK, 0 rows affected (0.00 sec)



mysql> create database db_full character set utf8;
Query OK, 1 row affected (0.00 sec)

mysql> use db_full;
Database changed






/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/15/2015 11:10:12 PM                        */
/*==============================================================*/


drop table if exists tbl_Account;

drop table if exists tbl_DoubleColorBall;

drop table if exists tbl_Sys_Items;

drop table if exists tbl_WebSite;

drop table if exists tbl_WebSiteType;

/*==============================================================*/
/* Table: tbl_Account                                           */
/*==============================================================*/
create table tbl_Account
(
   lname                varchar(64) not null,
   lpass                char(32) not null comment 'MD5ŒÓÃÜŽæŽ¢',
   status               int(2) default 3 comment '0:Normal  1:Disabled  2:Deleted  3:Invalid',
   last_time			char(10),
   primary key (lname)
);

/*==============================================================*/
/* Table: tbl_DoubleColorBall                                   */
/*==============================================================*/
create table tbl_DoubleColorBall
(
   date                 char(10) not null,
   type                 char(1) not null comment '0: ÖÐœ±;  1: Random;  2: Bought',
   blue                 char(2) not null,
   redA                 char(2),
   redB                 char(2),
   redC                 char(2),
   redD                 char(2),
   redE                 char(2),
   redF                 char(2),
   bang                 char(1) comment '0: ÎŽÖÐœ±;  1: ÖÐœ±',
   primary key (date, type, blue)
);

/*==============================================================*/
/* Table: tbl_Sys_Items                                           */
/*==============================================================*/
create table tbl_Sys_Items
(
   itemID               int not null auto_increment,
   title                text,
   href			        text,
   number               int(2),
   sign               	int(2),
   primary key (itemID)
);

/*==============================================================*/
/* Table: tbl_WebSite                                           */
/*==============================================================*/
create table tbl_WebSite
(
   websiteID            int not null auto_increment,
   url                  text,
   description          text,
   primary key (websiteID)
);

/*==============================================================*/
/* Table: tbl_WebSiteType                                       */
/*==============================================================*/
create table tbl_WebSiteType
(
   typeID               int not null auto_increment,
   description          text,
   parentID             int default 0,
   primary key (typeID)
);






mysql> grant insert, delete, update, select on db_full.* to php_ci;
Query OK, 0 rows affected (0.00 sec)

mysql> flush privileges;
Query OK, 0 rows affected (0.00 sec)

