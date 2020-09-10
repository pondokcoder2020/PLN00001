--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5
-- Dumped by pg_dump version 11.5

-- Started on 2020-09-09 03:08:50

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

--
-- TOC entry 205 (class 1255 OID 210556)
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
-- TOC entry 203 (class 1259 OID 210593)
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
-- TOC entry 204 (class 1259 OID 210599)
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
-- TOC entry 2864 (class 0 OID 0)
-- Dependencies: 204
-- Name: log_login_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.log_login_id_seq OWNED BY public.log_login.id;


--
-- TOC entry 197 (class 1259 OID 210558)
-- Name: master_jabatan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_jabatan (
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    nama character varying,
    uid_parent uuid,
    uid_unit uuid,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE public.master_jabatan OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 210567)
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
    id_jenkel smallint,
    last_login timestamp without time zone,
    password character varying
);


ALTER TABLE public.master_pegawai OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 210579)
-- Name: master_term; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_term (
    id integer NOT NULL,
    nama character varying(50)
);


ALTER TABLE public.master_term OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 210587)
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
-- TOC entry 201 (class 1259 OID 210585)
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
-- TOC entry 2865 (class 0 OID 0)
-- Dependencies: 201
-- Name: master_term_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_term_data_id_seq OWNED BY public.master_term_data.id;


--
-- TOC entry 199 (class 1259 OID 210577)
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
-- TOC entry 2866 (class 0 OID 0)
-- Dependencies: 199
-- Name: master_term_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_term_id_seq OWNED BY public.master_term.id;


--
-- TOC entry 196 (class 1259 OID 210551)
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
-- TOC entry 2717 (class 2604 OID 210582)
-- Name: master_term id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term ALTER COLUMN id SET DEFAULT nextval('public.master_term_id_seq'::regclass);


--
-- TOC entry 2718 (class 2604 OID 210590)
-- Name: master_term_data id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term_data ALTER COLUMN id SET DEFAULT nextval('public.master_term_data_id_seq'::regclass);


--
-- TOC entry 2857 (class 0 OID 210593)
-- Dependencies: 203
-- Data for Name: log_login; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2851 (class 0 OID 210558)
-- Dependencies: 197
-- Data for Name: master_jabatan; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2852 (class 0 OID 210567)
-- Dependencies: 198
-- Data for Name: master_pegawai; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_pegawai (uid, nip, nama, foto, is_login, created_at, updated_at, deleted_at, uid_unit, id_jenkel, last_login, password) VALUES ('5254049b-a5fb-dec7-4e5f-49f634ebc8a9', 'admininduk', 'Admin Induk', 'user.png', 'N', '2020-09-09 00:00:00', NULL, NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', NULL, NULL, 'TVRJeg==');


--
-- TOC entry 2854 (class 0 OID 210579)
-- Dependencies: 200
-- Data for Name: master_term; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_term (id, nama) VALUES (1, 'Jenis Kelamin');


--
-- TOC entry 2856 (class 0 OID 210587)
-- Dependencies: 202
-- Data for Name: master_term_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_term_data (id, nama, created_at, updated_at, deleted_at, id_term) VALUES (1, 'Laki-laki', '2020-09-09 00:00:00', NULL, NULL, 1);
INSERT INTO public.master_term_data (id, nama, created_at, updated_at, deleted_at, id_term) VALUES (2, 'Perempuan', '2020-09-09 00:00:00', NULL, NULL, NULL);


--
-- TOC entry 2850 (class 0 OID 210551)
-- Dependencies: 196
-- Data for Name: master_unit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('5254049b-a5fb-dec7-4e5f-49f634ebc8a7', 'PLN INDUK SUMATERA', '061xxx', 'Jalan', NULL, '2020-09-09 00:00:00', NULL, NULL, 1, NULL);
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('0ef86727-90dc-00da-5e67-e08339e7e054', 'SEKTOR 1', '01020', 'Jalan lagi', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-09 02:41:07', '2020-09-09 02:42:09', '2020-09-09 02:42:16', 2, 'S001');


--
-- TOC entry 2867 (class 0 OID 0)
-- Dependencies: 204
-- Name: log_login_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.log_login_id_seq', 1, false);


--
-- TOC entry 2868 (class 0 OID 0)
-- Dependencies: 201
-- Name: master_term_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_term_data_id_seq', 1, false);


--
-- TOC entry 2869 (class 0 OID 0)
-- Dependencies: 199
-- Name: master_term_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_term_id_seq', 1, false);


--
-- TOC entry 2722 (class 2606 OID 210565)
-- Name: master_jabatan master_jabatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_jabatan
    ADD CONSTRAINT master_jabatan_pkey PRIMARY KEY (uid);


--
-- TOC entry 2724 (class 2606 OID 210574)
-- Name: master_pegawai master_pegawai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_pegawai
    ADD CONSTRAINT master_pegawai_pkey PRIMARY KEY (uid);


--
-- TOC entry 2728 (class 2606 OID 210592)
-- Name: master_term_data master_term_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term_data
    ADD CONSTRAINT master_term_data_pkey PRIMARY KEY (id);


--
-- TOC entry 2726 (class 2606 OID 210584)
-- Name: master_term master_term_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term
    ADD CONSTRAINT master_term_pkey PRIMARY KEY (id);


--
-- TOC entry 2720 (class 2606 OID 210555)
-- Name: master_unit master_unit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_unit
    ADD CONSTRAINT master_unit_pkey PRIMARY KEY (uid);


-- Completed on 2020-09-09 03:08:50

--
-- PostgreSQL database dump complete
--

