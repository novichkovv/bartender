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
id SERIAL NOT NULL,
config_key VARCHAR (255) NOT NULL,
config_value VARCHAR (255) NOT NULL
)ENGINE=MyISAM;

CREATE UNIQUE INDEX config_key ON user_config (config_key);
