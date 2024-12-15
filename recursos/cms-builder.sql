-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2024 a las 20:37:27
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cms-builder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `rol_admin` text DEFAULT NULL,
  `permissions_admin` text DEFAULT NULL,
  `email_admin` text DEFAULT NULL,
  `password_admin` text DEFAULT NULL,
  `token_admin` text DEFAULT NULL,
  `token_exp_admin` text DEFAULT NULL,
  `status_admin` int(11) DEFAULT 1,
  `title_admin` text DEFAULT NULL,
  `symbol_admin` text DEFAULT NULL,
  `font_admin` text DEFAULT NULL,
  `color_admin` text DEFAULT NULL,
  `back_admin` text DEFAULT NULL,
  `date_created_admin` date DEFAULT NULL,
  `date_updated_admin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `rol_admin`, `permissions_admin`, `email_admin`, `password_admin`, `token_admin`, `token_exp_admin`, `status_admin`, `title_admin`, `symbol_admin`, `font_admin`, `color_admin`, `back_admin`, `date_created_admin`, `date_updated_admin`) VALUES
(1, 'superadmin', '{\"todo\":\"on\"}', 'admin@dashboard.com', '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MzA0ODUxMzUsImV4cCI6MTczMDU3MTUzNSwiZGF0YSI6eyJpZCI6IjEiLCJlbWFpbCI6ImFkbWluQGRhc2hib2FyZC5jb20ifX0.Yn9Kt3H4xyUt0AIrbg4dlvPJQpZipIF6yTXbJFqMmB4', '1730571535', 1, 'Dashboard', '<i class=\"bi bi-back\"></i>', '<link href=\"https://fonts.googleapis.com/css2?family=IBM Plex Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap\" rel=\"stylesheet\">', '#7b2d8b', 'https://res.cloudinary.com/dv7wctcfp/image/upload/v1729259072/cpbcn6gktr77blskss3v.jpg', '2024-10-18', '2024-11-01 18:18:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `columns`
--

CREATE TABLE `columns` (
  `id_column` int(11) NOT NULL,
  `id_module_column` int(11) DEFAULT 0,
  `title_column` text DEFAULT NULL,
  `alias_column` text DEFAULT NULL,
  `type_column` text DEFAULT NULL,
  `matrix_column` text DEFAULT NULL,
  `visible_column` int(11) DEFAULT 1,
  `date_created_column` date DEFAULT NULL,
  `date_updated_column` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `columns`
--

INSERT INTO `columns` (`id_column`, `id_module_column`, `title_column`, `alias_column`, `type_column`, `matrix_column`, `visible_column`, `date_created_column`, `date_updated_column`) VALUES
(1, 2, 'rol_admin', 'rol', 'select', 'superadmin,admin,editor', 1, '2024-10-18', '2024-11-01 18:16:16'),
(2, 2, 'permissions_admin', 'permisos', 'object', '', 1, '2024-10-18', '2024-10-18 17:09:28'),
(3, 2, 'email_admin', 'email', 'text', '', 1, '2024-10-18', '2024-10-18 17:09:29'),
(4, 2, 'password_admin', 'pass', 'password', '', 0, '2024-10-18', '2024-11-01 17:41:24'),
(5, 2, 'token_admin', 'token', 'text', '', 0, '2024-10-18', '2024-10-18 17:09:29'),
(6, 2, 'token_exp_admin', 'expiración', 'text', '', 0, '2024-10-18', '2024-10-18 17:09:29'),
(7, 2, 'status_admin', 'estado', 'boolean', '', 1, '2024-10-18', '2024-10-18 17:09:29'),
(8, 2, 'title_admin', 'título', 'text', '', 0, '2024-10-18', '2024-10-18 17:09:29'),
(9, 2, 'symbol_admin', 'simbolo', 'text', '', 0, '2024-10-18', '2024-10-18 17:09:30'),
(10, 2, 'font_admin', 'tipografía', 'text', '', 0, '2024-10-18', '2024-10-18 17:09:30'),
(11, 2, 'color_admin', 'color', 'text', '', 0, '2024-10-18', '2024-10-18 17:09:30'),
(12, 2, 'back_admin', 'fondo', 'text', '', 0, '2024-10-18', '2024-10-18 17:09:30'),
(21, 14, 'text_example', 'Texto', 'text', NULL, 1, '2024-10-29', '2024-10-29 21:16:19'),
(22, 14, 'textarea_example', 'Area Texto', 'textarea', NULL, 1, '2024-10-29', '2024-10-29 21:16:19'),
(23, 14, 'int_example', 'Número Entero', 'int', NULL, 1, '2024-10-29', '2024-10-29 21:16:19'),
(24, 14, 'double_example', 'Número Decimal', 'money', NULL, 1, '2024-10-29', '2024-10-31 20:12:06'),
(25, 14, 'image_example', 'Imagen', 'image', NULL, 1, '2024-10-29', '2024-10-29 21:16:20'),
(26, 14, 'video_example', 'Video', 'video', NULL, 1, '2024-10-29', '2024-10-29 21:16:20'),
(27, 14, 'file_example', 'Archivo', 'file', NULL, 1, '2024-10-29', '2024-10-29 21:16:20'),
(28, 14, 'boolean_example', 'Boleano', 'boolean', NULL, 1, '2024-10-29', '2024-10-29 21:16:21'),
(29, 14, 'select_example', 'Selección', 'select', 'lorem,ipsum,site,amet', 1, '2024-10-29', '2024-10-30 18:14:05'),
(30, 14, 'array_example', 'Arreglo', 'array', NULL, 1, '2024-10-29', '2024-10-29 21:16:21'),
(31, 14, 'object_example', 'Objecto', 'object', NULL, 1, '2024-10-29', '2024-10-29 21:16:22'),
(32, 14, 'json_example', 'JSON', 'json', NULL, 0, '2024-10-29', '2024-10-31 18:19:15'),
(33, 14, 'date_example', 'Fecha', 'date', NULL, 1, '2024-10-29', '2024-10-29 21:16:22'),
(34, 14, 'time_example', 'Hora', 'time', NULL, 1, '2024-10-29', '2024-10-29 21:16:23'),
(35, 14, 'datetime_example', 'Fecha y Hora', 'datetime', NULL, 1, '2024-10-29', '2024-10-29 21:16:23'),
(37, 14, 'code_example', 'Código', 'code', NULL, 0, '2024-10-29', '2024-10-31 18:19:16'),
(38, 14, 'link_example', 'Enlace', 'link', NULL, 1, '2024-10-29', '2024-10-29 21:16:24'),
(39, 14, 'color_example', 'Color', 'color', NULL, 1, '2024-10-30', '2024-10-30 21:19:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exampless`
--

CREATE TABLE `exampless` (
  `id_example` int(11) NOT NULL,
  `text_example` text DEFAULT NULL,
  `textarea_example` text DEFAULT NULL,
  `int_example` int(11) DEFAULT 0,
  `double_example` double DEFAULT 0,
  `image_example` text DEFAULT NULL,
  `video_example` text DEFAULT NULL,
  `file_example` text DEFAULT NULL,
  `boolean_example` int(11) DEFAULT 1,
  `select_example` text DEFAULT NULL,
  `array_example` text DEFAULT NULL,
  `object_example` text DEFAULT '{}',
  `json_example` text DEFAULT '[]',
  `date_example` date DEFAULT NULL,
  `time_example` time DEFAULT NULL,
  `datetime_example` datetime DEFAULT NULL,
  `code_example` longtext DEFAULT NULL,
  `link_example` text DEFAULT NULL,
  `color_example` text DEFAULT NULL,
  `date_created_example` date DEFAULT NULL,
  `date_updated_example` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `exampless`
--

INSERT INTO `exampless` (`id_example`, `text_example`, `textarea_example`, `int_example`, `double_example`, `image_example`, `video_example`, `file_example`, `boolean_example`, `select_example`, `array_example`, `object_example`, `json_example`, `date_example`, `time_example`, `datetime_example`, `code_example`, `link_example`, `color_example`, `date_created_example`, `date_updated_example`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Etiam convallis est eu erat sagittis, quis pharetra odio venenatis. Suspendisse id euismod massa. Donec venenatis dignissim mauris, a euismod nisl semper in. Donec varius pretium neque sed efficitur. Suspendisse ut molestie lacus, eu molestie elit. Quisque non maximus elit. Maecenas pretium quam vitae ligula mollis iaculis ac vel ipsum.', 54321, 100.5, 'https://tutorialesatualcance.s3.us-east-2.amazonaws.com/66f5d586bdf2b34.jpg', 'https://tutorialesatualcance.s3.us-east-2.amazonaws.com/66b388a31e85855.mp4', 'https://fms.tutorialesatualcance.com/views/assets/files/6722b128e7c0724.pdf', 1, 'ipsum', 'lorem,ipsum,amet', '{\"prop1\":\"val1\",\"prop2\":\"val2\",\"prop3\":\"val3\"}', '[{\"prop1\":\"val1\",\"prop2\":\"val2\",\"prop3\":\"val3\"},{\"prop1\":\"val1\",\"prop2\":\"val2\",\"prop3\":\"val3\"}]', '2026-05-28', '00:00:13', '2024-10-31 12:03:00', '<title>Bootstrap 5 Website Example</title>\r\n  <meta charset=\"utf-8\">\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n  <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">\r\n  <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>\r\n  <style>\r\n  .fakeimg {\r\n    height: 200px;\r\n    background: #aaa;\r\n  }\r\n  </style>\r\n\r\n\r\n\r\n<div class=\"p-5 bg-primary text-white text-center\">\r\n  <h1>My First Bootstrap 5 Page</h1>\r\n  <p>Resize this responsive page to see the effect!</p> \r\n</div>\r\n\r\n<nav class=\"navbar navbar-expand-sm bg-dark navbar-dark\">\r\n  <div class=\"container-fluid\">\r\n    <ul class=\"navbar-nav\">\r\n      <li class=\"nav-item\">\r\n        <a class=\"nav-link active\" href=\"#\">Active</a>\r\n      </li>\r\n      <li class=\"nav-item\">\r\n        <a class=\"nav-link\" href=\"#\">Link</a>\r\n      </li>\r\n      <li class=\"nav-item\">\r\n        <a class=\"nav-link\" href=\"#\">Link</a>\r\n      </li>\r\n      <li class=\"nav-item\">\r\n        <a class=\"nav-link disabled\" href=\"#\">Disabled</a>\r\n      </li>\r\n    </ul>\r\n  </div>\r\n</nav>\r\n\r\n<div class=\"container mt-5\">\r\n  <div class=\"row\">\r\n    <div class=\"col-sm-4\">\r\n      <h2>About Me</h2>\r\n      <h5>Photo of me:</h5>\r\n      <div class=\"fakeimg\">Fake Image</div>\r\n      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>\r\n      <h3 class=\"mt-4\">Some Links</h3>\r\n      <p>Lorem ipsum dolor sit ame.</p>\r\n      <ul class=\"nav nav-pills flex-column\">\r\n        <li class=\"nav-item\">\r\n          <a class=\"nav-link active\" href=\"#\">Active</a>\r\n        </li>\r\n        <li class=\"nav-item\">\r\n          <a class=\"nav-link\" href=\"#\">Link</a>\r\n        </li>\r\n        <li class=\"nav-item\">\r\n          <a class=\"nav-link\" href=\"#\">Link</a>\r\n        </li>\r\n        <li class=\"nav-item\">\r\n          <a class=\"nav-link disabled\" href=\"#\">Disabled</a>\r\n        </li>\r\n      </ul>\r\n      <hr class=\"d-sm-none\">\r\n    </div>\r\n    <div class=\"col-sm-8\">\r\n      <h2>TITLE HEADING</h2>\r\n      <h5>Title description, Dec 7, 2020</h5>\r\n      <div class=\"fakeimg\">Fake Image</div>\r\n      <p>Some text..</p>\r\n      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>\r\n\r\n      <h2 class=\"mt-5\">TITLE HEADING</h2>\r\n      <h5>Title description, Sep 2, 2020</h5>\r\n      <div class=\"fakeimg\">Fake Image</div>\r\n      <p>Some text..</p>\r\n      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n<div class=\"mt-5 p-4 bg-dark text-white text-center\">\r\n  <p>Footer</p>\r\n</div>', 'https://tutorialesatualcance.com', '#00c8f0', '2024-10-31', '2024-10-31 21:19:58'),
(2, 'Lorem+ipsum+dolor+sit+amet', 'Etiam+convallis+est+eu+erat+sagittis%2C+quis+pharetra+odio+venenatis.+Suspendisse+id+euismod+massa.+Donec+venenatis+dignissim+mauris%2C+a+euismod+nisl+semper+in.+Donec+varius+pretium+neque+sed+efficitur.+Suspendisse+ut+molestie+lacus%2C+eu+molestie+elit.+Quisque+non+maximus+elit.+Maecenas+pretium+quam+vitae+ligula+mollis+iaculis+ac+vel+ipsum.', 54321, 100.5, 'https%3A%2F%2Ftutorialesatualcance.s3.us-east-2.amazonaws.com%2F66f5d586bdf2b34.jpg', 'https%3A%2F%2Ftutorialesatualcance.s3.us-east-2.amazonaws.com%2F66b388a31e85855.mp4', 'https%3A%2F%2Ffms.tutorialesatualcance.com%2Fviews%2Fassets%2Ffiles%2F6722b128e7c0724.pdf', 1, 'ipsum', 'lorem%2Cipsum%2Camet', '%7B%22prop1%22%3A%22val1%22%2C%22prop2%22%3A%22val2%22%2C%22prop3%22%3A%22val3%22%7D', '%5B%7B%22prop1%22%3A%22val1%22%2C%22prop2%22%3A%22val2%22%2C%22prop3%22%3A%22val3%22%7D%2C%7B%22prop1%22%3A%22val1%22%2C%22prop2%22%3A%22val2%22%2C%22prop3%22%3A%22val3%22%7D%5D', '2026-05-28', '00:00:00', '2024-10-31 12:03:00', '%3Ctitle%3EBootstrap+5+Website+Example%3C%2Ftitle%3E%0D%0A++%3Cmeta+charset%3D%22utf-8%22%3E%0D%0A++%3Cmeta+name%3D%22viewport%22+content%3D%22width%3Ddevice-width%2C+initial-scale%3D1%22%3E%0D%0A++%3Clink+href%3D%22https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2Fbootstrap%405.3.3%2Fdist%2Fcss%2Fbootstrap.min.css%22+rel%3D%22stylesheet%22%3E%0D%0A++%3Cscript+src%3D%22https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2Fbootstrap%405.3.3%2Fdist%2Fjs%2Fbootstrap.bundle.min.js%22%3E%3C%2Fscript%3E%0D%0A++%3Cstyle%3E%0D%0A++.fakeimg+%7B%0D%0A++++height%3A+200px%3B%0D%0A++++background%3A+%23aaa%3B%0D%0A++%7D%0D%0A++%3C%2Fstyle%3E%0D%0A%0D%0A%0D%0A%0D%0A%3Cdiv+class%3D%22p-5+bg-primary+text-white+text-center%22%3E%0D%0A++%3Ch1%3EMy+First+Bootstrap+5+Page%3C%2Fh1%3E%0D%0A++%3Cp%3EResize+this+responsive+page+to+see+the+effect%21%3C%2Fp%3E+%0D%0A%3C%2Fdiv%3E%0D%0A%0D%0A%3Cnav+class%3D%22navbar+navbar-expand-sm+bg-dark+navbar-dark%22%3E%0D%0A++%3Cdiv+class%3D%22container-fluid%22%3E%0D%0A++++%3Cul+class%3D%22navbar-nav%22%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link+active%22+href%3D%22%23%22%3EActive%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link+disabled%22+href%3D%22%23%22%3EDisabled%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++%3C%2Ful%3E%0D%0A++%3C%2Fdiv%3E%0D%0A%3C%2Fnav%3E%0D%0A%0D%0A%3Cdiv+class%3D%22container+mt-5%22%3E%0D%0A++%3Cdiv+class%3D%22row%22%3E%0D%0A++++%3Cdiv+class%3D%22col-sm-4%22%3E%0D%0A++++++%3Ch2%3EAbout+Me%3C%2Fh2%3E%0D%0A++++++%3Ch5%3EPhoto+of+me%3A%3C%2Fh5%3E%0D%0A++++++%3Cdiv+class%3D%22fakeimg%22%3EFake+Image%3C%2Fdiv%3E%0D%0A++++++%3Cp%3ESome+text+about+me+in+culpa+qui+officia+deserunt+mollit+anim..%3C%2Fp%3E%0D%0A++++++%3Ch3+class%3D%22mt-4%22%3ESome+Links%3C%2Fh3%3E%0D%0A++++++%3Cp%3ELorem+ipsum+dolor+sit+ame.%3C%2Fp%3E%0D%0A++++++%3Cul+class%3D%22nav+nav-pills+flex-column%22%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link+active%22+href%3D%22%23%22%3EActive%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link+disabled%22+href%3D%22%23%22%3EDisabled%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++%3C%2Ful%3E%0D%0A++++++%3Chr+class%3D%22d-sm-none%22%3E%0D%0A++++%3C%2Fdiv%3E%0D%0A++++%3Cdiv+class%3D%22col-sm-8%22%3E%0D%0A++++++%3Ch2%3ETITLE+HEADING%3C%2Fh2%3E%0D%0A++++++%3Ch5%3ETitle+description%2C+Dec+7%2C+2020%3C%2Fh5%3E%0D%0A++++++%3Cdiv+class%3D%22fakeimg%22%3EFake+Image%3C%2Fdiv%3E%0D%0A++++++%3Cp%3ESome+text..%3C%2Fp%3E%0D%0A++++++%3Cp%3ESunt+in+culpa+qui+officia+deserunt+mollit+anim+id+est+laborum+consectetur+adipiscing+elit%2C+sed+do+eiusmod+tempor+incididunt+ut+labore+et+dolore+magna+aliqua.+Ut+enim+ad+minim+veniam%2C+quis+nostrud+exercitation+ullamco.%3C%2Fp%3E%0D%0A%0D%0A++++++%3Ch2+class%3D%22mt-5%22%3ETITLE+HEADING%3C%2Fh2%3E%0D%0A++++++%3Ch5%3ETitle+description%2C+Sep+2%2C+2020%3C%2Fh5%3E%0D%0A++++++%3Cdiv+class%3D%22fakeimg%22%3EFake+Image%3C%2Fdiv%3E%0D%0A++++++%3Cp%3ESome+text..%3C%2Fp%3E%0D%0A++++++%3Cp%3ESunt+in+culpa+qui+officia+deserunt+mollit+anim+id+est+laborum+consectetur+adipiscing+elit%2C+sed+do+eiusmod+tempor+incididunt+ut+labore+et+dolore+magna+aliqua.+Ut+enim+ad+minim+veniam%2C+quis+nostrud+exercitation+ullamco.%3C%2Fp%3E%0D%0A++++%3C%2Fdiv%3E%0D%0A++%3C%2Fdiv%3E%0D%0A%3C%2Fdiv%3E%0D%0A%0D%0A%3Cdiv+class%3D%22mt-5+p-4+bg-dark+text-white+text-center%22%3E%0D%0A++%3Cp%3EFooter%3C%2Fp%3E%0D%0A%3C%2Fdiv%3E', 'https%3A%2F%2Ftutorialesatualcance.com', '%2300c8f0', '2024-10-31', '2024-10-31 21:25:41'),
(3, 'Lorem+ipsum+dolor+sit+amet', 'Etiam+convallis+est+eu+erat+sagittis%2C+quis+pharetra+odio+venenatis.+Suspendisse+id+euismod+massa.+Donec+venenatis+dignissim+mauris%2C+a+euismod+nisl+semper+in.+Donec+varius+pretium+neque+sed+efficitur.+Suspendisse+ut+molestie+lacus%2C+eu+molestie+elit.+Quisque+non+maximus+elit.+Maecenas+pretium+quam+vitae+ligula+mollis+iaculis+ac+vel+ipsum.', 54321, 100.5, 'https%3A%2F%2Ftutorialesatualcance.s3.us-east-2.amazonaws.com%2F66f5d586bdf2b34.jpg', 'https%3A%2F%2Ftutorialesatualcance.s3.us-east-2.amazonaws.com%2F66b388a31e85855.mp4', 'https%3A%2F%2Ffms.tutorialesatualcance.com%2Fviews%2Fassets%2Ffiles%2F6722b128e7c0724.pdf', 1, 'ipsum', 'lorem%2Cipsum%2Camet', '%7B%22prop1%22%3A%22val1%22%2C%22prop2%22%3A%22val2%22%2C%22prop3%22%3A%22val3%22%7D', '%5B%7B%22prop1%22%3A%22val1%22%2C%22prop2%22%3A%22val2%22%2C%22prop3%22%3A%22val3%22%7D%2C%7B%22prop1%22%3A%22val1%22%2C%22prop2%22%3A%22val2%22%2C%22prop3%22%3A%22val3%22%7D%5D', '2026-05-28', '00:00:00', '2024-10-31 12:03:00', '%3Ctitle%3EBootstrap+5+Website+Example%3C%2Ftitle%3E%0D%0A++%3Cmeta+charset%3D%22utf-8%22%3E%0D%0A++%3Cmeta+name%3D%22viewport%22+content%3D%22width%3Ddevice-width%2C+initial-scale%3D1%22%3E%0D%0A++%3Clink+href%3D%22https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2Fbootstrap%405.3.3%2Fdist%2Fcss%2Fbootstrap.min.css%22+rel%3D%22stylesheet%22%3E%0D%0A++%3Cscript+src%3D%22https%3A%2F%2Fcdn.jsdelivr.net%2Fnpm%2Fbootstrap%405.3.3%2Fdist%2Fjs%2Fbootstrap.bundle.min.js%22%3E%3C%2Fscript%3E%0D%0A++%3Cstyle%3E%0D%0A++.fakeimg+%7B%0D%0A++++height%3A+200px%3B%0D%0A++++background%3A+%23aaa%3B%0D%0A++%7D%0D%0A++%3C%2Fstyle%3E%0D%0A%0D%0A%0D%0A%0D%0A%3Cdiv+class%3D%22p-5+bg-primary+text-white+text-center%22%3E%0D%0A++%3Ch1%3EMy+First+Bootstrap+5+Page%3C%2Fh1%3E%0D%0A++%3Cp%3EResize+this+responsive+page+to+see+the+effect%21%3C%2Fp%3E+%0D%0A%3C%2Fdiv%3E%0D%0A%0D%0A%3Cnav+class%3D%22navbar+navbar-expand-sm+bg-dark+navbar-dark%22%3E%0D%0A++%3Cdiv+class%3D%22container-fluid%22%3E%0D%0A++++%3Cul+class%3D%22navbar-nav%22%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link+active%22+href%3D%22%23%22%3EActive%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++%3Ca+class%3D%22nav-link+disabled%22+href%3D%22%23%22%3EDisabled%3C%2Fa%3E%0D%0A++++++%3C%2Fli%3E%0D%0A++++%3C%2Ful%3E%0D%0A++%3C%2Fdiv%3E%0D%0A%3C%2Fnav%3E%0D%0A%0D%0A%3Cdiv+class%3D%22container+mt-5%22%3E%0D%0A++%3Cdiv+class%3D%22row%22%3E%0D%0A++++%3Cdiv+class%3D%22col-sm-4%22%3E%0D%0A++++++%3Ch2%3EAbout+Me%3C%2Fh2%3E%0D%0A++++++%3Ch5%3EPhoto+of+me%3A%3C%2Fh5%3E%0D%0A++++++%3Cdiv+class%3D%22fakeimg%22%3EFake+Image%3C%2Fdiv%3E%0D%0A++++++%3Cp%3ESome+text+about+me+in+culpa+qui+officia+deserunt+mollit+anim..%3C%2Fp%3E%0D%0A++++++%3Ch3+class%3D%22mt-4%22%3ESome+Links%3C%2Fh3%3E%0D%0A++++++%3Cp%3ELorem+ipsum+dolor+sit+ame.%3C%2Fp%3E%0D%0A++++++%3Cul+class%3D%22nav+nav-pills+flex-column%22%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link+active%22+href%3D%22%23%22%3EActive%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link%22+href%3D%22%23%22%3ELink%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++++%3Cli+class%3D%22nav-item%22%3E%0D%0A++++++++++%3Ca+class%3D%22nav-link+disabled%22+href%3D%22%23%22%3EDisabled%3C%2Fa%3E%0D%0A++++++++%3C%2Fli%3E%0D%0A++++++%3C%2Ful%3E%0D%0A++++++%3Chr+class%3D%22d-sm-none%22%3E%0D%0A++++%3C%2Fdiv%3E%0D%0A++++%3Cdiv+class%3D%22col-sm-8%22%3E%0D%0A++++++%3Ch2%3ETITLE+HEADING%3C%2Fh2%3E%0D%0A++++++%3Ch5%3ETitle+description%2C+Dec+7%2C+2020%3C%2Fh5%3E%0D%0A++++++%3Cdiv+class%3D%22fakeimg%22%3EFake+Image%3C%2Fdiv%3E%0D%0A++++++%3Cp%3ESome+text..%3C%2Fp%3E%0D%0A++++++%3Cp%3ESunt+in+culpa+qui+officia+deserunt+mollit+anim+id+est+laborum+consectetur+adipiscing+elit%2C+sed+do+eiusmod+tempor+incididunt+ut+labore+et+dolore+magna+aliqua.+Ut+enim+ad+minim+veniam%2C+quis+nostrud+exercitation+ullamco.%3C%2Fp%3E%0D%0A%0D%0A++++++%3Ch2+class%3D%22mt-5%22%3ETITLE+HEADING%3C%2Fh2%3E%0D%0A++++++%3Ch5%3ETitle+description%2C+Sep+2%2C+2020%3C%2Fh5%3E%0D%0A++++++%3Cdiv+class%3D%22fakeimg%22%3EFake+Image%3C%2Fdiv%3E%0D%0A++++++%3Cp%3ESome+text..%3C%2Fp%3E%0D%0A++++++%3Cp%3ESunt+in+culpa+qui+officia+deserunt+mollit+anim+id+est+laborum+consectetur+adipiscing+elit%2C+sed+do+eiusmod+tempor+incididunt+ut+labore+et+dolore+magna+aliqua.+Ut+enim+ad+minim+veniam%2C+quis+nostrud+exercitation+ullamco.%3C%2Fp%3E%0D%0A++++%3C%2Fdiv%3E%0D%0A++%3C%2Fdiv%3E%0D%0A%3C%2Fdiv%3E%0D%0A%0D%0A%3Cdiv+class%3D%22mt-5+p-4+bg-dark+text-white+text-center%22%3E%0D%0A++%3Cp%3EFooter%3C%2Fp%3E%0D%0A%3C%2Fdiv%3E', 'https%3A%2F%2Ftutorialesatualcance.com', '%2300c8f0', '2024-10-31', '2024-10-31 21:25:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id_module` int(11) NOT NULL,
  `id_page_module` int(11) DEFAULT 0,
  `type_module` text DEFAULT NULL,
  `title_module` text DEFAULT NULL,
  `suffix_module` text DEFAULT NULL,
  `content_module` text DEFAULT NULL,
  `width_module` int(11) DEFAULT 100,
  `editable_module` int(11) DEFAULT 1,
  `date_created_module` date DEFAULT NULL,
  `date_updated_module` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id_module`, `id_page_module`, `type_module`, `title_module`, `suffix_module`, `content_module`, `width_module`, `editable_module`, `date_created_module`, `date_updated_module`) VALUES
(1, 2, 'breadcrumbs', 'Administradores', NULL, NULL, 100, 1, '2024-10-18', '2024-10-23 18:46:13'),
(2, 2, 'tables', 'admins', 'admin', NULL, 100, 0, '2024-10-18', '2024-10-18 17:09:28'),
(14, 1, 'tables', 'exampless', 'example', '', 100, 1, '2024-10-29', '2024-10-30 22:53:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `title_page` text DEFAULT NULL,
  `url_page` text DEFAULT NULL,
  `icon_page` text DEFAULT NULL,
  `type_page` text DEFAULT NULL,
  `order_page` int(11) DEFAULT 1,
  `date_created_page` date DEFAULT NULL,
  `date_updated_page` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id_page`, `title_page`, `url_page`, `icon_page`, `type_page`, `order_page`, `date_created_page`, `date_updated_page`) VALUES
(1, 'Inicio', 'inicio', 'bi bi-house-door-fill', 'modules', 1, '2024-10-18', '2024-10-19 23:55:02'),
(2, 'Admins', 'admins', 'bi bi-person-fill-gear', 'modules', 2, '2024-10-18', '2024-10-19 23:55:02'),
(4, 'Ventas', 'ventas', 'bi bi-bag-check-fill', 'custom', 3, '2024-10-20', '2024-10-19 23:55:02'),
(5, 'Clientes', 'clientes', 'bi bi-people', 'modules', 4, '2024-10-20', '2024-10-19 23:53:32'),
(7, 'Tutoriales', 'https%3A%2F%2Ftutorialesatualcance.com%2F', 'bi bi-fast-forward-btn', 'external_link', 5, '2024-10-20', '2024-10-19 23:53:32'),
(8, 'Row 4', '%23row_4', 'bi bi-pause-circle-fill', 'internal_link', 6, '2024-10-20', '2024-10-19 23:53:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id_sale` int(11) NOT NULL,
  `profit_sale` double NOT NULL DEFAULT 0,
  `date_sale` text DEFAULT NULL,
  `date_created_sale` date DEFAULT NULL,
  `date_updated_sale` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id_sale`, `profit_sale`, `date_sale`, `date_created_sale`, `date_updated_sale`) VALUES
(1, 10000, '2024-01', '2024-01-10', '2024-10-16 03:41:48'),
(2, 30000, '2024-01', '2024-01-21', '2024-10-16 03:41:48'),
(3, 23000, '2024-01', '2024-01-25', '2024-10-16 03:41:48'),
(4, 43560, '2024-01', '2024-01-31', '2024-10-16 03:41:48'),
(5, 50060, '2024-02', '2024-02-01', '2024-10-16 03:41:48'),
(6, 59428, '2024-02', '2024-02-11', '2024-10-16 03:41:48'),
(7, 68796, '2024-02', '2024-02-15', '2024-10-16 03:41:48'),
(8, 78164, '2024-02', '2024-02-17', '2024-10-16 03:41:48'),
(9, 87532, '2024-02', '2024-02-10', '2024-10-16 03:41:48'),
(10, 96900, '2024-03', '2024-03-21', '2024-10-16 03:41:48'),
(11, 106268, '2024-03', '2024-03-25', '2024-10-16 03:41:48'),
(12, 115636, '2024-03', '2024-03-31', '2024-10-16 03:41:48'),
(13, 125004, '2024-03', '2024-03-01', '2024-10-16 03:41:48'),
(14, 134372, '2024-03', '2024-03-11', '2024-10-16 03:41:48'),
(15, 143740, '2024-03', '2024-03-15', '2024-10-16 03:41:48'),
(16, 153108, '2024-03', '2024-03-17', '2024-10-16 03:41:48'),
(17, 162476, '2024-04', '2024-04-10', '2024-10-16 03:41:48'),
(18, 171844, '2024-04', '2024-04-21', '2024-10-16 03:41:48'),
(19, 181212, '2024-04', '2024-04-25', '2024-10-16 03:41:48'),
(20, 190580, '2024-04', '0000-00-00', '2024-10-16 03:41:48'),
(21, 199948, '2024-04', '2024-04-01', '2024-10-16 03:41:48'),
(22, 209316, '2024-04', '2024-04-11', '2024-10-16 03:41:48'),
(23, 218684, '2024-04', '2024-04-15', '2024-10-16 03:41:48'),
(24, 228052, '2024-04', '2024-04-17', '2024-10-16 03:41:48'),
(25, 237420, '2024-04', '2024-04-10', '2024-10-16 03:41:48'),
(26, 246788, '2024-04', '2024-04-21', '2024-10-16 03:41:48'),
(27, 256156, '2024-04', '2024-04-25', '2024-10-16 03:41:48'),
(28, 265524, '2024-04', '0000-00-00', '2024-10-16 03:41:48'),
(29, 274892, '2024-05', '2024-05-01', '2024-10-16 03:41:48'),
(30, 284260, '2024-05', '2024-05-11', '2024-10-16 03:41:48'),
(31, 293628, '2024-05', '2024-05-15', '2024-10-16 03:41:48'),
(32, 302996, '2024-05', '2024-05-17', '2024-10-16 03:41:48'),
(33, 312364, '2024-06', '2024-06-10', '2024-10-16 03:41:48'),
(34, 321732, '2024-06', '2024-06-21', '2024-10-16 03:41:48'),
(35, 331100, '2024-06', '2024-06-25', '2024-10-16 03:41:48'),
(36, 340468, '2024-06', '2024-06-30', '2024-10-16 03:41:48'),
(37, 349836, '2024-06', '2024-06-10', '2024-10-16 03:41:48'),
(38, 359204, '2024-07', '2024-07-21', '2024-10-16 03:41:48'),
(39, 368572, '2024-07', '2024-07-25', '2024-10-16 03:41:48'),
(40, 377940, '2024-07', '2024-07-31', '2024-10-16 03:41:48'),
(41, 387308, '2024-07', '2024-07-01', '2024-10-16 03:41:48'),
(42, 396676, '2024-07', '2024-07-11', '2024-10-16 03:41:48'),
(43, 406044, '2024-07', '2024-07-15', '2024-10-16 03:41:48'),
(44, 415412, '2024-08', '2024-08-17', '2024-10-16 03:41:48'),
(45, 424780, '2024-08', '2024-08-10', '2024-10-16 03:41:48'),
(46, 434148, '2024-08', '2024-08-21', '2024-10-16 03:41:48'),
(47, 443516, '2024-08', '2024-08-25', '2024-10-16 03:41:48'),
(48, 452884, '2024-08', '2024-08-31', '2024-10-16 03:41:48'),
(49, 462252, '2024-09', '2024-09-01', '2024-10-16 03:41:48'),
(50, 471620, '2024-09', '2024-09-11', '2024-10-16 03:41:48'),
(51, 480988, '2024-09', '2024-09-15', '2024-10-16 03:41:48'),
(52, 490356, '2024-10', '2024-10-17', '2024-10-16 03:41:48'),
(53, 499724, '2024-10', '2024-10-10', '2024-10-16 03:41:48'),
(54, 509092, '2024-10', '2024-10-21', '2024-10-16 03:41:48'),
(55, 518460, '2024-10', '2024-10-25', '2024-10-16 03:41:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`id_column`);

--
-- Indices de la tabla `exampless`
--
ALTER TABLE `exampless`
  ADD PRIMARY KEY (`id_example`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id_module`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sale`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `columns`
--
ALTER TABLE `columns`
  MODIFY `id_column` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `exampless`
--
ALTER TABLE `exampless`
  MODIFY `id_example` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;