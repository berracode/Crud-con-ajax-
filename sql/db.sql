DROP DATABASE IF EXISTS crud;
CREATE DATABASE crud;
USE crud;

CREATE TABLE tblproductos (
  productoID int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  productoNOM varchar(100) NOT NULL,
  productoCAN int(11) NOT NULL,
  productoPRE int(11) NOT NULL,
  productoEST int(1) NOT NULL --Guarda valores 0 y/o 1, donde cero es activado lo que implica que se mostrara ese registro. Y 0 descativado--
);








