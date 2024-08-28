<?php 
	require_once("config.php");
	class Conexion
	{
		protected $conex;

		public function __construct()
		{
			$this->conex=new mysqli(host,user,pass,base);
			if($this->conex->connect_errno)
			{
				echo "Error al conectar con la base de Datos...Revise";
				return;
			}
			$this->conex->set_charset(charst);
		}
        public function getConexion()
    {
        return $this->conex;
    }

	}

 ?>