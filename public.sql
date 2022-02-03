/*
 Navicat Premium Data Transfer

 Source Server         : pai_baza
 Source Server Type    : PostgreSQL
 Source Server Version : 130005
 Source Host           : ec2-79-125-93-182.eu-west-1.compute.amazonaws.com:5432
 Source Catalog        : df61sm8a42f1gb
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 130005
 File Encoding         : 65001

 Date: 03/02/2022 00:31:35
*/


-- ----------------------------
-- Sequence structure for category_id_category_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."category_id_category_seq";
CREATE SEQUENCE "public"."category_id_category_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for question_answer_id_answer_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."question_answer_id_answer_seq";
CREATE SEQUENCE "public"."question_answer_id_answer_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for questions_id_question_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."questions_id_question_seq";
CREATE SEQUENCE "public"."questions_id_question_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for quizes_category_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."quizes_category_id_seq";
CREATE SEQUENCE "public"."quizes_category_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for quizes_id_quiz_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."quizes_id_quiz_seq";
CREATE SEQUENCE "public"."quizes_id_quiz_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for rooms_id_game_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."rooms_id_game_seq";
CREATE SEQUENCE "public"."rooms_id_game_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_autoicrement
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_autoicrement";
CREATE SEQUENCE "public"."users_autoicrement" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS "public"."categories";
CREATE TABLE "public"."categories" (
  "id_category" int4 NOT NULL DEFAULT nextval('category_id_category_seq'::regclass),
  "category_name" text COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO "public"."categories" VALUES (1, 'Ogólne');

-- ----------------------------
-- Table structure for question_answers
-- ----------------------------
DROP TABLE IF EXISTS "public"."question_answers";
CREATE TABLE "public"."question_answers" (
  "id_answer" int4 NOT NULL DEFAULT nextval('question_answer_id_answer_seq'::regclass),
  "content" text COLLATE "pg_catalog"."default" NOT NULL,
  "id_question" int4 NOT NULL,
  "is_true" bool NOT NULL
)
;

-- ----------------------------
-- Records of question_answers
-- ----------------------------
INSERT INTO "public"."question_answers" VALUES (2, 'kot', 1, 't');
INSERT INTO "public"."question_answers" VALUES (3, 'pies', 1, 'f');
INSERT INTO "public"."question_answers" VALUES (4, 'orka', 1, 'f');
INSERT INTO "public"."question_answers" VALUES (5, 'żyrafa', 1, 'f');
INSERT INTO "public"."question_answers" VALUES (6, 'ork', 2, 't');
INSERT INTO "public"."question_answers" VALUES (8, 'gargamel', 2, 'f');
INSERT INTO "public"."question_answers" VALUES (9, 'piesek', 2, 'f');
INSERT INTO "public"."question_answers" VALUES (10, 'kotek', 2, 'f');
INSERT INTO "public"."question_answers" VALUES (23, '$x', 10, 'f');
INSERT INTO "public"."question_answers" VALUES (24, '$y', 10, 'f');
INSERT INTO "public"."question_answers" VALUES (25, '$z', 10, 'f');
INSERT INTO "public"."question_answers" VALUES (26, '$_POST', 10, 't');
INSERT INTO "public"."question_answers" VALUES (27, 'wyswietla zawartosc zmiennej globalnej', 11, 'f');
INSERT INTO "public"."question_answers" VALUES (28, 'czyści string z pustych znaków', 11, 'f');
INSERT INTO "public"."question_answers" VALUES (29, 'wyświetla zawartość zmiennej', 11, 't');
INSERT INTO "public"."question_answers" VALUES (30, 'nic nie robi', 11, 'f');
INSERT INTO "public"."question_answers" VALUES (31, 'new klasa()', 12, 't');
INSERT INTO "public"."question_answers" VALUES (32, 'klasa()', 12, 'f');
INSERT INTO "public"."question_answers" VALUES (33, 'create klasa()', 12, 'f');
INSERT INTO "public"."question_answers" VALUES (34, 'del klasa()', 12, 'f');
INSERT INTO "public"."question_answers" VALUES (47, 'odp a', 16, 't');
INSERT INTO "public"."question_answers" VALUES (48, 'odp b', 16, 'f');
INSERT INTO "public"."question_answers" VALUES (49, 'odp c', 16, 'f');
INSERT INTO "public"."question_answers" VALUES (50, 'odp d', 16, 'f');
INSERT INTO "public"."question_answers" VALUES (51, 'odp a', 17, 't');
INSERT INTO "public"."question_answers" VALUES (52, 'odp b', 17, 'f');
INSERT INTO "public"."question_answers" VALUES (53, 'odp c', 17, 'f');
INSERT INTO "public"."question_answers" VALUES (54, 'odp d', 17, 'f');
INSERT INTO "public"."question_answers" VALUES (80, 'Die', 49, 't');
INSERT INTO "public"."question_answers" VALUES (81, 'Das', 49, 'f');
INSERT INTO "public"."question_answers" VALUES (82, 'Der', 49, 'f');
INSERT INTO "public"."question_answers" VALUES (83, 'The', 49, 'f');
INSERT INTO "public"."question_answers" VALUES (84, 'Madonna', 50, 'f');
INSERT INTO "public"."question_answers" VALUES (85, 'Metallica', 50, 'f');
INSERT INTO "public"."question_answers" VALUES (86, 'AD/DC', 50, 'f');
INSERT INTO "public"."question_answers" VALUES (87, 'Nirvana', 50, 't');
INSERT INTO "public"."question_answers" VALUES (88, 'The fat of the land', 51, 'f');
INSERT INTO "public"."question_answers" VALUES (89, 'Prodigy', 51, 't');
INSERT INTO "public"."question_answers" VALUES (90, 'Music for gilted genration', 51, 'f');
INSERT INTO "public"."question_answers" VALUES (91, 'House of Zef', 51, 'f');

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS "public"."questions";
CREATE TABLE "public"."questions" (
  "id_question" int4 NOT NULL DEFAULT nextval('questions_id_question_seq'::regclass),
  "content" text COLLATE "pg_catalog"."default" NOT NULL,
  "id_quiz" int4 NOT NULL,
  "quiz_order" int2 NOT NULL
)
;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO "public"."questions" VALUES (2, 'Co to za zwierze', 1, 1);
INSERT INTO "public"."questions" VALUES (1, 'Jakie to zwierze', 1, 2);
INSERT INTO "public"."questions" VALUES (11, 'Co robi funkcja echo?', 9, 1);
INSERT INTO "public"."questions" VALUES (12, 'Jak poprawnie utworzyć obiekt klasy?', 9, 2);
INSERT INTO "public"."questions" VALUES (16, 'Pytanie testowe 1', 11, 0);
INSERT INTO "public"."questions" VALUES (17, 'pytanie testowe 2', 11, 1);
INSERT INTO "public"."questions" VALUES (49, 'Dokończ nazwę zespołu: .. Antwoord', 44, 0);
INSERT INTO "public"."questions" VALUES (50, 'Jaki zespół nagrał piosnke Come as you are', 44, 1);
INSERT INTO "public"."questions" VALUES (51, 'Jak nazywa się pierwsza płyta zespołu The Prodigy', 44, 2);
INSERT INTO "public"."questions" VALUES (10, 'Jaka zmienna jest globalna', 9, 0);

-- ----------------------------
-- Table structure for quizes
-- ----------------------------
DROP TABLE IF EXISTS "public"."quizes";
CREATE TABLE "public"."quizes" (
  "id_quiz" int4 NOT NULL DEFAULT nextval('quizes_id_quiz_seq'::regclass),
  "name" text COLLATE "pg_catalog"."default" NOT NULL,
  "id_user" int4 NOT NULL,
  "quiz_description" text COLLATE "pg_catalog"."default" NOT NULL,
  "category_id" int4 NOT NULL DEFAULT nextval('quizes_category_id_seq'::regclass)
)
;

-- ----------------------------
-- Records of quizes
-- ----------------------------
INSERT INTO "public"."quizes" VALUES (1, 'Quiz o zwierzetach', 2, 'Krótki quiz sprawdzajacy twoja wiedze na temat zwierzat', 1);
INSERT INTO "public"."quizes" VALUES (9, 'Wiedza z php', 2, 'opis musi byc', 1);
INSERT INTO "public"."quizes" VALUES (11, 'Testowy quiz 2', 2, 'opis musi byc', 1);
INSERT INTO "public"."quizes" VALUES (44, 'Quiz muzyczny', 9, 'opis musi byc', 1);

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS "public"."rooms";
CREATE TABLE "public"."rooms" (
  "id_room" int4 NOT NULL DEFAULT nextval('rooms_id_game_seq'::regclass),
  "id_user" int4 NOT NULL,
  "id_quiz" int4 NOT NULL,
  "room_name" text COLLATE "pg_catalog"."default" NOT NULL,
  "room_code" varchar(10) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO "public"."rooms" VALUES (3, 2, 9, 'Testowy pokój :D', '629506');
INSERT INTO "public"."rooms" VALUES (4, 2, 9, 'Testowy pokój 2', '716602');
INSERT INTO "public"."rooms" VALUES (5, 9, 44, 'Quiz muzyczny :D', '540678');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL DEFAULT nextval('users_autoicrement'::regclass),
  "username" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" varchar(255) COLLATE "pg_catalog"."default" DEFAULT nextval('users_autoicrement'::regclass),
  "image_src" varchar(100) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (9, 'matinosal', '2581f00645d0f9ac22e5b75dc1cc2c96', 'a@test.pl', 'witam opis taki o się tutaj pokazuje', 'eleiko.jpg');
INSERT INTO "public"."users" VALUES (2, 'test', 'testp', 'test', 'Siema siema✌😂😂😂😂😂
✌😂😂😂😂😂', 'eleiko.jpg');
INSERT INTO "public"."users" VALUES (1, 'test', 'test', 'test@testowy', 'test', 'eleiko.jpg');
INSERT INTO "public"."users" VALUES (7, 'test123', 'sdasdasdasda', 'test@testowy.pl', '', 'eleiko.jpg');
INSERT INTO "public"."users" VALUES (8, 'test123', 'sdasdasdasda', 'test@testowy.pl', 'elo elo ballada', 'eleiko.jpg');
INSERT INTO "public"."users" VALUES (6, 'asdasd', 'asdasd', 'asda@asdasd.pl', 'opsi musi byc', 'eleiko.jpg');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."category_id_category_seq"
OWNED BY "public"."categories"."id_category";
SELECT setval('"public"."category_id_category_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."question_answer_id_answer_seq"
OWNED BY "public"."question_answers"."id_answer";
SELECT setval('"public"."question_answer_id_answer_seq"', 92, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."questions_id_question_seq"
OWNED BY "public"."questions"."id_question";
SELECT setval('"public"."questions_id_question_seq"', 52, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."quizes_category_id_seq"
OWNED BY "public"."quizes"."category_id";
SELECT setval('"public"."quizes_category_id_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."quizes_id_quiz_seq"
OWNED BY "public"."quizes"."id_quiz";
SELECT setval('"public"."quizes_id_quiz_seq"', 45, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."rooms_id_game_seq"
OWNED BY "public"."rooms"."id_room";
SELECT setval('"public"."rooms_id_game_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_autoicrement"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_autoicrement"', 10, true);

-- ----------------------------
-- Primary Key structure for table categories
-- ----------------------------
ALTER TABLE "public"."categories" ADD CONSTRAINT "category_pkey" PRIMARY KEY ("id_category");

-- ----------------------------
-- Primary Key structure for table question_answers
-- ----------------------------
ALTER TABLE "public"."question_answers" ADD CONSTRAINT "question_answer_pkey" PRIMARY KEY ("id_answer");

-- ----------------------------
-- Primary Key structure for table questions
-- ----------------------------
ALTER TABLE "public"."questions" ADD CONSTRAINT "questions_pkey" PRIMARY KEY ("id_question");

-- ----------------------------
-- Primary Key structure for table quizes
-- ----------------------------
ALTER TABLE "public"."quizes" ADD CONSTRAINT "quizes_pkey" PRIMARY KEY ("id_quiz");

-- ----------------------------
-- Primary Key structure for table rooms
-- ----------------------------
ALTER TABLE "public"."rooms" ADD CONSTRAINT "rooms_pkey" PRIMARY KEY ("id_room");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table question_answers
-- ----------------------------
ALTER TABLE "public"."question_answers" ADD CONSTRAINT "answer-question" FOREIGN KEY ("id_question") REFERENCES "public"."questions" ("id_question") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table questions
-- ----------------------------
ALTER TABLE "public"."questions" ADD CONSTRAINT "question-quiz" FOREIGN KEY ("id_quiz") REFERENCES "public"."quizes" ("id_quiz") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table quizes
-- ----------------------------
ALTER TABLE "public"."quizes" ADD CONSTRAINT "category-quiz" FOREIGN KEY ("category_id") REFERENCES "public"."categories" ("id_category") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."quizes" ADD CONSTRAINT "user-quiz" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table rooms
-- ----------------------------
ALTER TABLE "public"."rooms" ADD CONSTRAINT "quiz-room" FOREIGN KEY ("id_quiz") REFERENCES "public"."quizes" ("id_quiz") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."rooms" ADD CONSTRAINT "user-room" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
