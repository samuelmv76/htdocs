CREATE DATABASE IF NOT EXISTS Control_Glucosa_DB;
USE Control_Glucosa_DB;

CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL
);

CREATE TABLE Control_Glucosa (
    usuario_id INT NOT NULL,
    fecha DATE NOT NULL,    
    actividad TINYINT NOT NULL CHECK (actividad BETWEEN 1 AND 5),
    insulina_lenta INT NOT NULL,
    PRIMARY KEY (usuario_id, fecha),
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

CREATE TABLE Comida (
    usuario_id INT NOT NULL,
    fecha DATE NOT NULL,
    tipo_comida ENUM('DESAYUNO', 'COMIDA', 'CENA') NOT NULL,
    raciones DECIMAL(5,2) NOT NULL,
    glucosa_1h INT NOT NULL,
    insulina INT NOT NULL,
    glucosa_2h INT NOT NULL,
    PRIMARY KEY (usuario_id, fecha, tipo_comida),
    FOREIGN KEY (usuario_id, fecha) REFERENCES Control_Glucosa(usuario_id, fecha)
);

CREATE TABLE Episodios_Glucosa (
    usuario_id INT NOT NULL,
    fecha DATE NOT NULL,
    tipo_comida ENUM('DESAYUNO', 'COMIDA', 'CENA') NOT NULL,
    hora TIME NOT NULL,
    glucosa INT NOT NULL,
    correccion INT NOT NULL,
    tipo ENUM('HIPO', 'HIPER') NOT NULL,
    PRIMARY KEY (usuario_id, fecha, tipo_comida, hora, tipo),
    FOREIGN KEY (usuario_id, fecha) REFERENCES Control_Glucosa(usuario_id, fecha)
);
