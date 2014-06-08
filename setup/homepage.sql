--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: homepage; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA homepage;


--
-- Name: SCHEMA homepage; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA homepage IS 'homepage schema';


SET search_path = homepage, pg_catalog;

--
-- Name: attribtemp_id_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE attribtemp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: badname_index_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE badname_index_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: badname; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE badname (
    index integer DEFAULT nextval('badname_index_seq'::regclass) NOT NULL,
    name character varying(255) NOT NULL
);


--
-- Name: bans_id_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE bans_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: bans; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE bans (
    id integer DEFAULT nextval('bans_id_seq'::regclass) NOT NULL,
    user_id integer,
    ip character varying(8),
    until timestamp without time zone
);


--
-- Name: build_rules; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE build_rules (
    br_id integer DEFAULT nextval(('build_rules_seq'::text)::regclass) NOT NULL,
    br_type smallint NOT NULL,
    br_title_de character varying(100) NOT NULL,
    br_title_us character varying(100) NOT NULL,
    br_content_de text NOT NULL,
    br_content_us text NOT NULL
);


--
-- Name: TABLE build_rules; Type: COMMENT; Schema: homepage; Owner: -
--

COMMENT ON TABLE build_rules IS 'Homepage Building Rules';


--
-- Name: build_rules_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE build_rules_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: character_details; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE character_details (
    char_id integer NOT NULL,
    description_de text,
    description_us text,
    story_de text,
    story_us text,
    picture character varying(50),
    picture_height integer,
    picture_width integer,
    votes_count integer DEFAULT 0 NOT NULL,
    votes_result smallint DEFAULT 5 NOT NULL,
    settings integer DEFAULT 0 NOT NULL
);


--
-- Name: character_votes; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE character_votes (
    user_id integer NOT NULL,
    char_id integer NOT NULL,
    vote smallint NOT NULL
);


--
-- Name: mail_cert; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE mail_cert (
    id bigint NOT NULL,
    key character varying(32) NOT NULL,
    type smallint DEFAULT 0 NOT NULL
);


--
-- Name: monthly_arena; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE monthly_arena (
    id integer NOT NULL,
    points integer DEFAULT 0 NOT NULL
);


--
-- Name: monthly_explorer; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE monthly_explorer (
    id integer NOT NULL,
    points integer DEFAULT 0 NOT NULL
);


--
-- Name: monthly_money; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE monthly_money (
    id integer NOT NULL,
    points integer DEFAULT 0 NOT NULL
);


--
-- Name: monthly_treasure; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE monthly_treasure (
    id integer NOT NULL,
    points integer DEFAULT 0 NOT NULL
);


--
-- Name: news; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE news (
    n_id integer DEFAULT nextval(('news_seq'::text)::regclass) NOT NULL,
    n_user_id integer NOT NULL,
    n_published_at timestamp without time zone DEFAULT now() NOT NULL,
    n_use_capital smallint NOT NULL,
    n_title_de character varying(255) NOT NULL,
    n_title_us character varying(255) NOT NULL,
    n_content_de text NOT NULL,
    n_content_us text NOT NULL
);


--
-- Name: TABLE news; Type: COMMENT; Schema: homepage; Owner: -
--

COMMENT ON TABLE news IS 'Homepage News';


--
-- Name: news_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE news_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: quest_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE quest_seq
    START WITH 166
    INCREMENT BY 1
    MINVALUE 166
    NO MAXVALUE
    CACHE 1;


--
-- Name: quests; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE quests (
    q_id integer DEFAULT nextval(('quest_seq'::text)::regclass) NOT NULL,
    q_user_id integer NOT NULL,
    q_published_at timestamp without time zone DEFAULT now() NOT NULL,
    q_status smallint DEFAULT 0 NOT NULL,
    q_type smallint NOT NULL,
    q_starttime timestamp without time zone,
    q_title_de character varying(255),
    q_title_us character varying(255),
    q_content_de text,
    q_content_us text
);


--
-- Name: TABLE quests; Type: COMMENT; Schema: homepage; Owner: -
--

COMMENT ON TABLE quests IS 'Homepage Quests';


--
-- Name: richest; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE richest (
    id integer NOT NULL,
    money integer NOT NULL
);


--
-- Name: TABLE richest; Type: COMMENT; Schema: homepage; Owner: -
--

COMMENT ON TABLE richest IS 'Richest characters on the gameserver';


--
-- Name: session_keys; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE session_keys (
    ses_key_id character varying(32) DEFAULT 0 NOT NULL,
    ses_user_id integer DEFAULT 0 NOT NULL,
    ses_last_ip inet NOT NULL,
    ses_last_login integer DEFAULT 0 NOT NULL
);


--
-- Name: startpack_id_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE startpack_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: startplace_id_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE startplace_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: statistics; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE statistics (
    stat_date date NOT NULL,
    stat_active_accounts integer NOT NULL,
    stat_new_accounts integer NOT NULL,
    stat_active_chars integer DEFAULT 0 NOT NULL,
    stat_german integer DEFAULT 0 NOT NULL
);


--
-- Name: storage; Type: TABLE; Schema: homepage; Owner: -; Tablespace: 
--

CREATE TABLE storage (
    s_id integer DEFAULT nextval(('storage_seq'::text)::regclass) NOT NULL,
    s_key character varying(100) NOT NULL,
    s_value integer NOT NULL
);


--
-- Name: storage_seq; Type: SEQUENCE; Schema: homepage; Owner: -
--

CREATE SEQUENCE storage_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: badname_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY badname
    ADD CONSTRAINT badname_pkey PRIMARY KEY (index);


--
-- Name: bans_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY bans
    ADD CONSTRAINT bans_pkey PRIMARY KEY (id);


--
-- Name: build_rules_br_id_key; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY build_rules
    ADD CONSTRAINT build_rules_br_id_key UNIQUE (br_id);


--
-- Name: character_details_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY character_details
    ADD CONSTRAINT character_details_pkey PRIMARY KEY (char_id);


--
-- Name: character_votes_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY character_votes
    ADD CONSTRAINT character_votes_pkey PRIMARY KEY (user_id, char_id);


--
-- Name: mail_cert_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mail_cert
    ADD CONSTRAINT mail_cert_pkey PRIMARY KEY (id);


--
-- Name: monthly_arena_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY monthly_arena
    ADD CONSTRAINT monthly_arena_pkey PRIMARY KEY (id);


--
-- Name: monthly_explorer_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY monthly_explorer
    ADD CONSTRAINT monthly_explorer_pkey PRIMARY KEY (id);


--
-- Name: monthly_money_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY monthly_money
    ADD CONSTRAINT monthly_money_pkey PRIMARY KEY (id);


--
-- Name: monthly_treasure_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY monthly_treasure
    ADD CONSTRAINT monthly_treasure_pkey PRIMARY KEY (id);


--
-- Name: news_n_id_key; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY news
    ADD CONSTRAINT news_n_id_key UNIQUE (n_id);


--
-- Name: quests_q_id_key; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY quests
    ADD CONSTRAINT quests_q_id_key UNIQUE (q_id);


--
-- Name: richest_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY richest
    ADD CONSTRAINT richest_pkey PRIMARY KEY (id);


--
-- Name: session_keys_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY session_keys
    ADD CONSTRAINT session_keys_pkey PRIMARY KEY (ses_key_id, ses_user_id);


--
-- Name: statistics_pkey; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY statistics
    ADD CONSTRAINT statistics_pkey PRIMARY KEY (stat_date);


--
-- Name: storage_s_id_key; Type: CONSTRAINT; Schema: homepage; Owner: -; Tablespace: 
--

ALTER TABLE ONLY storage
    ADD CONSTRAINT storage_s_id_key UNIQUE (s_id);


--
-- Name: key; Type: INDEX; Schema: homepage; Owner: -; Tablespace: 
--

CREATE UNIQUE INDEX key ON mail_cert USING btree (key);


--
-- Name: news_n_user_id_fkey; Type: FK CONSTRAINT; Schema: homepage; Owner: -
--

ALTER TABLE ONLY news
    ADD CONSTRAINT news_n_user_id_fkey FOREIGN KEY (n_user_id) REFERENCES accounts.account(acc_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: quests_q_user_id_fkey; Type: FK CONSTRAINT; Schema: homepage; Owner: -
--

ALTER TABLE ONLY quests
    ADD CONSTRAINT quests_q_user_id_fkey FOREIGN KEY (q_user_id) REFERENCES accounts.account(acc_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: session_keys_ses_user_id_fkey; Type: FK CONSTRAINT; Schema: homepage; Owner: -
--

ALTER TABLE ONLY session_keys
    ADD CONSTRAINT session_keys_ses_user_id_fkey FOREIGN KEY (ses_user_id) REFERENCES accounts.account(acc_id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

