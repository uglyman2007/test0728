--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: postgres
--

CREATE PROCEDURAL LANGUAGE plpgsql;


ALTER PROCEDURAL LANGUAGE plpgsql OWNER TO postgres;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: class; Type: TABLE; Schema: public; Owner: daniel; Tablespace: 
--

CREATE TABLE class (
    id integer NOT NULL,
    name character varying(10) NOT NULL,
    address character varying(120) NOT NULL,
    birthday date NOT NULL,
    math smallint NOT NULL,
    english smallint NOT NULL,
    history smallint NOT NULL,
    total smallint NOT NULL
);


ALTER TABLE public.class OWNER TO daniel;

--
-- Name: class_id_seq; Type: SEQUENCE; Schema: public; Owner: daniel
--

CREATE SEQUENCE class_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.class_id_seq OWNER TO daniel;

--
-- Name: class_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: daniel
--

ALTER SEQUENCE class_id_seq OWNED BY class.id;


--
-- Name: class_id_seq; Type: SEQUENCE SET; Schema: public; Owner: daniel
--

SELECT pg_catalog.setval('class_id_seq', 8, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: daniel
--

ALTER TABLE class ALTER COLUMN id SET DEFAULT nextval('class_id_seq'::regclass);


--
-- Data for Name: class; Type: TABLE DATA; Schema: public; Owner: daniel
--

COPY class (id, name, address, birthday, math, english, history, total) FROM stdin;
1	李大華	台北市忠孝東路100號	1997-03-07	90	94	92	276
2	陳小明	台北市信義路23號	1997-02-01	82	88	90	260
3	劉小珍	台北市仁愛路332號	1997-08-03	89	87	78	254
4	廖小敏	台北市和平路194號	1997-10-21	75	80	85	240
5	吳大龍	台北市萬華路90號	1997-05-17	63	71	68	202
6	辛小君	台北市辛亥路4號	1997-06-22	91	88	84	263
7	趙大志	台北市基隆路211號	1997-09-13	83	92	88	263
8	賴大平	台北市松平路112號	1997-04-30	96	98	95	289
\.


--
-- Name: class_pkey; Type: CONSTRAINT; Schema: public; Owner: daniel; Tablespace: 
--

ALTER TABLE ONLY class
    ADD CONSTRAINT class_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

