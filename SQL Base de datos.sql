CREATE TABLE Usuarios (
  Id_Usuario INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Usuario VARCHAR(45)  NOT NULL  ,
  Clave VARCHAR(45)  NOT NULL    ,
PRIMARY KEY(Id_Usuario));



CREATE TABLE Login (
  Id_Login INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Id_Usuario INTEGER UNSIGNED  NOT NULL  ,
  Usuario VARCHAR(30)  NULL  ,
  Contraseņa VARCHAR(30)  NULL    ,
PRIMARY KEY(Id_Login),
  FOREIGN KEY(Id_Usuario)
    REFERENCES Usuarios(Id_Usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE Roles (
  idRoles INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Usuarios_Id_Usuario INTEGER UNSIGNED  NOT NULL  ,
  NombreRol VARCHAR(45)  NULL    ,
PRIMARY KEY(idRoles),
  FOREIGN KEY(Usuarios_Id_Usuario)
    REFERENCES Usuarios(Id_Usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE Innovacion (
  Id_Innovacion INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Id_Usuario INTEGER UNSIGNED  NOT NULL  ,
  NombreObjetivo VARCHAR(45)  NOT NULL  ,
  Indicador INTEGER UNSIGNED  NULL  ,
  Meta INTEGER UNSIGNED  NULL  ,
  Iniciativa INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(Id_Innovacion),
  FOREIGN KEY(Id_Usuario)
    REFERENCES Usuarios(Id_Usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE Cliente (
  Id_Cliente INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Id_Usuario INTEGER UNSIGNED  NOT NULL  ,
  NombreObjetivo VARCHAR(45)  NOT NULL  ,
  Indicador INTEGER UNSIGNED  NULL  ,
  Meta INTEGER UNSIGNED  NULL  ,
  Iniciativa INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(Id_Cliente),
  FOREIGN KEY(Id_Usuario)
    REFERENCES Usuarios(Id_Usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE Financiera (
  Id_Financiera INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Id_Usuario INTEGER UNSIGNED  NOT NULL  ,
  NombreObjetivo VARCHAR(45)  NOT NULL  ,
  Indicador INTEGER UNSIGNED  NULL  ,
  Meta INTEGER UNSIGNED  NULL  ,
  Iniciativa INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(Id_Financiera),
  FOREIGN KEY(Id_Usuario)
    REFERENCES Usuarios(Id_Usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE GestionHumana (
  ID_GestionHumana INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Id_Usuario INTEGER UNSIGNED  NOT NULL  ,
  NombreObjetivo VARCHAR(45)  NOT NULL  ,
  Indicador INTEGER UNSIGNED  NULL  ,
  Meta INTEGER UNSIGNED  NULL  ,
  Iniciativa INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(ID_GestionHumana),
  FOREIGN KEY(Id_Usuario)
    REFERENCES Usuarios(Id_Usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);




