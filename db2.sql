--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5
-- Dumped by pg_dump version 11.5

-- Started on 2020-09-20 10:03:22

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
-- TOC entry 214 (class 1255 OID 210753)
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
-- TOC entry 196 (class 1259 OID 210754)
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
-- TOC entry 197 (class 1259 OID 210760)
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
-- TOC entry 2924 (class 0 OID 0)
-- Dependencies: 197
-- Name: log_login_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.log_login_id_seq OWNED BY public.log_login.id;


--
-- TOC entry 198 (class 1259 OID 210762)
-- Name: master_aset_kategori; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_aset_kategori (
    id integer NOT NULL,
    nama character varying(50)
);


ALTER TABLE public.master_aset_kategori OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 210765)
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
-- TOC entry 2925 (class 0 OID 0)
-- Dependencies: 199
-- Name: master_aset_kategori_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_aset_kategori_id_seq OWNED BY public.master_aset_kategori.id;


--
-- TOC entry 200 (class 1259 OID 210767)
-- Name: master_aset_subkategori; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_aset_subkategori (
    id integer NOT NULL,
    nama character varying(50),
    id_kategori smallint
);


ALTER TABLE public.master_aset_subkategori OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 210770)
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
-- TOC entry 2926 (class 0 OID 0)
-- Dependencies: 201
-- Name: master_aset_subkategori_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_aset_subkategori_id_seq OWNED BY public.master_aset_subkategori.id;


--
-- TOC entry 202 (class 1259 OID 210772)
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
-- TOC entry 203 (class 1259 OID 210779)
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
-- TOC entry 204 (class 1259 OID 210785)
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
-- TOC entry 2927 (class 0 OID 0)
-- Dependencies: 204
-- Name: master_aset_subkategori_parameter_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_aset_subkategori_parameter_id_seq OWNED BY public.master_aset_subkategori_parameter.id;


--
-- TOC entry 206 (class 1259 OID 210795)
-- Name: master_bidang; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_bidang (
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    nama character varying(255),
    keterangan text,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    id_level smallint
);


ALTER TABLE public.master_bidang OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 210802)
-- Name: master_jabatan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_jabatan (
    uid uuid DEFAULT public.gen_uuid() NOT NULL,
    nama character varying,
    uid_parent uuid,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone,
    id_level smallint
);


ALTER TABLE public.master_jabatan OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 210787)
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
-- TOC entry 213 (class 1259 OID 210848)
-- Name: master_perusahaan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_perusahaan (
    uid uuid NOT NULL,
    nama character varying,
    no_telepon character varying,
    email character varying,
    alamat character varying,
    pj character varying,
    username character varying,
    password character varying,
    tanggal_mulai_kerjasama date,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    deleted_at timestamp without time zone
);


ALTER TABLE public.master_perusahaan OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 210809)
-- Name: master_term; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.master_term (
    id integer NOT NULL,
    nama character varying(50)
);


ALTER TABLE public.master_term OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 210812)
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
-- TOC entry 210 (class 1259 OID 210815)
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
-- TOC entry 2928 (class 0 OID 0)
-- Dependencies: 210
-- Name: master_term_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_term_data_id_seq OWNED BY public.master_term_data.id;


--
-- TOC entry 211 (class 1259 OID 210817)
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
-- TOC entry 2929 (class 0 OID 0)
-- Dependencies: 211
-- Name: master_term_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.master_term_id_seq OWNED BY public.master_term.id;


--
-- TOC entry 212 (class 1259 OID 210819)
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
-- TOC entry 2747 (class 2604 OID 210823)
-- Name: master_aset_kategori id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_kategori ALTER COLUMN id SET DEFAULT nextval('public.master_aset_kategori_id_seq'::regclass);


--
-- TOC entry 2748 (class 2604 OID 210824)
-- Name: master_aset_subkategori id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori ALTER COLUMN id SET DEFAULT nextval('public.master_aset_subkategori_id_seq'::regclass);


--
-- TOC entry 2750 (class 2604 OID 210825)
-- Name: master_aset_subkategori_parameter id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori_parameter ALTER COLUMN id SET DEFAULT nextval('public.master_aset_subkategori_parameter_id_seq'::regclass);


--
-- TOC entry 2755 (class 2604 OID 210826)
-- Name: master_term id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term ALTER COLUMN id SET DEFAULT nextval('public.master_term_id_seq'::regclass);


--
-- TOC entry 2756 (class 2604 OID 210827)
-- Name: master_term_data id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term_data ALTER COLUMN id SET DEFAULT nextval('public.master_term_data_id_seq'::regclass);


--
-- TOC entry 2901 (class 0 OID 210754)
-- Dependencies: 196
-- Data for Name: log_login; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2903 (class 0 OID 210762)
-- Dependencies: 198
-- Data for Name: master_aset_kategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_aset_kategori (id, nama) VALUES (1, 'Fire Protection System');
INSERT INTO public.master_aset_kategori (id, nama) VALUES (2, 'Tools Kesehatan');


--
-- TOC entry 2905 (class 0 OID 210767)
-- Dependencies: 200
-- Data for Name: master_aset_subkategori; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (1, 'Mobil Pemadam Kebakaran', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (2, 'APAR', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (3, 'APAB', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (4, 'Hydrant Box', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (5, 'Hydrant Pillar', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (6, 'Smoke Detector', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (7, 'Head Detector', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (8, 'Fire Alarm', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (9, 'Sprinkle', 1);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (10, 'Kotak P3K', 2);
INSERT INTO public.master_aset_subkategori (id, nama, id_kategori) VALUES (11, 'Mobil Ambulance', 2);


--
-- TOC entry 2907 (class 0 OID 210772)
-- Dependencies: 202
-- Data for Name: master_aset_subkategori_identitas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2908 (class 0 OID 210779)
-- Dependencies: 203
-- Data for Name: master_aset_subkategori_parameter; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_aset_subkategori_parameter (id, nama, id_kategori, id_subkategori) VALUES (1, 'Bensin', 1, 1);
INSERT INTO public.master_aset_subkategori_parameter (id, nama, id_kategori, id_subkategori) VALUES (2, 'Roda', 1, 1);
INSERT INTO public.master_aset_subkategori_parameter (id, nama, id_kategori, id_subkategori) VALUES (3, 'Kebersihan', 1, 1);
INSERT INTO public.master_aset_subkategori_parameter (id, nama, id_kategori, id_subkategori) VALUES (4, 'Ketersediaan Air di Tangki', 1, 1);


--
-- TOC entry 2911 (class 0 OID 210795)
-- Dependencies: 206
-- Data for Name: master_bidang; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_bidang (uid, nama, keterangan, created_at, updated_at, deleted_at, id_level) VALUES ('f14e71ea-3d05-b764-d0da-671f16a9e20b', 'Kesehatan Kerja', NULL, '2020-09-20 09:50:25', NULL, NULL, 1);
INSERT INTO public.master_bidang (uid, nama, keterangan, created_at, updated_at, deleted_at, id_level) VALUES ('eade406b-dc1f-61b0-dfba-24c35ff5ff32', 'Keselamatan Kerja', NULL, '2020-09-20 09:50:36', NULL, NULL, 1);
INSERT INTO public.master_bidang (uid, nama, keterangan, created_at, updated_at, deleted_at, id_level) VALUES ('c682acf0-0a48-226f-cd6a-e0760e9b652a', 'Kesehatan Sektor', NULL, '2020-09-20 09:51:46', '2020-09-20 09:52:13', NULL, 2);
INSERT INTO public.master_bidang (uid, nama, keterangan, created_at, updated_at, deleted_at, id_level) VALUES ('fb750d6a-ce8b-8420-9995-688970034dc8', 'Keselamatan Sektor', NULL, '2020-09-20 09:55:17', NULL, NULL, 2);
INSERT INTO public.master_bidang (uid, nama, keterangan, created_at, updated_at, deleted_at, id_level) VALUES ('4044676f-239e-4fa7-178c-c4a2470de550', 'Kesehatan Layanan', NULL, '2020-09-20 09:55:34', NULL, NULL, 3);
INSERT INTO public.master_bidang (uid, nama, keterangan, created_at, updated_at, deleted_at, id_level) VALUES ('6175b4ae-e75b-9887-49f6-8418865c61db', 'Keselamatan Layanan', NULL, '2020-09-20 09:55:43', NULL, NULL, 3);


--
-- TOC entry 2912 (class 0 OID 210802)
-- Dependencies: 207
-- Data for Name: master_jabatan; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('5f861064-3019-82b6-edc7-97be309a02d0', 'PEJABAT PENGENDALI K3L', '92c39024-de26-0b56-7c5a-e2982773f8fd', '2020-09-20 09:38:13', '2020-09-20 09:38:23', NULL, 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('b9f83020-df73-5ac1-57c5-51c34964f977', 'PEJABAT OPERASIONAL KEAMANAN', '9f8f9fb1-1114-36ab-e563-5928d9a65d74', '2020-09-20 09:38:58', NULL, NULL, 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('9f8f9fb1-1114-36ab-e563-5928d9a65d74', 'PEJABAT OPERASIONAL K3', '5f861064-3019-82b6-edc7-97be309a02d0', '2020-09-20 09:38:41', '2020-09-20 09:39:10', NULL, 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('327d293e-423c-e187-eb1e-cb978b9ae6bc', 'PEJABAT OPERASIONAL LINGKUNGAN', '5f861064-3019-82b6-edc7-97be309a02d0', '2020-09-20 09:39:30', NULL, NULL, 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('1f0cf0ed-6d0f-0fb8-36fc-3ba7943aee35', 'JUNIOR TECHNICIAN KESELAMATAN DAN KESEHATAN KERJA', '9f8f9fb1-1114-36ab-e563-5928d9a65d74', '2020-09-20 09:40:11', NULL, NULL, 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('8c511a8b-cf53-94ac-6b2a-48d958b99312', 'JUNIOR KEAMANAN', 'b9f83020-df73-5ac1-57c5-51c34964f977', '2020-09-20 09:40:29', NULL, NULL, 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('ac99005c-ac71-4c0c-a4d1-50862b4a433b', 'GENERAL MANAGER', NULL, '2020-09-20 09:42:57', NULL, NULL, 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('92c39024-de26-0b56-7c5a-e2982773f8fd', 'GENERAL MANAGER', NULL, '2020-09-20 09:37:50', NULL, '2020-09-20 09:43:19', 1);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('ec61e0f7-d6b2-2ede-e679-f862b41ed9d2', 'GENERAL MANAGER', NULL, '2020-09-20 09:43:26', NULL, NULL, 2);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('1f0b813f-8df6-f132-d8c1-a8522b45930e', 'MANAGER RENBINTEK', 'ec61e0f7-d6b2-2ede-e679-f862b41ed9d2', '2020-09-20 09:43:52', NULL, NULL, 2);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('bf89e38f-b082-d808-d9be-d06bda073915', 'MANAGER UNIT PELAKSANA', NULL, '2020-09-20 09:46:33', NULL, NULL, 3);
INSERT INTO public.master_jabatan (uid, nama, uid_parent, created_at, updated_at, deleted_at, id_level) VALUES ('c3018ad2-5527-4155-a33b-76ffd5cc7fbe', 'MANAGER RENBINTEK', 'bf89e38f-b082-d808-d9be-d06bda073915', '2020-09-20 09:47:08', NULL, NULL, 3);


--
-- TOC entry 2910 (class 0 OID 210787)
-- Dependencies: 205
-- Data for Name: master_pegawai; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_pegawai (uid, nip, nama, foto, is_login, created_at, updated_at, deleted_at, uid_unit, id_jenkel, last_login, password, uid_jabatan, uid_bidang, id_kategori) VALUES ('f3cf4dbf-1331-8be4-a399-621179063adb', 'adminlayanan1', 'Admin Layanan 1', '37user3.png', 'N', '2020-09-18 01:36:50', '2020-09-18 01:47:54', NULL, 'c1495b6d-23a6-3509-5ed4-89ef6c4978b8', NULL, NULL, 'TVRJeg==', NULL, NULL, NULL);
INSERT INTO public.master_pegawai (uid, nip, nama, foto, is_login, created_at, updated_at, deleted_at, uid_unit, id_jenkel, last_login, password, uid_jabatan, uid_bidang, id_kategori) VALUES ('5541b785-39fd-49f5-a37b-8a5ca7d0c22a', 'adminsektor2', 'Admin Sektor 2', '84user3.png', 'N', '2020-09-18 11:13:45', NULL, NULL, '273c9d90-cf5e-44d6-6d2f-e603882e9c26', NULL, NULL, 'TVRJeg==', NULL, NULL, NULL);
INSERT INTO public.master_pegawai (uid, nip, nama, foto, is_login, created_at, updated_at, deleted_at, uid_unit, id_jenkel, last_login, password, uid_jabatan, uid_bidang, id_kategori) VALUES ('0b8f65e0-dfcb-f11f-574b-260d5e22fd11', '123', 'Jonatan', '47user3.png', 'N', '2020-09-13 17:49:19', '2020-09-18 11:14:54', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', NULL, NULL, 'TVRJeg==', '587f56d3-ce46-d994-cfaa-ccf83737a4b5', '677fc802-dd62-9b7d-c39c-67d9b247aa4c', 3);
INSERT INTO public.master_pegawai (uid, nip, nama, foto, is_login, created_at, updated_at, deleted_at, uid_unit, id_jenkel, last_login, password, uid_jabatan, uid_bidang, id_kategori) VALUES ('735969ae-412b-3286-0701-db5a63989b7a', '182930', 'HENDRIK', '9user3.png', 'N', '2020-09-18 11:15:18', NULL, NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', NULL, NULL, 'TVRJeg==', '26978bae-4009-acf9-0b47-37b316bc449c', NULL, 3);
INSERT INTO public.master_pegawai (uid, nip, nama, foto, is_login, created_at, updated_at, deleted_at, uid_unit, id_jenkel, last_login, password, uid_jabatan, uid_bidang, id_kategori) VALUES ('b2acc68e-5c8b-b277-8fc4-ed7671d1833a', 'adminsektor1', 'Admin Sektor 1', '76user3.png', 'Y', '2020-09-17 23:07:05', '2020-09-18 11:12:51', NULL, 'b9e2ca60-c42a-592c-0319-7383cec4bd07', NULL, '2020-09-18 11:15:37', 'TVRJeg==', NULL, NULL, NULL);
INSERT INTO public.master_pegawai (uid, nip, nama, foto, is_login, created_at, updated_at, deleted_at, uid_unit, id_jenkel, last_login, password, uid_jabatan, uid_bidang, id_kategori) VALUES ('5254049b-a5fb-dec7-4e5f-49f634ebc8a9', 'admininduk', 'Admin Induk', '45user3.png', 'Y', '2020-09-09 00:00:00', '2020-09-18 00:43:30', NULL, '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', NULL, '2020-09-20 09:35:23', 'TVRJeg==', NULL, NULL, NULL);


--
-- TOC entry 2918 (class 0 OID 210848)
-- Dependencies: 213
-- Data for Name: master_perusahaan; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2913 (class 0 OID 210809)
-- Dependencies: 208
-- Data for Name: master_term; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_term (id, nama) VALUES (1, 'Jenis Kelamin');
INSERT INTO public.master_term (id, nama) VALUES (2, 'Kategori Personil');


--
-- TOC entry 2914 (class 0 OID 210812)
-- Dependencies: 209
-- Data for Name: master_term_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_term_data (id, nama, created_at, updated_at, deleted_at, id_term) VALUES (1, 'Laki-laki', '2020-09-09 00:00:00', NULL, NULL, 1);
INSERT INTO public.master_term_data (id, nama, created_at, updated_at, deleted_at, id_term) VALUES (2, 'Perempuan', '2020-09-09 00:00:00', NULL, NULL, 1);
INSERT INTO public.master_term_data (id, nama, created_at, updated_at, deleted_at, id_term) VALUES (3, 'Tetap', '2020-09-09 00:00:00', NULL, NULL, 2);
INSERT INTO public.master_term_data (id, nama, created_at, updated_at, deleted_at, id_term) VALUES (4, 'Honor', '2020-09-09 00:00:00', NULL, NULL, 2);


--
-- TOC entry 2917 (class 0 OID 210819)
-- Dependencies: 212
-- Data for Name: master_unit; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('0ef86727-90dc-00da-5e67-e08339e7e054', 'SEKTOR 1', '01020', 'Jalan lagi', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-09 02:41:07', '2020-09-09 02:42:09', '2020-09-09 02:42:16', 2, 'S001');
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('2a041306-1151-1ce9-1945-7cc1f0e365fb', 'Sektor A', '0010-0002', 'Medan', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-11 23:01:18', '2020-09-12 15:50:14', '2020-09-12 15:50:52', 2, 'S01');
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('273c9d90-cf5e-44d6-6d2f-e603882e9c26', 'Sektor B', '0002-0003', 'Tebing Tinggi', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 15:50:38', '2020-09-12 15:51:13', NULL, 2, 'S02');
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('5254049b-a5fb-dec7-4e5f-49f634ebc8a7', 'UIK SUMBAGUT', '0610-0000-1', 'Jalan Medan', NULL, '2020-09-09 00:00:00', NULL, NULL, 1, 'IUK');
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('b9e2ca60-c42a-592c-0319-7383cec4bd07', 'Sektor ABC', '0001-0002', 'Medan', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-12 15:51:05', NULL, NULL, 2, 'S01');
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('5479a0c6-5269-d5f0-939f-934c8012b7fc', 'Unit Layanan 1A', '0829-03', 'd=Jalan', '5254049b-a5fb-dec7-4e5f-49f634ebc8a7', '2020-09-18 01:13:20', NULL, NULL, 3, 'UL001');
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('45287975-86cf-5b16-4118-83ebded799f1', 'Unit layanan b', '3940-4030', 'Jalan', 'b9e2ca60-c42a-592c-0319-7383cec4bd07', '2020-09-18 01:14:24', NULL, NULL, 3, 'UL002');
INSERT INTO public.master_unit (uid, nama, no_telepon, alamat, uid_parent, created_at, updated_at, deleted_at, id_level, kode) VALUES ('c1495b6d-23a6-3509-5ed4-89ef6c4978b8', 'Unit Layanan 1A', '0298-3003-039', 'Jalan lagi', 'b9e2ca60-c42a-592c-0319-7383cec4bd07', '2020-09-18 01:13:57', '2020-09-18 01:14:41', NULL, 3, 'UL001');


--
-- TOC entry 2930 (class 0 OID 0)
-- Dependencies: 197
-- Name: log_login_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.log_login_id_seq', 1, false);


--
-- TOC entry 2931 (class 0 OID 0)
-- Dependencies: 199
-- Name: master_aset_kategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_aset_kategori_id_seq', 1, false);


--
-- TOC entry 2932 (class 0 OID 0)
-- Dependencies: 201
-- Name: master_aset_subkategori_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_aset_subkategori_id_seq', 16, true);


--
-- TOC entry 2933 (class 0 OID 0)
-- Dependencies: 204
-- Name: master_aset_subkategori_parameter_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_aset_subkategori_parameter_id_seq', 1, true);


--
-- TOC entry 2934 (class 0 OID 0)
-- Dependencies: 210
-- Name: master_term_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_term_data_id_seq', 1, false);


--
-- TOC entry 2935 (class 0 OID 0)
-- Dependencies: 211
-- Name: master_term_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.master_term_id_seq', 1, false);


--
-- TOC entry 2759 (class 2606 OID 210829)
-- Name: master_aset_kategori master_aset_kategori_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_kategori
    ADD CONSTRAINT master_aset_kategori_pkey PRIMARY KEY (id);


--
-- TOC entry 2763 (class 2606 OID 210831)
-- Name: master_aset_subkategori_identitas master_aset_subkategori_identitas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori_identitas
    ADD CONSTRAINT master_aset_subkategori_identitas_pkey PRIMARY KEY (id);


--
-- TOC entry 2765 (class 2606 OID 210833)
-- Name: master_aset_subkategori_parameter master_aset_subkategori_parameter_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori_parameter
    ADD CONSTRAINT master_aset_subkategori_parameter_pkey PRIMARY KEY (id);


--
-- TOC entry 2761 (class 2606 OID 210835)
-- Name: master_aset_subkategori master_aset_subkategori_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_aset_subkategori
    ADD CONSTRAINT master_aset_subkategori_pkey PRIMARY KEY (id);


--
-- TOC entry 2769 (class 2606 OID 210837)
-- Name: master_bidang master_bidang_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_bidang
    ADD CONSTRAINT master_bidang_pkey PRIMARY KEY (uid);


--
-- TOC entry 2771 (class 2606 OID 210839)
-- Name: master_jabatan master_jabatan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_jabatan
    ADD CONSTRAINT master_jabatan_pkey PRIMARY KEY (uid);


--
-- TOC entry 2767 (class 2606 OID 210841)
-- Name: master_pegawai master_pegawai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_pegawai
    ADD CONSTRAINT master_pegawai_pkey PRIMARY KEY (uid);


--
-- TOC entry 2779 (class 2606 OID 210866)
-- Name: master_perusahaan master_perusahaan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_perusahaan
    ADD CONSTRAINT master_perusahaan_pkey PRIMARY KEY (uid);


--
-- TOC entry 2775 (class 2606 OID 210843)
-- Name: master_term_data master_term_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term_data
    ADD CONSTRAINT master_term_data_pkey PRIMARY KEY (id);


--
-- TOC entry 2773 (class 2606 OID 210845)
-- Name: master_term master_term_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_term
    ADD CONSTRAINT master_term_pkey PRIMARY KEY (id);


--
-- TOC entry 2777 (class 2606 OID 210847)
-- Name: master_unit master_unit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.master_unit
    ADD CONSTRAINT master_unit_pkey PRIMARY KEY (uid);


-- Completed on 2020-09-20 10:03:23

--
-- PostgreSQL database dump complete
--

