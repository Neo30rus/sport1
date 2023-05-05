--
-- PostgreSQL database dump
--

-- Dumped from database version 10.12
-- Dumped by pg_dump version 10.12

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
-- Name: sport_market; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE sport_market WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';


ALTER DATABASE sport_market OWNER TO postgres;

\connect sport_market

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
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: catalog; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.catalog (
    id integer NOT NULL,
    type_id integer NOT NULL,
    description text,
    price double precision NOT NULL,
    count integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.catalog OWNER TO postgres;

--
-- Name: catalog_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.catalog_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.catalog_id_seq OWNER TO postgres;

--
-- Name: catalog_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.catalog_id_seq OWNED BY public.catalog.id;


--
-- Name: product_type; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_type (
    id integer NOT NULL,
    name character varying(50) NOT NULL
);


ALTER TABLE public.product_type OWNER TO postgres;

--
-- Name: product_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_type_id_seq OWNER TO postgres;

--
-- Name: product_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_type_id_seq OWNED BY public.product_type.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    email character varying(50) NOT NULL,
    password character varying(100) NOT NULL,
    is_admin boolean DEFAULT false NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: catalog id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalog ALTER COLUMN id SET DEFAULT nextval('public.catalog_id_seq'::regclass);


--
-- Name: product_type id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_type ALTER COLUMN id SET DEFAULT nextval('public.product_type_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: catalog; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.catalog (id, type_id, description, price, count) FROM stdin;
1	1	Беговые кроссовки Joma R.Hispalis Lady Negro	8999	1
\.


--
-- Data for Name: product_type; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_type (id, name) FROM stdin;
1	обувь
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, email, password, is_admin) FROM stdin;
1	1111	$2y$10$s/0jXM1NtVl17FU0Ef7HweY3kZN.IXAITbYieiFO./2uhyBH0ON9i	f
2	wer@mail.ru	$2y$10$b7/Let1OVB0Z78vSI26hReSOfM/Mv2JQLef0I2rn/x4X/lKbFTfFm	f
\.


--
-- Name: catalog_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.catalog_id_seq', 1, true);


--
-- Name: product_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_type_id_seq', 1, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 2, true);


--
-- Name: catalog catalog_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalog
    ADD CONSTRAINT catalog_pk PRIMARY KEY (id);


--
-- Name: product_type product_type_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_type
    ADD CONSTRAINT product_type_pk PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users_email_uindex; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX users_email_uindex ON public.users USING btree (email);


--
-- Name: catalog catalog_product_type_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.catalog
    ADD CONSTRAINT catalog_product_type_id_fk FOREIGN KEY (type_id) REFERENCES public.product_type(id);


--
-- PostgreSQL database dump complete
--

