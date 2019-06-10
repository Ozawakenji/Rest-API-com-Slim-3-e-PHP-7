<?php 
	
	namespace App\DAO\GestaoVendas;

	abstract class Conexao
	{

		/**
		 * @var \PDO
		 */
		protected $pdo;

		public function __construct()
		{
			
			$host = getenv("GESTAOVENDAS_MYSQL_HOST");
			$dbname = getenv("GESTAOVENDAS_MYSQL_DBNAME");
			$user = getenv("GESTAOVENDAS_MYSQL_USER");
			$pass = getenv("GESTAOVENDAS_MYSQL_PASSWORD");
			$port = getenv("GESTAOVENDAS_MYSQL_PORT");			
			
			$dados = "mysql:host={$host};dbname={$dbname};port{$port}";

			$this->pdo = new \PDO($dados, $user, $pass);
			$this->pdo->setAttribute(
				\PDO::ATTR_ERRMODE,
				\PDO::ERRMODE_EXCEPTION
			);
						
		}
	}

 ?>