CREATE DATABASE bartender CHARACTER SET 'utf8';
USE bartender;

CREATE table products (
  id SERIAL PRIMARY KEY,
  product_name VARCHAR (255) NOT NULL,
  create_date DATETIME NOT NULL
)ENGINE = MyISAM;

CREATE TABLE attributes (
  id SERIAL PRIMARY KEY,
  attribute_name VARCHAR (255) NOT NULL,
  attribute_key VARCHAR(255) NOT NULL ,
  required TINYINT NOT NULL ,
  active TINYINT NOT NULL ,
  create_date DATETIME NOT NULL
)ENGINE = MyISAM;

CREATE TABLE user_config (
id SERIAL PRIMARY KEY,
config_key VARCHAR (255) NOT NULL,
config_value VARCHAR (255) NOT NULL
)ENGINE=MyISAM;

CREATE UNIQUE INDEX config_key ON user_config (config_key);

INSERT INTO `bartender`.`modules` (`module_key`, `module_name`) VALUES ('language', 'rus');

CREATE TABLE modules (
id SERIAL PRIMARY KEY,
module_key VARCHAR (255) NOT NULL,
module_name VARCHAR (255) NOT NULL,
icon VARCHAR (100) NOT NULL ,
icon_color VARCHAR(50) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE modules_user_groups_relations (
  module_id BIGINT UNSIGNED NOT NULL,
  user_group_id BIGINT UNSIGNED NOT NULL,
  x_position TINYINT NOT NULL,
  y_position TINYINT NOT NULL
)ENGINE=MyISAM;

CREATE UNIQUE INDEX user_group_module_key ON modules_user_groups_relations (module_id, user_group_id);

CREATE TABLE locale (
  id SERIAL PRIMARY KEY,
  locale_table VARCHAR(50) NOT NULL ,
  locale_language VARCHAR(10) NOT NULL ,
  locale_key VARCHAR(255) NOT NULL ,
  locale_value VARCHAR(255) NOT NULL
)ENGINE=MyISAM;

CREATE UNIQUE INDEX locale_key ON locale (locale_table, locale_language, locale_key);

INSERT INTO `bartender`.`modules` (`id`, `module_key`, `module_name`, `icon`, `icon_color`) VALUES ('1', 'warehouse', 'Warehouse', 'fa-exchange', 'st-red');
INSERT INTO `bartender`.`modules` (`id`, `module_key`, `module_name`, `icon`, `icon_color`) VALUES ('2', 'menu', 'Menu', 'fa fa-calendar-o', 'st-violet');
INSERT INTO `bartender`.`modules` (`id`, `module_key`, `module_name`, `icon`, `icon_color`) VALUES ('3', 'stuff', 'Stuff', 'fa fa-user', 'sm-st-info');
INSERT INTO `bartender`.`modules` (`id`, `module_key`, `module_name`, `icon`, `icon_color`) VALUES ('4', 'helper', 'Helper', 'fa fa-th', 'st-yellow');
INSERT INTO `bartender`.`modules` (`id`, `module_key`, `module_name`, `icon`, `icon_color`) VALUES ('5', 'media', 'Media', 'fa fa-music', 'st-green');
INSERT INTO `bartender`.`modules` (`id`, `module_key`, `module_name`, `icon`, `icon_color`) VALUES ('6', 'finance', 'Finance', 'fa fa-bar-chart-o', 'st-grey');

INSERT INTO `bartender`.`locale` (`locale_table`, `locale_language`, `locale_key`, `locale_value`) VALUES ('modules', 'rus', 'Warehouse', 'Склад');
INSERT INTO `bartender`.`locale` (`locale_table`, `locale_language`, `locale_key`, `locale_value`) VALUES ('modules', 'rus', 'Stuff', 'Персонал');
INSERT INTO `bartender`.`locale` (`locale_table`, `locale_language`, `locale_key`, `locale_value`) VALUES ('modules', 'rus', 'Menu', 'Меню');
INSERT INTO `bartender`.`locale` (`locale_table`, `locale_language`, `locale_key`, `locale_value`) VALUES ('modules', 'rus', 'Helper', 'Помощник');
INSERT INTO `bartender`.`locale` (`locale_table`, `locale_language`, `locale_key`, `locale_value`) VALUES ('modules', 'rus', 'Media', 'Медиа');
INSERT INTO `bartender`.`locale` (`locale_table`, `locale_language`, `locale_key`, `locale_value`) VALUES ('modules', 'rus', 'Finance', 'Финансы');
