-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 05, 2025 at 09:57 PM
-- Server version: 9.5.0
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `id_usuario`, `titulo`, `contenido`, `imagen`, `estado`, `fecha`) VALUES
(1, 1, 'Bienvenidos a Playa Escondida', '<p>&iexcl;Bienvenidos, viajeros! Hoy les traigo un pedacito de cielo directamente a sus pantallas. &iquest;Est&aacute;n listos para escapar del ruido?</p>\r\n<p>Esta playa... es la definici&oacute;n de <strong>paz</strong>. Arena suave, un sol que recarga energ&iacute;as y un mar tan turquesa que parece irreal</p>', 'img_68fd3be758fcc.jpg', 0, '2025-10-25 21:06:47'),
(2, 1, 'Bienvenidos a Playa escondida', '<p>&iexcl;Bienvenidos, viajeros! Hoy les traigo un pedacito de cielo directamente a sus pantallas. &iquest;Est&aacute;n listos para escapar del ruido?</p>\r\n<p>Esta playa... es la real definici&oacute;n de <strong>paz</strong>. Arena suave, un sol que recarga energ&iacute;as y un mar tan turquesa que parece irreal!!</p>', 'img_68fd4b0f20ad6.jpg', 1, '2025-10-25 22:11:27'),
(3, 4, 'Rumbo a las Nubes: La Caminata que Cambió Mi Perspectiva', '<p>&iexcl;Bienvenidos a una nueva aventura, monta&ntilde;eros! Si sos de los que prefiere el fr&iacute;o, el desaf&iacute;o y las vistas panor&aacute;micas, este vlog es para vos.</p>\r\n<p>Hoy dejamos la arena por la roca. Estas monta&ntilde;as son un recordatorio de lo peque&ntilde;a que es nuestra rutina y lo inmensa que es la naturaleza!!</p>', 'img_68fd99b81145a.jpg', 1, '2025-10-26 03:47:04'),
(4, 5, 'Retiro en la Orilla: La Magia de los Lagos y el Silencio', '<p>Este lago... es un refugio. Su agua quieta parece guardar todos los secretos del bosque. En este vlog, quiero invitarlos a un <strong>viaje de baja intensidad</strong> donde la prioridad es la relajaci&oacute;n.</p>', 'img_68fd9b7517bb3.jpg', 1, '2025-10-26 03:54:29'),
(5, 6, 'Tigre, cuando extrañás los rios de CBA', '<p>Ah, Tigre&hellip; cada vez que camino por sus muelles y veo el r&iacute;o marr&oacute;n avanzar lento entre los sauces, me agarra una nostalgia honda por los r&iacute;os de C&oacute;rdoba. All&aacute; el agua era clara y fr&iacute;a, bajando entre piedras y montes, con ese rumor cristalino que se met&iacute;a en el alma. Ac&aacute;, en cambio, el Delta tiene otro ritmo: m&aacute;s calmo, m&aacute;s ancho, como si el tiempo tambi&eacute;n flotara. Sin embargo, hay algo en la bruma de la ma&ntilde;ana, en el reflejo del sol sobre el agua, que me devuelve un pedazo de aquellas siestas serranas. En Tigre todo parece distinto, pero de alg&uacute;n modo, el r&iacute;o siempre sabe c&oacute;mo recordarme de d&oacute;nde vengo.</p>', 'img_690281728f854.jpg', 1, '2025-10-29 21:04:50'),
(6, 1, 'Playa Serena', '<p>Ubicada en un rinc&oacute;n tranquilo y encantador, <strong data-start=\"240\" data-end=\"256\">Playa Serena</strong> hace honor a su nombre con su atm&oacute;sfera apacible, aguas cristalinas y arenas suaves que invitan al descanso. Rodeada de naturaleza y alejada del bullicio, es el destino ideal para quienes buscan desconectarse y reconectar con lo esencial.</p>\r\n<p><strong data-start=\"888\" data-end=\"945\">Perfecta para familias, parejas y viajeros solitarios</strong>, este para&iacute;so costero promete momentos de paz, conexi&oacute;n y belleza natural en estado puro.</p>', 'img_690286ec29442.jpg', 1, '2025-10-29 21:28:12'),
(7, 1, 'Playa Margarita', '<p>Ubicada en un rinc&oacute;n tranquilo y encantador, <strong data-start=\"240\" data-end=\"256\">Playa Serena</strong> hace honor a su nombre con su atm&oacute;sfera apacible, aguas cristalinas y arenas suaves que invitan al descanso. Rodeada de naturaleza y alejada del bullicio, es el destino ideal para quienes buscan desconectarse y reconectar con lo esencial.</p>\r\n<p><strong data-start=\"888\" data-end=\"945\">Perfecta para familias, parejas y viajeros solitarios</strong>, este para&iacute;so costero promete momentos de paz, conexi&oacute;n y belleza natural en estado puro.</p>', 'img_690288afb547b.jpg', 1, '2025-10-29 21:35:43'),
(15, 6, 'Carlos Paz', '<p>test upload</p>', 'img_69028c9ad36d8.jpg', 1, '2025-10-29 21:52:26'),
(16, 1, 'Muelle soñado', '<p>Un rinc&oacute;n m&aacute;gico donde el cielo se encuentra con el agua. <strong data-start=\"179\" data-end=\"196\">Muelle So&ntilde;ado</strong> es el lugar perfecto para disfrutar de un atardecer inolvidable, respirar paz y dejar que los sue&ntilde;os fluyan con cada ola. Ideal para paseos tranquilos, fotos rom&aacute;nticas o simplemente contemplar la belleza del horizonte.</p>', 'img_69028e964b658.jpg', 1, '2025-10-29 22:00:54'),
(19, 6, 'Otro lugar', '<p>upload test</p>', 'img_690291f00d7e4.jpg', 1, '2025-10-29 22:15:12'),
(20, 1, '🌲 Refugio del Lago Esmeralda', '<p data-start=\"155\" data-end=\"516\">Enclavado entre monta&ntilde;as imponentes y bosques eternos, el <strong data-start=\"213\" data-end=\"243\">Refugio del Lago Esmeralda</strong> es un rinc&oacute;n donde el silencio habla y la naturaleza abraza. Las aguas tranquilas reflejan la majestuosidad de los picos nevados, mientras las barcas de madera flotan serenamente, esperando viajeros que busquen desconectar y dejarse llevar por la belleza pura del momento.</p>', 'img_690293b593139.jpg', 1, '2025-10-29 22:22:45'),
(21, 7, 'test', '<p>test de contenido</p>', '', 0, '2025-10-29 23:13:04'),
(22, 7, 'test', '<p>test</p>', '', 0, '2025-10-29 23:16:02'),
(23, 7, 'test', '<p>test</p>', '', 0, '2025-10-29 23:17:26'),
(24, 7, 'test', '<p>test</p>', '', 0, '2025-10-29 23:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `status`, `role`) VALUES
(1, 'Oli', 'oli@test.com', '$2y$10$IWUiH4PZC/eLsQy2sLVwbuEC3geLQ0kEIkk1NtUmizu0.mviMEmMq', 1, 0),
(2, 'Amorina', 'amorinabujan@gmail.com', '$2y$10$lJJBIcJeta9/yL62p5/YyOBLei1oejspbxzFAldrlj7nHzW4t5Wv.', 1, 0),
(3, 'Teresa', 'tereyyo@gmail.com', '$2y$10$7fpwxjnEvaR8MR237S1F0ei/uJB/T8MwmDeuE6IUdrWU5LncxHkma', 1, 0),
(4, 'Cirilla', 'cirirulo@gmail.com', '$2y$10$0IdfNAgg35Ts4KTmagP0LOA0PXmfjFjCkp7BjsbsXB9r5BNtnsphS', 1, 0),
(5, 'Sergio', 'sereze@gmail.com', '$2y$10$Ps3sWbgALvg8LqNUqbEnOeXvz3sg/DjPPBhHrDXRGCfPI8HvW/BBS', 1, 0),
(6, 'Sergio Ezequiel', 'sbujan@gmail.com', '$2y$10$v6V6RWI8yL8RnPN0aw4oLe.SGpauBg0nvfq3UCwmrL2Zbw5t4I1Wa', 1, 0),
(7, 'hola', 'hola@gmail.com', '$2y$10$tH.aivVqi.vYd5EIZ3ssOe8HZp4D5y6PweWgSTlrJYO2.4vgHQCL.', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
