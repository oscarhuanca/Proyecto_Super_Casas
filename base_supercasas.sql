--
-- PostgreSQL database dump
--

-- Dumped from database version 14.18
-- Dumped by pg_dump version 14.18

-- Started on 2026-06-27 22:37:25

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 212 (class 1259 OID 115016)
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(100) NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 115015)
-- Name: categorias_id_categoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_id_categoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorias_id_categoria_seq OWNER TO postgres;

--
-- TOC entry 3466 (class 0 OID 0)
-- Dependencies: 211
-- Name: categorias_id_categoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_id_categoria_seq OWNED BY public.categorias.id_categoria;


--
-- TOC entry 224 (class 1259 OID 139583)
-- Name: clientes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clientes (
    cliente_id integer NOT NULL,
    nombre_completo character varying(150) NOT NULL,
    cedula_identidad character varying(20) NOT NULL,
    telefono character varying(20),
    email character varying(100),
    estado_cliente character varying(50) DEFAULT 'interesado'::character varying,
    fecha_registro timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    notas text,
    CONSTRAINT clientes_estado_cliente_check CHECK (((estado_cliente)::text = ANY ((ARRAY['interesado'::character varying, 'pre-aprobado'::character varying, 'cliente activo'::character varying, 'inactivo'::character varying])::text[])))
);


ALTER TABLE public.clientes OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 139582)
-- Name: clientes_cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clientes_cliente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.clientes_cliente_id_seq OWNER TO postgres;

--
-- TOC entry 3467 (class 0 OID 0)
-- Dependencies: 223
-- Name: clientes_cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clientes_cliente_id_seq OWNED BY public.clientes.cliente_id;


--
-- TOC entry 220 (class 1259 OID 115079)
-- Name: contactos_propiedad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contactos_propiedad (
    id_contacto integer NOT NULL,
    id_propiedad integer NOT NULL,
    nombre_interesado character varying(100) NOT NULL,
    telefono_interesado character varying(20) NOT NULL,
    correo_interesado character varying(150),
    mensaje text,
    fecha_contacto timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    atendido boolean DEFAULT false
);


ALTER TABLE public.contactos_propiedad OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 115078)
-- Name: contactos_propiedad_id_contacto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contactos_propiedad_id_contacto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contactos_propiedad_id_contacto_seq OWNER TO postgres;

--
-- TOC entry 3468 (class 0 OID 0)
-- Dependencies: 219
-- Name: contactos_propiedad_id_contacto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contactos_propiedad_id_contacto_seq OWNED BY public.contactos_propiedad.id_contacto;


--
-- TOC entry 228 (class 1259 OID 139627)
-- Name: contratos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contratos (
    id_contrato integer NOT NULL,
    id_propiedad integer,
    id_cliente integer,
    fecha_firma date,
    monto_pactado numeric(12,2),
    estado character varying(20) DEFAULT 'borrador'::character varying,
    CONSTRAINT contratos_estado_check CHECK (((estado)::text = ANY ((ARRAY['borrador'::character varying, 'firmado'::character varying, 'vigente'::character varying, 'finalizado'::character varying])::text[])))
);


ALTER TABLE public.contratos OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 139626)
-- Name: contratos_id_contrato_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contratos_id_contrato_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contratos_id_contrato_seq OWNER TO postgres;

--
-- TOC entry 3469 (class 0 OID 0)
-- Dependencies: 227
-- Name: contratos_id_contrato_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contratos_id_contrato_seq OWNED BY public.contratos.id_contrato;


--
-- TOC entry 226 (class 1259 OID 139611)
-- Name: documentos_propiedad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.documentos_propiedad (
    doc_prop_id integer NOT NULL,
    id_propiedad integer,
    nombre_documento character varying(100),
    ruta_archivo text NOT NULL,
    fecha_subida timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    es_obligatorio boolean DEFAULT true
);


ALTER TABLE public.documentos_propiedad OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 139610)
-- Name: documentos_propiedad_doc_prop_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.documentos_propiedad_doc_prop_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.documentos_propiedad_doc_prop_id_seq OWNER TO postgres;

--
-- TOC entry 3470 (class 0 OID 0)
-- Dependencies: 225
-- Name: documentos_propiedad_doc_prop_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.documentos_propiedad_doc_prop_id_seq OWNED BY public.documentos_propiedad.doc_prop_id;


--
-- TOC entry 218 (class 1259 OID 115067)
-- Name: imagenes_propiedad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.imagenes_propiedad (
    id_imagen integer NOT NULL,
    id_propiedad integer NOT NULL,
    ruta_url character varying(255) NOT NULL
);


ALTER TABLE public.imagenes_propiedad OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 115066)
-- Name: imagenes_propiedad_id_imagen_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.imagenes_propiedad_id_imagen_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.imagenes_propiedad_id_imagen_seq OWNER TO postgres;

--
-- TOC entry 3471 (class 0 OID 0)
-- Dependencies: 217
-- Name: imagenes_propiedad_id_imagen_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.imagenes_propiedad_id_imagen_seq OWNED BY public.imagenes_propiedad.id_imagen;


--
-- TOC entry 230 (class 1259 OID 139646)
-- Name: pagos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pagos (
    id_pago integer NOT NULL,
    id_contrato integer,
    fecha_pago date NOT NULL,
    monto_pagado numeric(12,2) NOT NULL,
    metodo_pago character varying(50),
    referencia_bancaria character varying(100),
    observaciones text
);


ALTER TABLE public.pagos OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 139645)
-- Name: pagos_id_pago_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pagos_id_pago_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pagos_id_pago_seq OWNER TO postgres;

--
-- TOC entry 3472 (class 0 OID 0)
-- Dependencies: 229
-- Name: pagos_id_pago_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pagos_id_pago_seq OWNED BY public.pagos.id_pago;


--
-- TOC entry 222 (class 1259 OID 123242)
-- Name: personal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal (
    id_personal integer NOT NULL,
    nombre_completo character varying(150) NOT NULL,
    ci character varying(20) NOT NULL,
    cargo character varying(50),
    fecha_ingreso date DEFAULT CURRENT_DATE,
    estado_contrato character varying(20) DEFAULT 'Activo'::character varying,
    telefono character varying(20),
    email_corporativo character varying(100),
    usuario_id integer,
    estado_civil character varying(30)
);


ALTER TABLE public.personal OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 123241)
-- Name: personal_id_personal_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_id_personal_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_id_personal_seq OWNER TO postgres;

--
-- TOC entry 3473 (class 0 OID 0)
-- Dependencies: 221
-- Name: personal_id_personal_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_id_personal_seq OWNED BY public.personal.id_personal;


--
-- TOC entry 232 (class 1259 OID 139660)
-- Name: plan_pagos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.plan_pagos (
    id_cronograma integer NOT NULL,
    id_contrato integer,
    fecha_vencimiento date NOT NULL,
    monto_cuota numeric(12,2) NOT NULL,
    estado character varying(20) DEFAULT 'pendiente'::character varying,
    CONSTRAINT plan_pagos_estado_check CHECK (((estado)::text = ANY ((ARRAY['pendiente'::character varying, 'pagado'::character varying, 'vencido'::character varying])::text[])))
);


ALTER TABLE public.plan_pagos OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 139659)
-- Name: plan_pagos_id_cronograma_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.plan_pagos_id_cronograma_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.plan_pagos_id_cronograma_seq OWNER TO postgres;

--
-- TOC entry 3474 (class 0 OID 0)
-- Dependencies: 231
-- Name: plan_pagos_id_cronograma_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.plan_pagos_id_cronograma_seq OWNED BY public.plan_pagos.id_cronograma;


--
-- TOC entry 216 (class 1259 OID 115042)
-- Name: propiedades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.propiedades (
    id_propiedad integer NOT NULL,
    id_categoria integer NOT NULL,
    id_usuario integer NOT NULL,
    titulo character varying(200) NOT NULL,
    descripcion text,
    precio numeric(12,2) NOT NULL,
    tipo_operacion character varying(50) NOT NULL,
    estado character varying(50) DEFAULT 'Pendiente'::character varying,
    habitaciones integer DEFAULT 0,
    banos integer DEFAULT 0,
    superficie_m2 numeric(8,2) NOT NULL,
    direccion character varying(255),
    ciudad character varying(100) NOT NULL,
    zona character varying(100),
    estado_documental character varying(100) DEFAULT false,
    visitas integer DEFAULT 0,
    fecha_publicacion timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.propiedades OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 115041)
-- Name: propiedades_id_propiedad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.propiedades_id_propiedad_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.propiedades_id_propiedad_seq OWNER TO postgres;

--
-- TOC entry 3475 (class 0 OID 0)
-- Dependencies: 215
-- Name: propiedades_id_propiedad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.propiedades_id_propiedad_seq OWNED BY public.propiedades.id_propiedad;


--
-- TOC entry 210 (class 1259 OID 115007)
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id_rol integer NOT NULL,
    nombre_rol character varying(50) NOT NULL
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 115006)
-- Name: roles_id_rol_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_rol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_rol_seq OWNER TO postgres;

--
-- TOC entry 3476 (class 0 OID 0)
-- Dependencies: 209
-- Name: roles_id_rol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_rol_seq OWNED BY public.roles.id_rol;


--
-- TOC entry 214 (class 1259 OID 115025)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id_usuario integer NOT NULL,
    id_rol integer NOT NULL,
    nombre character varying(100) NOT NULL,
    apellido character varying(100) NOT NULL,
    correo character varying(150) NOT NULL,
    contrasena character varying(255) NOT NULL,
    telefono character varying(20),
    fecha_registro timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    estado character varying(20) DEFAULT 'activo'::character varying NOT NULL,
    CONSTRAINT usuarios_estado_check CHECK (((estado)::text = ANY ((ARRAY['activo'::character varying, 'inactivo'::character varying])::text[])))
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 115024)
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 3477 (class 0 OID 0)
-- Dependencies: 213
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;


--
-- TOC entry 3220 (class 2604 OID 115019)
-- Name: categorias id_categoria; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN id_categoria SET DEFAULT nextval('public.categorias_id_categoria_seq'::regclass);


--
-- TOC entry 3239 (class 2604 OID 139586)
-- Name: clientes cliente_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes ALTER COLUMN cliente_id SET DEFAULT nextval('public.clientes_cliente_id_seq'::regclass);


--
-- TOC entry 3233 (class 2604 OID 115082)
-- Name: contactos_propiedad id_contacto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contactos_propiedad ALTER COLUMN id_contacto SET DEFAULT nextval('public.contactos_propiedad_id_contacto_seq'::regclass);


--
-- TOC entry 3246 (class 2604 OID 139630)
-- Name: contratos id_contrato; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contratos ALTER COLUMN id_contrato SET DEFAULT nextval('public.contratos_id_contrato_seq'::regclass);


--
-- TOC entry 3243 (class 2604 OID 139614)
-- Name: documentos_propiedad doc_prop_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.documentos_propiedad ALTER COLUMN doc_prop_id SET DEFAULT nextval('public.documentos_propiedad_doc_prop_id_seq'::regclass);


--
-- TOC entry 3232 (class 2604 OID 115070)
-- Name: imagenes_propiedad id_imagen; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.imagenes_propiedad ALTER COLUMN id_imagen SET DEFAULT nextval('public.imagenes_propiedad_id_imagen_seq'::regclass);


--
-- TOC entry 3249 (class 2604 OID 139649)
-- Name: pagos id_pago; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pagos ALTER COLUMN id_pago SET DEFAULT nextval('public.pagos_id_pago_seq'::regclass);


--
-- TOC entry 3236 (class 2604 OID 123245)
-- Name: personal id_personal; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal ALTER COLUMN id_personal SET DEFAULT nextval('public.personal_id_personal_seq'::regclass);


--
-- TOC entry 3250 (class 2604 OID 139663)
-- Name: plan_pagos id_cronograma; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plan_pagos ALTER COLUMN id_cronograma SET DEFAULT nextval('public.plan_pagos_id_cronograma_seq'::regclass);


--
-- TOC entry 3225 (class 2604 OID 115045)
-- Name: propiedades id_propiedad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.propiedades ALTER COLUMN id_propiedad SET DEFAULT nextval('public.propiedades_id_propiedad_seq'::regclass);


--
-- TOC entry 3219 (class 2604 OID 115010)
-- Name: roles id_rol; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id_rol SET DEFAULT nextval('public.roles_id_rol_seq'::regclass);


--
-- TOC entry 3221 (class 2604 OID 115028)
-- Name: usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- TOC entry 3440 (class 0 OID 115016)
-- Dependencies: 212
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id_categoria, nombre_categoria) FROM stdin;
1	Terrenos
2	Casas
3	Edificios
4	Departamentos
5	Garzoniers
6	Monoambientes
7	Oficinas
8	Locales Comerciales
9	Galpones / Tinglados
\.


--
-- TOC entry 3452 (class 0 OID 139583)
-- Dependencies: 224
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.clientes (cliente_id, nombre_completo, cedula_identidad, telefono, email, estado_cliente, fecha_registro, notas) FROM stdin;
\.


--
-- TOC entry 3448 (class 0 OID 115079)
-- Dependencies: 220
-- Data for Name: contactos_propiedad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contactos_propiedad (id_contacto, id_propiedad, nombre_interesado, telefono_interesado, correo_interesado, mensaje, fecha_contacto, atendido) FROM stdin;
\.


--
-- TOC entry 3456 (class 0 OID 139627)
-- Dependencies: 228
-- Data for Name: contratos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contratos (id_contrato, id_propiedad, id_cliente, fecha_firma, monto_pactado, estado) FROM stdin;
\.


--
-- TOC entry 3454 (class 0 OID 139611)
-- Dependencies: 226
-- Data for Name: documentos_propiedad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.documentos_propiedad (doc_prop_id, id_propiedad, nombre_documento, ruta_archivo, fecha_subida, es_obligatorio) FROM stdin;
\.


--
-- TOC entry 3446 (class 0 OID 115067)
-- Dependencies: 218
-- Data for Name: imagenes_propiedad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.imagenes_propiedad (id_imagen, id_propiedad, ruta_url) FROM stdin;
\.


--
-- TOC entry 3458 (class 0 OID 139646)
-- Dependencies: 230
-- Data for Name: pagos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pagos (id_pago, id_contrato, fecha_pago, monto_pagado, metodo_pago, referencia_bancaria, observaciones) FROM stdin;
\.


--
-- TOC entry 3450 (class 0 OID 123242)
-- Dependencies: 222
-- Data for Name: personal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal (id_personal, nombre_completo, ci, cargo, fecha_ingreso, estado_contrato, telefono, email_corporativo, usuario_id, estado_civil) FROM stdin;
\.


--
-- TOC entry 3460 (class 0 OID 139660)
-- Dependencies: 232
-- Data for Name: plan_pagos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.plan_pagos (id_cronograma, id_contrato, fecha_vencimiento, monto_cuota, estado) FROM stdin;
\.


--
-- TOC entry 3444 (class 0 OID 115042)
-- Dependencies: 216
-- Data for Name: propiedades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.propiedades (id_propiedad, id_categoria, id_usuario, titulo, descripcion, precio, tipo_operacion, estado, habitaciones, banos, superficie_m2, direccion, ciudad, zona, estado_documental, visitas, fecha_publicacion) FROM stdin;
1	1	1	Hermosa Casa Residencial	Excelente residencia con acabados de primera.	145000.00	Venta	Disponible	4	3	250.00	\N	La Paz	Achumani	Papeles al día	185	2026-05-27 21:37:22.283042
2	3	1	Terreno Amplio en Venta	Terreno publicado por usuario externo esperando revisión.	45000.00	Venta	Pendiente	0	0	400.00	\N	Santa Cruz	Urubó	Hipotecado / Gravamen	0	2026-05-27 21:37:22.283042
\.


--
-- TOC entry 3438 (class 0 OID 115007)
-- Dependencies: 210
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id_rol, nombre_rol) FROM stdin;
1	Administrador
2	Gerente
3	Asesor Inmobiliario
4	Recepción
\.


--
-- TOC entry 3442 (class 0 OID 115025)
-- Dependencies: 214
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id_usuario, id_rol, nombre, apellido, correo, contrasena, telefono, fecha_registro, estado) FROM stdin;
1	1	Oscar	Administrador	admin@supercasas.com.bo	admin123	70000000	2026-05-27 21:29:34.014188	activo
9	3	Xavi	Huanca Mamani	xavim@gmail.com	$2y$10$8n1/gXt8ktB/hAP7m0bgSuIbPZr40aCHINezXirPaXXvY3Y4jO3he	77242025	2026-06-24 19:41:18.795832	activo
10	4	Betti	Mamani Flores	bettimamaniflores@gmail.com	$2y$10$i7/neseeYfgCRYqzqq1Jw.VJUtDLDx2sCa3QV3jcNrX2bNL4RFzjS	77540782	2026-06-24 23:38:00.796329	activo
12	3	Joel Vladimir	Layme Rosas	jvlaime@gmail.com	$2y$10$h1UMZbO6buSFK1Nacs2YZO1QbYo4/jGeUQGk.Fa5cxE9Dhh4q9GA6	75230546	2026-06-26 17:29:31.092433	activo
13	3	Julian	Otoya Surco	otoya25@gmail.com	$2y$10$/GYJjo66wkvH7J6joDYuq.VGaG2zwpEpiAJmsrBtOYCJWlZQwr1pq	75269350	2026-06-26 17:39:16.212517	activo
\.


--
-- TOC entry 3478 (class 0 OID 0)
-- Dependencies: 211
-- Name: categorias_id_categoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_categoria_seq', 9, true);


--
-- TOC entry 3479 (class 0 OID 0)
-- Dependencies: 223
-- Name: clientes_cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clientes_cliente_id_seq', 1, false);


--
-- TOC entry 3480 (class 0 OID 0)
-- Dependencies: 219
-- Name: contactos_propiedad_id_contacto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contactos_propiedad_id_contacto_seq', 1, false);


--
-- TOC entry 3481 (class 0 OID 0)
-- Dependencies: 227
-- Name: contratos_id_contrato_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contratos_id_contrato_seq', 1, false);


--
-- TOC entry 3482 (class 0 OID 0)
-- Dependencies: 225
-- Name: documentos_propiedad_doc_prop_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.documentos_propiedad_doc_prop_id_seq', 1, false);


--
-- TOC entry 3483 (class 0 OID 0)
-- Dependencies: 217
-- Name: imagenes_propiedad_id_imagen_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.imagenes_propiedad_id_imagen_seq', 1, false);


--
-- TOC entry 3484 (class 0 OID 0)
-- Dependencies: 229
-- Name: pagos_id_pago_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pagos_id_pago_seq', 1, false);


--
-- TOC entry 3485 (class 0 OID 0)
-- Dependencies: 221
-- Name: personal_id_personal_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_id_personal_seq', 1, false);


--
-- TOC entry 3486 (class 0 OID 0)
-- Dependencies: 231
-- Name: plan_pagos_id_cronograma_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.plan_pagos_id_cronograma_seq', 1, false);


--
-- TOC entry 3487 (class 0 OID 0)
-- Dependencies: 215
-- Name: propiedades_id_propiedad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.propiedades_id_propiedad_seq', 2, true);


--
-- TOC entry 3488 (class 0 OID 0)
-- Dependencies: 209
-- Name: roles_id_rol_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_rol_seq', 3, true);


--
-- TOC entry 3489 (class 0 OID 0)
-- Dependencies: 213
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 14, true);


--
-- TOC entry 3258 (class 2606 OID 115023)
-- Name: categorias categorias_nombre_categoria_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_nombre_categoria_key UNIQUE (nombre_categoria);


--
-- TOC entry 3260 (class 2606 OID 115021)
-- Name: categorias categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id_categoria);


--
-- TOC entry 3276 (class 2606 OID 139595)
-- Name: clientes clientes_cedula_identidad_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_cedula_identidad_key UNIQUE (cedula_identidad);


--
-- TOC entry 3278 (class 2606 OID 139593)
-- Name: clientes clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (cliente_id);


--
-- TOC entry 3270 (class 2606 OID 115088)
-- Name: contactos_propiedad contactos_propiedad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contactos_propiedad
    ADD CONSTRAINT contactos_propiedad_pkey PRIMARY KEY (id_contacto);


--
-- TOC entry 3282 (class 2606 OID 139634)
-- Name: contratos contratos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contratos
    ADD CONSTRAINT contratos_pkey PRIMARY KEY (id_contrato);


--
-- TOC entry 3280 (class 2606 OID 139620)
-- Name: documentos_propiedad documentos_propiedad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.documentos_propiedad
    ADD CONSTRAINT documentos_propiedad_pkey PRIMARY KEY (doc_prop_id);


--
-- TOC entry 3268 (class 2606 OID 115072)
-- Name: imagenes_propiedad imagenes_propiedad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.imagenes_propiedad
    ADD CONSTRAINT imagenes_propiedad_pkey PRIMARY KEY (id_imagen);


--
-- TOC entry 3284 (class 2606 OID 139653)
-- Name: pagos pagos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pagos
    ADD CONSTRAINT pagos_pkey PRIMARY KEY (id_pago);


--
-- TOC entry 3272 (class 2606 OID 123251)
-- Name: personal personal_ci_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT personal_ci_key UNIQUE (ci);


--
-- TOC entry 3274 (class 2606 OID 123249)
-- Name: personal personal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT personal_pkey PRIMARY KEY (id_personal);


--
-- TOC entry 3286 (class 2606 OID 139667)
-- Name: plan_pagos plan_pagos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plan_pagos
    ADD CONSTRAINT plan_pagos_pkey PRIMARY KEY (id_cronograma);


--
-- TOC entry 3266 (class 2606 OID 115055)
-- Name: propiedades propiedades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.propiedades
    ADD CONSTRAINT propiedades_pkey PRIMARY KEY (id_propiedad);


--
-- TOC entry 3254 (class 2606 OID 115014)
-- Name: roles roles_nombre_rol_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_nombre_rol_key UNIQUE (nombre_rol);


--
-- TOC entry 3256 (class 2606 OID 115012)
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_rol);


--
-- TOC entry 3262 (class 2606 OID 115035)
-- Name: usuarios usuarios_correo_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_correo_key UNIQUE (correo);


--
-- TOC entry 3264 (class 2606 OID 115033)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 3295 (class 2606 OID 139640)
-- Name: contratos contratos_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contratos
    ADD CONSTRAINT contratos_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.clientes(cliente_id);


--
-- TOC entry 3294 (class 2606 OID 139635)
-- Name: contratos contratos_id_propiedad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contratos
    ADD CONSTRAINT contratos_id_propiedad_fkey FOREIGN KEY (id_propiedad) REFERENCES public.propiedades(id_propiedad);


--
-- TOC entry 3293 (class 2606 OID 139621)
-- Name: documentos_propiedad documentos_propiedad_id_propiedad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.documentos_propiedad
    ADD CONSTRAINT documentos_propiedad_id_propiedad_fkey FOREIGN KEY (id_propiedad) REFERENCES public.propiedades(id_propiedad) ON DELETE CASCADE;


--
-- TOC entry 3291 (class 2606 OID 115089)
-- Name: contactos_propiedad fk_contacto_propiedad; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contactos_propiedad
    ADD CONSTRAINT fk_contacto_propiedad FOREIGN KEY (id_propiedad) REFERENCES public.propiedades(id_propiedad) ON DELETE CASCADE;


--
-- TOC entry 3290 (class 2606 OID 115073)
-- Name: imagenes_propiedad fk_imagen_propiedad; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.imagenes_propiedad
    ADD CONSTRAINT fk_imagen_propiedad FOREIGN KEY (id_propiedad) REFERENCES public.propiedades(id_propiedad) ON DELETE CASCADE;


--
-- TOC entry 3288 (class 2606 OID 115056)
-- Name: propiedades fk_propiedad_categoria; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.propiedades
    ADD CONSTRAINT fk_propiedad_categoria FOREIGN KEY (id_categoria) REFERENCES public.categorias(id_categoria) ON DELETE RESTRICT;


--
-- TOC entry 3289 (class 2606 OID 115061)
-- Name: propiedades fk_propiedad_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.propiedades
    ADD CONSTRAINT fk_propiedad_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id_usuario) ON DELETE RESTRICT;


--
-- TOC entry 3292 (class 2606 OID 123252)
-- Name: personal fk_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal
    ADD CONSTRAINT fk_usuario FOREIGN KEY (usuario_id) REFERENCES public.usuarios(id_usuario) ON DELETE SET NULL;


--
-- TOC entry 3287 (class 2606 OID 115036)
-- Name: usuarios fk_usuario_rol; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT fk_usuario_rol FOREIGN KEY (id_rol) REFERENCES public.roles(id_rol) ON DELETE RESTRICT;


--
-- TOC entry 3296 (class 2606 OID 139654)
-- Name: pagos pagos_id_contrato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pagos
    ADD CONSTRAINT pagos_id_contrato_fkey FOREIGN KEY (id_contrato) REFERENCES public.contratos(id_contrato) ON DELETE CASCADE;


--
-- TOC entry 3297 (class 2606 OID 139668)
-- Name: plan_pagos plan_pagos_id_contrato_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plan_pagos
    ADD CONSTRAINT plan_pagos_id_contrato_fkey FOREIGN KEY (id_contrato) REFERENCES public.contratos(id_contrato) ON DELETE CASCADE;


-- Completed on 2026-06-27 22:37:26

--
-- PostgreSQL database dump complete
--

