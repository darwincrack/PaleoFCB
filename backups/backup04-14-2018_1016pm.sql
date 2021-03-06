toc.dat                                                                                             0000600 0004000 0002000 00000441326 13264542003 0014450 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP                           v         	   paleo_fcb    10.3    10.3 �   �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false         �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false         �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false         �           1262    39086 	   paleo_fcb    DATABASE     �   CREATE DATABASE paleo_fcb WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Latin America.1252' LC_CTYPE = 'Spanish_Latin America.1252';
    DROP DATABASE paleo_fcb;
             postgres    false                     2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false         �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                     3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false         �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1         �            1259    39087    edadcontinental    TABLE       CREATE TABLE public.edadcontinental (
    "id_EdadContinental" integer NOT NULL,
    "Era" integer DEFAULT 4 NOT NULL,
    "Periodo" integer DEFAULT 15 NOT NULL,
    "Epoca" integer DEFAULT 60 NOT NULL,
    "Estadio" integer DEFAULT 2 NOT NULL,
    "Glacial_Interglacial" integer DEFAULT 2 NOT NULL,
    "GL_I_Duracion" character varying(45),
    "Piso_Faunistico" integer DEFAULT 22 NOT NULL,
    fauna_local character varying(45),
    "Edad_Cultural" integer DEFAULT 14 NOT NULL,
    "Isotopo" integer DEFAULT 7 NOT NULL,
    "Magnetocron" integer DEFAULT 5 NOT NULL,
    "Metodo_Fechado" integer DEFAULT 16 NOT NULL,
    "Material_Fechado" integer DEFAULT 28 NOT NULL,
    "No_Muestra" character varying(45),
    "Laboratorio" character varying(45),
    "EdadUnidadAnalisis" integer
);
 #   DROP TABLE public.edadcontinental;
       public         postgres    true    3         �            1259    39101 &   edadcontinental_id_EdadContinental_seq    SEQUENCE     �   CREATE SEQUENCE public."edadcontinental_id_EdadContinental_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public."edadcontinental_id_EdadContinental_seq";
       public       postgres    false    196    3         �           0    0 &   edadcontinental_id_EdadContinental_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public."edadcontinental_id_EdadContinental_seq" OWNED BY public.edadcontinental."id_EdadContinental";
            public       postgres    false    197         �            1259    39103    edadescontinentalescompleta    TABLE     �   CREATE TABLE public.edadescontinentalescompleta (
    region integer NOT NULL,
    era integer NOT NULL,
    periodo integer NOT NULL,
    epoca integer NOT NULL,
    "pisoFaun" integer NOT NULL
);
 /   DROP TABLE public.edadescontinentalescompleta;
       public         postgres    true    3         �            1259    39106    edadesmarinascompleta    TABLE     �   CREATE TABLE public.edadesmarinascompleta (
    era integer NOT NULL,
    periodo integer NOT NULL,
    epoca integer NOT NULL,
    edad integer NOT NULL
);
 )   DROP TABLE public.edadesmarinascompleta;
       public         postgres    true    3         �            1259    39109    edadmaritima    TABLE     �  CREATE TABLE public.edadmaritima (
    "id_EdadMaritima" integer NOT NULL,
    "Era" integer DEFAULT 4 NOT NULL,
    "Periodo" integer DEFAULT 15 NOT NULL,
    "Epoca" integer DEFAULT 60 NOT NULL,
    "Edad" integer DEFAULT 99 NOT NULL,
    "Edad_Unidad_Analisis" integer,
    "Metodo_Fechado" integer DEFAULT 16 NOT NULL,
    "Material_Fechado" integer DEFAULT 28 NOT NULL,
    "No_Muestra" character varying(45),
    "Laboratorio" character varying(45)
);
     DROP TABLE public.edadmaritima;
       public         postgres    true    3         �            1259    39118     edadmaritima_id_EdadMaritima_seq    SEQUENCE     �   CREATE SEQUENCE public."edadmaritima_id_EdadMaritima_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public."edadmaritima_id_EdadMaritima_seq";
       public       postgres    false    200    3         �           0    0     edadmaritima_id_EdadMaritima_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public."edadmaritima_id_EdadMaritima_seq" OWNED BY public.edadmaritima."id_EdadMaritima";
            public       postgres    false    201         �            1259    39120    especies    TABLE     �  CREATE TABLE public.especies (
    "id_Especies" integer NOT NULL,
    "Subclase" character varying(45),
    "Suborden" character varying(45),
    "Infraorden" character varying(45),
    "Subfamilia" character varying(45),
    "Genero" character varying(45),
    "Especie" character varying(45),
    "Autor" character varying(45),
    "Sinonimias" text,
    "Taxon_Valido" character varying(45),
    "Nombre_Espaniol" character varying(45),
    "Nombre_Ingles" character varying(45),
    "id_Actividad" integer DEFAULT 5,
    "id_Clase" integer DEFAULT 11,
    "id_Dieta_A" integer DEFAULT 5,
    "id_Dieta_B" integer DEFAULT 17,
    "id_Hab_Alim_A" integer DEFAULT 5,
    "id_Hab_Alim_B" integer DEFAULT 7,
    "id_Familia" integer DEFAULT 241,
    "id_Hab_Refugio" integer DEFAULT 5,
    "id_Locomocion" integer DEFAULT 10,
    "id_Orden" integer DEFAULT 109,
    "id_Status" integer DEFAULT 6
);
    DROP TABLE public.especies;
       public         postgres    true    3         �            1259    39137    especies_id_Especies_seq    SEQUENCE     �   CREATE SEQUENCE public."especies_id_Especies_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."especies_id_Especies_seq";
       public       postgres    false    202    3         �           0    0    especies_id_Especies_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public."especies_id_Especies_seq" OWNED BY public.especies."id_Especies";
            public       postgres    false    203         �            1259    39139    glaciacionescompleta    TABLE     �   CREATE TABLE public.glaciacionescompleta (
    tipo integer NOT NULL,
    region integer NOT NULL,
    era integer NOT NULL,
    periodo integer NOT NULL,
    epoca integer NOT NULL,
    "periodoGlacial" integer NOT NULL,
    estadio integer NOT NULL
);
 (   DROP TABLE public.glaciacionescompleta;
       public         postgres    true    3         �            1259    39142    hallazgo    TABLE     w   CREATE TABLE public.hallazgo (
    id_ubicacion integer NOT NULL,
    "id_ReferenciaBibliografica" integer NOT NULL
);
    DROP TABLE public.hallazgo;
       public         postgres    true    3         �            1259    39145    materialescatalogo    TABLE     &  CREATE TABLE public.materialescatalogo (
    "id_MaterialesCatalogo" integer NOT NULL,
    "No_Catalogo" character varying(45),
    "DescripElemento" character varying(45),
    id_lado integer DEFAULT 3,
    "Imagen" character varying(45),
    "id_Especies" integer,
    "id_Elemento" integer DEFAULT 136 NOT NULL,
    "id_Parte" integer DEFAULT 4 NOT NULL,
    "id_Agente" integer DEFAULT 7 NOT NULL,
    "id_Contexto" integer DEFAULT 3 NOT NULL,
    "id_Interperismo" integer DEFAULT 7 NOT NULL,
    "id_Alojamiento" integer DEFAULT 68 NOT NULL
);
 &   DROP TABLE public.materialescatalogo;
       public         postgres    true    3         �            1259    39155 ,   materialescatalogo_id_MaterialesCatalogo_seq    SEQUENCE     �   CREATE SEQUENCE public."materialescatalogo_id_MaterialesCatalogo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 E   DROP SEQUENCE public."materialescatalogo_id_MaterialesCatalogo_seq";
       public       postgres    false    206    3         �           0    0 ,   materialescatalogo_id_MaterialesCatalogo_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public."materialescatalogo_id_MaterialesCatalogo_seq" OWNED BY public.materialescatalogo."id_MaterialesCatalogo";
            public       postgres    false    207         �            1259    39157    materialeslote    TABLE     �   CREATE TABLE public.materialeslote (
    "id_MaterialesLote" integer NOT NULL,
    "Lote" character varying(45),
    "Descripcion" text,
    "id_Especies" integer,
    "id_Alojamiento" integer DEFAULT 68 NOT NULL
);
 "   DROP TABLE public.materialeslote;
       public         postgres    true    3         �            1259    39164 $   materialeslote_id_MaterialesLote_seq    SEQUENCE     �   CREATE SEQUENCE public."materialeslote_id_MaterialesLote_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public."materialeslote_id_MaterialesLote_seq";
       public       postgres    false    3    208         �           0    0 $   materialeslote_id_MaterialesLote_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public."materialeslote_id_MaterialesLote_seq" OWNED BY public.materialeslote."id_MaterialesLote";
            public       postgres    false    209         �            1259    39166 	   meristica    TABLE       CREATE TABLE public.meristica (
    "id_Meristica" integer NOT NULL,
    "id_MaterialesCatalogo" integer NOT NULL,
    "Clave_Medida" character varying(45),
    "Descripcion_Medida" text,
    "Medida" integer,
    "Unidades" character varying(45),
    "Notas_Meristica" text
);
    DROP TABLE public.meristica;
       public         postgres    true    3         �            1259    39172    meristica_id_Meristica_seq    SEQUENCE     �   CREATE SEQUENCE public."meristica_id_Meristica_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."meristica_id_Meristica_seq";
       public       postgres    false    3    210         �           0    0    meristica_id_Meristica_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."meristica_id_Meristica_seq" OWNED BY public.meristica."id_Meristica";
            public       postgres    false    211         �            1259    39174    referenciabibliografica    TABLE     �   CREATE TABLE public.referenciabibliografica (
    "id_ReferenciaBibliografica" integer NOT NULL,
    "Anio" integer,
    "id_Referencia" integer,
    "id_Tipo_Referencia" integer
);
 +   DROP TABLE public.referenciabibliografica;
       public         postgres    true    3         �            1259    39177 6   referenciabibliografica_id_ReferenciaBibliografica_seq    SEQUENCE     �   CREATE SEQUENCE public."referenciabibliografica_id_ReferenciaBibliografica_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 O   DROP SEQUENCE public."referenciabibliografica_id_ReferenciaBibliografica_seq";
       public       postgres    false    3    212         �           0    0 6   referenciabibliografica_id_ReferenciaBibliografica_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public."referenciabibliografica_id_ReferenciaBibliografica_seq" OWNED BY public.referenciabibliografica."id_ReferenciaBibliografica";
            public       postgres    false    213         �            1259    39179    sitio    TABLE     �  CREATE TABLE public.sitio (
    "id_Sitio" integer NOT NULL,
    "Sitio" character varying(100),
    "Latitud" real,
    "Longitud" double precision,
    "CCL-E" integer,
    "CCL-N" integer,
    "UTM-E" real,
    "UTM-N" real,
    "ZonaUTM" integer,
    "id_Fuente_Altitud" integer DEFAULT 4 NOT NULL,
    "id_Ubicacion" integer,
    "Altitud" integer,
    "id_Fuente_Coord" integer DEFAULT 6 NOT NULL,
    "id_Precision_Coord" integer DEFAULT 6 NOT NULL
);
    DROP TABLE public.sitio;
       public         postgres    true    3         �            1259    39185    sitio_id_Sitio_seq    SEQUENCE     �   CREATE SEQUENCE public."sitio_id_Sitio_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public."sitio_id_Sitio_seq";
       public       postgres    false    214    3         �           0    0    sitio_id_Sitio_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public."sitio_id_Sitio_seq" OWNED BY public.sitio."id_Sitio";
            public       postgres    false    215         �            1259    39187    t_actividad    TABLE     �   CREATE TABLE public.t_actividad (
    "id_Actividad" integer NOT NULL,
    id_ca character varying(20),
    "Actividad" character varying(45)
);
    DROP TABLE public.t_actividad;
       public         postgres    true    3         �            1259    39190    t_actividad_id_Actividad_seq    SEQUENCE     �   CREATE SEQUENCE public."t_actividad_id_Actividad_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public."t_actividad_id_Actividad_seq";
       public       postgres    false    3    216         �           0    0    t_actividad_id_Actividad_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public."t_actividad_id_Actividad_seq" OWNED BY public.t_actividad."id_Actividad";
            public       postgres    false    217         �            1259    39192    t_agente    TABLE     �   CREATE TABLE public.t_agente (
    "id_Agente" integer NOT NULL,
    id_ag character varying(45),
    "Agente" character varying(200)
);
    DROP TABLE public.t_agente;
       public         postgres    true    3         �            1259    39195    t_agente_id_Agente_seq    SEQUENCE     �   CREATE SEQUENCE public."t_agente_id_Agente_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."t_agente_id_Agente_seq";
       public       postgres    false    3    218         �           0    0    t_agente_id_Agente_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public."t_agente_id_Agente_seq" OWNED BY public.t_agente."id_Agente";
            public       postgres    false    219         �            1259    39197    t_alojamiento    TABLE     �   CREATE TABLE public.t_alojamiento (
    "id_Alojamiento" integer NOT NULL,
    "Clave_Alojamiento" character varying(200),
    "Alojamiento" character varying(200)
);
 !   DROP TABLE public.t_alojamiento;
       public         postgres    true    3         �            1259    39200     t_alojamiento_id_Alojamiento_seq    SEQUENCE     �   CREATE SEQUENCE public."t_alojamiento_id_Alojamiento_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public."t_alojamiento_id_Alojamiento_seq";
       public       postgres    false    3    220         �           0    0     t_alojamiento_id_Alojamiento_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public."t_alojamiento_id_Alojamiento_seq" OWNED BY public.t_alojamiento."id_Alojamiento";
            public       postgres    false    221         �            1259    39202 	   t_altitud    TABLE     q   CREATE TABLE public.t_altitud (
    "id_Altitud" integer NOT NULL,
    "Fuente_Altitud" character varying(60)
);
    DROP TABLE public.t_altitud;
       public         postgres    true    3         �            1259    39205    t_altitud_id_Altitud_seq    SEQUENCE     �   CREATE SEQUENCE public."t_altitud_id_Altitud_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."t_altitud_id_Altitud_seq";
       public       postgres    false    222    3         �           0    0    t_altitud_id_Altitud_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public."t_altitud_id_Altitud_seq" OWNED BY public.t_altitud."id_Altitud";
            public       postgres    false    223         �            1259    39207    t_ambientedepositacion    TABLE     �   CREATE TABLE public.t_ambientedepositacion (
    id_ambiente_depositacion integer NOT NULL,
    ida character varying(45),
    ambiente_depositacion character varying(200)
);
 *   DROP TABLE public.t_ambientedepositacion;
       public         postgres    true    3         �            1259    39210 3   t_ambientedepositacion_id_ambiente_depositacion_seq    SEQUENCE     �   CREATE SEQUENCE public.t_ambientedepositacion_id_ambiente_depositacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 J   DROP SEQUENCE public.t_ambientedepositacion_id_ambiente_depositacion_seq;
       public       postgres    false    3    224                     0    0 3   t_ambientedepositacion_id_ambiente_depositacion_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.t_ambientedepositacion_id_ambiente_depositacion_seq OWNED BY public.t_ambientedepositacion.id_ambiente_depositacion;
            public       postgres    false    225         �            1259    39212    t_clase    TABLE     �   CREATE TABLE public.t_clase (
    "id_Clase" integer NOT NULL,
    "Clase" character varying(60),
    "Autor" character varying(60),
    "Anio" character varying(60)
);
    DROP TABLE public.t_clase;
       public         postgres    true    3         �            1259    39215    t_clase_id_Clase_seq    SEQUENCE     �   CREATE SEQUENCE public."t_clase_id_Clase_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."t_clase_id_Clase_seq";
       public       postgres    false    226    3                    0    0    t_clase_id_Clase_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public."t_clase_id_Clase_seq" OWNED BY public.t_clase."id_Clase";
            public       postgres    false    227         �            1259    39217    t_contaminacion    TABLE     �   CREATE TABLE public.t_contaminacion (
    id_contaminacion integer NOT NULL,
    idco character varying(45),
    contaminacion character varying(45)
);
 #   DROP TABLE public.t_contaminacion;
       public         postgres    true    3         �            1259    39220 $   t_contaminacion_id_contaminacion_seq    SEQUENCE     �   CREATE SEQUENCE public.t_contaminacion_id_contaminacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ;   DROP SEQUENCE public.t_contaminacion_id_contaminacion_seq;
       public       postgres    false    228    3                    0    0 $   t_contaminacion_id_contaminacion_seq    SEQUENCE OWNED BY     m   ALTER SEQUENCE public.t_contaminacion_id_contaminacion_seq OWNED BY public.t_contaminacion.id_contaminacion;
            public       postgres    false    229         �            1259    39222 
   t_contexto    TABLE     �   CREATE TABLE public.t_contexto (
    "id_Contexto" integer NOT NULL,
    id_ctx character varying(45),
    "Contexto" character varying(45)
);
    DROP TABLE public.t_contexto;
       public         postgres    true    3         �            1259    39225    t_contexto_id_Contexto_seq    SEQUENCE     �   CREATE SEQUENCE public."t_contexto_id_Contexto_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."t_contexto_id_Contexto_seq";
       public       postgres    false    230    3                    0    0    t_contexto_id_Contexto_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."t_contexto_id_Contexto_seq" OWNED BY public.t_contexto."id_Contexto";
            public       postgres    false    231         �            1259    39227    t_dietaa    TABLE     �   CREATE TABLE public.t_dietaa (
    "id_Dieta_A" integer NOT NULL,
    id_da character varying(45),
    "Dieta_A" character varying(45)
);
    DROP TABLE public.t_dietaa;
       public         postgres    true    3         �            1259    39230    t_dietaa_id_Dieta_A_seq    SEQUENCE     �   CREATE SEQUENCE public."t_dietaa_id_Dieta_A_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public."t_dietaa_id_Dieta_A_seq";
       public       postgres    false    3    232                    0    0    t_dietaa_id_Dieta_A_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."t_dietaa_id_Dieta_A_seq" OWNED BY public.t_dietaa."id_Dieta_A";
            public       postgres    false    233         �            1259    39232    t_dietab    TABLE     �   CREATE TABLE public.t_dietab (
    "id_Dieta_B" integer NOT NULL,
    id_db character varying(45),
    "Dieta_B" character varying(45)
);
    DROP TABLE public.t_dietab;
       public         postgres    true    3         �            1259    39235    t_dietab_id_Dieta_B_seq    SEQUENCE     �   CREATE SEQUENCE public."t_dietab_id_Dieta_B_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public."t_dietab_id_Dieta_B_seq";
       public       postgres    false    3    234                    0    0    t_dietab_id_Dieta_B_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."t_dietab_id_Dieta_B_seq" OWNED BY public.t_dietab."id_Dieta_B";
            public       postgres    false    235         �            1259    39237    t_edadcultural    TABLE     �   CREATE TABLE public.t_edadcultural (
    id_edadcultural integer NOT NULL,
    edadcultural character varying(45),
    temporalidad character varying(45)
);
 "   DROP TABLE public.t_edadcultural;
       public         postgres    true    3         �            1259    39240 "   t_edadcultural_id_edadcultural_seq    SEQUENCE     �   CREATE SEQUENCE public.t_edadcultural_id_edadcultural_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.t_edadcultural_id_edadcultural_seq;
       public       postgres    false    236    3                    0    0 "   t_edadcultural_id_edadcultural_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public.t_edadcultural_id_edadcultural_seq OWNED BY public.t_edadcultural.id_edadcultural;
            public       postgres    false    237         �            1259    39242    t_edadesmarinas    TABLE     p   CREATE TABLE public.t_edadesmarinas (
    id_edades_marinas integer NOT NULL,
    edad character varying(45)
);
 #   DROP TABLE public.t_edadesmarinas;
       public         postgres    true    3         �            1259    39245 %   t_edadesmarinas_id_edades_marinas_seq    SEQUENCE     �   CREATE SEQUENCE public.t_edadesmarinas_id_edades_marinas_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE public.t_edadesmarinas_id_edades_marinas_seq;
       public       postgres    false    238    3                    0    0 %   t_edadesmarinas_id_edades_marinas_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE public.t_edadesmarinas_id_edades_marinas_seq OWNED BY public.t_edadesmarinas.id_edades_marinas;
            public       postgres    false    239         �            1259    39247 
   t_elemento    TABLE     �   CREATE TABLE public.t_elemento (
    "id_Elemento" integer NOT NULL,
    "Clave_elemento" character varying(20),
    "Elemento" character varying(45)
);
    DROP TABLE public.t_elemento;
       public         postgres    true    3         �            1259    39250    t_elemento_id_Elemento_seq    SEQUENCE     �   CREATE SEQUENCE public."t_elemento_id_Elemento_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."t_elemento_id_Elemento_seq";
       public       postgres    false    240    3                    0    0    t_elemento_id_Elemento_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."t_elemento_id_Elemento_seq" OWNED BY public.t_elemento."id_Elemento";
            public       postgres    false    241         �            1259    39252    t_epoca    TABLE     `   CREATE TABLE public.t_epoca (
    id_epoca integer NOT NULL,
    epoca character varying(45)
);
    DROP TABLE public.t_epoca;
       public         postgres    true    3         �            1259    39255    t_epoca_id_epoca_seq    SEQUENCE     �   CREATE SEQUENCE public.t_epoca_id_epoca_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.t_epoca_id_epoca_seq;
       public       postgres    false    242    3         	           0    0    t_epoca_id_epoca_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.t_epoca_id_epoca_seq OWNED BY public.t_epoca.id_epoca;
            public       postgres    false    243         �            1259    39257    t_era    TABLE     Z   CREATE TABLE public.t_era (
    id_era integer NOT NULL,
    era character varying(45)
);
    DROP TABLE public.t_era;
       public         postgres    true    3         �            1259    39260    t_era_id_era_seq    SEQUENCE     �   CREATE SEQUENCE public.t_era_id_era_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.t_era_id_era_seq;
       public       postgres    false    244    3         
           0    0    t_era_id_era_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.t_era_id_era_seq OWNED BY public.t_era.id_era;
            public       postgres    false    245         �            1259    39262 
   t_estadios    TABLE     i   CREATE TABLE public.t_estadios (
    id_estadios integer NOT NULL,
    estadios character varying(45)
);
    DROP TABLE public.t_estadios;
       public         postgres    true    3         �            1259    39265    t_estadios_id_estadios_seq    SEQUENCE     �   CREATE SEQUENCE public.t_estadios_id_estadios_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.t_estadios_id_estadios_seq;
       public       postgres    false    246    3                    0    0    t_estadios_id_estadios_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.t_estadios_id_estadios_seq OWNED BY public.t_estadios.id_estadios;
            public       postgres    false    247         �            1259    39267    t_estado    TABLE     c   CREATE TABLE public.t_estado (
    id_estado integer NOT NULL,
    estado character varying(45)
);
    DROP TABLE public.t_estado;
       public         postgres    true    3         �            1259    39270    t_estado_id_estado_seq    SEQUENCE     �   CREATE SEQUENCE public.t_estado_id_estado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.t_estado_id_estado_seq;
       public       postgres    false    248    3                    0    0    t_estado_id_estado_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.t_estado_id_estado_seq OWNED BY public.t_estado.id_estado;
            public       postgres    false    249         �            1259    39272    t_facies    TABLE     �   CREATE TABLE public.t_facies (
    id_facies integer NOT NULL,
    idf character varying(45),
    facies character varying(45)
);
    DROP TABLE public.t_facies;
       public         postgres    true    3         �            1259    39275    t_facies_id_facies_seq    SEQUENCE     �   CREATE SEQUENCE public.t_facies_id_facies_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.t_facies_id_facies_seq;
       public       postgres    false    3    250                    0    0    t_facies_id_facies_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.t_facies_id_facies_seq OWNED BY public.t_facies.id_facies;
            public       postgres    false    251         �            1259    39277 	   t_familia    TABLE     �   CREATE TABLE public.t_familia (
    "id_Familia" integer NOT NULL,
    "Familia" character varying(45),
    "Autor" character varying(45),
    "Anio" character varying(4)
);
    DROP TABLE public.t_familia;
       public         postgres    true    3         �            1259    39280    t_familia_id_Familia_seq    SEQUENCE     �   CREATE SEQUENCE public."t_familia_id_Familia_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."t_familia_id_Familia_seq";
       public       postgres    false    3    252                    0    0    t_familia_id_Familia_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public."t_familia_id_Familia_seq" OWNED BY public.t_familia."id_Familia";
            public       postgres    false    253         �            1259    39282    t_formacion    TABLE     l   CREATE TABLE public.t_formacion (
    id_formacion integer NOT NULL,
    formacion character varying(45)
);
    DROP TABLE public.t_formacion;
       public         postgres    true    3         �            1259    39285    t_formacion_id_formacion_seq    SEQUENCE     �   CREATE SEQUENCE public.t_formacion_id_formacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.t_formacion_id_formacion_seq;
       public       postgres    false    3    254                    0    0    t_formacion_id_formacion_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.t_formacion_id_formacion_seq OWNED BY public.t_formacion.id_formacion;
            public       postgres    false    255                     1259    39287    t_fuentecoord    TABLE     �   CREATE TABLE public.t_fuentecoord (
    "id_Fuente_Coord" integer NOT NULL,
    id_fc character varying(45),
    "Fuente_Coord" character varying(45)
);
 !   DROP TABLE public.t_fuentecoord;
       public         postgres    true    3                    1259    39290 !   t_fuentecoord_id_Fuente_Coord_seq    SEQUENCE     �   CREATE SEQUENCE public."t_fuentecoord_id_Fuente_Coord_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public."t_fuentecoord_id_Fuente_Coord_seq";
       public       postgres    false    256    3                    0    0 !   t_fuentecoord_id_Fuente_Coord_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE public."t_fuentecoord_id_Fuente_Coord_seq" OWNED BY public.t_fuentecoord."id_Fuente_Coord";
            public       postgres    false    257                    1259    39292    t_glacialinterglacial    TABLE     {   CREATE TABLE public.t_glacialinterglacial (
    id_glacialinterglacial integer NOT NULL,
    idgi character varying(45)
);
 )   DROP TABLE public.t_glacialinterglacial;
       public         postgres    true    3                    1259    39295 0   t_glacialinterglacial_id_glacialinterglacial_seq    SEQUENCE     �   CREATE SEQUENCE public.t_glacialinterglacial_id_glacialinterglacial_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 G   DROP SEQUENCE public.t_glacialinterglacial_id_glacialinterglacial_seq;
       public       postgres    false    258    3                    0    0 0   t_glacialinterglacial_id_glacialinterglacial_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.t_glacialinterglacial_id_glacialinterglacial_seq OWNED BY public.t_glacialinterglacial.id_glacialinterglacial;
            public       postgres    false    259                    1259    39297 
   t_habalima    TABLE     �   CREATE TABLE public.t_habalima (
    "id_Hab_Alim_A" integer NOT NULL,
    id_haa character varying(45),
    "Hab_Alim_A" character varying(45)
);
    DROP TABLE public.t_habalima;
       public         postgres    true    3                    1259    39300    t_habalima_id_Hab_Alim_A_seq    SEQUENCE     �   CREATE SEQUENCE public."t_habalima_id_Hab_Alim_A_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public."t_habalima_id_Hab_Alim_A_seq";
       public       postgres    false    260    3                    0    0    t_habalima_id_Hab_Alim_A_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public."t_habalima_id_Hab_Alim_A_seq" OWNED BY public.t_habalima."id_Hab_Alim_A";
            public       postgres    false    261                    1259    39302 
   t_habalimb    TABLE     �   CREATE TABLE public.t_habalimb (
    "id_Hab_Alim_B" integer NOT NULL,
    id_hab character varying(45),
    "Hab_Alim_B" character varying(45)
);
    DROP TABLE public.t_habalimb;
       public         postgres    true    3                    1259    39305    t_habalimb_id_Hab_Alim_B_seq    SEQUENCE     �   CREATE SEQUENCE public."t_habalimb_id_Hab_Alim_B_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public."t_habalimb_id_Hab_Alim_B_seq";
       public       postgres    false    262    3                    0    0    t_habalimb_id_Hab_Alim_B_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public."t_habalimb_id_Hab_Alim_B_seq" OWNED BY public.t_habalimb."id_Hab_Alim_B";
            public       postgres    false    263                    1259    39307    t_habrefugio    TABLE     �   CREATE TABLE public.t_habrefugio (
    "id_Hab_Refugio" integer NOT NULL,
    id_ref character varying(45),
    "Hab_Refugio" character varying(45)
);
     DROP TABLE public.t_habrefugio;
       public         postgres    true    3         	           1259    39310    t_habrefugio_id_Hab_Refugio_seq    SEQUENCE     �   CREATE SEQUENCE public."t_habrefugio_id_Hab_Refugio_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public."t_habrefugio_id_Hab_Refugio_seq";
       public       postgres    false    264    3                    0    0    t_habrefugio_id_Hab_Refugio_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public."t_habrefugio_id_Hab_Refugio_seq" OWNED BY public.t_habrefugio."id_Hab_Refugio";
            public       postgres    false    265         
           1259    39312    t_interperismo    TABLE     �   CREATE TABLE public.t_interperismo (
    "id_Interperismo" integer NOT NULL,
    id_intem character varying(45),
    "Interperismo" character varying(45)
);
 "   DROP TABLE public.t_interperismo;
       public         postgres    true    3                    1259    39315 "   t_interperismo_id_Interperismo_seq    SEQUENCE     �   CREATE SEQUENCE public."t_interperismo_id_Interperismo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ;   DROP SEQUENCE public."t_interperismo_id_Interperismo_seq";
       public       postgres    false    266    3                    0    0 "   t_interperismo_id_Interperismo_seq    SEQUENCE OWNED BY     m   ALTER SEQUENCE public."t_interperismo_id_Interperismo_seq" OWNED BY public.t_interperismo."id_Interperismo";
            public       postgres    false    267                    1259    39317 	   t_isotopo    TABLE     f   CREATE TABLE public.t_isotopo (
    id_isotopo integer NOT NULL,
    isotopo character varying(15)
);
    DROP TABLE public.t_isotopo;
       public         postgres    true    3                    1259    39320    t_isotopo_id_isotopo_seq    SEQUENCE     �   CREATE SEQUENCE public.t_isotopo_id_isotopo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.t_isotopo_id_isotopo_seq;
       public       postgres    false    268    3                    0    0    t_isotopo_id_isotopo_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.t_isotopo_id_isotopo_seq OWNED BY public.t_isotopo.id_isotopo;
            public       postgres    false    269                    1259    39322    t_lado    TABLE     _   CREATE TABLE public.t_lado (
    id_lado integer NOT NULL,
    "Lado" character varying(45)
);
    DROP TABLE public.t_lado;
       public         postgres    true    3                    1259    39325    t_lado_id_lado_seq    SEQUENCE     �   CREATE SEQUENCE public.t_lado_id_lado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.t_lado_id_lado_seq;
       public       postgres    false    3    270                    0    0    t_lado_id_lado_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.t_lado_id_lado_seq OWNED BY public.t_lado.id_lado;
            public       postgres    false    271                    1259    39327    t_locomocion    TABLE     �   CREATE TABLE public.t_locomocion (
    "id_Locomocion" integer NOT NULL,
    id_lcmon character varying(45),
    "Locomocion" character varying(45)
);
     DROP TABLE public.t_locomocion;
       public         postgres    true    3                    1259    39330    t_locomocion_id_Locomocion_seq    SEQUENCE     �   CREATE SEQUENCE public."t_locomocion_id_Locomocion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public."t_locomocion_id_Locomocion_seq";
       public       postgres    false    3    272                    0    0    t_locomocion_id_Locomocion_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public."t_locomocion_id_Locomocion_seq" OWNED BY public.t_locomocion."id_Locomocion";
            public       postgres    false    273                    1259    39332    t_magnetocron    TABLE     �   CREATE TABLE public.t_magnetocron (
    id_magnetocron integer NOT NULL,
    idmag character varying(45),
    magnetocron character varying(45)
);
 !   DROP TABLE public.t_magnetocron;
       public         postgres    true    3                    1259    39335     t_magnetocron_id_magnetocron_seq    SEQUENCE     �   CREATE SEQUENCE public.t_magnetocron_id_magnetocron_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.t_magnetocron_id_magnetocron_seq;
       public       postgres    false    3    274                    0    0     t_magnetocron_id_magnetocron_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.t_magnetocron_id_magnetocron_seq OWNED BY public.t_magnetocron.id_magnetocron;
            public       postgres    false    275                    1259    39337    t_materialfechado    TABLE     �   CREATE TABLE public.t_materialfechado (
    id_materialfechado integer NOT NULL,
    idmf character varying(45),
    "materialFechado" character varying(45)
);
 %   DROP TABLE public.t_materialfechado;
       public         postgres    true    3                    1259    39340 (   t_materialfechado_id_materialfechado_seq    SEQUENCE     �   CREATE SEQUENCE public.t_materialfechado_id_materialfechado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.t_materialfechado_id_materialfechado_seq;
       public       postgres    false    276    3                    0    0 (   t_materialfechado_id_materialfechado_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.t_materialfechado_id_materialfechado_seq OWNED BY public.t_materialfechado.id_materialfechado;
            public       postgres    false    277                    1259    39342    t_metodofechamiento    TABLE     �   CREATE TABLE public.t_metodofechamiento (
    "id_metodoFechamiento" integer NOT NULL,
    metodofechamiento_clave character varying(5) NOT NULL,
    metodofechamiento character varying(45) NOT NULL
);
 '   DROP TABLE public.t_metodofechamiento;
       public         postgres    true    3                    1259    39345 ,   t_metodofechamiento_id_metodoFechamiento_seq    SEQUENCE     �   CREATE SEQUENCE public."t_metodofechamiento_id_metodoFechamiento_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 E   DROP SEQUENCE public."t_metodofechamiento_id_metodoFechamiento_seq";
       public       postgres    false    278    3                    0    0 ,   t_metodofechamiento_id_metodoFechamiento_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public."t_metodofechamiento_id_metodoFechamiento_seq" OWNED BY public.t_metodofechamiento."id_metodoFechamiento";
            public       postgres    false    279                    1259    39347    t_municipioprov    TABLE     z   CREATE TABLE public.t_municipioprov (
    id_municipio_prov integer NOT NULL,
    municipio_prov character varying(80)
);
 #   DROP TABLE public.t_municipioprov;
       public         postgres    true    3                    1259    39350 %   t_municipioprov_id_municipio_prov_seq    SEQUENCE     �   CREATE SEQUENCE public.t_municipioprov_id_municipio_prov_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE public.t_municipioprov_id_municipio_prov_seq;
       public       postgres    false    280    3                    0    0 %   t_municipioprov_id_municipio_prov_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE public.t_municipioprov_id_municipio_prov_seq OWNED BY public.t_municipioprov.id_municipio_prov;
            public       postgres    false    281                    1259    39352    t_orden    TABLE     �   CREATE TABLE public.t_orden (
    "id_Orden" integer NOT NULL,
    "Orden" character varying(45),
    "Autor" character varying(45),
    "Anio" character varying(4)
);
    DROP TABLE public.t_orden;
       public         postgres    true    3                    1259    39355    t_orden_id_Orden_seq    SEQUENCE     �   CREATE SEQUENCE public."t_orden_id_Orden_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."t_orden_id_Orden_seq";
       public       postgres    false    282    3                    0    0    t_orden_id_Orden_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public."t_orden_id_Orden_seq" OWNED BY public.t_orden."id_Orden";
            public       postgres    false    283                    1259    39357    t_pais    TABLE     ]   CREATE TABLE public.t_pais (
    id_pais integer NOT NULL,
    pais character varying(45)
);
    DROP TABLE public.t_pais;
       public         postgres    true    3                    1259    39360    t_pais_id_pais_seq    SEQUENCE     �   CREATE SEQUENCE public.t_pais_id_pais_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.t_pais_id_pais_seq;
       public       postgres    false    284    3                    0    0    t_pais_id_pais_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.t_pais_id_pais_seq OWNED BY public.t_pais.id_pais;
            public       postgres    false    285                    1259    39362    t_parte    TABLE     d   CREATE TABLE public.t_parte (
    "id_Parte" integer NOT NULL,
    "Parte" character varying(45)
);
    DROP TABLE public.t_parte;
       public         postgres    true    3                    1259    39365    t_parte_id_Parte_seq    SEQUENCE     �   CREATE SEQUENCE public."t_parte_id_Parte_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."t_parte_id_Parte_seq";
       public       postgres    false    286    3                    0    0    t_parte_id_Parte_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public."t_parte_id_Parte_seq" OWNED BY public.t_parte."id_Parte";
            public       postgres    false    287                     1259    39367 	   t_periodo    TABLE     f   CREATE TABLE public.t_periodo (
    id_periodo integer NOT NULL,
    periodo character varying(45)
);
    DROP TABLE public.t_periodo;
       public         postgres    true    3         !           1259    39370    t_periodo_id_periodo_seq    SEQUENCE     �   CREATE SEQUENCE public.t_periodo_id_periodo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.t_periodo_id_periodo_seq;
       public       postgres    false    288    3                     0    0    t_periodo_id_periodo_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.t_periodo_id_periodo_seq OWNED BY public.t_periodo.id_periodo;
            public       postgres    false    289         "           1259    39372    t_pisofaunistico    TABLE     }   CREATE TABLE public.t_pisofaunistico (
    id_pisofaunistico integer NOT NULL,
    "pisoFaunistico" character varying(45)
);
 $   DROP TABLE public.t_pisofaunistico;
       public         postgres    true    3         #           1259    39375 &   t_pisofaunistico_id_pisofaunistico_seq    SEQUENCE     �   CREATE SEQUENCE public.t_pisofaunistico_id_pisofaunistico_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public.t_pisofaunistico_id_pisofaunistico_seq;
       public       postgres    false    3    290         !           0    0 &   t_pisofaunistico_id_pisofaunistico_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public.t_pisofaunistico_id_pisofaunistico_seq OWNED BY public.t_pisofaunistico.id_pisofaunistico;
            public       postgres    false    291         $           1259    39377    t_precisioncoord    TABLE     �   CREATE TABLE public.t_precisioncoord (
    "id_Precision_Coord" integer NOT NULL,
    id_pc character varying(45),
    "Precision_Coord" character varying(100)
);
 $   DROP TABLE public.t_precisioncoord;
       public         postgres    true    3         %           1259    39380 '   t_precisioncoord_id_Precision_Coord_seq    SEQUENCE     �   CREATE SEQUENCE public."t_precisioncoord_id_Precision_Coord_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public."t_precisioncoord_id_Precision_Coord_seq";
       public       postgres    false    3    292         "           0    0 '   t_precisioncoord_id_Precision_Coord_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public."t_precisioncoord_id_Precision_Coord_seq" OWNED BY public.t_precisioncoord."id_Precision_Coord";
            public       postgres    false    293         &           1259    39382    t_referencia    TABLE     b   CREATE TABLE public.t_referencia (
    "id_Referencia" integer NOT NULL,
    "Referencia" text
);
     DROP TABLE public.t_referencia;
       public         postgres    true    3         '           1259    39388    t_referencia_id_Referencia_seq    SEQUENCE     �   CREATE SEQUENCE public."t_referencia_id_Referencia_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public."t_referencia_id_Referencia_seq";
       public       postgres    false    294    3         #           0    0    t_referencia_id_Referencia_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public."t_referencia_id_Referencia_seq" OWNED BY public.t_referencia."id_Referencia";
            public       postgres    false    295         (           1259    39390    t_region    TABLE     c   CREATE TABLE public.t_region (
    id_region integer NOT NULL,
    region character varying(45)
);
    DROP TABLE public.t_region;
       public         postgres    true    3         )           1259    39393    t_region_id_region_seq    SEQUENCE     �   CREATE SEQUENCE public.t_region_id_region_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.t_region_id_region_seq;
       public       postgres    false    296    3         $           0    0    t_region_id_region_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.t_region_id_region_seq OWNED BY public.t_region.id_region;
            public       postgres    false    297         *           1259    39395    t_sistemadepositacion    TABLE     �   CREATE TABLE public.t_sistemadepositacion (
    id_sistema_depositacion integer NOT NULL,
    idsd character varying(45),
    sistema_depositacion character varying(45)
);
 )   DROP TABLE public.t_sistemadepositacion;
       public         postgres    true    3         +           1259    39398 1   t_sistemadepositacion_id_sistema_depositacion_seq    SEQUENCE     �   CREATE SEQUENCE public.t_sistemadepositacion_id_sistema_depositacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 H   DROP SEQUENCE public.t_sistemadepositacion_id_sistema_depositacion_seq;
       public       postgres    false    298    3         %           0    0 1   t_sistemadepositacion_id_sistema_depositacion_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.t_sistemadepositacion_id_sistema_depositacion_seq OWNED BY public.t_sistemadepositacion.id_sistema_depositacion;
            public       postgres    false    299         ,           1259    39400    t_status    TABLE     �   CREATE TABLE public.t_status (
    "id_Status" integer NOT NULL,
    id_cs character varying(45),
    "Status" character varying(45)
);
    DROP TABLE public.t_status;
       public         postgres    true    3         -           1259    39403    t_status_id_Status_seq    SEQUENCE     �   CREATE SEQUENCE public."t_status_id_Status_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."t_status_id_Status_seq";
       public       postgres    false    300    3         &           0    0    t_status_id_Status_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public."t_status_id_Status_seq" OWNED BY public.t_status."id_Status";
            public       postgres    false    301         .           1259    39405    t_tiporeferencia    TABLE     �   CREATE TABLE public.t_tiporeferencia (
    "id_Tipo_Referencia" integer NOT NULL,
    "Tipo_Referencia" character varying(20)
);
 $   DROP TABLE public.t_tiporeferencia;
       public         postgres    true    3         /           1259    39408 '   t_tiporeferencia_id_Tipo_Referencia_seq    SEQUENCE     �   CREATE SEQUENCE public."t_tiporeferencia_id_Tipo_Referencia_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public."t_tiporeferencia_id_Tipo_Referencia_seq";
       public       postgres    false    302    3         '           0    0 '   t_tiporeferencia_id_Tipo_Referencia_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public."t_tiporeferencia_id_Tipo_Referencia_seq" OWNED BY public.t_tiporeferencia."id_Tipo_Referencia";
            public       postgres    false    303         0           1259    39410    t_tiposedad    TABLE     b   CREATE TABLE public.t_tiposedad (
    id_tipo integer NOT NULL,
    edad character varying(45)
);
    DROP TABLE public.t_tiposedad;
       public         postgres    true    3         1           1259    39413    t_tiposedad_id_tipo_seq    SEQUENCE     �   CREATE SEQUENCE public.t_tiposedad_id_tipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.t_tiposedad_id_tipo_seq;
       public       postgres    false    3    304         (           0    0    t_tiposedad_id_tipo_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.t_tiposedad_id_tipo_seq OWNED BY public.t_tiposedad.id_tipo;
            public       postgres    false    305         2           1259    39415 	   ubicacion    TABLE     "  CREATE TABLE public.ubicacion (
    "id_Ubicacion" integer NOT NULL,
    "Region" integer DEFAULT 6 NOT NULL,
    "Pais" integer DEFAULT 2 NOT NULL,
    "Estado" integer DEFAULT 33 NOT NULL,
    "Municipio_Provincia" integer DEFAULT 2458 NOT NULL,
    "Localidad" character varying(400)
);
    DROP TABLE public.ubicacion;
       public         postgres    true    3         3           1259    39422    ubicacion_completa    TABLE     �   CREATE TABLE public.ubicacion_completa (
    "Region" integer DEFAULT 0 NOT NULL,
    "Pais" integer DEFAULT 0 NOT NULL,
    "Estado" integer DEFAULT 0 NOT NULL,
    "Municipio_Provincia" integer DEFAULT 0 NOT NULL
);
 &   DROP TABLE public.ubicacion_completa;
       public         postgres    true    3         4           1259    39429    ubicacion_id_Ubicacion_seq    SEQUENCE     �   CREATE SEQUENCE public."ubicacion_id_Ubicacion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."ubicacion_id_Ubicacion_seq";
       public       postgres    false    306    3         )           0    0    ubicacion_id_Ubicacion_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."ubicacion_id_Ubicacion_seq" OWNED BY public.ubicacion."id_Ubicacion";
            public       postgres    false    308         5           1259    39431    unidadanalisis    TABLE       CREATE TABLE public.unidadanalisis (
    "id_UnidadAnalisis" integer NOT NULL,
    "Unidad_Analisis" character varying(45),
    "Litologia" character varying(300),
    "Sistema_Depositacion" integer DEFAULT 10 NOT NULL,
    "Ambiente_Depositacion" integer DEFAULT 35 NOT NULL,
    "Facie" integer DEFAULT 30 NOT NULL,
    "Formacion" integer DEFAULT 286 NOT NULL,
    "Contaminacion" integer DEFAULT 2 NOT NULL,
    "Nota_Formacion" text,
    "id_EdadContinental" integer,
    "id_EdadMaritima" integer,
    "id_Sitio" integer NOT NULL
);
 "   DROP TABLE public.unidadanalisis;
       public         postgres    true    3         6           1259    39442 $   unidadanalisis_id_UnidadAnalisis_seq    SEQUENCE     �   CREATE SEQUENCE public."unidadanalisis_id_UnidadAnalisis_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public."unidadanalisis_id_UnidadAnalisis_seq";
       public       postgres    false    3    309         *           0    0 $   unidadanalisis_id_UnidadAnalisis_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public."unidadanalisis_id_UnidadAnalisis_seq" OWNED BY public.unidadanalisis."id_UnidadAnalisis";
            public       postgres    false    310         7           1259    39444    unidadespecie    TABLE     t   CREATE TABLE public.unidadespecie (
    "id_Especies" integer NOT NULL,
    "id_UnidadAnalisis" integer NOT NULL
);
 !   DROP TABLE public.unidadespecie;
       public         postgres    true    3         �           2604    39447 "   edadcontinental id_EdadContinental    DEFAULT     �   ALTER TABLE ONLY public.edadcontinental ALTER COLUMN "id_EdadContinental" SET DEFAULT nextval('public."edadcontinental_id_EdadContinental_seq"'::regclass);
 S   ALTER TABLE public.edadcontinental ALTER COLUMN "id_EdadContinental" DROP DEFAULT;
       public       postgres    false    197    196         �           2604    39448    edadmaritima id_EdadMaritima    DEFAULT     �   ALTER TABLE ONLY public.edadmaritima ALTER COLUMN "id_EdadMaritima" SET DEFAULT nextval('public."edadmaritima_id_EdadMaritima_seq"'::regclass);
 M   ALTER TABLE public.edadmaritima ALTER COLUMN "id_EdadMaritima" DROP DEFAULT;
       public       postgres    false    201    200         �           2604    39449    especies id_Especies    DEFAULT     �   ALTER TABLE ONLY public.especies ALTER COLUMN "id_Especies" SET DEFAULT nextval('public."especies_id_Especies_seq"'::regclass);
 E   ALTER TABLE public.especies ALTER COLUMN "id_Especies" DROP DEFAULT;
       public       postgres    false    203    202         �           2604    39450 (   materialescatalogo id_MaterialesCatalogo    DEFAULT     �   ALTER TABLE ONLY public.materialescatalogo ALTER COLUMN "id_MaterialesCatalogo" SET DEFAULT nextval('public."materialescatalogo_id_MaterialesCatalogo_seq"'::regclass);
 Y   ALTER TABLE public.materialescatalogo ALTER COLUMN "id_MaterialesCatalogo" DROP DEFAULT;
       public       postgres    false    207    206         �           2604    39451     materialeslote id_MaterialesLote    DEFAULT     �   ALTER TABLE ONLY public.materialeslote ALTER COLUMN "id_MaterialesLote" SET DEFAULT nextval('public."materialeslote_id_MaterialesLote_seq"'::regclass);
 Q   ALTER TABLE public.materialeslote ALTER COLUMN "id_MaterialesLote" DROP DEFAULT;
       public       postgres    false    209    208         �           2604    39452    meristica id_Meristica    DEFAULT     �   ALTER TABLE ONLY public.meristica ALTER COLUMN "id_Meristica" SET DEFAULT nextval('public."meristica_id_Meristica_seq"'::regclass);
 G   ALTER TABLE public.meristica ALTER COLUMN "id_Meristica" DROP DEFAULT;
       public       postgres    false    211    210         �           2604    39453 2   referenciabibliografica id_ReferenciaBibliografica    DEFAULT     �   ALTER TABLE ONLY public.referenciabibliografica ALTER COLUMN "id_ReferenciaBibliografica" SET DEFAULT nextval('public."referenciabibliografica_id_ReferenciaBibliografica_seq"'::regclass);
 c   ALTER TABLE public.referenciabibliografica ALTER COLUMN "id_ReferenciaBibliografica" DROP DEFAULT;
       public       postgres    false    213    212         �           2604    39454    sitio id_Sitio    DEFAULT     t   ALTER TABLE ONLY public.sitio ALTER COLUMN "id_Sitio" SET DEFAULT nextval('public."sitio_id_Sitio_seq"'::regclass);
 ?   ALTER TABLE public.sitio ALTER COLUMN "id_Sitio" DROP DEFAULT;
       public       postgres    false    215    214         �           2604    39455    t_actividad id_Actividad    DEFAULT     �   ALTER TABLE ONLY public.t_actividad ALTER COLUMN "id_Actividad" SET DEFAULT nextval('public."t_actividad_id_Actividad_seq"'::regclass);
 I   ALTER TABLE public.t_actividad ALTER COLUMN "id_Actividad" DROP DEFAULT;
       public       postgres    false    217    216         �           2604    39456    t_agente id_Agente    DEFAULT     |   ALTER TABLE ONLY public.t_agente ALTER COLUMN "id_Agente" SET DEFAULT nextval('public."t_agente_id_Agente_seq"'::regclass);
 C   ALTER TABLE public.t_agente ALTER COLUMN "id_Agente" DROP DEFAULT;
       public       postgres    false    219    218                     2604    39457    t_alojamiento id_Alojamiento    DEFAULT     �   ALTER TABLE ONLY public.t_alojamiento ALTER COLUMN "id_Alojamiento" SET DEFAULT nextval('public."t_alojamiento_id_Alojamiento_seq"'::regclass);
 M   ALTER TABLE public.t_alojamiento ALTER COLUMN "id_Alojamiento" DROP DEFAULT;
       public       postgres    false    221    220                    2604    39458    t_altitud id_Altitud    DEFAULT     �   ALTER TABLE ONLY public.t_altitud ALTER COLUMN "id_Altitud" SET DEFAULT nextval('public."t_altitud_id_Altitud_seq"'::regclass);
 E   ALTER TABLE public.t_altitud ALTER COLUMN "id_Altitud" DROP DEFAULT;
       public       postgres    false    223    222                    2604    39459 /   t_ambientedepositacion id_ambiente_depositacion    DEFAULT     �   ALTER TABLE ONLY public.t_ambientedepositacion ALTER COLUMN id_ambiente_depositacion SET DEFAULT nextval('public.t_ambientedepositacion_id_ambiente_depositacion_seq'::regclass);
 ^   ALTER TABLE public.t_ambientedepositacion ALTER COLUMN id_ambiente_depositacion DROP DEFAULT;
       public       postgres    false    225    224                    2604    39460    t_clase id_Clase    DEFAULT     x   ALTER TABLE ONLY public.t_clase ALTER COLUMN "id_Clase" SET DEFAULT nextval('public."t_clase_id_Clase_seq"'::regclass);
 A   ALTER TABLE public.t_clase ALTER COLUMN "id_Clase" DROP DEFAULT;
       public       postgres    false    227    226                    2604    39461     t_contaminacion id_contaminacion    DEFAULT     �   ALTER TABLE ONLY public.t_contaminacion ALTER COLUMN id_contaminacion SET DEFAULT nextval('public.t_contaminacion_id_contaminacion_seq'::regclass);
 O   ALTER TABLE public.t_contaminacion ALTER COLUMN id_contaminacion DROP DEFAULT;
       public       postgres    false    229    228                    2604    39462    t_contexto id_Contexto    DEFAULT     �   ALTER TABLE ONLY public.t_contexto ALTER COLUMN "id_Contexto" SET DEFAULT nextval('public."t_contexto_id_Contexto_seq"'::regclass);
 G   ALTER TABLE public.t_contexto ALTER COLUMN "id_Contexto" DROP DEFAULT;
       public       postgres    false    231    230                    2604    39463    t_dietaa id_Dieta_A    DEFAULT     ~   ALTER TABLE ONLY public.t_dietaa ALTER COLUMN "id_Dieta_A" SET DEFAULT nextval('public."t_dietaa_id_Dieta_A_seq"'::regclass);
 D   ALTER TABLE public.t_dietaa ALTER COLUMN "id_Dieta_A" DROP DEFAULT;
       public       postgres    false    233    232                    2604    39464    t_dietab id_Dieta_B    DEFAULT     ~   ALTER TABLE ONLY public.t_dietab ALTER COLUMN "id_Dieta_B" SET DEFAULT nextval('public."t_dietab_id_Dieta_B_seq"'::regclass);
 D   ALTER TABLE public.t_dietab ALTER COLUMN "id_Dieta_B" DROP DEFAULT;
       public       postgres    false    235    234                    2604    39465    t_edadcultural id_edadcultural    DEFAULT     �   ALTER TABLE ONLY public.t_edadcultural ALTER COLUMN id_edadcultural SET DEFAULT nextval('public.t_edadcultural_id_edadcultural_seq'::regclass);
 M   ALTER TABLE public.t_edadcultural ALTER COLUMN id_edadcultural DROP DEFAULT;
       public       postgres    false    237    236         	           2604    39466 !   t_edadesmarinas id_edades_marinas    DEFAULT     �   ALTER TABLE ONLY public.t_edadesmarinas ALTER COLUMN id_edades_marinas SET DEFAULT nextval('public.t_edadesmarinas_id_edades_marinas_seq'::regclass);
 P   ALTER TABLE public.t_edadesmarinas ALTER COLUMN id_edades_marinas DROP DEFAULT;
       public       postgres    false    239    238         
           2604    39467    t_elemento id_Elemento    DEFAULT     �   ALTER TABLE ONLY public.t_elemento ALTER COLUMN "id_Elemento" SET DEFAULT nextval('public."t_elemento_id_Elemento_seq"'::regclass);
 G   ALTER TABLE public.t_elemento ALTER COLUMN "id_Elemento" DROP DEFAULT;
       public       postgres    false    241    240                    2604    39468    t_epoca id_epoca    DEFAULT     t   ALTER TABLE ONLY public.t_epoca ALTER COLUMN id_epoca SET DEFAULT nextval('public.t_epoca_id_epoca_seq'::regclass);
 ?   ALTER TABLE public.t_epoca ALTER COLUMN id_epoca DROP DEFAULT;
       public       postgres    false    243    242                    2604    39469    t_era id_era    DEFAULT     l   ALTER TABLE ONLY public.t_era ALTER COLUMN id_era SET DEFAULT nextval('public.t_era_id_era_seq'::regclass);
 ;   ALTER TABLE public.t_era ALTER COLUMN id_era DROP DEFAULT;
       public       postgres    false    245    244                    2604    39470    t_estadios id_estadios    DEFAULT     �   ALTER TABLE ONLY public.t_estadios ALTER COLUMN id_estadios SET DEFAULT nextval('public.t_estadios_id_estadios_seq'::regclass);
 E   ALTER TABLE public.t_estadios ALTER COLUMN id_estadios DROP DEFAULT;
       public       postgres    false    247    246                    2604    39471    t_estado id_estado    DEFAULT     x   ALTER TABLE ONLY public.t_estado ALTER COLUMN id_estado SET DEFAULT nextval('public.t_estado_id_estado_seq'::regclass);
 A   ALTER TABLE public.t_estado ALTER COLUMN id_estado DROP DEFAULT;
       public       postgres    false    249    248                    2604    39472    t_facies id_facies    DEFAULT     x   ALTER TABLE ONLY public.t_facies ALTER COLUMN id_facies SET DEFAULT nextval('public.t_facies_id_facies_seq'::regclass);
 A   ALTER TABLE public.t_facies ALTER COLUMN id_facies DROP DEFAULT;
       public       postgres    false    251    250                    2604    39473    t_familia id_Familia    DEFAULT     �   ALTER TABLE ONLY public.t_familia ALTER COLUMN "id_Familia" SET DEFAULT nextval('public."t_familia_id_Familia_seq"'::regclass);
 E   ALTER TABLE public.t_familia ALTER COLUMN "id_Familia" DROP DEFAULT;
       public       postgres    false    253    252                    2604    39474    t_formacion id_formacion    DEFAULT     �   ALTER TABLE ONLY public.t_formacion ALTER COLUMN id_formacion SET DEFAULT nextval('public.t_formacion_id_formacion_seq'::regclass);
 G   ALTER TABLE public.t_formacion ALTER COLUMN id_formacion DROP DEFAULT;
       public       postgres    false    255    254                    2604    39475    t_fuentecoord id_Fuente_Coord    DEFAULT     �   ALTER TABLE ONLY public.t_fuentecoord ALTER COLUMN "id_Fuente_Coord" SET DEFAULT nextval('public."t_fuentecoord_id_Fuente_Coord_seq"'::regclass);
 N   ALTER TABLE public.t_fuentecoord ALTER COLUMN "id_Fuente_Coord" DROP DEFAULT;
       public       postgres    false    257    256                    2604    39476 ,   t_glacialinterglacial id_glacialinterglacial    DEFAULT     �   ALTER TABLE ONLY public.t_glacialinterglacial ALTER COLUMN id_glacialinterglacial SET DEFAULT nextval('public.t_glacialinterglacial_id_glacialinterglacial_seq'::regclass);
 [   ALTER TABLE public.t_glacialinterglacial ALTER COLUMN id_glacialinterglacial DROP DEFAULT;
       public       postgres    false    259    258                    2604    39477    t_habalima id_Hab_Alim_A    DEFAULT     �   ALTER TABLE ONLY public.t_habalima ALTER COLUMN "id_Hab_Alim_A" SET DEFAULT nextval('public."t_habalima_id_Hab_Alim_A_seq"'::regclass);
 I   ALTER TABLE public.t_habalima ALTER COLUMN "id_Hab_Alim_A" DROP DEFAULT;
       public       postgres    false    261    260                    2604    39478    t_habalimb id_Hab_Alim_B    DEFAULT     �   ALTER TABLE ONLY public.t_habalimb ALTER COLUMN "id_Hab_Alim_B" SET DEFAULT nextval('public."t_habalimb_id_Hab_Alim_B_seq"'::regclass);
 I   ALTER TABLE public.t_habalimb ALTER COLUMN "id_Hab_Alim_B" DROP DEFAULT;
       public       postgres    false    263    262                    2604    39479    t_habrefugio id_Hab_Refugio    DEFAULT     �   ALTER TABLE ONLY public.t_habrefugio ALTER COLUMN "id_Hab_Refugio" SET DEFAULT nextval('public."t_habrefugio_id_Hab_Refugio_seq"'::regclass);
 L   ALTER TABLE public.t_habrefugio ALTER COLUMN "id_Hab_Refugio" DROP DEFAULT;
       public       postgres    false    265    264                    2604    39480    t_interperismo id_Interperismo    DEFAULT     �   ALTER TABLE ONLY public.t_interperismo ALTER COLUMN "id_Interperismo" SET DEFAULT nextval('public."t_interperismo_id_Interperismo_seq"'::regclass);
 O   ALTER TABLE public.t_interperismo ALTER COLUMN "id_Interperismo" DROP DEFAULT;
       public       postgres    false    267    266                    2604    39481    t_isotopo id_isotopo    DEFAULT     |   ALTER TABLE ONLY public.t_isotopo ALTER COLUMN id_isotopo SET DEFAULT nextval('public.t_isotopo_id_isotopo_seq'::regclass);
 C   ALTER TABLE public.t_isotopo ALTER COLUMN id_isotopo DROP DEFAULT;
       public       postgres    false    269    268                    2604    39482    t_lado id_lado    DEFAULT     p   ALTER TABLE ONLY public.t_lado ALTER COLUMN id_lado SET DEFAULT nextval('public.t_lado_id_lado_seq'::regclass);
 =   ALTER TABLE public.t_lado ALTER COLUMN id_lado DROP DEFAULT;
       public       postgres    false    271    270                    2604    39483    t_locomocion id_Locomocion    DEFAULT     �   ALTER TABLE ONLY public.t_locomocion ALTER COLUMN "id_Locomocion" SET DEFAULT nextval('public."t_locomocion_id_Locomocion_seq"'::regclass);
 K   ALTER TABLE public.t_locomocion ALTER COLUMN "id_Locomocion" DROP DEFAULT;
       public       postgres    false    273    272                    2604    39484    t_magnetocron id_magnetocron    DEFAULT     �   ALTER TABLE ONLY public.t_magnetocron ALTER COLUMN id_magnetocron SET DEFAULT nextval('public.t_magnetocron_id_magnetocron_seq'::regclass);
 K   ALTER TABLE public.t_magnetocron ALTER COLUMN id_magnetocron DROP DEFAULT;
       public       postgres    false    275    274                    2604    39485 $   t_materialfechado id_materialfechado    DEFAULT     �   ALTER TABLE ONLY public.t_materialfechado ALTER COLUMN id_materialfechado SET DEFAULT nextval('public.t_materialfechado_id_materialfechado_seq'::regclass);
 S   ALTER TABLE public.t_materialfechado ALTER COLUMN id_materialfechado DROP DEFAULT;
       public       postgres    false    277    276                    2604    39486 (   t_metodofechamiento id_metodoFechamiento    DEFAULT     �   ALTER TABLE ONLY public.t_metodofechamiento ALTER COLUMN "id_metodoFechamiento" SET DEFAULT nextval('public."t_metodofechamiento_id_metodoFechamiento_seq"'::regclass);
 Y   ALTER TABLE public.t_metodofechamiento ALTER COLUMN "id_metodoFechamiento" DROP DEFAULT;
       public       postgres    false    279    278                    2604    39487 !   t_municipioprov id_municipio_prov    DEFAULT     �   ALTER TABLE ONLY public.t_municipioprov ALTER COLUMN id_municipio_prov SET DEFAULT nextval('public.t_municipioprov_id_municipio_prov_seq'::regclass);
 P   ALTER TABLE public.t_municipioprov ALTER COLUMN id_municipio_prov DROP DEFAULT;
       public       postgres    false    281    280                    2604    39488    t_orden id_Orden    DEFAULT     x   ALTER TABLE ONLY public.t_orden ALTER COLUMN "id_Orden" SET DEFAULT nextval('public."t_orden_id_Orden_seq"'::regclass);
 A   ALTER TABLE public.t_orden ALTER COLUMN "id_Orden" DROP DEFAULT;
       public       postgres    false    283    282                     2604    39489    t_pais id_pais    DEFAULT     p   ALTER TABLE ONLY public.t_pais ALTER COLUMN id_pais SET DEFAULT nextval('public.t_pais_id_pais_seq'::regclass);
 =   ALTER TABLE public.t_pais ALTER COLUMN id_pais DROP DEFAULT;
       public       postgres    false    285    284         !           2604    39490    t_parte id_Parte    DEFAULT     x   ALTER TABLE ONLY public.t_parte ALTER COLUMN "id_Parte" SET DEFAULT nextval('public."t_parte_id_Parte_seq"'::regclass);
 A   ALTER TABLE public.t_parte ALTER COLUMN "id_Parte" DROP DEFAULT;
       public       postgres    false    287    286         "           2604    39491    t_periodo id_periodo    DEFAULT     |   ALTER TABLE ONLY public.t_periodo ALTER COLUMN id_periodo SET DEFAULT nextval('public.t_periodo_id_periodo_seq'::regclass);
 C   ALTER TABLE public.t_periodo ALTER COLUMN id_periodo DROP DEFAULT;
       public       postgres    false    289    288         #           2604    39492 "   t_pisofaunistico id_pisofaunistico    DEFAULT     �   ALTER TABLE ONLY public.t_pisofaunistico ALTER COLUMN id_pisofaunistico SET DEFAULT nextval('public.t_pisofaunistico_id_pisofaunistico_seq'::regclass);
 Q   ALTER TABLE public.t_pisofaunistico ALTER COLUMN id_pisofaunistico DROP DEFAULT;
       public       postgres    false    291    290         $           2604    39493 #   t_precisioncoord id_Precision_Coord    DEFAULT     �   ALTER TABLE ONLY public.t_precisioncoord ALTER COLUMN "id_Precision_Coord" SET DEFAULT nextval('public."t_precisioncoord_id_Precision_Coord_seq"'::regclass);
 T   ALTER TABLE public.t_precisioncoord ALTER COLUMN "id_Precision_Coord" DROP DEFAULT;
       public       postgres    false    293    292         %           2604    39494    t_referencia id_Referencia    DEFAULT     �   ALTER TABLE ONLY public.t_referencia ALTER COLUMN "id_Referencia" SET DEFAULT nextval('public."t_referencia_id_Referencia_seq"'::regclass);
 K   ALTER TABLE public.t_referencia ALTER COLUMN "id_Referencia" DROP DEFAULT;
       public       postgres    false    295    294         &           2604    39495    t_region id_region    DEFAULT     x   ALTER TABLE ONLY public.t_region ALTER COLUMN id_region SET DEFAULT nextval('public.t_region_id_region_seq'::regclass);
 A   ALTER TABLE public.t_region ALTER COLUMN id_region DROP DEFAULT;
       public       postgres    false    297    296         '           2604    39496 -   t_sistemadepositacion id_sistema_depositacion    DEFAULT     �   ALTER TABLE ONLY public.t_sistemadepositacion ALTER COLUMN id_sistema_depositacion SET DEFAULT nextval('public.t_sistemadepositacion_id_sistema_depositacion_seq'::regclass);
 \   ALTER TABLE public.t_sistemadepositacion ALTER COLUMN id_sistema_depositacion DROP DEFAULT;
       public       postgres    false    299    298         (           2604    39497    t_status id_Status    DEFAULT     |   ALTER TABLE ONLY public.t_status ALTER COLUMN "id_Status" SET DEFAULT nextval('public."t_status_id_Status_seq"'::regclass);
 C   ALTER TABLE public.t_status ALTER COLUMN "id_Status" DROP DEFAULT;
       public       postgres    false    301    300         )           2604    39498 #   t_tiporeferencia id_Tipo_Referencia    DEFAULT     �   ALTER TABLE ONLY public.t_tiporeferencia ALTER COLUMN "id_Tipo_Referencia" SET DEFAULT nextval('public."t_tiporeferencia_id_Tipo_Referencia_seq"'::regclass);
 T   ALTER TABLE public.t_tiporeferencia ALTER COLUMN "id_Tipo_Referencia" DROP DEFAULT;
       public       postgres    false    303    302         *           2604    39499    t_tiposedad id_tipo    DEFAULT     z   ALTER TABLE ONLY public.t_tiposedad ALTER COLUMN id_tipo SET DEFAULT nextval('public.t_tiposedad_id_tipo_seq'::regclass);
 B   ALTER TABLE public.t_tiposedad ALTER COLUMN id_tipo DROP DEFAULT;
       public       postgres    false    305    304         /           2604    39500    ubicacion id_Ubicacion    DEFAULT     �   ALTER TABLE ONLY public.ubicacion ALTER COLUMN "id_Ubicacion" SET DEFAULT nextval('public."ubicacion_id_Ubicacion_seq"'::regclass);
 G   ALTER TABLE public.ubicacion ALTER COLUMN "id_Ubicacion" DROP DEFAULT;
       public       postgres    false    308    306         9           2604    39501     unidadanalisis id_UnidadAnalisis    DEFAULT     �   ALTER TABLE ONLY public.unidadanalisis ALTER COLUMN "id_UnidadAnalisis" SET DEFAULT nextval('public."unidadanalisis_id_UnidadAnalisis_seq"'::regclass);
 Q   ALTER TABLE public.unidadanalisis ALTER COLUMN "id_UnidadAnalisis" DROP DEFAULT;
       public       postgres    false    310    309         x          0    39087    edadcontinental 
   TABLE DATA               2  COPY public.edadcontinental ("id_EdadContinental", "Era", "Periodo", "Epoca", "Estadio", "Glacial_Interglacial", "GL_I_Duracion", "Piso_Faunistico", fauna_local, "Edad_Cultural", "Isotopo", "Magnetocron", "Metodo_Fechado", "Material_Fechado", "No_Muestra", "Laboratorio", "EdadUnidadAnalisis") FROM stdin;
    public       postgres    false    196       3448.dat z          0    39103    edadescontinentalescompleta 
   TABLE DATA               ^   COPY public.edadescontinentalescompleta (region, era, periodo, epoca, "pisoFaun") FROM stdin;
    public       postgres    false    198       3450.dat {          0    39106    edadesmarinascompleta 
   TABLE DATA               J   COPY public.edadesmarinascompleta (era, periodo, epoca, edad) FROM stdin;
    public       postgres    false    199       3451.dat |          0    39109    edadmaritima 
   TABLE DATA               �   COPY public.edadmaritima ("id_EdadMaritima", "Era", "Periodo", "Epoca", "Edad", "Edad_Unidad_Analisis", "Metodo_Fechado", "Material_Fechado", "No_Muestra", "Laboratorio") FROM stdin;
    public       postgres    false    200       3452.dat ~          0    39120    especies 
   TABLE DATA               i  COPY public.especies ("id_Especies", "Subclase", "Suborden", "Infraorden", "Subfamilia", "Genero", "Especie", "Autor", "Sinonimias", "Taxon_Valido", "Nombre_Espaniol", "Nombre_Ingles", "id_Actividad", "id_Clase", "id_Dieta_A", "id_Dieta_B", "id_Hab_Alim_A", "id_Hab_Alim_B", "id_Familia", "id_Hab_Refugio", "id_Locomocion", "id_Orden", "id_Status") FROM stdin;
    public       postgres    false    202       3454.dat �          0    39139    glaciacionescompleta 
   TABLE DATA               l   COPY public.glaciacionescompleta (tipo, region, era, periodo, epoca, "periodoGlacial", estadio) FROM stdin;
    public       postgres    false    204       3456.dat �          0    39142    hallazgo 
   TABLE DATA               N   COPY public.hallazgo (id_ubicacion, "id_ReferenciaBibliografica") FROM stdin;
    public       postgres    false    205       3457.dat �          0    39145    materialescatalogo 
   TABLE DATA               �   COPY public.materialescatalogo ("id_MaterialesCatalogo", "No_Catalogo", "DescripElemento", id_lado, "Imagen", "id_Especies", "id_Elemento", "id_Parte", "id_Agente", "id_Contexto", "id_Interperismo", "id_Alojamiento") FROM stdin;
    public       postgres    false    206       3458.dat �          0    39157    materialeslote 
   TABLE DATA               u   COPY public.materialeslote ("id_MaterialesLote", "Lote", "Descripcion", "id_Especies", "id_Alojamiento") FROM stdin;
    public       postgres    false    208       3460.dat �          0    39166 	   meristica 
   TABLE DATA               �   COPY public.meristica ("id_Meristica", "id_MaterialesCatalogo", "Clave_Medida", "Descripcion_Medida", "Medida", "Unidades", "Notas_Meristica") FROM stdin;
    public       postgres    false    210       3462.dat �          0    39174    referenciabibliografica 
   TABLE DATA               ~   COPY public.referenciabibliografica ("id_ReferenciaBibliografica", "Anio", "id_Referencia", "id_Tipo_Referencia") FROM stdin;
    public       postgres    false    212       3464.dat �          0    39179    sitio 
   TABLE DATA               �   COPY public.sitio ("id_Sitio", "Sitio", "Latitud", "Longitud", "CCL-E", "CCL-N", "UTM-E", "UTM-N", "ZonaUTM", "id_Fuente_Altitud", "id_Ubicacion", "Altitud", "id_Fuente_Coord", "id_Precision_Coord") FROM stdin;
    public       postgres    false    214       3466.dat �          0    39187    t_actividad 
   TABLE DATA               I   COPY public.t_actividad ("id_Actividad", id_ca, "Actividad") FROM stdin;
    public       postgres    false    216       3468.dat �          0    39192    t_agente 
   TABLE DATA               @   COPY public.t_agente ("id_Agente", id_ag, "Agente") FROM stdin;
    public       postgres    false    218       3470.dat �          0    39197    t_alojamiento 
   TABLE DATA               ]   COPY public.t_alojamiento ("id_Alojamiento", "Clave_Alojamiento", "Alojamiento") FROM stdin;
    public       postgres    false    220       3472.dat �          0    39202 	   t_altitud 
   TABLE DATA               C   COPY public.t_altitud ("id_Altitud", "Fuente_Altitud") FROM stdin;
    public       postgres    false    222       3474.dat �          0    39207    t_ambientedepositacion 
   TABLE DATA               f   COPY public.t_ambientedepositacion (id_ambiente_depositacion, ida, ambiente_depositacion) FROM stdin;
    public       postgres    false    224       3476.dat �          0    39212    t_clase 
   TABLE DATA               G   COPY public.t_clase ("id_Clase", "Clase", "Autor", "Anio") FROM stdin;
    public       postgres    false    226       3478.dat �          0    39217    t_contaminacion 
   TABLE DATA               P   COPY public.t_contaminacion (id_contaminacion, idco, contaminacion) FROM stdin;
    public       postgres    false    228       3480.dat �          0    39222 
   t_contexto 
   TABLE DATA               G   COPY public.t_contexto ("id_Contexto", id_ctx, "Contexto") FROM stdin;
    public       postgres    false    230       3482.dat �          0    39227    t_dietaa 
   TABLE DATA               B   COPY public.t_dietaa ("id_Dieta_A", id_da, "Dieta_A") FROM stdin;
    public       postgres    false    232       3484.dat �          0    39232    t_dietab 
   TABLE DATA               B   COPY public.t_dietab ("id_Dieta_B", id_db, "Dieta_B") FROM stdin;
    public       postgres    false    234       3486.dat �          0    39237    t_edadcultural 
   TABLE DATA               U   COPY public.t_edadcultural (id_edadcultural, edadcultural, temporalidad) FROM stdin;
    public       postgres    false    236       3488.dat �          0    39242    t_edadesmarinas 
   TABLE DATA               B   COPY public.t_edadesmarinas (id_edades_marinas, edad) FROM stdin;
    public       postgres    false    238       3490.dat �          0    39247 
   t_elemento 
   TABLE DATA               Q   COPY public.t_elemento ("id_Elemento", "Clave_elemento", "Elemento") FROM stdin;
    public       postgres    false    240       3492.dat �          0    39252    t_epoca 
   TABLE DATA               2   COPY public.t_epoca (id_epoca, epoca) FROM stdin;
    public       postgres    false    242       3494.dat �          0    39257    t_era 
   TABLE DATA               ,   COPY public.t_era (id_era, era) FROM stdin;
    public       postgres    false    244       3496.dat �          0    39262 
   t_estadios 
   TABLE DATA               ;   COPY public.t_estadios (id_estadios, estadios) FROM stdin;
    public       postgres    false    246       3498.dat �          0    39267    t_estado 
   TABLE DATA               5   COPY public.t_estado (id_estado, estado) FROM stdin;
    public       postgres    false    248       3500.dat �          0    39272    t_facies 
   TABLE DATA               :   COPY public.t_facies (id_facies, idf, facies) FROM stdin;
    public       postgres    false    250       3502.dat �          0    39277 	   t_familia 
   TABLE DATA               M   COPY public.t_familia ("id_Familia", "Familia", "Autor", "Anio") FROM stdin;
    public       postgres    false    252       3504.dat �          0    39282    t_formacion 
   TABLE DATA               >   COPY public.t_formacion (id_formacion, formacion) FROM stdin;
    public       postgres    false    254       3506.dat �          0    39287    t_fuentecoord 
   TABLE DATA               Q   COPY public.t_fuentecoord ("id_Fuente_Coord", id_fc, "Fuente_Coord") FROM stdin;
    public       postgres    false    256       3508.dat �          0    39292    t_glacialinterglacial 
   TABLE DATA               M   COPY public.t_glacialinterglacial (id_glacialinterglacial, idgi) FROM stdin;
    public       postgres    false    258       3510.dat �          0    39297 
   t_habalima 
   TABLE DATA               K   COPY public.t_habalima ("id_Hab_Alim_A", id_haa, "Hab_Alim_A") FROM stdin;
    public       postgres    false    260       3512.dat �          0    39302 
   t_habalimb 
   TABLE DATA               K   COPY public.t_habalimb ("id_Hab_Alim_B", id_hab, "Hab_Alim_B") FROM stdin;
    public       postgres    false    262       3514.dat �          0    39307    t_habrefugio 
   TABLE DATA               O   COPY public.t_habrefugio ("id_Hab_Refugio", id_ref, "Hab_Refugio") FROM stdin;
    public       postgres    false    264       3516.dat �          0    39312    t_interperismo 
   TABLE DATA               U   COPY public.t_interperismo ("id_Interperismo", id_intem, "Interperismo") FROM stdin;
    public       postgres    false    266       3518.dat �          0    39317 	   t_isotopo 
   TABLE DATA               8   COPY public.t_isotopo (id_isotopo, isotopo) FROM stdin;
    public       postgres    false    268       3520.dat �          0    39322    t_lado 
   TABLE DATA               1   COPY public.t_lado (id_lado, "Lado") FROM stdin;
    public       postgres    false    270       3522.dat �          0    39327    t_locomocion 
   TABLE DATA               O   COPY public.t_locomocion ("id_Locomocion", id_lcmon, "Locomocion") FROM stdin;
    public       postgres    false    272       3524.dat �          0    39332    t_magnetocron 
   TABLE DATA               K   COPY public.t_magnetocron (id_magnetocron, idmag, magnetocron) FROM stdin;
    public       postgres    false    274       3526.dat �          0    39337    t_materialfechado 
   TABLE DATA               X   COPY public.t_materialfechado (id_materialfechado, idmf, "materialFechado") FROM stdin;
    public       postgres    false    276       3528.dat �          0    39342    t_metodofechamiento 
   TABLE DATA               q   COPY public.t_metodofechamiento ("id_metodoFechamiento", metodofechamiento_clave, metodofechamiento) FROM stdin;
    public       postgres    false    278       3530.dat �          0    39347    t_municipioprov 
   TABLE DATA               L   COPY public.t_municipioprov (id_municipio_prov, municipio_prov) FROM stdin;
    public       postgres    false    280       3532.dat �          0    39352    t_orden 
   TABLE DATA               G   COPY public.t_orden ("id_Orden", "Orden", "Autor", "Anio") FROM stdin;
    public       postgres    false    282       3534.dat �          0    39357    t_pais 
   TABLE DATA               /   COPY public.t_pais (id_pais, pais) FROM stdin;
    public       postgres    false    284       3536.dat �          0    39362    t_parte 
   TABLE DATA               6   COPY public.t_parte ("id_Parte", "Parte") FROM stdin;
    public       postgres    false    286       3538.dat �          0    39367 	   t_periodo 
   TABLE DATA               8   COPY public.t_periodo (id_periodo, periodo) FROM stdin;
    public       postgres    false    288       3540.dat �          0    39372    t_pisofaunistico 
   TABLE DATA               O   COPY public.t_pisofaunistico (id_pisofaunistico, "pisoFaunistico") FROM stdin;
    public       postgres    false    290       3542.dat �          0    39377    t_precisioncoord 
   TABLE DATA               Z   COPY public.t_precisioncoord ("id_Precision_Coord", id_pc, "Precision_Coord") FROM stdin;
    public       postgres    false    292       3544.dat �          0    39382    t_referencia 
   TABLE DATA               E   COPY public.t_referencia ("id_Referencia", "Referencia") FROM stdin;
    public       postgres    false    294       3546.dat �          0    39390    t_region 
   TABLE DATA               5   COPY public.t_region (id_region, region) FROM stdin;
    public       postgres    false    296       3548.dat �          0    39395    t_sistemadepositacion 
   TABLE DATA               d   COPY public.t_sistemadepositacion (id_sistema_depositacion, idsd, sistema_depositacion) FROM stdin;
    public       postgres    false    298       3550.dat �          0    39400    t_status 
   TABLE DATA               @   COPY public.t_status ("id_Status", id_cs, "Status") FROM stdin;
    public       postgres    false    300       3552.dat �          0    39405    t_tiporeferencia 
   TABLE DATA               S   COPY public.t_tiporeferencia ("id_Tipo_Referencia", "Tipo_Referencia") FROM stdin;
    public       postgres    false    302       3554.dat �          0    39410    t_tiposedad 
   TABLE DATA               4   COPY public.t_tiposedad (id_tipo, edad) FROM stdin;
    public       postgres    false    304       3556.dat �          0    39415 	   ubicacion 
   TABLE DATA               s   COPY public.ubicacion ("id_Ubicacion", "Region", "Pais", "Estado", "Municipio_Provincia", "Localidad") FROM stdin;
    public       postgres    false    306       3558.dat �          0    39422    ubicacion_completa 
   TABLE DATA               _   COPY public.ubicacion_completa ("Region", "Pais", "Estado", "Municipio_Provincia") FROM stdin;
    public       postgres    false    307       3559.dat �          0    39431    unidadanalisis 
   TABLE DATA               �   COPY public.unidadanalisis ("id_UnidadAnalisis", "Unidad_Analisis", "Litologia", "Sistema_Depositacion", "Ambiente_Depositacion", "Facie", "Formacion", "Contaminacion", "Nota_Formacion", "id_EdadContinental", "id_EdadMaritima", "id_Sitio") FROM stdin;
    public       postgres    false    309       3561.dat �          0    39444    unidadespecie 
   TABLE DATA               K   COPY public.unidadespecie ("id_Especies", "id_UnidadAnalisis") FROM stdin;
    public       postgres    false    311       3563.dat +           0    0 &   edadcontinental_id_EdadContinental_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public."edadcontinental_id_EdadContinental_seq"', 37, false);
            public       postgres    false    197         ,           0    0     edadmaritima_id_EdadMaritima_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public."edadmaritima_id_EdadMaritima_seq"', 34, false);
            public       postgres    false    201         -           0    0    especies_id_Especies_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public."especies_id_Especies_seq"', 1390, false);
            public       postgres    false    203         .           0    0 ,   materialescatalogo_id_MaterialesCatalogo_seq    SEQUENCE SET     `   SELECT pg_catalog.setval('public."materialescatalogo_id_MaterialesCatalogo_seq"', 1651, false);
            public       postgres    false    207         /           0    0 $   materialeslote_id_MaterialesLote_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('public."materialeslote_id_MaterialesLote_seq"', 1, false);
            public       postgres    false    209         0           0    0    meristica_id_Meristica_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public."meristica_id_Meristica_seq"', 1, false);
            public       postgres    false    211         1           0    0 6   referenciabibliografica_id_ReferenciaBibliografica_seq    SEQUENCE SET     i   SELECT pg_catalog.setval('public."referenciabibliografica_id_ReferenciaBibliografica_seq"', 386, false);
            public       postgres    false    213         2           0    0    sitio_id_Sitio_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."sitio_id_Sitio_seq"', 1752, false);
            public       postgres    false    215         3           0    0    t_actividad_id_Actividad_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public."t_actividad_id_Actividad_seq"', 6, false);
            public       postgres    false    217         4           0    0    t_agente_id_Agente_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public."t_agente_id_Agente_seq"', 15, false);
            public       postgres    false    219         5           0    0     t_alojamiento_id_Alojamiento_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public."t_alojamiento_id_Alojamiento_seq"', 69, false);
            public       postgres    false    221         6           0    0    t_altitud_id_Altitud_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."t_altitud_id_Altitud_seq"', 5, false);
            public       postgres    false    223         7           0    0 3   t_ambientedepositacion_id_ambiente_depositacion_seq    SEQUENCE SET     c   SELECT pg_catalog.setval('public.t_ambientedepositacion_id_ambiente_depositacion_seq', 66, false);
            public       postgres    false    225         8           0    0    t_clase_id_Clase_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."t_clase_id_Clase_seq"', 12, false);
            public       postgres    false    227         9           0    0 $   t_contaminacion_id_contaminacion_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public.t_contaminacion_id_contaminacion_seq', 5, false);
            public       postgres    false    229         :           0    0    t_contexto_id_Contexto_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public."t_contexto_id_Contexto_seq"', 5, false);
            public       postgres    false    231         ;           0    0    t_dietaa_id_Dieta_A_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public."t_dietaa_id_Dieta_A_seq"', 7, false);
            public       postgres    false    233         <           0    0    t_dietab_id_Dieta_B_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."t_dietab_id_Dieta_B_seq"', 18, false);
            public       postgres    false    235         =           0    0 "   t_edadcultural_id_edadcultural_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public.t_edadcultural_id_edadcultural_seq', 15, false);
            public       postgres    false    237         >           0    0 %   t_edadesmarinas_id_edades_marinas_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.t_edadesmarinas_id_edades_marinas_seq', 106, false);
            public       postgres    false    239         ?           0    0    t_elemento_id_Elemento_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public."t_elemento_id_Elemento_seq"', 137, false);
            public       postgres    false    241         @           0    0    t_epoca_id_epoca_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.t_epoca_id_epoca_seq', 63, false);
            public       postgres    false    243         A           0    0    t_era_id_era_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.t_era_id_era_seq', 5, false);
            public       postgres    false    245         B           0    0    t_estadios_id_estadios_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.t_estadios_id_estadios_seq', 10, false);
            public       postgres    false    247         C           0    0    t_estado_id_estado_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.t_estado_id_estado_seq', 34, false);
            public       postgres    false    249         D           0    0    t_facies_id_facies_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.t_facies_id_facies_seq', 41, false);
            public       postgres    false    251         E           0    0    t_familia_id_Familia_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public."t_familia_id_Familia_seq"', 242, false);
            public       postgres    false    253         F           0    0    t_formacion_id_formacion_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.t_formacion_id_formacion_seq', 287, false);
            public       postgres    false    255         G           0    0 !   t_fuentecoord_id_Fuente_Coord_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public."t_fuentecoord_id_Fuente_Coord_seq"', 7, false);
            public       postgres    false    257         H           0    0 0   t_glacialinterglacial_id_glacialinterglacial_seq    SEQUENCE SET     `   SELECT pg_catalog.setval('public.t_glacialinterglacial_id_glacialinterglacial_seq', 35, false);
            public       postgres    false    259         I           0    0    t_habalima_id_Hab_Alim_A_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public."t_habalima_id_Hab_Alim_A_seq"', 6, false);
            public       postgres    false    261         J           0    0    t_habalimb_id_Hab_Alim_B_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public."t_habalimb_id_Hab_Alim_B_seq"', 8, false);
            public       postgres    false    263         K           0    0    t_habrefugio_id_Hab_Refugio_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public."t_habrefugio_id_Hab_Refugio_seq"', 7, false);
            public       postgres    false    265         L           0    0 "   t_interperismo_id_Interperismo_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public."t_interperismo_id_Interperismo_seq"', 8, false);
            public       postgres    false    267         M           0    0    t_isotopo_id_isotopo_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.t_isotopo_id_isotopo_seq', 8, false);
            public       postgres    false    269         N           0    0    t_lado_id_lado_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.t_lado_id_lado_seq', 4, false);
            public       postgres    false    271         O           0    0    t_locomocion_id_Locomocion_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public."t_locomocion_id_Locomocion_seq"', 14, false);
            public       postgres    false    273         P           0    0     t_magnetocron_id_magnetocron_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.t_magnetocron_id_magnetocron_seq', 7, false);
            public       postgres    false    275         Q           0    0 (   t_materialfechado_id_materialfechado_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public.t_materialfechado_id_materialfechado_seq', 33, false);
            public       postgres    false    277         R           0    0 ,   t_metodofechamiento_id_metodoFechamiento_seq    SEQUENCE SET     ^   SELECT pg_catalog.setval('public."t_metodofechamiento_id_metodoFechamiento_seq"', 21, false);
            public       postgres    false    279         S           0    0 %   t_municipioprov_id_municipio_prov_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('public.t_municipioprov_id_municipio_prov_seq', 2459, false);
            public       postgres    false    281         T           0    0    t_orden_id_Orden_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public."t_orden_id_Orden_seq"', 110, false);
            public       postgres    false    283         U           0    0    t_pais_id_pais_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.t_pais_id_pais_seq', 3, false);
            public       postgres    false    285         V           0    0    t_parte_id_Parte_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public."t_parte_id_Parte_seq"', 5, false);
            public       postgres    false    287         W           0    0    t_periodo_id_periodo_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.t_periodo_id_periodo_seq', 17, false);
            public       postgres    false    289         X           0    0 &   t_pisofaunistico_id_pisofaunistico_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.t_pisofaunistico_id_pisofaunistico_seq', 87, false);
            public       postgres    false    291         Y           0    0 '   t_precisioncoord_id_Precision_Coord_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public."t_precisioncoord_id_Precision_Coord_seq"', 7, false);
            public       postgres    false    293         Z           0    0    t_referencia_id_Referencia_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public."t_referencia_id_Referencia_seq"', 4462, false);
            public       postgres    false    295         [           0    0    t_region_id_region_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.t_region_id_region_seq', 7, false);
            public       postgres    false    297         \           0    0 1   t_sistemadepositacion_id_sistema_depositacion_seq    SEQUENCE SET     a   SELECT pg_catalog.setval('public.t_sistemadepositacion_id_sistema_depositacion_seq', 12, false);
            public       postgres    false    299         ]           0    0    t_status_id_Status_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public."t_status_id_Status_seq"', 7, false);
            public       postgres    false    301         ^           0    0 '   t_tiporeferencia_id_Tipo_Referencia_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public."t_tiporeferencia_id_Tipo_Referencia_seq"', 4, false);
            public       postgres    false    303         _           0    0    t_tiposedad_id_tipo_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.t_tiposedad_id_tipo_seq', 3, false);
            public       postgres    false    305         `           0    0    ubicacion_id_Ubicacion_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public."ubicacion_id_Ubicacion_seq"', 379, false);
            public       postgres    false    308         a           0    0 $   unidadanalisis_id_UnidadAnalisis_seq    SEQUENCE SET     W   SELECT pg_catalog.setval('public."unidadanalisis_id_UnidadAnalisis_seq"', 651, false);
            public       postgres    false    310         F           2606    41081 $   edadcontinental edadcontinental_pkey 
   CONSTRAINT     t   ALTER TABLE ONLY public.edadcontinental
    ADD CONSTRAINT edadcontinental_pkey PRIMARY KEY ("id_EdadContinental");
 N   ALTER TABLE ONLY public.edadcontinental DROP CONSTRAINT edadcontinental_pkey;
       public         postgres    false    196         L           2606    41083 <   edadescontinentalescompleta edadescontinentalescompleta_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.edadescontinentalescompleta
    ADD CONSTRAINT edadescontinentalescompleta_pkey PRIMARY KEY (region, era, periodo, epoca, "pisoFaun");
 f   ALTER TABLE ONLY public.edadescontinentalescompleta DROP CONSTRAINT edadescontinentalescompleta_pkey;
       public         postgres    false    198    198    198    198    198         Q           2606    41085 0   edadesmarinascompleta edadesmarinascompleta_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.edadesmarinascompleta
    ADD CONSTRAINT edadesmarinascompleta_pkey PRIMARY KEY (era, periodo, epoca, edad);
 Z   ALTER TABLE ONLY public.edadesmarinascompleta DROP CONSTRAINT edadesmarinascompleta_pkey;
       public         postgres    false    199    199    199    199         Y           2606    41087    edadmaritima edadmaritima_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.edadmaritima
    ADD CONSTRAINT edadmaritima_pkey PRIMARY KEY ("id_EdadMaritima");
 H   ALTER TABLE ONLY public.edadmaritima DROP CONSTRAINT edadmaritima_pkey;
       public         postgres    false    200         f           2606    41089    especies especies_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.especies
    ADD CONSTRAINT especies_pkey PRIMARY KEY ("id_Especies");
 @   ALTER TABLE ONLY public.especies DROP CONSTRAINT especies_pkey;
       public         postgres    false    202         m           2606    41091 .   glaciacionescompleta glaciacionescompleta_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.glaciacionescompleta
    ADD CONSTRAINT glaciacionescompleta_pkey PRIMARY KEY (tipo, region, era, periodo, epoca, "periodoGlacial", estadio);
 X   ALTER TABLE ONLY public.glaciacionescompleta DROP CONSTRAINT glaciacionescompleta_pkey;
       public         postgres    false    204    204    204    204    204    204    204         q           2606    41093    hallazgo hallazgo_pkey 
   CONSTRAINT     |   ALTER TABLE ONLY public.hallazgo
    ADD CONSTRAINT hallazgo_pkey PRIMARY KEY ("id_ReferenciaBibliografica", id_ubicacion);
 @   ALTER TABLE ONLY public.hallazgo DROP CONSTRAINT hallazgo_pkey;
       public         postgres    false    205    205         {           2606    41095 *   materialescatalogo materialescatalogo_pkey 
   CONSTRAINT     }   ALTER TABLE ONLY public.materialescatalogo
    ADD CONSTRAINT materialescatalogo_pkey PRIMARY KEY ("id_MaterialesCatalogo");
 T   ALTER TABLE ONLY public.materialescatalogo DROP CONSTRAINT materialescatalogo_pkey;
       public         postgres    false    206                    2606    41097 "   materialeslote materialeslote_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.materialeslote
    ADD CONSTRAINT materialeslote_pkey PRIMARY KEY ("id_MaterialesLote");
 L   ALTER TABLE ONLY public.materialeslote DROP CONSTRAINT materialeslote_pkey;
       public         postgres    false    208         �           2606    41099    meristica meristica_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.meristica
    ADD CONSTRAINT meristica_pkey PRIMARY KEY ("id_Meristica");
 B   ALTER TABLE ONLY public.meristica DROP CONSTRAINT meristica_pkey;
       public         postgres    false    210         �           2606    41101 4   referenciabibliografica referenciabibliografica_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.referenciabibliografica
    ADD CONSTRAINT referenciabibliografica_pkey PRIMARY KEY ("id_ReferenciaBibliografica");
 ^   ALTER TABLE ONLY public.referenciabibliografica DROP CONSTRAINT referenciabibliografica_pkey;
       public         postgres    false    212         �           2606    41103    sitio sitio_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.sitio
    ADD CONSTRAINT sitio_pkey PRIMARY KEY ("id_Sitio");
 :   ALTER TABLE ONLY public.sitio DROP CONSTRAINT sitio_pkey;
       public         postgres    false    214         �           2606    41105    t_actividad t_actividad_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.t_actividad
    ADD CONSTRAINT t_actividad_pkey PRIMARY KEY ("id_Actividad");
 F   ALTER TABLE ONLY public.t_actividad DROP CONSTRAINT t_actividad_pkey;
       public         postgres    false    216         �           2606    41107    t_agente t_agente_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.t_agente
    ADD CONSTRAINT t_agente_pkey PRIMARY KEY ("id_Agente");
 @   ALTER TABLE ONLY public.t_agente DROP CONSTRAINT t_agente_pkey;
       public         postgres    false    218         �           2606    41109     t_alojamiento t_alojamiento_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.t_alojamiento
    ADD CONSTRAINT t_alojamiento_pkey PRIMARY KEY ("id_Alojamiento");
 J   ALTER TABLE ONLY public.t_alojamiento DROP CONSTRAINT t_alojamiento_pkey;
       public         postgres    false    220         �           2606    41111    t_altitud t_altitud_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.t_altitud
    ADD CONSTRAINT t_altitud_pkey PRIMARY KEY ("id_Altitud");
 B   ALTER TABLE ONLY public.t_altitud DROP CONSTRAINT t_altitud_pkey;
       public         postgres    false    222         �           2606    41113 2   t_ambientedepositacion t_ambientedepositacion_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.t_ambientedepositacion
    ADD CONSTRAINT t_ambientedepositacion_pkey PRIMARY KEY (id_ambiente_depositacion);
 \   ALTER TABLE ONLY public.t_ambientedepositacion DROP CONSTRAINT t_ambientedepositacion_pkey;
       public         postgres    false    224         �           2606    41115    t_clase t_clase_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.t_clase
    ADD CONSTRAINT t_clase_pkey PRIMARY KEY ("id_Clase");
 >   ALTER TABLE ONLY public.t_clase DROP CONSTRAINT t_clase_pkey;
       public         postgres    false    226         �           2606    41117 $   t_contaminacion t_contaminacion_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.t_contaminacion
    ADD CONSTRAINT t_contaminacion_pkey PRIMARY KEY (id_contaminacion);
 N   ALTER TABLE ONLY public.t_contaminacion DROP CONSTRAINT t_contaminacion_pkey;
       public         postgres    false    228         �           2606    41119    t_contexto t_contexto_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.t_contexto
    ADD CONSTRAINT t_contexto_pkey PRIMARY KEY ("id_Contexto");
 D   ALTER TABLE ONLY public.t_contexto DROP CONSTRAINT t_contexto_pkey;
       public         postgres    false    230         �           2606    41121    t_dietaa t_dietaa_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.t_dietaa
    ADD CONSTRAINT t_dietaa_pkey PRIMARY KEY ("id_Dieta_A");
 @   ALTER TABLE ONLY public.t_dietaa DROP CONSTRAINT t_dietaa_pkey;
       public         postgres    false    232         �           2606    41123    t_dietab t_dietab_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.t_dietab
    ADD CONSTRAINT t_dietab_pkey PRIMARY KEY ("id_Dieta_B");
 @   ALTER TABLE ONLY public.t_dietab DROP CONSTRAINT t_dietab_pkey;
       public         postgres    false    234         �           2606    41125 "   t_edadcultural t_edadcultural_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.t_edadcultural
    ADD CONSTRAINT t_edadcultural_pkey PRIMARY KEY (id_edadcultural);
 L   ALTER TABLE ONLY public.t_edadcultural DROP CONSTRAINT t_edadcultural_pkey;
       public         postgres    false    236         �           2606    41127 $   t_edadesmarinas t_edadesmarinas_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.t_edadesmarinas
    ADD CONSTRAINT t_edadesmarinas_pkey PRIMARY KEY (id_edades_marinas);
 N   ALTER TABLE ONLY public.t_edadesmarinas DROP CONSTRAINT t_edadesmarinas_pkey;
       public         postgres    false    238         �           2606    41129    t_elemento t_elemento_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.t_elemento
    ADD CONSTRAINT t_elemento_pkey PRIMARY KEY ("id_Elemento");
 D   ALTER TABLE ONLY public.t_elemento DROP CONSTRAINT t_elemento_pkey;
       public         postgres    false    240         �           2606    41131    t_epoca t_epoca_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.t_epoca
    ADD CONSTRAINT t_epoca_pkey PRIMARY KEY (id_epoca);
 >   ALTER TABLE ONLY public.t_epoca DROP CONSTRAINT t_epoca_pkey;
       public         postgres    false    242         �           2606    41133    t_era t_era_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.t_era
    ADD CONSTRAINT t_era_pkey PRIMARY KEY (id_era);
 :   ALTER TABLE ONLY public.t_era DROP CONSTRAINT t_era_pkey;
       public         postgres    false    244         �           2606    41135    t_estadios t_estadios_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public.t_estadios
    ADD CONSTRAINT t_estadios_pkey PRIMARY KEY (id_estadios);
 D   ALTER TABLE ONLY public.t_estadios DROP CONSTRAINT t_estadios_pkey;
       public         postgres    false    246         �           2606    41137    t_estado t_estado_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.t_estado
    ADD CONSTRAINT t_estado_pkey PRIMARY KEY (id_estado);
 @   ALTER TABLE ONLY public.t_estado DROP CONSTRAINT t_estado_pkey;
       public         postgres    false    248         �           2606    41139    t_facies t_facies_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.t_facies
    ADD CONSTRAINT t_facies_pkey PRIMARY KEY (id_facies);
 @   ALTER TABLE ONLY public.t_facies DROP CONSTRAINT t_facies_pkey;
       public         postgres    false    250         �           2606    41141    t_familia t_familia_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.t_familia
    ADD CONSTRAINT t_familia_pkey PRIMARY KEY ("id_Familia");
 B   ALTER TABLE ONLY public.t_familia DROP CONSTRAINT t_familia_pkey;
       public         postgres    false    252         �           2606    41143    t_formacion t_formacion_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.t_formacion
    ADD CONSTRAINT t_formacion_pkey PRIMARY KEY (id_formacion);
 F   ALTER TABLE ONLY public.t_formacion DROP CONSTRAINT t_formacion_pkey;
       public         postgres    false    254         �           2606    41145     t_fuentecoord t_fuentecoord_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.t_fuentecoord
    ADD CONSTRAINT t_fuentecoord_pkey PRIMARY KEY ("id_Fuente_Coord");
 J   ALTER TABLE ONLY public.t_fuentecoord DROP CONSTRAINT t_fuentecoord_pkey;
       public         postgres    false    256         �           2606    41147 0   t_glacialinterglacial t_glacialinterglacial_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.t_glacialinterglacial
    ADD CONSTRAINT t_glacialinterglacial_pkey PRIMARY KEY (id_glacialinterglacial);
 Z   ALTER TABLE ONLY public.t_glacialinterglacial DROP CONSTRAINT t_glacialinterglacial_pkey;
       public         postgres    false    258         �           2606    41149    t_habalima t_habalima_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.t_habalima
    ADD CONSTRAINT t_habalima_pkey PRIMARY KEY ("id_Hab_Alim_A");
 D   ALTER TABLE ONLY public.t_habalima DROP CONSTRAINT t_habalima_pkey;
       public         postgres    false    260         �           2606    41151    t_habalimb t_habalimb_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.t_habalimb
    ADD CONSTRAINT t_habalimb_pkey PRIMARY KEY ("id_Hab_Alim_B");
 D   ALTER TABLE ONLY public.t_habalimb DROP CONSTRAINT t_habalimb_pkey;
       public         postgres    false    262         �           2606    41153    t_habrefugio t_habrefugio_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.t_habrefugio
    ADD CONSTRAINT t_habrefugio_pkey PRIMARY KEY ("id_Hab_Refugio");
 H   ALTER TABLE ONLY public.t_habrefugio DROP CONSTRAINT t_habrefugio_pkey;
       public         postgres    false    264         �           2606    41155 "   t_interperismo t_interperismo_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.t_interperismo
    ADD CONSTRAINT t_interperismo_pkey PRIMARY KEY ("id_Interperismo");
 L   ALTER TABLE ONLY public.t_interperismo DROP CONSTRAINT t_interperismo_pkey;
       public         postgres    false    266         �           2606    41157    t_isotopo t_isotopo_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.t_isotopo
    ADD CONSTRAINT t_isotopo_pkey PRIMARY KEY (id_isotopo);
 B   ALTER TABLE ONLY public.t_isotopo DROP CONSTRAINT t_isotopo_pkey;
       public         postgres    false    268         �           2606    41159    t_lado t_lado_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.t_lado
    ADD CONSTRAINT t_lado_pkey PRIMARY KEY (id_lado);
 <   ALTER TABLE ONLY public.t_lado DROP CONSTRAINT t_lado_pkey;
       public         postgres    false    270         �           2606    41161    t_locomocion t_locomocion_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.t_locomocion
    ADD CONSTRAINT t_locomocion_pkey PRIMARY KEY ("id_Locomocion");
 H   ALTER TABLE ONLY public.t_locomocion DROP CONSTRAINT t_locomocion_pkey;
       public         postgres    false    272         �           2606    41163     t_magnetocron t_magnetocron_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.t_magnetocron
    ADD CONSTRAINT t_magnetocron_pkey PRIMARY KEY (id_magnetocron);
 J   ALTER TABLE ONLY public.t_magnetocron DROP CONSTRAINT t_magnetocron_pkey;
       public         postgres    false    274         �           2606    41165 (   t_materialfechado t_materialfechado_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.t_materialfechado
    ADD CONSTRAINT t_materialfechado_pkey PRIMARY KEY (id_materialfechado);
 R   ALTER TABLE ONLY public.t_materialfechado DROP CONSTRAINT t_materialfechado_pkey;
       public         postgres    false    276         �           2606    41167 ,   t_metodofechamiento t_metodofechamiento_pkey 
   CONSTRAINT     ~   ALTER TABLE ONLY public.t_metodofechamiento
    ADD CONSTRAINT t_metodofechamiento_pkey PRIMARY KEY ("id_metodoFechamiento");
 V   ALTER TABLE ONLY public.t_metodofechamiento DROP CONSTRAINT t_metodofechamiento_pkey;
       public         postgres    false    278         �           2606    41169 $   t_municipioprov t_municipioprov_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.t_municipioprov
    ADD CONSTRAINT t_municipioprov_pkey PRIMARY KEY (id_municipio_prov);
 N   ALTER TABLE ONLY public.t_municipioprov DROP CONSTRAINT t_municipioprov_pkey;
       public         postgres    false    280         �           2606    41171    t_orden t_orden_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.t_orden
    ADD CONSTRAINT t_orden_pkey PRIMARY KEY ("id_Orden");
 >   ALTER TABLE ONLY public.t_orden DROP CONSTRAINT t_orden_pkey;
       public         postgres    false    282         �           2606    41173    t_pais t_pais_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.t_pais
    ADD CONSTRAINT t_pais_pkey PRIMARY KEY (id_pais);
 <   ALTER TABLE ONLY public.t_pais DROP CONSTRAINT t_pais_pkey;
       public         postgres    false    284         �           2606    41175    t_parte t_parte_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.t_parte
    ADD CONSTRAINT t_parte_pkey PRIMARY KEY ("id_Parte");
 >   ALTER TABLE ONLY public.t_parte DROP CONSTRAINT t_parte_pkey;
       public         postgres    false    286         �           2606    41177    t_periodo t_periodo_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.t_periodo
    ADD CONSTRAINT t_periodo_pkey PRIMARY KEY (id_periodo);
 B   ALTER TABLE ONLY public.t_periodo DROP CONSTRAINT t_periodo_pkey;
       public         postgres    false    288         �           2606    41179 &   t_pisofaunistico t_pisofaunistico_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY public.t_pisofaunistico
    ADD CONSTRAINT t_pisofaunistico_pkey PRIMARY KEY (id_pisofaunistico);
 P   ALTER TABLE ONLY public.t_pisofaunistico DROP CONSTRAINT t_pisofaunistico_pkey;
       public         postgres    false    290         �           2606    41181 &   t_precisioncoord t_precisioncoord_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.t_precisioncoord
    ADD CONSTRAINT t_precisioncoord_pkey PRIMARY KEY ("id_Precision_Coord");
 P   ALTER TABLE ONLY public.t_precisioncoord DROP CONSTRAINT t_precisioncoord_pkey;
       public         postgres    false    292         �           2606    41183    t_referencia t_referencia_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.t_referencia
    ADD CONSTRAINT t_referencia_pkey PRIMARY KEY ("id_Referencia");
 H   ALTER TABLE ONLY public.t_referencia DROP CONSTRAINT t_referencia_pkey;
       public         postgres    false    294         �           2606    41185    t_region t_region_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.t_region
    ADD CONSTRAINT t_region_pkey PRIMARY KEY (id_region);
 @   ALTER TABLE ONLY public.t_region DROP CONSTRAINT t_region_pkey;
       public         postgres    false    296         �           2606    41187 0   t_sistemadepositacion t_sistemadepositacion_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.t_sistemadepositacion
    ADD CONSTRAINT t_sistemadepositacion_pkey PRIMARY KEY (id_sistema_depositacion);
 Z   ALTER TABLE ONLY public.t_sistemadepositacion DROP CONSTRAINT t_sistemadepositacion_pkey;
       public         postgres    false    298         �           2606    41189    t_status t_status_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.t_status
    ADD CONSTRAINT t_status_pkey PRIMARY KEY ("id_Status");
 @   ALTER TABLE ONLY public.t_status DROP CONSTRAINT t_status_pkey;
       public         postgres    false    300         �           2606    41191 &   t_tiporeferencia t_tiporeferencia_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.t_tiporeferencia
    ADD CONSTRAINT t_tiporeferencia_pkey PRIMARY KEY ("id_Tipo_Referencia");
 P   ALTER TABLE ONLY public.t_tiporeferencia DROP CONSTRAINT t_tiporeferencia_pkey;
       public         postgres    false    302         �           2606    41193    t_tiposedad t_tiposedad_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.t_tiposedad
    ADD CONSTRAINT t_tiposedad_pkey PRIMARY KEY (id_tipo);
 F   ALTER TABLE ONLY public.t_tiposedad DROP CONSTRAINT t_tiposedad_pkey;
       public         postgres    false    304         �           2606    41195 *   ubicacion_completa ubicacion_completa_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.ubicacion_completa
    ADD CONSTRAINT ubicacion_completa_pkey PRIMARY KEY ("Region", "Pais", "Estado", "Municipio_Provincia");
 T   ALTER TABLE ONLY public.ubicacion_completa DROP CONSTRAINT ubicacion_completa_pkey;
       public         postgres    false    307    307    307    307         �           2606    41197    ubicacion ubicacion_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.ubicacion
    ADD CONSTRAINT ubicacion_pkey PRIMARY KEY ("id_Ubicacion");
 B   ALTER TABLE ONLY public.ubicacion DROP CONSTRAINT ubicacion_pkey;
       public         postgres    false    306         �           2606    41199 "   unidadanalisis unidadanalisis_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.unidadanalisis
    ADD CONSTRAINT unidadanalisis_pkey PRIMARY KEY ("id_UnidadAnalisis");
 L   ALTER TABLE ONLY public.unidadanalisis DROP CONSTRAINT unidadanalisis_pkey;
       public         postgres    false    309         �           2606    41201     unidadespecie unidadespecie_pkey 
   CONSTRAINT     ~   ALTER TABLE ONLY public.unidadespecie
    ADD CONSTRAINT unidadespecie_pkey PRIMARY KEY ("id_Especies", "id_UnidadAnalisis");
 J   ALTER TABLE ONLY public.unidadespecie DROP CONSTRAINT unidadespecie_pkey;
       public         postgres    false    311    311         :           1259    41202 !   edadcontinental_Edad_Cultural_idx    INDEX     j   CREATE INDEX "edadcontinental_Edad_Cultural_idx" ON public.edadcontinental USING btree ("Edad_Cultural");
 7   DROP INDEX public."edadcontinental_Edad_Cultural_idx";
       public         postgres    false    196         ;           1259    41203    edadcontinental_Epoca_idx    INDEX     Z   CREATE INDEX "edadcontinental_Epoca_idx" ON public.edadcontinental USING btree ("Epoca");
 /   DROP INDEX public."edadcontinental_Epoca_idx";
       public         postgres    false    196         <           1259    41204    edadcontinental_Era_idx    INDEX     V   CREATE INDEX "edadcontinental_Era_idx" ON public.edadcontinental USING btree ("Era");
 -   DROP INDEX public."edadcontinental_Era_idx";
       public         postgres    false    196         =           1259    41205    edadcontinental_Estadio_idx    INDEX     ^   CREATE INDEX "edadcontinental_Estadio_idx" ON public.edadcontinental USING btree ("Estadio");
 1   DROP INDEX public."edadcontinental_Estadio_idx";
       public         postgres    false    196         >           1259    41206 (   edadcontinental_Glacial_Interglacial_idx    INDEX     x   CREATE INDEX "edadcontinental_Glacial_Interglacial_idx" ON public.edadcontinental USING btree ("Glacial_Interglacial");
 >   DROP INDEX public."edadcontinental_Glacial_Interglacial_idx";
       public         postgres    false    196         ?           1259    41207    edadcontinental_Isotopo_idx    INDEX     ^   CREATE INDEX "edadcontinental_Isotopo_idx" ON public.edadcontinental USING btree ("Isotopo");
 1   DROP INDEX public."edadcontinental_Isotopo_idx";
       public         postgres    false    196         @           1259    41208    edadcontinental_Magnetocron_idx    INDEX     f   CREATE INDEX "edadcontinental_Magnetocron_idx" ON public.edadcontinental USING btree ("Magnetocron");
 5   DROP INDEX public."edadcontinental_Magnetocron_idx";
       public         postgres    false    196         A           1259    41209 $   edadcontinental_Material_Fechado_idx    INDEX     p   CREATE INDEX "edadcontinental_Material_Fechado_idx" ON public.edadcontinental USING btree ("Material_Fechado");
 :   DROP INDEX public."edadcontinental_Material_Fechado_idx";
       public         postgres    false    196         B           1259    41210 "   edadcontinental_Metodo_Fechado_idx    INDEX     l   CREATE INDEX "edadcontinental_Metodo_Fechado_idx" ON public.edadcontinental USING btree ("Metodo_Fechado");
 8   DROP INDEX public."edadcontinental_Metodo_Fechado_idx";
       public         postgres    false    196         C           1259    41211    edadcontinental_Periodo_idx    INDEX     ^   CREATE INDEX "edadcontinental_Periodo_idx" ON public.edadcontinental USING btree ("Periodo");
 1   DROP INDEX public."edadcontinental_Periodo_idx";
       public         postgres    false    196         D           1259    41212 #   edadcontinental_Piso_Faunistico_idx    INDEX     n   CREATE INDEX "edadcontinental_Piso_Faunistico_idx" ON public.edadcontinental USING btree ("Piso_Faunistico");
 9   DROP INDEX public."edadcontinental_Piso_Faunistico_idx";
       public         postgres    false    196         G           1259    41213 %   edadescontinentalescompleta_epoca_idx    INDEX     n   CREATE INDEX edadescontinentalescompleta_epoca_idx ON public.edadescontinentalescompleta USING btree (epoca);
 9   DROP INDEX public.edadescontinentalescompleta_epoca_idx;
       public         postgres    false    198         H           1259    41214 #   edadescontinentalescompleta_era_idx    INDEX     j   CREATE INDEX edadescontinentalescompleta_era_idx ON public.edadescontinentalescompleta USING btree (era);
 7   DROP INDEX public.edadescontinentalescompleta_era_idx;
       public         postgres    false    198         I           1259    41215 '   edadescontinentalescompleta_periodo_idx    INDEX     r   CREATE INDEX edadescontinentalescompleta_periodo_idx ON public.edadescontinentalescompleta USING btree (periodo);
 ;   DROP INDEX public.edadescontinentalescompleta_periodo_idx;
       public         postgres    false    198         J           1259    41216 (   edadescontinentalescompleta_pisoFaun_idx    INDEX     x   CREATE INDEX "edadescontinentalescompleta_pisoFaun_idx" ON public.edadescontinentalescompleta USING btree ("pisoFaun");
 >   DROP INDEX public."edadescontinentalescompleta_pisoFaun_idx";
       public         postgres    false    198         M           1259    41217    edadesmarinascompleta_edad_idx    INDEX     `   CREATE INDEX edadesmarinascompleta_edad_idx ON public.edadesmarinascompleta USING btree (edad);
 2   DROP INDEX public.edadesmarinascompleta_edad_idx;
       public         postgres    false    199         N           1259    41218    edadesmarinascompleta_epoca_idx    INDEX     b   CREATE INDEX edadesmarinascompleta_epoca_idx ON public.edadesmarinascompleta USING btree (epoca);
 3   DROP INDEX public.edadesmarinascompleta_epoca_idx;
       public         postgres    false    199         O           1259    41219 !   edadesmarinascompleta_periodo_idx    INDEX     f   CREATE INDEX edadesmarinascompleta_periodo_idx ON public.edadesmarinascompleta USING btree (periodo);
 5   DROP INDEX public.edadesmarinascompleta_periodo_idx;
       public         postgres    false    199         R           1259    41220    edadmaritima_Edad_idx    INDEX     R   CREATE INDEX "edadmaritima_Edad_idx" ON public.edadmaritima USING btree ("Edad");
 +   DROP INDEX public."edadmaritima_Edad_idx";
       public         postgres    false    200         S           1259    41221    edadmaritima_Epoca_idx    INDEX     T   CREATE INDEX "edadmaritima_Epoca_idx" ON public.edadmaritima USING btree ("Epoca");
 ,   DROP INDEX public."edadmaritima_Epoca_idx";
       public         postgres    false    200         T           1259    41222    edadmaritima_Era_idx    INDEX     P   CREATE INDEX "edadmaritima_Era_idx" ON public.edadmaritima USING btree ("Era");
 *   DROP INDEX public."edadmaritima_Era_idx";
       public         postgres    false    200         U           1259    41223 !   edadmaritima_Material_Fechado_idx    INDEX     j   CREATE INDEX "edadmaritima_Material_Fechado_idx" ON public.edadmaritima USING btree ("Material_Fechado");
 7   DROP INDEX public."edadmaritima_Material_Fechado_idx";
       public         postgres    false    200         V           1259    41224    edadmaritima_Metodo_Fechado_idx    INDEX     f   CREATE INDEX "edadmaritima_Metodo_Fechado_idx" ON public.edadmaritima USING btree ("Metodo_Fechado");
 5   DROP INDEX public."edadmaritima_Metodo_Fechado_idx";
       public         postgres    false    200         W           1259    41225    edadmaritima_Periodo_idx    INDEX     X   CREATE INDEX "edadmaritima_Periodo_idx" ON public.edadmaritima USING btree ("Periodo");
 .   DROP INDEX public."edadmaritima_Periodo_idx";
       public         postgres    false    200         Z           1259    41226    especies_id_Actividad_idx    INDEX     Z   CREATE INDEX "especies_id_Actividad_idx" ON public.especies USING btree ("id_Actividad");
 /   DROP INDEX public."especies_id_Actividad_idx";
       public         postgres    false    202         [           1259    41227    especies_id_Clase_idx    INDEX     R   CREATE INDEX "especies_id_Clase_idx" ON public.especies USING btree ("id_Clase");
 +   DROP INDEX public."especies_id_Clase_idx";
       public         postgres    false    202         \           1259    41228    especies_id_Dieta_A_idx    INDEX     V   CREATE INDEX "especies_id_Dieta_A_idx" ON public.especies USING btree ("id_Dieta_A");
 -   DROP INDEX public."especies_id_Dieta_A_idx";
       public         postgres    false    202         ]           1259    41229    especies_id_Dieta_B_idx    INDEX     V   CREATE INDEX "especies_id_Dieta_B_idx" ON public.especies USING btree ("id_Dieta_B");
 -   DROP INDEX public."especies_id_Dieta_B_idx";
       public         postgres    false    202         ^           1259    41230    especies_id_Familia_idx    INDEX     V   CREATE INDEX "especies_id_Familia_idx" ON public.especies USING btree ("id_Familia");
 -   DROP INDEX public."especies_id_Familia_idx";
       public         postgres    false    202         _           1259    41231    especies_id_Hab_Alim_A_idx    INDEX     \   CREATE INDEX "especies_id_Hab_Alim_A_idx" ON public.especies USING btree ("id_Hab_Alim_A");
 0   DROP INDEX public."especies_id_Hab_Alim_A_idx";
       public         postgres    false    202         `           1259    41232    especies_id_Hab_Alim_B_idx    INDEX     \   CREATE INDEX "especies_id_Hab_Alim_B_idx" ON public.especies USING btree ("id_Hab_Alim_B");
 0   DROP INDEX public."especies_id_Hab_Alim_B_idx";
       public         postgres    false    202         a           1259    41233    especies_id_Hab_Refugio_idx    INDEX     ^   CREATE INDEX "especies_id_Hab_Refugio_idx" ON public.especies USING btree ("id_Hab_Refugio");
 1   DROP INDEX public."especies_id_Hab_Refugio_idx";
       public         postgres    false    202         b           1259    41234    especies_id_Locomocion_idx    INDEX     \   CREATE INDEX "especies_id_Locomocion_idx" ON public.especies USING btree ("id_Locomocion");
 0   DROP INDEX public."especies_id_Locomocion_idx";
       public         postgres    false    202         c           1259    41235    especies_id_Orden_idx    INDEX     R   CREATE INDEX "especies_id_Orden_idx" ON public.especies USING btree ("id_Orden");
 +   DROP INDEX public."especies_id_Orden_idx";
       public         postgres    false    202         d           1259    41236    especies_id_Status_idx    INDEX     T   CREATE INDEX "especies_id_Status_idx" ON public.especies USING btree ("id_Status");
 ,   DROP INDEX public."especies_id_Status_idx";
       public         postgres    false    202         g           1259    41237    glaciacionescompleta_epoca_idx    INDEX     `   CREATE INDEX glaciacionescompleta_epoca_idx ON public.glaciacionescompleta USING btree (epoca);
 2   DROP INDEX public.glaciacionescompleta_epoca_idx;
       public         postgres    false    204         h           1259    41238    glaciacionescompleta_era_idx    INDEX     \   CREATE INDEX glaciacionescompleta_era_idx ON public.glaciacionescompleta USING btree (era);
 0   DROP INDEX public.glaciacionescompleta_era_idx;
       public         postgres    false    204         i           1259    41239     glaciacionescompleta_estadio_idx    INDEX     d   CREATE INDEX glaciacionescompleta_estadio_idx ON public.glaciacionescompleta USING btree (estadio);
 4   DROP INDEX public.glaciacionescompleta_estadio_idx;
       public         postgres    false    204         j           1259    41240 '   glaciacionescompleta_periodoGlacial_idx    INDEX     v   CREATE INDEX "glaciacionescompleta_periodoGlacial_idx" ON public.glaciacionescompleta USING btree ("periodoGlacial");
 =   DROP INDEX public."glaciacionescompleta_periodoGlacial_idx";
       public         postgres    false    204         k           1259    41241     glaciacionescompleta_periodo_idx    INDEX     d   CREATE INDEX glaciacionescompleta_periodo_idx ON public.glaciacionescompleta USING btree (periodo);
 4   DROP INDEX public.glaciacionescompleta_periodo_idx;
       public         postgres    false    204         n           1259    41242    glaciacionescompleta_region_idx    INDEX     b   CREATE INDEX glaciacionescompleta_region_idx ON public.glaciacionescompleta USING btree (region);
 3   DROP INDEX public.glaciacionescompleta_region_idx;
       public         postgres    false    204         o           1259    41243    hallazgo_id_ubicacion_idx    INDEX     V   CREATE INDEX hallazgo_id_ubicacion_idx ON public.hallazgo USING btree (id_ubicacion);
 -   DROP INDEX public.hallazgo_id_ubicacion_idx;
       public         postgres    false    205         r           1259    41244     materialescatalogo_id_Agente_idx    INDEX     h   CREATE INDEX "materialescatalogo_id_Agente_idx" ON public.materialescatalogo USING btree ("id_Agente");
 6   DROP INDEX public."materialescatalogo_id_Agente_idx";
       public         postgres    false    206         s           1259    41245 %   materialescatalogo_id_Alojamiento_idx    INDEX     r   CREATE INDEX "materialescatalogo_id_Alojamiento_idx" ON public.materialescatalogo USING btree ("id_Alojamiento");
 ;   DROP INDEX public."materialescatalogo_id_Alojamiento_idx";
       public         postgres    false    206         t           1259    41246 "   materialescatalogo_id_Contexto_idx    INDEX     l   CREATE INDEX "materialescatalogo_id_Contexto_idx" ON public.materialescatalogo USING btree ("id_Contexto");
 8   DROP INDEX public."materialescatalogo_id_Contexto_idx";
       public         postgres    false    206         u           1259    41247 "   materialescatalogo_id_Elemento_idx    INDEX     l   CREATE INDEX "materialescatalogo_id_Elemento_idx" ON public.materialescatalogo USING btree ("id_Elemento");
 8   DROP INDEX public."materialescatalogo_id_Elemento_idx";
       public         postgres    false    206         v           1259    41248 "   materialescatalogo_id_Especies_idx    INDEX     l   CREATE INDEX "materialescatalogo_id_Especies_idx" ON public.materialescatalogo USING btree ("id_Especies");
 8   DROP INDEX public."materialescatalogo_id_Especies_idx";
       public         postgres    false    206         w           1259    41249 &   materialescatalogo_id_Interperismo_idx    INDEX     t   CREATE INDEX "materialescatalogo_id_Interperismo_idx" ON public.materialescatalogo USING btree ("id_Interperismo");
 <   DROP INDEX public."materialescatalogo_id_Interperismo_idx";
       public         postgres    false    206         x           1259    41250    materialescatalogo_id_Parte_idx    INDEX     f   CREATE INDEX "materialescatalogo_id_Parte_idx" ON public.materialescatalogo USING btree ("id_Parte");
 5   DROP INDEX public."materialescatalogo_id_Parte_idx";
       public         postgres    false    206         y           1259    41251    materialescatalogo_id_lado_idx    INDEX     `   CREATE INDEX materialescatalogo_id_lado_idx ON public.materialescatalogo USING btree (id_lado);
 2   DROP INDEX public.materialescatalogo_id_lado_idx;
       public         postgres    false    206         |           1259    41252 !   materialeslote_id_Alojamiento_idx    INDEX     j   CREATE INDEX "materialeslote_id_Alojamiento_idx" ON public.materialeslote USING btree ("id_Alojamiento");
 7   DROP INDEX public."materialeslote_id_Alojamiento_idx";
       public         postgres    false    208         }           1259    41253    materialeslote_id_Especies_idx    INDEX     d   CREATE INDEX "materialeslote_id_Especies_idx" ON public.materialeslote USING btree ("id_Especies");
 4   DROP INDEX public."materialeslote_id_Especies_idx";
       public         postgres    false    208         �           1259    41254 #   meristica_id_MaterialesCatalogo_idx    INDEX     n   CREATE INDEX "meristica_id_MaterialesCatalogo_idx" ON public.meristica USING btree ("id_MaterialesCatalogo");
 9   DROP INDEX public."meristica_id_MaterialesCatalogo_idx";
       public         postgres    false    210         �           1259    41255 )   referenciabibliografica_id_Referencia_idx    INDEX     z   CREATE INDEX "referenciabibliografica_id_Referencia_idx" ON public.referenciabibliografica USING btree ("id_Referencia");
 ?   DROP INDEX public."referenciabibliografica_id_Referencia_idx";
       public         postgres    false    212         �           1259    41256 .   referenciabibliografica_id_Tipo_Referencia_idx    INDEX     �   CREATE INDEX "referenciabibliografica_id_Tipo_Referencia_idx" ON public.referenciabibliografica USING btree ("id_Tipo_Referencia");
 D   DROP INDEX public."referenciabibliografica_id_Tipo_Referencia_idx";
       public         postgres    false    212         �           1259    41257    sitio_id_Fuente_Altitud_idx    INDEX     ^   CREATE INDEX "sitio_id_Fuente_Altitud_idx" ON public.sitio USING btree ("id_Fuente_Altitud");
 1   DROP INDEX public."sitio_id_Fuente_Altitud_idx";
       public         postgres    false    214         �           1259    41258    sitio_id_Fuente_Coord_idx    INDEX     Z   CREATE INDEX "sitio_id_Fuente_Coord_idx" ON public.sitio USING btree ("id_Fuente_Coord");
 /   DROP INDEX public."sitio_id_Fuente_Coord_idx";
       public         postgres    false    214         �           1259    41259    sitio_id_Precision_Coord_idx    INDEX     `   CREATE INDEX "sitio_id_Precision_Coord_idx" ON public.sitio USING btree ("id_Precision_Coord");
 2   DROP INDEX public."sitio_id_Precision_Coord_idx";
       public         postgres    false    214         �           1259    41260    sitio_id_Ubicacion_idx    INDEX     T   CREATE INDEX "sitio_id_Ubicacion_idx" ON public.sitio USING btree ("id_Ubicacion");
 ,   DROP INDEX public."sitio_id_Ubicacion_idx";
       public         postgres    false    214         �           1259    41261    ubicacion_Estado_idx    INDEX     P   CREATE INDEX "ubicacion_Estado_idx" ON public.ubicacion USING btree ("Estado");
 *   DROP INDEX public."ubicacion_Estado_idx";
       public         postgres    false    306         �           1259    41262 !   ubicacion_Municipio_Provincia_idx    INDEX     j   CREATE INDEX "ubicacion_Municipio_Provincia_idx" ON public.ubicacion USING btree ("Municipio_Provincia");
 7   DROP INDEX public."ubicacion_Municipio_Provincia_idx";
       public         postgres    false    306         �           1259    41263    ubicacion_Pais_idx    INDEX     L   CREATE INDEX "ubicacion_Pais_idx" ON public.ubicacion USING btree ("Pais");
 (   DROP INDEX public."ubicacion_Pais_idx";
       public         postgres    false    306         �           1259    41264    ubicacion_Region_idx    INDEX     P   CREATE INDEX "ubicacion_Region_idx" ON public.ubicacion USING btree ("Region");
 *   DROP INDEX public."ubicacion_Region_idx";
       public         postgres    false    306         �           1259    41265    ubicacion_completa_Estado_idx    INDEX     b   CREATE INDEX "ubicacion_completa_Estado_idx" ON public.ubicacion_completa USING btree ("Estado");
 3   DROP INDEX public."ubicacion_completa_Estado_idx";
       public         postgres    false    307         �           1259    41266 *   ubicacion_completa_Municipio_Provincia_idx    INDEX     |   CREATE INDEX "ubicacion_completa_Municipio_Provincia_idx" ON public.ubicacion_completa USING btree ("Municipio_Provincia");
 @   DROP INDEX public."ubicacion_completa_Municipio_Provincia_idx";
       public         postgres    false    307         �           1259    41267    ubicacion_completa_Pais_idx    INDEX     ^   CREATE INDEX "ubicacion_completa_Pais_idx" ON public.ubicacion_completa USING btree ("Pais");
 1   DROP INDEX public."ubicacion_completa_Pais_idx";
       public         postgres    false    307         �           1259    41268 (   unidadanalisis_Ambiente_Depositacion_idx    INDEX     x   CREATE INDEX "unidadanalisis_Ambiente_Depositacion_idx" ON public.unidadanalisis USING btree ("Ambiente_Depositacion");
 >   DROP INDEX public."unidadanalisis_Ambiente_Depositacion_idx";
       public         postgres    false    309         �           1259    41269     unidadanalisis_Contaminacion_idx    INDEX     h   CREATE INDEX "unidadanalisis_Contaminacion_idx" ON public.unidadanalisis USING btree ("Contaminacion");
 6   DROP INDEX public."unidadanalisis_Contaminacion_idx";
       public         postgres    false    309         �           1259    41270    unidadanalisis_Facie_idx    INDEX     X   CREATE INDEX "unidadanalisis_Facie_idx" ON public.unidadanalisis USING btree ("Facie");
 .   DROP INDEX public."unidadanalisis_Facie_idx";
       public         postgres    false    309         �           1259    41271    unidadanalisis_Formacion_idx    INDEX     `   CREATE INDEX "unidadanalisis_Formacion_idx" ON public.unidadanalisis USING btree ("Formacion");
 2   DROP INDEX public."unidadanalisis_Formacion_idx";
       public         postgres    false    309         �           1259    41272 '   unidadanalisis_Sistema_Depositacion_idx    INDEX     v   CREATE INDEX "unidadanalisis_Sistema_Depositacion_idx" ON public.unidadanalisis USING btree ("Sistema_Depositacion");
 =   DROP INDEX public."unidadanalisis_Sistema_Depositacion_idx";
       public         postgres    false    309         �           1259    41273 %   unidadanalisis_id_EdadContinental_idx    INDEX     r   CREATE INDEX "unidadanalisis_id_EdadContinental_idx" ON public.unidadanalisis USING btree ("id_EdadContinental");
 ;   DROP INDEX public."unidadanalisis_id_EdadContinental_idx";
       public         postgres    false    309         �           1259    41274 "   unidadanalisis_id_EdadMaritima_idx    INDEX     l   CREATE INDEX "unidadanalisis_id_EdadMaritima_idx" ON public.unidadanalisis USING btree ("id_EdadMaritima");
 8   DROP INDEX public."unidadanalisis_id_EdadMaritima_idx";
       public         postgres    false    309         �           1259    41275    unidadanalisis_id_Sitio_idx    INDEX     ^   CREATE INDEX "unidadanalisis_id_Sitio_idx" ON public.unidadanalisis USING btree ("id_Sitio");
 1   DROP INDEX public."unidadanalisis_id_Sitio_idx";
       public         postgres    false    309         �           1259    41276 #   unidadespecie_id_UnidadAnalisis_idx    INDEX     n   CREATE INDEX "unidadespecie_id_UnidadAnalisis_idx" ON public.unidadespecie USING btree ("id_UnidadAnalisis");
 9   DROP INDEX public."unidadespecie_id_UnidadAnalisis_idx";
       public         postgres    false    311                                                                                                                                                                                                                                                                                                                  3448.dat                                                                                            0000600 0004000 0002000 00000003302 13264542003 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	3	13	42	2	2	\N	3	Las Tunas	14	7	5	16	28	\N	\N	\N
2	3	13	3	2	2	\N	3	\N	14	7	5	16	28	\N	\N	\N
3	3	13	35	2	2	\N	4	Yepomera	14	7	5	16	28	\N	\N	\N
4	3	11	41	2	2	\N	1	Cueva La Boca	14	7	5	16	28	\N	\N	\N
5	3	13	42	2	2	\N	4	Rancho El Ocote	14	7	5	16	28	\N	\N	\N
6	3	13	46	2	2	\N	3	\N	14	7	5	16	28	\N	\N	\N
7	3	11	43	2	2	\N	2	\N	14	7	5	16	28	\N	\N	\N
8	3	13	55	2	2	\N	3	Miñaca	14	7	5	16	28	\N	\N	\N
9	3	13	39	2	2	\N	6	Zoyatal	14	7	5	16	28	\N	\N	\N
10	3	12	45	2	2	\N	12	Rancho Gaitan	14	7	5	16	28	\N	\N	\N
11	3	12	47	2	2	\N	17	Punta Prieta	14	7	5	16	28	\N	\N	\N
12	3	11	2	2	2	\N	1	\N	14	7	5	16	28	\N	\N	\N
13	3	13	39	2	2	\N	4	Rancho El Ocote	14	7	5	16	28	\N	\N	\N
14	3	13	46	2	2	\N	4	\N	14	7	5	16	28	\N	\N	\N
15	3	13	56	2	2	\N	4	\N	14	7	5	16	28	\N	\N	\N
16	3	13	4	2	2	\N	4	\N	14	7	5	16	28	\N	\N	\N
17	3	13	3	2	2	\N	4	\N	14	7	5	16	28	\N	\N	\N
18	3	11	41	2	2	\N	2	\N	14	7	5	16	28	\N	\N	\N
19	3	11	43	2	2	\N	1	\N	14	7	5	16	28	\N	\N	\N
20	3	12	57	2	2	\N	16	\N	14	7	5	16	28	\N	\N	\N
21	3	13	35	2	2	\N	22	Goleta	14	7	5	16	28	\N	\N	\N
22	3	13	36	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
23	3	13	37	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
24	3	12	6	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
25	3	11	2	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
26	3	11	43	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
27	3	11	44	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
28	3	11	49	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
29	3	11	60	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
30	3	12	38	2	2	\N	22	Marfil	14	7	5	16	28	\N	\N	\N
31	3	12	45	2	2	\N	22	Rancho Gaitan	14	7	5	16	28	\N	\N	\N
32	3	12	54	2	2	\N	22	Marfil	14	7	5	16	28	\N	\N	\N
33	3	12	60	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
34	2	8	11	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
35	2	9	8	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
36	4	15	60	2	2	\N	22	\N	14	7	5	16	28	\N	\N	\N
\.


                                                                                                                                                                                                                                                                                                                              3450.dat                                                                                            0000600 0004000 0002000 00000001120 13264542003 0014236 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	2	9	8	21
1	2	9	8	23
1	2	9	8	24
1	2	9	8	25
1	3	11	1	26
1	3	11	2	22
1	3	11	43	2
1	3	11	61	1
1	3	11	62	3
1	3	12	5	8
1	3	12	5	9
1	3	12	5	10
1	3	12	6	12
1	3	12	6	13
1	3	12	6	14
1	3	12	6	15
1	3	12	6	16
1	3	12	7	17
1	3	12	7	18
1	3	12	7	19
1	3	12	7	20
1	3	13	4	4
1	3	13	4	5
1	3	13	4	6
1	3	13	4	7
1	3	13	4	8
1	3	13	42	3
1	3	13	46	4
2	2	9	8	22
2	2	9	9	22
2	3	11	2	34
2	3	11	2	43
2	3	11	2	54
2	3	11	2	57
2	3	12	5	42
2	3	12	5	76
2	3	12	6	36
2	3	12	6	52
2	3	12	6	60
2	3	12	6	67
2	3	12	6	81
2	3	12	7	66
2	3	12	7	77
2	3	13	3	38
2	3	13	3	56
2	3	13	3	59
2	3	13	4	39
2	3	13	4	40
2	3	13	4	41
2	3	13	4	45
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                3451.dat                                                                                            0000600 0004000 0002000 00000000747 13264542003 0014255 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        2	7	13	45
2	7	13	46
2	7	13	47
2	7	14	48
2	7	14	49
2	7	15	50
2	7	15	51
2	8	10	34
2	8	10	35
2	8	10	36
2	8	11	37
2	8	11	38
2	8	11	39
2	8	11	40
2	8	12	41
2	8	12	42
2	8	12	43
2	8	12	44
2	9	8	22
2	9	8	23
2	9	8	24
2	9	8	25
2	9	8	26
2	9	8	27
2	9	9	28
2	9	9	29
2	9	9	30
2	9	9	31
2	9	9	32
2	9	9	33
3	11	1	104
3	11	2	1
3	11	2	3
3	11	2	4
3	11	2	105
3	12	5	13
3	12	5	14
3	12	6	15
3	12	6	16
3	12	6	17
3	12	6	18
3	12	7	19
3	12	7	20
3	12	7	21
3	13	3	5
3	13	3	6
3	13	4	7
3	13	4	8
3	13	4	9
3	13	4	10
\.


                         3452.dat                                                                                            0000600 0004000 0002000 00000001630 13264542003 0014246 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	2	9	9	28	\N	16	28	\N	\N
2	2	9	8	26	\N	16	28	\N	\N
3	2	8	10	35	\N	16	28	\N	\N
4	2	9	9	32	\N	16	28	\N	\N
5	2	9	9	33	\N	16	28	\N	\N
6	2	9	8	23	\N	16	28	\N	\N
7	2	9	8	22	\N	16	28	\N	\N
8	2	9	8	100	\N	16	28	\N	\N
9	2	9	8	101	\N	16	28	\N	\N
10	2	9	9	26	\N	16	28	\N	\N
11	2	9	8	102	\N	16	28	\N	\N
12	2	9	8	25	\N	16	28	\N	\N
13	2	9	8	103	\N	16	28	\N	\N
14	2	8	12	43	\N	16	28	\N	\N
15	2	8	10	34	\N	16	28	\N	\N
16	2	9	8	27	\N	16	28	\N	\N
17	3	13	39	99	\N	16	28	\N	\N
18	3	13	3	99	\N	16	28	\N	\N
19	3	11	41	99	\N	16	28	\N	\N
20	3	13	46	99	\N	16	28	\N	\N
21	3	13	53	99	\N	16	28	\N	\N
22	3	13	56	99	\N	16	28	\N	\N
23	3	13	42	99	\N	16	28	\N	\N
24	3	12	5	99	\N	16	28	\N	\N
25	3	12	50	99	\N	16	28	\N	\N
26	3	12	52	99	\N	16	28	\N	\N
27	3	13	4	99	\N	16	28	\N	\N
28	3	13	38	99	\N	16	28	\N	\N
29	1	14	16	99	\N	16	28	\N	\N
30	2	9	8	99	\N	16	28	\N	\N
31	2	9	9	99	\N	16	28	\N	\N
32	2	9	60	99	\N	16	28	\N	\N
33	4	15	60	99	\N	16	28	\N	\N
\.


                                                                                                        3454.dat                                                                                            0000600 0004000 0002000 00000014763 13264542003 0014263 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	\N	\N	\N	\N	Heterodontus	sp.	de Blainville 1816	\N	\N	Tiburón	Bullhead Shark	3	2	1	10	2	2	2	1	9	2	1
2	\N	\N	\N	\N	Hexanchus	cf. Hexanchus griseus	Rafinesque 1810	Hexancgus cf. griseus - Applegate 1978:57.	\N	Tiburón	Sixgill Shark	2	2	1	10	2	2	3	1	9	3	1
3	\N	\N	\N	\N	Notorynchus	sp.	Aynes 1855	\N	\N	Tiburón	Sevengill Shark	3	2	1	1	2	2	3	1	9	3	1
4	\N	\N	\N	\N	Rhincodon	sp.	Smith 1849	\N	\N	Tiburón Ballena	Whale Shark	3	2	3	14	2	2	4	1	9	31	1
5	\N	\N	\N	\N	Carcharias	acutissima	(Agassiz 1844)	Odontapsis acutissima - Barrios. H. 1985.	\N	Tiburón	Sand Tiger Shark	3	2	1	10	2	2	5	1	9	4	2
6	\N	\N	\N	\N	Carcharias	cuspidatus	Agassiz 1843	Odontapsis cuspidata - Kruckow.1957:445; Barrios. 1995	\N	Tiburón	Sand Shark	3	2	1	10	2	2	5	1	9	4	2
7	\N	\N	\N	\N	gen. indet.	sp. indet.	Müller and Henle 1839	\N	\N	Tiburón	San Tiger Shark	3	2	1	12	2	2	5	1	9	4	1
8	\N	\N	\N	\N	Carcharodon	arnoldi	Jordan	\N	\N	Tiburón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	2
9	\N	\N	\N	\N	Carcharodon	cf. C. arnoldi	Jordan	\N	\N	Tibuón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	2
10	\N	\N	\N	\N	Carcharodon	branneri	Jordan	\N	\N	Tiburón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	2
11	\N	\N	\N	\N	Carcharodon	carcharias	(Linnaeus)	\N	\N	Tiburón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	1
12	\N	\N	\N	\N	Carcharodon	megalodon	Agassiz 1843	\N	\N	Tiburón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	2
13	\N	\N	\N	\N	Carcharodon	mexicanus	(von Meyer)	-C(archarias) mexicanus - Meyer von,1840:582;1867a:lám VII (fide Maldonado-Koerdell, 1943b:131).-Carcharodon mexicanus - Maldonado-Koerdell.1948b:130;1948c:298.-Carcharodon mexicanus (?) - Silva-Bárcenas.1969:18.-Carcharodon mexicanus - Applegate,1979:41;Durham et al.,1981:391.	\N	Tiburón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	2
14	\N	\N	\N	\N	Carcharodon	sulcidens	Agassiz 1843	\N	\N	Tiburón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	2
15	\N	\N	\N	\N	Carcharodon	sp.	Smith 1838	Carcharias sp. - Wittich,1913:6 (fide Maldonado-Koerdell.1948b:131)Carcharodon sp. - Maldonado Koerdell.1948b:131;1948c:292;Kruckow.1957:445;Silva-Bárcenas.1969:7.	\N	Tiburón Blanco	White Shark	3	2	1	10	2	2	6	1	9	4	2
17	\N	\N	\N	\N	Cetorhinus	sp.	Blainville 1816	\N	\N	Tiburón	Basking Shark	3	2	1	10	2	2	51	1	9	4	1
18	\N	\N	\N	\N	Paratodus	benedenii	(Le Hon 1871)	Isurus benedenii - Barrios H. 1985.	\N	Tiburón	Mako Shark	3	2	1	10	2	2	6	1	9	4	2
19	\N	\N	\N	\N	Oxyrhina	hastalis	Agassiz 1843	Isurus hastalis - Jordan and Hertlein.1926:414 (fide Maldonado-Koerdell.1948c:298);Maldonado-Koerdell.1948c:298.Oxyrhinus hastalis - Kruckow.1957:445.Isurus hastalis - Minch et al. 1970:3152	\N	Tiburón	Meckerel Sharks	3	2	1	10	2	2	237	1	9	81	2
20	\N	\N	\N	\N	Isurus	oxyrinchus	Rafinesque 1810	\N	\N	Tiburón	Shortfin mako	3	2	1	10	2	2	6	1	9	4	1
21	\N	\N	\N	\N	Carcharodon	planus	(Agassiz 1856)	Isurus planus - Barrios. H. 1985.	\N	Tiburón	White Shark	3	2	1	10	2	2	6	1	9	4	2
22	\N	\N	\N	\N	Isurus	rectus	\N	Carcharocles rectus - Jordan and Hertlein.1926:414 (fide Maldonado-Koerdell.1948c:299;Hertlein and Jordan.1927:612; (fide Maldonado-Koerdell. op. cit.);Maldonado-Koerdell.1948c:299.	\N	Tiburon	Mako Shark	3	2	1	10	2	2	6	1	9	4	6
23	\N	\N	\N	\N	Isurus	sp.	Rafinesque 1810	Oxyrhinus sp. - Wittich.1913:6 (fide Maldonado-Koerdell.1948b:130)Isurus sp.- Maldonado-Koerdell.1948b:130;Silva-Bárcenas.1969:7. / Oxyrhinus ? - Aguilera.1907:240.Isurus sp. - Maldonado-Koerdell.1948c:298	\N	Tiburón	Mako Shark	3	2	1	10	2	2	6	1	9	4	1
26	\N	\N	\N	\N	Cretolamna	catticus	(Philippi 1846)	Lamna cattica - Barrios H. 1985.	\N	Tiburón	Mackerel Shark	3	2	1	10	2	2	216	1	9	4	2
27	\N	\N	\N	\N	Cretolamna	sp.	Cuvier 1816	\N	\N	Tiburón	Mekerel Shark	3	2	1	10	2	2	216	1	9	4	2
29	\N	\N	\N	\N	Galeus	sp.	Schaeffer 1760	\N	\N	Tiburón	Cat Shark	3	2	1	10	2	2	7	1	9	32	1
30	\N	\N	\N	\N	Scyliorhinus	sp.	Blainville 1816	Scyliorhunus sp. -Maldonado-Koerdell.1948b:131;1948:c:299Scylliorhinus sp. - Silva-Bárcenas.1969:25	\N	Tiburón	Cat Shark	3	2	1	10	2	2	7	1	9	32	1
31	\N	\N	\N	\N	Carcharhinus	albimarginatus	(Ruppell 1837)	\N	\N	Tiburón	Requiem Shark	3	2	1	10	2	2	8	1	9	32	2
32	\N	\N	\N	\N	Carcharhinus	altimus	(Springer 1950)	\N	\N	Tiburón	Requiem Shark	3	2	1	10	2	2	8	1	9	32	1
33	\N	\N	\N	\N	Carcharhinus	antiquus	(Agassiz)	\N	\N	Tiburón	Requiem Shark	3	2	1	10	2	2	8	1	9	32	2
34	\N	\N	\N	\N	Carcharhinus	brachylurus	(Gunther)	\N	\N	Tiburón	\N	5	2	5	17	5	7	8	5	10	32	1
35	\N	\N	\N	\N	Carcharhinus	falciformis	(Bibron 1841 in Müller & Henle 1839)	\N	\N	Tiburon	Requiem Shark	3	2	1	10	2	2	8	1	9	32	1
36	\N	\N	\N	\N	Carcharhinus	cf. C. galapagansis	(Snodgrass & Heller 1905)	Carcharhinus cf. galapagensis - Applegate,1978:57	\N	Tiburón	Requiem Shark	3	2	1	10	2	2	8	1	9	32	1
37	\N	\N	\N	\N	Carcharhinus	leucas	(Valenciennes 1839 in Müller & Henle 1839)	\N	\N	Tiburón	Bull Shark	3	2	1	12	2	2	8	1	9	32	1
38	\N	\N	\N	\N	Carcharhinus	limbatus	(Valenciennes 1839 in Müller & Henle 1839)	\N	\N	Tiburón	BlackTip Shark	3	2	1	10	2	2	8	1	9	32	1
39	\N	\N	\N	\N	Carcharhinus	obscurus	(Le Sueur 1818)	\N	\N	Tiburón	Dusky shark	3	2	1	10	2	2	8	1	9	32	1
40	\N	\N	\N	\N	Carcharhinus	velox	(Gilbert 1898)	\N	\N	Tiburón	Whitenose Shark	3	2	1	10	2	2	8	1	9	32	1
41	\N	\N	\N	\N	Carcharhinus	sp.	Blainville 1816	Carcharhinus? sp. - Minch et al. 1979:3152 / ?Carcharhinus species - Hertlein.1966:269.	\N	Tiburón	Requiem Shark	3	2	1	10	2	2	8	1	9	32	1
45	\N	\N	\N	\N	Galeocerdo	aduncus	Agassiz 1843b	\N	\N	Tintorera	Tigr Shark	3	2	1	10	2	2	238	1	9	32	2
46	\N	\N	\N	\N	Galeocerdo	cf. G. aduncus	Agassiz 1843b	Galeocerdo cf. aduncus - Applegate.1979:41	\N	Tintorera	Tiger Shark	3	2	1	12	2	2	238	1	9	32	2
47	\N	\N	\N	\N	Galeocerdo	falcatus	Agassiz 1843	\N	\N	Tintorera	Tiger Shark	3	2	1	10	2	2	238	1	9	32	2
48	\N	\N	\N	\N	Galeocerdo	rosaliaensis	Applegate 1978	\N	\N	Tintorera	Tiger Shark	3	2	1	10	2	2	238	1	9	32	2
49	\N	\N	\N	\N	Galeocerdo	sp.	Agassiz 1843b	Galeocerdo sp. (2) (t.  n. sp.) - Kruckow,1957:445	\N	Tintorera	Tiger Shark	3	2	1	10	2	2	238	1	9	32	1
52	\N	\N	\N	\N	Galeorhinus	sp.	Blainville 1816	\N	\N	\N	\N	5	2	5	17	5	7	53	5	10	32	6
53	\N	\N	\N	\N	Hemipristis	heteropleurus	Agassiz	\N	\N	\N	\N	5	2	5	17	5	7	54	5	10	32	2
54	\N	\N	\N	\N	Hemipristis	serra	Agassiz	\N	\N	\N	\N	5	2	5	17	5	7	54	5	10	32	2
55	\N	\N	\N	\N	Hemipristis	sp.	\N	\N	\N	\N	\N	5	2	5	17	5	7	54	5	10	32	2
56	\N	\N	\N	\N	Hypoprion	cf. acanthodon	\N	Hypoprion cf. acanthodon - Kruckow,1957:445Hypoprion - Müller & Henle,1838	\N	\N	\N	5	2	5	17	5	7	8	5	10	32	2
57	\N	\N	\N	\N	Negaprion	sp.	Whitley 1940	\N	\N	\N	\N	5	2	5	17	5	7	8	5	10	32	1
58	\N	\N	\N	\N	Prionace	glauca	(Linnaeus 1758)	\N	\N	\N	\N	5	2	5	17	5	7	8	5	10	32	1
59	\N	\N	\N	\N	Prionodon	tschoppi	\N	\N	\N	\N	\N	5	2	5	17	5	7	8	5	10	32	6
\.


             3456.dat                                                                                            0000600 0004000 0002000 00000001267 13264542003 0014260 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        2	1	3	11	1	1	1
2	1	3	11	2	2	2
2	1	3	11	43	6	6
2	1	3	11	43	7	7
2	1	3	11	43	8	8
2	1	3	11	43	9	9
2	1	3	11	61	3	3
2	1	3	11	61	4	4
2	1	3	11	61	5	5
2	2	3	11	1	1	1
2	2	3	11	2	2	2
2	2	3	11	43	2	6
2	2	3	11	43	2	8
2	2	3	11	43	33	7
2	2	3	11	43	34	9
2	2	3	11	61	2	4
2	2	3	11	61	31	3
2	2	3	11	61	32	5
2	3	3	11	1	1	1
2	3	3	11	2	2	2
2	3	3	11	2	23	2
2	3	3	11	43	2	8
2	3	3	11	43	13	6
2	3	3	11	43	14	7
2	3	3	11	43	15	8
2	3	3	11	43	16	9
2	3	3	11	43	20	6
2	3	3	11	43	21	7
2	3	3	11	43	22	9
2	3	3	11	43	27	6
2	3	3	11	43	28	7
2	3	3	11	43	29	8
2	3	3	11	43	30	9
2	3	3	11	61	10	3
2	3	3	11	61	11	4
2	3	3	11	61	12	5
2	3	3	11	61	17	3
2	3	3	11	61	18	4
2	3	3	11	61	19	5
2	3	3	11	61	24	3
2	3	3	11	61	25	4
2	3	3	11	61	26	5
\.


                                                                                                                                                                                                                                                                                                                                         3457.dat                                                                                            0000600 0004000 0002000 00000000460 13264542003 0014253 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        24	1
44	1
24	2
24	3
332	4
333	4
334	4
335	4
336	4
337	4
338	4
339	4
340	4
292	5
293	6
306	7
48	8
60	9
50	10
62	10
48	11
48	12
49	13
62	14
48	15
77	15
50	16
50	17
75	18
75	19
280	20
50	21
93	21
62	22
50	23
48	24
49	25
178	25
50	26
48	27
207	28
191	29
213	29
37	30
41	31
1	32
2	33
304	34
79	35
214	35
\.


                                                                                                                                                                                                                3458.dat                                                                                            0000600 0004000 0002000 00000003011 13264542003 0014247 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	\N	\N	3	\N	1	14	4	7	3	7	18
2	\N	\N	3	\N	2	33	4	7	3	7	18
3	\N	\N	3	\N	3	33	4	7	3	7	18
4	\N	\N	3	\N	5	33	4	7	3	7	18
5	\N	\N	3	\N	11	33	4	7	3	7	18
6	\N	\N	3	\N	12	33	4	7	3	7	18
7	\N	\N	3	\N	14	33	4	7	3	7	18
8	\N	\N	3	\N	17	33	4	7	3	7	18
9	\N	\N	3	\N	18	33	4	7	3	7	18
10	\N	\N	3	\N	31	33	4	7	3	7	18
11	\N	\N	3	\N	32	33	4	7	3	7	18
12	\N	\N	3	\N	34	33	4	7	3	7	18
13	\N	\N	3	\N	35	33	4	7	3	7	18
14	\N	\N	3	\N	36	33	4	7	3	7	18
15	\N	\N	3	\N	37	33	4	7	3	7	18
16	\N	\N	3	\N	38	33	4	7	3	7	18
17	\N	\N	3	\N	39	33	4	7	3	7	18
18	\N	\N	3	\N	40	33	4	7	3	7	18
19	\N	\N	3	\N	48	33	4	7	3	7	18
20	\N	\N	3	\N	54	33	4	7	3	7	18
21	\N	\N	3	\N	58	33	4	7	3	7	18
22	\N	\N	3	\N	60	33	4	7	3	7	18
23	\N	\N	3	\N	4	33	4	7	3	7	18
24	\N	\N	3	\N	13	33	4	7	3	7	18
25	\N	\N	3	\N	23	33	4	7	3	7	18
26	\N	\N	3	\N	41	33	4	7	3	7	18
27	\N	\N	3	\N	46	33	4	7	3	7	18
28	\N	\N	3	\N	52	33	4	7	3	7	18
29	\N	\N	3	\N	54	33	4	7	3	7	18
30	\N	\N	3	\N	5	130	4	7	3	7	42
31	\N	\N	3	\N	6	130	4	7	3	7	42
32	\N	\N	3	\N	11	130	4	7	3	7	42
33	\N	\N	3	\N	12	130	4	7	3	7	42
34	\N	\N	3	\N	26	130	4	7	3	7	42
35	\N	\N	3	\N	45	130	4	7	3	7	42
36	\N	\N	3	\N	49	130	4	7	3	7	42
37	\N	\N	3	\N	54	130	4	7	3	7	42
38	\N	\N	3	\N	56	130	4	7	3	7	42
39	\N	\N	3	\N	7	33	4	7	3	7	42
40	\N	\N	3	\N	8	33	4	7	3	7	3
41	\N	\N	3	\N	53	33	4	7	3	7	3
42	\N	\N	3	\N	9	130	4	7	3	7	42
43	\N	\N	3	\N	10	130	4	7	3	7	42
44	\N	\N	3	\N	11	33	4	7	3	7	18
45	\N	\N	3	\N	14	33	4	7	3	7	18
46	\N	\N	3	\N	11	33	4	7	3	7	18
47	\N	\N	3	\N	12	33	4	7	3	7	18
48	\N	\N	3	\N	14	33	4	7	3	7	18
49	\N	\N	3	\N	20	33	4	7	3	7	18
50	\N	\N	3	\N	11	33	4	7	3	7	18
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       3460.dat                                                                                            0000600 0004000 0002000 00000000005 13264542003 0014240 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           3462.dat                                                                                            0000600 0004000 0002000 00000000005 13264542003 0014242 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        \.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           3464.dat                                                                                            0000600 0004000 0002000 00000001160 13264542003 0014247 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	\N	209	1
2	\N	154	1
3	\N	63	1
4	\N	4279	1
5	\N	4102	1
6	\N	4103	1
7	\N	4227	1
8	\N	296	1
9	\N	292	1
10	\N	244	1
11	\N	263	1
12	\N	320	1
13	\N	533	1
14	\N	3844	1
15	\N	926	2
16	\N	368	1
17	\N	370	1
18	\N	3835	1
19	\N	3873	1
20	\N	4000	1
21	\N	3189	1
22	\N	3826	1
23	\N	3819	1
24	\N	3755	1
25	\N	1860	2
26	\N	238	2
27	\N	232	1
28	\N	2321	1
29	\N	2290	1
30	\N	1825	1
31	\N	197	1
32	\N	2	1
33	\N	4	1
34	\N	4210	1
35	\N	2782	1
36	\N	2293	1
37	\N	1089	2
38	\N	2248	2
39	\N	2316	1
40	\N	4459	1
41	\N	3634	1
42	\N	3655	1
43	\N	3658	1
44	\N	1071	2
45	\N	3051	1
46	\N	2175	2
47	\N	3827	1
48	\N	3052	1
49	\N	1036	2
50	\N	3456	2
\.


                                                                                                                                                                                                                                                                                                                                                                                                                3466.dat                                                                                            0000600 0004000 0002000 00000005305 13264542003 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	\N	27.3372002	-112.27378	\N	\N	\N	\N	\N	4	1	81	6	2
4	\N	18.0179996	-102.18334	\N	\N	\N	\N	\N	4	2	16	6	2
5	\N	26.5004005	-112.50967199999999	\N	\N	\N	\N	\N	4	3	158	6	2
8	\N	\N	\N	\N	\N	\N	\N	\N	4	4	\N	6	6
9	\N	23.3740997	-109.58261	\N	\N	\N	\N	\N	4	5	335	6	2
10	\N	23.7318993	-110.028316	\N	\N	\N	\N	\N	4	6	\N	6	6
11	\N	27.1928005	-113.021879	\N	\N	\N	\N	\N	4	7	\N	6	4
13	\N	27.6368999	-114.81153999999999	\N	\N	\N	\N	\N	4	8	\N	6	2
15	\N	24.5900993	-111.467215	\N	\N	\N	\N	\N	4	9	\N	6	2
16	\N	23.3332996	-109.61666700000001	\N	\N	\N	\N	\N	4	10	\N	6	4
17	\N	23.8833008	-110.25199000000001	\N	\N	\N	\N	\N	4	11	\N	6	4
18	\N	\N	\N	\N	\N	\N	\N	\N	4	12	\N	6	4
19	\N	32.0942001	-116.855648	\N	\N	\N	\N	\N	4	13	\N	6	2
20	\N	32.1421013	-116.80139800000001	\N	\N	\N	\N	\N	4	14	\N	6	2
21	\N	27.6317005	-114.80391400000001	\N	\N	\N	\N	\N	4	15	\N	6	2
22	\N	27.7511997	-114.969052	\N	\N	\N	\N	\N	4	16	\N	6	2
28	\N	\N	\N	\N	\N	\N	\N	\N	4	17	\N	6	4
29	\N	\N	\N	\N	\N	\N	\N	\N	4	18	\N	6	4
36	\N	32.1675987	-116.902108	\N	\N	\N	\N	\N	4	19	\N	6	2
37	\N	27.6940002	-114.862296	\N	\N	\N	\N	\N	4	20	\N	6	2
40	\N	27.6989002	-114.890793	\N	\N	\N	\N	\N	4	21	\N	6	2
42	\N	31.3132992	-116.39986399999999	\N	\N	\N	\N	\N	4	22	\N	6	2
48	\N	28.9706993	-103.266733	\N	\N	\N	\N	\N	4	24	\N	6	2
51	\N	32.0942001	-116.855648	\N	\N	\N	\N	\N	4	25	\N	6	2
53	\N	32.094101	-116.855664	\N	\N	\N	\N	\N	4	25	\N	6	2
54	\N	26.2427006	-98.911359000000004	\N	\N	\N	\N	\N	4	26	\N	6	6
57	\N	27.6987	-114.89419100000001	\N	\N	\N	\N	\N	4	27	\N	6	2
67	\N	23.3943005	-109.643348	\N	\N	\N	\N	\N	4	28	\N	6	2
78	\N	27.7000999	-114.899007	\N	\N	\N	\N	\N	4	29	\N	6	2
80	\N	\N	\N	\N	\N	\N	\N	\N	4	30	\N	6	6
89	\N	\N	\N	\N	\N	\N	\N	\N	4	31	\N	6	6
100	\N	26.5009003	-112.27378	\N	\N	\N	\N	\N	4	3	\N	6	2
101	\N	27.9645996	-112.811358	\N	\N	\N	\N	\N	4	32	\N	6	2
102	\N	27.6896992	-114.89419100000001	\N	\N	\N	\N	\N	4	27	\N	6	2
107	22.3 km NW Nuevo Delicias	26.3929996	-102.92700000000001	\N	\N	\N	\N	\N	4	34	\N	6	6
108	\N	31.4640007	-116.59099999999999	\N	\N	\N	\N	\N	4	35	\N	6	2
109	\N	29.5487003	-104.391999	\N	\N	\N	\N	\N	4	24	\N	6	2
110	\N	21.3852005	-98.989738000000003	\N	\N	\N	\N	\N	4	36	\N	6	6
113	\N	\N	\N	\N	\N	\N	\N	\N	4	37	\N	6	6
114	\N	21.2331009	-98.879247000000007	\N	\N	\N	\N	\N	4	38	\N	6	6
115	\N	\N	\N	\N	\N	\N	\N	\N	4	39	\N	6	6
117	\N	\N	\N	\N	\N	\N	\N	\N	4	40	\N	6	6
122	\N	\N	\N	\N	\N	\N	\N	\N	4	41	\N	6	6
123	\N	21.2420006	-98.858198000000002	\N	\N	\N	\N	\N	4	42	\N	6	6
125	\N	\N	\N	\N	\N	\N	\N	\N	4	43	\N	6	6
129	\N	\N	\N	\N	\N	\N	\N	\N	4	44	\N	6	6
140	\N	25.9127998	-97.563468	\N	\N	\N	\N	\N	4	45	\N	6	6
141	\N	20.2714996	-103.585854	\N	\N	\N	\N	\N	4	46	\N	6	6
142	\N	20.2978992	-103.24311400000001	\N	\N	\N	\N	\N	4	47	\N	6	6
143	\N	20.2908001	-103.39878899999999	\N	\N	\N	\N	\N	4	48	\N	6	6
\.


                                                                                                                                                                                                                                                                                                                           3468.dat                                                                                            0000600 0004000 0002000 00000000126 13264542003 0014254 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	d	Diurno
2	n	Nocturno
3	dn	Diurno-Nocturno
4	cr	Crepuscular
5	nd	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                          3470.dat                                                                                            0000600 0004000 0002000 00000000604 13264542003 0014246 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	AA	Agujero de agua
2	AN	Atrición natural
3	CN	Catástrofe natural
4	EC	Echadero de carnívoro
5	EH	Enterramiento humano
6	HI	Hibernaculum
7	nd	No Disponible
8	NR	Nido de rata
9	PD	Procesos deposicionales
10	RD	Sitio de reposo de ave depredadora
11	RT	Retrabajado
12	SC	Sitio de matanza o destazamiento por carnívoro
13	SH	Sitio de matanza o destazamiento por humano
14	TR	Trampa
\.


                                                                                                                            3472.dat                                                                                            0000600 0004000 0002000 00000007405 13264542003 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	AMNH	American Museum of Natural History
2	Carnegie Mus.	Carnegie Museum. Pittsburg. USA
3	CAS	California Academy of Sciences
4	Cia. Contratistas Unidos Mexicanos	Compañia Contratista Unidos Mexicanos. México D.F.
5	CODAUP	Colección Osteológica del Departamento de Antropología de la Universidad de Puebla Pue. México
6	Col. Darío Bárcenas	Colección Darío Bárcenas
7	Col. E.W. Guenther Univ. Kiel	Colección E.W. Guenther. Universitat del Kiel. Alemania Occidental
8	Col. FC	Colección Fauna Cedazo. O.B. Mooser (muy probablemente ubicada en MidWestern University) Texas. USA.
9	Col. F. Solórzano	Colección del Ing. Federico Solórzano. Guadalajara. Jalisco. México
10	Coleg. Edo. Gto.	Colegio de Guanaguato (paradero desconocido)
11	Esc. Nac. Cienc. Biol.	Escuela Nacional de Ciencias Biológicas. México D.F.
12	Esc. Minas México	Palacio de Mineria. México D.F. (paradero desconocido)
13	F-AMNH	Frick Collection. American Museum of Natural History. New York. USA
14	FCMPG	Univ. Nac. Autón. Méx. Facultad de Ciencias. Museo de Paleontología y Geología. Cd. Univ. México D.F.
15	Gab. Hist. Nat. Inst. Lit. Edo. Méx. Coleg. De la Cd. de Toluca	Gabinete de Historia Natural. Instituto Literario del Estado de México (paradero desconocido)
16	Geol. Inst. Breslau	Geol. Institut der Universitat Breslau
17	IGM	Instituto Geológico de México. México D.F. (en parte paradero desconocido)
18	IGCU	Univ. Nac. Autón. México. Instituto de Geología. Cd. Univ. México D.F.
19	IGM (Museo)	Univ. Nac. Autón. México. Museo de Geología Cipres. México D.F.
20	INAH-DP	Instituto Nacional de Antropología e Historia. Depto. de Prehistoria. Laboratorio de Paleozoología. México D.F.
21	KUMNH	Kansas University. Museum of Natural History. USA
22	LACM (CIT)	Los Angeles County Museum of Natural History. Los Angeles California
23	Mus. Cd. Aguascalientes. Ags.	Museo de la Cd. de Aguascalientes. Ags.
24	Mus. Hist. Nat. Bale Francia	Musée d´Historie Naturalle de Bale. France
25	Mus. Nac. Antropol. Hist. México	Museo Nacional de Historia Natural. México D.F.
26	Mus. Nac. México	Museo Nacional de México (paradero desconocido)
27	Mus. Reg. Inst. Nac. Antropol. Hist. Guadalajara	Museo Regional del Instituto Nacional de Antropología e Historia. Cd. De Guadalajara. Jal.
28	Mus. Reg. Antropol. Pachuca. Hgo.	Museo Regional de Antropología de la Cd. de Pachuca. Hgo.
29	MWU	MidWestern University Texas. USA
30	Palc. Mpio. Villa de Corzo. Chis.	Palacio Municipal de Villa de Corzo. Chis.
31	Palc. Mpio. Xicotencatl. Tamps.	Palacio Municipal de Xicotencatl. Tamaulipas
32	TMM	Texas Memorial Museum. Texas. USA
33	TTU-P	Texas Tech University Museum. Texas. USA
34	Univ. Autón. Morelos	Universidad Autónoma del Estado de Morelos. Cuernavaca. Morelos
35	UCLA	University of California. Los Angeles. California. USA
36	UCMP	University of California. Museum of Paleontology. Berkeley. California. USA
37	UCR	University of California at Riverside. USA
38	Uni. Leipzig Mus. Paleontol.	Palaontolgischen Museum der Universitat Leipzig
39	UMMP	University of Michigan Museum of Paleontology. Ann Harbor. USA
40	USNM	National Museum of Natural History. Washington. D.C. USA
41	Yale Univ. Mus.	Yale University Museum. USA
42	nr	no referencia
43	Gab. Hist. Univ. Autón. Puebla	Gabinete Historia Natural Universidad Autónoma de Puebla
45	Colg. de la Cd. Toluca	Colegio de la Ciudad de Toluca
46	Smithsonian Inst. Mus.	Smithsonian Intitution Museum
47	Esc. Ing. No.1	Escuela de Ingenieria No.1
48	Inst. Antrop. Hist. Jalisco	Instituto de Antropología e Historia de Jalisco
49	LEB-UTEP	Laboratory for Environmental Biology. University of Texas at El Paso
50	PASAC	Asociación de Paleontólogos Aficionados de Sabinas Coahuila
51	UAHMP	Colección de Macromamíferos Museo de Paleontología Universidad Autónoma del Estado de Hidalgo
\.


                                                                                                                                                                                                                                                           3474.dat                                                                                            0000600 0004000 0002000 00000000117 13264542003 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Publicación
2	Modelo digital elevación
3	Google Earth
4	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                 3476.dat                                                                                            0000600 0004000 0002000 00000002657 13264542003 0014266 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	AB	Abrigo rocoso
2	AC	Abanico coluvial
3	AG	Agujero (Pit)
4	AR	Arroyo
5	AS	Asfalto
6	BI	Biológico
7	BL	Bentónico litoral
8	BP	Bentónico de mar profundo
9	CA	Canal
10	CB	Cauce de canal abandonado
11	CC	Ceniza de caida
12	CE	Corriente entrelazada
13	CL	Coluvión
14	CN	Cenote
15	CU	Cultural
16	DE	Deslizamiento, derrumbe
17	DU	Duna
18	EO	Plataforma de erosión por oleaje
19	ES	Estuarino
20	FC	Fragmentos de caida
21	FL	Flujo de lava
22	FS	Fisura
23	FU	Flujo
24	GF	Grava de deflación
25	HZ	Horizontal
26	LA	Lámina de arena
27	LC	Lago de colapso
28	LD	Lago en depresión de deshielo
29	LG	Lago
30	LS	Loess
31	LV	Lavado
32	MF	Cinturón meándrico de grano fino
33	MG	Cinturón meándrico de grano grueso
34	NA	Nube ardiente
35	nd	No Disponible
36	OL	Olla
37	PA	Pantano
38	PD	Poza
39	PI	Cuenca de planicie de inundación
40	PL	Playa
41	TL	Tubo de lava
42	WD	Wadi (canal de corriente barranca zanja cañada córcava arroyo)
43		River and flood plain deposits
44		Aluvial
45		Cueva
46		Offshore. Bottom environment that was poorly oxygenated and without currents.
47		Offshore shelf lime mudstone-marl in Mexico. http://paleodb.org.
48		The Aguja Formation is Campanian in age and was deposited under deltaic conditions representing marsh lagoonal and eulittoral to shallow marine environments
49		Represents an inner shelf setting with variable energy conditions. The shell-rich beds could have been formed by storms.
50		Open marine self plataform
\.


                                                                                 3478.dat                                                                                            0000600 0004000 0002000 00000000376 13264542003 0014264 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Agnatha	Cope	1889
2	Chondrichthyes	Huxley	1880
3	Osteichthyes	Huxley	1880
4	Amphibia	Linnaeus	1758
5	Reptilia	Laurenti	1768
6	Aves	Linnaeus	1758
7	Mammalia	Linnaeus	1758
8	Actinopterygii	Klein	1885
9	Sauropsida		
10	Synapsida		
11	No Disponible		
\.


                                                                                                                                                                                                                                                                  3480.dat                                                                                            0000600 0004000 0002000 00000000101 13264542003 0014237 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	N	No Presente
2	nd	No Disponible
3	O	Posible
4	P	Presente
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                               3482.dat                                                                                            0000600 0004000 0002000 00000000106 13264542003 0014246 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	A	Articulado
2	I	Intrusivo
3	nd	No Disponible
4	R	Redepositado
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                          3484.dat                                                                                            0000600 0004000 0002000 00000000144 13264542003 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	c	carnívoro
2	h	hervíboro
3	i	invertebrados
4	p	piscívoro
5	nd	No Disponible
6	o	onmivoro
\.


                                                                                                                                                                                                                                                                                                                                                                                                                            3486.dat                                                                                            0000600 0004000 0002000 00000000455 13264542003 0014261 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	dc	dominate Carnívoro
2	dp	dominante plantas
3	ge	generalista
4	ra	ramoneador
5	co	corteza
6	ex	exhudados
7	f	frugívoro
8	g	granívoro
9	xx	exhu-frg-gran
10	ch	carne-hueso
11	mo	moluscos
12	c	carne
13	my	Myrmecófago
14	in	invertebrados
15	he	hematófago
16	me	meliléico
17	nd	No Disponible
\.


                                                                                                                                                                                                                   3488.dat                                                                                            0000600 0004000 0002000 00000001065 13264542003 0014261 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Paleoindio	9200 a 6000 ac
2	Paleoindia-Arcaico-Temprano	9200 a 2500 ac
3	Arcaico Temprano	6000 a 2500 ac
4	Arcaico Temprano-Arcaico Medio	6000 a 1000 ac
5	Arcaico Temprano - Arcaico Tardío	6000 a 300 ac
6	Arcaico Medio	2500 a 1000 ac
7	Arcaico Medio-Arcaico Tardío	2500 a 300 ac
8	Arcaico Medio-Arcaico Transicional	2500 ac a 700 dc
9	Arcaico Tardío	1000 a 300 ac
10	Arcaico Tardío-Prehistórico Tardio	1000 ac a 1600 dc
11	Prehistorico Tardío	700 a 1600 dc
12	Prehistórico Tardío-Histórico	700 a 1800 dc
13	Histórico	1700 a 1800 dc
14	No Definida	
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                           3490.dat                                                                                            0000600 0004000 0002000 00000001337 13264542003 0014254 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Superior
2	Ionian
3	Calabriense
4	Gelasiense
5	Piacenziense
6	Zancliense
7	Messiniense
8	Tortoniense
9	Serravalliense
10	Langhiense
11	Burdigaliense
12	Aquitaniense
13	Chattiense
14	Rupeliense
15	Priaboniense
16	Bartoniense
17	Luteciense
18	Ypresiense
19	Thanetiense
20	Selandiense
21	Daniense
22	Maastrichtiense
23	Campaniense
24	Santoniense
25	Coniaciense
26	Turoniense
27	Cenomaniense
28	Albiense
29	Aptiense
30	Barremiense
31	Hauteriviense
32	Valanginiense
33	Berriasiense
34	Titoniense
35	Kimmeridgiense
36	Oxfordiense
37	Calloviense
38	Bathoniense
39	Bajociense
40	Aaleniense
41	Toarciense
42	Pliensbachiense
43	Sinemuriense
44	Hettangiense
45	Rhaetiense
46	Noriense
47	Carniense
48	Ladiniense
49	Anisiense
50	Olenekiense
\.


                                                                                                                                                                                                                                                                                                 3492.dat                                                                                            0000600 0004000 0002000 00000002044 13264542003 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	a	astrágalo
2	aisl	aislado(s)
3	an	angular
4	ant	anterior(es)
5	adult	adulto(s)
6	apend	apendicular(es)
7	ap.web	aparato weberiano
8	ar	articular-articular-angular
9	arc frg	arco(s) faríngeo(s)
10	artc	articulado(s)
11	bo	basiooccipital
12	b.p.	buena preservación
13	bst	radio(s) branquistego(s)
14	C	canino(s)
15	ca	calcáneo(s)
16	carap	carapazón
17	caud	caudal(s)
18	cerv	cervicales
19	chy	cerathoial
20	cint	cintura
21	cl	clavícula
22	clt	cleithro
23	cuc	carpometacarpus
24	compl	completo
25	cor	caracoides
26	cost	costilla(s)
27	Cr	cráneo
28	crp	carpal(es)
29	cu	cuneiforme(s)
30	De	dentario
31	dent	denticion(es)
32	deth	dermetmoides
33	dient	diente(s)
34	dient frg	diente(s) faríngeo(s)
35	dis	distal(s)
36	dors	dorsal(s)
37	ehy	epihyal
38	element	elemento(s)
39	element apendic	elemento(s) apendicular(es)
40	element post-cr	elemento(s) postcraneal(es)
41	eo	exoccipital(es)
42	epiot	epiótico
43	eplast	epiplastrón
44	esc	escudo
45	eth	etmoides
46	extr	extremo(s)
47	f	fíbula - peroné
48	flg	falange(s)
49	fm	fémur
50	fr	frontal(es)
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            3494.dat                                                                                            0000600 0004000 0002000 00000001664 13264542003 0014263 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Holoceno
2	Pleistoceno
3	Plioceno
4	Mioceno
5	Oligoceno
6	Eoceno
7	Paleoceno
8	Cretácico Superior
9	Cretácico Inferior
10	Jurásico Superior
11	Jurásico Medio
12	Jurásico Inferior
13	Triásico Superior
14	Triásico Medio
15	Triásico Inferior
16	Lopingian (Pérmico-Sup)
17	Guadalupian (Pérmico-Med)
18	Cisuralian (Pérmico-Inf)
19	Pennsylvanian
20	Mississipian
21	Devónico Superior
22	Devónico Medio
23	Devónico Inferior
24	Pridoli
25	Ludlow
26	Wenlock
27	Llandovery
28	Ordovícico Superior
29	Ordovícico Medio
30	Ordovícico Inferior
31	Furongian
32	Series 3
33	Series 2
34	Terreneuvian
35	Plioceno Medio
36	Mioceno Temprano
37	Mioceno Medio
38	Eoceno-Oligoceno
39	Mioceno Tardío
40	Eoceno Tardío
41	Pleistoceno Tardío
42	Plioceno Tardío
43	Pleistoceno Medio
44	Pleistoceno Tardio-Reciente
45	Oligoceno Temprano
46	Plioceno Temprano
47	Paleoceno Tardio
48	Pleistoceno Temprano
49	Pleistoceno Temprano-Medio
50	Oligoceno Medio
\.


                                                                            3496.dat                                                                                            0000600 0004000 0002000 00000000073 13264542003 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Paleozooico
2	Mesozoico
3	Cenozoico
4	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                     3498.dat                                                                                            0000600 0004000 0002000 00000000331 13264542003 0014255 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Interglacial
2	No Disponible
3	Última Glaciación
4	Último Interglacial
5	Penúltima Glaciación
6	Penúltimo Interglacial
7	Antepenúltima Glaciación
8	Antepenúltima Interglaciación
9	Primera Glaciación
\.


                                                                                                                                                                                                                                                                                                       3500.dat                                                                                            0000600 0004000 0002000 00000000774 13264542003 0014250 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Aguascalientes
2	Baja California Norte
3	Baja California Sur
4	Campeche
5	Coahuila de Zaragoza
6	Colima
7	Chiapas
8	Chihuahua
9	Distrito Federal
10	Durango
11	Guanajuato
12	Guerrero
13	Hidalgo
14	Jalisco
15	Estado de México
16	Michoacán de Ocampo
17	Morelos
18	Nayarit
19	Nuevo León
20	Oaxaca
21	Puebla
22	Querétaro de Artega
23	Quintana Roo
24	San Luis Potosí
25	Sinaloa
26	Sonora
27	Tabasco
28	Tamaulipas
29	Tlaxcala
30	Veracruz de Ignacio de la Llave
31	Yucatán
32	Zacatecas
33	No Disponible
\.


    3502.dat                                                                                            0000600 0004000 0002000 00000001372 13264542003 0014245 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	AA	Arena asfáltica
2	AL	Aluvión
3	AP	Lodo de agua profunda
4	AS	Lodo de agua somera
5	BC	Brecha de colapso de cueva
6	BM	Barra de canal
7	BR	Barra
8	CA	Canal
9	CH	Chapopotera
10	CP	Cono de pantano
11	CS	Crevasse splay (morrena)
12	DG	Deltaica grueso
13	DI	Diatomita
14	DQ	Dique
15	DS	Desintegración de roca madre
16	EN	Enterramiento
17	EO	Eólica
18	ES	Estiércol
19	FL	Fluvial
20	GF	Granular fino
21	GG	Granular grueso
22	GL	Grava de canal
23	HG	Hogar
24	HO	Horadación
25	LC	Lacustrino
26	MA	Marga
27	MN	Midden
28	MO	Montículo
29	NC	No clasificado
30	nd	No Disponible
31	PA	Paleosol
32	Pl	Planicie de inundación
33	PO	Poza
34	PQ	Precipitación química
35	RS	Restos de ocupación
36	TE	Terraza
37	TF	Tufa
38	TR	Travertino
39	TU	Turba
40	VR	Varvado
\.


                                                                                                                                                                                                                                                                      3504.dat                                                                                            0000600 0004000 0002000 00000002450 13264542003 0014245 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	incertae sedis		
2	Heterodontidae	Gray	1851
3	Hexanchidae	Gray	1851
4	Rhincodontidae	Müller & Henle	1839
5	Odontaspididae	Müller & Henle	1839
6	Lamnidae	J.P. Müller and Henle	1838
7	Scyliorhinidae	Gill	1862
8	Carcharhinidae	Jordan & Evermann	1896
9	Sphyrnidae	Gill	1872
10	Squalidae	Bonaparte	1834
11	Pristidae	Bonaparte	1838
12	Dasyatidae	Jordan	1888
13	Miliobatidae	Bonaparte	1838
14	Helicoprionidae	Karpinsky	1911
15	Ptychodontidae	Jaekel	1898
16	Ceratodontidae	Gill	1872
17	Semionotidae	Woodward	1890
18	Pycnodontidae	Agassiz	1833
19	Macrosemiidae	Thiollière	1858
20	Aspidorhynchidae	Nicholson & Lydekker	1889
21	Leptolepidae	Nicholson & Lydekker	1889
22	Ichthyodectidae	Crook	1892
23	Clupeidae	Cuvier	1817
24	Chirocentridae	Cuvier and Valenciennes	1846
25	Pachyrhyzodontidae	Cope	1872
26	Congridae		
27	Enchodontidae	Woodward	1901
28	Salmonidae		
29	Cyprinidae		
30	Catostomidae		
31	Ictaluridae	Gill	1861
32	Myctophidae		
33	Bregmacerotidae		
34	Goodeidae		
35	Poecilidae		
36	Atherinidae		
37	Centrachidae		
38	Sciaenidae	Gill	1861
39	Gobiidae		
40	Scombridae		
41	Pleuronectidae		
42	Diodontidae		
43	Leptodactylidae	Berg	1838
44	Bufonidae	Gray	1825
45	Ranidae	Rafinesque	1814
46	Rhinophrynidae		
47	Ambystomatidae	Hallowell	1856
48	Emydidae	Bell	1825
51	Cetorhinidae	Gill	1862
53	Triakidae	Gray	1851
\.


                                                                                                                                                                                                                        3506.dat                                                                                            0000600 0004000 0002000 00000001262 13264542003 0014247 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Colima
2	Huajuapan
3	Tarango
4	Agua de Luna
5	Cuernavaca
6	Gravas Uvalde
7	Grupo Piaxtla
8	Guadiana
9	Santa Inés
10	Atotonilco El Grande
11	Grupo Pachuca
12	Punta Maldonado
13	Reynosa
14	Sabinas
15	Alquitrán
16	Mesón
17	Papagayo
18	San Pablo
19	Suchiquitongo
20	Tlanchinol
21	Yanhuitlan
22	Agua de Obispo
23	Aquila
24	Alazan
25	Cacaria
26	Corteza
27	El Morro
28	Gamon
29	Grupo Balsas
30	Grupo Carpintero
31	Horcones
32	Pachuca
33	Palma Real
34	Riolita Santiago
35	Santuario
36	Tecomatlán
37	Adjuntas
38	Ahuichila
39	Aragón
40	Bigford
41	Carrizo
42	Carroza
43	Chapopote
44	Chichontepec
45	Conglomerado Tamazulpan
46	El Morro
47	Guayabal
48	Huajintlan
49	Pie de Vaca
50	Tantoyuca
\.


                                                                                                                                                                                                                                                                                                                                              3508.dat                                                                                            0000600 0004000 0002000 00000000147 13264542003 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	m	Mapa
2	mpo	Municipio
3	lit	Literatura
4	geop	Geoposicionador
5	a	Artículo
6	nd	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                         3510.dat                                                                                            0000600 0004000 0002000 00000000721 13264542003 0014241 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Caos
2	No Disponible
3	Wisconsiniana
4	Sangamoniana
5	Illinoisiana
6	Yarmoutina
7	Kansasiana
8	Aftoniana
9	Nebraskana
10	Würm
11	Riss-Würm
12	Riss
13	Mindel-Riss
14	Mindel
15	Günz-Mindel
16	Günz
17	Welchseliana or Vistula
18	Eemiana
19	Saaliana
20	Holsteiniana
21	Elsteriana
22	Menapian
23	Flandrian
24	Devensian
25	Ipswichian
26	Wolstonian or Gipping
27	Hoxnian
28	Anglian
29	Cromerian
30	Beestonian
31	Llanquihue
32	Santa Maria
33	Rio Llico
34	Caracol
\.


                                               3512.dat                                                                                            0000600 0004000 0002000 00000000126 13264542003 0014242 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	ae	aéreo
2	ac	acuático
3	as	semi-acuático
4	te	terrestre
5	nd	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                          3514.dat                                                                                            0000600 0004000 0002000 00000000163 13264542003 0014245 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	a	aéreo
2	ac	acuático
3	ae	aéreo-superficie
4	fo	forestal
5	sup	superficie
6	su	suelo
7	nd	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                             3516.dat                                                                                            0000600 0004000 0002000 00000000157 13264542003 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	a	acuático
2	as	arbóreo-superficial
3	cv	cueva
4	su	superficie
5	nd	No Disponible
6	ac	altas cornisas
\.


                                                                                                                                                                                                                                                                                                                                                                                                                 3518.dat                                                                                            0000600 0004000 0002000 00000000146 13264542003 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	I1	Etapa 1
2	I2	Etapa 2
3	I3	Etapa 3
4	I4	Etapa 4
5	I5	Etapa 5
6	I0	Etapa O
7	nd	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                          3520.dat                                                                                            0000600 0004000 0002000 00000000125 13264542003 0014240 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Etapa 1
2	Etapa 2
3	Etapa 3
4	Etapa 4
5	Etapa 5a-5e
6	Etapa 6
7	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                           3522.dat                                                                                            0000600 0004000 0002000 00000000053 13264542003 0014242 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Izquierdo
2	Derecho
3	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     3524.dat                                                                                            0000600 0004000 0002000 00000000337 13264542003 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	a	aérea
2	v	vuelo
3	p	planeo
4	ar	arbóreo
5	fo	fosorial
6	sf	semi-fosorial
7	su	superficial
8	te	terrestre
9	ac	acuática
10	nd	No Disponible
11	at	acuática-terrestre
12	aa	aéreo-acuática
13	ae	aéreo-terrestre
\.


                                                                                                                                                                                                                                                                                                 3526.dat                                                                                            0000600 0004000 0002000 00000000142 13264542003 0014245 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	BRUN	Brunhes
2	GAUS	Gauss
3	GILB	Gilbert
4	MATU	Matuyama
5	nd	No Disponible
6	OLDU	Olduvai
\.


                                                                                                                                                                                                                                                                                                                                                                                                                              3528.dat                                                                                            0000600 0004000 0002000 00000001347 13264542003 0014257 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	AMHU	Aminoácidos de hueso
2	APCA	Apatita/carbonato óseo
3	ARFI	Artefacto fibroso
4	ARPI	Artefacto de piedra
5	CAHI	Característica histórica
6	CARB	Carbonato
7	CARO	Carbón
8	CERA	Cerámica
9	CEVO	Ceniza volcánica
10	COCA	Concha carbonatada
11	COGA	Concha orgánica
12	COHU	Colágeno de hueso
13	CONC	Concha
14	CORR	Fecha corregida
15	DECO	Dendrocronología corregida
16	ESMA	Esmalte de diente
17	ESTI	Estiércol
18	ESTR	Estructura o rasgo
19	GYTJ	Gyttja
20	HUCA	Hueso carbonizado
21	HUES	Hueso
22	HUMA	Humates
23	ISCO	Isotópicamente corregida
24	LACU	Lámina de cuerno
25	LOGA	Lodo orgánico
26	MADE	Madera
27	MAPA	Material de planta
28	nd	No Disponible
29	OBSI	Obsidiana
30	PACA	Planta carbonizada
31	PLEO	Paleosol
32	TURB	Turba
\.


                                                                                                                                                                                                                                                                                         3530.dat                                                                                            0000600 0004000 0002000 00000001032 13264542003 0014237 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	14CA	Radiocarbono-acelerador
2	14CD	Radiocarbono desconocido
3	14CG	Radiocarbono-gas/benceno
4	14CS	Radiocarbono-carbón sólido
5	230T	230T
6	40KA	40K/40AR
7	AMAG	Arqueomagnético
8	AMIN	Racemización de aminoácidos
9	BIOS	Bioestratigráfico
10	CORR	Fecha corregida
11	CULT	Asociación cultural
12	DEND	Dendrocronología
13	ELSR	Resonancia por "spin" electrónico
14	FISS	Trazas de fisión
15	HIOB	Hidratación de obsidiana
16	nd	No Disponible
17	PMAG	Paleomagnetismo
18	TERM	Termoluminiscencia
19	U234	234U
20	URTO	Uranio-torio
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      3532.dat                                                                                            0000600 0004000 0002000 00000001254 13264542003 0014247 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Aguascalientes
2	Asientos
3	Calvillo
4	Cosío
5	Jesús María
6	Pabellón de Arteaga
7	Rincón de Romos
8	San José de Gracia
9	Tepezalá
10	El Llano
11	San Francisco de los Romo
12	Playas de Rosarito
13	Mexicali
14	Tecate
15	Ensenada
16	Tijuana
17	Loreto
18	Mulegé
19	Comondú
20	La Paz
21	Los Cabos
22	Campeche
23	Carmen
24	Champotón
25	Palizada
26	Calkiní
27	Candelaria
28	Calakmul
29	Hopelchén
30	Hecelchakán
31	Escárcega
32	Tenabo
33	Abasolo
34	Acuña
35	Allende
36	Arteaga
37	Candela
38	Castaños
39	Cuatro Ciénegas
40	Escobedo
41	Francisco I. Madero
42	Frontera
43	General Cepeda
44	Guerrero
45	Hidalgo
46	Jiménez
47	Juárez
48	Lamadrid
49	Matamoros
50	Monclova
\.


                                                                                                                                                                                                                                                                                                                                                    3534.dat                                                                                            0000600 0004000 0002000 00000002560 13264542003 0014252 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	indeterminado		
2	Heterodontiformes	Berg	1940
3	Hexanchiformes	de Buen	1926
4	Lamniformes	Berg	1958
5	Squaliformes	Compagno	1974
6	Rajiformes	Berg	1940
7	Helicoprioniformes		
8	Hybodontiformes	Patterson	1966
9	Ceratodiformes		
10	Semiodontiformes	Arambourg and Bertini	1958
11	Pycnodontiformes	Berg	1937
12	Amiiformes	Hay	1929
13	Aspidornynchiformes		
14	Leptolepiformes		
15	Osteoglossiformes	Berg	1940
16	Clupeiformes	Bleeker	1859
17	Elopiformes	Sauvage	1875
18	Anguilliformes		
19	Salmoniformes	Bleeker	1859
20	Cypriniformes	Bleeker	1859
21	Siluriformes		
22	Myctophiformes		
23	Gadiformes		
24	Atheriniformes	Donn Rosen	1966
25	Perciformes		
26	Pleuronectiformes		
27	Tetrodontiformes		
28	Anura	Fitzinger	1843
29	Urodela	Dumèril	1806
30	Chelonia	Batsch	1788
31	Orectolobifomes	Applegate	1972
32	Carcharhiniformes	Compagno	1973
35	Elopomopha (SO)		
36	Squamata	Oppel	1811
37	Crocodyliformes	Benton and Clark	1988
38	Saurischia	Seeley	1888
39	Ornithischia	Seeley	1888
40	Sauropterygia	Owen	1861
41	Ichthyosauria	de Blainville	1835
42	Podicipediformes	Fürbringer	1888
43	Procellariiformes	Fürbringer	1888
44	Pelecaniformes	Sharpe	1891
45	Ardeiformes	Wagler	1831
46	Anseriformes	Wagler	1831
47	Falconiformes	Sharpe	1874
48	Galliformes	Temminck	1820
49	Ralliformes	Reichenbach	1849
50	Charadriiformes	Huxley	1867
51	Columbiformes	Latham	1790
52	Phoenicopteriformes	Fürbringer	1888
\.


                                                                                                                                                3536.dat                                                                                            0000600 0004000 0002000 00000000036 13264542003 0014250 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Mexico
2	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  3538.dat                                                                                            0000600 0004000 0002000 00000000064 13264542003 0014253 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Anterior
2	Posterior
3	Media
4	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                            3540.dat                                                                                            0000600 0004000 0002000 00000000325 13264542003 0014244 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Cámbrico
2	Ordovícico
3	Silúrico
4	Devónico
5	Carbonífero
6	Pérmico
7	Triásico
8	Jurásico
9	Cretácico
10	Terciario
11	Cuaternario
12	Paleógeno
13	Neógeno
14	Pérmico
15	No Disponible
16	Reciente
\.


                                                                                                                                                                                                                                                                                                           3542.dat                                                                                            0000600 0004000 0002000 00000001267 13264542003 0014254 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Rancholabrean
2	Irvingtonian
3	Blancan
4	Hemphilian
5	Clarendonian
6	Barstovian
7	Hemingfordian
8	Arikareean
9	Whitneyan
10	Orellan
12	Chadronian
13	Duchesnean
14	Uintan
15	Bridgerian
16	Wasatchian
17	Clarkforkian
18	Tiffanian
19	Torrejonian
20	Puercan
21	Lancian
22	No Disponible
23	Edmontonian
24	Judithian
25	Aquillian
26	Reciente
27	Actual
28	Agenian
29	Arshantan
30	Arvenian
31	Astaracian
32	Bahean
33	Baodean
34	Bonaerian
35	Bumbanian
36	Casamayoran (Barrancan Subage)
37	Cemaysian
38	Chapadmalalan
39	Chasicoan
40	Colhuehuapian
41	Colloncuran
42	Deseadan
43	Ensenadan
44	Ergillian
45	Friasian
46	Geiseltalian
47	Grauvian
48	Headonian-1
49	Headonian-2
50	Huayquerian
51	Irdinmanhan
\.


                                                                                                                                                                                                                                                                                                                                         3544.dat                                                                                            0000600 0004000 0002000 00000000230 13264542003 0014243 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	ca	Coordenadas aproximadas
2	cm	Coordenadas centro municipios
3	cp	Coordenadas precisas
4	e	Exacto
5	uge	Ubicadas GoogleEarth
6	nd	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                        3546.dat                                                                                            0000600 0004000 0002000 00000021146 13264542003 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        2	Applegate P. S. 1978. Phyletic studies: Part I Tiger Sharks. Revista del Instituto de Geología Universidad Nacional Autónoma de México 21: 55-64:57.
4	Applegate P. S. 1979. El primer registro de una selacifauna miocénica de Michoacán. Resúmenes III Congreso Nacional de Zoología Universidad Autónoma de Aguascalientes: p.41.
5	Kruckow Thorwald. 1957.Die stratigraphische und paläogeographische Bedeutung der miozänen Elasmobranchier-Fauna von Baja California. Mexiko. Neues Jahrbuch für Geologie und Palaontologie, Monatshefte. (10): 444-449:445.
8	Mullerried G. K. F. 1939. Apuntes paleontológicos y estratigráficos sobre le Valle del Mezquital Estado de Hidalgo. Anales de la Escuela Nacional de Ciencias Biológicas México 12: 225-255:231
10	Hertlein L. G. 1966. Pliocene fossils from Rancho El Refugio Baja California and  Cerralvo Island Mexico. Procceadings of the California Academy of Sciences 3014: 265-284:269.
11	Hanna G. D. and G. L. Hartlein 1927. VI. Expedition of the California Academy of Sciences to the Gulf of California in 1921 Geology and Paleontology. Procceadings of the California Academy of Sciences 4XVI6: 137-157:298.
13	Jordan D. S. & Gilbert J. Z. 1919. Fossil fishes of Southern California. Stanford University California. Leland Stanford Jr. University Publications Series:22
22	Leriche M. 1938.Contribution à l'étude des poissons fossiles des pays riverains de la Méditerranée américaine (Venezuela Trinité Antilles Mexique). Mémoires de la Société Paléontologique Suisse 61 (1): 42 p. 5 fig. 4 pl.:35.
63	Aguilera J. 1907. Carta Geologique du I'Amerique du Nord: Congreso Geológico Internacional. Compto Rend£ du la Xø Sesion 1906: 227-248p.:240.
73	Maldonado-Koerdell M. 1948b. Peces fósiles de México I. Elasmobranquios. Revista de la Sociedad Mexicana de Historia Natural 93-4: 295-300:131.
87	Wittich E. 1913. Restos de selacios del Terciario de la División Norte de Baja California. Actas Veracruzana. Soc. Geol. Mex- p 1-16:6.
99	Minch A. J. K. C. Schulte et al. 1970. A Middle Miocene age for the Rosario Beach Formation in northwestern Baja California Mexico. Geological Society of America Bulletin 81: 3149-3154:3152.
108	Dickerson R. E. a. and K. W.S.W. 1917. Tertiary mollusks and echinoderms of Tuxpan Mexico. Geological Society of America Bulletin 28: 224-225:224.
144	Mullerried G. K. F. 1945. El edéstido Helicoprion encontrado por primera vez en México en el estado de Coahuila. Ciencia México 65-6: 208-212:208.
147	Jordan.1936 (fide Schurchart.1937:325)
153	Maldonado-Koerdell M. 1956. Peces fósiles de México III. Nota preliminar sobre peces del Turonian Superior de Xilita San Luis Potosí México. Ciencia Mexico. 161. 31-36:33,
154	Aguilera J. 1906b. XXVII (Excursion du Norde) Gisemente carboniferes du Coahuila: Guide des Excursions du X Congr. Geol. Inter. Mexico. Ministere. du Fomento. 1-17:13.
177	Dunkle H. D. and M. Maldonado-Koerdell 1953. Notes on some Mesozoic fossil remains from Mexico. Journal of the Washington Academy of Sciences 4310: 311-317:313.
197	Applegate P. S. y O. Comas 1980. Primera ictiofauna del Cretácico Inferior de México. Estado de Oaxaca. Resúmenes V Congreso Geológico Nacional Sección Geología Mexicana: p.110.
198	Dunkle H. D. and M. Maldonado-Koerdell 1953. Notes on some Mesozoic fossil remains from Mexico. Journal of the Washington Academy of Sciences 4310: 311-317:314.
200	Cope D. E. 1872. On two extinct forms of Physiostomi of the Neotropical region. Proceadings of the American Society of Philadelphia 12: 52-55.:52.
209	Aguilera J. 1896. Bosquejo geológico de México. Boletín del Instituto de Geología 4-6: 270p:222.
231	Cavender M. Ted Robert Miller R. 1982. Salmo australis a new species of fossil salmonid from southwestern Mexico. University of Michigan Contributions of the Museum of Paleontology 26(1): 1-17:3.
232	Alvarez J. 1974. Contribución al conocimiento de los peces fósiles de Chapala y Zacoalco Aterínidos y Ciprínidos. Anales del Instituto Nacional de Antropología e Historia. 7ava 4: 191-209:202.
238	Alvarez José y Ma. Eugenia Moncayo. 1976. Contribución a la paleoictiología de la Cuenca de México. Anales del Instituto Nacional de Antropología e Historia México 7ava Epoca 6: 191-242.:197.
242	Block Iurriaga Carmen. 1963. Contribución al estudio de los peces fósiles del Valle de México Facultad de Ciencias Universidad Nacional Autónoma de México: 25p:25.
244	Alvarez José y Ma. Eugenia Moncayo. 1976. Contribución a la paleoictiología de la Cuenca de México. Anales del Instituto Nacional de Antropología e Historia México 7ava Epoca 6: 191-242:192.
253	Smith L. M. 1981. Late Cenozoic fishes in the wars desert adaptations. Fishes in North American Deserts. J. R. Naiman and D. L. Soltz. New York John Wiley & Sons: 11-38:23
263	Alvarez J. 1966. Contribución al conocimiento de los bagres fósiles de Chapala y Zacoalco Jalisco México. Instituto Nacional de Antropología e Historia México Departamento de Prehistoria Serie Paleoecología 1: 26:25.
274	Brown B. 1912. Brachyostracon a new genus of glyptodonts from Mexico. American Museum of Natural History Bulletin 3117: 167-177:167.
279	Weiler W. 1959. Miozäne Fisch-Otolithe aus der Bohrung S. Pablo-2 im Beckein von Veracruz in Mexiko. N. Jarhb. Geol. Paläon. Abh. 1091: 147-172:149.
288	Smith Michael L. Ted M. Cavender Robert M. Miller 1975. Climatic and biogeographic significance of a fish fauna from the Late Pliocene-Early Pleistocene of the Lake Chapala Basin Jalisco Mexico. Studies on Cenozoic paleontology and statigraphy in Honor of Claude W. Hibbard. Michigan University of Michigan Papers on Paleontology. 12: 29-38:35.
292	Álvarez J. y. and L. J. Arriola 1972. Primer geodeido fósil procedente del Plioceno Jalisciense Pisces Teleostomi. Bol. Sec. Cien. Nat. Jalisco 6: 6-15:13.
296	Álvarez del Villar José. 1974. Contribución al conocimiento de los peces fósiles de Chapala y Zacoalco Aterínidos y Ciprínidos. Anales del Instituto Nacional de Antropología e Historia. 7ava 4: 191-209:197.
298	Bradbury P. J. 1971. Paleolimnology of the Lake Texcoco Mexico evidence from Diatoms. Limnology and Oceanography 162: 180-200:199.
320	Álvarez del Villar José. 1974. Contribución al conocimiento de los peces fósiles de Chapala y Zacoalco Aterínidos y Ciprínidos. Anales del Instituto Nacional de Antropología e Historia. 7ava 4: 191-209:193.
336	Minch John A. Kenneth C. Schulte and Gorge Hofman.1970. A Middle Miocene age for the Rosario Beach Formation in northwestern Baja California Mexico. Geological Society of America Bulletin 81: 3149-3154:3151.
337	Lillegrave A. J. 1972. Preliminary report on the late cretaceous mammals from EL Gallo Formation Baja California del Norte Mexico. Los Angeles County Museum Contributions on Science 232: 1-11:2.
340	Carranza-Castañeda O. W. E. Miller and Martínez J. 1982. Field trip guide to Cenozoic vertebrate localities in northeast and central Guanajuato Mexico. Society of Vertebrate Paleontology 42th Annual Mettings Mexico D.F. 50:26.
346	Holman A. J. 1970. A small pleistocene herpetofauna from Tamaulipas. Quat. Journal Florida Academy of Sciences 322: 153-158:154.
352	Brattstrom.1953c:3
363	Miller E. W. 1980. The Late Pliocene of Las Tunas local fauna from southermost Baja California Mexico. Journal of Paleontology 544:762-805:768.
365	Hibbard W. C. 1955. Pleistocene vertebrates from Upper Becerra Becerra Superior Formation Valley of Tequixquiac Mexico with notes on other Pleistocene forms. University of Michigan Contributions of the Museum of Paleontology 125: 47-96:49.
368	Álvarez T. y  P. Huerta 1975. Restos óseos de anfibios y reptiles en Tlapacoya Tlapacoya IV México. Boletín del Instituto Nacional de Antropología e Historia México 11: 37-42:37.
370	Álvarez T. y  P. Huerta 1975. Restos óseos de anfibios y reptiles en Tlapacoya Tlapacoya IV México. Boletín del Instituto Nacional de Antropología e Historia México 11: 37-42:37.
375	Polaco-Ramos O. 1981. Restos fósiles de Glossotherium y Eremotherium Edentata en México. Anais II Congr. Latinoamericano Paleontol. l Porto Alegre Brasil:820.
382	Langebartel S. D. 1953. The reptiles and amphibians In: Hatt T. K. Ed. Faunal and acheological researches in Yucatán Caves. Brookfield Hills Mich.: Cranbrook Institute of Science 1953. 1953. Bulletin No. 33. 119 pp. 11 plates map:98.
386	Lorenzo y Mirambell.191:123
388	Garcia Cook A. 1968. Chimalhuacan: un artefacto asociado a megafauna. Instituto Nacional de Antropología e Historia México Departamento de Prehistoria Publicación 21: 38p:25.
392	Moodie B. K. and T. R. V. Devender 1979. Extinct and extirpation in the herpetofauna of the southern high plains with emphasis on Geochelone wilsoni Testudinae.Herpetologica 353: 198-206.
\.


                                                                                                                                                                                                                                                                                                                                                                                                                          3548.dat                                                                                            0000600 0004000 0002000 00000000124 13264542003 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	America del Norte
2	America del Sur
3	Europa
4	Asia
5	Africa
6	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                            3550.dat                                                                                            0000600 0004000 0002000 00000000252 13264542003 0014244 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	AN	Antropogónica
2	BI	Biológica
3	CV	Cueva
4	EO	Eólica
5	FL	Fluvial
6	GR	Gravedad
7	LA	Lacustre
8	MA	Manantial
9	MR	Marino
10	nd	No Disponible
11	VC	Volcánico
\.


                                                                                                                                                                                                                                                                                                                                                      3552.dat                                                                                            0000600 0004000 0002000 00000000174 13264542003 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	R	Reciente
2	E	Extinta
3	P	Peligro de extinción
4	A	Amenazada
5	Pr	Sujeta a protección especial
6	nd	No Disponible
\.


                                                                                                                                                                                                                                                                                                                                                                                                    3554.dat                                                                                            0000600 0004000 0002000 00000000053 13264542003 0014247 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Básica
2	Adicional
3	Suplementaria
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     3556.dat                                                                                            0000600 0004000 0002000 00000000034 13264542003 0014250 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Marina
2	Continental
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    3558.dat                                                                                            0000600 0004000 0002000 00000006357 13264542003 0014270 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	1	1	3	18	Loma del Tirabuzón 5 km al N del Centro de Santa Rosa. IGCU loc. BCS-2
2	1	1	16	853	Cuenca La Mira desembocadura del Río Balsas
3	1	1	3	19	Talebene bei San Raymundo (Slg. Pemex)
4	1	1	13	2458	Sierra de San Miguel de la Cal
5	1	1	3	21	Rancho El Refugio a casi 17 km al SE de Santiago. CAS loc. 33849
6	1	1	3	20	Playa Santa Antoñita 2 km antes. CAS loc. 795
7	1	1	3	18	Baja California
8	1	1	3	18	Bahía Tortugas Campamento de Carlos 10 km al SE de la Población Bahía Tortugas. IGCU loc. BCS-21
9	1	1	3	20	Santa Rita El Rifle al sur de Sta. Rita 500 m al S de la Estación de Microondas. IGCU loc. BCS-17
10	1	1	3	21	Área Rancho Algodones 23-20N 109-37W
11	1	1	3	20	Rancho Pequeña de La Trinidad a 100 m al E del mismo. IGCU loc.BCS-42
12	1	1	27	2458	El Pilaral S de Macuspana
13	1	1	2	15	Área La Misión cerca de Tijuana
14	1	1	2	15	La Mesa de los Indios (La Misión) 8 km al NE de la Misión 600 m al NE del Rancho La Pila
15	1	1	3	18	Conglomerado de Bahia Tortugas 11 km al SE de la población de Bahia Tortugas. IGCU loc. BCS-25
16	1	1	3	18	Arroyo Tiburón 10 km al NW de la población de Bahía Tortugas. IGCU loc. BCS-26
17	1	1	30	2458	Río Vista en la cuenca del Río Coatzacualcos. Itsmo de Tehuantepec
18	1	1	16	2458	Michoacan
19	1	1	2	12	Entre las poblaciones de Ensenada y Tijuana (BCN)
20	1	1	3	18	Bahía Tortugas aproximadamente 2 km al SE. CAS loc. 945
21	1	1	3	18	Lado E de Bahía Tortugas a casi 800 m al NE de Mesa Amarilla
22	1	1	3	15	Aproximadamente 3 km al N de Punta San Isidro
23	1	1	2	16	Área La Misión cerca de Tijuana
24	1	1	5	55	Cerca de Presidio Norte hasta Piedras Negras Cuenca del Rio Bravo-División Pellotes
25	1	1	2	15	Cerca de la Ex-Misión hay un rancho llamado Mision Vieja
26	1	1	28	209	Cercanías de la Presa de La Azúcar
27	1	1	3	18	Bahía Tortugas
28	1	1	3	21	Rancho El Refugio 5 km N de la Sierrita de la Trinidad y casi 20 km al E-SE del centro de Santiago. 1.5 km al N de la casa del Sr. Felipe Moreno
29	1	1	3	18	Bahía Tortugas lado N. CAS loc. 960
30	1	1	30	2458	Localidades al N y S de Tuxpan
31	1	1	30	2458	Colombia en la Cuenca del Río Coatzacoalcos. Istmo de Tehuantepec
32	1	1	3	18	Costa de California
33	1	1	28	2003	Cercanías de la Presa de La Azúcar
34	1	1	5	65	Hacienda Las Delicias lugar situado enfrente
35	1	1	3	15	Punta San José al sur de Ensenada
36	1	1	24	1818	Xilitla
37	1	1	21	2458	Cantera de Tlayua cerca de Tepeji de Rodríguez
38	1	1	24	1826	Orilla derecha del Río Moctezuma Villa Taman
39	1	1	7	2458	Palenque sobre la piedra de la ruina arqueológica de Palenque
40	1	1	20	2458	Cerro de La Virgen en Tlaxiaco
41	1	1	20	2458	Región de San Marcos Arteaga-Papatula
42	1	1	24	1826	Pasando Villa Taman km 342+650
43	1	1	7	2458	Cerca de Tuxtla Gutiérrez
44	1	1	33	2458	Imprecisa
45	1	1	28	49	Pozo Tinajitas no.1 (Pemex) Región de San José de Las Rusias
46	1	1	14	650	Lado E y W del Cerro del Tecolote Laguna de San Marcos 5 km al N y 1.5 km al E de Zocoalco. LACM loc. 65191
47	1	1	14	561	Población Ajijic en el lado NW del Lago de Chapala
48	1	1	14	581	Área Chapala-Zacoalco la mayor parte del material de la Colonia F. Solórzano
49	1	1	14	581	Cantera de Jocotepec aprox. 5km al W del centro de Jocotepec carretera federal No. 15
50	1	1	15	2458	Cerro Tlapacoya falda SE a 1.5 km al S de la población de Tlapacoya
\.


                                                                                                                                                                                                                                                                                 3559.dat                                                                                            0000600 0004000 0002000 00000000676 13264542003 0014267 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	1	1	1
1	1	1	2
1	1	1	3
1	1	1	4
1	1	1	5
1	1	1	6
1	1	1	7
1	1	1	8
1	1	1	9
1	1	1	10
1	1	1	11
1	1	2	12
1	1	2	13
1	1	2	14
1	1	2	15
1	1	2	16
1	1	3	17
1	1	3	18
1	1	3	19
1	1	3	20
1	1	3	21
1	1	4	22
1	1	4	23
1	1	4	24
1	1	4	25
1	1	4	26
1	1	4	27
1	1	4	28
1	1	4	29
1	1	4	30
1	1	4	31
1	1	4	32
1	1	5	33
1	1	5	34
1	1	5	35
1	1	5	36
1	1	5	37
1	1	5	38
1	1	5	39
1	1	5	40
1	1	5	41
1	1	5	42
1	1	5	43
1	1	5	44
1	1	5	45
1	1	5	46
1	1	5	47
1	1	5	48
1	1	5	49
1	1	5	50
\.


                                                                  3561.dat                                                                                            0000600 0004000 0002000 00000003374 13264542003 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	\N	\N	10	35	30	265	2	\N	21	\N	1
2	\N	\N	10	35	30	266	2	\N	22	\N	4
3	\N	\N	10	35	30	266	2	\N	22	\N	4
4	\N	\N	10	35	30	286	2	\N	23	\N	4
5	\N	\N	10	35	30	286	2	\N	23	\N	5
6	\N	\N	10	35	30	286	2	\N	\N	17	5
7	\N	\N	10	35	30	286	2	\N	\N	1	8
8	\N	\N	10	35	30	267	2	\N	\N	18	9
9	\N	\N	10	35	30	286	2	\N	\N	18	10
10	\N	\N	10	35	30	286	2	\N	\N	27	11
11	\N	\N	10	35	30	286	2	\N	\N	18	13
12	\N	\N	10	35	30	286	2	\N	\N	18	15
13	\N	\N	10	35	30	286	2	\N	\N	18	16
14	\N	\N	10	35	30	286	2	\N	\N	18	17
15	\N	\N	10	35	30	286	2	\N	\N	28	18
16	\N	\N	10	35	30	268	2	\N	23	\N	19
17	\N	\N	10	35	30	265	2	\N	23	\N	19
18	\N	\N	10	35	30	265	2	\N	23	\N	19
19	\N	\N	10	35	30	268	2	\N	23	\N	19
20	\N	\N	10	35	30	286	2	\N	\N	27	20
21	\N	\N	10	35	30	286	2	\N	\N	27	21
22	\N	\N	10	35	30	286	2	\N	\N	27	22
23	\N	\N	10	35	30	286	2	\N	\N	17	28
24	\N	\N	10	35	30	286	2	\N	\N	33	29
25	\N	\N	10	35	30	286	2	\N	\N	27	36
26	\N	\N	10	35	30	286	2	\N	\N	27	37
27	\N	\N	10	35	30	286	2	\N	\N	27	40
28	\N	\N	10	35	30	286	2	\N	\N	2	48
30	\N	\N	10	35	30	286	2	\N	\N	2	48
31	\N	\N	10	35	30	286	2	\N	\N	2	48
32	\N	\N	10	35	30	286	2	\N	\N	27	51
33	\N	\N	10	35	30	286	2	\N	\N	27	53
34	\N	\N	10	35	30	269	2	\N	24	\N	54
35	\N	\N	10	35	30	286	2	\N	\N	27	57
36	\N	\N	10	35	30	267	2	\N	\N	18	67
37	\N	\N	10	35	30	286	2	\N	\N	27	78
38	\N	\N	10	35	30	286	2	\N	\N	24	80
39	\N	\N	10	35	30	286	2	\N	\N	27	89
40	\N	\N	10	35	30	286	2	\N	22	\N	89
42	\N	\N	10	35	30	266	2	\N	\N	27	4
43	\N	\N	10	35	30	286	2	\N	23	\N	100
44	\N	\N	10	35	30	286	2	\N	25	\N	101
45	\N	\N	10	35	30	286	2	\N	\N	27	102
46	\N	\N	10	35	30	286	2	\N	\N	29	107
47	\N	\N	10	35	30	286	2	\N	\N	19	108
48	\N	\N	10	35	30	286	2	\N	\N	2	109
49	\N	\N	10	35	30	72	2	\N	\N	30	110
50	\N	\N	10	35	30	286	2	\N	\N	2	110
51	\N	\N	10	35	30	286	2	\N	\N	1	113
52	\N	\N	10	35	30	202	2	\N	\N	3	114
\.


                                                                                                                                                                                                                                                                    3563.dat                                                                                            0000600 0004000 0002000 00000000423 13264542003 0014250 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	1
2	1
3	1
4	2
5	1
5	5
6	5
7	7
8	8
9	9
10	10
11	1
11	5
11	11
11	12
11	13
11	14
12	1
12	5
12	12
12	13
12	14
12	15
12	16
12	20
12	21
12	22
12	23
13	3
13	24
14	1
14	11
14	12
14	13
14	14
15	25
15	26
17	1
18	1
19	16
19	27
20	12
20	14
21	17
22	26
23	4
23	25
23	28
26	6
27	28
\.


                                                                                                                                                                                                                                             restore.sql                                                                                         0000600 0004000 0002000 00000410157 13264542003 0015373 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3
-- Dumped by pg_dump version 10.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

DROP INDEX public."unidadespecie_id_UnidadAnalisis_idx";
DROP INDEX public."unidadanalisis_id_Sitio_idx";
DROP INDEX public."unidadanalisis_id_EdadMaritima_idx";
DROP INDEX public."unidadanalisis_id_EdadContinental_idx";
DROP INDEX public."unidadanalisis_Sistema_Depositacion_idx";
DROP INDEX public."unidadanalisis_Formacion_idx";
DROP INDEX public."unidadanalisis_Facie_idx";
DROP INDEX public."unidadanalisis_Contaminacion_idx";
DROP INDEX public."unidadanalisis_Ambiente_Depositacion_idx";
DROP INDEX public."ubicacion_completa_Pais_idx";
DROP INDEX public."ubicacion_completa_Municipio_Provincia_idx";
DROP INDEX public."ubicacion_completa_Estado_idx";
DROP INDEX public."ubicacion_Region_idx";
DROP INDEX public."ubicacion_Pais_idx";
DROP INDEX public."ubicacion_Municipio_Provincia_idx";
DROP INDEX public."ubicacion_Estado_idx";
DROP INDEX public."sitio_id_Ubicacion_idx";
DROP INDEX public."sitio_id_Precision_Coord_idx";
DROP INDEX public."sitio_id_Fuente_Coord_idx";
DROP INDEX public."sitio_id_Fuente_Altitud_idx";
DROP INDEX public."referenciabibliografica_id_Tipo_Referencia_idx";
DROP INDEX public."referenciabibliografica_id_Referencia_idx";
DROP INDEX public."meristica_id_MaterialesCatalogo_idx";
DROP INDEX public."materialeslote_id_Especies_idx";
DROP INDEX public."materialeslote_id_Alojamiento_idx";
DROP INDEX public.materialescatalogo_id_lado_idx;
DROP INDEX public."materialescatalogo_id_Parte_idx";
DROP INDEX public."materialescatalogo_id_Interperismo_idx";
DROP INDEX public."materialescatalogo_id_Especies_idx";
DROP INDEX public."materialescatalogo_id_Elemento_idx";
DROP INDEX public."materialescatalogo_id_Contexto_idx";
DROP INDEX public."materialescatalogo_id_Alojamiento_idx";
DROP INDEX public."materialescatalogo_id_Agente_idx";
DROP INDEX public.hallazgo_id_ubicacion_idx;
DROP INDEX public.glaciacionescompleta_region_idx;
DROP INDEX public.glaciacionescompleta_periodo_idx;
DROP INDEX public."glaciacionescompleta_periodoGlacial_idx";
DROP INDEX public.glaciacionescompleta_estadio_idx;
DROP INDEX public.glaciacionescompleta_era_idx;
DROP INDEX public.glaciacionescompleta_epoca_idx;
DROP INDEX public."especies_id_Status_idx";
DROP INDEX public."especies_id_Orden_idx";
DROP INDEX public."especies_id_Locomocion_idx";
DROP INDEX public."especies_id_Hab_Refugio_idx";
DROP INDEX public."especies_id_Hab_Alim_B_idx";
DROP INDEX public."especies_id_Hab_Alim_A_idx";
DROP INDEX public."especies_id_Familia_idx";
DROP INDEX public."especies_id_Dieta_B_idx";
DROP INDEX public."especies_id_Dieta_A_idx";
DROP INDEX public."especies_id_Clase_idx";
DROP INDEX public."especies_id_Actividad_idx";
DROP INDEX public."edadmaritima_Periodo_idx";
DROP INDEX public."edadmaritima_Metodo_Fechado_idx";
DROP INDEX public."edadmaritima_Material_Fechado_idx";
DROP INDEX public."edadmaritima_Era_idx";
DROP INDEX public."edadmaritima_Epoca_idx";
DROP INDEX public."edadmaritima_Edad_idx";
DROP INDEX public.edadesmarinascompleta_periodo_idx;
DROP INDEX public.edadesmarinascompleta_epoca_idx;
DROP INDEX public.edadesmarinascompleta_edad_idx;
DROP INDEX public."edadescontinentalescompleta_pisoFaun_idx";
DROP INDEX public.edadescontinentalescompleta_periodo_idx;
DROP INDEX public.edadescontinentalescompleta_era_idx;
DROP INDEX public.edadescontinentalescompleta_epoca_idx;
DROP INDEX public."edadcontinental_Piso_Faunistico_idx";
DROP INDEX public."edadcontinental_Periodo_idx";
DROP INDEX public."edadcontinental_Metodo_Fechado_idx";
DROP INDEX public."edadcontinental_Material_Fechado_idx";
DROP INDEX public."edadcontinental_Magnetocron_idx";
DROP INDEX public."edadcontinental_Isotopo_idx";
DROP INDEX public."edadcontinental_Glacial_Interglacial_idx";
DROP INDEX public."edadcontinental_Estadio_idx";
DROP INDEX public."edadcontinental_Era_idx";
DROP INDEX public."edadcontinental_Epoca_idx";
DROP INDEX public."edadcontinental_Edad_Cultural_idx";
ALTER TABLE ONLY public.unidadespecie DROP CONSTRAINT unidadespecie_pkey;
ALTER TABLE ONLY public.unidadanalisis DROP CONSTRAINT unidadanalisis_pkey;
ALTER TABLE ONLY public.ubicacion DROP CONSTRAINT ubicacion_pkey;
ALTER TABLE ONLY public.ubicacion_completa DROP CONSTRAINT ubicacion_completa_pkey;
ALTER TABLE ONLY public.t_tiposedad DROP CONSTRAINT t_tiposedad_pkey;
ALTER TABLE ONLY public.t_tiporeferencia DROP CONSTRAINT t_tiporeferencia_pkey;
ALTER TABLE ONLY public.t_status DROP CONSTRAINT t_status_pkey;
ALTER TABLE ONLY public.t_sistemadepositacion DROP CONSTRAINT t_sistemadepositacion_pkey;
ALTER TABLE ONLY public.t_region DROP CONSTRAINT t_region_pkey;
ALTER TABLE ONLY public.t_referencia DROP CONSTRAINT t_referencia_pkey;
ALTER TABLE ONLY public.t_precisioncoord DROP CONSTRAINT t_precisioncoord_pkey;
ALTER TABLE ONLY public.t_pisofaunistico DROP CONSTRAINT t_pisofaunistico_pkey;
ALTER TABLE ONLY public.t_periodo DROP CONSTRAINT t_periodo_pkey;
ALTER TABLE ONLY public.t_parte DROP CONSTRAINT t_parte_pkey;
ALTER TABLE ONLY public.t_pais DROP CONSTRAINT t_pais_pkey;
ALTER TABLE ONLY public.t_orden DROP CONSTRAINT t_orden_pkey;
ALTER TABLE ONLY public.t_municipioprov DROP CONSTRAINT t_municipioprov_pkey;
ALTER TABLE ONLY public.t_metodofechamiento DROP CONSTRAINT t_metodofechamiento_pkey;
ALTER TABLE ONLY public.t_materialfechado DROP CONSTRAINT t_materialfechado_pkey;
ALTER TABLE ONLY public.t_magnetocron DROP CONSTRAINT t_magnetocron_pkey;
ALTER TABLE ONLY public.t_locomocion DROP CONSTRAINT t_locomocion_pkey;
ALTER TABLE ONLY public.t_lado DROP CONSTRAINT t_lado_pkey;
ALTER TABLE ONLY public.t_isotopo DROP CONSTRAINT t_isotopo_pkey;
ALTER TABLE ONLY public.t_interperismo DROP CONSTRAINT t_interperismo_pkey;
ALTER TABLE ONLY public.t_habrefugio DROP CONSTRAINT t_habrefugio_pkey;
ALTER TABLE ONLY public.t_habalimb DROP CONSTRAINT t_habalimb_pkey;
ALTER TABLE ONLY public.t_habalima DROP CONSTRAINT t_habalima_pkey;
ALTER TABLE ONLY public.t_glacialinterglacial DROP CONSTRAINT t_glacialinterglacial_pkey;
ALTER TABLE ONLY public.t_fuentecoord DROP CONSTRAINT t_fuentecoord_pkey;
ALTER TABLE ONLY public.t_formacion DROP CONSTRAINT t_formacion_pkey;
ALTER TABLE ONLY public.t_familia DROP CONSTRAINT t_familia_pkey;
ALTER TABLE ONLY public.t_facies DROP CONSTRAINT t_facies_pkey;
ALTER TABLE ONLY public.t_estado DROP CONSTRAINT t_estado_pkey;
ALTER TABLE ONLY public.t_estadios DROP CONSTRAINT t_estadios_pkey;
ALTER TABLE ONLY public.t_era DROP CONSTRAINT t_era_pkey;
ALTER TABLE ONLY public.t_epoca DROP CONSTRAINT t_epoca_pkey;
ALTER TABLE ONLY public.t_elemento DROP CONSTRAINT t_elemento_pkey;
ALTER TABLE ONLY public.t_edadesmarinas DROP CONSTRAINT t_edadesmarinas_pkey;
ALTER TABLE ONLY public.t_edadcultural DROP CONSTRAINT t_edadcultural_pkey;
ALTER TABLE ONLY public.t_dietab DROP CONSTRAINT t_dietab_pkey;
ALTER TABLE ONLY public.t_dietaa DROP CONSTRAINT t_dietaa_pkey;
ALTER TABLE ONLY public.t_contexto DROP CONSTRAINT t_contexto_pkey;
ALTER TABLE ONLY public.t_contaminacion DROP CONSTRAINT t_contaminacion_pkey;
ALTER TABLE ONLY public.t_clase DROP CONSTRAINT t_clase_pkey;
ALTER TABLE ONLY public.t_ambientedepositacion DROP CONSTRAINT t_ambientedepositacion_pkey;
ALTER TABLE ONLY public.t_altitud DROP CONSTRAINT t_altitud_pkey;
ALTER TABLE ONLY public.t_alojamiento DROP CONSTRAINT t_alojamiento_pkey;
ALTER TABLE ONLY public.t_agente DROP CONSTRAINT t_agente_pkey;
ALTER TABLE ONLY public.t_actividad DROP CONSTRAINT t_actividad_pkey;
ALTER TABLE ONLY public.sitio DROP CONSTRAINT sitio_pkey;
ALTER TABLE ONLY public.referenciabibliografica DROP CONSTRAINT referenciabibliografica_pkey;
ALTER TABLE ONLY public.meristica DROP CONSTRAINT meristica_pkey;
ALTER TABLE ONLY public.materialeslote DROP CONSTRAINT materialeslote_pkey;
ALTER TABLE ONLY public.materialescatalogo DROP CONSTRAINT materialescatalogo_pkey;
ALTER TABLE ONLY public.hallazgo DROP CONSTRAINT hallazgo_pkey;
ALTER TABLE ONLY public.glaciacionescompleta DROP CONSTRAINT glaciacionescompleta_pkey;
ALTER TABLE ONLY public.especies DROP CONSTRAINT especies_pkey;
ALTER TABLE ONLY public.edadmaritima DROP CONSTRAINT edadmaritima_pkey;
ALTER TABLE ONLY public.edadesmarinascompleta DROP CONSTRAINT edadesmarinascompleta_pkey;
ALTER TABLE ONLY public.edadescontinentalescompleta DROP CONSTRAINT edadescontinentalescompleta_pkey;
ALTER TABLE ONLY public.edadcontinental DROP CONSTRAINT edadcontinental_pkey;
ALTER TABLE public.unidadanalisis ALTER COLUMN "id_UnidadAnalisis" DROP DEFAULT;
ALTER TABLE public.ubicacion ALTER COLUMN "id_Ubicacion" DROP DEFAULT;
ALTER TABLE public.t_tiposedad ALTER COLUMN id_tipo DROP DEFAULT;
ALTER TABLE public.t_tiporeferencia ALTER COLUMN "id_Tipo_Referencia" DROP DEFAULT;
ALTER TABLE public.t_status ALTER COLUMN "id_Status" DROP DEFAULT;
ALTER TABLE public.t_sistemadepositacion ALTER COLUMN id_sistema_depositacion DROP DEFAULT;
ALTER TABLE public.t_region ALTER COLUMN id_region DROP DEFAULT;
ALTER TABLE public.t_referencia ALTER COLUMN "id_Referencia" DROP DEFAULT;
ALTER TABLE public.t_precisioncoord ALTER COLUMN "id_Precision_Coord" DROP DEFAULT;
ALTER TABLE public.t_pisofaunistico ALTER COLUMN id_pisofaunistico DROP DEFAULT;
ALTER TABLE public.t_periodo ALTER COLUMN id_periodo DROP DEFAULT;
ALTER TABLE public.t_parte ALTER COLUMN "id_Parte" DROP DEFAULT;
ALTER TABLE public.t_pais ALTER COLUMN id_pais DROP DEFAULT;
ALTER TABLE public.t_orden ALTER COLUMN "id_Orden" DROP DEFAULT;
ALTER TABLE public.t_municipioprov ALTER COLUMN id_municipio_prov DROP DEFAULT;
ALTER TABLE public.t_metodofechamiento ALTER COLUMN "id_metodoFechamiento" DROP DEFAULT;
ALTER TABLE public.t_materialfechado ALTER COLUMN id_materialfechado DROP DEFAULT;
ALTER TABLE public.t_magnetocron ALTER COLUMN id_magnetocron DROP DEFAULT;
ALTER TABLE public.t_locomocion ALTER COLUMN "id_Locomocion" DROP DEFAULT;
ALTER TABLE public.t_lado ALTER COLUMN id_lado DROP DEFAULT;
ALTER TABLE public.t_isotopo ALTER COLUMN id_isotopo DROP DEFAULT;
ALTER TABLE public.t_interperismo ALTER COLUMN "id_Interperismo" DROP DEFAULT;
ALTER TABLE public.t_habrefugio ALTER COLUMN "id_Hab_Refugio" DROP DEFAULT;
ALTER TABLE public.t_habalimb ALTER COLUMN "id_Hab_Alim_B" DROP DEFAULT;
ALTER TABLE public.t_habalima ALTER COLUMN "id_Hab_Alim_A" DROP DEFAULT;
ALTER TABLE public.t_glacialinterglacial ALTER COLUMN id_glacialinterglacial DROP DEFAULT;
ALTER TABLE public.t_fuentecoord ALTER COLUMN "id_Fuente_Coord" DROP DEFAULT;
ALTER TABLE public.t_formacion ALTER COLUMN id_formacion DROP DEFAULT;
ALTER TABLE public.t_familia ALTER COLUMN "id_Familia" DROP DEFAULT;
ALTER TABLE public.t_facies ALTER COLUMN id_facies DROP DEFAULT;
ALTER TABLE public.t_estado ALTER COLUMN id_estado DROP DEFAULT;
ALTER TABLE public.t_estadios ALTER COLUMN id_estadios DROP DEFAULT;
ALTER TABLE public.t_era ALTER COLUMN id_era DROP DEFAULT;
ALTER TABLE public.t_epoca ALTER COLUMN id_epoca DROP DEFAULT;
ALTER TABLE public.t_elemento ALTER COLUMN "id_Elemento" DROP DEFAULT;
ALTER TABLE public.t_edadesmarinas ALTER COLUMN id_edades_marinas DROP DEFAULT;
ALTER TABLE public.t_edadcultural ALTER COLUMN id_edadcultural DROP DEFAULT;
ALTER TABLE public.t_dietab ALTER COLUMN "id_Dieta_B" DROP DEFAULT;
ALTER TABLE public.t_dietaa ALTER COLUMN "id_Dieta_A" DROP DEFAULT;
ALTER TABLE public.t_contexto ALTER COLUMN "id_Contexto" DROP DEFAULT;
ALTER TABLE public.t_contaminacion ALTER COLUMN id_contaminacion DROP DEFAULT;
ALTER TABLE public.t_clase ALTER COLUMN "id_Clase" DROP DEFAULT;
ALTER TABLE public.t_ambientedepositacion ALTER COLUMN id_ambiente_depositacion DROP DEFAULT;
ALTER TABLE public.t_altitud ALTER COLUMN "id_Altitud" DROP DEFAULT;
ALTER TABLE public.t_alojamiento ALTER COLUMN "id_Alojamiento" DROP DEFAULT;
ALTER TABLE public.t_agente ALTER COLUMN "id_Agente" DROP DEFAULT;
ALTER TABLE public.t_actividad ALTER COLUMN "id_Actividad" DROP DEFAULT;
ALTER TABLE public.sitio ALTER COLUMN "id_Sitio" DROP DEFAULT;
ALTER TABLE public.referenciabibliografica ALTER COLUMN "id_ReferenciaBibliografica" DROP DEFAULT;
ALTER TABLE public.meristica ALTER COLUMN "id_Meristica" DROP DEFAULT;
ALTER TABLE public.materialeslote ALTER COLUMN "id_MaterialesLote" DROP DEFAULT;
ALTER TABLE public.materialescatalogo ALTER COLUMN "id_MaterialesCatalogo" DROP DEFAULT;
ALTER TABLE public.especies ALTER COLUMN "id_Especies" DROP DEFAULT;
ALTER TABLE public.edadmaritima ALTER COLUMN "id_EdadMaritima" DROP DEFAULT;
ALTER TABLE public.edadcontinental ALTER COLUMN "id_EdadContinental" DROP DEFAULT;
DROP TABLE public.unidadespecie;
DROP SEQUENCE public."unidadanalisis_id_UnidadAnalisis_seq";
DROP TABLE public.unidadanalisis;
DROP SEQUENCE public."ubicacion_id_Ubicacion_seq";
DROP TABLE public.ubicacion_completa;
DROP TABLE public.ubicacion;
DROP SEQUENCE public.t_tiposedad_id_tipo_seq;
DROP TABLE public.t_tiposedad;
DROP SEQUENCE public."t_tiporeferencia_id_Tipo_Referencia_seq";
DROP TABLE public.t_tiporeferencia;
DROP SEQUENCE public."t_status_id_Status_seq";
DROP TABLE public.t_status;
DROP SEQUENCE public.t_sistemadepositacion_id_sistema_depositacion_seq;
DROP TABLE public.t_sistemadepositacion;
DROP SEQUENCE public.t_region_id_region_seq;
DROP TABLE public.t_region;
DROP SEQUENCE public."t_referencia_id_Referencia_seq";
DROP TABLE public.t_referencia;
DROP SEQUENCE public."t_precisioncoord_id_Precision_Coord_seq";
DROP TABLE public.t_precisioncoord;
DROP SEQUENCE public.t_pisofaunistico_id_pisofaunistico_seq;
DROP TABLE public.t_pisofaunistico;
DROP SEQUENCE public.t_periodo_id_periodo_seq;
DROP TABLE public.t_periodo;
DROP SEQUENCE public."t_parte_id_Parte_seq";
DROP TABLE public.t_parte;
DROP SEQUENCE public.t_pais_id_pais_seq;
DROP TABLE public.t_pais;
DROP SEQUENCE public."t_orden_id_Orden_seq";
DROP TABLE public.t_orden;
DROP SEQUENCE public.t_municipioprov_id_municipio_prov_seq;
DROP TABLE public.t_municipioprov;
DROP SEQUENCE public."t_metodofechamiento_id_metodoFechamiento_seq";
DROP TABLE public.t_metodofechamiento;
DROP SEQUENCE public.t_materialfechado_id_materialfechado_seq;
DROP TABLE public.t_materialfechado;
DROP SEQUENCE public.t_magnetocron_id_magnetocron_seq;
DROP TABLE public.t_magnetocron;
DROP SEQUENCE public."t_locomocion_id_Locomocion_seq";
DROP TABLE public.t_locomocion;
DROP SEQUENCE public.t_lado_id_lado_seq;
DROP TABLE public.t_lado;
DROP SEQUENCE public.t_isotopo_id_isotopo_seq;
DROP TABLE public.t_isotopo;
DROP SEQUENCE public."t_interperismo_id_Interperismo_seq";
DROP TABLE public.t_interperismo;
DROP SEQUENCE public."t_habrefugio_id_Hab_Refugio_seq";
DROP TABLE public.t_habrefugio;
DROP SEQUENCE public."t_habalimb_id_Hab_Alim_B_seq";
DROP TABLE public.t_habalimb;
DROP SEQUENCE public."t_habalima_id_Hab_Alim_A_seq";
DROP TABLE public.t_habalima;
DROP SEQUENCE public.t_glacialinterglacial_id_glacialinterglacial_seq;
DROP TABLE public.t_glacialinterglacial;
DROP SEQUENCE public."t_fuentecoord_id_Fuente_Coord_seq";
DROP TABLE public.t_fuentecoord;
DROP SEQUENCE public.t_formacion_id_formacion_seq;
DROP TABLE public.t_formacion;
DROP SEQUENCE public."t_familia_id_Familia_seq";
DROP TABLE public.t_familia;
DROP SEQUENCE public.t_facies_id_facies_seq;
DROP TABLE public.t_facies;
DROP SEQUENCE public.t_estado_id_estado_seq;
DROP TABLE public.t_estado;
DROP SEQUENCE public.t_estadios_id_estadios_seq;
DROP TABLE public.t_estadios;
DROP SEQUENCE public.t_era_id_era_seq;
DROP TABLE public.t_era;
DROP SEQUENCE public.t_epoca_id_epoca_seq;
DROP TABLE public.t_epoca;
DROP SEQUENCE public."t_elemento_id_Elemento_seq";
DROP TABLE public.t_elemento;
DROP SEQUENCE public.t_edadesmarinas_id_edades_marinas_seq;
DROP TABLE public.t_edadesmarinas;
DROP SEQUENCE public.t_edadcultural_id_edadcultural_seq;
DROP TABLE public.t_edadcultural;
DROP SEQUENCE public."t_dietab_id_Dieta_B_seq";
DROP TABLE public.t_dietab;
DROP SEQUENCE public."t_dietaa_id_Dieta_A_seq";
DROP TABLE public.t_dietaa;
DROP SEQUENCE public."t_contexto_id_Contexto_seq";
DROP TABLE public.t_contexto;
DROP SEQUENCE public.t_contaminacion_id_contaminacion_seq;
DROP TABLE public.t_contaminacion;
DROP SEQUENCE public."t_clase_id_Clase_seq";
DROP TABLE public.t_clase;
DROP SEQUENCE public.t_ambientedepositacion_id_ambiente_depositacion_seq;
DROP TABLE public.t_ambientedepositacion;
DROP SEQUENCE public."t_altitud_id_Altitud_seq";
DROP TABLE public.t_altitud;
DROP SEQUENCE public."t_alojamiento_id_Alojamiento_seq";
DROP TABLE public.t_alojamiento;
DROP SEQUENCE public."t_agente_id_Agente_seq";
DROP TABLE public.t_agente;
DROP SEQUENCE public."t_actividad_id_Actividad_seq";
DROP TABLE public.t_actividad;
DROP SEQUENCE public."sitio_id_Sitio_seq";
DROP TABLE public.sitio;
DROP SEQUENCE public."referenciabibliografica_id_ReferenciaBibliografica_seq";
DROP TABLE public.referenciabibliografica;
DROP SEQUENCE public."meristica_id_Meristica_seq";
DROP TABLE public.meristica;
DROP SEQUENCE public."materialeslote_id_MaterialesLote_seq";
DROP TABLE public.materialeslote;
DROP SEQUENCE public."materialescatalogo_id_MaterialesCatalogo_seq";
DROP TABLE public.materialescatalogo;
DROP TABLE public.hallazgo;
DROP TABLE public.glaciacionescompleta;
DROP SEQUENCE public."especies_id_Especies_seq";
DROP TABLE public.especies;
DROP SEQUENCE public."edadmaritima_id_EdadMaritima_seq";
DROP TABLE public.edadmaritima;
DROP TABLE public.edadesmarinascompleta;
DROP TABLE public.edadescontinentalescompleta;
DROP SEQUENCE public."edadcontinental_id_EdadContinental_seq";
DROP TABLE public.edadcontinental;
DROP EXTENSION plpgsql;
DROP SCHEMA public;
--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = true;

--
-- Name: edadcontinental; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.edadcontinental (
    "id_EdadContinental" integer NOT NULL,
    "Era" integer DEFAULT 4 NOT NULL,
    "Periodo" integer DEFAULT 15 NOT NULL,
    "Epoca" integer DEFAULT 60 NOT NULL,
    "Estadio" integer DEFAULT 2 NOT NULL,
    "Glacial_Interglacial" integer DEFAULT 2 NOT NULL,
    "GL_I_Duracion" character varying(45),
    "Piso_Faunistico" integer DEFAULT 22 NOT NULL,
    fauna_local character varying(45),
    "Edad_Cultural" integer DEFAULT 14 NOT NULL,
    "Isotopo" integer DEFAULT 7 NOT NULL,
    "Magnetocron" integer DEFAULT 5 NOT NULL,
    "Metodo_Fechado" integer DEFAULT 16 NOT NULL,
    "Material_Fechado" integer DEFAULT 28 NOT NULL,
    "No_Muestra" character varying(45),
    "Laboratorio" character varying(45),
    "EdadUnidadAnalisis" integer
);


ALTER TABLE public.edadcontinental OWNER TO postgres;

--
-- Name: edadcontinental_id_EdadContinental_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."edadcontinental_id_EdadContinental_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."edadcontinental_id_EdadContinental_seq" OWNER TO postgres;

--
-- Name: edadcontinental_id_EdadContinental_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."edadcontinental_id_EdadContinental_seq" OWNED BY public.edadcontinental."id_EdadContinental";


--
-- Name: edadescontinentalescompleta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.edadescontinentalescompleta (
    region integer NOT NULL,
    era integer NOT NULL,
    periodo integer NOT NULL,
    epoca integer NOT NULL,
    "pisoFaun" integer NOT NULL
);


ALTER TABLE public.edadescontinentalescompleta OWNER TO postgres;

--
-- Name: edadesmarinascompleta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.edadesmarinascompleta (
    era integer NOT NULL,
    periodo integer NOT NULL,
    epoca integer NOT NULL,
    edad integer NOT NULL
);


ALTER TABLE public.edadesmarinascompleta OWNER TO postgres;

--
-- Name: edadmaritima; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.edadmaritima (
    "id_EdadMaritima" integer NOT NULL,
    "Era" integer DEFAULT 4 NOT NULL,
    "Periodo" integer DEFAULT 15 NOT NULL,
    "Epoca" integer DEFAULT 60 NOT NULL,
    "Edad" integer DEFAULT 99 NOT NULL,
    "Edad_Unidad_Analisis" integer,
    "Metodo_Fechado" integer DEFAULT 16 NOT NULL,
    "Material_Fechado" integer DEFAULT 28 NOT NULL,
    "No_Muestra" character varying(45),
    "Laboratorio" character varying(45)
);


ALTER TABLE public.edadmaritima OWNER TO postgres;

--
-- Name: edadmaritima_id_EdadMaritima_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."edadmaritima_id_EdadMaritima_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."edadmaritima_id_EdadMaritima_seq" OWNER TO postgres;

--
-- Name: edadmaritima_id_EdadMaritima_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."edadmaritima_id_EdadMaritima_seq" OWNED BY public.edadmaritima."id_EdadMaritima";


--
-- Name: especies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.especies (
    "id_Especies" integer NOT NULL,
    "Subclase" character varying(45),
    "Suborden" character varying(45),
    "Infraorden" character varying(45),
    "Subfamilia" character varying(45),
    "Genero" character varying(45),
    "Especie" character varying(45),
    "Autor" character varying(45),
    "Sinonimias" text,
    "Taxon_Valido" character varying(45),
    "Nombre_Espaniol" character varying(45),
    "Nombre_Ingles" character varying(45),
    "id_Actividad" integer DEFAULT 5,
    "id_Clase" integer DEFAULT 11,
    "id_Dieta_A" integer DEFAULT 5,
    "id_Dieta_B" integer DEFAULT 17,
    "id_Hab_Alim_A" integer DEFAULT 5,
    "id_Hab_Alim_B" integer DEFAULT 7,
    "id_Familia" integer DEFAULT 241,
    "id_Hab_Refugio" integer DEFAULT 5,
    "id_Locomocion" integer DEFAULT 10,
    "id_Orden" integer DEFAULT 109,
    "id_Status" integer DEFAULT 6
);


ALTER TABLE public.especies OWNER TO postgres;

--
-- Name: especies_id_Especies_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."especies_id_Especies_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."especies_id_Especies_seq" OWNER TO postgres;

--
-- Name: especies_id_Especies_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."especies_id_Especies_seq" OWNED BY public.especies."id_Especies";


--
-- Name: glaciacionescompleta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.glaciacionescompleta (
    tipo integer NOT NULL,
    region integer NOT NULL,
    era integer NOT NULL,
    periodo integer NOT NULL,
    epoca integer NOT NULL,
    "periodoGlacial" integer NOT NULL,
    estadio integer NOT NULL
);


ALTER TABLE public.glaciacionescompleta OWNER TO postgres;

--
-- Name: hallazgo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.hallazgo (
    id_ubicacion integer NOT NULL,
    "id_ReferenciaBibliografica" integer NOT NULL
);


ALTER TABLE public.hallazgo OWNER TO postgres;

--
-- Name: materialescatalogo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materialescatalogo (
    "id_MaterialesCatalogo" integer NOT NULL,
    "No_Catalogo" character varying(45),
    "DescripElemento" character varying(45),
    id_lado integer DEFAULT 3,
    "Imagen" character varying(45),
    "id_Especies" integer,
    "id_Elemento" integer DEFAULT 136 NOT NULL,
    "id_Parte" integer DEFAULT 4 NOT NULL,
    "id_Agente" integer DEFAULT 7 NOT NULL,
    "id_Contexto" integer DEFAULT 3 NOT NULL,
    "id_Interperismo" integer DEFAULT 7 NOT NULL,
    "id_Alojamiento" integer DEFAULT 68 NOT NULL
);


ALTER TABLE public.materialescatalogo OWNER TO postgres;

--
-- Name: materialescatalogo_id_MaterialesCatalogo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."materialescatalogo_id_MaterialesCatalogo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."materialescatalogo_id_MaterialesCatalogo_seq" OWNER TO postgres;

--
-- Name: materialescatalogo_id_MaterialesCatalogo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."materialescatalogo_id_MaterialesCatalogo_seq" OWNED BY public.materialescatalogo."id_MaterialesCatalogo";


--
-- Name: materialeslote; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materialeslote (
    "id_MaterialesLote" integer NOT NULL,
    "Lote" character varying(45),
    "Descripcion" text,
    "id_Especies" integer,
    "id_Alojamiento" integer DEFAULT 68 NOT NULL
);


ALTER TABLE public.materialeslote OWNER TO postgres;

--
-- Name: materialeslote_id_MaterialesLote_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."materialeslote_id_MaterialesLote_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."materialeslote_id_MaterialesLote_seq" OWNER TO postgres;

--
-- Name: materialeslote_id_MaterialesLote_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."materialeslote_id_MaterialesLote_seq" OWNED BY public.materialeslote."id_MaterialesLote";


--
-- Name: meristica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.meristica (
    "id_Meristica" integer NOT NULL,
    "id_MaterialesCatalogo" integer NOT NULL,
    "Clave_Medida" character varying(45),
    "Descripcion_Medida" text,
    "Medida" integer,
    "Unidades" character varying(45),
    "Notas_Meristica" text
);


ALTER TABLE public.meristica OWNER TO postgres;

--
-- Name: meristica_id_Meristica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."meristica_id_Meristica_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."meristica_id_Meristica_seq" OWNER TO postgres;

--
-- Name: meristica_id_Meristica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."meristica_id_Meristica_seq" OWNED BY public.meristica."id_Meristica";


--
-- Name: referenciabibliografica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.referenciabibliografica (
    "id_ReferenciaBibliografica" integer NOT NULL,
    "Anio" integer,
    "id_Referencia" integer,
    "id_Tipo_Referencia" integer
);


ALTER TABLE public.referenciabibliografica OWNER TO postgres;

--
-- Name: referenciabibliografica_id_ReferenciaBibliografica_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."referenciabibliografica_id_ReferenciaBibliografica_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."referenciabibliografica_id_ReferenciaBibliografica_seq" OWNER TO postgres;

--
-- Name: referenciabibliografica_id_ReferenciaBibliografica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."referenciabibliografica_id_ReferenciaBibliografica_seq" OWNED BY public.referenciabibliografica."id_ReferenciaBibliografica";


--
-- Name: sitio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sitio (
    "id_Sitio" integer NOT NULL,
    "Sitio" character varying(100),
    "Latitud" real,
    "Longitud" double precision,
    "CCL-E" integer,
    "CCL-N" integer,
    "UTM-E" real,
    "UTM-N" real,
    "ZonaUTM" integer,
    "id_Fuente_Altitud" integer DEFAULT 4 NOT NULL,
    "id_Ubicacion" integer,
    "Altitud" integer,
    "id_Fuente_Coord" integer DEFAULT 6 NOT NULL,
    "id_Precision_Coord" integer DEFAULT 6 NOT NULL
);


ALTER TABLE public.sitio OWNER TO postgres;

--
-- Name: sitio_id_Sitio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."sitio_id_Sitio_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."sitio_id_Sitio_seq" OWNER TO postgres;

--
-- Name: sitio_id_Sitio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."sitio_id_Sitio_seq" OWNED BY public.sitio."id_Sitio";


--
-- Name: t_actividad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_actividad (
    "id_Actividad" integer NOT NULL,
    id_ca character varying(20),
    "Actividad" character varying(45)
);


ALTER TABLE public.t_actividad OWNER TO postgres;

--
-- Name: t_actividad_id_Actividad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_actividad_id_Actividad_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_actividad_id_Actividad_seq" OWNER TO postgres;

--
-- Name: t_actividad_id_Actividad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_actividad_id_Actividad_seq" OWNED BY public.t_actividad."id_Actividad";


--
-- Name: t_agente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_agente (
    "id_Agente" integer NOT NULL,
    id_ag character varying(45),
    "Agente" character varying(200)
);


ALTER TABLE public.t_agente OWNER TO postgres;

--
-- Name: t_agente_id_Agente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_agente_id_Agente_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_agente_id_Agente_seq" OWNER TO postgres;

--
-- Name: t_agente_id_Agente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_agente_id_Agente_seq" OWNED BY public.t_agente."id_Agente";


--
-- Name: t_alojamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_alojamiento (
    "id_Alojamiento" integer NOT NULL,
    "Clave_Alojamiento" character varying(200),
    "Alojamiento" character varying(200)
);


ALTER TABLE public.t_alojamiento OWNER TO postgres;

--
-- Name: t_alojamiento_id_Alojamiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_alojamiento_id_Alojamiento_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_alojamiento_id_Alojamiento_seq" OWNER TO postgres;

--
-- Name: t_alojamiento_id_Alojamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_alojamiento_id_Alojamiento_seq" OWNED BY public.t_alojamiento."id_Alojamiento";


--
-- Name: t_altitud; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_altitud (
    "id_Altitud" integer NOT NULL,
    "Fuente_Altitud" character varying(60)
);


ALTER TABLE public.t_altitud OWNER TO postgres;

--
-- Name: t_altitud_id_Altitud_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_altitud_id_Altitud_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_altitud_id_Altitud_seq" OWNER TO postgres;

--
-- Name: t_altitud_id_Altitud_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_altitud_id_Altitud_seq" OWNED BY public.t_altitud."id_Altitud";


--
-- Name: t_ambientedepositacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_ambientedepositacion (
    id_ambiente_depositacion integer NOT NULL,
    ida character varying(45),
    ambiente_depositacion character varying(200)
);


ALTER TABLE public.t_ambientedepositacion OWNER TO postgres;

--
-- Name: t_ambientedepositacion_id_ambiente_depositacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_ambientedepositacion_id_ambiente_depositacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_ambientedepositacion_id_ambiente_depositacion_seq OWNER TO postgres;

--
-- Name: t_ambientedepositacion_id_ambiente_depositacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_ambientedepositacion_id_ambiente_depositacion_seq OWNED BY public.t_ambientedepositacion.id_ambiente_depositacion;


--
-- Name: t_clase; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_clase (
    "id_Clase" integer NOT NULL,
    "Clase" character varying(60),
    "Autor" character varying(60),
    "Anio" character varying(60)
);


ALTER TABLE public.t_clase OWNER TO postgres;

--
-- Name: t_clase_id_Clase_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_clase_id_Clase_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_clase_id_Clase_seq" OWNER TO postgres;

--
-- Name: t_clase_id_Clase_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_clase_id_Clase_seq" OWNED BY public.t_clase."id_Clase";


--
-- Name: t_contaminacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_contaminacion (
    id_contaminacion integer NOT NULL,
    idco character varying(45),
    contaminacion character varying(45)
);


ALTER TABLE public.t_contaminacion OWNER TO postgres;

--
-- Name: t_contaminacion_id_contaminacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_contaminacion_id_contaminacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_contaminacion_id_contaminacion_seq OWNER TO postgres;

--
-- Name: t_contaminacion_id_contaminacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_contaminacion_id_contaminacion_seq OWNED BY public.t_contaminacion.id_contaminacion;


--
-- Name: t_contexto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_contexto (
    "id_Contexto" integer NOT NULL,
    id_ctx character varying(45),
    "Contexto" character varying(45)
);


ALTER TABLE public.t_contexto OWNER TO postgres;

--
-- Name: t_contexto_id_Contexto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_contexto_id_Contexto_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_contexto_id_Contexto_seq" OWNER TO postgres;

--
-- Name: t_contexto_id_Contexto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_contexto_id_Contexto_seq" OWNED BY public.t_contexto."id_Contexto";


--
-- Name: t_dietaa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_dietaa (
    "id_Dieta_A" integer NOT NULL,
    id_da character varying(45),
    "Dieta_A" character varying(45)
);


ALTER TABLE public.t_dietaa OWNER TO postgres;

--
-- Name: t_dietaa_id_Dieta_A_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_dietaa_id_Dieta_A_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_dietaa_id_Dieta_A_seq" OWNER TO postgres;

--
-- Name: t_dietaa_id_Dieta_A_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_dietaa_id_Dieta_A_seq" OWNED BY public.t_dietaa."id_Dieta_A";


--
-- Name: t_dietab; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_dietab (
    "id_Dieta_B" integer NOT NULL,
    id_db character varying(45),
    "Dieta_B" character varying(45)
);


ALTER TABLE public.t_dietab OWNER TO postgres;

--
-- Name: t_dietab_id_Dieta_B_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_dietab_id_Dieta_B_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_dietab_id_Dieta_B_seq" OWNER TO postgres;

--
-- Name: t_dietab_id_Dieta_B_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_dietab_id_Dieta_B_seq" OWNED BY public.t_dietab."id_Dieta_B";


--
-- Name: t_edadcultural; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_edadcultural (
    id_edadcultural integer NOT NULL,
    edadcultural character varying(45),
    temporalidad character varying(45)
);


ALTER TABLE public.t_edadcultural OWNER TO postgres;

--
-- Name: t_edadcultural_id_edadcultural_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_edadcultural_id_edadcultural_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_edadcultural_id_edadcultural_seq OWNER TO postgres;

--
-- Name: t_edadcultural_id_edadcultural_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_edadcultural_id_edadcultural_seq OWNED BY public.t_edadcultural.id_edadcultural;


--
-- Name: t_edadesmarinas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_edadesmarinas (
    id_edades_marinas integer NOT NULL,
    edad character varying(45)
);


ALTER TABLE public.t_edadesmarinas OWNER TO postgres;

--
-- Name: t_edadesmarinas_id_edades_marinas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_edadesmarinas_id_edades_marinas_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_edadesmarinas_id_edades_marinas_seq OWNER TO postgres;

--
-- Name: t_edadesmarinas_id_edades_marinas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_edadesmarinas_id_edades_marinas_seq OWNED BY public.t_edadesmarinas.id_edades_marinas;


--
-- Name: t_elemento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_elemento (
    "id_Elemento" integer NOT NULL,
    "Clave_elemento" character varying(20),
    "Elemento" character varying(45)
);


ALTER TABLE public.t_elemento OWNER TO postgres;

--
-- Name: t_elemento_id_Elemento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_elemento_id_Elemento_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_elemento_id_Elemento_seq" OWNER TO postgres;

--
-- Name: t_elemento_id_Elemento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_elemento_id_Elemento_seq" OWNED BY public.t_elemento."id_Elemento";


--
-- Name: t_epoca; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_epoca (
    id_epoca integer NOT NULL,
    epoca character varying(45)
);


ALTER TABLE public.t_epoca OWNER TO postgres;

--
-- Name: t_epoca_id_epoca_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_epoca_id_epoca_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_epoca_id_epoca_seq OWNER TO postgres;

--
-- Name: t_epoca_id_epoca_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_epoca_id_epoca_seq OWNED BY public.t_epoca.id_epoca;


--
-- Name: t_era; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_era (
    id_era integer NOT NULL,
    era character varying(45)
);


ALTER TABLE public.t_era OWNER TO postgres;

--
-- Name: t_era_id_era_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_era_id_era_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_era_id_era_seq OWNER TO postgres;

--
-- Name: t_era_id_era_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_era_id_era_seq OWNED BY public.t_era.id_era;


--
-- Name: t_estadios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_estadios (
    id_estadios integer NOT NULL,
    estadios character varying(45)
);


ALTER TABLE public.t_estadios OWNER TO postgres;

--
-- Name: t_estadios_id_estadios_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_estadios_id_estadios_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_estadios_id_estadios_seq OWNER TO postgres;

--
-- Name: t_estadios_id_estadios_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_estadios_id_estadios_seq OWNED BY public.t_estadios.id_estadios;


--
-- Name: t_estado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_estado (
    id_estado integer NOT NULL,
    estado character varying(45)
);


ALTER TABLE public.t_estado OWNER TO postgres;

--
-- Name: t_estado_id_estado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_estado_id_estado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_estado_id_estado_seq OWNER TO postgres;

--
-- Name: t_estado_id_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_estado_id_estado_seq OWNED BY public.t_estado.id_estado;


--
-- Name: t_facies; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_facies (
    id_facies integer NOT NULL,
    idf character varying(45),
    facies character varying(45)
);


ALTER TABLE public.t_facies OWNER TO postgres;

--
-- Name: t_facies_id_facies_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_facies_id_facies_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_facies_id_facies_seq OWNER TO postgres;

--
-- Name: t_facies_id_facies_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_facies_id_facies_seq OWNED BY public.t_facies.id_facies;


--
-- Name: t_familia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_familia (
    "id_Familia" integer NOT NULL,
    "Familia" character varying(45),
    "Autor" character varying(45),
    "Anio" character varying(4)
);


ALTER TABLE public.t_familia OWNER TO postgres;

--
-- Name: t_familia_id_Familia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_familia_id_Familia_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_familia_id_Familia_seq" OWNER TO postgres;

--
-- Name: t_familia_id_Familia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_familia_id_Familia_seq" OWNED BY public.t_familia."id_Familia";


--
-- Name: t_formacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_formacion (
    id_formacion integer NOT NULL,
    formacion character varying(45)
);


ALTER TABLE public.t_formacion OWNER TO postgres;

--
-- Name: t_formacion_id_formacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_formacion_id_formacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_formacion_id_formacion_seq OWNER TO postgres;

--
-- Name: t_formacion_id_formacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_formacion_id_formacion_seq OWNED BY public.t_formacion.id_formacion;


--
-- Name: t_fuentecoord; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_fuentecoord (
    "id_Fuente_Coord" integer NOT NULL,
    id_fc character varying(45),
    "Fuente_Coord" character varying(45)
);


ALTER TABLE public.t_fuentecoord OWNER TO postgres;

--
-- Name: t_fuentecoord_id_Fuente_Coord_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_fuentecoord_id_Fuente_Coord_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_fuentecoord_id_Fuente_Coord_seq" OWNER TO postgres;

--
-- Name: t_fuentecoord_id_Fuente_Coord_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_fuentecoord_id_Fuente_Coord_seq" OWNED BY public.t_fuentecoord."id_Fuente_Coord";


--
-- Name: t_glacialinterglacial; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_glacialinterglacial (
    id_glacialinterglacial integer NOT NULL,
    idgi character varying(45)
);


ALTER TABLE public.t_glacialinterglacial OWNER TO postgres;

--
-- Name: t_glacialinterglacial_id_glacialinterglacial_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_glacialinterglacial_id_glacialinterglacial_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_glacialinterglacial_id_glacialinterglacial_seq OWNER TO postgres;

--
-- Name: t_glacialinterglacial_id_glacialinterglacial_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_glacialinterglacial_id_glacialinterglacial_seq OWNED BY public.t_glacialinterglacial.id_glacialinterglacial;


--
-- Name: t_habalima; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_habalima (
    "id_Hab_Alim_A" integer NOT NULL,
    id_haa character varying(45),
    "Hab_Alim_A" character varying(45)
);


ALTER TABLE public.t_habalima OWNER TO postgres;

--
-- Name: t_habalima_id_Hab_Alim_A_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_habalima_id_Hab_Alim_A_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_habalima_id_Hab_Alim_A_seq" OWNER TO postgres;

--
-- Name: t_habalima_id_Hab_Alim_A_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_habalima_id_Hab_Alim_A_seq" OWNED BY public.t_habalima."id_Hab_Alim_A";


--
-- Name: t_habalimb; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_habalimb (
    "id_Hab_Alim_B" integer NOT NULL,
    id_hab character varying(45),
    "Hab_Alim_B" character varying(45)
);


ALTER TABLE public.t_habalimb OWNER TO postgres;

--
-- Name: t_habalimb_id_Hab_Alim_B_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_habalimb_id_Hab_Alim_B_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_habalimb_id_Hab_Alim_B_seq" OWNER TO postgres;

--
-- Name: t_habalimb_id_Hab_Alim_B_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_habalimb_id_Hab_Alim_B_seq" OWNED BY public.t_habalimb."id_Hab_Alim_B";


--
-- Name: t_habrefugio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_habrefugio (
    "id_Hab_Refugio" integer NOT NULL,
    id_ref character varying(45),
    "Hab_Refugio" character varying(45)
);


ALTER TABLE public.t_habrefugio OWNER TO postgres;

--
-- Name: t_habrefugio_id_Hab_Refugio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_habrefugio_id_Hab_Refugio_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_habrefugio_id_Hab_Refugio_seq" OWNER TO postgres;

--
-- Name: t_habrefugio_id_Hab_Refugio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_habrefugio_id_Hab_Refugio_seq" OWNED BY public.t_habrefugio."id_Hab_Refugio";


--
-- Name: t_interperismo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_interperismo (
    "id_Interperismo" integer NOT NULL,
    id_intem character varying(45),
    "Interperismo" character varying(45)
);


ALTER TABLE public.t_interperismo OWNER TO postgres;

--
-- Name: t_interperismo_id_Interperismo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_interperismo_id_Interperismo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_interperismo_id_Interperismo_seq" OWNER TO postgres;

--
-- Name: t_interperismo_id_Interperismo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_interperismo_id_Interperismo_seq" OWNED BY public.t_interperismo."id_Interperismo";


--
-- Name: t_isotopo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_isotopo (
    id_isotopo integer NOT NULL,
    isotopo character varying(15)
);


ALTER TABLE public.t_isotopo OWNER TO postgres;

--
-- Name: t_isotopo_id_isotopo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_isotopo_id_isotopo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_isotopo_id_isotopo_seq OWNER TO postgres;

--
-- Name: t_isotopo_id_isotopo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_isotopo_id_isotopo_seq OWNED BY public.t_isotopo.id_isotopo;


--
-- Name: t_lado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_lado (
    id_lado integer NOT NULL,
    "Lado" character varying(45)
);


ALTER TABLE public.t_lado OWNER TO postgres;

--
-- Name: t_lado_id_lado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_lado_id_lado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_lado_id_lado_seq OWNER TO postgres;

--
-- Name: t_lado_id_lado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_lado_id_lado_seq OWNED BY public.t_lado.id_lado;


--
-- Name: t_locomocion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_locomocion (
    "id_Locomocion" integer NOT NULL,
    id_lcmon character varying(45),
    "Locomocion" character varying(45)
);


ALTER TABLE public.t_locomocion OWNER TO postgres;

--
-- Name: t_locomocion_id_Locomocion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_locomocion_id_Locomocion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_locomocion_id_Locomocion_seq" OWNER TO postgres;

--
-- Name: t_locomocion_id_Locomocion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_locomocion_id_Locomocion_seq" OWNED BY public.t_locomocion."id_Locomocion";


--
-- Name: t_magnetocron; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_magnetocron (
    id_magnetocron integer NOT NULL,
    idmag character varying(45),
    magnetocron character varying(45)
);


ALTER TABLE public.t_magnetocron OWNER TO postgres;

--
-- Name: t_magnetocron_id_magnetocron_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_magnetocron_id_magnetocron_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_magnetocron_id_magnetocron_seq OWNER TO postgres;

--
-- Name: t_magnetocron_id_magnetocron_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_magnetocron_id_magnetocron_seq OWNED BY public.t_magnetocron.id_magnetocron;


--
-- Name: t_materialfechado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_materialfechado (
    id_materialfechado integer NOT NULL,
    idmf character varying(45),
    "materialFechado" character varying(45)
);


ALTER TABLE public.t_materialfechado OWNER TO postgres;

--
-- Name: t_materialfechado_id_materialfechado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_materialfechado_id_materialfechado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_materialfechado_id_materialfechado_seq OWNER TO postgres;

--
-- Name: t_materialfechado_id_materialfechado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_materialfechado_id_materialfechado_seq OWNED BY public.t_materialfechado.id_materialfechado;


--
-- Name: t_metodofechamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_metodofechamiento (
    "id_metodoFechamiento" integer NOT NULL,
    metodofechamiento_clave character varying(5) NOT NULL,
    metodofechamiento character varying(45) NOT NULL
);


ALTER TABLE public.t_metodofechamiento OWNER TO postgres;

--
-- Name: t_metodofechamiento_id_metodoFechamiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_metodofechamiento_id_metodoFechamiento_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_metodofechamiento_id_metodoFechamiento_seq" OWNER TO postgres;

--
-- Name: t_metodofechamiento_id_metodoFechamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_metodofechamiento_id_metodoFechamiento_seq" OWNED BY public.t_metodofechamiento."id_metodoFechamiento";


--
-- Name: t_municipioprov; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_municipioprov (
    id_municipio_prov integer NOT NULL,
    municipio_prov character varying(80)
);


ALTER TABLE public.t_municipioprov OWNER TO postgres;

--
-- Name: t_municipioprov_id_municipio_prov_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_municipioprov_id_municipio_prov_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_municipioprov_id_municipio_prov_seq OWNER TO postgres;

--
-- Name: t_municipioprov_id_municipio_prov_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_municipioprov_id_municipio_prov_seq OWNED BY public.t_municipioprov.id_municipio_prov;


--
-- Name: t_orden; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_orden (
    "id_Orden" integer NOT NULL,
    "Orden" character varying(45),
    "Autor" character varying(45),
    "Anio" character varying(4)
);


ALTER TABLE public.t_orden OWNER TO postgres;

--
-- Name: t_orden_id_Orden_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_orden_id_Orden_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_orden_id_Orden_seq" OWNER TO postgres;

--
-- Name: t_orden_id_Orden_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_orden_id_Orden_seq" OWNED BY public.t_orden."id_Orden";


--
-- Name: t_pais; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_pais (
    id_pais integer NOT NULL,
    pais character varying(45)
);


ALTER TABLE public.t_pais OWNER TO postgres;

--
-- Name: t_pais_id_pais_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_pais_id_pais_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_pais_id_pais_seq OWNER TO postgres;

--
-- Name: t_pais_id_pais_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_pais_id_pais_seq OWNED BY public.t_pais.id_pais;


--
-- Name: t_parte; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_parte (
    "id_Parte" integer NOT NULL,
    "Parte" character varying(45)
);


ALTER TABLE public.t_parte OWNER TO postgres;

--
-- Name: t_parte_id_Parte_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_parte_id_Parte_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_parte_id_Parte_seq" OWNER TO postgres;

--
-- Name: t_parte_id_Parte_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_parte_id_Parte_seq" OWNED BY public.t_parte."id_Parte";


--
-- Name: t_periodo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_periodo (
    id_periodo integer NOT NULL,
    periodo character varying(45)
);


ALTER TABLE public.t_periodo OWNER TO postgres;

--
-- Name: t_periodo_id_periodo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_periodo_id_periodo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_periodo_id_periodo_seq OWNER TO postgres;

--
-- Name: t_periodo_id_periodo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_periodo_id_periodo_seq OWNED BY public.t_periodo.id_periodo;


--
-- Name: t_pisofaunistico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_pisofaunistico (
    id_pisofaunistico integer NOT NULL,
    "pisoFaunistico" character varying(45)
);


ALTER TABLE public.t_pisofaunistico OWNER TO postgres;

--
-- Name: t_pisofaunistico_id_pisofaunistico_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_pisofaunistico_id_pisofaunistico_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_pisofaunistico_id_pisofaunistico_seq OWNER TO postgres;

--
-- Name: t_pisofaunistico_id_pisofaunistico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_pisofaunistico_id_pisofaunistico_seq OWNED BY public.t_pisofaunistico.id_pisofaunistico;


--
-- Name: t_precisioncoord; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_precisioncoord (
    "id_Precision_Coord" integer NOT NULL,
    id_pc character varying(45),
    "Precision_Coord" character varying(100)
);


ALTER TABLE public.t_precisioncoord OWNER TO postgres;

--
-- Name: t_precisioncoord_id_Precision_Coord_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_precisioncoord_id_Precision_Coord_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_precisioncoord_id_Precision_Coord_seq" OWNER TO postgres;

--
-- Name: t_precisioncoord_id_Precision_Coord_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_precisioncoord_id_Precision_Coord_seq" OWNED BY public.t_precisioncoord."id_Precision_Coord";


--
-- Name: t_referencia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_referencia (
    "id_Referencia" integer NOT NULL,
    "Referencia" text
);


ALTER TABLE public.t_referencia OWNER TO postgres;

--
-- Name: t_referencia_id_Referencia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_referencia_id_Referencia_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_referencia_id_Referencia_seq" OWNER TO postgres;

--
-- Name: t_referencia_id_Referencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_referencia_id_Referencia_seq" OWNED BY public.t_referencia."id_Referencia";


--
-- Name: t_region; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_region (
    id_region integer NOT NULL,
    region character varying(45)
);


ALTER TABLE public.t_region OWNER TO postgres;

--
-- Name: t_region_id_region_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_region_id_region_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_region_id_region_seq OWNER TO postgres;

--
-- Name: t_region_id_region_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_region_id_region_seq OWNED BY public.t_region.id_region;


--
-- Name: t_sistemadepositacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_sistemadepositacion (
    id_sistema_depositacion integer NOT NULL,
    idsd character varying(45),
    sistema_depositacion character varying(45)
);


ALTER TABLE public.t_sistemadepositacion OWNER TO postgres;

--
-- Name: t_sistemadepositacion_id_sistema_depositacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_sistemadepositacion_id_sistema_depositacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_sistemadepositacion_id_sistema_depositacion_seq OWNER TO postgres;

--
-- Name: t_sistemadepositacion_id_sistema_depositacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_sistemadepositacion_id_sistema_depositacion_seq OWNED BY public.t_sistemadepositacion.id_sistema_depositacion;


--
-- Name: t_status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_status (
    "id_Status" integer NOT NULL,
    id_cs character varying(45),
    "Status" character varying(45)
);


ALTER TABLE public.t_status OWNER TO postgres;

--
-- Name: t_status_id_Status_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_status_id_Status_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_status_id_Status_seq" OWNER TO postgres;

--
-- Name: t_status_id_Status_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_status_id_Status_seq" OWNED BY public.t_status."id_Status";


--
-- Name: t_tiporeferencia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_tiporeferencia (
    "id_Tipo_Referencia" integer NOT NULL,
    "Tipo_Referencia" character varying(20)
);


ALTER TABLE public.t_tiporeferencia OWNER TO postgres;

--
-- Name: t_tiporeferencia_id_Tipo_Referencia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."t_tiporeferencia_id_Tipo_Referencia_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."t_tiporeferencia_id_Tipo_Referencia_seq" OWNER TO postgres;

--
-- Name: t_tiporeferencia_id_Tipo_Referencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."t_tiporeferencia_id_Tipo_Referencia_seq" OWNED BY public.t_tiporeferencia."id_Tipo_Referencia";


--
-- Name: t_tiposedad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.t_tiposedad (
    id_tipo integer NOT NULL,
    edad character varying(45)
);


ALTER TABLE public.t_tiposedad OWNER TO postgres;

--
-- Name: t_tiposedad_id_tipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.t_tiposedad_id_tipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.t_tiposedad_id_tipo_seq OWNER TO postgres;

--
-- Name: t_tiposedad_id_tipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.t_tiposedad_id_tipo_seq OWNED BY public.t_tiposedad.id_tipo;


--
-- Name: ubicacion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ubicacion (
    "id_Ubicacion" integer NOT NULL,
    "Region" integer DEFAULT 6 NOT NULL,
    "Pais" integer DEFAULT 2 NOT NULL,
    "Estado" integer DEFAULT 33 NOT NULL,
    "Municipio_Provincia" integer DEFAULT 2458 NOT NULL,
    "Localidad" character varying(400)
);


ALTER TABLE public.ubicacion OWNER TO postgres;

--
-- Name: ubicacion_completa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ubicacion_completa (
    "Region" integer DEFAULT 0 NOT NULL,
    "Pais" integer DEFAULT 0 NOT NULL,
    "Estado" integer DEFAULT 0 NOT NULL,
    "Municipio_Provincia" integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.ubicacion_completa OWNER TO postgres;

--
-- Name: ubicacion_id_Ubicacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."ubicacion_id_Ubicacion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."ubicacion_id_Ubicacion_seq" OWNER TO postgres;

--
-- Name: ubicacion_id_Ubicacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."ubicacion_id_Ubicacion_seq" OWNED BY public.ubicacion."id_Ubicacion";


--
-- Name: unidadanalisis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.unidadanalisis (
    "id_UnidadAnalisis" integer NOT NULL,
    "Unidad_Analisis" character varying(45),
    "Litologia" character varying(300),
    "Sistema_Depositacion" integer DEFAULT 10 NOT NULL,
    "Ambiente_Depositacion" integer DEFAULT 35 NOT NULL,
    "Facie" integer DEFAULT 30 NOT NULL,
    "Formacion" integer DEFAULT 286 NOT NULL,
    "Contaminacion" integer DEFAULT 2 NOT NULL,
    "Nota_Formacion" text,
    "id_EdadContinental" integer,
    "id_EdadMaritima" integer,
    "id_Sitio" integer NOT NULL
);


ALTER TABLE public.unidadanalisis OWNER TO postgres;

--
-- Name: unidadanalisis_id_UnidadAnalisis_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."unidadanalisis_id_UnidadAnalisis_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."unidadanalisis_id_UnidadAnalisis_seq" OWNER TO postgres;

--
-- Name: unidadanalisis_id_UnidadAnalisis_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."unidadanalisis_id_UnidadAnalisis_seq" OWNED BY public.unidadanalisis."id_UnidadAnalisis";


--
-- Name: unidadespecie; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.unidadespecie (
    "id_Especies" integer NOT NULL,
    "id_UnidadAnalisis" integer NOT NULL
);


ALTER TABLE public.unidadespecie OWNER TO postgres;

--
-- Name: edadcontinental id_EdadContinental; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.edadcontinental ALTER COLUMN "id_EdadContinental" SET DEFAULT nextval('public."edadcontinental_id_EdadContinental_seq"'::regclass);


--
-- Name: edadmaritima id_EdadMaritima; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.edadmaritima ALTER COLUMN "id_EdadMaritima" SET DEFAULT nextval('public."edadmaritima_id_EdadMaritima_seq"'::regclass);


--
-- Name: especies id_Especies; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.especies ALTER COLUMN "id_Especies" SET DEFAULT nextval('public."especies_id_Especies_seq"'::regclass);


--
-- Name: materialescatalogo id_MaterialesCatalogo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materialescatalogo ALTER COLUMN "id_MaterialesCatalogo" SET DEFAULT nextval('public."materialescatalogo_id_MaterialesCatalogo_seq"'::regclass);


--
-- Name: materialeslote id_MaterialesLote; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materialeslote ALTER COLUMN "id_MaterialesLote" SET DEFAULT nextval('public."materialeslote_id_MaterialesLote_seq"'::regclass);


--
-- Name: meristica id_Meristica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.meristica ALTER COLUMN "id_Meristica" SET DEFAULT nextval('public."meristica_id_Meristica_seq"'::regclass);


--
-- Name: referenciabibliografica id_ReferenciaBibliografica; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.referenciabibliografica ALTER COLUMN "id_ReferenciaBibliografica" SET DEFAULT nextval('public."referenciabibliografica_id_ReferenciaBibliografica_seq"'::regclass);


--
-- Name: sitio id_Sitio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sitio ALTER COLUMN "id_Sitio" SET DEFAULT nextval('public."sitio_id_Sitio_seq"'::regclass);


--
-- Name: t_actividad id_Actividad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_actividad ALTER COLUMN "id_Actividad" SET DEFAULT nextval('public."t_actividad_id_Actividad_seq"'::regclass);


--
-- Name: t_agente id_Agente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_agente ALTER COLUMN "id_Agente" SET DEFAULT nextval('public."t_agente_id_Agente_seq"'::regclass);


--
-- Name: t_alojamiento id_Alojamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_alojamiento ALTER COLUMN "id_Alojamiento" SET DEFAULT nextval('public."t_alojamiento_id_Alojamiento_seq"'::regclass);


--
-- Name: t_altitud id_Altitud; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_altitud ALTER COLUMN "id_Altitud" SET DEFAULT nextval('public."t_altitud_id_Altitud_seq"'::regclass);


--
-- Name: t_ambientedepositacion id_ambiente_depositacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_ambientedepositacion ALTER COLUMN id_ambiente_depositacion SET DEFAULT nextval('public.t_ambientedepositacion_id_ambiente_depositacion_seq'::regclass);


--
-- Name: t_clase id_Clase; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_clase ALTER COLUMN "id_Clase" SET DEFAULT nextval('public."t_clase_id_Clase_seq"'::regclass);


--
-- Name: t_contaminacion id_contaminacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_contaminacion ALTER COLUMN id_contaminacion SET DEFAULT nextval('public.t_contaminacion_id_contaminacion_seq'::regclass);


--
-- Name: t_contexto id_Contexto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_contexto ALTER COLUMN "id_Contexto" SET DEFAULT nextval('public."t_contexto_id_Contexto_seq"'::regclass);


--
-- Name: t_dietaa id_Dieta_A; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_dietaa ALTER COLUMN "id_Dieta_A" SET DEFAULT nextval('public."t_dietaa_id_Dieta_A_seq"'::regclass);


--
-- Name: t_dietab id_Dieta_B; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_dietab ALTER COLUMN "id_Dieta_B" SET DEFAULT nextval('public."t_dietab_id_Dieta_B_seq"'::regclass);


--
-- Name: t_edadcultural id_edadcultural; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_edadcultural ALTER COLUMN id_edadcultural SET DEFAULT nextval('public.t_edadcultural_id_edadcultural_seq'::regclass);


--
-- Name: t_edadesmarinas id_edades_marinas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_edadesmarinas ALTER COLUMN id_edades_marinas SET DEFAULT nextval('public.t_edadesmarinas_id_edades_marinas_seq'::regclass);


--
-- Name: t_elemento id_Elemento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_elemento ALTER COLUMN "id_Elemento" SET DEFAULT nextval('public."t_elemento_id_Elemento_seq"'::regclass);


--
-- Name: t_epoca id_epoca; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_epoca ALTER COLUMN id_epoca SET DEFAULT nextval('public.t_epoca_id_epoca_seq'::regclass);


--
-- Name: t_era id_era; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_era ALTER COLUMN id_era SET DEFAULT nextval('public.t_era_id_era_seq'::regclass);


--
-- Name: t_estadios id_estadios; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_estadios ALTER COLUMN id_estadios SET DEFAULT nextval('public.t_estadios_id_estadios_seq'::regclass);


--
-- Name: t_estado id_estado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_estado ALTER COLUMN id_estado SET DEFAULT nextval('public.t_estado_id_estado_seq'::regclass);


--
-- Name: t_facies id_facies; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_facies ALTER COLUMN id_facies SET DEFAULT nextval('public.t_facies_id_facies_seq'::regclass);


--
-- Name: t_familia id_Familia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_familia ALTER COLUMN "id_Familia" SET DEFAULT nextval('public."t_familia_id_Familia_seq"'::regclass);


--
-- Name: t_formacion id_formacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_formacion ALTER COLUMN id_formacion SET DEFAULT nextval('public.t_formacion_id_formacion_seq'::regclass);


--
-- Name: t_fuentecoord id_Fuente_Coord; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_fuentecoord ALTER COLUMN "id_Fuente_Coord" SET DEFAULT nextval('public."t_fuentecoord_id_Fuente_Coord_seq"'::regclass);


--
-- Name: t_glacialinterglacial id_glacialinterglacial; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_glacialinterglacial ALTER COLUMN id_glacialinterglacial SET DEFAULT nextval('public.t_glacialinterglacial_id_glacialinterglacial_seq'::regclass);


--
-- Name: t_habalima id_Hab_Alim_A; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_habalima ALTER COLUMN "id_Hab_Alim_A" SET DEFAULT nextval('public."t_habalima_id_Hab_Alim_A_seq"'::regclass);


--
-- Name: t_habalimb id_Hab_Alim_B; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_habalimb ALTER COLUMN "id_Hab_Alim_B" SET DEFAULT nextval('public."t_habalimb_id_Hab_Alim_B_seq"'::regclass);


--
-- Name: t_habrefugio id_Hab_Refugio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_habrefugio ALTER COLUMN "id_Hab_Refugio" SET DEFAULT nextval('public."t_habrefugio_id_Hab_Refugio_seq"'::regclass);


--
-- Name: t_interperismo id_Interperismo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_interperismo ALTER COLUMN "id_Interperismo" SET DEFAULT nextval('public."t_interperismo_id_Interperismo_seq"'::regclass);


--
-- Name: t_isotopo id_isotopo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_isotopo ALTER COLUMN id_isotopo SET DEFAULT nextval('public.t_isotopo_id_isotopo_seq'::regclass);


--
-- Name: t_lado id_lado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_lado ALTER COLUMN id_lado SET DEFAULT nextval('public.t_lado_id_lado_seq'::regclass);


--
-- Name: t_locomocion id_Locomocion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_locomocion ALTER COLUMN "id_Locomocion" SET DEFAULT nextval('public."t_locomocion_id_Locomocion_seq"'::regclass);


--
-- Name: t_magnetocron id_magnetocron; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_magnetocron ALTER COLUMN id_magnetocron SET DEFAULT nextval('public.t_magnetocron_id_magnetocron_seq'::regclass);


--
-- Name: t_materialfechado id_materialfechado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_materialfechado ALTER COLUMN id_materialfechado SET DEFAULT nextval('public.t_materialfechado_id_materialfechado_seq'::regclass);


--
-- Name: t_metodofechamiento id_metodoFechamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_metodofechamiento ALTER COLUMN "id_metodoFechamiento" SET DEFAULT nextval('public."t_metodofechamiento_id_metodoFechamiento_seq"'::regclass);


--
-- Name: t_municipioprov id_municipio_prov; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_municipioprov ALTER COLUMN id_municipio_prov SET DEFAULT nextval('public.t_municipioprov_id_municipio_prov_seq'::regclass);


--
-- Name: t_orden id_Orden; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_orden ALTER COLUMN "id_Orden" SET DEFAULT nextval('public."t_orden_id_Orden_seq"'::regclass);


--
-- Name: t_pais id_pais; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_pais ALTER COLUMN id_pais SET DEFAULT nextval('public.t_pais_id_pais_seq'::regclass);


--
-- Name: t_parte id_Parte; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_parte ALTER COLUMN "id_Parte" SET DEFAULT nextval('public."t_parte_id_Parte_seq"'::regclass);


--
-- Name: t_periodo id_periodo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_periodo ALTER COLUMN id_periodo SET DEFAULT nextval('public.t_periodo_id_periodo_seq'::regclass);


--
-- Name: t_pisofaunistico id_pisofaunistico; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_pisofaunistico ALTER COLUMN id_pisofaunistico SET DEFAULT nextval('public.t_pisofaunistico_id_pisofaunistico_seq'::regclass);


--
-- Name: t_precisioncoord id_Precision_Coord; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_precisioncoord ALTER COLUMN "id_Precision_Coord" SET DEFAULT nextval('public."t_precisioncoord_id_Precision_Coord_seq"'::regclass);


--
-- Name: t_referencia id_Referencia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_referencia ALTER COLUMN "id_Referencia" SET DEFAULT nextval('public."t_referencia_id_Referencia_seq"'::regclass);


--
-- Name: t_region id_region; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_region ALTER COLUMN id_region SET DEFAULT nextval('public.t_region_id_region_seq'::regclass);


--
-- Name: t_sistemadepositacion id_sistema_depositacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_sistemadepositacion ALTER COLUMN id_sistema_depositacion SET DEFAULT nextval('public.t_sistemadepositacion_id_sistema_depositacion_seq'::regclass);


--
-- Name: t_status id_Status; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_status ALTER COLUMN "id_Status" SET DEFAULT nextval('public."t_status_id_Status_seq"'::regclass);


--
-- Name: t_tiporeferencia id_Tipo_Referencia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_tiporeferencia ALTER COLUMN "id_Tipo_Referencia" SET DEFAULT nextval('public."t_tiporeferencia_id_Tipo_Referencia_seq"'::regclass);


--
-- Name: t_tiposedad id_tipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_tiposedad ALTER COLUMN id_tipo SET DEFAULT nextval('public.t_tiposedad_id_tipo_seq'::regclass);


--
-- Name: ubicacion id_Ubicacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ubicacion ALTER COLUMN "id_Ubicacion" SET DEFAULT nextval('public."ubicacion_id_Ubicacion_seq"'::regclass);


--
-- Name: unidadanalisis id_UnidadAnalisis; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.unidadanalisis ALTER COLUMN "id_UnidadAnalisis" SET DEFAULT nextval('public."unidadanalisis_id_UnidadAnalisis_seq"'::regclass);


--
-- Data for Name: edadcontinental; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.edadcontinental ("id_EdadContinental", "Era", "Periodo", "Epoca", "Estadio", "Glacial_Interglacial", "GL_I_Duracion", "Piso_Faunistico", fauna_local, "Edad_Cultural", "Isotopo", "Magnetocron", "Metodo_Fechado", "Material_Fechado", "No_Muestra", "Laboratorio", "EdadUnidadAnalisis") FROM stdin;
\.
COPY public.edadcontinental ("id_EdadContinental", "Era", "Periodo", "Epoca", "Estadio", "Glacial_Interglacial", "GL_I_Duracion", "Piso_Faunistico", fauna_local, "Edad_Cultural", "Isotopo", "Magnetocron", "Metodo_Fechado", "Material_Fechado", "No_Muestra", "Laboratorio", "EdadUnidadAnalisis") FROM '$$PATH$$/3448.dat';

--
-- Data for Name: edadescontinentalescompleta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.edadescontinentalescompleta (region, era, periodo, epoca, "pisoFaun") FROM stdin;
\.
COPY public.edadescontinentalescompleta (region, era, periodo, epoca, "pisoFaun") FROM '$$PATH$$/3450.dat';

--
-- Data for Name: edadesmarinascompleta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.edadesmarinascompleta (era, periodo, epoca, edad) FROM stdin;
\.
COPY public.edadesmarinascompleta (era, periodo, epoca, edad) FROM '$$PATH$$/3451.dat';

--
-- Data for Name: edadmaritima; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.edadmaritima ("id_EdadMaritima", "Era", "Periodo", "Epoca", "Edad", "Edad_Unidad_Analisis", "Metodo_Fechado", "Material_Fechado", "No_Muestra", "Laboratorio") FROM stdin;
\.
COPY public.edadmaritima ("id_EdadMaritima", "Era", "Periodo", "Epoca", "Edad", "Edad_Unidad_Analisis", "Metodo_Fechado", "Material_Fechado", "No_Muestra", "Laboratorio") FROM '$$PATH$$/3452.dat';

--
-- Data for Name: especies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.especies ("id_Especies", "Subclase", "Suborden", "Infraorden", "Subfamilia", "Genero", "Especie", "Autor", "Sinonimias", "Taxon_Valido", "Nombre_Espaniol", "Nombre_Ingles", "id_Actividad", "id_Clase", "id_Dieta_A", "id_Dieta_B", "id_Hab_Alim_A", "id_Hab_Alim_B", "id_Familia", "id_Hab_Refugio", "id_Locomocion", "id_Orden", "id_Status") FROM stdin;
\.
COPY public.especies ("id_Especies", "Subclase", "Suborden", "Infraorden", "Subfamilia", "Genero", "Especie", "Autor", "Sinonimias", "Taxon_Valido", "Nombre_Espaniol", "Nombre_Ingles", "id_Actividad", "id_Clase", "id_Dieta_A", "id_Dieta_B", "id_Hab_Alim_A", "id_Hab_Alim_B", "id_Familia", "id_Hab_Refugio", "id_Locomocion", "id_Orden", "id_Status") FROM '$$PATH$$/3454.dat';

--
-- Data for Name: glaciacionescompleta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.glaciacionescompleta (tipo, region, era, periodo, epoca, "periodoGlacial", estadio) FROM stdin;
\.
COPY public.glaciacionescompleta (tipo, region, era, periodo, epoca, "periodoGlacial", estadio) FROM '$$PATH$$/3456.dat';

--
-- Data for Name: hallazgo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.hallazgo (id_ubicacion, "id_ReferenciaBibliografica") FROM stdin;
\.
COPY public.hallazgo (id_ubicacion, "id_ReferenciaBibliografica") FROM '$$PATH$$/3457.dat';

--
-- Data for Name: materialescatalogo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.materialescatalogo ("id_MaterialesCatalogo", "No_Catalogo", "DescripElemento", id_lado, "Imagen", "id_Especies", "id_Elemento", "id_Parte", "id_Agente", "id_Contexto", "id_Interperismo", "id_Alojamiento") FROM stdin;
\.
COPY public.materialescatalogo ("id_MaterialesCatalogo", "No_Catalogo", "DescripElemento", id_lado, "Imagen", "id_Especies", "id_Elemento", "id_Parte", "id_Agente", "id_Contexto", "id_Interperismo", "id_Alojamiento") FROM '$$PATH$$/3458.dat';

--
-- Data for Name: materialeslote; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.materialeslote ("id_MaterialesLote", "Lote", "Descripcion", "id_Especies", "id_Alojamiento") FROM stdin;
\.
COPY public.materialeslote ("id_MaterialesLote", "Lote", "Descripcion", "id_Especies", "id_Alojamiento") FROM '$$PATH$$/3460.dat';

--
-- Data for Name: meristica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.meristica ("id_Meristica", "id_MaterialesCatalogo", "Clave_Medida", "Descripcion_Medida", "Medida", "Unidades", "Notas_Meristica") FROM stdin;
\.
COPY public.meristica ("id_Meristica", "id_MaterialesCatalogo", "Clave_Medida", "Descripcion_Medida", "Medida", "Unidades", "Notas_Meristica") FROM '$$PATH$$/3462.dat';

--
-- Data for Name: referenciabibliografica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.referenciabibliografica ("id_ReferenciaBibliografica", "Anio", "id_Referencia", "id_Tipo_Referencia") FROM stdin;
\.
COPY public.referenciabibliografica ("id_ReferenciaBibliografica", "Anio", "id_Referencia", "id_Tipo_Referencia") FROM '$$PATH$$/3464.dat';

--
-- Data for Name: sitio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sitio ("id_Sitio", "Sitio", "Latitud", "Longitud", "CCL-E", "CCL-N", "UTM-E", "UTM-N", "ZonaUTM", "id_Fuente_Altitud", "id_Ubicacion", "Altitud", "id_Fuente_Coord", "id_Precision_Coord") FROM stdin;
\.
COPY public.sitio ("id_Sitio", "Sitio", "Latitud", "Longitud", "CCL-E", "CCL-N", "UTM-E", "UTM-N", "ZonaUTM", "id_Fuente_Altitud", "id_Ubicacion", "Altitud", "id_Fuente_Coord", "id_Precision_Coord") FROM '$$PATH$$/3466.dat';

--
-- Data for Name: t_actividad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_actividad ("id_Actividad", id_ca, "Actividad") FROM stdin;
\.
COPY public.t_actividad ("id_Actividad", id_ca, "Actividad") FROM '$$PATH$$/3468.dat';

--
-- Data for Name: t_agente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_agente ("id_Agente", id_ag, "Agente") FROM stdin;
\.
COPY public.t_agente ("id_Agente", id_ag, "Agente") FROM '$$PATH$$/3470.dat';

--
-- Data for Name: t_alojamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_alojamiento ("id_Alojamiento", "Clave_Alojamiento", "Alojamiento") FROM stdin;
\.
COPY public.t_alojamiento ("id_Alojamiento", "Clave_Alojamiento", "Alojamiento") FROM '$$PATH$$/3472.dat';

--
-- Data for Name: t_altitud; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_altitud ("id_Altitud", "Fuente_Altitud") FROM stdin;
\.
COPY public.t_altitud ("id_Altitud", "Fuente_Altitud") FROM '$$PATH$$/3474.dat';

--
-- Data for Name: t_ambientedepositacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_ambientedepositacion (id_ambiente_depositacion, ida, ambiente_depositacion) FROM stdin;
\.
COPY public.t_ambientedepositacion (id_ambiente_depositacion, ida, ambiente_depositacion) FROM '$$PATH$$/3476.dat';

--
-- Data for Name: t_clase; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_clase ("id_Clase", "Clase", "Autor", "Anio") FROM stdin;
\.
COPY public.t_clase ("id_Clase", "Clase", "Autor", "Anio") FROM '$$PATH$$/3478.dat';

--
-- Data for Name: t_contaminacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_contaminacion (id_contaminacion, idco, contaminacion) FROM stdin;
\.
COPY public.t_contaminacion (id_contaminacion, idco, contaminacion) FROM '$$PATH$$/3480.dat';

--
-- Data for Name: t_contexto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_contexto ("id_Contexto", id_ctx, "Contexto") FROM stdin;
\.
COPY public.t_contexto ("id_Contexto", id_ctx, "Contexto") FROM '$$PATH$$/3482.dat';

--
-- Data for Name: t_dietaa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_dietaa ("id_Dieta_A", id_da, "Dieta_A") FROM stdin;
\.
COPY public.t_dietaa ("id_Dieta_A", id_da, "Dieta_A") FROM '$$PATH$$/3484.dat';

--
-- Data for Name: t_dietab; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_dietab ("id_Dieta_B", id_db, "Dieta_B") FROM stdin;
\.
COPY public.t_dietab ("id_Dieta_B", id_db, "Dieta_B") FROM '$$PATH$$/3486.dat';

--
-- Data for Name: t_edadcultural; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_edadcultural (id_edadcultural, edadcultural, temporalidad) FROM stdin;
\.
COPY public.t_edadcultural (id_edadcultural, edadcultural, temporalidad) FROM '$$PATH$$/3488.dat';

--
-- Data for Name: t_edadesmarinas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_edadesmarinas (id_edades_marinas, edad) FROM stdin;
\.
COPY public.t_edadesmarinas (id_edades_marinas, edad) FROM '$$PATH$$/3490.dat';

--
-- Data for Name: t_elemento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_elemento ("id_Elemento", "Clave_elemento", "Elemento") FROM stdin;
\.
COPY public.t_elemento ("id_Elemento", "Clave_elemento", "Elemento") FROM '$$PATH$$/3492.dat';

--
-- Data for Name: t_epoca; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_epoca (id_epoca, epoca) FROM stdin;
\.
COPY public.t_epoca (id_epoca, epoca) FROM '$$PATH$$/3494.dat';

--
-- Data for Name: t_era; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_era (id_era, era) FROM stdin;
\.
COPY public.t_era (id_era, era) FROM '$$PATH$$/3496.dat';

--
-- Data for Name: t_estadios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_estadios (id_estadios, estadios) FROM stdin;
\.
COPY public.t_estadios (id_estadios, estadios) FROM '$$PATH$$/3498.dat';

--
-- Data for Name: t_estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_estado (id_estado, estado) FROM stdin;
\.
COPY public.t_estado (id_estado, estado) FROM '$$PATH$$/3500.dat';

--
-- Data for Name: t_facies; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_facies (id_facies, idf, facies) FROM stdin;
\.
COPY public.t_facies (id_facies, idf, facies) FROM '$$PATH$$/3502.dat';

--
-- Data for Name: t_familia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_familia ("id_Familia", "Familia", "Autor", "Anio") FROM stdin;
\.
COPY public.t_familia ("id_Familia", "Familia", "Autor", "Anio") FROM '$$PATH$$/3504.dat';

--
-- Data for Name: t_formacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_formacion (id_formacion, formacion) FROM stdin;
\.
COPY public.t_formacion (id_formacion, formacion) FROM '$$PATH$$/3506.dat';

--
-- Data for Name: t_fuentecoord; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_fuentecoord ("id_Fuente_Coord", id_fc, "Fuente_Coord") FROM stdin;
\.
COPY public.t_fuentecoord ("id_Fuente_Coord", id_fc, "Fuente_Coord") FROM '$$PATH$$/3508.dat';

--
-- Data for Name: t_glacialinterglacial; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_glacialinterglacial (id_glacialinterglacial, idgi) FROM stdin;
\.
COPY public.t_glacialinterglacial (id_glacialinterglacial, idgi) FROM '$$PATH$$/3510.dat';

--
-- Data for Name: t_habalima; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_habalima ("id_Hab_Alim_A", id_haa, "Hab_Alim_A") FROM stdin;
\.
COPY public.t_habalima ("id_Hab_Alim_A", id_haa, "Hab_Alim_A") FROM '$$PATH$$/3512.dat';

--
-- Data for Name: t_habalimb; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_habalimb ("id_Hab_Alim_B", id_hab, "Hab_Alim_B") FROM stdin;
\.
COPY public.t_habalimb ("id_Hab_Alim_B", id_hab, "Hab_Alim_B") FROM '$$PATH$$/3514.dat';

--
-- Data for Name: t_habrefugio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_habrefugio ("id_Hab_Refugio", id_ref, "Hab_Refugio") FROM stdin;
\.
COPY public.t_habrefugio ("id_Hab_Refugio", id_ref, "Hab_Refugio") FROM '$$PATH$$/3516.dat';

--
-- Data for Name: t_interperismo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_interperismo ("id_Interperismo", id_intem, "Interperismo") FROM stdin;
\.
COPY public.t_interperismo ("id_Interperismo", id_intem, "Interperismo") FROM '$$PATH$$/3518.dat';

--
-- Data for Name: t_isotopo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_isotopo (id_isotopo, isotopo) FROM stdin;
\.
COPY public.t_isotopo (id_isotopo, isotopo) FROM '$$PATH$$/3520.dat';

--
-- Data for Name: t_lado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_lado (id_lado, "Lado") FROM stdin;
\.
COPY public.t_lado (id_lado, "Lado") FROM '$$PATH$$/3522.dat';

--
-- Data for Name: t_locomocion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_locomocion ("id_Locomocion", id_lcmon, "Locomocion") FROM stdin;
\.
COPY public.t_locomocion ("id_Locomocion", id_lcmon, "Locomocion") FROM '$$PATH$$/3524.dat';

--
-- Data for Name: t_magnetocron; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_magnetocron (id_magnetocron, idmag, magnetocron) FROM stdin;
\.
COPY public.t_magnetocron (id_magnetocron, idmag, magnetocron) FROM '$$PATH$$/3526.dat';

--
-- Data for Name: t_materialfechado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_materialfechado (id_materialfechado, idmf, "materialFechado") FROM stdin;
\.
COPY public.t_materialfechado (id_materialfechado, idmf, "materialFechado") FROM '$$PATH$$/3528.dat';

--
-- Data for Name: t_metodofechamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_metodofechamiento ("id_metodoFechamiento", metodofechamiento_clave, metodofechamiento) FROM stdin;
\.
COPY public.t_metodofechamiento ("id_metodoFechamiento", metodofechamiento_clave, metodofechamiento) FROM '$$PATH$$/3530.dat';

--
-- Data for Name: t_municipioprov; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_municipioprov (id_municipio_prov, municipio_prov) FROM stdin;
\.
COPY public.t_municipioprov (id_municipio_prov, municipio_prov) FROM '$$PATH$$/3532.dat';

--
-- Data for Name: t_orden; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_orden ("id_Orden", "Orden", "Autor", "Anio") FROM stdin;
\.
COPY public.t_orden ("id_Orden", "Orden", "Autor", "Anio") FROM '$$PATH$$/3534.dat';

--
-- Data for Name: t_pais; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_pais (id_pais, pais) FROM stdin;
\.
COPY public.t_pais (id_pais, pais) FROM '$$PATH$$/3536.dat';

--
-- Data for Name: t_parte; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_parte ("id_Parte", "Parte") FROM stdin;
\.
COPY public.t_parte ("id_Parte", "Parte") FROM '$$PATH$$/3538.dat';

--
-- Data for Name: t_periodo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_periodo (id_periodo, periodo) FROM stdin;
\.
COPY public.t_periodo (id_periodo, periodo) FROM '$$PATH$$/3540.dat';

--
-- Data for Name: t_pisofaunistico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_pisofaunistico (id_pisofaunistico, "pisoFaunistico") FROM stdin;
\.
COPY public.t_pisofaunistico (id_pisofaunistico, "pisoFaunistico") FROM '$$PATH$$/3542.dat';

--
-- Data for Name: t_precisioncoord; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_precisioncoord ("id_Precision_Coord", id_pc, "Precision_Coord") FROM stdin;
\.
COPY public.t_precisioncoord ("id_Precision_Coord", id_pc, "Precision_Coord") FROM '$$PATH$$/3544.dat';

--
-- Data for Name: t_referencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_referencia ("id_Referencia", "Referencia") FROM stdin;
\.
COPY public.t_referencia ("id_Referencia", "Referencia") FROM '$$PATH$$/3546.dat';

--
-- Data for Name: t_region; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_region (id_region, region) FROM stdin;
\.
COPY public.t_region (id_region, region) FROM '$$PATH$$/3548.dat';

--
-- Data for Name: t_sistemadepositacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_sistemadepositacion (id_sistema_depositacion, idsd, sistema_depositacion) FROM stdin;
\.
COPY public.t_sistemadepositacion (id_sistema_depositacion, idsd, sistema_depositacion) FROM '$$PATH$$/3550.dat';

--
-- Data for Name: t_status; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_status ("id_Status", id_cs, "Status") FROM stdin;
\.
COPY public.t_status ("id_Status", id_cs, "Status") FROM '$$PATH$$/3552.dat';

--
-- Data for Name: t_tiporeferencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_tiporeferencia ("id_Tipo_Referencia", "Tipo_Referencia") FROM stdin;
\.
COPY public.t_tiporeferencia ("id_Tipo_Referencia", "Tipo_Referencia") FROM '$$PATH$$/3554.dat';

--
-- Data for Name: t_tiposedad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.t_tiposedad (id_tipo, edad) FROM stdin;
\.
COPY public.t_tiposedad (id_tipo, edad) FROM '$$PATH$$/3556.dat';

--
-- Data for Name: ubicacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ubicacion ("id_Ubicacion", "Region", "Pais", "Estado", "Municipio_Provincia", "Localidad") FROM stdin;
\.
COPY public.ubicacion ("id_Ubicacion", "Region", "Pais", "Estado", "Municipio_Provincia", "Localidad") FROM '$$PATH$$/3558.dat';

--
-- Data for Name: ubicacion_completa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ubicacion_completa ("Region", "Pais", "Estado", "Municipio_Provincia") FROM stdin;
\.
COPY public.ubicacion_completa ("Region", "Pais", "Estado", "Municipio_Provincia") FROM '$$PATH$$/3559.dat';

--
-- Data for Name: unidadanalisis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.unidadanalisis ("id_UnidadAnalisis", "Unidad_Analisis", "Litologia", "Sistema_Depositacion", "Ambiente_Depositacion", "Facie", "Formacion", "Contaminacion", "Nota_Formacion", "id_EdadContinental", "id_EdadMaritima", "id_Sitio") FROM stdin;
\.
COPY public.unidadanalisis ("id_UnidadAnalisis", "Unidad_Analisis", "Litologia", "Sistema_Depositacion", "Ambiente_Depositacion", "Facie", "Formacion", "Contaminacion", "Nota_Formacion", "id_EdadContinental", "id_EdadMaritima", "id_Sitio") FROM '$$PATH$$/3561.dat';

--
-- Data for Name: unidadespecie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.unidadespecie ("id_Especies", "id_UnidadAnalisis") FROM stdin;
\.
COPY public.unidadespecie ("id_Especies", "id_UnidadAnalisis") FROM '$$PATH$$/3563.dat';

--
-- Name: edadcontinental_id_EdadContinental_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."edadcontinental_id_EdadContinental_seq"', 37, false);


--
-- Name: edadmaritima_id_EdadMaritima_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."edadmaritima_id_EdadMaritima_seq"', 34, false);


--
-- Name: especies_id_Especies_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."especies_id_Especies_seq"', 1390, false);


--
-- Name: materialescatalogo_id_MaterialesCatalogo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."materialescatalogo_id_MaterialesCatalogo_seq"', 1651, false);


--
-- Name: materialeslote_id_MaterialesLote_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."materialeslote_id_MaterialesLote_seq"', 1, false);


--
-- Name: meristica_id_Meristica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."meristica_id_Meristica_seq"', 1, false);


--
-- Name: referenciabibliografica_id_ReferenciaBibliografica_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."referenciabibliografica_id_ReferenciaBibliografica_seq"', 386, false);


--
-- Name: sitio_id_Sitio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."sitio_id_Sitio_seq"', 1752, false);


--
-- Name: t_actividad_id_Actividad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_actividad_id_Actividad_seq"', 6, false);


--
-- Name: t_agente_id_Agente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_agente_id_Agente_seq"', 15, false);


--
-- Name: t_alojamiento_id_Alojamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_alojamiento_id_Alojamiento_seq"', 69, false);


--
-- Name: t_altitud_id_Altitud_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_altitud_id_Altitud_seq"', 5, false);


--
-- Name: t_ambientedepositacion_id_ambiente_depositacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_ambientedepositacion_id_ambiente_depositacion_seq', 66, false);


--
-- Name: t_clase_id_Clase_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_clase_id_Clase_seq"', 12, false);


--
-- Name: t_contaminacion_id_contaminacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_contaminacion_id_contaminacion_seq', 5, false);


--
-- Name: t_contexto_id_Contexto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_contexto_id_Contexto_seq"', 5, false);


--
-- Name: t_dietaa_id_Dieta_A_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_dietaa_id_Dieta_A_seq"', 7, false);


--
-- Name: t_dietab_id_Dieta_B_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_dietab_id_Dieta_B_seq"', 18, false);


--
-- Name: t_edadcultural_id_edadcultural_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_edadcultural_id_edadcultural_seq', 15, false);


--
-- Name: t_edadesmarinas_id_edades_marinas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_edadesmarinas_id_edades_marinas_seq', 106, false);


--
-- Name: t_elemento_id_Elemento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_elemento_id_Elemento_seq"', 137, false);


--
-- Name: t_epoca_id_epoca_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_epoca_id_epoca_seq', 63, false);


--
-- Name: t_era_id_era_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_era_id_era_seq', 5, false);


--
-- Name: t_estadios_id_estadios_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_estadios_id_estadios_seq', 10, false);


--
-- Name: t_estado_id_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_estado_id_estado_seq', 34, false);


--
-- Name: t_facies_id_facies_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_facies_id_facies_seq', 41, false);


--
-- Name: t_familia_id_Familia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_familia_id_Familia_seq"', 242, false);


--
-- Name: t_formacion_id_formacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_formacion_id_formacion_seq', 287, false);


--
-- Name: t_fuentecoord_id_Fuente_Coord_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_fuentecoord_id_Fuente_Coord_seq"', 7, false);


--
-- Name: t_glacialinterglacial_id_glacialinterglacial_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_glacialinterglacial_id_glacialinterglacial_seq', 35, false);


--
-- Name: t_habalima_id_Hab_Alim_A_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_habalima_id_Hab_Alim_A_seq"', 6, false);


--
-- Name: t_habalimb_id_Hab_Alim_B_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_habalimb_id_Hab_Alim_B_seq"', 8, false);


--
-- Name: t_habrefugio_id_Hab_Refugio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_habrefugio_id_Hab_Refugio_seq"', 7, false);


--
-- Name: t_interperismo_id_Interperismo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_interperismo_id_Interperismo_seq"', 8, false);


--
-- Name: t_isotopo_id_isotopo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_isotopo_id_isotopo_seq', 8, false);


--
-- Name: t_lado_id_lado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_lado_id_lado_seq', 4, false);


--
-- Name: t_locomocion_id_Locomocion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_locomocion_id_Locomocion_seq"', 14, false);


--
-- Name: t_magnetocron_id_magnetocron_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_magnetocron_id_magnetocron_seq', 7, false);


--
-- Name: t_materialfechado_id_materialfechado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_materialfechado_id_materialfechado_seq', 33, false);


--
-- Name: t_metodofechamiento_id_metodoFechamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_metodofechamiento_id_metodoFechamiento_seq"', 21, false);


--
-- Name: t_municipioprov_id_municipio_prov_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_municipioprov_id_municipio_prov_seq', 2459, false);


--
-- Name: t_orden_id_Orden_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_orden_id_Orden_seq"', 110, false);


--
-- Name: t_pais_id_pais_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_pais_id_pais_seq', 3, false);


--
-- Name: t_parte_id_Parte_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_parte_id_Parte_seq"', 5, false);


--
-- Name: t_periodo_id_periodo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_periodo_id_periodo_seq', 17, false);


--
-- Name: t_pisofaunistico_id_pisofaunistico_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_pisofaunistico_id_pisofaunistico_seq', 87, false);


--
-- Name: t_precisioncoord_id_Precision_Coord_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_precisioncoord_id_Precision_Coord_seq"', 7, false);


--
-- Name: t_referencia_id_Referencia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_referencia_id_Referencia_seq"', 4462, false);


--
-- Name: t_region_id_region_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_region_id_region_seq', 7, false);


--
-- Name: t_sistemadepositacion_id_sistema_depositacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_sistemadepositacion_id_sistema_depositacion_seq', 12, false);


--
-- Name: t_status_id_Status_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_status_id_Status_seq"', 7, false);


--
-- Name: t_tiporeferencia_id_Tipo_Referencia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."t_tiporeferencia_id_Tipo_Referencia_seq"', 4, false);


--
-- Name: t_tiposedad_id_tipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.t_tiposedad_id_tipo_seq', 3, false);


--
-- Name: ubicacion_id_Ubicacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."ubicacion_id_Ubicacion_seq"', 379, false);


--
-- Name: unidadanalisis_id_UnidadAnalisis_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."unidadanalisis_id_UnidadAnalisis_seq"', 651, false);


--
-- Name: edadcontinental edadcontinental_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.edadcontinental
    ADD CONSTRAINT edadcontinental_pkey PRIMARY KEY ("id_EdadContinental");


--
-- Name: edadescontinentalescompleta edadescontinentalescompleta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.edadescontinentalescompleta
    ADD CONSTRAINT edadescontinentalescompleta_pkey PRIMARY KEY (region, era, periodo, epoca, "pisoFaun");


--
-- Name: edadesmarinascompleta edadesmarinascompleta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.edadesmarinascompleta
    ADD CONSTRAINT edadesmarinascompleta_pkey PRIMARY KEY (era, periodo, epoca, edad);


--
-- Name: edadmaritima edadmaritima_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.edadmaritima
    ADD CONSTRAINT edadmaritima_pkey PRIMARY KEY ("id_EdadMaritima");


--
-- Name: especies especies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.especies
    ADD CONSTRAINT especies_pkey PRIMARY KEY ("id_Especies");


--
-- Name: glaciacionescompleta glaciacionescompleta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.glaciacionescompleta
    ADD CONSTRAINT glaciacionescompleta_pkey PRIMARY KEY (tipo, region, era, periodo, epoca, "periodoGlacial", estadio);


--
-- Name: hallazgo hallazgo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hallazgo
    ADD CONSTRAINT hallazgo_pkey PRIMARY KEY ("id_ReferenciaBibliografica", id_ubicacion);


--
-- Name: materialescatalogo materialescatalogo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materialescatalogo
    ADD CONSTRAINT materialescatalogo_pkey PRIMARY KEY ("id_MaterialesCatalogo");


--
-- Name: materialeslote materialeslote_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materialeslote
    ADD CONSTRAINT materialeslote_pkey PRIMARY KEY ("id_MaterialesLote");


--
-- Name: meristica meristica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.meristica
    ADD CONSTRAINT meristica_pkey PRIMARY KEY ("id_Meristica");


--
-- Name: referenciabibliografica referenciabibliografica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.referenciabibliografica
    ADD CONSTRAINT referenciabibliografica_pkey PRIMARY KEY ("id_ReferenciaBibliografica");


--
-- Name: sitio sitio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sitio
    ADD CONSTRAINT sitio_pkey PRIMARY KEY ("id_Sitio");


--
-- Name: t_actividad t_actividad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_actividad
    ADD CONSTRAINT t_actividad_pkey PRIMARY KEY ("id_Actividad");


--
-- Name: t_agente t_agente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_agente
    ADD CONSTRAINT t_agente_pkey PRIMARY KEY ("id_Agente");


--
-- Name: t_alojamiento t_alojamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_alojamiento
    ADD CONSTRAINT t_alojamiento_pkey PRIMARY KEY ("id_Alojamiento");


--
-- Name: t_altitud t_altitud_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_altitud
    ADD CONSTRAINT t_altitud_pkey PRIMARY KEY ("id_Altitud");


--
-- Name: t_ambientedepositacion t_ambientedepositacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_ambientedepositacion
    ADD CONSTRAINT t_ambientedepositacion_pkey PRIMARY KEY (id_ambiente_depositacion);


--
-- Name: t_clase t_clase_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_clase
    ADD CONSTRAINT t_clase_pkey PRIMARY KEY ("id_Clase");


--
-- Name: t_contaminacion t_contaminacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_contaminacion
    ADD CONSTRAINT t_contaminacion_pkey PRIMARY KEY (id_contaminacion);


--
-- Name: t_contexto t_contexto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_contexto
    ADD CONSTRAINT t_contexto_pkey PRIMARY KEY ("id_Contexto");


--
-- Name: t_dietaa t_dietaa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_dietaa
    ADD CONSTRAINT t_dietaa_pkey PRIMARY KEY ("id_Dieta_A");


--
-- Name: t_dietab t_dietab_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_dietab
    ADD CONSTRAINT t_dietab_pkey PRIMARY KEY ("id_Dieta_B");


--
-- Name: t_edadcultural t_edadcultural_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_edadcultural
    ADD CONSTRAINT t_edadcultural_pkey PRIMARY KEY (id_edadcultural);


--
-- Name: t_edadesmarinas t_edadesmarinas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_edadesmarinas
    ADD CONSTRAINT t_edadesmarinas_pkey PRIMARY KEY (id_edades_marinas);


--
-- Name: t_elemento t_elemento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_elemento
    ADD CONSTRAINT t_elemento_pkey PRIMARY KEY ("id_Elemento");


--
-- Name: t_epoca t_epoca_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_epoca
    ADD CONSTRAINT t_epoca_pkey PRIMARY KEY (id_epoca);


--
-- Name: t_era t_era_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_era
    ADD CONSTRAINT t_era_pkey PRIMARY KEY (id_era);


--
-- Name: t_estadios t_estadios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_estadios
    ADD CONSTRAINT t_estadios_pkey PRIMARY KEY (id_estadios);


--
-- Name: t_estado t_estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_estado
    ADD CONSTRAINT t_estado_pkey PRIMARY KEY (id_estado);


--
-- Name: t_facies t_facies_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_facies
    ADD CONSTRAINT t_facies_pkey PRIMARY KEY (id_facies);


--
-- Name: t_familia t_familia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_familia
    ADD CONSTRAINT t_familia_pkey PRIMARY KEY ("id_Familia");


--
-- Name: t_formacion t_formacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_formacion
    ADD CONSTRAINT t_formacion_pkey PRIMARY KEY (id_formacion);


--
-- Name: t_fuentecoord t_fuentecoord_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_fuentecoord
    ADD CONSTRAINT t_fuentecoord_pkey PRIMARY KEY ("id_Fuente_Coord");


--
-- Name: t_glacialinterglacial t_glacialinterglacial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_glacialinterglacial
    ADD CONSTRAINT t_glacialinterglacial_pkey PRIMARY KEY (id_glacialinterglacial);


--
-- Name: t_habalima t_habalima_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_habalima
    ADD CONSTRAINT t_habalima_pkey PRIMARY KEY ("id_Hab_Alim_A");


--
-- Name: t_habalimb t_habalimb_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_habalimb
    ADD CONSTRAINT t_habalimb_pkey PRIMARY KEY ("id_Hab_Alim_B");


--
-- Name: t_habrefugio t_habrefugio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_habrefugio
    ADD CONSTRAINT t_habrefugio_pkey PRIMARY KEY ("id_Hab_Refugio");


--
-- Name: t_interperismo t_interperismo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_interperismo
    ADD CONSTRAINT t_interperismo_pkey PRIMARY KEY ("id_Interperismo");


--
-- Name: t_isotopo t_isotopo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_isotopo
    ADD CONSTRAINT t_isotopo_pkey PRIMARY KEY (id_isotopo);


--
-- Name: t_lado t_lado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_lado
    ADD CONSTRAINT t_lado_pkey PRIMARY KEY (id_lado);


--
-- Name: t_locomocion t_locomocion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_locomocion
    ADD CONSTRAINT t_locomocion_pkey PRIMARY KEY ("id_Locomocion");


--
-- Name: t_magnetocron t_magnetocron_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_magnetocron
    ADD CONSTRAINT t_magnetocron_pkey PRIMARY KEY (id_magnetocron);


--
-- Name: t_materialfechado t_materialfechado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_materialfechado
    ADD CONSTRAINT t_materialfechado_pkey PRIMARY KEY (id_materialfechado);


--
-- Name: t_metodofechamiento t_metodofechamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_metodofechamiento
    ADD CONSTRAINT t_metodofechamiento_pkey PRIMARY KEY ("id_metodoFechamiento");


--
-- Name: t_municipioprov t_municipioprov_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_municipioprov
    ADD CONSTRAINT t_municipioprov_pkey PRIMARY KEY (id_municipio_prov);


--
-- Name: t_orden t_orden_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_orden
    ADD CONSTRAINT t_orden_pkey PRIMARY KEY ("id_Orden");


--
-- Name: t_pais t_pais_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_pais
    ADD CONSTRAINT t_pais_pkey PRIMARY KEY (id_pais);


--
-- Name: t_parte t_parte_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_parte
    ADD CONSTRAINT t_parte_pkey PRIMARY KEY ("id_Parte");


--
-- Name: t_periodo t_periodo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_periodo
    ADD CONSTRAINT t_periodo_pkey PRIMARY KEY (id_periodo);


--
-- Name: t_pisofaunistico t_pisofaunistico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_pisofaunistico
    ADD CONSTRAINT t_pisofaunistico_pkey PRIMARY KEY (id_pisofaunistico);


--
-- Name: t_precisioncoord t_precisioncoord_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_precisioncoord
    ADD CONSTRAINT t_precisioncoord_pkey PRIMARY KEY ("id_Precision_Coord");


--
-- Name: t_referencia t_referencia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_referencia
    ADD CONSTRAINT t_referencia_pkey PRIMARY KEY ("id_Referencia");


--
-- Name: t_region t_region_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_region
    ADD CONSTRAINT t_region_pkey PRIMARY KEY (id_region);


--
-- Name: t_sistemadepositacion t_sistemadepositacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_sistemadepositacion
    ADD CONSTRAINT t_sistemadepositacion_pkey PRIMARY KEY (id_sistema_depositacion);


--
-- Name: t_status t_status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_status
    ADD CONSTRAINT t_status_pkey PRIMARY KEY ("id_Status");


--
-- Name: t_tiporeferencia t_tiporeferencia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_tiporeferencia
    ADD CONSTRAINT t_tiporeferencia_pkey PRIMARY KEY ("id_Tipo_Referencia");


--
-- Name: t_tiposedad t_tiposedad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.t_tiposedad
    ADD CONSTRAINT t_tiposedad_pkey PRIMARY KEY (id_tipo);


--
-- Name: ubicacion_completa ubicacion_completa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ubicacion_completa
    ADD CONSTRAINT ubicacion_completa_pkey PRIMARY KEY ("Region", "Pais", "Estado", "Municipio_Provincia");


--
-- Name: ubicacion ubicacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ubicacion
    ADD CONSTRAINT ubicacion_pkey PRIMARY KEY ("id_Ubicacion");


--
-- Name: unidadanalisis unidadanalisis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.unidadanalisis
    ADD CONSTRAINT unidadanalisis_pkey PRIMARY KEY ("id_UnidadAnalisis");


--
-- Name: unidadespecie unidadespecie_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.unidadespecie
    ADD CONSTRAINT unidadespecie_pkey PRIMARY KEY ("id_Especies", "id_UnidadAnalisis");


--
-- Name: edadcontinental_Edad_Cultural_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Edad_Cultural_idx" ON public.edadcontinental USING btree ("Edad_Cultural");


--
-- Name: edadcontinental_Epoca_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Epoca_idx" ON public.edadcontinental USING btree ("Epoca");


--
-- Name: edadcontinental_Era_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Era_idx" ON public.edadcontinental USING btree ("Era");


--
-- Name: edadcontinental_Estadio_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Estadio_idx" ON public.edadcontinental USING btree ("Estadio");


--
-- Name: edadcontinental_Glacial_Interglacial_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Glacial_Interglacial_idx" ON public.edadcontinental USING btree ("Glacial_Interglacial");


--
-- Name: edadcontinental_Isotopo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Isotopo_idx" ON public.edadcontinental USING btree ("Isotopo");


--
-- Name: edadcontinental_Magnetocron_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Magnetocron_idx" ON public.edadcontinental USING btree ("Magnetocron");


--
-- Name: edadcontinental_Material_Fechado_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Material_Fechado_idx" ON public.edadcontinental USING btree ("Material_Fechado");


--
-- Name: edadcontinental_Metodo_Fechado_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Metodo_Fechado_idx" ON public.edadcontinental USING btree ("Metodo_Fechado");


--
-- Name: edadcontinental_Periodo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Periodo_idx" ON public.edadcontinental USING btree ("Periodo");


--
-- Name: edadcontinental_Piso_Faunistico_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadcontinental_Piso_Faunistico_idx" ON public.edadcontinental USING btree ("Piso_Faunistico");


--
-- Name: edadescontinentalescompleta_epoca_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX edadescontinentalescompleta_epoca_idx ON public.edadescontinentalescompleta USING btree (epoca);


--
-- Name: edadescontinentalescompleta_era_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX edadescontinentalescompleta_era_idx ON public.edadescontinentalescompleta USING btree (era);


--
-- Name: edadescontinentalescompleta_periodo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX edadescontinentalescompleta_periodo_idx ON public.edadescontinentalescompleta USING btree (periodo);


--
-- Name: edadescontinentalescompleta_pisoFaun_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadescontinentalescompleta_pisoFaun_idx" ON public.edadescontinentalescompleta USING btree ("pisoFaun");


--
-- Name: edadesmarinascompleta_edad_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX edadesmarinascompleta_edad_idx ON public.edadesmarinascompleta USING btree (edad);


--
-- Name: edadesmarinascompleta_epoca_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX edadesmarinascompleta_epoca_idx ON public.edadesmarinascompleta USING btree (epoca);


--
-- Name: edadesmarinascompleta_periodo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX edadesmarinascompleta_periodo_idx ON public.edadesmarinascompleta USING btree (periodo);


--
-- Name: edadmaritima_Edad_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadmaritima_Edad_idx" ON public.edadmaritima USING btree ("Edad");


--
-- Name: edadmaritima_Epoca_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadmaritima_Epoca_idx" ON public.edadmaritima USING btree ("Epoca");


--
-- Name: edadmaritima_Era_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadmaritima_Era_idx" ON public.edadmaritima USING btree ("Era");


--
-- Name: edadmaritima_Material_Fechado_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadmaritima_Material_Fechado_idx" ON public.edadmaritima USING btree ("Material_Fechado");


--
-- Name: edadmaritima_Metodo_Fechado_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadmaritima_Metodo_Fechado_idx" ON public.edadmaritima USING btree ("Metodo_Fechado");


--
-- Name: edadmaritima_Periodo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "edadmaritima_Periodo_idx" ON public.edadmaritima USING btree ("Periodo");


--
-- Name: especies_id_Actividad_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Actividad_idx" ON public.especies USING btree ("id_Actividad");


--
-- Name: especies_id_Clase_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Clase_idx" ON public.especies USING btree ("id_Clase");


--
-- Name: especies_id_Dieta_A_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Dieta_A_idx" ON public.especies USING btree ("id_Dieta_A");


--
-- Name: especies_id_Dieta_B_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Dieta_B_idx" ON public.especies USING btree ("id_Dieta_B");


--
-- Name: especies_id_Familia_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Familia_idx" ON public.especies USING btree ("id_Familia");


--
-- Name: especies_id_Hab_Alim_A_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Hab_Alim_A_idx" ON public.especies USING btree ("id_Hab_Alim_A");


--
-- Name: especies_id_Hab_Alim_B_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Hab_Alim_B_idx" ON public.especies USING btree ("id_Hab_Alim_B");


--
-- Name: especies_id_Hab_Refugio_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Hab_Refugio_idx" ON public.especies USING btree ("id_Hab_Refugio");


--
-- Name: especies_id_Locomocion_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Locomocion_idx" ON public.especies USING btree ("id_Locomocion");


--
-- Name: especies_id_Orden_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Orden_idx" ON public.especies USING btree ("id_Orden");


--
-- Name: especies_id_Status_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "especies_id_Status_idx" ON public.especies USING btree ("id_Status");


--
-- Name: glaciacionescompleta_epoca_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX glaciacionescompleta_epoca_idx ON public.glaciacionescompleta USING btree (epoca);


--
-- Name: glaciacionescompleta_era_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX glaciacionescompleta_era_idx ON public.glaciacionescompleta USING btree (era);


--
-- Name: glaciacionescompleta_estadio_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX glaciacionescompleta_estadio_idx ON public.glaciacionescompleta USING btree (estadio);


--
-- Name: glaciacionescompleta_periodoGlacial_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "glaciacionescompleta_periodoGlacial_idx" ON public.glaciacionescompleta USING btree ("periodoGlacial");


--
-- Name: glaciacionescompleta_periodo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX glaciacionescompleta_periodo_idx ON public.glaciacionescompleta USING btree (periodo);


--
-- Name: glaciacionescompleta_region_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX glaciacionescompleta_region_idx ON public.glaciacionescompleta USING btree (region);


--
-- Name: hallazgo_id_ubicacion_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX hallazgo_id_ubicacion_idx ON public.hallazgo USING btree (id_ubicacion);


--
-- Name: materialescatalogo_id_Agente_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialescatalogo_id_Agente_idx" ON public.materialescatalogo USING btree ("id_Agente");


--
-- Name: materialescatalogo_id_Alojamiento_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialescatalogo_id_Alojamiento_idx" ON public.materialescatalogo USING btree ("id_Alojamiento");


--
-- Name: materialescatalogo_id_Contexto_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialescatalogo_id_Contexto_idx" ON public.materialescatalogo USING btree ("id_Contexto");


--
-- Name: materialescatalogo_id_Elemento_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialescatalogo_id_Elemento_idx" ON public.materialescatalogo USING btree ("id_Elemento");


--
-- Name: materialescatalogo_id_Especies_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialescatalogo_id_Especies_idx" ON public.materialescatalogo USING btree ("id_Especies");


--
-- Name: materialescatalogo_id_Interperismo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialescatalogo_id_Interperismo_idx" ON public.materialescatalogo USING btree ("id_Interperismo");


--
-- Name: materialescatalogo_id_Parte_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialescatalogo_id_Parte_idx" ON public.materialescatalogo USING btree ("id_Parte");


--
-- Name: materialescatalogo_id_lado_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX materialescatalogo_id_lado_idx ON public.materialescatalogo USING btree (id_lado);


--
-- Name: materialeslote_id_Alojamiento_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialeslote_id_Alojamiento_idx" ON public.materialeslote USING btree ("id_Alojamiento");


--
-- Name: materialeslote_id_Especies_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "materialeslote_id_Especies_idx" ON public.materialeslote USING btree ("id_Especies");


--
-- Name: meristica_id_MaterialesCatalogo_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "meristica_id_MaterialesCatalogo_idx" ON public.meristica USING btree ("id_MaterialesCatalogo");


--
-- Name: referenciabibliografica_id_Referencia_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "referenciabibliografica_id_Referencia_idx" ON public.referenciabibliografica USING btree ("id_Referencia");


--
-- Name: referenciabibliografica_id_Tipo_Referencia_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "referenciabibliografica_id_Tipo_Referencia_idx" ON public.referenciabibliografica USING btree ("id_Tipo_Referencia");


--
-- Name: sitio_id_Fuente_Altitud_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "sitio_id_Fuente_Altitud_idx" ON public.sitio USING btree ("id_Fuente_Altitud");


--
-- Name: sitio_id_Fuente_Coord_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "sitio_id_Fuente_Coord_idx" ON public.sitio USING btree ("id_Fuente_Coord");


--
-- Name: sitio_id_Precision_Coord_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "sitio_id_Precision_Coord_idx" ON public.sitio USING btree ("id_Precision_Coord");


--
-- Name: sitio_id_Ubicacion_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "sitio_id_Ubicacion_idx" ON public.sitio USING btree ("id_Ubicacion");


--
-- Name: ubicacion_Estado_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "ubicacion_Estado_idx" ON public.ubicacion USING btree ("Estado");


--
-- Name: ubicacion_Municipio_Provincia_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "ubicacion_Municipio_Provincia_idx" ON public.ubicacion USING btree ("Municipio_Provincia");


--
-- Name: ubicacion_Pais_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "ubicacion_Pais_idx" ON public.ubicacion USING btree ("Pais");


--
-- Name: ubicacion_Region_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "ubicacion_Region_idx" ON public.ubicacion USING btree ("Region");


--
-- Name: ubicacion_completa_Estado_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "ubicacion_completa_Estado_idx" ON public.ubicacion_completa USING btree ("Estado");


--
-- Name: ubicacion_completa_Municipio_Provincia_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "ubicacion_completa_Municipio_Provincia_idx" ON public.ubicacion_completa USING btree ("Municipio_Provincia");


--
-- Name: ubicacion_completa_Pais_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "ubicacion_completa_Pais_idx" ON public.ubicacion_completa USING btree ("Pais");


--
-- Name: unidadanalisis_Ambiente_Depositacion_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_Ambiente_Depositacion_idx" ON public.unidadanalisis USING btree ("Ambiente_Depositacion");


--
-- Name: unidadanalisis_Contaminacion_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_Contaminacion_idx" ON public.unidadanalisis USING btree ("Contaminacion");


--
-- Name: unidadanalisis_Facie_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_Facie_idx" ON public.unidadanalisis USING btree ("Facie");


--
-- Name: unidadanalisis_Formacion_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_Formacion_idx" ON public.unidadanalisis USING btree ("Formacion");


--
-- Name: unidadanalisis_Sistema_Depositacion_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_Sistema_Depositacion_idx" ON public.unidadanalisis USING btree ("Sistema_Depositacion");


--
-- Name: unidadanalisis_id_EdadContinental_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_id_EdadContinental_idx" ON public.unidadanalisis USING btree ("id_EdadContinental");


--
-- Name: unidadanalisis_id_EdadMaritima_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_id_EdadMaritima_idx" ON public.unidadanalisis USING btree ("id_EdadMaritima");


--
-- Name: unidadanalisis_id_Sitio_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadanalisis_id_Sitio_idx" ON public.unidadanalisis USING btree ("id_Sitio");


--
-- Name: unidadespecie_id_UnidadAnalisis_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "unidadespecie_id_UnidadAnalisis_idx" ON public.unidadespecie USING btree ("id_UnidadAnalisis");


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 