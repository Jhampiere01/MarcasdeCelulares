CREATE DATABASE BASE_CELULARES_2;
USE BASE_CELULARES_2;
CREATE TABLE Administradores (
  Id_admin INT PRIMARY KEY,
  Usuario VARCHAR(45),
  Contraseña VARCHAR(45),
  Administradores VARCHAR(45)
);

CREATE TABLE Registro_InicioSesion (
  Id_registro_iniciosesion INT PRIMARY KEY,
  Registro VARCHAR(45),
  InicioSesion VARCHAR(45),
  Usuarios_Id_no_registrados INT
);

CREATE TABLE Usuarios (
  Id_no_registrados INT PRIMARY KEY,
  Usuario VARCHAR(45),
  Imagen VARCHAR(45),
  Correo VARCHAR(45),
  Contraseña VARCHAR(45)
);

CREATE TABLE Formulario (
  Id_formulario INT PRIMARY KEY,
  Registros VARCHAR(45),
  Administradores_Id_admin INT,
  FOREIGN KEY (Administradores_Id_admin) REFERENCES Administradores(Id_admin)
);

CREATE TABLE Modelos (
  Id_modelos INT PRIMARY KEY,
  Marca VARCHAR(45),
  Modelo VARCHAR(45),
  Imagen VARCHAR(45),
  Lanzamiento VARCHAR(45),
  Pantalla VARCHAR(45),
  Camara VARCHAR(45),
  Procesador VARCHAR(45),
  Memoria VARCHAR(45),
  RAM VARCHAR(45),
  Bateria VARCHAR(45),
  Peso VARCHAR(45),
  Precio VARCHAR(45),
  Modeloscol VARCHAR(45),
  Formulario_Id_formulario INT,
  Usuarios_Id_no_registrados INT,
  FOREIGN KEY (Formulario_Id_formulario) REFERENCES Formulario(Id_formulario),
  FOREIGN KEY (Usuarios_Id_no_registrados) REFERENCES Usuarios(Id_no_registrados)
);

CREATE TABLE Compra (
  Id_compra INT PRIMARY KEY,
  Nombre_producto VARCHAR(45),
  Precio INT,
  Usuarios_Id_no_registrados INT,
  FOREIGN KEY (Usuarios_Id_no_registrados) REFERENCES Usuarios(Id_no_registrados)
);
