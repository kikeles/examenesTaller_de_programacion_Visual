create database cuestionario;
use cuestionario;

create table preguntas(
			id int auto_increment,
			pregunta varchar(50),
			tipo varchar(50),
			puntaje int(10),
			tema varchar(50),
			estatus varchar(50),
			primary key(id)
					);