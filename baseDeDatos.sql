/*--- Creacion de las tablas  ---*/
CREATE TABLE Administrador(
  id_administrador serial primary key,
  nombre varchar(60) not null unique,
  correo_electronico varchar(100) not null unique,
  telefono bigint not null unique,
  contrasena varchar(30) not null
);

CREATE TABLE Denuncia_lugar (
    id_DenunciaLugar serial primary key,
    calle varchar(100) not null,
    numero_int varchar(10) default '-',
    numero_ext varchar(10) not null,
    caracteristicas text not null,
    municipio_lugar varchar(100) not null,
    estado_lugar varchar(35) not null,
    desc_hechos text not null,
    fecha_hechos date not null,
    hora_hechos time not null,
    id_administrador int not null,
    constraint FK_DenunciaLugarAdmin FOREIGN KEY (id_administrador) REFERENCES Administrador(id_administrador)
);

CREATE TABLE Denuncia_imputado(
    id_DenunciaImputado serial primary key,
    nombre varchar(60) not null,
    alias varchar(60) not null, 
    genero varchar(10) not null,
    desc_imputado text not null,
    desc_hechos text not null,
    municipio_hechos varchar(100) not null,
    estado_hechos varchar(35) not null,
    fecha_hechos date not null,
    hora_hechos time not null,
    id_administrador int not null,
    CONSTRAINT FK_DenunciaImputadoAdmin FOREIGN KEY (id_administrador) REFERENCES Administrador(id_administrador)
);

CREATE TABLE Estado(
    id_estado serial primary key,
    nombre varchar(35) not null unique
);

CREATE TABLE Droga(
    id_droga serial primary key,
    nombre varchar(60) not null,
    presentacion varchar(60) not null
);

CREATE TABLE Organizacion(
    id_organizacion serial primary key,
    nombre varchar(50) not null unique
);

CREATE TABLE Aseguramiento(
    id_aseguramiento serial primary key,
    tipo_aseguramiento varchar(30) default 'Kilogramo',
    municipio varchar(100) not null default 'No Especificado',
    anio int not null,
    mes int not null,
    anio_mensual varchar(7) not null,
    cantidad real not null,
    id_estado int not null,
    id_droga int not null,
    id_organizacion int not null,
    CONSTRAINT FK_AseguramientoEstado FOREIGN KEY (id_estado) REFERENCES Estado(id_estado),
    CONSTRAINT FK_AseguramientoDroga FOREIGN KEY (id_droga) REFERENCES Droga(id_droga),
    CONSTRAINT FK_AseguramientoOrganizacion FOREIGN KEY (id_organizacion) REFERENCES Organizacion(id_organizacion)
);

CREATE TABLE Destruccion(
    id_destruccion serial primary key,
    tipo_destruccion varchar(60) not null,
    municipio varchar(100) default 'No Especificado',
    anio int not null,
    mes int not null,
    anio_mensual varchar(7) not null,
    hectareas real not null,
    id_estado int not null,
    id_droga int not null,
    id_organizacion int not null,
    CONSTRAINT FK_AseguramientoEstado FOREIGN KEY (id_estado) REFERENCES Estado(id_estado),
    CONSTRAINT FK_AseguramientoDroga FOREIGN KEY (id_droga) REFERENCES Droga(id_droga),
    CONSTRAINT FK_AseguramientoOrganizacion FOREIGN KEY (id_organizacion) REFERENCES Organizacion(id_organizacion)
);

CREATE TABLE Incautacion(
    id_incautacion serial primary key,
    concepto varchar(60) not null,
    periodo_inicio int not null,
    periodo_fin int not null,
    numero_incautaciones int not null,
    id_organizacion int not null,
    CONSTRAINT FK_IncautacionOrganizacion FOREIGN KEY (id_organizacion) REFERENCES Organizacion(id_organizacion)
);

CREATE TABLE Gasto_en_reduccion(
    id_gasto serial primary key,
    mdp real not null,
    mdd real not null,
    anio int not null,
    id_organizacion int not null,
    CONSTRAINT FK_GastoOrganizacion FOREIGN KEY (id_organizacion) REFERENCES Organizacion(id_organizacion)
);

CREATE TABLE Incidencia_delictiva(
    id_incidencia serial primary key,
    anio int not null,
    narcomenudeo int not null,
    otros_previstos int not null
);

/*--- REGISTROS ---*/
/*Administradores*/  /*Vídeo*/
INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Rodrigo Villaseñor','rod.villasenor.11@gmail.com', 3327547892,'RodVill11');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Racso Zuñiga','racsosisZu12@hotmail.com', 3324156892,'RacZu12');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Alan Corona','imanol.corona31@hotmail.com', 3334562195,'AlCor331');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Jose Garza','garzajos3@gmail.com', 5535647891,'Jos3gar');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Joel Zaragoza','adelarjoel33@gmail.com', 3302034560,'JoeZar33');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Jafet Alferez','alferezjaf34@hotmail.com', 5523456190,'Jafalferez34');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('María González', 'maria.gonzalez@gmail.com', 3338889999, 'MariaG2021');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Pedro Sánchez', 'pedro.sanchez@web.net', 8887772222, 'Pedro2023');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Isabel Fernández', 'isabel.fernandez@email.org', 7778881111, 'IsaFer45');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Laura Pérez', 'laura.perez234@email.com', 5551234567, 'LauraPerez123');

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Brenda Mendez', 'brenmdz155@yahoo.com.mx', 5536497864, 'Brdnmz15');

/*Estado*/
INSERT INTO public.Estado(nombre) VALUES 
    ('Aguascalientes'), ('Baja California'), ('Baja California Sur'), ('Campeche'),
    ('Coahuila de Zaragoza'), ('Colima'), ('Chiapas'), ('Chihuahua'),
    ('Ciudad de México'), ('Durango'), ('Guanajuato'), ('Guerrero'),
    ('Hidalgo'), ('Jalisco'), ('México'), ('Michoacán de Ocampo'),
    ('Morelos'), ('Nayarit'), ('Nuevo León'), ('Oaxaca'),
    ('Puebla'), ('Querétaro'), ('Quintana Roo'), ('San Luis Potosí'),
    ('Sinaloa'), ('Sonora'), ('Tabasco'), ('Tamaulipas'),
    ('Tlaxcala'), ('Veracruz de Ignacio de la Llave'), ('Yucatán'), ('Zacatecas');

/*Drogas*/
INSERT INTO public.Droga(nombre, presentacion) VALUES
    ('Amapola','Plantío'), ('Marihuana','Plantío'), ('Cocaína','Polvo'), ('Cristal','Polvo'),('Heroína','Polvo'),
    ('Ice','Polvo'), ('Marihuana','Planta'), ('Metanfetamina','Polvo'), ('Otras','Variante'), ('Narcóticos','Laboratorio'),
    ('Fentanilo','Polvo'),('Heroína','Laboratorio'), ('Metanfetamina','Laboratorio'), ('Cocaína','Laboratorio'), ('Opio','Goma'), 
    ('Fentanilo','Pastillas'),('Fentanilo','Ampolletas'), ('Marihuana','Semilla'), ('Amapola','Semilla'), ('Marihuana','Incinerada'),
    ('Cocaína','Incinerada'), ('Heroína','Incinerada'), ('Opio','Goma Incinerada'), ('Metanfetamina','Incinerada'), ('Marihuana','Semilla Incinerada'),
    ('Amapola','Semilla Incinerada'),  ('Amapola','Planta');

/*Organización*/
INSERT INTO public.Organizacion(nombre) VALUES
    ('Policía Federal'), ('Guardia Nacional'), ('SEDENA'), 
    ('SEMAR'), ('FGR'), ('Comisión Nacional contra las Adicciones'), 
    ('Instituto Naciona de Psiquiatría'), ('Centros de Integración Juvenil'), ('PGR');

/*Denuncia Lugar*/
INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador) 
    VALUES ('Enrique Gonzalez Martinez', '', '10', 
    'Casa de color rosa con sillon afuera, puerta negra de dos pisos', 
    'Ixtlahuacan de los Membrillos', 'Jalisco', 
    'Siempre hay un grupo de personas consumiendo drogas, y pude observar que se esta realizando venta de drogas en ese domicilio', 
    '2023-08-4', '23:00:00', 1);

INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Dunas de Bilbao Norte', '', '123',
    'Edificio destartalado con ventanas tapiadas', 
    'Ciudad Juárez', 'Chihuahua', 
    'Sospechoso movimiento de personas entrando y saliendo a altas horas de la noche, todos completamente cubiertos.', 
    '2023-09-28', '23:30:00', 2);

INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Reforma', '', '456', 
    'Casa blanca con rejas en ventanas y puerta blindada', 
    'Tijuana', 'Baja California', 
    'Actividad sospechosa de tráfico de sustancias ilícitas.', 
    '2023-03-10', '11:15:00', 3);

INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Lago de Patzcuaro', '15', '789',
    'Edificio color gris de apartamentos con olor a sustancias prohibidas', 
    'Monterrey', 'Nuevo León', 
    'Posible punto de venta y consumo de drogas.', 
    '2023-01-25', '19:45:00', 4);

INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('San Pedro Mártir', '8', '237',
    'Casa morada con ventanas cubiertas de periodico y graffiti de una mujer semidesnuda', 
    'Ciudad de México', 'Ciudad de México', 
    'Presencia de actividades de venta ilegal de drogas y medicina sin receta', 
    '2023-02-02', '18:20:00', 5);

INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('San Antonio', '3', '45',
    'Local de color blanco con entrada restringida y mirilla', 
    'Toluca', 'Estado de México', 
    'Sospecha de venta ilegal de sustancias.', 
    '2023-09-20', '16:55:00', 6);
   
INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Baila', '25', '789',
    'Edificio con aspecto abandonado y luces siempre encendidas', 
    'Culiacán', 'Sinaloa', 
    'Entran personas con armas al domicilio y se escuchan gritos a menudo', 
    '2023-06-10', '23:40:00', 7);

INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Calle de las Drogas', '12', '567', 
    'Residencia blanca con acabados de piedra con una puerta grande de madera', 
    'Guadalajara', 'Jalisco', 
    'Música alta con entrada controlada y movimiento inusual de personas en la propiedad.', 
    '2023-07-08', '21:10:00', 8);

INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Estepas', '', '678',
    'Afuera del CECYTES',
    'Hermosillo', 'Sonora', 
    'La esquina parece ser un punto de droga, ya que siempre se venden pasateles a escondidas', 
    '2023-10-15', '13:15:00', 9);


/*Denuncia imputado*/
INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES('Pedro Villalpando Ruíz','El Pedrito','Masculino',
    'Hombre de tez morena con tatuaje de serpiente en el brazo izquierdo, cabello nego y altura baja',
    'El muchacho intento venderme narcóticos de forma agresiva.',
    'Morelia','Michoacán',
    '2023-12-12','11:32:00',1);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Juan Pérez Villalpando','El Juanes',
    'Masculino',
    'Sospechoso con cabello largo, ojos azules y tatuaje de una rosa en el cuello.',
    'El individuo fue visto vendiendo drogas en la esquina de la calle.',
    'Ciudad de México','Ciudad de México',
    '2023-10-01','14:45:00',2);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('María Sánchez Vergara','La Marimba','Femenino',
    'Mujer de pelo pintado de rosa y ojos verdes, vestida completamente de negro.',
    'La mujer estaba involucrada en una transacción de drogas.',
    'Zapopan','Jalisco',
    '2023-09-25','16:30:00',3);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Ana Gómez Mendez','La güereja','Femenino',
    'Mujer de pelo castaño, sin ropa y comportamiento inusual.',
    'La mujer estaba consumiendo drogas en un parque público.',
    'Guadalajara','Jalisco',
    '2023-03-30','18:00:00',4);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Manuel López Medina','El Manu','Masculino',
    'Sospechoso con los brazos cubiertos de tatuajes y actitud agresiva.',
    'El hombre intentó vender narcóticos en un estacionamiento.',
    'Los Mochis','Sinaloa',
    '2023-01-29','20:10:00',5);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Luis Rodríguez Mendez','El Luisito Pillo','Masculino',
    'Hombre con tatuajes en el cuello, cejas pobladas y mirada perdida.',
    'El individuo estaba muy drogado e intento agredir a varias personas.',
    'Monterrey','Nuevo León',
    '2023-04-27','13:55:00',6);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Roberto González Muñoz','El Robert','Masculino',
    'Hombre de apariencia descuidada con vestimenta inusual, de baja altura y tez morena.',
    'El individuo intentó vender drogas a turistas en un callejón oscuro.',
    'Guanajuato','Guanajuato',
    '2023-06-26','23:10:00',7);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Lucía Torres Lozano','La Luciérnaga','Femenino',
    'Mujer de apariencia descuidada y comportamiento errático.',
    'La mujer fue vista consumiendo drogas afuera de una preparatoria.',
    'Veracruz','Veracruz',
    '2023-10-03','13:20:00',8);

INSERT INTO public.Denuncia_imputado(nombre, alias, genero, desc_imputado, desc_hechos, municipio_hechos, estado_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('Carlos Rodríguez Rivas','El Charlie','Masculino',
    'Hombre sin un ojo, sin cabello y de tez blanca.',
    'El sujeto estaba vendiendo brownies con droga a alumnos de secundaria.',
    'Ciudad Juárez','Chihuahua',
    '2023-10-02','12:15:00',9);

/*Incautación*/
INSERT INTO public.Incautacion(concepto, periodo_inicio, periodo_fin, numero_incautaciones, id_organizacion) 
    VALUES ('Vehículos Terrestres', 2012, 2018, 79761, 5),
    ('Vehículos Aéreos', 2012, 2018, 163, 5),
    ('Vehículos Marinos', 2012, 2018, 361, 5),
    ('Armas Cortas', 2012, 2018, 22563, 5),
    ('Armas Largas', 2012, 2018, 30984, 5),
    ('Laboratorios desmantelados', 2012, 2018, 745, 5),
    ('Pistas clandestinas destruidas', 2012, 2018, 97, 5);

/*Gato en reduccion*/
INSERT INTO public.Gasto_en_reduccion(mdp,mdd,anio,id_organizacion)
    VALUES (719.29,0.58, 2018, 6),
    (372.30, 0.303, 2018, 7),
    (709.51, 0.578, 2018, 8),
    (93575.93, 4678.79, 2018, 3),
    (32083.37, 1604.16, 2018, 4),
    (15351.08, 767.55, 2018, 9);

/*Incidencia Delictiva*/
INSERT INTO public.Incidencia_delictiva(anio, narcomenudeo, otros_previstos)
    VALUES (2012,14331, 1581), 
    (2013,7969,1259), 
    (2014,5490,853),
    (2015,2581,533),
    (2016,1147,285),
    (2017,870,195);

/*--------------------------Sentencias Vídeo--------------------------*/
SELECT * FROM Administrador;

INSERT INTO public.Administrador(nombre, correo_electronico, telefono, contrasena) 
    VALUES ('Brayan Hernandez', 'braya.her03@hotmail.com', 3325769104, 'BrayHer03');

SELECT * FROM Administrador;

UPDATE Administrador SET telefono = 5535689521
    WHERE nombre = 'Brayan Hernandez';

SELECT * FROM Administrador;
/*Corregir*/
DELETE FROM Administrador 
    WHERE correo_electronico = 'braya.her03@hotmail.com';

SELECT * FROM Administrador;


/*Denunica de lugar*/
SELECT * FROM Denuncia_lugar
INSERT INTO public.Denuncia_lugar(calle, numero_int, numero_ext, caracteristicas, municipio_lugar, estado_lugar, desc_hechos, fecha_hechos, hora_hechos, id_administrador)
    VALUES ('San Pablo', '', '1320', 
    'Casa color menta de dos pisos con porton negro tipo cochera', 
    'Puebla', 'Puebla', 
    'Numerosas visitas nocturnas con sospecha de actividades ilegales en la propiedad.', 
    '2023-09-12', '23:30:00', 10);
SELECT * FROM Denuncia_lugar