-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 15:18:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id_ejer` int(11) NOT NULL,
  `nombre_ej` varchar(100) NOT NULL,
  `musculo_id` int(11) NOT NULL,
  `intensidad_ej` int(11) NOT NULL,
  `seccion_ej` varchar(100) NOT NULL,
  `descripcion_ej` varchar(750) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id_ejer`, `nombre_ej`, `musculo_id`, `intensidad_ej`, `seccion_ej`, `descripcion_ej`) VALUES
(1, 'Press inclinado con mancuernas', 1, 2, 'Con mancuernas', 'Sí que es cierto que en este caso también se incide un poco más sobre el deltoides anterior, y por ello es conveniente que tratemos de retraer bien las escápulas llevando los hombros hacia atrás y hacia abajo.\r\nEste gesto es muy simple de llevar a cabo y deberíamos automatizarlo cuanto antes, ya que reducirá mucho el riesgo de que nos hagamos daño en estos ejercicios de empuje.'),
(2, 'Press declinado con mancuernas', 1, 2, 'Con mancuernas', 'Permite conseguir un gran rango de recorrido dado que se ejecuta con mancuernas y de manera declinada. Intenta que tus codos en diagonal, de modo que tus brazos formen un ángulo de 45 grados con respecto a tu torso, para reducir las probabilidades de lesionarte.'),
(3, 'Press de banca ', 1, 2, 'Con barra', 'Para iniciar la realización del ejercicio es necesario acostarse en un banco plano con los glúteos, caderas y hombros sobre el banco. Los pies deben apoyarse en suelo, separados un poco más allá del ancho de lo hombros. Con las manos debemos tomar la barra de manera que las palmas miren hacia adelante, es decir, en pronación, y separadas ligeramente más allá de la anchura de los hombros.\r\nEl brazo y el antebrazo deben formar un ángulo de 90º, por lo que debemos flexionar el codo de manera que la barra tomada con las manos quede exactamente encima del pecho.\r\nDesde allí debemos inspirar y descender lentamente la barra hacia el pecho, sin despegar la espalda del banco. Una vez la barra esté sobre el pecho debemos empujar hacia arriba mientras'),
(4, 'Remo alto en máquina hammer', 2, 2, 'Con maquina ', 'Tire de las manijas hacia su torso, retrayendo sus omóplatos mientras exhala. Vuelva a la posición inicial con un movimiento suave mientras inhala, evitando que los pesos en movimiento toquen el resto de la placas.'),
(5, 'Dominadas al pecho', 2, 3, 'Con barra de dominadas', 'on una versión de las dominadas con kipping en versión algo más compleja, pues para realizarla adecuadamente, tendremos que tocar con nuestro pecho en la barra de dominadas. Para esto, necesitaremos impulsarnos potentemente con nuestros brazos y caderas para conseguir elevar a nuestro cuerpo hasta conseguir tocar el pecho. No es un ejercicio nada fácil de realizar, no recomendada para neonatos en la materia.'),
(6, 'Dominadas abiertas', 2, 3, 'Con barra de dominadas', 'Las dominadas abiertas son exactamente iguales que las dominadas convencionales, simplemente cambiando la posición de las manos. Se abren más las manos con el fin de trabajar más los músculos dorsales y se pueden realizar, con agarre supino y agarre pronador.'),
(7, 'Sentadillas con barra', 3, 2, 'Con barra', 'Agarra la barra con ambas manos y pasa por debajo de ella.\r\nAntes de colocar la barra en los músculos superiores del cuello, tire de los hombros hacia atrás y comprima los omóplatos. Esto acumulará tensión en la parte superior de su cuerpo y evitará que la barra se acueste sobre su columna vertebral.\r\nCuando la barra esté bien colocada en los músculos de la parte superior del cuello, sáquela del soporte con la espalda recta.\r\nMire hacia adelante y asegúrese de que su columna vertebral esté derecha. Inspire, estire un poco el pecho y apriete el estómago.\r\nInicie el movimiento descendente empujando un poco la parte inferior hacia atrás y arrodillándose al mismo tiempo.\r\nUna vez que la articulación de la cadera esté ligeramente por debajo de l'),
(8, 'Peso muerto sumo con barra', 3, 3, 'Con barra', 'Coloque la barra sobre una superficie adecuada.\r\nAbre tus piernas en un ancho más grande que los hombros.\r\nSujeta la barra con firmeza.\r\nAsegúrate de tener la espalda recta y no mires demasiado hacia adelante o hacia abajo.'),
(9, 'Extensión de cuádriceps', 3, 1, 'Con maquina', 'Este punto tiene que ver con el rango de desplazamiento en la extensión de cuádriceps en máquina. La recomendación es que no llegues a los puntos máximos en el desplazamiento de las piernas. Esto quiere decir que no debes extenderlas por completo, ni tampoco superar los 90 grados en la flexión de la rodilla. \r\nRecuerda que, al realizar este ejercicio, no hay que separar los glúteos del asiento. El empeine del pie no debes de ponerlo en el soporte y el rodillo  de la máquina. La posición correcta de dicho soporte es alrededor de unos 10 cm arriba del tobillo.'),
(10, 'Curl con barra', 4, 2, 'Con Barra', 'Agarra una barra con un agarre bajo la mano, ligeramente más ancho que los hombros. Con el pecho hacia arriba y los omóplatos bien apretados, expone la parte delantera de tus bíceps tirando de los hombros hacia la cavidad. Los codos deben residir debajo de la articulación del hombro, o ligeramente delante de las costillas.  Enrolla la barra hacia arriba utilizando los bíceps, asegurándote de no dejar que el torso se incline hacia adelante, que los hombros se colapsen hacia adelante o que los codos se deslicen hacia el lado trasero del cuerpo (deben permanecer ligeramente delante de los hombros).'),
(11, 'Curl martillo con mancuernas', 4, 3, 'Con mancuernas', 'Agarra un par de mancuernas con las manos a los lados y las palmas hacia el cuerpo. El pecho debe estar alto, los hombros deben estar hacia atrás y hacia abajo, y los codos por debajo de los hombros. Levanta la mancuerna hacia arriba para que los pulgares salgan primero, asegurándote de no girar la muñeca en la posición supinada o pronada (mantén la muñeca neutral). Los codos deben entrar en aproximadamente 100-130 grados de flexión, obligando a los bíceps a contraerse agresivamente en la parte superior. Luego, baja bajo control y repite.'),
(12, 'Curl con Polea', 4, 2, 'Con polea', 'Coloca los cables a la altura deseada, a menudo desde una posición baja. Agarra los mangos, la cuerda o el accesorio de la barra y realiza la variación de curl deseada. '),
(13, 'Extensiones con mancuerna en banco', 5, 1, 'Con mancuernas', 'Para desarrollar la cabeza larga del tríceps, coge la pesa por encima de tu cabeza con las dos manos y sube y baja flexionando los codos, sin bloquearlos. Fundamental en este ejercicio mantener la espalda recta y el core firme durante todas las repeticiones.'),
(14, 'Press francés ', 5, 1, 'Con mancuernas', 'Especialmente diseñado para realizar muchas repeticiones si lo deseas, incluso con mucho peso; es ideal para definir si lo haces con poco peso y manejable. Utiliza una barra Z a poder ser y controla la fase excéntrica al máximo.'),
(15, 'Fondos en barras paralelas', 5, 3, 'Con barras paralelas', 'Ejercicio clásico, muy utilizado en la calistenia, que sirve también para el pecho. Se aconseja no bloquear los codos y no es recomendable si padeces alguna lesión en los hombros. Cuanto mayor sea la distancia de las paralelas, más trabajo para los pectorales, y al revés, cuanto menos, más estimulación de los tríceps.'),
(16, 'Press militar con barra sentado', 6, 2, 'Con barra ', 'Cogemos la barra con las manos en pronación (con las palmas mirando hacia adelante). Las manos deben situarse a una anchura algo superior a la de los hombros. Sacamos la barra de su soporte y la colocamos sobre la parte alta de nuestro pecho, a la altura de nuestras clavículas. Esta será la posición de inicio del movimiento. Mantenemos la espalda recta y bien apoyada en el respaldo del banco. Inspiramos y al expulsar el aire levantamos verticalmente la barra por encima de nuestra cabeza, procurando no llegar a bloquear los codos al final del recorrido, sino que se parará un poquito antes. Permaneceremos 1 segundo con los brazos estirados aguantado el peso. Bajamos la barra efectuando el movimiento vertical inverso, de forma controlada, hast'),
(17, 'Press de hombros con mancuernas', 6, 1, 'Con mancuernas', 'Fundamental hacerlo con un peso adecuado que nos permite rigor con la técnica. Subir las mancuernas con un buen impulso, casi explosivamente, descender lentamente, mantener firme el torso y guiar el movimiento de manera suave.'),
(18, 'Elevaciones laterales', 6, 1, 'Con mancuernas', 'Intenta flexionar ligeramente el codo y no extender el brazo por completo. Además, no levantes mucho peso y sube los brazos por encima de la cabeza.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `musculos`
--

CREATE TABLE `musculos` (
  `id` int(11) NOT NULL,
  `nombre_musculo` varchar(100) NOT NULL,
  `division_musculo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `musculos`
--

INSERT INTO `musculos` (`id`, `nombre_musculo`, `division_musculo`) VALUES
(1, 'Pecho', 'Pectoral mayor, Pectoral menor.'),
(2, 'Espalda', 'Trapecio, Dorsal ancho, Romboides mayor, Romboides menor, Elevador de la escápula, Serrato posterior superior y Serrato posterior inferior.'),
(3, 'Piernas', 'Psoas ilíaco, Cuadrado femoral, Géminos superior e inferior, Glúteos, Obturador externo y interno, Pififorme, Cuádriceps, Sartorio, Tensor de la fascia lata, Aductores, Pectíneo, Grácil, Bíceps femoral, Semitendinoso, Semimembranoso, Tibial anterior, Músculo extensor largo de los dedos, Músculo extensor largo del dedo gordo, Músculo peroneo anterior, Peroneo lateral largo y corto, Poplíteo, Músculo flexor común de los dedos de los pies, Músculo tibial posterior.'),
(4, 'Biceps', 'Porción corta o interna y Porción larga o externa.'),
(5, 'Triceps', 'Cabeza larga, Cabeza lateral y Cabeza medial.'),
(6, 'Hombros', 'Pectoral mayor, Pectoral menor, Subclavio, Serrato anterior, Músculos extrínsecos, Músculos intrínsecos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `rol_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `password`, `rol_usuario`) VALUES
(1, 'donpedro', '$2y$10$0CpZ1GpENP17o9UsdzV/U.EAX0NCgzjbGg38fggpPTShmqMV1HqJa', 'publico'),
(2, 'pepe', '$2y$10$UfcXb9ILL/zLxxI6TEoBFOGoAO./tZ7TpapxabDRKydLf6QVZ2T4e', 'publico'),
(3, 'ValenAdmin', '$2y$10$iWz93JqXLkqHlnktZA2V6.Q7UDWZCVkgDxU9BS0JFX2N7P/NraTb2', 'admin'),
(4, 'MateoAdmin', '$2y$10$MWzAwdnn1odyqvRVCAKPRuifVYsDkGM8S4opR8eEZWA2Udqa4kMX6', 'admin'),
(7, 'pepe01', '$2y$10$6p/QF3epRhl9Il/UG.yNkOIcBuZhAXZGeBTCErwhy/NnP66i7X9sm', 'publico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id_ejer`),
  ADD KEY `musculo_id` (`musculo_id`);

--
-- Indices de la tabla `musculos`
--
ALTER TABLE `musculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id_ejer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `musculos`
--
ALTER TABLE `musculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `ejercicios_ibfk_1` FOREIGN KEY (`musculo_id`) REFERENCES `musculos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
