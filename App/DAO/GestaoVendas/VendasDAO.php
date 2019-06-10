<?php 

namespace App\DAO\GestaoVendas;

class VendasDAO extends Conexao
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function inserirVendas(int $iduser, int $idproduto)
	{
		$vendas = $this->pdo->query("INSERT INTO vendas (idusuario, idprodutos) VALUES ({$iduser},{$idproduto})");
		return $vendas;
	}	

}
 ?>