CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    fechaNacimiento DATE NOT NULL
);

CREATE TABLE Control_Glucosa (
    usuario_id INT NOT NULL,
    fecha DATE NOT NULL UNIQUE,
    actividad TINYINT NOT NULL,--del 1 al 5
    insulina_lenta INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

CREATE TABLE Comida (
    control_glucosa_id INT NOT NULL,
    tipo_comida ENUM('DESAYUNO', 'COMIDA', 'CENA') NOT NULL,
    raciones DECIMAL(5,2) NOT NULL,
    glucosa_1h INT NOT NULL,
    insulina INT NOT NULL,
    glucosa_2h INT NOT NULL,
    FOREIGN KEY (control_glucosa_id) REFERENCES Control_Glucosa(id)
);

CREATE TABLE Hipo (
    usuario_id INT NOT NULL,
    fecha DATE NOT NULL,
    tipo_comida ENUM('DESAYUNO', 'COMIDA', 'CENA') NOT NULL,
    hora TIME NOT NULL,
    glucosa INT NOT NULL,
    correccion INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id),
    FOREIGN KEY (fecha) REFERENCES Control_Glucosa(fecha)
);

CREATE TABLE Hiper (
    usuario_id INT NOT NULL,
    fecha DATE NOT NULL,
    tipo_comida ENUM('DESAYUNO', 'COMIDA', 'CENA') NOT NULL,
    hora TIME NOT NULL,
    glucosa INT NOT NULL,
    correccion INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id),
    FOREIGN KEY (fecha) REFERENCES Control_Glucosa(fecha)
);
