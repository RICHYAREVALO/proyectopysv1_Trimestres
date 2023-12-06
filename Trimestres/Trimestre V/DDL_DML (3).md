 DDL
 Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cargo` int(11) NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DML


-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `cargo`, `clave`, `created_at`, `updated_at`) VALUES
(29, 'brayan hernandez', 'bryam153@outlook.es', 1, '202cb962ac59075b964b07152d234b70', '2023-09-17 21:49:57', '2023-09-18 15:03:01'),
(31, 'daren martinez', 'datocarema@misena.edu.co', 2, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-17 23:37:25', '2023-09-18 15:03:05'),
(32, 'brayan hernandez', 'bryam153@outlook.com', 2, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 18:51:05', '2023-09-18 19:10:21'),
(33, 'admin', 'bryam153@outlook.co', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 19:45:19', '2023-09-18 19:45:37'),
(34, 'david', 'david@gmail.com', 3, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 20:19:51', '2023-09-18 20:20:07'),
(35, 'ricardo', 'ricardo@outlook.com', 3, '202cb962ac59075b964b07152d234b70', '2023-09-18 22:26:57', '2023-09-18 22:29:54');

--
# clase de conexion permiete conectar a la base de datos y ejecutar consultas sql

class Conexion
{

    #Atributos de la clase conexion 
    private $mysqli = '';
    private $usuario = 'root';
    private $clave = '';
    private $server = 'localhost';
    private $db = 'database';


    # Funcion que permite conectarnos a la base de datos 
    public function conectar()
    {
        # Creamos un objeto de conexion MySQLI
        $this->mysqli = new mysqli($this->server, $this->usuario, $this->clave, $this->db);

        # Validamos si existe un error al conectarnos
        if($this->mysqli->connect_errno)
        {
            # Imprimir el error 
            echo 'fallo al conectar con MySQL: '. $this->mysqli->connect_error;
        }

    } 


    # Function que retorna un objeto de MySQL
    public function query($consulta)
    {
      #mysqli_query Realiza una consulta a la base de datos
      return $this->mysqli->query($consulta);
    }

 # Nos conectamos a la base de datos
      parent::conectar();

      // traemos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clave sea igual a la ingresada para ese usuario.
      $consulta = 'select id, nombre, cargo from usuarios where email="'.$user.'" and clave= MD5("'.$clave.'")';
      /*
        Verificamos si el usuario existe, la funcion verificarRegistros
        retorna el número de filas afectadas, en otras palabras si el
        usuario existe retornara 1 de lo contrario retornara 0
      */

      $verificar_usuario = parent::verificarRegistros($consulta);

      // si la consulta es mayor a 0 el usuario existe
      if($verificar_usuario > 0){

Realizamos la misma consulta de la linea 55 pero esta ves transformaremos el resultado en un arreglo
$user = parent::consultaArreglo($consulta);


