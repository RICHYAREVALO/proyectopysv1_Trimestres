<?php

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



    # Funcion que retorna el nuemro de filas afectadas en una cosulta sql 
    public function verificarRegistros($consulta)
        {
        # mysqli_num_rows: Obtine el numerod e filas de una resultado de una consulta
        return $verificarRegistros = mysqli_num_rows($this->mysqli->query($consulta));
    }



    # Funcion que restorna un arreglo con los registros de una consulta 
    public function consultaArreglo($consulta)
        {
        # mysqli_fetch_array oc¿btine una fila de resultados como un arry asociativo 
        return mysqli_fetch_array($this->mysqli->query($consulta));
    }


    # Funcion que permite cerrar una conexion de MySQL
    public function cerrar()
    {
        # Accedemos al atributo de conexion y cerramos la conexion
        $this->mysqli->close();
    }

    # Escapa los caracteres especiales de uns string para evitar las inyeciones sql
    public function salvar($des)
        {
        /*
        mysqli_real_escape_string: escapa los caracteres especiales de una cadena
        para usuarla en una sentecia sql, tomando en cuenta el conjunto de
        caracteres actual de la conexion
        */
        $string = $this->mysqli->real_escape_string($des);

        return $string;
      }
    # Serie de filtros para lamacenar en base de daos
    public function filtrar($string){

        $res = $this->salvar($string);

        # Asignamos los parametros de la busqueda 
        $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
        $reemplazar = array('&aacute','&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');

        # str_replace: Remplaza todas las apariciones del string buscando con el string de remplazo
        $res = str_replace($buscar, $reemplazar, $string);

        # strtolower: convierte una cadena a minusculas 
        $res = strtolower($res);

        # trim : Eliminar espacio en blanco ( u otro tipo de caracteres) del inicio y final de la cadena 
        $res = trim($res);

        return $res;
      }


    # Convierte el acento de la base de datos en acentos entendibles
    public function rescatar($string)
    {

        # Asignamos los parametros de la busqueda 
        $buscar = array('&aacute','&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');
          $reemplazar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');

          $res = str_replace($buscar, $reemplazar, $string);

          return $res;
        }
    
} // Fin de las clases y la clase de hoy 

?>
