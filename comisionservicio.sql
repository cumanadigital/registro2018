-- Table: censo2017.comisionservicio

-- DROP TABLE censo2017.comisionservicio;

CREATE TABLE censo2017.comisionservicio
(
  id_comision serial NOT NULL,
  id_plantelesbase integer,
  id_registropersonal integer,
  cedula character varying(200),
  comision_institucion character varying(200),
  comision_municipio character varying(200),
  comision_ciudad character varying(200),
  comision_tipo_personal character varying(200),
  comision_cargo_funcional character varying(200),
  comision_departamento_laboral character varying(200),
  comison_jefe character varying(200),
  comision_celular_jefe character varying(200),
  comision_telefono_jefe character varying(200),
  fecha_registro timestamp without time zone,
  CONSTRAINT pk_id_comision PRIMARY KEY (id_comision)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE censo2017.comisionservicio
  OWNER TO desarrollador01;
