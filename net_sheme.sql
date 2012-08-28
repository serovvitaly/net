-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 5.0.97.1
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 28.08.2012 10:51:55
-- Версия сервера: 5.1.63-community-log
-- Версия клиента: 4.1

USE net;

CREATE TABLE good_cat(
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 11
AVG_ROW_LENGTH = 1638
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE good_items(
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  articul VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 2048
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE good_prices_rules (,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE good_prices(
  good_id INT(11) NOT NULL,
  rule_id INT(11) NOT NULL,
  price DOUBLE NOT NULL,
  UNIQUE INDEX UK_good_prices (good_id, rule_id),
  CONSTRAINT FK_good_prices_good_items_id FOREIGN KEY (good_id)
  REFERENCES good_items (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_good_prices_good_prices_rules_id FOREIGN KEY (rule_id)
  REFERENCES good_prices_rules (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 546
CHARACTER SET utf8
COLLATE utf8_general_ci;