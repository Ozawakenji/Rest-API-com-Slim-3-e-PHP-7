<?php 

    namespace App\DAO\GestaoVendas;

    use App\Models\GestaoVendas\UsuarioModel;

    class LoginDAO extends Conexao
	{
        public function __construct()
		{
			parent::__construct();
        }
        
        public function getUserByEmail(string $email): ?UsuarioModel
        {
            $dadosBanco = $this->pdo->query("SELECT id,nome,email,senha FROM USUARIO WHERE email = '{$email}';")->fetchAll(\PDO::FETCH_ASSOC);
            if(count($dadosBanco) === 0) return null;
            $dados = new UsuarioModel();
            $dados->setId($dadosBanco[0]["id"])
                ->setNome($dadosBanco[0]["nome"])
                ->setEmail($dadosBanco[0]["email"])
                ->setSenha($dadosBanco[0]["senha"]);
            return $dados;
        }

    }

?>