--
-- PostgreSQL database dump
--

-- Dumped from database version 10.7 (Ubuntu 10.7-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.7 (Ubuntu 10.7-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: gen_uuid(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.gen_uuid() RETURNS uuid
    LANGUAGE plpgsql
    AS $$

DECLARE


   uid uuid;


BEGIN


   SELECT md5(random()::text || clock_timestamp()::text)::uuid INTO uid;


   RETURN uid;


END;


$$;


ALTER FUNCTION public.gen_uuid() OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: log_login; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.log_login (
    id bigint NOT NULL,
    uid_pegawai uuid,
    id_session character varying,
    waktu_login timestamp without time zone,
    waktu_logout timestamp without time zone
);


ALTER TABLE public.log_login OWNER TO postgres;

--
-- Name: log_login_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.log_login_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.log_login_id_seq OWNER TO postgres;

--
-- Name: log_login_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.log_login_id_seq OWNED BY public.log_login.id;


--
-- Name: master_aset_kategori; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_aset_kategori (
    id integer NOT NULL,
    nama character varying(50)
);


ALTER TABLE public.master_aset_kategori OWNER TO postgres;

--
-- Name: master_aset_kategori_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.master_aset_kategori_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.master_aset_kategori_id_seq OWNER TO postgres;

--
-- Name: master_aset_kategori_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_aset_kategori_id_seq OWNED BY public.master_aset_kategori.id;


--
-- Name: master_aset_subkategori; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_aset_subkategori (
    id integer NOT NULL,
    nama character varying(50),
    id_kategori smallint
);


ALTER TABLE public.master_aset_subkategori OWNER TO postgres;

--
-- Name: master_aset_subkategori_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.master_aset_subkategori_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.master_aset_subkategori_id_seq OWNER TO postgres;

--
-- Name: master_aset_subkategori_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_aset_subkategori_id_seq OWNED BY public.master_aset_subkategori.id;


--
-- Name: master_aset_subkategori_identitas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_aset_subkategori_identitas (
    id integer DEFAULT nextval('public.master_aset_subkategori_id_seq'::regclass) NOT NULL,
    unit uuid,
    nama character varying(225),
    merk character varying(225),
    kapasitas character varying(225),
    jumlah integer,
    satuan character varying(50),
    keterangan character varying(225),
    id_subkategori integer,
    tanggal_beli timestamp without time zone,
    jenis character varying,
    lokasi_penempatan character varying
);


ALTER TABLE public.master_aset_subkategori_identitas OWNER TO postgres;

--
-- Name: master_aset_subkategori_parameter; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_aset_subkategori_parameter (
    id integer NOT NULL,
    nama character varying,
    id_kategori smallint,
    id_subkategori smallint
);


ALTER TABLE public.master_aset_subkategori_parameter OWNER TO postgres;

--
-- Name: master_aset_subkategori_parameter_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.master_aset_subkategori_parameter_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.master_aset_subkategori_parameter_id_seq OWNER TO postgres;

--
-- Name: master_aset_subkategori_parameter_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_aset_subkategori_parameter_id_seq OWNED BY public.master_aset_subkategori_parameter.id;


--
-- Name: master_pegawai; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_pegawai (
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    nip character varying(20),
    nama character varying(100),
    foto character varying,
    is_login "char" DEFAULT 'N'::"char",
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    uid_unit uuid,
    id_jenkel character(1),
    last_login timestamp without time zone,
    password character varying,
    uid_jabatan uuid,
    uid_bidang uuid,
    id_kategori smallint
);


ALTER TABLE public.master_pegawai OWNER TO postgres;

--
-- Name: master_pegawai_bidang; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_pegawai_bidang (
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    nama character varying(255),
    keterangan text,
    uid_unit uuid,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE public.master_pegawai_bidang OWNER TO postgres;

--
-- Name: master_pegawai_jabatan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_pegawai_jabatan (
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    nama character varying,
    uid_parent uuid,
    uid_unit uuid,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE public.master_pegawai_jabatan OWNER TO postgres;

--
-- Name: master_term; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_term (
    id integer NOT NULL,
    nama character varying(50)
);


ALTER TABLE public.master_term OWNER TO postgres;

--
-- Name: master_term_data; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_term_data (
    id bigint NOT NULL,
    nama character varying(100),
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    id_term integer
);


ALTER TABLE public.master_term_data OWNER TO postgres;

--
-- Name: master_term_data_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.master_term_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.master_term_data_id_seq OWNER TO postgres;

--
-- Name: master_term_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_term_data_id_seq OWNED BY public.master_term_data.id;


--
-- Name: master_term_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.master_term_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.master_term_id_seq OWNER TO postgres;

--
-- Name: master_term_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_term_id_seq OWNED BY public.master_term.id;


--
-- Name: master_unit; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_unit (
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    nama character varying(100),
    no_telepon character varying(20),
    alamat character varying(200),
    uid_parent uuid,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    id_level smallint,
    kode character varying(20)
);


ALTER TABLE public.master_unit OWNER TO postgres;

--
-- Name: master_aset_kategori id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_kategori ALTER COLUMN id SET DEFAULT nextval('public.master_aset_kategori_id_seq'::regclass);


--
-- Name: master_aset_subkategori id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori ALTER COLUMN id SET DEFAULT nextval('public.master_aset_subkategori_id_seq'::regclass);


--
-- Name: master_aset_subkategori_parameter id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori_parameter ALTER COLUMN id SET DEFAULT nextval('public.master_aset_subkategori_parameter_id_seq'::regclass);


--
-- Name: master_term id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term ALTER COLUMN id SET DEFAULT nextval('public.master_term_id_seq'::regclass);


--
-- Name: master_term_data id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term_data ALTER COLUMN id SET DEFAULT nextval('public.master_term_data_id_seq'::regclass);


--
-- Data for Name: log_login; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: master_aset_kategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_aset_kategori VALUES (1, 'Fire Protection System');
INSERT INTO public.master_aset_kategori VALUES (2, 'Tools Kesehatan');


--
-- Data for Name: master_aset_subkategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_aset_subkategori VALUES (1, 'Mobil Pemadam Kebakaran', 1);
INSERT INTO public.master_aset_subkategori VALUES (2, 'APAR', 1);
INSERT INTO public.master_aset_subkategori VALUES (3, 'APAB', 1);


--
-- Data for Name: master_aset_subkategori_identitas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: master_aset_subkategori_parameter; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_aset_subkategori_parameter VALUES (1, 'Bensin', 1, 1);
INSERT INTO public.master_aset_subkategori_parameter VALUES (2, 'Roda', 1, 1);
INSERT INTO public.master_aset_subkategori_parameter VALUES (3, 'Kebersihan', 1, 1);
INSERT INTO public.master_aset_subkategori_parameter VALUES (4, 'Ketersediaan Air di Tangki', 1, 1);


--
-- Data for Name: master_pegawai; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_pegawai VALUES ('5254049b-a5fb-dec7-4e5f-49f634ebc8a9', 'admininduk', 'Admin Induk', '45user3.png', 'Y', '2020-09-09 00:00:00', '2020-09-12 16:02:29', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', NULL, '2020-09-13 16:34:26', 'TVRJek5EVTI=', NULL, NULL, NULL);
INSERT INTO public.master_pegawai VALUES ('0b8f65e0-dfcb-f11f-574b-260d5e22fd11', '123', 'Jonatan', '87user.png', 'N', '2020-09-13 17:49:19', '2020-09-13 17:50:03', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', NULL, NULL, 'TVRJeg==', '26978bae-4009-acf9-0b47-37b316bc449c', NULL, 3);


--
-- Data for Name: master_pegawai_bidang; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_pegawai_bidang VALUES ('6a033551-0a27-09ba-bb19-3bc20c75d7f5', 'Teknik', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-13 16:43:23', NULL, NULL);
INSERT INTO public.master_pegawai_bidang VALUES ('263a6a95-8808-118d-8107-1528239ed466', 'Renbintek', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-13 16:43:29', NULL, NULL);
INSERT INTO public.master_pegawai_bidang VALUES ('677fc802-dd62-9b7d-c39c-67d9b247aa4c', 'Keamanan', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-13 16:43:34', NULL, NULL);


--
-- Data for Name: master_pegawai_jabatan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_pegawai_jabatan VALUES ('b5bef26f-56ee-d9c3-98a9-c555b4ba1f9e', 'SPV II MEK I', '587f56d3-ce46-d994-cfaa-ccf83737a4b5', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 17:52:56', NULL, NULL);
INSERT INTO public.master_pegawai_jabatan VALUES ('17043aed-1fca-7adb-5444-752477f6f3eb', 'SPV II KONIN', '3c529eca-1db5-1854-252b-67664aea5189', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 17:38:08', '2020-09-12 17:55:32', NULL);
INSERT INTO public.master_pegawai_jabatan VALUES ('26978bae-4009-acf9-0b47-37b316bc449c', 'MANAGER UNIT PELAKSANA', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 16:10:44', '2020-09-12 16:13:14', NULL);
INSERT INTO public.master_pegawai_jabatan VALUES ('3c529eca-1db5-1854-252b-67664aea5189', 'MAN II TEKNIK', '26978bae-4009-acf9-0b47-37b316bc449c', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 16:12:49', '2020-09-12 16:14:06', NULL);
INSERT INTO public.master_pegawai_jabatan VALUES ('587f56d3-ce46-d994-cfaa-ccf83737a4b5', 'MAN II RENBINTEK', '26978bae-4009-acf9-0b47-37b316bc449c', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 16:15:21', NULL, NULL);


--
-- Data for Name: master_term; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_term VALUES (1, 'Jenis Kelamin');
INSERT INTO public.master_term VALUES (2, 'Kategori Personil');


--
-- Data for Name: master_term_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_term_data VALUES (1, 'Laki-laki', '2020-09-09 00:00:00', NULL, NULL, 1);
INSERT INTO public.master_term_data VALUES (2, 'Perempuan', '2020-09-09 00:00:00', NULL, NULL, 1);
INSERT INTO public.master_term_data VALUES (3, 'Tetap', '2020-09-09 00:00:00', NULL, NULL, 2);
INSERT INTO public.master_term_data VALUES (4, 'Honor', '2020-09-09 00:00:00', NULL, NULL, 2);


--
-- Data for Name: master_unit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_unit VALUES ('5254049b-a5fb-dec7-4e5f-49f634ebc8a7', 'PLN INDUK SUMATERA', '061xxx', 'Jalan', NULL, '2020-09-09 00:00:00', NULL, NULL, 1, NULL);
INSERT INTO public.master_unit VALUES ('0ef86727-90dc-00da-5e67-e08339e7e054', 'SEKTOR 1', '01020', 'Jalan lagi', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-09 02:41:07', '2020-09-09 02:42:09', '2020-09-09 02:42:16', 2, 'S001');
INSERT INTO public.master_unit VALUES ('2a041306-1151-1ce9-1945-7cc1f0e365fb', 'Sektor A', '0010-0002', 'Medan', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-11 23:01:18', '2020-09-12 15:50:14', '2020-09-12 15:50:52', 2, 'S01');
INSERT INTO public.master_unit VALUES ('b9e2ca60-c42a-592c-0319-7383cec4bd07', 'Sektor A', '0001-0002', 'Medan', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 15:51:05', NULL, NULL, 2, 'S01');
INSERT INTO public.master_unit VALUES ('273c9d90-cf5e-44d6-6d2f-e603882e9c26', 'Sektor B', '0002-0003', 'Tebing Tinggi', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 15:50:38', '2020-09-12 15:51:13', NULL, 2, 'S02');


--
-- Name: log_login_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.log_login_id_seq', 1, false);


--
-- Name: master_aset_kategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_aset_kategori_id_seq', 1, false);


--
-- Name: master_aset_subkategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_aset_subkategori_id_seq', 3, true);


--
-- Name: master_aset_subkategori_parameter_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_aset_subkategori_parameter_id_seq', 1, true);


--
-- Name: master_term_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_term_data_id_seq', 1, false);


--
-- Name: master_term_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_term_id_seq', 1, false);


--
-- Name: master_aset_kategori master_aset_kategori_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_kategori
    ADD CONSTRAINT master_aset_kategori_pkey PRIMARY KEY (id);


--
-- Name: master_aset_subkategori_identitas master_aset_subkategori_identitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori_identitas
    ADD CONSTRAINT master_aset_subkategori_identitas_pkey PRIMARY KEY (id);


--
-- Name: master_aset_subkategori_parameter master_aset_subkategori_parameter_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori_parameter
    ADD CONSTRAINT master_aset_subkategori_parameter_pkey PRIMARY KEY (id);


--
-- Name: master_aset_subkategori master_aset_subkategori_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori
    ADD CONSTRAINT master_aset_subkategori_pkey PRIMARY KEY (id);


--
-- Name: master_pegawai_bidang master_bidang_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_pegawai_bidang
    ADD CONSTRAINT master_bidang_pkey PRIMARY KEY (uid);


--
-- Name: master_pegawai_jabatan master_jabatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_pegawai_jabatan
    ADD CONSTRAINT master_jabatan_pkey PRIMARY KEY (uid);


--
-- Name: master_pegawai master_pegawai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_pegawai
    ADD CONSTRAINT master_pegawai_pkey PRIMARY KEY (uid);


--
-- Name: master_term_data master_term_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term_data
    ADD CONSTRAINT master_term_data_pkey PRIMARY KEY (id);


--
-- Name: master_term master_term_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term
    ADD CONSTRAINT master_term_pkey PRIMARY KEY (id);


--
-- Name: master_unit master_unit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_unit
    ADD CONSTRAINT master_unit_pkey PRIMARY KEY (uid);


--
-- PostgreSQL database dump complete
--

